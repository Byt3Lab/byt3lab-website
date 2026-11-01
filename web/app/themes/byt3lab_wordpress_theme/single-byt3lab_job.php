<?php
/**
 * Single Template: Offre d'Emploi & Fiche de Poste BYT3LAB
 * Design Haute Précision avec boutons proportionnés, barre d'action sticky et lien de candidature direct.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('components/header/header');

$current_id   = get_the_ID();
$title        = get_the_title();
$dept         = get_post_meta($current_id, '_byt3lab_job_department', true) ?: 'Byt3lab Tech';
$contract     = get_post_meta($current_id, '_byt3lab_job_contract', true) ?: 'CDI - Temps Plein';
$location     = get_post_meta($current_id, '_byt3lab_job_location', true) ?: 'Douala, Cameroun / Hybride';
$experience   = get_post_meta($current_id, '_byt3lab_job_experience', true) ?: 'Confirmé (3+ ans)';
$salary       = get_post_meta($current_id, '_byt3lab_job_salary', true) ?: 'Selon profil & compétences + Primes';
$status       = get_post_meta($current_id, '_byt3lab_job_status', true) ?: 'active';
$deadline     = get_post_meta($current_id, '_byt3lab_job_deadline', true) ?: 'Recrutement continu';
$apply_link   = get_post_meta($current_id, '_byt3lab_job_apply_link', true);
$missions_raw = get_post_meta($current_id, '_byt3lab_job_missions', true);
$reqs_raw     = get_post_meta($current_id, '_byt3lab_job_requirements', true);

if (empty($apply_link)) {
    $apply_link = 'mailto:carrieres@byt3lab.com?subject=' . rawurlencode('Candidature au poste : ' . $title);
}

// Convert missions & requirements textareas to lists
$missions_list = [];
if (!empty($missions_raw)) {
    $lines = explode("\n", str_replace("\r", "", $missions_raw));
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            $missions_list[] = $line;
        }
    }
}

$reqs_list = [];
if (!empty($reqs_raw)) {
    $lines = explode("\n", str_replace("\r", "", $reqs_raw));
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            $reqs_list[] = $line;
        }
    }
}

// Requête pour les autres postes ouverts
$other_jobs = new WP_Query([
    'post_type'      => 'byt3lab_job',
    'post__not_in'   => [$current_id],
    'posts_per_page' => 3,
    'orderby'        => 'rand',
]);
?>

<main id="primary" class="site-main bg-white text-dark py-5" style="background: radial-gradient(circle at 10% 10%, rgba(2, 132, 199, 0.05) 0%, transparent 45%), #ffffff;">
    <div class="container py-4">
        
        <!-- Breadcrumb / Back Link -->
        <div class="mb-4 text-start">
            <a href="<?php echo esc_url(home_url('/carriere/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace d-inline-flex align-items-center gap-2 px-3 py-1" style="border-radius: 6px; font-size: 13px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                <span>Retour aux Opportunités de Carrière</span>
            </a>
        </div>

        <!-- Job Header Banner -->
        <div class="mb-5 pb-4 border-bottom border-light text-start">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                <span class="badge px-3 py-1 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 12px; border: 1px solid rgba(2, 132, 199, 0.2);">
                    <?php echo esc_html($dept); ?>
                </span>
                <span class="badge px-3 py-1 rounded-pill font-monospace text-dark" style="background: #f1f5f9; font-size: 12px; border: 1px solid #e2e8f0;">
                    <?php echo esc_html($contract); ?>
                </span>
                <span class="badge px-3 py-1 rounded-pill font-monospace text-muted" style="background: #f8fafc; font-size: 12px; border: 1px solid #e2e8f0;">
                    📍 <?php echo esc_html($location); ?>
                </span>
                
                <?php if ($status === 'urgent') : ?>
                    <span class="badge px-2.5 py-1 rounded-pill font-monospace text-white" style="background: #ef4444; font-size: 11px;">
                        ⚡ Recrutement Urgent
                    </span>
                <?php elseif ($status === 'closed') : ?>
                    <span class="badge px-2.5 py-1 rounded-pill font-monospace text-muted" style="background: #e2e8f0; font-size: 11px;">
                        ⚪ Poste Clôturé
                    </span>
                <?php else : ?>
                    <span class="badge px-2.5 py-1 rounded-pill font-monospace text-success d-inline-flex align-items-center gap-1.5" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.25); font-size: 11px;">
                        <span style="display:inline-block; width:6px; height:6px; border-radius:50%; background:#10b981;"></span>
                        <span>Poste Ouvert</span>
                    </span>
                <?php endif; ?>
            </div>

            <h1 class="f-nasalization display-5 fw-bold mb-3" style="color: #0f172a; line-height: 1.25;">
                <?php the_title(); ?>
            </h1>

            <div class="d-flex flex-wrap gap-4 text-muted font-monospace small" style="font-size: 13px;">
                <span>🎯 Expérience : <strong><?php echo esc_html($experience); ?></strong></span>
                <span>💰 Package : <strong><?php echo esc_html($salary); ?></strong></span>
                <span>📅 Date limite : <strong><?php echo esc_html($deadline); ?></strong></span>
            </div>
        </div>

        <!-- 2-Column Content Layout -->
        <div class="row g-5 text-start">
            
            <!-- Left Column: Job Details, Missions & Requirements -->
            <div class="col-lg-8">
                
                <!-- Main Description -->
                <div class="job-description mb-5">
                    <h2 class="h4 fw-bold mb-3 font-monospace" style="color: #0f172a;">Description du Poste</h2>
                    <div class="fs-6 lh-lg" style="color: #334155; line-height: 1.8;">
                        <?php 
                        $content = get_the_content();
                        if (!empty(trim($content))) {
                            the_content();
                        } else {
                            echo '<p>Rejoignez les équipes d\'ingénierie BYT3LAB pour concevoir, déployer et maintenir des plateformes technologiques de haut niveau au service de l\'autonomie numérique africaine.</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Missions & Responsabilités -->
                <?php if (!empty($missions_list)) : ?>
                    <div class="mb-5 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span style="font-size: 20px;">🚀</span>
                            <h3 class="h5 fw-bold mb-0 font-monospace" style="color: #0f172a;">Missions &amp; Responsabilités Clés</h3>
                        </div>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2.5">
                            <?php foreach ($missions_list as $mission) : ?>
                                <li class="d-flex align-items-start gap-2.5" style="font-size: 15px; line-height: 1.6; color: #334155;">
                                    <span class="d-inline-flex align-items-center justify-content-center text-primary mt-1" style="flex-shrink: 0; width: 18px; height: 18px; background: rgba(2, 132, 199, 0.1); border-radius: 4px;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#0284c7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </span>
                                    <span><?php echo esc_html($mission); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Profil & Compétences Requises -->
                <?php if (!empty($reqs_list)) : ?>
                    <div class="mb-5 p-4 rounded-4" style="background: #ffffff; border: 1.5px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03);">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span style="font-size: 20px;">🎯</span>
                            <h3 class="h5 fw-bold mb-0 font-monospace" style="color: #0f172a;">Profil Recherché &amp; Compétences</h3>
                        </div>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2.5">
                            <?php foreach ($reqs_list as $req) : ?>
                                <li class="d-flex align-items-start gap-2.5" style="font-size: 15px; line-height: 1.6; color: #334155;">
                                    <span class="d-inline-flex align-items-center justify-content-center text-success mt-1" style="flex-shrink: 0; width: 18px; height: 18px; background: rgba(16, 185, 129, 0.1); border-radius: 4px;">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </span>
                                    <span><?php echo esc_html($req); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Ce que nous offrons / Avantages -->
                <div class="mb-5">
                    <h3 class="h5 fw-bold mb-3 font-monospace" style="color: #0f172a;">Ce que nous vous offrons</h3>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="fw-bold mb-1" style="color: #0f172a; font-size: 14px;">💻 Équipement &amp; Outils</div>
                                <div class="small text-muted">Matériel performant au choix et accès aux meilleures plateformes cloud et licences.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="fw-bold mb-1" style="color: #0f172a; font-size: 14px;">⚡ Flexibilité &amp; Autonomie</div>
                                <div class="small text-muted">Organisation agile, télétravail hybride et culture basée sur les résultats.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="fw-bold mb-1" style="color: #0f172a; font-size: 14px;">📈 Montée en Compétences</div>
                                <div class="small text-muted">Formations internes, veille technologique et passage de certifications reconnues.</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                <div class="fw-bold mb-1" style="color: #0f172a; font-size: 14px;">🌍 Impact Panafricain</div>
                                <div class="small text-muted">Participez à la construction d'infrastructures et progiciels stratégiques pour le continent.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Sticky Application Card -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    <div class="p-4 rounded-4" style="background: #ffffff; border: 1.5px solid #0284c7; box-shadow: 0 10px 30px -5px rgba(2, 132, 199, 0.12);">
                        
                        <div class="mb-3 d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); border: 1px solid rgba(2, 132, 199, 0.2);">
                            <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: #0284c7;"></span>
                            <span class="font-monospace fw-semibold" style="color: #0284c7; font-size: 11px;">POSTULER AU POSTE</span>
                        </div>

                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a;">Prêt(e) à postuler ?</h3>
                        <p class="small mb-4" style="color: #334155; line-height: 1.6;">
                            Transmettez-nous votre CV à jour et portfolio de projets. Notre équipe recrutement étudie chaque profil avec la plus grande attention.
                        </p>

                        <!-- Primary Configured CV Link Button -->
                        <div class="d-grid gap-2 mb-3">
                            <a href="<?php echo esc_url($apply_link); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary font-monospace py-2.5 px-4 fw-bold d-flex align-items-center justify-content-center gap-2" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                                <span>Envoyer mon CV &rarr;</span>
                            </a>
                            
                            <a href="https://wa.me/237696879475?text=<?php echo rawurlencode('Bonjour l\'équipe BYT3LAB, je souhaite avoir plus de précisions concernant l\'offre de poste : ' . $title); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success font-monospace py-2 px-3 fw-semibold d-flex align-items-center justify-content-center gap-2" style="border-radius: 8px; font-size: 13px;">
                                <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                                <span>Poser une question RH</span>
                            </a>
                        </div>

                        <hr class="my-3" style="opacity: 0.15;" />

                        <!-- Key Job Specifications -->
                        <div class="d-flex flex-column gap-2 small" style="color: #475569;">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">🏢 Département :</span>
                                <span class="fw-semibold text-dark"><?php echo esc_html($dept); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">📄 Contrat :</span>
                                <span class="fw-semibold text-dark"><?php echo esc_html($contract); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">📍 Lieu :</span>
                                <span class="fw-semibold text-dark"><?php echo esc_html($location); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">🎓 Expérience :</span>
                                <span class="fw-semibold text-dark"><?php echo esc_html($experience); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">⏱️ Échéance :</span>
                                <span class="fw-semibold text-dark"><?php echo esc_html($deadline); ?></span>
                            </div>
                        </div>

                        <!-- Response Guarantee Reassurance -->
                        <div class="mt-4 p-3 rounded-3" style="background: #f0fdf4; border: 1px solid #bbf7d0;">
                            <div class="d-flex align-items-center gap-2 text-success fw-semibold" style="font-size: 12px;">
                                <span>⚡</span>
                                <span>Engagement BYT3LAB Recrutement</span>
                            </div>
                            <div class="text-muted mt-1" style="font-size: 11px; line-height: 1.5;">
                                Réponse assurée sous <strong>48 heures ouvrées</strong> pour toute candidature transmise avec CV et références.
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Other Job Openings Section -->
        <?php if ($other_jobs->have_posts()) : ?>
            <div class="mt-5 pt-5 border-top border-light text-start">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <div>
                        <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">D'autres opportunités</span>
                        <h2 class="f-nasalization h4 fw-bold mb-0" style="color: #0f172a;">Ces Postes Pourraient Vous Intéresser</h2>
                    </div>
                    <a href="<?php echo esc_url(home_url('/carriere/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace" style="border-radius: 6px; font-size: 13px;">
                        Toutes les Offres &rarr;
                    </a>
                </div>

                <div class="row g-4">
                    <?php while ($other_jobs->have_posts()) : $other_jobs->the_post(); 
                        $o_dept     = get_post_meta(get_the_ID(), '_byt3lab_job_department', true) ?: 'Byt3lab Tech';
                        $o_contract = get_post_meta(get_the_ID(), '_byt3lab_job_contract', true) ?: 'CDI';
                        $o_loc      = get_post_meta(get_the_ID(), '_byt3lab_job_location', true) ?: 'Douala / Hybride';
                    ?>
                        <div class="col-md-4">
                            <div class="p-4 rounded-4 h-100 d-flex flex-direction-column justify-content-between" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="badge font-monospace" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 11px;">
                                            <?php echo esc_html($o_dept); ?>
                                        </span>
                                        <span class="badge font-monospace" style="background: #f1f5f9; color: #475569; font-size: 11px;">
                                            <?php echo esc_html($o_contract); ?>
                                        </span>
                                    </div>
                                    <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark hover-primary">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <div class="small text-muted mb-3">📍 <?php echo esc_html($o_loc); ?></div>
                                </div>
                                <div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary font-monospace w-100" style="border-radius: 6px; font-size: 12px;">
                                        Consulter le poste &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php 
get_template_part('components/footer/footer');
get_footer(); 
?>
