<?php
// BYT3LAB Builder - auto-include component assets for carriere-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'carriere-body';
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

// Récupération dynamique des offres d'emploi publiées
$jobs_query = new WP_Query([
    'post_type'      => 'byt3lab_job',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'DESC',
]);

// Fallbacks de démonstration de haute qualité au cas où la base de données est vide
$fallback_jobs = [
    [
        'title'       => 'Ingénieur(e) Logiciel Full-Stack Senior',
        'slug'        => 'ingenieur-fullstack-senior',
        'dept'        => 'Byt3lab Tech',
        'contract'    => 'CDI - Temps Plein',
        'location'    => 'Douala / Hybride',
        'experience'  => 'Senior (4 à 6+ ans)',
        'salary'      => 'Selon profil & compétences + Primes',
        'status'      => 'active',
        'deadline'    => 'Recrutement continu',
        'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - Ingénieur Full-Stack Senior'),
        'desc'        => 'Conception d\'architectures logicielles modulaires et développement des progiciels métiers de BYT3LAB (Melodi ERP, SUKU) avec TypeScript, Node.js et Next.js.',
        'missions'    => ['API RESTful & micro-services scalables', 'Développement frontend Next.js / TypeScript', 'Optimisation PostgreSQL & clusters Kubernetes'],
    ],
    [
        'title'       => 'Product & UI/UX Designer',
        'slug'        => 'product-ui-ux-designer',
        'dept'        => 'Ngrafix Studio',
        'contract'    => 'CDI - Temps Plein',
        'location'    => 'Douala / Hybride ou Remote',
        'experience'  => 'Confirmé (3+ ans)',
        'salary'      => 'Compétitif + Équipement fourni',
        'status'      => 'active',
        'deadline'    => 'Recrutement continu',
        'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - Product UI-UX Designer'),
        'desc'        => 'Création des parcours utilisateurs, design systems d\'ingénierie et maquettes haute fidélité sous Figma pour nos plateformes logicielles et mobiles.',
        'missions'    => ['Design System & prototypage interactif Figma', 'Tests d\'utilisabilité & ergonomie logicielle', 'Assets graphiques et branding Ngrafix Studio'],
    ],
    [
        'title'       => 'Ingénieur(e) DevOps & Cloud Souverain',
        'slug'        => 'ingenieur-devops-cloud',
        'dept'        => 'Byt3lab Tech',
        'contract'    => 'CDI - Temps Plein',
        'location'    => 'Full Remote ou Douala',
        'experience'  => 'Confirmé / Senior (3 à 5 ans)',
        'salary'      => 'Selon profil + Primes astreinte',
        'status'      => 'active',
        'deadline'    => 'Recrutement actif',
        'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - Ingénieur DevOps'),
        'desc'        => 'Automatisation de l\'infrastructure cloud souveraine, gestion des clusters Kubernetes et sécurisation des déploiements applicatifs continus (CI/CD).',
        'missions'    => ['Orchestration Kubernetes & conteneurs Docker', 'Pipelines CI/CD sous GitHub / GitLab', 'Monitoring temps réel Prometheus/Grafana'],
    ],
    [
        'title'       => 'Développeur(se) Mobile Flutter (Stage pré-embauche)',
        'slug'        => 'developpeur-mobile-flutter-stage',
        'dept'        => 'Byt3lab Tech',
        'contract'    => 'Stage Pré-Embauche (6 mois)',
        'location'    => 'Douala, Cameroun (Présentiel)',
        'experience'  => 'Junior / Fin d\'études',
        'salary'      => 'Indemnité motivante + Embauche CDI',
        'status'      => 'urgent',
        'deadline'    => 'Poste ouvert immédiatement',
        'apply_link'  => 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - Stage Mobile Flutter'),
        'desc'        => 'Développement des applications mobiles connectées pour la gestion commerciale et scolaire, intégration des API REST et persistance hors-ligne.',
        'missions'    => ['Développement cross-platform Flutter', 'Synchronisation hors-ligne & SQLite', 'Collaboration étroite avec l\'équipe UI/UX'],
    ]
];
?>

