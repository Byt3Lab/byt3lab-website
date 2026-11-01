<?php
/**
 * Single Template: Projet Réalisé BYT3LAB
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('components/header/header');

$category = get_post_meta(get_the_ID(), '_byt3lab_project_category', true) ?: 'PROJET';
$stack    = get_post_meta(get_the_ID(), '_byt3lab_project_stack', true) ?: '';
$impact   = get_post_meta(get_the_ID(), '_byt3lab_project_impact', true);
$url      = get_post_meta(get_the_ID(), '_byt3lab_project_url', true);
$img_url  = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : (get_post_meta(get_the_ID(), '_byt3lab_project_image', true) ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200');
$stack_items = array_map('trim', explode('/', $stack));
?>

<main id="primary" class="site-main bg-white text-dark py-5" style="background: radial-gradient(circle at top right, rgba(2, 132, 199, 0.06), transparent 50%), #ffffff;">
    <div class="container py-5">
        
        <div class="mb-4 text-start">
            <a href="<?php echo esc_url(home_url('/realisations/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace d-inline-flex align-items-center gap-2" style="border-radius: 8px;">
                <span>&larr;</span> Voir toutes les réalisations
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="card card-premium p-4 p-md-5 overflow-hidden text-start">
                    
                    <div class="d-flex align-items-center gap-3 mb-3 flex-wrap">
                        <span class="badge text-white px-3 py-2 rounded-pill font-monospace" style="background: #0284c7;">
                            <?php echo esc_html($category); ?>
                        </span>
                        <?php foreach ($stack_items as $st) : if (!empty($st)) : ?>
                            <span class="badge-tech-pill" data-bs-toggle="tooltip" title="Stack : <?php echo esc_attr($st); ?>">
                                <?php echo esc_html($st); ?>
                            </span>
                        <?php endif; endforeach; ?>
                    </div>

                    <h1 class="f-nasalization display-4 fw-bold mb-4" style="color: #0f172a;"><?php the_title(); ?></h1>

                    <?php if (!empty($img_url)) : ?>
                        <div class="mb-5 rounded-4 overflow-hidden border shadow-sm" style="max-height: 480px;">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover" />
                        </div>
                    <?php endif; ?>

                    <div class="entry-content fs-5 mb-5 lh-lg" style="color: #334155;">
                        <?php the_content(); ?>
                    </div>

                    <?php if (!empty($impact)) : ?>
                        <div class="p-4 rounded-3 mb-5" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <h3 class="fw-bold h5 mb-2 d-flex align-items-center gap-2" style="color: #0284c7;">
                                <span>⚡</span> Impact mesuré &amp; Résultats :
                            </h3>
                            <p class="fs-6 mb-0" style="color: #334155;"><?php echo esc_html($impact); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-3 flex-wrap pt-4 border-top">
                        <?php if (!empty($url)) : ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary py-2 px-3 fw-semibold font-monospace" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                                Accéder au projet en direct &rarr;
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary py-2 px-3 fw-semibold font-monospace" style="border-color: #0284c7; color: #0284c7; border-radius: 8px; font-size: 14px;">
                            Lancer un projet similaire
                        </a>
                        <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success py-2 px-3 fw-semibold font-monospace d-inline-flex align-items-center gap-2" style="border-radius: 8px; font-size: 14px;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                            <span>WhatsApp Direct</span>
                        </a>
                    </div>

                </article>
            </div>
        </div>

    </div>
</main>

<?php
get_template_part('components/footer/footer');
get_footer();
