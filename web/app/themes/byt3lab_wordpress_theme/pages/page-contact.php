<?php
/*
Template Name: contact
Description: contact
*/
// Assets (CSS/JS) for this page are enqueued by functions.php via wp_enqueue_scripts.
// Edit pages/contact.json to add/remove/reorder assets and components.
get_header();
?>

<main id="primary" class="site-main">

<?php get_template_part('components/header/header'); ?>
<?php get_template_part('components/contact-body/contact-body'); ?>
<?php get_template_part('components/footer/footer'); ?>


</main>

<?php get_footer(); ?>
