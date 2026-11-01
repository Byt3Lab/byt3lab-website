<?php
/**
 * BYT3LAB Theme - Contact Form Handler & Message Management
 * Traitement des soumissions de formulaire, sauvegarde en base de données,
 * notification par email et consultation dans l'administration.
 */

if (!defined('ABSPATH')) {
    exit;
}

// -------------------------------------------------------------
// 1. Traitement de la soumission du formulaire (AJAX & Direct POST)
// -------------------------------------------------------------
add_action('wp_ajax_byt3lab_submit_contact', 'byt3lab_handle_contact_submission');
add_action('wp_ajax_nopriv_byt3lab_submit_contact', 'byt3lab_handle_contact_submission');

/**
 * Traite les données du formulaire de contact (sauvegarde DB, email admin, WhatsApp)
 *
 * @param array $data Données brutes du formulaire ($_POST)
 * @return array ['success' => bool, 'message' => string, 'post_id' => int, 'whatsapp_url' => string]
 */
function byt3lab_process_contact_submission($data) {
    // 1. Protection Anti-Spam Honeypot (si rempli, rejet)
    if (!empty($data['byt3lab_hp'])) {
        return [
            'success' => false,
            'message' => 'Requête invalide détectée.',
        ];
    }

    // 2. Récupération et nettoyage des données
    $name    = isset($data['name']) ? sanitize_text_field($data['name']) : '';
    $org     = isset($data['org']) ? sanitize_text_field($data['org']) : '';
    $email   = isset($data['email']) ? sanitize_email($data['email']) : '';
    $phone   = isset($data['phone']) ? sanitize_text_field($data['phone']) : '';
    $subject = isset($data['subject']) ? sanitize_text_field($data['subject']) : 'Prise de contact';
    $message = isset($data['message']) ? sanitize_textarea_field($data['message']) : '';

    // 3. Validation des champs obligatoires
    if (empty($name) || empty($email) || empty($message)) {
        return [
            'success' => false,
            'message' => 'Veuillez renseigner votre Nom, votre Email et le détail de votre Message.',
        ];
    }

    if (!is_email($email)) {
        return [
            'success' => false,
            'message' => 'Veuillez saisir une adresse email valide (ex: contact@entreprise.cm).',
        ];
    }

    // 4. Titre pour l'entrée dans l'administration
    $post_title = '[' . $subject . '] ' . $name . (!empty($org) ? ' (' . $org . ')' : '');

    // 5. Enregistrement dans la base de données (Custom Post Type byt3lab_message)
    $post_id = wp_insert_post([
        'post_title'   => $post_title,
        'post_content' => $message,
        'post_status'  => 'publish',
        'post_type'    => 'byt3lab_message',
    ]);

    if (!$post_id || is_wp_error($post_id)) {
        return [
            'success' => false,
            'message' => 'Une erreur est survenue lors de l\'enregistrement de votre message en base de données.',
        ];
    }

    // 6. Sauvegarde des métadonnées
    update_post_meta($post_id, '_byt3lab_msg_name', $name);
    update_post_meta($post_id, '_byt3lab_msg_org', $org);
    update_post_meta($post_id, '_byt3lab_msg_email', $email);
    update_post_meta($post_id, '_byt3lab_msg_phone', $phone);
    update_post_meta($post_id, '_byt3lab_msg_subject', $subject);
    update_post_meta($post_id, '_byt3lab_msg_status', 'new');
    update_post_meta($post_id, '_byt3lab_msg_date', current_time('mysql'));
    update_post_meta($post_id, '_byt3lab_msg_ip', sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? ''));

    // 7. Envoi d'une notification par email à l'administrateur
    $admin_email = get_option('admin_email');
    if (!empty($admin_email)) {
        $site_name   = get_bloginfo('name');
        $email_subj  = '[' . $site_name . ' - Contact] ' . $subject . ' - ' . $name;
        $admin_edit_url = admin_url('post.php?post=' . $post_id . '&action=edit');

        $email_body  = "Bonjour,\n\n";
        $email_body .= "Une nouvelle demande a été envoyée depuis le formulaire de contact du site BYT3LAB :\n\n";
        $email_body .= "--------------------------------------------------\n";
        $email_body .= "• Nom & Prénom : " . $name . "\n";
        $email_body .= "• Organisation : " . (!empty($org) ? $org : 'Non renseigné') . "\n";
        $email_body .= "• Email        : " . $email . "\n";
        $email_body .= "• Téléphone    : " . (!empty($phone) ? $phone : 'Non renseigné') . "\n";
        $email_body .= "• Nature       : " . $subject . "\n";
        $email_body .= "• Date         : " . current_time('d/m/Y à H:i') . "\n";
        $email_body .= "--------------------------------------------------\n\n";
        $email_body .= "Message :\n" . $message . "\n\n";
        $email_body .= "--------------------------------------------------\n";
        $email_body .= "Consulter et traiter cette demande dans WordPress :\n" . $admin_edit_url . "\n";

        $server_host = !empty($_SERVER['SERVER_NAME']) ? sanitize_text_field($_SERVER['SERVER_NAME']) : 'byt3lab.com';
        $headers = [
            'From: ' . $site_name . ' <no-reply@' . $server_host . '>',
            'Reply-To: ' . $name . ' <' . $email . '>',
        ];

        @wp_mail($admin_email, $email_subj, $email_body, $headers);
    }

    // 8. Préparation du lien WhatsApp direct en option de suivi instantané
    $wa_text = "Bonjour BYT3LAB,\nJe viens de soumettre une demande sur votre site :\n• Objet : " . $subject . "\n• De : " . $name . (!empty($org) ? " (" . $org . ")" : "") . (!empty($phone) ? "\n• Tél : " . $phone : "");
    $whatsapp_url = 'https://wa.me/237696879475?text=' . rawurlencode($wa_text);

    return [
        'success'      => true,
        'message'      => 'Votre demande a été transmise avec succès à l\'équipe BYT3LAB ! Elle est bien enregistrée et notifiée à nos ingénieurs. Nous vous répondrons sous 24h ouvrées.',
        'post_id'      => $post_id,
        'whatsapp_url' => $whatsapp_url,
    ];
}

