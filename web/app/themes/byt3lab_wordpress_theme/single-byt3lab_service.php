<?php
/**
 * Single Template: Service & Ingénierie BYT3LAB
 * Design Premium avec boutons aux proportions raffinées et mise en page 2 colonnes.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('components/header/header');

$current_id   = get_the_ID();
$icon         = get_post_meta($current_id, '_byt3lab_service_icon', true) ?: '🛠️';
$branch       = get_post_meta($current_id, '_byt3lab_service_branch', true);
$short_desc   = get_post_meta($current_id, '_byt3lab_service_short_desc', true);
$deliverables_raw = get_post_meta($current_id, '_byt3lab_service_deliverables', true);
$cta_text     = get_post_meta($current_id, '_byt3lab_service_cta_text', true) ?: 'Demander un devis';
$cta_url      = get_post_meta($current_id, '_byt3lab_service_cta_url', true) ?: home_url('/contact/');
$img_url      = has_post_thumbnail($current_id) ? get_the_post_thumbnail_url($current_id, 'large') : get_post_meta($current_id, '_byt3lab_service_image', true);

if (empty($branch)) {
    $terms = wp_get_post_terms($current_id, 'byt3lab_service_branch');
    if (!empty($terms) && !is_wp_error($terms)) {
        $branch = $terms[0]->name;
    } else {
        $branch = 'Byt3lab Tech';
    }
}

$deliverables_list = [];
if (!empty($deliverables_raw)) {
    $lines = explode("\n", str_replace("\r", "", $deliverables_raw));
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            $deliverables_list[] = $line;
        }
    }
}

// Requête pour les autres services en suggestion
$other_services = new WP_Query([
    'post_type'      => 'byt3lab_service',
    'post__not_in'   => [$current_id],
    'posts_per_page' => 4,
    'orderby'        => 'rand',
]);
?>

<main id="primary" class="site-main bg-white text-dark py-5" style="background: radial-gradient(circle at 10% 10%, rgba(2, 132, 199, 0.05) 0%, transparent 40%), #ffffff;">
    <div class="container py-4">
        
        <!-- Breadcrumb / Back Link -->
        <div class="mb-4 text-start">
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace d-inline-flex align-items-center gap-2 px-3 py-1" style="border-radius: 6px; font-size: 13px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                <span>Retour aux Services</span>
            </a>
        </div>

        <!-- Service Header Banner -->
        <div class="mb-5 pb-4 border-bottom border-light text-start">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span style="font-size: 24px; line-height: 1;"><?php echo esc_html($icon); ?></span>
                <span class="badge px-3 py-1 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.08); color: #0284c7; font-size: 12px; border: 1px solid rgba(2, 132, 199, 0.2);">
                    <?php echo esc_html($branch); ?>
                </span>
            </div>

            <h1 class="f-nasalization display-5 fw-bold mb-3" style="color: #0f172a; line-height: 1.25;">
                <?php the_title(); ?>
            </h1>

            <?php if (!empty($short_desc)) : ?>
                <p class="lead fs-5 mb-0" style="max-width: 820px; color: #334155; line-height: 1.7;">
                    <?php echo esc_html($short_desc); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- 2-Column Content Layout -->
        <div class="row g-5 text-start">
            
            <!-- Left Column: Main Description & Deliverables -->
            <div class="col-lg-8">
                
                <!-- Service Featured Image -->
                <?php if (!empty($img_url)) : ?>
                    <div class="mb-5 rounded-4 overflow-hidden border shadow-sm position-relative" style="max-height: 400px; background: #0f172a;">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover" style="max-height: 400px;" />
                    </div>
                <?php endif; ?>

                <!-- Full Content Description -->
                <div class="service-content mb-5">
                    <h2 class="h4 fw-bold mb-3 font-monospace" style="color: #0f172a;">Présentation de l'Expertise</h2>
                    <div class="fs-6 lh-lg" style="color: #334155; line-height: 1.8;">
                        <?php 
                        $content = get_the_content();
                        if (!empty(trim($content))) {
                            the_content();
                        } else {
                            echo '<p>' . esc_html($short_desc ?: 'Ce service fait partie des pôles d\'ingénierie et de création développés par BYT3LAB pour répondre aux exigences des organisations modernes.') . '</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Deliverables & Scope -->
                <?php if (!empty($deliverables_list)) : ?>
                    <div class="mb-5 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <h2 class="h5 fw-bold mb-3 font-monospace d-flex align-items-center gap-2" style="color: #0f172a;">
                            <span>📦</span> Livrables &amp; Périmètre d'Intervention
                        </h2>
                        <div class="row g-3">
                            <?php foreach ($deliverables_list as $item) : ?>
                                <div class="col-md-6 d-flex align-items-start gap-2">
                                    <span class="badge rounded-circle p-1 mt-1" style="background: rgba(16, 185, 129, 0.2); color: #059669; font-size: 11px;">✓</span>
                                    <span class="text-dark small fw-medium" style="line-height: 1.5;"><?php echo esc_html($item); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Methodology / Sprint workflow -->
                <div class="p-4 rounded-4 mb-4" style="background: #ffffff; border: 1px solid #e2e8f0;">
                    <h3 class="h6 fw-bold text-uppercase font-monospace mb-3" style="color: #0284c7;">Méthodologie &amp; Engagement BYT3LAB</h3>
                    <div class="row g-3 text-start">
                        <div class="col-sm-4">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc;">
                                <div class="fw-bold text-dark small mb-1">1. Cadrage &amp; Audit</div>
                                <div class="text-muted" style="font-size: 12px;">Analyse des besoins et spécifications techniques détaillées.</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc;">
                                <div class="fw-bold text-dark small mb-1">2. Sprints &amp; Démo</div>
                                <div class="text-muted" style="font-size: 12px;">Livraisons itératives et validation continue avec vos équipes.</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 rounded-3 h-100" style="background: #f8fafc;">
                                <div class="fw-bold text-dark small mb-1">3. SLA &amp; Support</div>
                                <div class="text-muted" style="font-size: 12px;">Déploiement sécurisé, formation et maintenance continue.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Sidebar Actions & Details -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    
                    <!-- Action Box -->
                    <div class="card p-4 rounded-4 mb-4" style="background: #ffffff; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.04);">
                        <span class="badge mb-3 px-3 py-1 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; font-size: 11px; width: fit-content;">
                            DÉMARRER UN PROJET
                        </span>

                        <h3 class="h5 fw-bold mb-2" style="color: #0f172a;">Prêt à collaborer ?</h3>
                        <p class="small mb-4" style="color: #334155; line-height: 1.6;">
                            Nos ingénieurs et consultants étudient votre besoin pour vous proposer une solution adaptée.
                        </p>

                        <!-- Standard, well-proportioned buttons -->
                        <div class="d-flex flex-column gap-2">
                            <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary fw-bold font-monospace text-center py-2 px-3" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                                <?php echo esc_html($cta_text); ?> &rarr;
                            </a>
                            <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success fw-semibold text-center py-2 px-3 d-flex align-items-center justify-content-center gap-2" style="border-radius: 8px; font-size: 14px;">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                                <span>WhatsApp Direct</span>
                            </a>
                        </div>
                    </div>

                    <!-- Other Services Sidebar List -->
                    <?php if ($other_services->have_posts()) : ?>
                        <div class="card p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <h4 class="h6 fw-bold mb-3 font-monospace" style="color: #0f172a;">Autres Services BYT3LAB</h4>
                            <div class="d-flex flex-column gap-2">
                                <?php while ($other_services->have_posts()) : $other_services->the_post();
                                    $item_icon   = get_post_meta(get_the_ID(), '_byt3lab_service_icon', true) ?: '🛠️';
                                    $item_branch = get_post_meta(get_the_ID(), '_byt3lab_service_branch', true) ?: 'Byt3lab Tech';
                                ?>
                                    <a href="<?php the_permalink(); ?>" class="d-flex align-items-center justify-content-between p-2 rounded-3 text-decoration-none bg-white border border-light text-dark hover-blue" style="transition: all 0.2s ease;">
                                        <div class="d-flex align-items-center gap-2">
                                            <span><?php echo esc_html($item_icon); ?></span>
                                            <span class="small fw-semibold"><?php the_title(); ?></span>
                                        </div>
                                        <span class="text-muted small">&rarr;</span>
                                    </a>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>
</main>

<?php
get_template_part('components/footer/footer');
get_footer();
?>
