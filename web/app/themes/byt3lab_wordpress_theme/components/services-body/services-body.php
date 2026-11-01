<?php
// BYT3LAB Builder - auto-include component assets for services-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'services-body';
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

<div class="component-services-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at bottom left, rgba(2, 132, 199, 0.08), transparent 60%), #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Notre Expertise</span>
            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a;">Nos Services & Ingénierie</h1>
            <p class="lead mx-auto" style="max-width: 700px; color: #475569;">
                Des architectures logicielles modernes, robustes et hautement sécurisées pour accélérer la croissance de vos projets technologiques.
            </p>
        </div>
    </section>

    <!-- Services Details Section - Software & Cloud -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <?php
            $services_query = new WP_Query([
                'post_type'      => 'byt3lab_service',
                'posts_per_page' => -1,
                'orderby'        => ['menu_order' => 'ASC', 'date' => 'ASC'],
            ]);

            $available_branches = [];
            if ($services_query->have_posts()) {
                foreach ($services_query->posts as $p) {
                    $b = get_post_meta($p->ID, '_byt3lab_service_branch', true);
                    if (empty($b)) {
                        $terms = wp_get_post_terms($p->ID, 'byt3lab_service_branch');
                        if (!empty($terms) && !is_wp_error($terms)) {
                            $b = $terms[0]->name;
                        }
                    }
                    if (!empty($b)) {
                        $available_branches[trim($b)] = trim($b);
                    }
                }
            }

            if (empty($available_branches)) {
                $available_branches = [
                    'Byt3lab Tech'        => 'Byt3lab Tech',
                    'Ngrafix Studio'      => 'Ngrafix Studio',
                    'Conseil & Stratégie' => 'Conseil & Stratégie',
                ];
            } else {
                if (!isset($available_branches['Byt3lab Tech'])) $available_branches['Byt3lab Tech'] = 'Byt3lab Tech';
                if (!isset($available_branches['Ngrafix Studio']) && !isset($available_branches['Ngrafix'])) $available_branches['Ngrafix Studio'] = 'Ngrafix Studio';
            }
            ?>

            <!-- Interactive Department / Branch Filters -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5">
                <div>
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">CATALOGUE DE SERVICES</span>
                    <h2 class="f-nasalization h2 fw-bold mb-0" style="color: #0f172a;">Explorez par Pôle &amp; Filiale</h2>
                </div>

                <!-- Filter Buttons -->
                <div class="d-flex flex-wrap gap-2 service-filter-group">
                    <button type="button" class="service-filter-btn active" data-filter="all">Tous les Services</button>
                    <?php foreach ($available_branches as $branch_key => $branch_label) : ?>
                        <button type="button" class="service-filter-btn" data-filter="<?php echo esc_attr(strtolower(trim($branch_key))); ?>">
                            <?php echo esc_html($branch_label); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($services_query->have_posts()) : ?>
            <div class="row g-4 text-start justify-content-center">
                <?php while ($services_query->have_posts()) : $services_query->the_post();
                    $icon       = get_post_meta(get_the_ID(), '_byt3lab_service_icon', true) ?: '💻';
                    $branch     = get_post_meta(get_the_ID(), '_byt3lab_service_branch', true);
                    $short_desc = get_post_meta(get_the_ID(), '_byt3lab_service_short_desc', true) ?: get_the_excerpt();
                    $img_url    = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_post_meta(get_the_ID(), '_byt3lab_service_image', true);
                    if (empty($branch)) {
                        $terms = wp_get_post_terms(get_the_ID(), 'byt3lab_service_branch');
                        if (!empty($terms) && !is_wp_error($terms)) {
                            $branch = $terms[0]->name;
                        } else {
                            $branch = 'Byt3lab Tech';
                        }
                    }
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3 service-item-col" data-branch="<?php echo esc_attr(strtolower(trim($branch))); ?>" style="transition: all 0.3s ease;">
                    <div class="card card-premium h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-6px)'" onmouseout="this.style.transform='none'">
                        <div>
                            <!-- Service Image Banner -->
                            <div class="position-relative overflow-hidden" style="height: 190px; background: #0f172a;">
                                <?php if (!empty($img_url)) : ?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover" style="transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='none'" />
                                <?php else : ?>
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: radial-gradient(circle at center, rgba(2, 132, 199, 0.25), #0f172a);">
                                        <span style="font-size: 48px;"><?php echo esc_html($icon); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge px-3 py-2 rounded-pill font-monospace shadow-sm" style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(8px); color: #38bdf8; font-size: 11px; border: 1px solid rgba(56, 189, 248, 0.35);">
                                        <?php echo esc_html($branch); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-4">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span style="font-size: 20px;"><?php echo esc_html($icon); ?></span>
                                    <h3 class="h5 fw-bold mb-0" style="color: #0f172a;">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-blue"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                                <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                    <?php echo esc_html($short_desc); ?>
                                </p>
                            </div>
                        </div>

                        <div class="p-4 pt-0">
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary w-100 font-monospace py-2 fw-semibold" style="font-size: 12px; border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                                Découvrir le service &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Project Management Methodologies -->
    <section class="py-5" style="background: #ffffff; border-top: 1px solid #e2e8f0;">
        <div class="container py-5 text-start">
            <div class="row mb-5 text-center">
                <div class="col-12">
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Notre Méthode</span>
                    <h2 class="f-nasalization h1 fw-bold" style="color: #0f172a;">Gestion de Projet Agile</h2>
                    <p class="mx-auto mt-2" style="max-width: 600px; color: #64748b;">
                        Découvrez comment nous transformons vos idées en logiciels d'exception grâce à notre processus structuré étape par étape.
                    </p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="position-relative">
                        <!-- Vertical line for timeline -->
                        <div class="position-absolute d-none d-md-block" style="width: 2px; background: rgba(2, 132, 199, 0.2); top: 0; bottom: 0; left: 50%; transform: translateX(-50%);"></div>

                        <!-- Step 1 -->
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-5 text-md-end">
                                <h3 class="fw-bold h4" style="color: #0f172a;">1. Analyse & Spécifications</h3>
                                <p class="mb-0 small" style="color: #475569;">Nous étudions vos flux de travail et vos besoins métiers. Nous rédigeons un cahier des charges précis et concevons des maquettes UI/UX interactives sur Figma.</p>
                            </div>
                            <div class="col-md-2 text-center my-3 my-md-0 position-relative">
                                <div class="rounded-circle bg-white border border-3 d-flex align-items-center justify-content-center mx-auto" style="width: 48px; height: 48px; border-color: #0284c7 !important;">
                                    <span class="fw-bold" style="color: #0284c7 !important;">1</span>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <!-- Step 2 -->
                        <div class="row mb-5 align-items-center flex-md-row-reverse">
                            <div class="col-md-5 text-md-start">
                                <h3 class="fw-bold h4" style="color: #0f172a;">2. Développement Agile & Sprints</h3>
                                <p class="mb-0 small" style="color: #475569;">Votre projet est divisé en modules fonctionnels livrés régulièrement. Vous suivez l'avancement via des démonstrations et des sprint reviews bi-mensuels.</p>
                            </div>
                            <div class="col-md-2 text-center my-3 my-md-0 position-relative">
                                <div class="rounded-circle bg-white border border-3 d-flex align-items-center justify-content-center mx-auto" style="width: 48px; height: 48px; border-color: #0284c7 !important;">
                                    <span class="fw-bold" style="color: #0284c7 !important;">2</span>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <!-- Step 3 -->
                        <div class="row mb-5 align-items-center">
                            <div class="col-md-5 text-md-end">
                                <h3 class="fw-bold h4" style="color: #0f172a;">3. Tests & Audit de Sécurité</h3>
                                <p class="mb-0 small" style="color: #475569;">Avant toute mise en production, nos ingénieurs effectuent des tests unitaires et d'intégration, complétés par un audit de vulnérabilités pour garantir la sécurité.</p>
                            </div>
                            <div class="col-md-2 text-center my-3 my-md-0 position-relative">
                                <div class="rounded-circle bg-white border border-3 d-flex align-items-center justify-content-center mx-auto" style="width: 48px; height: 48px; border-color: #0284c7 !important;">
                                    <span class="fw-bold" style="color: #0284c7 !important;">3</span>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>

                        <!-- Step 4 -->
                        <div class="row align-items-center flex-md-row-reverse">
                            <div class="col-md-5 text-md-start">
                                <h3 class="fw-bold h4" style="color: #0f172a;">4. Déploiement CI/CD & Maintenance</h3>
                                <p class="mb-0 small" style="color: #475569;">Déploiement automatisé sur des serveurs sécurisés et scalables. Nous assurons un support technique continu de vos applications 24h/24 et 7j/7.</p>
                            </div>
                            <div class="col-md-2 text-center my-3 my-md-0 position-relative">
                                <div class="rounded-circle bg-white border border-3 d-flex align-items-center justify-content-center mx-auto" style="width: 48px; height: 48px; border-color: #0284c7 !important;">
                                    <span class="fw-bold" style="color: #0284c7 !important;">4</span>
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>