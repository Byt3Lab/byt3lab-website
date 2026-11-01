<?php
/*
Template Name: melodi
Description: progiciel de gestion d\\\&#039;entreprise modulaire et scalable
*/
// Assets (CSS/JS) for this page are enqueued by functions.php via wp_enqueue_scripts.
// Edit pages/melodi.json to add/remove/reorder assets and components.
get_header();
?>

<main id="primary" class="site-main">

<?php get_template_part('components/footer/footer'); ?>
<?php get_template_part('components/melodi-body/melodi-body'); ?>
<?php get_template_part('components/header/header'); ?>


</main>

<?php get_footer(); ?>