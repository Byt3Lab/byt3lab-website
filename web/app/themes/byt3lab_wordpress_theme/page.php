<?php
if (!defined('ABSPATH')) { exit; }
get_header();
global $post;
$slug = isset($post->post_name) ? $post->post_name : '';
$path = get_template_directory() . '/pages/page-' . $slug . '.php';
if (file_exists($path)) { include $path; } else {
    echo '<main id="primary" class="site-main">';
    if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif;
    echo '</main>';
}
get_footer();
