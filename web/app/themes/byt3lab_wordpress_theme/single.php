<?php
if (!defined('ABSPATH')) { exit; }
get_header();

// Include the global theme header component
get_template_part('components/header/header');
?>

<main id="primary" class="site-main bg-white text-dark py-5" style="background-color: #ffffff !important;">
    <div class="container py-5">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('mx-auto'); ?> style="max-width: 800px;">
                
                <!-- Category and Date -->
                <header class="entry-header mb-4 text-start">
                    <div class="mb-3 d-flex gap-2">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<span class="badge px-3 py-2 rounded-pill font-monospace" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.2);">' . esc_html($category->name) . '</span>';
                            }
                        }
                        ?>
                    </div>
                    <h1 class="f-nasalization display-4 fw-bold mb-3" style="line-height: 1.2; color: #0f172a;"><?php the_title(); ?></h1>
                    
                    <div class="font-monospace small d-flex align-items-center gap-3" style="color: #64748b;">
                        <span>Publié le <?php echo get_the_date('d F Y'); ?></span>
                        <span>•</span>
                        <span>Par <?php echo get_the_author(); ?></span>
                    </div>
                </header>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image mb-5 rounded-4 overflow-hidden shadow-sm border" style="border-color: #e2e8f0 !important;">
                        <?php the_post_thumbnail('large', ['class' => 'w-100 h-auto object-fit-cover', 'style' => 'max-height: 480px;']); ?>
                    </div>
                <?php endif; ?>

                <!-- Article Content -->
                <div class="entry-content text-start fs-5 lh-lg" style="letter-spacing: 0.2px; color: #334155;">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'byt3lab_wordpress_theme'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer mt-5 pt-4 border-top" style="border-color: #e2e8f0 !important;">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div class="tags-links small" style="color: #64748b;">
                            <?php the_tags('Tags : ', ', ', ''); ?>
                        </div>
                        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="a-button a-button--outline btn btn-outline-primary py-2 px-4 fw-bold text-uppercase" style="border-radius: 8px; border-color: #0284c7; color: #0284c7;">
                            ← Retour au blog
                        </a>
                    </div>
                </footer>

            </article>
        <?php endwhile; endif; ?>
    </div>
</main>


<?php
// Include the global theme footer component
get_template_part('components/footer/footer');
get_footer();
?>
