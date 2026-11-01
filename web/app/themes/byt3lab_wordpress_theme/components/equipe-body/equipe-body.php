<?php
// BYT3LAB Builder - auto-include component assets for equipe-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'equipe-body';
$__byt3lab_css_path = get_stylesheet_directory() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.css';
$__byt3lab_js_path = get_stylesheet_directory() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.js';
$__byt3lab_css_uri = get_stylesheet_directory_uri() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.css';
$__byt3lab_js_uri = get_stylesheet_directory_uri() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.js';
if (file_exists($__byt3lab_css_path) && !in_array($__byt3lab_css_uri, $GLOBALS['byt3lab_assets_printed']['css'])) {
    echo '<link rel="stylesheet" href="' . esc_url($__byt3lab_css_uri) . '" />' . "\n";
    $GLOBALS['byt3lab_assets_printed']['css'][] = $__byt3lab_css_uri;
}
if (file_exists($__byt3lab_js_path) && !in_array($__byt3lab_js_uri, $GLOBALS['byt3lab_assets_printed']['js'])) {
    echo '<script src="' . esc_url($__byt3lab_js_uri) . '"></script>' . "\n";
    $GLOBALS['byt3lab_assets_printed']['js'][] = $__byt3lab_js_uri;
}
?>

<div class="component-equipe-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden equipe-hero-bg">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="mb-3 d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); border: 1px solid rgba(2, 132, 199, 0.25);">
                <span class="font-monospace fw-semibold" style="color: #0284c7; font-size: 12px; letter-spacing: 0.5px;">
                    CAPITAL HUMAIN &amp; EXCELLENCE
                </span>
            </div>

            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a; line-height: 1.15;">
                Les Talents Derrière <span style="background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">BYT3LAB</span>
            </h1>

            <p class="lead mx-auto mb-4" style="max-width: 780px; color: #475569; font-size: 18px; line-height: 1.7;">
                Architectes logiciels, ingénieurs cloud, designers d'expérience et stratèges de marque : découvrez l'équipe multidisciplinaire qui imagine, développe et sécurise vos solutions technologiques de demain.
            </p>

            <!-- Telemetry Chips Row -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                    ⚡ <strong>Byt3lab Tech</strong> : Ingénierie &amp; Cloud
                </div>
                <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                    🎨 <strong>Ngrafix Studio</strong> : Design &amp; Communication
                </div>
                <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                    💼 <strong>Conseil</strong> : Audit &amp; Stratégie SI
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Grid Section -->
    <section class="py-5" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4">
            
            <?php
            $team_query = new WP_Query([
                'post_type'      => 'byt3lab_team',
                'posts_per_page' => -1,
                'orderby'        => ['menu_order' => 'ASC', 'date' => 'ASC'],
            ]);

            $available_depts = [];
            if ($team_query->have_posts()) {
                foreach ($team_query->posts as $p) {
                    $d = get_post_meta($p->ID, '_byt3lab_team_department', true);
                    if (!empty($d)) {
                        $available_depts[trim($d)] = trim($d);
                    }
                }
            }

            if (empty($available_depts)) {
                $available_depts = [
                    'Direction & R&D'     => 'Direction & R&D',
                    'Byt3lab Tech'        => 'Byt3lab Tech',
                    'Ngrafix Studio'      => 'Ngrafix Studio',
                    'Conseil & Stratégie' => 'Conseil & Stratégie',
                ];
            } else {
                if (!isset($available_depts['Byt3lab Tech'])) $available_depts['Byt3lab Tech'] = 'Byt3lab Tech';
                if (!isset($available_depts['Ngrafix Studio']) && !isset($available_depts['Ngrafix'])) $available_depts['Ngrafix Studio'] = 'Ngrafix Studio';
            }
            ?>

            <!-- Department Filter Buttons Header -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5 text-start">
                <div>
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">ANNUAIRE DES COLLABORATEURS</span>
                    <h2 class="f-nasalization h2 fw-bold mb-0" style="color: #0f172a;">Filtrer par Pôle &amp; Spécialité</h2>
                </div>

                <!-- Filter Buttons -->
                <div class="d-flex flex-wrap gap-2 team-filter-group">
                    <button type="button" class="team-filter-btn active" data-filter="all">Tous les Membres</button>
                    <?php foreach ($available_depts as $dept_key => $dept_label) : ?>
                        <button type="button" class="team-filter-btn" data-filter="<?php echo esc_attr(strtolower(trim($dept_key))); ?>">
                            <?php echo esc_html($dept_label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Team Cards Grid -->
            <div class="row g-4 text-start justify-content-center">
                <?php
                if ($team_query->have_posts()) :
                    while ($team_query->have_posts()) : $team_query->the_post();
                        $role         = get_post_meta(get_the_ID(), '_byt3lab_team_role', true) ?: 'Ingénieur Tech';
                        $dept         = get_post_meta(get_the_ID(), '_byt3lab_team_department', true) ?: 'Byt3lab Tech';
                        $bio          = get_post_meta(get_the_ID(), '_byt3lab_team_bio_short', true);
                        $linkedin     = get_post_meta(get_the_ID(), '_byt3lab_team_linkedin', true);
                        $github       = get_post_meta(get_the_ID(), '_byt3lab_team_github', true);
                        $twitter      = get_post_meta(get_the_ID(), '_byt3lab_team_twitter', true);
                        $whatsapp     = get_post_meta(get_the_ID(), '_byt3lab_team_whatsapp', true);
                        $custom_photo = get_post_meta(get_the_ID(), '_byt3lab_team_photo', true);
                        $avatar_url   = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : (!empty($custom_photo) ? $custom_photo : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400');
                ?>
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="<?php echo esc_attr(strtolower(trim($dept))); ?>" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php the_title_attribute(); ?>" class="team-avatar-img" />
                            </div>
                            
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                <?php echo esc_html($dept); ?>
                            </span>

                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                            </h3>

                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;"><?php echo esc_html($role); ?></div>
                            
                            <?php if (!empty($bio)) : ?>
                                <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;"><?php echo esc_html($bio); ?></p>
                            <?php endif; ?>

                            <!-- Social Profiles & Action Links -->
                            <div class="d-flex justify-content-center align-items-center gap-2 mt-auto pt-3 border-top border-light">
                                <?php if (!empty($linkedin)) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($github)) : ?>
                                    <a href="<?php echo esc_url($github); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" title="GitHub">
                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($twitter)) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" title="Twitter / X">
                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($whatsapp)) : ?>
                                    <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $whatsapp)); ?>" target="_blank" rel="noopener noreferrer" class="team-social-link" title="WhatsApp">
                                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                                    </a>
                                <?php endif; ?>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px;">
                                    Fiche &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // High quality fallback profiles
                ?>
                    <!-- Fallback 1: G. Gaëtan -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="direction & r&d" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400" alt="G. Gaëtan" class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                Direction &amp; R&amp;D
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">G. Gaëtan</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Fondateur &amp; Architecte Système</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Concepteur des infrastructures distribuées et des moteurs souverains BYT3lab. Spécialisé en Cloud DevOps, Cybersécurité et Architectures scalables.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="GitHub">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px;">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 2: Alexandre N. -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="byt3lab tech" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400" alt="Alexandre N." class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                Byt3lab Tech
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">Alexandre N.</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Lead Développeur Fullstack</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Expert en développement d'ERP d'entreprise, API robustes et moteurs de facturation transactionnels pour la gamme Melodi.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="GitHub">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px;">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 3: Sarah M. -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="ngrafix studio" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=400" alt="Sarah M." class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(147, 51, 234, 0.08); color: #9333ea; font-size: 11px;">
                                Ngrafix Studio
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">Sarah M.</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Directrice Artistique &amp; UI/UX</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Pilote la cohérence visuelle, le branding institutionnel et la recherche ergonomique Figma pour toutes les applications clientes.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener noreferrer" class="team-social-link" title="Facebook Ngrafix Studio" style="color: #1877F2;">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px; color: #9333ea; border-color: rgba(147, 51, 234, 0.4);">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 4: David E. -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="byt3lab tech" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400" alt="David E." class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                Byt3lab Tech
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">David E.</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Ingénieur DevOps &amp; Cloud</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Gestion des clusters Kubernetes, pipelines CI/CD automatisés et maintien en condition opérationnelle 24/7 des serveurs souverains.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="GitHub">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px;">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 5: Estelle K. -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="conseil & stratégie" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=400" alt="Estelle K." class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                Conseil &amp; Stratégie
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">Estelle K.</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Consultante Cybersécurité &amp; Audit SI</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Évaluation de la posture de sécurité, mise en conformité réglementaire et audits d'isolation réseau pour institutions financières et administrations.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px;">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Fallback 6: Kevin T. -->
                    <div class="col-md-6 col-lg-4 col-xl-4 team-item-col" data-dept="ngrafix studio" style="transition: all 0.3s ease;">
                        <div class="team-member-card h-100 d-flex flex-column">
                            <div class="team-avatar-wrapper">
                                <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?q=80&w=400" alt="Kevin T." class="team-avatar-img" />
                            </div>
                            <span class="badge px-3 py-1 rounded-pill font-monospace mb-2 mx-auto" style="background: rgba(147, 51, 234, 0.08); color: #9333ea; font-size: 11px;">
                                Ngrafix Studio
                            </span>
                            <h3 class="f-nasalization h4 fw-bold mb-1 text-center" style="color: #0f172a;">Kevin T.</h3>
                            <div class="small fw-semibold mb-3 font-monospace text-center" style="color: #64748b;">Motion Designer &amp; Créateur de Contenu</div>
                            <p class="small mb-4 text-center" style="color: #334155; line-height: 1.6;">
                                Réalisation de contenus audiovisuels captivants, animations 3D et campagnes marketing percutantes pour amplifier l'impact visuel de nos clients.
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">
                                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="team-social-link" title="LinkedIn">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45c-.9 0-1.63.73-1.63 1.63 0 .9.73 1.63 1.63 1.63.9 0 1.63-.73 1.63-1.63 0-.9-.73-1.63-1.63-1.63z"/></svg>
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener noreferrer" class="team-social-link" title="Facebook Ngrafix Studio" style="color: #1877F2;">
                                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-primary ms-auto font-monospace px-3 py-1" style="font-size: 12px; border-radius: 6px; color: #9333ea; border-color: rgba(147, 51, 234, 0.4);">
                                    Contacter &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Team Values & Culture Section -->
    <section class="py-5" style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            <div class="text-center mb-5">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">NOTRE ADN</span>
                <h2 class="f-nasalization h1 fw-bold" style="color: #0f172a;">Ce Qui Fédère Notre Équipe</h2>
                <p class="mx-auto mt-2" style="max-width: 680px; color: #64748b;">
                    Au-delà des compétences techniques pointues, nos équipes partagent des valeurs fondamentales au cœur de chaque ligne de code et de chaque création.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon-box">🛡️</div>
                        <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">Rigueur &amp; Excellence</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Nous appliquons une discipline d'ingénierie stricte : revues de code systématiques, tests automatisés et architectures conçues pour durer.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon-box">🌍</div>
                        <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">Souveraineté &amp; Impact</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Construire des outils qui garantissent l'indépendance numérique de l'Afrique et résolvent les défis concrets des entreprises locales.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon-box">🚀</div>
                        <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">Apprentissage Continu</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Veille technologique permanente, partage des connaissances et émulation mutuelle pour rester à la pointe des innovations mondiales.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us CTA Banner -->
    <section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="container py-4">
            <span class="badge px-3 py-1 rounded-pill font-monospace mb-3" style="background: rgba(2, 132, 199, 0.2); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.4);">
                RECRUTEMENT &amp; COLLABORATION
            </span>
            <h2 class="f-nasalization display-6 fw-bold mb-3" style="color: #ffffff;">Envie de Rejoindre l'Équipe BYT3LAB ?</h2>
            <p class="lead mx-auto mb-4" style="max-width: 680px; color: #94a3b8; font-size: 16px;">
                Nous sommes continuellement à la recherche d'ingénieurs passionnés, de designers créatifs et de consultants talentueux pour relever les plus grands défis technologiques.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="<?php echo esc_url(home_url('/carriere/')); ?>" class="btn btn-primary font-monospace py-2 px-4 fw-semibold" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                    Consulter nos offres d'emploi &rarr;
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-light font-monospace py-2 px-4 fw-semibold" style="border-radius: 8px; font-size: 14px;">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>
