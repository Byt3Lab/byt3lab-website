<?php
// BYT3LAB Builder - auto-include component assets for solutions-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'solutions-body';
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

<div class="component-solutions-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at bottom left, rgba(2, 132, 199, 0.08), transparent 60%), #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Produits SaaS &amp; Progiciels Métiers</span>
            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a;">Nos Solutions Logicielles</h1>
            <p class="lead mx-auto" style="max-width: 720px; color: #475569;">
                Découvrez nos progiciels robustes, sécurisés et hautement adaptables aux défis économiques africains pour digitaliser votre organisation en toute souveraineté.
            </p>
        </div>
    </section>

    <!-- Solutions Grid Section -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <?php
            $solutions_query = new WP_Query([
                'post_type'      => 'byt3lab_solution',
                'posts_per_page' => -1,
                'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
            ]);

            $available_badges = [];
            if ($solutions_query->have_posts()) {
                foreach ($solutions_query->posts as $p) {
                    $b = get_post_meta($p->ID, '_byt3lab_solution_badge', true);
                    if (!empty($b)) {
                        $available_badges[trim($b)] = trim($b);
                    }
                }
            }
            if (empty($available_badges)) {
                $available_badges = [
                    'PROGICIEL MODULAIRE' => 'PROGICIEL MODULAIRE',
                    'GESTION SCOLAIRE'    => 'GESTION SCOLAIRE',
                    'CAISSE & COMMERCE'   => 'CAISSE & COMMERCE',
                    'INFRASTRUCTURE'      => 'INFRASTRUCTURE',
                ];
            }
            ?>

            <!-- Interactive Category / Solutions Filter Header -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5">
                <div>
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">PROGICIELS &amp; PLATEFORMES</span>
                    <h2 class="f-nasalization h2 fw-bold mb-0" style="color: #0f172a;">Filtrer par Catégorie de Solution</h2>
                </div>

                <!-- Filter Buttons -->
                <div class="d-flex flex-wrap gap-2 solutions-filter-group">
                    <button type="button" class="solution-filter-btn active" data-filter="all">Toutes les Solutions</button>
                    <?php foreach ($available_badges as $badge_key => $badge_label) : ?>
                        <button type="button" class="solution-filter-btn" data-filter="<?php echo esc_attr(strtolower(trim($badge_key))); ?>">
                            <?php echo esc_html($badge_label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($solutions_query->have_posts()) : ?>
            <div class="row g-4 text-start justify-content-center">
                <?php while ($solutions_query->have_posts()) : $solutions_query->the_post();
                    $badge        = get_post_meta(get_the_ID(), '_byt3lab_solution_badge', true) ?: 'PROGICIEL MODULAIRE';
                    $features_raw = get_post_meta(get_the_ID(), '_byt3lab_solution_features', true);
                    $url          = get_post_meta(get_the_ID(), '_byt3lab_solution_url', true);
                    $img_url      = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_post_meta(get_the_ID(), '_byt3lab_solution_image', true);
                    if (empty($img_url)) {
                        $img_url = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800';
                    }

                    $features_preview = [];
                    if (!empty($features_raw)) {
                        $lines = explode("\n", str_replace("\r", "", $features_raw));
                        foreach ($lines as $line) {
                            $line = trim($line);
                            if (!empty($line)) {
                                $parts = explode(':', $line, 2);
                                $features_preview[] = trim($parts[0]);
                                if (count($features_preview) >= 3) break;
                            }
                        }
                    }
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3 solution-item-col" data-category="<?php echo esc_attr(strtolower(trim($badge))); ?>" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <!-- Solution Image Banner -->
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover" style="transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='none'" />
                                
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        <?php echo esc_html($badge); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue f-nasalization"><?php the_title(); ?></a>
                                </h3>
                                
                                <p class="small mb-3" style="color: #334155; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    <?php echo esc_html(wp_strip_all_tags(get_the_excerpt() ?: get_the_content())); ?>
                                </p>

                                <?php if (!empty($features_preview)) : ?>
                                    <div class="d-flex flex-column gap-1 mb-2 pt-2 border-top border-light">
                                        <?php foreach ($features_preview as $feat_title) : ?>
                                             <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;">
                                                <span style="color: #059669; font-weight: bold;">✓</span>
                                                <span class="text-truncate"><?php echo esc_html($feat_title); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="p-4 pt-0">
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir la solution &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <?php else : ?>
            <!-- Fallback Cards if query returns empty -->
            <div class="row g-4 text-start justify-content-center">
                
                <!-- Fallback 1: Melodi ERP -->
                <div class="col-md-6 col-lg-4 col-xl-3 solution-item-col" data-category="progiciel modulaire" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800" alt="Melodi ERP" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        PROGICIEL MODULAIRE
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">
                                    <a href="<?php echo esc_url(home_url('/solutions/melodi-erp/')); ?>" class="text-decoration-none text-dark hover-blue f-nasalization">Melodi ERP</a>
                                </h3>
                                <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                    Progiciel de gestion d'entreprise modulaire et auto-hébergé : facturation, point de vente POS, comptabilité et CRM souverain.
                                </p>
                                <div class="d-flex flex-column gap-1 mb-2 pt-2 border-top border-light">
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Facturation &amp; POS</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Multi-dépôts &amp; Stock</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Hébergement Souverain</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 pt-0">
                            <a href="<?php echo esc_url(home_url('/solutions/melodi-erp/')); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir la solution &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Fallback 2: SUKU School System -->
                <div class="col-md-6 col-lg-4 col-xl-3 solution-item-col" data-category="gestion scolaire" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=800" alt="SUKU School System" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        GESTION SCOLAIRE
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">
                                    <a href="<?php echo esc_url(home_url('/solutions/suku/')); ?>" class="text-decoration-none text-dark hover-blue f-nasalization">SUKU</a>
                                </h3>
                                <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                    Écosystème complet pour établissements scolaires : inscriptions, frais de scolarité, bulletins numériques et espace parents.
                                </p>
                                <div class="d-flex flex-column gap-1 mb-2 pt-2 border-top border-light">
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Inscriptions &amp; Scolarité</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Bulletins Automatisés</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Espace Parents en direct</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 pt-0">
                            <a href="<?php echo esc_url(home_url('/solutions/suku/')); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir la solution &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Fallback 3: Melodi POS & Retail -->
                <div class="col-md-6 col-lg-4 col-xl-3 solution-item-col" data-category="caisse & commerce" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <img src="https://images.unsplash.com/photo-1556742049-0a67c5574f73?q=80&w=800" alt="Melodi POS" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        CAISSE &amp; COMMERCE
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">
                                    <a href="<?php echo esc_url(home_url('/solutions/melodi-pos/')); ?>" class="text-decoration-none text-dark hover-blue f-nasalization">Melodi POS</a>
                                </h3>
                                <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                    Caisse tactile connectée avec fonctionnement autonome hors-ligne, gestion multi-boutiques et impression ticket thermique.
                                </p>
                                <div class="d-flex flex-column gap-1 mb-2 pt-2 border-top border-light">
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Mode Hors-Ligne Résilient</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Scan Code-barres &amp; POS</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Clôture de Caisse Z</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 pt-0">
                            <a href="<?php echo esc_url(home_url('/solutions/melodi-pos/')); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir la solution &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Fallback 4: Byt3 Cloud Suite -->
                <div class="col-md-6 col-lg-4 col-xl-3 solution-item-col" data-category="infrastructure" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800" alt="Byt3 Cloud" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        INFRASTRUCTURE
                                    </span>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">
                                    <a href="<?php echo esc_url(home_url('/solutions/byt3-cloud/')); ?>" class="text-decoration-none text-dark hover-blue f-nasalization">Byt3 Cloud</a>
                                </h3>
                                <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                    Environnement cloud privé, clusters Kubernetes isolés, chiffrement des données et sauvegardes déportées quotidiennes.
                                </p>
                                <div class="d-flex flex-column gap-1 mb-2 pt-2 border-top border-light">
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Données Souveraines</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Redondance 99.9%</div>
                                    <div class="d-flex align-items-center gap-2 small text-muted" style="font-size: 12px;"><span style="color: #059669; font-weight: bold;">✓</span> Surveillance Proactive 24/7</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 pt-0">
                            <a href="<?php echo esc_url(home_url('/solutions/byt3-cloud/')); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir la solution &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="py-5 text-center text-white" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container py-4">
            <span class="badge px-3 py-1 rounded-pill font-monospace mb-3" style="background: rgba(2, 132, 199, 0.2); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.4);">
                SUR-MESURE &amp; DÉMO
            </span>
            <h2 class="f-nasalization display-6 fw-bold mb-3" style="color: #ffffff;">Vous recherchez un Progiciel Spécifique ?</h2>
            <p class="lead mx-auto mb-4" style="max-width: 650px; color: #94a3b8; font-size: 16px;">
                Nos consultants analysent vos besoins métiers pour vous proposer une solution adaptée ou concevoir un module sur-mesure.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary font-monospace py-2 px-4 fw-semibold" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                    Demander une démo privée &rarr;
                </a>
                <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light font-monospace py-2 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 8px; font-size: 14px;">
                    <span>WhatsApp Ingénierie</span>
                </a>
            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>
