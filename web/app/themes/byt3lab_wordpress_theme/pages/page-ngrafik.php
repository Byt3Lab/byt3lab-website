<?php
/*
Template Name: ngrafix
Description: services de marketing, création de contenu, audio, vidéo, graphisme, infographie
*/
// Assets (CSS/JS) for this page are enqueued by functions.php via wp_enqueue_scripts.
// Edit pages/ngrafik.json to add/remove/reorder assets and components.
get_header();
?>

<main id="primary" class="site-main">

<?php get_template_part('components/header/header'); ?>
<?php get_template_part('components/ngrafik-body/ngrafik-body'); ?>
<?php get_template_part('components/footer/footer'); ?>


</main>

<?php get_footer(); ?>