<?php
// BYT3LAB Builder - auto-include component assets for realisations-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'realisations-body';
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

<div class="component-realisations-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at bottom left, rgba(2, 132, 199, 0.08), transparent 60%), #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;" data-bs-toggle="tooltip" title="Références & Succès Clients">Nos Références</span>
            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a;">Projets Réalisés</h1>
            <p class="lead mx-auto" style="max-width: 700px; color: #475569;">
                Découvrez comment nous avons accompagné nos partenaires dans le développement de leurs produits technologiques et la sécurisation de leurs infrastructures.
            </p>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <div class="row g-4 text-start">
                
                <?php
                // Requête dynamique sur les CPT byt3lab_project
                $projects_query = new WP_Query([
                    'post_type'      => 'byt3lab_project',
                    'posts_per_page' => 12,
                    'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
                ]);

                $available_categories = [];
                if ($projects_query->have_posts()) {
                    foreach ($projects_query->posts as $p) {
                        $c = get_post_meta($p->ID, '_byt3lab_project_category', true);
                        if (!empty($c)) {
                            $available_categories[trim($c)] = trim($c);
                        }
                    }
                }
                if (empty($available_categories)) {
                    $available_categories = [
                        'EDTECH'        => 'EDTECH',
                        'FINTECH'       => 'FINTECH',
                        'CYBERSÉCURITÉ' => 'CYBERSÉCURITÉ',
                        'LOGICIEL ERP'  => 'LOGICIEL ERP',
                    ];
                }
                ?>

                <!-- Interactive Domain / Category Filters Header -->
                <div class="col-12 mb-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">PORTFOLIO &amp; ÉTUDES DE CAS</span>
                            <h2 class="f-nasalization h2 fw-bold mb-0" style="color: #0f172a;">Filtrer par Domaine d'Intervention</h2>
                        </div>

                        <!-- Filter Buttons -->
                        <div class="d-flex flex-wrap gap-2 realisations-filter-group">
                            <button type="button" class="project-filter-btn active" data-filter="all">Tous les Projets</button>
                            <?php foreach ($available_categories as $cat_key => $cat_label) : ?>
                                <button type="button" class="project-filter-btn" data-filter="<?php echo esc_attr(strtolower(trim($cat_key))); ?>">
                                    <?php echo esc_html($cat_label); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php
                if ($projects_query->have_posts()) :
                    while ($projects_query->have_posts()) : $projects_query->the_post();
                        $category = get_post_meta(get_the_ID(), '_byt3lab_project_category', true) ?: 'TECHNOLOGIE';
                        $stack    = get_post_meta(get_the_ID(), '_byt3lab_project_stack', true) ?: 'Cloud & Software';
                        $impact   = get_post_meta(get_the_ID(), '_byt3lab_project_impact', true);
                        $url      = get_post_meta(get_the_ID(), '_byt3lab_project_url', true);
                        $img_url  = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800';
                        $stack_items = array_map('trim', explode('/', $stack));
                ?>
                    <div class="col-md-6 col-lg-6 project-item-col" data-category="<?php echo esc_attr(strtolower(trim($category))); ?>" style="transition: all 0.3s ease;">
                        <div class="card card-premium h-100 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover transition-transform" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.95); backdrop-filter: blur(8px);" data-bs-toggle="tooltip" title="Domaine d'intervention : <?php echo esc_attr($category); ?>">
                                        <?php echo esc_html($category); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <!-- Tech stack pills -->
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <?php foreach ($stack_items as $item) : if (!empty($item)) : ?>
                                            <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Technologie utilisée : <?php echo esc_attr($item); ?>">
                                                <?php echo esc_html($item); ?>
                                            </span>
                                        <?php endif; endforeach; ?>
                                    </div>
                                    <h2 class="f-nasalization h3 fw-bold mb-3">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: #0f172a; transition: color 0.2s ease;">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="mb-4" style="color: #334155; font-size: 15px; line-height: 1.6;">
                                        <?php the_content(); ?>
                                    </div>
                                </div>

                                <div>
                                    <?php if (!empty($impact)) : ?>
                                        <div class="p-3 rounded-3 mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                            <h4 class="fw-bold h6 mb-1 d-flex align-items-center gap-1" style="color: #0284c7;">
                                                <span>⚡</span> Impact clé :
                                            </h4>
                                            <p class="small mb-0" style="color: #334155;"><?php echo esc_html($impact); ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex gap-2 flex-column flex-sm-row mt-2">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary flex-grow-1 py-2 fw-bold font-monospace text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 13px;">
                                            Voir les détails &rarr;
                                        </a>
                                        <?php if (!empty($url)) : ?>
                                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-secondary py-2 px-3 fw-bold font-monospace text-center" style="border-radius: 8px; font-size: 13px;" data-bs-toggle="tooltip" title="Ouvrir le projet en direct">
                                                Lien direct ↗
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback de haute qualité si aucun CPT n'a encore été créé dans l'administration
                ?>
                    <!-- Project 1 (Fallback) -->
                    <div class="col-md-6 col-lg-6 project-item-col" data-category="edtech" style="transition: all 0.3s ease;">
                        <div class="card card-premium h-100 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800" alt="SUKU Platform" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.95);" data-bs-toggle="tooltip" title="Domaine : Technologie Éducative">EDTECH</span>
                                </div>
                            </div>
                            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Framework Backend">Laravel</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Framework Frontend Réactif">VueJS</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Conteneurisation Cloud">Docker</span>
                                    </div>
                                    <h2 class="f-nasalization h3 fw-bold mb-3">
                                        <a href="<?php echo esc_url(home_url('/realisations/suku/')); ?>" class="text-decoration-none" style="color: #0f172a;">Écosystème Scolaire SUKU</a>
                                    </h2>
                                    <p class="mb-4" style="color: #334155; font-size: 15px; line-height: 1.6;">
                                        Déploiement d'une plateforme SaaS centralisée pour plus de 20 établissements scolaires en Afrique Centrale. Le système gère les dossiers scolaires de 15,000+ étudiants, les évaluations, la facturation automatique de la scolarité et les notifications SMS/WhatsApp automatisées aux parents.
                                    </p>
                                </div>
                                <div>
                                    <div class="p-3 rounded-3 mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                        <h4 class="fw-bold h6 mb-1 d-flex align-items-center gap-1" style="color: #0284c7;">
                                            <span>⚡</span> Impact clé :
                                        </h4>
                                        <p class="small mb-0" style="color: #334155;">Réduction de 45% des retards de paiement scolaires et suppression totale du traitement papier des notes de classe.</p>
                                    </div>
                                    <div class="d-flex gap-2 flex-column flex-sm-row mt-2">
                                        <a href="<?php echo esc_url(home_url('/realisations/suku/')); ?>" class="btn btn-primary flex-grow-1 py-2 fw-bold font-monospace text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 13px;">
                                            Voir les détails &rarr;
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-secondary py-2 px-3 fw-bold font-monospace text-center" style="border-radius: 8px; font-size: 13px;">
                                            Projet similaire ↗
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 (Fallback) -->
                    <div class="col-md-6 col-lg-6 project-item-col" data-category="fintech" style="transition: all 0.3s ease;">
                        <div class="card card-premium h-100 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800" alt="Njangui Platform" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.95);" data-bs-toggle="tooltip" title="Domaine : Finance & Paiements Mobiles">FINTECH</span>
                                </div>
                            </div>
                            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Application Cross-Platform">Flutter</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Microservices API">Node.js</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Base NoSQL Haute Disponibilité">MongoDB</span>
                                    </div>
                                    <h2 class="f-nasalization h3 fw-bold mb-3">
                                        <a href="<?php echo esc_url(home_url('/realisations/njangui/')); ?>" class="text-decoration-none" style="color: #0f172a;">Plateforme Mobile Njangui</a>
                                    </h2>
                                    <p class="mb-4" style="color: #334155; font-size: 15px; line-height: 1.6;">
                                        Digitalisation sécurisée des tontines traditionnelles locales. L'application mobile permet aux membres de cotiser en toute sécurité via Mobile Money (Orange Money & MTN MoMo), de voter sur l'octroi d'emprunts et de suivre la trésorerie des associations avec une transparence totale.
                                    </p>
                                </div>
                                <div>
                                    <div class="p-3 rounded-3 mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                        <h4 class="fw-bold h6 mb-1 d-flex align-items-center gap-1" style="color: #0284c7;">
                                            <span>⚡</span> Impact clé :
                                        </h4>
                                        <p class="small mb-0" style="color: #334155;">Plus de $500,000 de flux financiers sécurisés et numérisés en 12 mois sans aucune faille de sécurité.</p>
                                    </div>
                                    <div class="d-flex gap-2 flex-column flex-sm-row mt-2">
                                        <a href="<?php echo esc_url(home_url('/realisations/njangui/')); ?>" class="btn btn-primary flex-grow-1 py-2 fw-bold font-monospace text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 13px;">
                                            Voir les détails &rarr;
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-secondary py-2 px-3 fw-bold font-monospace text-center" style="border-radius: 8px; font-size: 13px;">
                                            Projet similaire ↗
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 (Fallback) -->
                    <div class="col-md-6 col-lg-6 project-item-col" data-category="cybersécurité" style="transition: all 0.3s ease;">
                        <div class="card card-premium h-100 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="https://images.unsplash.com/photo-1700132806638-2dc744996a4d?q=80&w=800" alt="Cybersecurity" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.95);" data-bs-toggle="tooltip" title="Domaine : Sécurité & Audit de Vulnérabilités">CYBERSÉCURITÉ</span>
                                </div>
                            </div>
                            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Web Application Firewall">WAF</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Isolation Réseau Privée">VPC Isolation</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Infrastructure Cloud Sécurisée">AWS</span>
                                    </div>
                                    <h2 class="f-nasalization h3 fw-bold mb-3">
                                        <a href="<?php echo esc_url(home_url('/realisations/audit-microfinance/')); ?>" class="text-decoration-none" style="color: #0f172a;">Audit & Refonte IT Microfinance</a>
                                    </h2>
                                    <p class="mb-4" style="color: #334155; font-size: 15px; line-height: 1.6;">
                                        Audit d'architecture et renforcement de la sécurité cloud pour un acteur majeur de la microfinance. Nous avons implémenté une isolation réseau totale via des VPC privés, configuré un pare-feu applicatif web (WAF) pour stopper les attaques par injection et mis en place une traçabilité d'audit.
                                    </p>
                                </div>
                                <div>
                                    <div class="p-3 rounded-3 mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                        <h4 class="fw-bold h6 mb-1 d-flex align-items-center gap-1" style="color: #0284c7;">
                                            <span>⚡</span> Impact clé :
                                        </h4>
                                        <p class="small mb-0" style="color: #334155;">Mise en conformité totale aux exigences bancaires réglementaires locales et résilience totale face aux scans malveillants.</p>
                                    </div>
                                    <div class="d-flex gap-2 flex-column flex-sm-row mt-2">
                                        <a href="<?php echo esc_url(home_url('/realisations/audit-microfinance/')); ?>" class="btn btn-primary flex-grow-1 py-2 fw-bold font-monospace text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 13px;">
                                            Voir les détails &rarr;
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-secondary py-2 px-3 fw-bold font-monospace text-center" style="border-radius: 8px; font-size: 13px;">
                                            Projet similaire ↗
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 4 (Fallback) -->
                    <div class="col-md-6 col-lg-6 project-item-col" data-category="logiciel erp" style="transition: all 0.3s ease;">
                        <div class="card card-premium h-100 overflow-hidden">
                            <div class="position-relative overflow-hidden" style="height: 280px;">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800" alt="ERP Integration" class="w-100 h-100 object-fit-cover" />
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.95);" data-bs-toggle="tooltip" title="Domaine : Progiciel Intégré de Gestion">LOGICIEL ERP</span>
                                </div>
                            </div>
                            <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Langage Backend Robuste">Python</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Base de données Relationnelle">PostgreSQL</span>
                                        <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Interface Utilisateur Réactive">React</span>
                                    </div>
                                    <h2 class="f-nasalization h3 fw-bold mb-3">
                                        <a href="<?php echo esc_url(home_url('/realisations/melodi-erp-realisation/')); ?>" class="text-decoration-none" style="color: #0f172a;">Intégration Melodi ERP</a>
                                    </h2>
                                    <p class="mb-4" style="color: #334155; font-size: 15px; line-height: 1.6;">
                                        Déploiement et personnalisation de notre progiciel Melodi ERP pour un grand groupe de distribution agroalimentaire. Intégration de la facturation temps réel, synchronisation automatique des stocks de 5 entrepôts physiques et connexion aux terminaux de vente (POS).
                                    </p>
                                </div>
                                <div>
                                    <div class="p-3 rounded-3 mb-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                        <h4 class="fw-bold h6 mb-1 d-flex align-items-center gap-1" style="color: #0284c7;">
                                            <span>⚡</span> Impact clé :
                                        </h4>
                                        <p class="small mb-0" style="color: #334155;">Réduction de 30% des écarts d'inventaire et amélioration de 50% de la vitesse de préparation de commandes logistiques.</p>
                                    </div>
                                    <div class="d-flex gap-2 flex-column flex-sm-row mt-2">
                                        <a href="<?php echo esc_url(home_url('/realisations/melodi-erp-realisation/')); ?>" class="btn btn-primary flex-grow-1 py-2 fw-bold font-monospace text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 13px;">
                                            Voir les détails &rarr;
                                        </a>
                                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-secondary py-2 px-3 fw-bold font-monospace text-center" style="border-radius: 8px; font-size: 13px;">
                                            Projet similaire ↗
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>