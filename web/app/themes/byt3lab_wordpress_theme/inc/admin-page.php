<?php
/**
 * BYT3LAB Theme - Administration Page & Hub
 * Page d'administration dédiée pour gérer les Projets Réalisés, Solutions et Membres de l'équipe.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'byt3lab_register_admin_hub_menu');

function byt3lab_register_admin_hub_menu() {
    // Menu Principal
    add_menu_page(
        __('BYT3LAB Contenu', 'byt3lab_wordpress_theme'),
        __('BYT3LAB Contenu', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'byt3lab-content-hub',
        'byt3lab_render_admin_hub_page',
        'dashicons-networking',
        25
    );

    // Sous-menu 1 : Tableau de bord
    add_submenu_page(
        'byt3lab-content-hub',
        __('Vue d\'ensemble', 'byt3lab_wordpress_theme'),
        __('Vue d\'ensemble', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'byt3lab-content-hub',
        'byt3lab_render_admin_hub_page'
    );

    // Sous-menu 2 : Projets Réalisés
    add_submenu_page(
        'byt3lab-content-hub',
        __('Projets Réalisés', 'byt3lab_wordpress_theme'),
        __('Projets Réalisés', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'edit.php?post_type=byt3lab_project'
    );

    // Sous-menu 3 : Solutions Logicielles
    add_submenu_page(
        'byt3lab-content-hub',
        __('Solutions Logicielles', 'byt3lab_wordpress_theme'),
        __('Solutions Logicielles', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'edit.php?post_type=byt3lab_solution'
    );

    // Sous-menu 4 : Services & Ingénierie
    add_submenu_page(
        'byt3lab-content-hub',
        __('Services & Ingénierie', 'byt3lab_wordpress_theme'),
        __('Services & Offres', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'edit.php?post_type=byt3lab_service'
    );

    // Sous-menu 5 : Filiales & Départements
    add_submenu_page(
        'byt3lab-content-hub',
        __('Filiales & Départements', 'byt3lab_wordpress_theme'),
        __('Filiales (Services)', 'byt3lab_wordpress_theme'),
        'manage_categories',
        'edit-tags.php?taxonomy=byt3lab_service_branch&post_type=byt3lab_service'
    );

    // Sous-menu 6 : Membres de l'Équipe
    add_submenu_page(
        'byt3lab-content-hub',
        __('Membres de l\'Équipe', 'byt3lab_wordpress_theme'),
        __('Membres de l\'Équipe', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'edit.php?post_type=byt3lab_team'
    );

    // Sous-menu 7 : Offres d'Emploi / Carrières
    add_submenu_page(
        'byt3lab-content-hub',
        __('Offres d\'Emploi & Recrutement', 'byt3lab_wordpress_theme'),
        __('Offres d\'Emploi', 'byt3lab_wordpress_theme'),
        'edit_posts',
        'edit.php?post_type=byt3lab_job'
    );

    // Sous-menu 8 : Messages & Demandes Reçues (Formulaire Contact)
    $new_messages_count = count(get_posts([
        'post_type'      => 'byt3lab_message',
        'meta_key'       => '_byt3lab_msg_status',
        'meta_value'     => 'new',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ]));

    $badge_html = $new_messages_count > 0 
        ? ' <span class="update-plugins count-' . $new_messages_count . '" style="background:#10b981; color:#fff; border-radius:10px; padding:1px 6px; font-size:10px; font-weight:700;"><span class="plugin-count">' . $new_messages_count . '</span></span>' 
        : '';

    add_submenu_page(
        'byt3lab-content-hub',
        __('Messages Reçus', 'byt3lab_wordpress_theme'),
        __('Messages Reçus', 'byt3lab_wordpress_theme') . $badge_html,
        'edit_posts',
        'edit.php?post_type=byt3lab_message'
    );
}

function byt3lab_render_admin_hub_page() {
    $count_projects  = wp_count_posts('byt3lab_project')->publish ?? 0;
    $count_solutions = wp_count_posts('byt3lab_solution')->publish ?? 0;
    $count_services  = wp_count_posts('byt3lab_service')->publish ?? 0;
    $count_team      = wp_count_posts('byt3lab_team')->publish ?? 0;
    $count_jobs      = wp_count_posts('byt3lab_job')->publish ?? 0;
    $count_messages  = wp_count_posts('byt3lab_message')->publish ?? 0;

    $recent_projects = get_posts([
        'post_type'      => 'byt3lab_project',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
    ]);

    $recent_solutions = get_posts([
        'post_type'      => 'byt3lab_solution',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
    ]);

    $recent_services = get_posts([
        'post_type'      => 'byt3lab_service',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
    ]);

    $recent_team = get_posts([
        'post_type'      => 'byt3lab_team',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
    ]);

    $recent_jobs = get_posts([
        'post_type'      => 'byt3lab_job',
        'posts_per_page' => 5,
        'post_status'    => ['publish', 'draft'],
    ]);

    $recent_messages = get_posts([
        'post_type'      => 'byt3lab_message',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ]);
    ?>
    <div class="wrap" style="max-width: 1200px; margin-top: 20px;">
        
        <!-- Header Banner -->
        <div style="background: linear-gradient(135deg, #0b0f19 0%, #0f172a 100%); color: #ffffff; padding: 30px; border-radius: 12px; border-left: 5px solid #38bdf8; box-shadow: 0 10px 30px rgba(0,0,0,0.15); margin-bottom: 25px;">
            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 15px;">
                <div>
                    <span style="font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 700; color: #38bdf8; display: block; margin-bottom: 5px;">BYT3LAB MANAGEMENT</span>
                    <h1 style="color: #ffffff; margin: 0; font-size: 28px; font-weight: 800; letter-spacing: -0.5px;">Gestionnaire de Contenu &amp; Vitrine</h1>
                    <p style="color: #94a3b8; margin: 6px 0 0 0; font-size: 14px;">Administrez les offres d'emploi &amp; candidatures, services, projets, progiciels et la présentation de l'équipe.</p>
                </div>
                <div style="display: flex; gap: 10px;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="button" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #fff;">Voir le site en direct &rarr;</a>
                </div>
            </div>
        </div>

        <!-- 4 Metrics & Quick Add Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 30px;">
            
            <!-- Services -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(16, 185, 129, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #059669;">🛠️</span>
                        <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_services); ?></span>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Services &amp; Ingénierie</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Offres classées par filiales : Software, Cybersécurité, Cloud, Design NGRAFIX.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <div style="display: flex; gap: 8px;">
                        <a href="<?php echo esc_url(admin_url('post-new.php?post_type=byt3lab_service')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; flex: 1; text-align: center;">+ Nouveau Service</a>
                        <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_service')); ?>" class="button">Liste</a>
                    </div>
                    <a href="<?php echo esc_url(admin_url('edit-tags.php?taxonomy=byt3lab_service_branch&post_type=byt3lab_service')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600; text-align: center; margin-top: 4px;">
                        🏷️ Gérer les Filiales / Départements &rarr;
                    </a>
                </div>
            </div>

            <!-- Projets -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(2, 132, 199, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #0284c7;">📁</span>
                        <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_projects); ?></span>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Projets Réalisés</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Portfolio des références clients, architectures cloud, audits et applications déployées.</p>
                </div>
                <div style="display: flex; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <a href="<?php echo esc_url(admin_url('post-new.php?post_type=byt3lab_project')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; flex: 1; text-align: center;">+ Nouveau</a>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_project')); ?>" class="button">Liste</a>
                </div>
            </div>

            <!-- Solutions -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(56, 189, 248, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #0284c7;">☁️</span>
                        <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_solutions); ?></span>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Solutions Logicielles</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Progiciels et produits technologiques phares (Melodi ERP, SUKU Scolaire, etc.).</p>
                </div>
                <div style="display: flex; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <a href="<?php echo esc_url(admin_url('post-new.php?post_type=byt3lab_solution')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; flex: 1; text-align: center;">+ Nouvelle</a>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_solution')); ?>" class="button">Liste</a>
                </div>
            </div>

            <!-- Membres -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(168, 85, 247, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #9333ea;">👥</span>
                        <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_team); ?></span>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Membres de l'Équipe</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Trombinoscope, rôles stratégiques, compétences clés et réseaux des collaborateurs.</p>
                </div>
                <div style="display: flex; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <a href="<?php echo esc_url(admin_url('post-new.php?post_type=byt3lab_team')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; flex: 1; text-align: center;">+ Nouveau</a>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_team')); ?>" class="button">Liste</a>
                </div>
            </div>

            <!-- Postes & Recrutement -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(34, 197, 94, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #16a34a;">💼</span>
                        <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_jobs); ?></span>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Postes &amp; Recrutement</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Offres d'emploi ouvertes, liens d'envoi de CV (email, formulaire, WhatsApp) et descriptions des postes.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <div style="display: flex; gap: 8px;">
                        <a href="<?php echo esc_url(admin_url('post-new.php?post_type=byt3lab_job')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; flex: 1; text-align: center;">+ Publier un Poste</a>
                        <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_job')); ?>" class="button">Liste</a>
                    </div>
                    <a href="<?php echo esc_url(home_url('/carriere/')); ?>" target="_blank" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600; text-align: center; margin-top: 4px;">
                        👀 Voir la page Carrières &rarr;
                    </a>
                </div>
            </div>

            <!-- Messages & Demandes Reçues -->
            <div style="background: #ffffff; border: 1.5px solid <?php echo $new_messages_count > 0 ? '#10b981' : '#e2e8f0'; ?>; border-radius: 12px; padding: 22px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <span style="font-size: 24px; background: rgba(14, 165, 233, 0.1); width: 44px; height: 44px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; color: #0284c7;">✉️</span>
                        <div style="text-align: right;">
                            <span style="font-size: 32px; font-weight: 800; color: #0f172a;"><?php echo esc_html($count_messages); ?></span>
                            <?php if ($new_messages_count > 0) : ?>
                                <span style="display: block; background: #10b981; color: #fff; font-size: 10px; font-weight: 700; border-radius: 10px; padding: 2px 8px; margin-top: 2px;"><?php echo esc_html($new_messages_count); ?> Nouveau(x)</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h2 style="font-size: 18px; margin: 0 0 8px 0; color: #0f172a; font-weight: 700;">Messages &amp; Devis Reçus</h2>
                    <p style="color: #64748b; font-size: 13px; margin: 0 0 20px 0;">Demandes de démos (Melodi, SUKU), devis et prises de contact web.</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_message')); ?>" class="button button-primary" style="background: #0284c7; border-color: #0284c7; text-align: center; font-weight: 600;">
                        📥 Boîte de Réception (<?php echo esc_html($count_messages); ?>)
                    </a>
                </div>
            </div>

        </div>

        <!-- Recent Overview Tables -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 20px;">
            
            <!-- Messages Reçus Récents -->
            <div style="background: #fff; border: 1.5px solid <?php echo $new_messages_count > 0 ? '#bbf7d0' : '#e2e8f0'; ?>; border-radius: 12px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Derniers Messages &amp; Devis Reçus</h3>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_message')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600;">Tout voir &rarr;</a>
                </div>
                <?php if (!empty($recent_messages)) : ?>
                    <table class="widefat striped" style="border: none;">
                        <thead>
                            <tr>
                                <th>Demandeur</th>
                                <th>Objet</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_messages as $m) : 
                                $name    = get_post_meta($m->ID, '_byt3lab_msg_name', true) ?: $m->post_title;
                                $subject = get_post_meta($m->ID, '_byt3lab_msg_subject', true) ?: 'Contact';
                                $status  = get_post_meta($m->ID, '_byt3lab_msg_status', true) ?: 'new';
                            ?>
                                <tr>
                                    <td><strong><?php echo esc_html($name); ?></strong></td>
                                    <td><span style="font-size: 11px; background: rgba(2, 132, 199, 0.1); color: #0284c7; padding: 2px 6px; border-radius: 4px;"><?php echo esc_html($subject); ?></span></td>
                                    <td>
                                        <?php if ($status === 'new') : ?>
                                            <span style="font-size: 10px; background: rgba(16, 185, 129, 0.2); color: #059669; font-weight: 700; padding: 2px 6px; border-radius: 4px;">NOUVEAU</span>
                                        <?php else : ?>
                                            <span style="font-size: 10px; background: #f1f5f9; color: #64748b; padding: 2px 6px; border-radius: 4px;">LU</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo esc_url(get_edit_post_link($m->ID)); ?>">Lire</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 20px; text-align: center; color: #94a3b8; background: #f8fafc; border-radius: 8px;">
                        <em>Aucun message reçu pour le moment. Les demandes du formulaire de contact apparaîtront ici.</em>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Offres d'Emploi Récentes -->
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Dernières Offres d'Emploi</h3>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_job')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600;">Tout voir &rarr;</a>
                </div>
                <?php if (!empty($recent_jobs)) : ?>
                    <table class="widefat striped" style="border: none;">
                        <thead>
                            <tr>
                                <th>Titre du Poste</th>
                                <th>Département &amp; Contrat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_jobs as $j) : 
                                $dept     = get_post_meta($j->ID, '_byt3lab_job_department', true) ?: 'Byt3lab Tech';
                                $contract = get_post_meta($j->ID, '_byt3lab_job_contract', true) ?: 'CDI';
                            ?>
                                <tr>
                                    <td><strong><?php echo esc_html($j->post_title); ?></strong></td>
                                    <td>
                                        <span style="font-size: 11px; background: rgba(2, 132, 199, 0.1); color: #0284c7; padding: 2px 6px; border-radius: 4px; font-weight: 600;"><?php echo esc_html($dept); ?></span>
                                        <span style="font-size: 11px; background: #f1f5f9; color: #475569; padding: 2px 6px; border-radius: 4px;"><?php echo esc_html($contract); ?></span>
                                    </td>
                                    <td><a href="<?php echo esc_url(get_edit_post_link($j->ID)); ?>">Modifier</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 20px; text-align: center; color: #94a3b8; background: #f8fafc; border-radius: 8px;">
                        <em>Aucune offre d'emploi publiée pour le moment. Les offres par défaut sont affichées sur le site.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Services -->
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Derniers Services</h3>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_service')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600;">Tout voir &rarr;</a>
                </div>
                <?php if (!empty($recent_services)) : ?>
                    <table class="widefat striped" style="border: none;">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Filiale / Pôle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_services as $s) : 
                                $branch = get_post_meta($s->ID, '_byt3lab_service_branch', true) ?: 'Général';
                                $icon   = get_post_meta($s->ID, '_byt3lab_service_icon', true) ?: '🛠️';
                            ?>
                                <tr>
                                    <td><?php echo esc_html($icon); ?> <strong><?php echo esc_html($s->post_title); ?></strong></td>
                                    <td><span style="font-size: 11px; background: rgba(2, 132, 199, 0.1); color: #0284c7; padding: 3px 8px; border-radius: 4px; font-weight: 600;"><?php echo esc_html($branch); ?></span></td>
                                    <td><a href="<?php echo esc_url(get_edit_post_link($s->ID)); ?>">Modifier</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 20px; text-align: center; color: #94a3b8; background: #f8fafc; border-radius: 8px;">
                        <em>Aucun service personnalisé ajouté. Les services par défaut sont affichés sur le site.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Projets Réalisés -->
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Derniers Projets</h3>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_project')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600;">Tout voir &rarr;</a>
                </div>
                <?php if (!empty($recent_projects)) : ?>
                    <table class="widefat striped" style="border: none;">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Domaine</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_projects as $p) : 
                                $cat = get_post_meta($p->ID, '_byt3lab_project_category', true) ?: '-';
                            ?>
                                <tr>
                                    <td><strong><?php echo esc_html($p->post_title); ?></strong></td>
                                    <td><span style="font-size: 11px; background: #f1f5f9; padding: 2px 6px; border-radius: 4px;"><?php echo esc_html($cat); ?></span></td>
                                    <td><a href="<?php echo esc_url(get_edit_post_link($p->ID)); ?>">Modifier</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 20px; text-align: center; color: #94a3b8; background: #f8fafc; border-radius: 8px;">
                        <em>Aucun projet créé pour l'instant. Les projets par défaut sont actuellement affichés sur le site.</em>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Équipe -->
            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">Membres de l'Équipe</h3>
                    <a href="<?php echo esc_url(admin_url('edit.php?post_type=byt3lab_team')); ?>" style="font-size: 12px; text-decoration: none; color: #0284c7; font-weight: 600;">Tout voir &rarr;</a>
                </div>
                <?php if (!empty($recent_team)) : ?>
                    <table class="widefat striped" style="border: none;">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Poste</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_team as $m) : 
                                $role = get_post_meta($m->ID, '_byt3lab_team_role', true) ?: '-';
                            ?>
                                <tr>
                                    <td><strong><?php echo esc_html($m->post_title); ?></strong></td>
                                    <td><?php echo esc_html($role); ?></td>
                                    <td><a href="<?php echo esc_url(get_edit_post_link($m->ID)); ?>">Modifier</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div style="padding: 20px; text-align: center; color: #94a3b8; background: #f8fafc; border-radius: 8px;">
                        <em>Aucun membre d'équipe enregistré.</em>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>
    <?php
}
