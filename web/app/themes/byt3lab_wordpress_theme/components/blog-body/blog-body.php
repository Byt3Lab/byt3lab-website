<?php
// BYT3LAB Builder - auto-include component assets for blog-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'blog-body';
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

<div class="component-blog-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at top right, rgba(2, 132, 199, 0.08), transparent 60%), #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Notre Journal Technologique</span>
            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a;">Le Blog Byt3lab</h1>
            <p class="lead mx-auto" style="max-width: 700px; color: #475569;">
                Découvrez nos actualités, nos dossiers techniques sur l'intelligence artificielle, l'ingénierie et l'avenir de la tech en Afrique.
            </p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-5">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 9,
                'paged' => $paged
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
                <div class="row g-4 text-start">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-md-6 col-lg-4">
                            <article class="card h-100 rounded-4 overflow-hidden border" style="background: #ffffff; border-color: #e2e8f0 !important; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                                <div class="position-relative" style="height: 220px; overflow: hidden;">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', ['class' => 'w-100 h-100 object-fit-cover']); ?>
                                    <?php else : ?>
                                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=600" alt="<?php the_title_attribute(); ?>" class="w-100 h-100 object-fit-cover" />
                                    <?php endif; ?>
                                    <span class="badge position-absolute top-0 start-0 m-3 py-2 px-3 rounded-pill" style="background: #0284c7; color: #ffffff;">
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo esc_html($categories[0]->name);
                                        } else {
                                            echo 'Tech';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="card-body p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="small mb-2 font-monospace" style="color: #64748b;"><?php echo get_the_date('j F Y'); ?></div>
                                        <h3 class="h4 fw-bold mb-3" style="line-height: 1.4; color: #0f172a;">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none" style="color: #0f172a;"><?php the_title(); ?></a>
                                        </h3>
                                        <p class="small mb-4" style="color: #475569;">
                                            <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                                        </p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none fw-bold d-inline-flex align-items-center gap-1 small" style="color: #0284c7;">
                                        Lire l'article
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $query->max_num_pages,
                        'prev_text' => '<svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="me-1"><path d="M15 19l-7-7 7-7"/></svg> Précédent',
                        'next_text' => 'Suivant <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="ms-1"><path d="M9 5l7 7-7 7"/></svg>',
                        'type' => 'plain',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="py-5 text-center">
                    <div class="mb-4 d-inline-block p-3 rounded-circle" style="background: rgba(2, 132, 199, 0.08); color: #0284c7;">
                        <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M3 20h.01M3 16h.01M3 12h.01M3 8h.01M3 4h.01M7 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg>
                    </div>
                    <h3 class="h4 fw-bold mb-2" style="color: #0f172a;">Aucun article publié</h3>
                    <p style="color: #64748b;">Revenez bientôt pour découvrir nos premiers articles !</p>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>