<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$path = get_template_directory() . '/pages/page-accueil.php';
if (file_exists($path)) { include $path; } else {
    echo '<main id="primary" class="site-main">';
    if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif;
    echo '</main>';
}
get_footer();