/**
 * Endpoint AJAX standard
 */
function byt3lab_handle_contact_submission() {
    $result = byt3lab_process_contact_submission($_POST);
    if (!empty($result['success'])) {
        wp_send_json_success($result);
    } else {
        wp_send_json_error($result);
    }
}

// -------------------------------------------------------------
// 2. Meta Box de consultation du message dans l'administration
// -------------------------------------------------------------
add_action('add_meta_boxes', 'byt3lab_register_message_meta_box');
function byt3lab_register_message_meta_box() {
    add_meta_box(
        'byt3lab_message_details',
        __('Détails de la Demande & Action Rapide', 'byt3lab_wordpress_theme'),
        'byt3lab_render_message_meta_box',
        'byt3lab_message',
        'normal',
        'high'
    );
}

function byt3lab_render_message_meta_box($post) {
    wp_nonce_field('byt3lab_save_message_meta', 'byt3lab_message_nonce');
    $name    = get_post_meta($post->ID, '_byt3lab_msg_name', true);
    $org     = get_post_meta($post->ID, '_byt3lab_msg_org', true);
    $email   = get_post_meta($post->ID, '_byt3lab_msg_email', true);
    $phone   = get_post_meta($post->ID, '_byt3lab_msg_phone', true);
    $subject = get_post_meta($post->ID, '_byt3lab_msg_subject', true);
    $status  = get_post_meta($post->ID, '_byt3lab_msg_status', true) ?: 'new';
    $date    = get_post_meta($post->ID, '_byt3lab_msg_date', true) ?: $post->post_date;
    $ip      = get_post_meta($post->ID, '_byt3lab_msg_ip', true);

    // Si le statut était nouveau, le passer automatiquement à 'lu' après première ouverture
    if ($status === 'new') {
        update_post_meta($post->ID, '_byt3lab_msg_status', 'read');
        $status = 'read';
    }

    $wa_phone = preg_replace('/[^0-9]/', '', $phone);
    ?>
    <div style="background: #ffffff; padding: 15px 0;">
        
        <!-- Header status bar -->
        <div style="display: flex; justify-content: space-between; align-items: center; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
            <div>
                <span style="color: #64748b; font-size: 12px; text-transform: uppercase; font-weight: 700;">Statut de traitement :</span>
                <select name="byt3lab_msg_status" style="margin-left: 8px; font-weight: 600; border-radius: 6px; padding: 4px 10px;">
                    <option value="new" <?php selected($status, 'new'); ?>>🟢 Nouveau / Non traité</option>
                    <option value="read" <?php selected($status, 'read'); ?>>🔵 Lu / En cours d'analyse</option>
                    <option value="in_progress" <?php selected($status, 'in_progress'); ?>>🟡 Devis en cours de rédaction</option>
                    <option value="resolved" <?php selected($status, 'resolved'); ?>>⚪ Traité / Répondu</option>
                </select>
            </div>
            <div style="color: #64748b; font-size: 13px;">
                📅 Reçu le : <strong><?php echo esc_html(date_i18n('d/m/Y à H:i', strtotime($date))); ?></strong>
                <?php if (!empty($ip)) : ?>
                    <span style="margin-left: 10px; font-size: 11px; color: #94a3b8;">(IP: <?php echo esc_html($ip); ?>)</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Coordonnées Demandeur Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 25px;">
            
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Demandeur</div>
                <div style="font-size: 16px; font-weight: 700; color: #0f172a;"><?php echo esc_html($name ?: '-'); ?></div>
                <?php if (!empty($org)) : ?>
                    <div style="color: #0284c7; font-size: 13px; font-weight: 600; margin-top: 2px;">🏢 <?php echo esc_html($org); ?></div>
                <?php endif; ?>
            </div>

            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Email Professionnel</div>
                <div><a href="mailto:<?php echo esc_attr($email); ?>" style="font-size: 14px; font-weight: 600; text-decoration: none; color: #0284c7;">✉️ <?php echo esc_html($email ?: '-'); ?></a></div>
            </div>

            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Téléphone / WhatsApp</div>
                <div style="font-size: 14px; font-weight: 600; color: #0f172a;">📞 <?php echo esc_html($phone ?: '-'); ?></div>
            </div>

            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px;">
                <div style="color: #64748b; font-size: 11px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px;">Objet de la Demande</div>
                <div style="font-size: 14px; font-weight: 700; color: #0f172a;">🎯 <?php echo esc_html($subject ?: '-'); ?></div>
            </div>

        </div>

        <!-- Quick Reply Action Buttons -->
        <div style="display: flex; gap: 10px; margin-bottom: 25px; flex-wrap: wrap;">
            <?php if (!empty($email)) : ?>
                <a href="mailto:<?php echo esc_attr($email); ?>?subject=<?php echo rawurlencode('Re: ' . $subject . ' - BYT3LAB'); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; font-weight: 600; padding: 4px 16px;">
                    ✉️ Répondre par Email à <?php echo esc_html($name); ?>
                </a>
            <?php endif; ?>

            <?php if (!empty($wa_phone)) : ?>
                <a href="https://wa.me/<?php echo esc_attr($wa_phone); ?>?text=<?php echo rawurlencode('Bonjour ' . $name . ', suite à votre demande sur BYT3LAB concernant ' . $subject . '...'); ?>" target="_blank" rel="noopener noreferrer" class="button" style="background: #22c55e; border-color: #16a34a; color: #fff; font-weight: 600; padding: 4px 16px;">
                    💬 Échanger sur WhatsApp
                </a>
            <?php endif; ?>

            <?php if (!empty($phone)) : ?>
                <a href="tel:<?php echo esc_attr($phone); ?>" class="button" style="font-weight: 600;">
                    📞 Appeler
                </a>
            <?php endif; ?>
        </div>

        <!-- Message Body Container -->
        <div style="background: #f8fafc; border: 1.5px solid #cbd5e1; border-radius: 10px; padding: 20px;">
            <label style="display: block; font-weight: 700; color: #0f172a; margin-bottom: 10px; font-size: 14px;">Contenu du Message transmis par le client :</label>
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 16px; font-size: 14px; line-height: 1.8; color: #334155; white-space: pre-wrap;"><?php echo esc_html($post->post_content); ?></div>
        </div>

    </div>
    <?php
}

// Sauvegarde du statut du message
add_action('save_post', 'byt3lab_save_message_status');
function byt3lab_save_message_status($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!isset($_POST['byt3lab_message_nonce']) || !wp_verify_nonce($_POST['byt3lab_message_nonce'], 'byt3lab_save_message_meta')) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['byt3lab_msg_status'])) {
        update_post_meta($post_id, '_byt3lab_msg_status', sanitize_text_field($_POST['byt3lab_msg_status']));
    }
}
