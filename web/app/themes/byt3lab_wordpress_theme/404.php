<?php
if (!defined('ABSPATH')) { exit; }
status_header(404);
get_header();
$path = get_template_directory() . '/pages/page-notfound.php';
if (file_exists($path)) { include $path; } else {
    echo '<main id="primary" class="site-main">';
    echo '<h1>404 - Page non trouvée</h1>';
    echo '</main>';
}
get_footer();
