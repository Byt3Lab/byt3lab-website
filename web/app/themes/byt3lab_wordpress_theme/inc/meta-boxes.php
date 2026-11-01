<?php
/**
 * BYT3LAB Theme - Custom Meta Boxes
 * Métadonnées personnalisées pour les Projets, Solutions et Membres de l'équipe,
 * avec sélecteur d'image média interactif.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'byt3lab_register_meta_boxes');
add_action('save_post', 'byt3lab_save_meta_boxes');
add_action('admin_enqueue_scripts', 'byt3lab_enqueue_admin_media_scripts');

function byt3lab_enqueue_admin_media_scripts($hook) {
    global $post_type;
    if (in_array($post_type, ['byt3lab_team', 'byt3lab_project', 'byt3lab_solution', 'byt3lab_service', 'byt3lab_job'])) {
        wp_enqueue_media();
    }
}

function byt3lab_register_meta_boxes() {
    // 1. Projets
    add_meta_box(
        'byt3lab_project_details',
        __('Détails du Projet Réalisé', 'byt3lab_wordpress_theme'),
        'byt3lab_render_project_meta_box',
        'byt3lab_project',
        'normal',
        'high'
    );

    // 2. Solutions
    add_meta_box(
        'byt3lab_solution_details',
        __('Caractéristiques de la Solution Logicielles', 'byt3lab_wordpress_theme'),
        'byt3lab_render_solution_meta_box',
        'byt3lab_solution',
        'normal',
        'high'
    );

    // 3. Membres de l'équipe
    add_meta_box(
        'byt3lab_team_details',
        __('Informations du Membre de l\'Équipe', 'byt3lab_wordpress_theme'),
        'byt3lab_render_team_meta_box',
        'byt3lab_team',
        'normal',
        'high'
    );

    // 4. Services & Ingénierie
    add_meta_box(
        'byt3lab_service_details',
        __('Configuration du Service & Offre', 'byt3lab_wordpress_theme'),
        'byt3lab_render_service_meta_box',
        'byt3lab_service',
        'normal',
        'high'
    );

    // 5. Postes & Recrutement (Carrières)
    add_meta_box(
        'byt3lab_job_details',
        __('Configuration du Poste de Travail & Recrutement', 'byt3lab_wordpress_theme'),
        'byt3lab_render_job_meta_box',
        'byt3lab_job',
        'normal',
        'high'
    );
}

// -------------------------------------------------------------
// Vues des Meta Boxes
// -------------------------------------------------------------

function byt3lab_render_project_meta_box($post) {
    wp_nonce_field('byt3lab_save_project_meta', 'byt3lab_project_nonce');
    $category  = get_post_meta($post->ID, '_byt3lab_project_category', true);
    $stack     = get_post_meta($post->ID, '_byt3lab_project_stack', true);
    $impact    = get_post_meta($post->ID, '_byt3lab_project_impact', true);
    $url       = get_post_meta($post->ID, '_byt3lab_project_url', true);
    $photo_id  = get_post_thumbnail_id($post->ID);
    $photo_url = $photo_id ? wp_get_attachment_image_url($photo_id, 'medium') : get_post_meta($post->ID, '_byt3lab_project_image', true);
    ?>
    <div style="display: flex; flex-direction: column; gap: 16px; padding: 10px 0;">
        <!-- Image Selector -->
        <div style="padding: 16px; background: #f8fafc; border: 1.5px dashed #cbd5e1; border-radius: 10px;">
            <label style="font-weight: 700; display: block; margin-bottom: 8px; color: #0f172a;">Image du Projet / Capture d'écran :</label>
            <div style="display: flex; align-items: center; gap: 18px; flex-wrap: wrap;">
                <div id="byt3lab_project_preview" style="width: 140px; height: 90px; border-radius: 8px; border: 1.5px solid #0284c7; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center;">
                    <?php if (!empty($photo_url)) : ?>
                        <img src="<?php echo esc_url($photo_url); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                    <?php else : ?>
                        <span style="font-size: 26px; color: #94a3b8;">🖼️</span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="hidden" id="byt3lab_project_image" name="byt3lab_project_image" value="<?php echo esc_attr($photo_url); ?>" />
                    <input type="hidden" id="byt3lab_project_image_id" name="byt3lab_project_image_id" value="<?php echo esc_attr($photo_id); ?>" />
                    <button type="button" class="button button-primary" id="byt3lab_btn_upload_project">Choisir une image...</button>
                    <button type="button" class="button" id="byt3lab_btn_remove_project" style="<?php echo !empty($photo_url) ? '' : 'display:none;'; ?>">Supprimer l'image</button>
                    <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Cette image s'affiche sur la carte du portfolio et dans la vue détaillée.</div>
                </div>
            </div>
        </div>

        <div>
            <label for="byt3lab_project_category" style="font-weight: 600; display: block; margin-bottom: 4px;">Domaine / Catégorie (ex: EDTECH, FINTECH, CYBERSÉCURITÉ, ERP) :</label>
            <input type="text" id="byt3lab_project_category" name="byt3lab_project_category" value="<?php echo esc_attr($category); ?>" style="width: 100%; max-width: 500px;" placeholder="ex: FINTECH" />
        </div>
        <div>
            <label for="byt3lab_project_stack" style="font-weight: 600; display: block; margin-bottom: 4px;">Pile Technologique / Stack (séparé par des /) :</label>
            <input type="text" id="byt3lab_project_stack" name="byt3lab_project_stack" value="<?php echo esc_attr($stack); ?>" style="width: 100%; max-width: 500px;" placeholder="ex: Laravel / VueJS / Docker" />
            <small style="color: #666;">Ce texte apparaîtra sous forme de badges technologiques interactifs avec tooltips.</small>
        </div>
        <div>
            <label for="byt3lab_project_impact" style="font-weight: 600; display: block; margin-bottom: 4px;">Impact Clé / Chiffres (Métrique de réussite) :</label>
            <textarea id="byt3lab_project_impact" name="byt3lab_project_impact" rows="3" style="width: 100%;" placeholder="ex: Réduction de 45% des retards de paiement et traitement 100% numérisé."><?php echo esc_textarea($impact); ?></textarea>
        </div>
        <div>
            <label for="byt3lab_project_url" style="font-weight: 600; display: block; margin-bottom: 4px;">Lien vers la Démo ou le Projet en direct (facultatif) :</label>
            <input type="url" id="byt3lab_project_url" name="byt3lab_project_url" value="<?php echo esc_attr($url); ?>" style="width: 100%; max-width: 500px;" placeholder="https://..." />
        </div>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var frame;
        $('#byt3lab_btn_upload_project').on('click', function(e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({ title: 'Sélectionner l\'image du projet', button: { text: 'Utiliser cette image' }, multiple: false });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#byt3lab_project_image').val(attachment.url);
                $('#byt3lab_project_image_id').val(attachment.id);
                $('#byt3lab_project_preview').html('<img src="' + attachment.url + '" style="width:100%; height:100%; object-fit:cover;" />');
                $('#byt3lab_btn_remove_project').show();
            });
            frame.open();
        });
        $('#byt3lab_btn_remove_project').on('click', function(e) {
            e.preventDefault();
            $('#byt3lab_project_image').val('');
            $('#byt3lab_project_image_id').val('');
            $('#byt3lab_project_preview').html('<span style="font-size: 26px; color: #94a3b8;">🖼️</span>');
            $(this).hide();
        });
    });
    </script>
    <?php
}

function byt3lab_render_solution_meta_box($post) {
    wp_nonce_field('byt3lab_save_solution_meta', 'byt3lab_solution_nonce');
    $badge       = get_post_meta($post->ID, '_byt3lab_solution_badge', true);
    $features    = get_post_meta($post->ID, '_byt3lab_solution_features', true);
    $url         = get_post_meta($post->ID, '_byt3lab_solution_url', true);
    $button_text = get_post_meta($post->ID, '_byt3lab_solution_button_text', true);
    $photo_id    = get_post_thumbnail_id($post->ID);
    $photo_url   = $photo_id ? wp_get_attachment_image_url($photo_id, 'medium') : get_post_meta($post->ID, '_byt3lab_solution_image', true);
    ?>
    <div style="display: flex; flex-direction: column; gap: 16px; padding: 10px 0;">
        <!-- Image Selector -->
        <div style="padding: 16px; background: #f8fafc; border: 1.5px dashed #cbd5e1; border-radius: 10px;">
            <label style="font-weight: 700; display: block; margin-bottom: 8px; color: #0f172a;">Capture d'écran / Visuel de la Solution :</label>
            <div style="display: flex; align-items: center; gap: 18px; flex-wrap: wrap;">
                <div id="byt3lab_solution_preview" style="width: 140px; height: 90px; border-radius: 8px; border: 1.5px solid #0284c7; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center;">
                    <?php if (!empty($photo_url)) : ?>
                        <img src="<?php echo esc_url($photo_url); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                    <?php else : ?>
                        <span style="font-size: 26px; color: #94a3b8;">💻</span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="hidden" id="byt3lab_solution_image" name="byt3lab_solution_image" value="<?php echo esc_attr($photo_url); ?>" />
                    <input type="hidden" id="byt3lab_solution_image_id" name="byt3lab_solution_image_id" value="<?php echo esc_attr($photo_id); ?>" />
                    <button type="button" class="button button-primary" id="byt3lab_btn_upload_solution">Choisir une image...</button>
                    <button type="button" class="button" id="byt3lab_btn_remove_solution" style="<?php echo !empty($photo_url) ? '' : 'display:none;'; ?>">Supprimer l'image</button>
                    <div style="color: #64748b; font-size: 12px; margin-top: 5px;">Capture d'écran de l'interface ou maquette du progiciel.</div>
                </div>
            </div>
        </div>

        <div>
            <label for="byt3lab_solution_badge" style="font-weight: 600; display: block; margin-bottom: 4px;">Badge / Slogan (ex: PROGICIEL MODULAIRE & AUTO-HÉBERGÉ) :</label>
            <input type="text" id="byt3lab_solution_badge" name="byt3lab_solution_badge" value="<?php echo esc_attr($badge); ?>" style="width: 100%; max-width: 500px;" placeholder="ex: PROGICIEL MODULAIRE & AUTO-HÉBERGÉ" />
        </div>
        <div>
            <label for="byt3lab_solution_features" style="font-weight: 600; display: block; margin-bottom: 4px;">Points Forts & Fonctionnalités clés (Une ligne par fonctionnalité) :</label>
            <textarea id="byt3lab_solution_features" name="byt3lab_solution_features" rows="5" style="width: 100%; font-family: monospace;" placeholder="Gestion de Commerce & POS : Facturation temps réel et caisse&#10;Gestion Scolaire SUKU : Inscriptions et bulletins&#10;Architecture Cloud & Souveraine : Déploiement auto-hébergé"><?php echo esc_textarea($features); ?></textarea>
            <small style="color: #666;">Entrez une fonctionnalité par ligne. Format recommandé : "Titre : Description".</small>
        </div>
        <div>
            <label for="byt3lab_solution_url" style="font-weight: 600; display: block; margin-bottom: 4px;">URL d'accès / Démo :</label>
            <input type="url" id="byt3lab_solution_url" name="byt3lab_solution_url" value="<?php echo esc_attr($url); ?>" style="width: 100%; max-width: 500px;" placeholder="https://melodi.byt3lab.com" />
        </div>
        <div>
            <label for="byt3lab_solution_button_text" style="font-weight: 600; display: block; margin-bottom: 4px;">Texte du Bouton d'Action :</label>
            <input type="text" id="byt3lab_solution_button_text" name="byt3lab_solution_button_text" value="<?php echo esc_attr($button_text ?: 'Découvrir la solution'); ?>" style="width: 100%; max-width: 500px;" />
        </div>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var frame;
        $('#byt3lab_btn_upload_solution').on('click', function(e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({ title: 'Sélectionner le visuel de la solution', button: { text: 'Utiliser cette image' }, multiple: false });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#byt3lab_solution_image').val(attachment.url);
                $('#byt3lab_solution_image_id').val(attachment.id);
                $('#byt3lab_solution_preview').html('<img src="' + attachment.url + '" style="width:100%; height:100%; object-fit:cover;" />');
                $('#byt3lab_btn_remove_solution').show();
            });
            frame.open();
        });
        $('#byt3lab_btn_remove_solution').on('click', function(e) {
            e.preventDefault();
            $('#byt3lab_solution_image').val('');
            $('#byt3lab_solution_image_id').val('');
            $('#byt3lab_solution_preview').html('<span style="font-size: 26px; color: #94a3b8;">💻</span>');
            $(this).hide();
        });
    });
    </script>
    <?php
}

function byt3lab_render_team_meta_box($post) {
    wp_nonce_field('byt3lab_save_team_meta', 'byt3lab_team_nonce');
    $role        = get_post_meta($post->ID, '_byt3lab_team_role', true);
    $department  = get_post_meta($post->ID, '_byt3lab_team_department', true);
    $bio_short   = get_post_meta($post->ID, '_byt3lab_team_bio_short', true);
    $linkedin    = get_post_meta($post->ID, '_byt3lab_team_linkedin', true);
    $github      = get_post_meta($post->ID, '_byt3lab_team_github', true);
    $twitter     = get_post_meta($post->ID, '_byt3lab_team_twitter', true);
    $whatsapp    = get_post_meta($post->ID, '_byt3lab_team_whatsapp', true);
    $order       = get_post_meta($post->ID, '_byt3lab_team_order', true);
    $photo_id    = get_post_thumbnail_id($post->ID);
    $photo_url   = $photo_id ? wp_get_attachment_image_url($photo_id, 'medium') : get_post_meta($post->ID, '_byt3lab_team_photo', true);
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; padding: 10px 0;">
        
        <!-- PHOTO PICKER SECTION (Direct Media Library) -->
        <div style="grid-column: span 2; padding: 18px; background: #f8fafc; border: 1.5px dashed #0284c7; border-radius: 10px;">
            <label style="font-weight: 700; display: block; margin-bottom: 10px; font-size: 14px; color: #0f172a;">
                📸 Photo de profil du membre (Avatar) :
            </label>
            <div style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                <div id="byt3lab_team_photo_preview" style="width: 100px; height: 100px; border-radius: 50%; border: 3px solid #0284c7; overflow: hidden; background: #e2e8f0; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(2, 132, 199, 0.2);">
                    <?php if (!empty($photo_url)) : ?>
                        <img src="<?php echo esc_url($photo_url); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                    <?php else : ?>
                        <span style="font-size: 36px; color: #94a3b8;">👤</span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="hidden" id="byt3lab_team_photo" name="byt3lab_team_photo" value="<?php echo esc_attr($photo_url); ?>" />
                    <input type="hidden" id="byt3lab_team_photo_id" name="byt3lab_team_photo_id" value="<?php echo esc_attr($photo_id); ?>" />
                    <button type="button" class="button button-primary" id="byt3lab_btn_upload_team_photo" style="background: #0284c7; border-color: #0284c7; padding: 4px 14px; font-size: 13px;">
                        Choisir ou téléverser une photo
                    </button>
                    <button type="button" class="button" id="byt3lab_btn_remove_team_photo" style="<?php echo !empty($photo_url) ? '' : 'display:none;'; ?> margin-left: 8px;">
                        Supprimer la photo
                    </button>
                    <div style="color: #64748b; font-size: 12px; margin-top: 8px;">
                        💡 Cliquez sur le bouton ci-dessus pour sélectionner une photo depuis votre médiathèque ou votre ordinateur (format carré recommandé : 400x400 px).
                    </div>
                </div>
            </div>
        </div>

        <div>
            <label for="byt3lab_team_role" style="font-weight: 600; display: block; margin-bottom: 4px;">Rôle / Titre du poste (ex: Lead Architecte & CEO) :</label>
            <input type="text" id="byt3lab_team_role" name="byt3lab_team_role" value="<?php echo esc_attr($role); ?>" style="width: 100%;" placeholder="ex: Lead Software Engineer" />
        </div>
        <div>
            <label for="byt3lab_team_department" style="font-weight: 600; display: block; margin-bottom: 4px;">Département / Filiale :</label>
            <select id="byt3lab_team_department" name="byt3lab_team_department" style="width: 100%;">
                <option value="Direction & R&D" <?php selected($department, 'Direction & R&D'); ?>>Direction & R&D</option>
                <option value="Byt3lab Tech" <?php selected($department, 'Byt3lab Tech'); ?>>Byt3lab Tech (Software & Cloud)</option>
                <option value="ngrafix" <?php selected($department, 'ngrafix'); ?>>ngrafix (Design & Media)</option>
                <option value="Consulting & Audit" <?php selected($department, 'Consulting & Audit'); ?>>Consulting & Audit</option>
            </select>
        </div>
        <div style="grid-column: span 2;">
            <label for="byt3lab_team_bio_short" style="font-weight: 600; display: block; margin-bottom: 4px;">Biographie Courte / Expertise :</label>
            <textarea id="byt3lab_team_bio_short" name="byt3lab_team_bio_short" rows="3" style="width: 100%;" placeholder="Spécialiste en architectures distribuées et sécurité des systèmes d'information..."><?php echo esc_textarea($bio_short); ?></textarea>
        </div>
        <div>
            <label for="byt3lab_team_linkedin" style="font-weight: 600; display: block; margin-bottom: 4px;">Profil LinkedIn (URL) :</label>
            <input type="url" id="byt3lab_team_linkedin" name="byt3lab_team_linkedin" value="<?php echo esc_attr($linkedin); ?>" style="width: 100%;" placeholder="https://linkedin.com/in/..." />
        </div>
        <div>
            <label for="byt3lab_team_github" style="font-weight: 600; display: block; margin-bottom: 4px;">Profil GitHub (URL) :</label>
            <input type="url" id="byt3lab_team_github" name="byt3lab_team_github" value="<?php echo esc_attr($github); ?>" style="width: 100%;" placeholder="https://github.com/..." />
        </div>
        <div>
            <label for="byt3lab_team_twitter" style="font-weight: 600; display: block; margin-bottom: 4px;">Profil Twitter / X (URL) :</label>
            <input type="url" id="byt3lab_team_twitter" name="byt3lab_team_twitter" value="<?php echo esc_attr($twitter); ?>" style="width: 100%;" placeholder="https://x.com/..." />
        </div>
        <div>
            <label for="byt3lab_team_whatsapp" style="font-weight: 600; display: block; margin-bottom: 4px;">Numéro WhatsApp / Contact direct :</label>
            <input type="text" id="byt3lab_team_whatsapp" name="byt3lab_team_whatsapp" value="<?php echo esc_attr($whatsapp); ?>" style="width: 100%;" placeholder="+237 6..." />
        </div>
        <div>
            <label for="byt3lab_team_order" style="font-weight: 600; display: block; margin-bottom: 4px;">Ordre d'affichage (ex: 1, 2, 3...) :</label>
            <input type="number" id="byt3lab_team_order" name="byt3lab_team_order" value="<?php echo esc_attr($order ?: 0); ?>" style="width: 100px;" />
        </div>
    </div>
    <script>
    jQuery(document).ready(function($) {
        var frame;
        $('#byt3lab_btn_upload_team_photo').on('click', function(e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({ title: 'Sélectionner la photo du membre', button: { text: 'Définir comme photo' }, multiple: false });
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#byt3lab_team_photo').val(attachment.url);
                $('#byt3lab_team_photo_id').val(attachment.id);
                $('#byt3lab_team_photo_preview').html('<img src="' + attachment.url + '" style="width:100%; height:100%; object-fit:cover;" />');
                $('#byt3lab_btn_remove_team_photo').show();
            });
            frame.open();
        });
        $('#byt3lab_btn_remove_team_photo').on('click', function(e) {
            e.preventDefault();
            $('#byt3lab_team_photo').val('');
            $('#byt3lab_team_photo_id').val('');
            $('#byt3lab_team_photo_preview').html('<span style="font-size: 36px; color: #94a3b8;">👤</span>');
            $(this).hide();
        });
    });
    </script>
    <?php
}

// -------------------------------------------------------------
// 4. Vue Meta Box Services & Ingénierie
// -------------------------------------------------------------

function byt3lab_render_service_meta_box($post) {
    wp_nonce_field('byt3lab_save_service_meta', 'byt3lab_service_nonce');

    $icon         = get_post_meta($post->ID, '_byt3lab_service_icon', true) ?: '💻';
    $branch       = get_post_meta($post->ID, '_byt3lab_service_branch', true);
    $short_desc   = get_post_meta($post->ID, '_byt3lab_service_short_desc', true);
    $deliverables = get_post_meta($post->ID, '_byt3lab_service_deliverables', true);
    $cta_text     = get_post_meta($post->ID, '_byt3lab_service_cta_text', true) ?: 'Demander un devis';
    $cta_url      = get_post_meta($post->ID, '_byt3lab_service_cta_url', true) ?: home_url('/contact/');
    $image        = get_post_meta($post->ID, '_byt3lab_service_image', true);
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    if (empty($image) && $thumbnail_id) {
        $image = wp_get_attachment_url($thumbnail_id);
    }

    if (empty($branch)) {
        $terms = wp_get_post_terms($post->ID, 'byt3lab_service_branch');
        if (!empty($terms) && !is_wp_error($terms)) {
            $branch = $terms[0]->name;
        } else {
            $branch = 'Byt3lab Tech';
        }
    }

    $all_branches = get_terms([
        'taxonomy'   => 'byt3lab_service_branch',
        'hide_empty' => false,
    ]);
    ?>
    <div style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; max-width: 800px; padding: 10px 0;">
        <table class="form-table" role="presentation" style="width: 100%;">
            <tbody>
                <!-- 1. Filiale / Département -->
                <tr>
                    <th scope="row" style="width: 220px;">
                        <label for="byt3lab_service_branch" style="font-weight: 600; color: #1e293b;">Filiale / Département</label>
                    </th>
                    <td>
                        <select name="byt3lab_service_branch" id="byt3lab_service_branch" class="regular-text" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1;">
                            <?php 
                            $found = false;
                            if (!empty($all_branches) && !is_wp_error($all_branches)) :
                                foreach ($all_branches as $t) :
                                    $sel = ($branch === $t->name || $branch === $t->slug) ? 'selected' : '';
                                    if ($sel) $found = true;
                                    echo '<option value="' . esc_attr($t->name) . '" ' . $sel . '>' . esc_html($t->name) . '</option>';
                                endforeach;
                            endif;
                            if (!$found && !empty($branch)) {
                                echo '<option value="' . esc_attr($branch) . '" selected>' . esc_html($branch) . '</option>';
                            }
                            ?>
                        </select>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">
                            Pôle de rattachement du service (ex: Byt3lab Tech, Ngrafix, Conseil &amp; Stratégie).
                        </p>
                    </td>
                </tr>

                <!-- 2. Icône ou Emoji -->
                <tr>
                    <th scope="row">
                        <label for="byt3lab_service_icon" style="font-weight: 600; color: #1e293b;">Icône ou Emoji</label>
                    </th>
                    <td>
                        <input type="text" name="byt3lab_service_icon" id="byt3lab_service_icon" value="<?php echo esc_attr($icon); ?>" class="small-text" style="font-size: 20px; text-align: center; width: 60px; padding: 4px; border-radius: 6px; border: 1px solid #cbd5e1;" />
                        <span style="margin-left: 10px; color: #64748b; font-size: 13px;">Exemples : 💻 (Software), 🛡️ (Sécurité), 🎨 (Design), ☁️ (Cloud), 🤖 (IA/Robotique)</span>
                    </td>
                </tr>

                <!-- 3. Description Courte -->
                <tr>
                    <th scope="row">
                        <label for="byt3lab_service_short_desc" style="font-weight: 600; color: #1e293b;">Accroche / Résumé court</label>
                    </th>
                    <td>
                        <textarea name="byt3lab_service_short_desc" id="byt3lab_service_short_desc" rows="3" class="large-text" style="border-radius: 6px; border: 1px solid #cbd5e1;" placeholder="Présentation concise de ce service pour la vitrine..."><?php echo esc_textarea($short_desc); ?></textarea>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">Affiché dans les cartes de la page Services et sur la page d'accueil.</p>
                    </td>
                </tr>

                <!-- 4. Livrables & Points clés -->
                <tr>
                    <th scope="row">
                        <label for="byt3lab_service_deliverables" style="font-weight: 600; color: #1e293b;">Livrables &amp; Points clés</label>
                    </th>
                    <td>
                        <textarea name="byt3lab_service_deliverables" id="byt3lab_service_deliverables" rows="4" class="large-text" style="border-radius: 6px; border: 1px solid #cbd5e1;" placeholder="Exemple :&#10;Audit d'architecture initiale&#10;Déploiement conteneurisé Kubernetes&#10;Maintenance et monitoring 24/7"><?php echo esc_textarea($deliverables); ?></textarea>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">Saisissez un livrable par ligne. Ils apparaîtront sous forme de liste à puces élégante.</p>
                    </td>
                </tr>

                <!-- 5. Bouton d'action CTA -->
                <tr>
                    <th scope="row">
                        <label for="byt3lab_service_cta_text" style="font-weight: 600; color: #1e293b;">Bouton d'Action (CTA)</label>
                    </th>
                    <td>
                        <div style="display: flex; gap: 12px; max-width: 600px;">
                            <input type="text" name="byt3lab_service_cta_text" id="byt3lab_service_cta_text" value="<?php echo esc_attr($cta_text); ?>" class="regular-text" placeholder="Texte (ex: Demander un devis)" style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                            <input type="text" name="byt3lab_service_cta_url" id="byt3lab_service_cta_url" value="<?php echo esc_attr($cta_url); ?>" class="large-text" placeholder="Lien (ex: /contact/)" style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                        </div>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">Libellé du bouton et lien de redirection.</p>
                    </td>
                </tr>

                <!-- 6. Visuel / Bannière du Service -->
                <tr>
                    <th scope="row">
                        <label style="font-weight: 600; color: #1e293b;">Visuel d'Illustration</label>
                    </th>
                    <td>
                        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 12px;">
                            <div id="byt3lab_service_image_preview" style="width: 140px; height: 90px; border-radius: 8px; border: 2px dashed #cbd5e1; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #f8fafc;">
                                <?php if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;" />
                                <?php else : ?>
                                    <span style="font-size: 28px; color: #94a3b8;">🖼️</span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <input type="hidden" name="byt3lab_service_image" id="byt3lab_service_image" value="<?php echo esc_attr($image); ?>" />
                                <input type="hidden" name="byt3lab_service_image_id" id="byt3lab_service_image_id" value="<?php echo esc_attr($thumbnail_id); ?>" />
                                <button type="button" class="button button-primary" id="byt3lab_btn_upload_service_image" style="margin-right: 8px;">
                                    Choisir une Image
                                </button>
                                <button type="button" class="button" id="byt3lab_btn_remove_service_image" style="<?php echo empty($image) ? 'display: none;' : ''; ?> color: #ef4444; border-color: #ef4444;">
                                    Supprimer
                                </button>
                                <p class="description" style="color: #64748b; font-size: 12px; margin-top: 8px;">
                                    Sélectionnez une image de présentation depuis la médiathèque. Elle sera automatiquement synchronisée avec l'image mise en avant.
                                </p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        $('#byt3lab_btn_upload_service_image').on('click', function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media({
                title: 'Sélectionner l\'illustration du service',
                button: { text: 'Utiliser ce visuel' },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#byt3lab_service_image').val(attachment.url);
                $('#byt3lab_service_image_id').val(attachment.id);
                $('#byt3lab_service_image_preview').html('<img src="' + attachment.url + '" style="width: 100%; height: 100%; object-fit: cover;" />');
                $('#byt3lab_btn_remove_service_image').show();
            });
            mediaUploader.open();
        });
        $('#byt3lab_btn_remove_service_image').on('click', function(e) {
            e.preventDefault();
            $('#byt3lab_service_image').val('');
            $('#byt3lab_service_image_id').val('');
            $('#byt3lab_service_image_preview').html('<span style="font-size: 28px; color: #94a3b8;">🖼️</span>');
            $(this).hide();
        });
    });
    </script>
    <?php
}

// -------------------------------------------------------------
// 5. Vue de la Meta Box pour les Postes & Recrutement (Carrières)
// -------------------------------------------------------------

function byt3lab_render_job_meta_box($post) {
    wp_nonce_field('byt3lab_save_job_meta', 'byt3lab_job_nonce');
    $dept        = get_post_meta($post->ID, '_byt3lab_job_department', true);
    $contract    = get_post_meta($post->ID, '_byt3lab_job_contract', true);
    $location    = get_post_meta($post->ID, '_byt3lab_job_location', true);
    $experience  = get_post_meta($post->ID, '_byt3lab_job_experience', true);
    $salary      = get_post_meta($post->ID, '_byt3lab_job_salary', true);
    $status      = get_post_meta($post->ID, '_byt3lab_job_status', true);
    $deadline    = get_post_meta($post->ID, '_byt3lab_job_deadline', true);
    $apply_link  = get_post_meta($post->ID, '_byt3lab_job_apply_link', true);
    $missions    = get_post_meta($post->ID, '_byt3lab_job_missions', true);
    $requirements= get_post_meta($post->ID, '_byt3lab_job_requirements', true);

    if (empty($status)) {
        $status = 'active';
    }
    if (empty($contract)) {
        $contract = 'CDI - Temps Plein';
    }
    if (empty($apply_link)) {
        $apply_link = 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - ' . ($post->post_title ?: 'Poste BYT3LAB'));
    }
    ?>
    <div style="background: #ffffff; padding: 10px 0;">
        <p style="margin-top: 0; color: #475569; font-size: 13px;">
            Configurez les critères du poste, les détails et <strong>le lien de réception des candidatures</strong> (email, formulaire en ligne, WhatsApp, LinkedIn...).
        </p>

        <!-- Highlight Box: Lien pour envoyer le CV / Postuler -->
        <div style="background: #f0fdf4; border: 1.5px solid #86efac; border-radius: 8px; padding: 16px; margin-bottom: 20px;">
            <label for="byt3lab_job_apply_link" style="display: block; font-weight: 700; color: #166534; font-size: 14px; margin-bottom: 6px;">
                🔗 Lien pour envoyer le CV / Postuler à cette offre * :
            </label>
            <input type="text" name="byt3lab_job_apply_link" id="byt3lab_job_apply_link" value="<?php echo esc_attr($apply_link); ?>" class="large-text" style="font-size: 14px; padding: 8px 12px; border: 1.5px solid #22c55e; border-radius: 6px; background: #fff;" placeholder="ex: mailto:carrieres@byt3lab.com?subject=Candidature... ou https://forms.gle/..." />
            <p style="margin: 6px 0 0 0; font-size: 12px; color: #15803d;">
                💡 <strong>Exemples supportés :</strong><br />
                - <strong>Par Email direct :</strong> <code>mailto:carrieres@byt3lab.com?subject=Candidature%20D%C3%A9veloppeur</code><br />
                - <strong>Lien externe / Formulaire :</strong> <code>https://forms.gle/xyz...</code> ou <code>https://jobs.notion.site/...</code><br />
                - <strong>WhatsApp direct :</strong> <code>https://wa.me/237696879475?text=Bonjour%20je%20postule...</code>
            </p>
        </div>

        <table class="form-table" role="presentation" style="margin-top: 0;">
            <tbody>
                <!-- 1. Département / Filiale -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_department" style="font-weight: 600; color: #1e293b;">Département / Filiale</label></th>
                    <td>
                        <select name="byt3lab_job_department" id="byt3lab_job_department" style="min-width: 250px; padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1;">
                            <option value="Byt3lab Tech" <?php selected($dept, 'Byt3lab Tech'); ?>>Byt3lab Tech (Software &amp; Cloud)</option>
                            <option value="Ngrafix Studio" <?php selected($dept, 'Ngrafix Studio'); ?>>Ngrafix Studio (Design &amp; Média)</option>
                            <option value="Conseil & Stratégie" <?php selected($dept, 'Conseil & Stratégie'); ?>>Conseil &amp; Stratégie Digitale</option>
                            <option value="Direction & Opérations" <?php selected($dept, 'Direction & Opérations'); ?>>Direction &amp; Opérations</option>
                            <option value="Support & Cybersécurité" <?php selected($dept, 'Support & Cybersécurité'); ?>>Support &amp; Cybersécurité</option>
                        </select>
                    </td>
                </tr>

                <!-- 2. Type de contrat & Statut -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_contract" style="font-weight: 600; color: #1e293b;">Type de Contrat</label></th>
                    <td>
                        <div style="display: flex; gap: 15px; flex-wrap: wrap; align-items: center;">
                            <select name="byt3lab_job_contract" id="byt3lab_job_contract" style="min-width: 200px; padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1;">
                                <option value="CDI - Temps Plein" <?php selected($contract, 'CDI - Temps Plein'); ?>>CDI - Temps Plein</option>
                                <option value="CDI - Temps Partiel" <?php selected($contract, 'CDI - Temps Partiel'); ?>>CDI - Temps Partiel</option>
                                <option value="CDD" <?php selected($contract, 'CDD'); ?>>CDD</option>
                                <option value="Stage Pré-Embauche" <?php selected($contract, 'Stage Pré-Embauche'); ?>>Stage Pré-Embauche (6 mois)</option>
                                <option value="Stage Académique" <?php selected($contract, 'Stage Académique'); ?>>Stage Académique (3 mois)</option>
                                <option value="Freelance / Consultant" <?php selected($contract, 'Freelance / Consultant'); ?>>Freelance / Consultant</option>
                                <option value="Alternance" <?php selected($contract, 'Alternance'); ?>>Alternance</option>
                            </select>

                            <label for="byt3lab_job_status" style="font-weight: 600; color: #1e293b; margin-left: 10px;">Statut :</label>
                            <select name="byt3lab_job_status" id="byt3lab_job_status" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1;">
                                <option value="active" <?php selected($status, 'active'); ?>>🟢 Recrutement Actif / Ouvert</option>
                                <option value="urgent" <?php selected($status, 'urgent'); ?>>⚡ Recrutement Urgent</option>
                                <option value="evaluating" <?php selected($status, 'evaluating'); ?>>🟡 En cours d'évaluation</option>
                                <option value="closed" <?php selected($status, 'closed'); ?>>⚪ Clôturé / Pourvu</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <!-- 3. Lieu & Télétravail -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_location" style="font-weight: 600; color: #1e293b;">Lieu &amp; Télétravail</label></th>
                    <td>
                        <input type="text" name="byt3lab_job_location" id="byt3lab_job_location" value="<?php echo esc_attr($location); ?>" class="regular-text" placeholder="ex: Douala / Hybride, Yaoundé, Full Remote..." style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                    </td>
                </tr>

                <!-- 4. Niveau d'expérience requis -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_experience" style="font-weight: 600; color: #1e293b;">Expérience Requise</label></th>
                    <td>
                        <input type="text" name="byt3lab_job_experience" id="byt3lab_job_experience" value="<?php echo esc_attr($experience); ?>" class="regular-text" placeholder="ex: Senior (4 à 6 ans), Junior, Stagiaire..." style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                    </td>
                </tr>

                <!-- 5. Rémunération & Avantages -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_salary" style="font-weight: 600; color: #1e293b;">Rémunération / Package</label></th>
                    <td>
                        <input type="text" name="byt3lab_job_salary" id="byt3lab_job_salary" value="<?php echo esc_attr($salary); ?>" class="large-text" placeholder="ex: Selon profil &amp; compétences + Primes de projet" style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                    </td>
                </tr>

                <!-- 6. Date limite / Échéance -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_deadline" style="font-weight: 600; color: #1e293b;">Date limite / Clôture</label></th>
                    <td>
                        <input type="text" name="byt3lab_job_deadline" id="byt3lab_job_deadline" value="<?php echo esc_attr($deadline); ?>" class="regular-text" placeholder="ex: 15 Novembre 2026 ou Recrutement continu" style="border-radius: 6px; border: 1px solid #cbd5e1;" />
                    </td>
                </tr>

                <!-- 7. Missions & Responsabilités Clés -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_missions" style="font-weight: 600; color: #1e293b;">Missions &amp; Responsabilités</label></th>
                    <td>
                        <textarea name="byt3lab_job_missions" id="byt3lab_job_missions" rows="5" class="large-text" style="border-radius: 6px; border: 1px solid #cbd5e1;" placeholder="Saisissez une mission par ligne, exemple :&#10;Concevoir et développer des API RESTful sous Node.js&#10;Participer aux choix d'architecture micro-services&#10;Réaliser les revues de code rigoureuses"><?php echo esc_textarea($missions); ?></textarea>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">Saisissez une mission par ligne. Elles seront affichées sous forme de puces sur la fiche du poste.</p>
                    </td>
                </tr>

                <!-- 8. Profil & Compétences Requises -->
                <tr>
                    <th scope="row"><label for="byt3lab_job_requirements" style="font-weight: 600; color: #1e293b;">Profil &amp; Compétences</label></th>
                    <td>
                        <textarea name="byt3lab_job_requirements" id="byt3lab_job_requirements" rows="5" class="large-text" style="border-radius: 6px; border: 1px solid #cbd5e1;" placeholder="Saisissez un critère par ligne, exemple :&#10;Minimum 3 ans d'expérience en production&#10;Maîtrise de Docker et PostgreSQL&#10;Rigueur analytique et passion pour le code propre"><?php echo esc_textarea($requirements); ?></textarea>
                        <p class="description" style="color: #64748b; font-size: 12px; margin-top: 4px;">Saisissez une compétence ou critère par ligne.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

// -------------------------------------------------------------
// Sauvegarde sécurisée des métadonnées & synchronisation image
// -------------------------------------------------------------

function byt3lab_save_meta_boxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (wp_is_post_revision($post_id)) {
        return;
    }

    // 1. Projets
    if (isset($_POST['byt3lab_project_nonce']) && wp_verify_nonce($_POST['byt3lab_project_nonce'], 'byt3lab_save_project_meta')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['byt3lab_project_category'])) {
                update_post_meta($post_id, '_byt3lab_project_category', sanitize_text_field($_POST['byt3lab_project_category']));
            }
            if (isset($_POST['byt3lab_project_stack'])) {
                update_post_meta($post_id, '_byt3lab_project_stack', sanitize_text_field($_POST['byt3lab_project_stack']));
            }
            if (isset($_POST['byt3lab_project_impact'])) {
                update_post_meta($post_id, '_byt3lab_project_impact', sanitize_textarea_field($_POST['byt3lab_project_impact']));
            }
            if (isset($_POST['byt3lab_project_url'])) {
                update_post_meta($post_id, '_byt3lab_project_url', esc_url_raw($_POST['byt3lab_project_url']));
            }
            if (isset($_POST['byt3lab_project_image'])) {
                update_post_meta($post_id, '_byt3lab_project_image', esc_url_raw($_POST['byt3lab_project_image']));
            }
            if (!empty($_POST['byt3lab_project_image_id'])) {
                set_post_thumbnail($post_id, intval($_POST['byt3lab_project_image_id']));
            } elseif (isset($_POST['byt3lab_project_image']) && empty($_POST['byt3lab_project_image'])) {
                delete_post_thumbnail($post_id);
            }
        }
    }

    // 2. Solutions
    if (isset($_POST['byt3lab_solution_nonce']) && wp_verify_nonce($_POST['byt3lab_solution_nonce'], 'byt3lab_save_solution_meta')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['byt3lab_solution_badge'])) {
                update_post_meta($post_id, '_byt3lab_solution_badge', sanitize_text_field($_POST['byt3lab_solution_badge']));
            }
            if (isset($_POST['byt3lab_solution_features'])) {
                update_post_meta($post_id, '_byt3lab_solution_features', sanitize_textarea_field($_POST['byt3lab_solution_features']));
            }
            if (isset($_POST['byt3lab_solution_url'])) {
                update_post_meta($post_id, '_byt3lab_solution_url', esc_url_raw($_POST['byt3lab_solution_url']));
            }
            if (isset($_POST['byt3lab_solution_button_text'])) {
                update_post_meta($post_id, '_byt3lab_solution_button_text', sanitize_text_field($_POST['byt3lab_solution_button_text']));
            }
            if (isset($_POST['byt3lab_solution_image'])) {
                update_post_meta($post_id, '_byt3lab_solution_image', esc_url_raw($_POST['byt3lab_solution_image']));
            }
            if (!empty($_POST['byt3lab_solution_image_id'])) {
                set_post_thumbnail($post_id, intval($_POST['byt3lab_solution_image_id']));
            } elseif (isset($_POST['byt3lab_solution_image']) && empty($_POST['byt3lab_solution_image'])) {
                delete_post_thumbnail($post_id);
            }
        }
    }

    // 3. Équipe
    if (isset($_POST['byt3lab_team_nonce']) && wp_verify_nonce($_POST['byt3lab_team_nonce'], 'byt3lab_save_team_meta')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['byt3lab_team_role'])) {
                update_post_meta($post_id, '_byt3lab_team_role', sanitize_text_field($_POST['byt3lab_team_role']));
            }
            if (isset($_POST['byt3lab_team_department'])) {
                update_post_meta($post_id, '_byt3lab_team_department', sanitize_text_field($_POST['byt3lab_team_department']));
            }
            if (isset($_POST['byt3lab_team_bio_short'])) {
                update_post_meta($post_id, '_byt3lab_team_bio_short', sanitize_textarea_field($_POST['byt3lab_team_bio_short']));
            }
            if (isset($_POST['byt3lab_team_linkedin'])) {
                update_post_meta($post_id, '_byt3lab_team_linkedin', esc_url_raw($_POST['byt3lab_team_linkedin']));
            }
            if (isset($_POST['byt3lab_team_github'])) {
                update_post_meta($post_id, '_byt3lab_team_github', esc_url_raw($_POST['byt3lab_team_github']));
            }
            if (isset($_POST['byt3lab_team_twitter'])) {
                update_post_meta($post_id, '_byt3lab_team_twitter', esc_url_raw($_POST['byt3lab_team_twitter']));
            }
            if (isset($_POST['byt3lab_team_whatsapp'])) {
                update_post_meta($post_id, '_byt3lab_team_whatsapp', sanitize_text_field($_POST['byt3lab_team_whatsapp']));
            }
            if (isset($_POST['byt3lab_team_order'])) {
                update_post_meta($post_id, '_byt3lab_team_order', intval($_POST['byt3lab_team_order']));
            }
            if (isset($_POST['byt3lab_team_photo'])) {
                update_post_meta($post_id, '_byt3lab_team_photo', esc_url_raw($_POST['byt3lab_team_photo']));
            }
            if (!empty($_POST['byt3lab_team_photo_id'])) {
                set_post_thumbnail($post_id, intval($_POST['byt3lab_team_photo_id']));
            } elseif (isset($_POST['byt3lab_team_photo']) && empty($_POST['byt3lab_team_photo'])) {
                delete_post_thumbnail($post_id);
            }
        }
    }

    // 4. Services
    if (isset($_POST['byt3lab_service_nonce']) && wp_verify_nonce($_POST['byt3lab_service_nonce'], 'byt3lab_save_service_meta')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['byt3lab_service_icon'])) {
                update_post_meta($post_id, '_byt3lab_service_icon', sanitize_text_field($_POST['byt3lab_service_icon']));
            }
            if (isset($_POST['byt3lab_service_branch'])) {
                $branch = sanitize_text_field($_POST['byt3lab_service_branch']);
                update_post_meta($post_id, '_byt3lab_service_branch', $branch);
                if (!empty($branch)) {
                    wp_set_object_terms($post_id, $branch, 'byt3lab_service_branch', false);
                }
            }
            if (isset($_POST['byt3lab_service_short_desc'])) {
                update_post_meta($post_id, '_byt3lab_service_short_desc', sanitize_textarea_field($_POST['byt3lab_service_short_desc']));
            }
            if (isset($_POST['byt3lab_service_deliverables'])) {
                update_post_meta($post_id, '_byt3lab_service_deliverables', sanitize_textarea_field($_POST['byt3lab_service_deliverables']));
            }
            if (isset($_POST['byt3lab_service_cta_text'])) {
                update_post_meta($post_id, '_byt3lab_service_cta_text', sanitize_text_field($_POST['byt3lab_service_cta_text']));
            }
            if (isset($_POST['byt3lab_service_cta_url'])) {
                update_post_meta($post_id, '_byt3lab_service_cta_url', esc_url_raw($_POST['byt3lab_service_cta_url']));
            }
            if (isset($_POST['byt3lab_service_image'])) {
                update_post_meta($post_id, '_byt3lab_service_image', esc_url_raw($_POST['byt3lab_service_image']));
            }
            if (!empty($_POST['byt3lab_service_image_id'])) {
                set_post_thumbnail($post_id, intval($_POST['byt3lab_service_image_id']));
            } elseif (isset($_POST['byt3lab_service_image']) && empty($_POST['byt3lab_service_image'])) {
                delete_post_thumbnail($post_id);
            }
        }
    }

    // 5. Postes & Recrutement (Carrières)
    if (isset($_POST['byt3lab_job_nonce']) && wp_verify_nonce($_POST['byt3lab_job_nonce'], 'byt3lab_save_job_meta')) {
        if (current_user_can('edit_post', $post_id)) {
            if (isset($_POST['byt3lab_job_apply_link'])) {
                update_post_meta($post_id, '_byt3lab_job_apply_link', sanitize_text_field($_POST['byt3lab_job_apply_link']));
            }
            if (isset($_POST['byt3lab_job_department'])) {
                update_post_meta($post_id, '_byt3lab_job_department', sanitize_text_field($_POST['byt3lab_job_department']));
            }
            if (isset($_POST['byt3lab_job_contract'])) {
                update_post_meta($post_id, '_byt3lab_job_contract', sanitize_text_field($_POST['byt3lab_job_contract']));
            }
            if (isset($_POST['byt3lab_job_location'])) {
                update_post_meta($post_id, '_byt3lab_job_location', sanitize_text_field($_POST['byt3lab_job_location']));
            }
            if (isset($_POST['byt3lab_job_experience'])) {
                update_post_meta($post_id, '_byt3lab_job_experience', sanitize_text_field($_POST['byt3lab_job_experience']));
            }
            if (isset($_POST['byt3lab_job_salary'])) {
                update_post_meta($post_id, '_byt3lab_job_salary', sanitize_text_field($_POST['byt3lab_job_salary']));
            }
            if (isset($_POST['byt3lab_job_status'])) {
                update_post_meta($post_id, '_byt3lab_job_status', sanitize_text_field($_POST['byt3lab_job_status']));
            }
            if (isset($_POST['byt3lab_job_deadline'])) {
                update_post_meta($post_id, '_byt3lab_job_deadline', sanitize_text_field($_POST['byt3lab_job_deadline']));
            }
            if (isset($_POST['byt3lab_job_missions'])) {
                update_post_meta($post_id, '_byt3lab_job_missions', sanitize_textarea_field($_POST['byt3lab_job_missions']));
            }
            if (isset($_POST['byt3lab_job_requirements'])) {
                update_post_meta($post_id, '_byt3lab_job_requirements', sanitize_textarea_field($_POST['byt3lab_job_requirements']));
            }
        }
    }
}