<div class="component-carriere-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- 1. Hero Section: High-Tech Recruitment & Telemetry Header -->
    <section class="carriere-hero-bg position-relative overflow-hidden py-5">
        <div class="carriere-grid-pattern"></div>
        
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10 col-xl-9">
                    
                    <div class="mb-3 d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); border: 1px solid rgba(2, 132, 199, 0.25);">
                        <span class="status-live-pulse"></span>
                        <span class="font-monospace fw-semibold" style="color: #0284c7; font-size: 12px; letter-spacing: 0.5px;">
                            CAMPAGNE DE RECRUTEMENT INGÉNIERIE &amp; DESIGN
                        </span>
                    </div>

                    <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a; line-height: 1.15;">
                        Bâtir l'<span style="background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Élite Technologique</span> de Demain
                    </h1>

                    <p class="lead mb-4 mx-auto" style="max-width: 780px; color: #475569; font-size: 18px; line-height: 1.7;">
                        Rejoignez des équipes passionnées par le code rigoureux, le design d'excellence et l'indépendance technologique. Nous offrons un cadre stimulant où l'autonomie, l'impact réel et l'apprentissage continu sont au cœur de chaque sprint.
                    </p>

                    <!-- Telemetry Chips Row -->
                    <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            ⚡ <strong><?php echo esc_html($jobs_query->have_posts() ? $jobs_query->found_posts : count($fallback_jobs)); ?> Postes</strong> Actuellement Ouverts
                        </div>
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            ⏱️ Réponse garantie <strong>&lt; 48 heures</strong>
                        </div>
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            📍 Douala / Yaoundé &amp; <strong>Télétravail Hybride</strong>
                        </div>
                    </div>

                    <!-- Action Jump Buttons -->
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="#postes-ouverts" class="btn btn-primary font-monospace py-2 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                            <span>Consulter les Postes Ouverts</span>
                            <span>&darr;</span>
                        </a>
                        <a href="#candidature-spontanee" class="btn btn-outline-secondary font-monospace py-2 px-4 fw-semibold" style="border-radius: 8px; font-size: 14px;">
                            Candidature Spontanée
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 2. Job Openings Section with Interactive Filters -->
    <section id="postes-ouverts" class="py-5" style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5">
                <div>
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">OPPORTUNITÉS OUVERTES</span>
                    <h2 class="f-nasalization h2 fw-bold mb-0" style="color: #0f172a;">Postes Actuellement Disponibles</h2>
                </div>

                <!-- Interactive Filter Buttons -->
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="job-filter-btn active" data-filter="all">Tous les Postes</button>
                    <button type="button" class="job-filter-btn" data-filter="Byt3lab Tech">Byt3lab Tech</button>
                    <button type="button" class="job-filter-btn" data-filter="Ngrafix Studio">Ngrafix Studio</button>
                    <button type="button" class="job-filter-btn" data-filter="Conseil & Stratégie">Conseil</button>
                </div>
            </div>

            <!-- Jobs Grid -->
            <div class="row g-4" id="job-listings-row">
                <?php 
                if ($jobs_query->have_posts()) :
                    while ($jobs_query->have_posts()) : $jobs_query->the_post();
                        $job_id      = get_the_ID();
                        $title       = get_the_title();
                        $dept        = get_post_meta($job_id, '_byt3lab_job_department', true) ?: 'Byt3lab Tech';
                        $contract    = get_post_meta($job_id, '_byt3lab_job_contract', true) ?: 'CDI - Temps Plein';
                        $location    = get_post_meta($job_id, '_byt3lab_job_location', true) ?: 'Douala / Hybride';
                        $experience  = get_post_meta($job_id, '_byt3lab_job_experience', true) ?: 'Confirmé';
                        $status      = get_post_meta($job_id, '_byt3lab_job_status', true) ?: 'active';
                        $apply_link  = get_post_meta($job_id, '_byt3lab_job_apply_link', true);
                        $missions_raw= get_post_meta($job_id, '_byt3lab_job_missions', true);
                        $permalink   = get_permalink();

                        if (empty($apply_link)) {
                            $apply_link = 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature - ' . $title);
                        }

                        $missions = [];
                        if (!empty($missions_raw)) {
                            $lines = explode("\n", str_replace("\r", "", $missions_raw));
                            foreach ($lines as $l) {
                                if (!empty(trim($l))) {
                                    $missions[] = trim($l);
                                    if (count($missions) >= 3) break;
                                }
                            }
                        }
                        ?>
                        <div class="col-lg-6 job-item-col" data-dept="<?php echo esc_attr($dept); ?>" style="transition: all 0.3s ease;">
                            <div class="job-card">
                                <div>
                                    <!-- Badges & Status Top Row -->
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge font-monospace px-2.5 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px; border: 1px solid rgba(2, 132, 199, 0.2);">
                                                <?php echo esc_html($dept); ?>
                                            </span>
                                            <span class="badge font-monospace px-2.5 py-1 rounded-pill" style="background: #f1f5f9; color: #475569; font-size: 11px;">
                                                <?php echo esc_html($contract); ?>
                                            </span>
                                        </div>
                                        <?php if ($status === 'urgent') : ?>
                                            <span class="badge font-monospace text-white px-2 py-0.5 rounded-pill" style="background: #ef4444; font-size: 10px;">⚡ URGENT</span>
                                        <?php else : ?>
                                            <span class="font-monospace text-success small d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                                                <span class="status-live-pulse" style="width:6px; height:6px;"></span>
                                                <span>Ouvert</span>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Job Title -->
                                    <h3 class="job-card__title mb-2 font-monospace">
                                        <a href="<?php echo esc_url($permalink); ?>" class="text-decoration-none text-dark">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </h3>

                                    <!-- Quick Location & Experience Chips -->
                                    <div class="d-flex flex-wrap gap-3 text-muted small mb-3 font-monospace" style="font-size: 12px;">
                                        <span>📍 <?php echo esc_html($location); ?></span>
                                        <span>🎯 <?php echo esc_html($experience); ?></span>
                                    </div>

                                    <!-- Excerpt -->
                                    <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                        <?php 
                                        $excerpt = get_the_excerpt();
                                        echo esc_html(!empty($excerpt) ? wp_trim_words($excerpt, 22) : wp_trim_words(get_the_content(), 22)); 
                                        ?>
                                    </p>

                                    <!-- Top Missions Tags -->
                                    <?php if (!empty($missions)) : ?>
                                        <div class="mb-4">
                                            <div class="text-muted font-monospace small mb-1.5" style="font-size: 11px; text-transform: uppercase;">Missions clés :</div>
                                            <div class="d-flex flex-column gap-1">
                                                <?php foreach ($missions as $m) : ?>
                                                    <div class="small d-flex align-items-center gap-1.5" style="font-size: 12px; color: #334155;">
                                                        <span style="color: #0284c7; font-weight: bold;">›</span>
                                                        <span><?php echo esc_html($m); ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Action Buttons: Direct Configured Apply & Details View -->
                                <div class="pt-3 border-top d-flex gap-2 align-items-center justify-content-between flex-wrap" style="border-color: #f1f5f9 !important;">
                                    <a href="<?php echo esc_url($permalink); ?>" class="btn btn-sm btn-outline-secondary font-monospace py-2 px-3 fw-semibold" style="border-radius: 6px; font-size: 13px;">
                                        Détails du Poste
                                    </a>
                                    <a href="<?php echo esc_url($apply_link); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary font-monospace py-2 px-3 fw-semibold d-inline-flex align-items-center gap-1.5" style="background: #0284c7; border-color: #0284c7; border-radius: 6px; font-size: 13px;">
                                        <span>Envoyer mon CV</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                else : 
                    // Render rich fallback job cards if DB is empty
                    foreach ($fallback_jobs as $job) : 
                        $job_url = home_url('/carriere/' . $job['slug'] . '/');
                    ?>
                        <div class="col-lg-6 job-item-col" data-dept="<?php echo esc_attr($job['dept']); ?>" style="transition: all 0.3s ease;">
                            <div class="job-card">
                                <div>
                                    <!-- Badges & Status Top Row -->
                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge font-monospace px-2.5 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px; border: 1px solid rgba(2, 132, 199, 0.2);">
                                                <?php echo esc_html($job['dept']); ?>
                                            </span>
                                            <span class="badge font-monospace px-2.5 py-1 rounded-pill" style="background: #f1f5f9; color: #475569; font-size: 11px;">
                                                <?php echo esc_html($job['contract']); ?>
                                            </span>
                                        </div>
                                        <?php if ($job['status'] === 'urgent') : ?>
                                            <span class="badge font-monospace text-white px-2 py-0.5 rounded-pill" style="background: #ef4444; font-size: 10px;">⚡ URGENT</span>
                                        <?php else : ?>
                                            <span class="font-monospace text-success small d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                                                <span class="status-live-pulse" style="width:6px; height:6px;"></span>
                                                <span>Ouvert</span>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Job Title -->
                                    <h3 class="job-card__title mb-2 font-monospace">
                                        <a href="<?php echo esc_url($job_url); ?>" class="text-decoration-none text-dark">
                                            <?php echo esc_html($job['title']); ?>
                                        </a>
                                    </h3>

                                    <!-- Quick Location & Experience Chips -->
                                    <div class="d-flex flex-wrap gap-3 text-muted small mb-3 font-monospace" style="font-size: 12px;">
                                        <span>📍 <?php echo esc_html($job['location']); ?></span>
                                        <span>🎯 <?php echo esc_html($job['experience']); ?></span>
                                    </div>

                                    <!-- Excerpt -->
                                    <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                        <?php echo esc_html($job['desc']); ?>
                                    </p>

                                    <!-- Top Missions Tags -->
                                    <div class="mb-4">
                                        <div class="text-muted font-monospace small mb-1.5" style="font-size: 11px; text-transform: uppercase;">Missions clés :</div>
                                        <div class="d-flex flex-column gap-1">
                                            <?php foreach ($job['missions'] as $m) : ?>
                                                <div class="small d-flex align-items-center gap-1.5" style="font-size: 12px; color: #334155;">
                                                    <span style="color: #0284c7; font-weight: bold;">›</span>
                                                    <span><?php echo esc_html($m); ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="pt-3 border-top d-flex gap-2 align-items-center justify-content-between flex-wrap" style="border-color: #f1f5f9 !important;">
                                    <a href="<?php echo esc_url($job_url); ?>" class="btn btn-sm btn-outline-secondary font-monospace py-2 px-3 fw-semibold" style="border-radius: 6px; font-size: 13px;">
                                        Détails du Poste
                                    </a>
                                    <a href="<?php echo esc_url($job['apply_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-primary font-monospace py-2 px-3 fw-semibold d-inline-flex align-items-center gap-1.5" style="background: #0284c7; border-color: #0284c7; border-radius: 6px; font-size: 13px;">
                                        <span>Envoyer mon CV</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>

        </div>
    </section>

    <!-- 3. Spontaneous Application Banner (Candidature Spontanée) -->
    <section id="candidature-spontanee" class="py-5 position-relative" style="background: radial-gradient(circle at top right, rgba(2, 132, 199, 0.07), transparent 60%), #f8fafc; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center gap-2 mb-2 px-2.5 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; font-size: 11px; font-family: monospace; font-weight: 700;">
                        <span>✨</span>
                        <span>CANDIDATURE LIBRE &amp; TALENTS SPONTANÉS</span>
                    </div>
                    <h2 class="f-nasalization h3 fw-bold mb-3" style="color: #0f172a;">Votre profil ne correspond pas aux postes ci-dessus ?</h2>
                    <p class="mb-0" style="color: #334155; line-height: 1.7; max-width: 720px;">
                        Nous sommes constamment à la recherche de développeurs chevronnés, d'experts DevOps, d'architectes données, de designers UI/UX et de formateurs tech d'exception. Envoyez-nous directement votre CV et présentez-nous vos projets les plus marquants !
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
                        <a href="mailto:carrieres@byt3lab.com?subject=<?php echo rawurlencode('Candidature Spontanée - BYT3LAB'); ?>" class="btn btn-primary font-monospace py-2.5 px-4 fw-semibold text-center" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                            ✉️ Déposer une Candidature Spontanée
                        </a>
                        <a href="https://wa.me/237696879475?text=<?php echo rawurlencode('Bonjour l\'équipe BYT3LAB, je souhaite échanger au sujet des opportunités de recrutement.'); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success font-monospace py-2 px-3 fw-semibold text-center" style="border-radius: 8px; font-size: 13px;">
                            💬 Échanger sur WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Why Join BYT3LAB / Culture & Avantages -->
    <section class="py-5" style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            
            <div class="mb-5 text-center mx-auto" style="max-width: 750px;">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">NOTRE CULTURE &amp; ADN</span>
                <h2 class="f-nasalization h2 fw-bold mb-3" style="color: #0f172a;">Pourquoi Choisir l'Aventure BYT3LAB ?</h2>
                <p class="mb-0" style="color: #334155; line-height: 1.7;">
                    Travailler chez BYT3LAB, c'est intégrer un environnement d'ingénierie moderne où la curiosité technique et la rigueur sont encouragées au quotidien.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="process-step-badge">🚀</div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a;">Projets à Fort Impact</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Concevez des progiciels et plateformes utilisés par des milliers d'utilisateurs et des institutions clés à travers le continent.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="process-step-badge">🛡️</div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a;">Cloud Souverain &amp; Stack Moderne</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Pas de code obsolète : nous développons avec TypeScript, Next.js, Kubernetes, Docker, PostgreSQL et Python FastAPI.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="process-step-badge">💻</div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a;">Télétravail &amp; Équipement Pro</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Organisation hybride agile, horaires flexibles et mise à disposition d'ordinateurs portables et licences de premier choix.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="process-step-badge">📈</div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a;">Montée en Compétences</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Accès aux formations internes, mentorat actif par nos ingénieurs seniors et prise en charge des certifications techniques.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. 4-Step Agile Hiring Process -->
    <section class="py-5" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            
            <div class="mb-5 text-center mx-auto" style="max-width: 750px;">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">TRANSPARENCE &amp; RAPIDITÉ</span>
                <h2 class="f-nasalization h2 fw-bold mb-3" style="color: #0f172a;">Notre Processus de Recrutement</h2>
                <p class="mb-0" style="color: #334155; line-height: 1.7;">
                    Un processus structuré, bienveillant et sans lenteur bureaucratique. Chaque étape est pensée pour valoriser vos compétences réelles.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0;">
                        <div class="font-monospace fw-bold text-primary mb-2" style="font-size: 12px;">ÉTAPE 01</div>
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">Examen du CV (< 48h)</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Analyse de votre parcours, de vos projets GitHub/portfolio et de vos réalisations concrètes par nos leads techniques.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0;">
                        <div class="font-monospace fw-bold text-primary mb-2" style="font-size: 12px;">ÉTAPE 02</div>
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">Échange Découverte &amp; RH</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Un entretien en visio ou présentiel de 30 minutes pour faire connaissance, cerner vos attentes et présenter nos projets.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0;">
                        <div class="font-monospace fw-bold text-primary mb-2" style="font-size: 12px;">ÉTAPE 03</div>
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">Test Pratique &amp; Pair</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Un mini-projet pratique ou session de revue d'architecture en situation réelle pour tester votre rigueur et logique.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white" style="border: 1px solid #e2e8f0;">
                        <div class="font-monospace fw-bold text-success mb-2" style="font-size: 12px;">ÉTAPE 04</div>
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">Offre &amp; Onboarding</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Proposition salariale claire, signature du contrat et accueil personnalisé avec un binôme mentor pour vos premiers sprints.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 6. Professional Social Follow & Community Banner -->
    <section class="py-5 text-center position-relative" style="background: radial-gradient(circle at center, rgba(2, 132, 199, 0.08), transparent 70%), #ffffff;">
        <div class="container py-4">
            <span class="badge mb-3 px-3 py-1.5 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.2); font-size: 11px;">
                📢 RESTEZ CONNECTÉS AVEC NOS RECRUTEURS
            </span>
            <h2 class="f-nasalization h2 fw-bold mb-3" style="color: #0f172a;">Suivez Nos Nouvelles Opportunités</h2>
            <p class="mx-auto mb-4" style="max-width: 720px; color: #475569; font-size: 16px; line-height: 1.7;">
                Nous publions en priorité nos nouvelles fiches de postes, appels d'offres et opportunités de stage sur nos réseaux professionnels. Rejoignez la communauté BYT3LAB !
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="https://www.linkedin.com/company/byt3lab" target="_blank" rel="noopener noreferrer" class="btn btn-primary font-monospace py-2.5 px-4 fw-bold d-inline-flex align-items-center gap-2" style="background-color: #0a66c2; border: none; border-radius: 8px; font-size: 14px;">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                    <span>Suivre BYT3LAB sur LinkedIn</span>
                </a>
                <a href="https://facebook.com/byt3lab" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary font-monospace py-2.5 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 8px; border-color: #1877F2; color: #1877F2; font-size: 14px;">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    <span>Facebook BYT3LAB</span>
                </a>
                <a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary font-monospace py-2.5 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 8px; border-color: #9333ea; color: #9333ea; font-size: 14px; background: rgba(147, 51, 234, 0.05);">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    <span>Facebook NGRAFIX</span>
                </a>
            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>