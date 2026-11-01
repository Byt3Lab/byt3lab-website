<?php
// byt3lab_wordpress_theme Functions

if (!defined('ABSPATH')) {
    exit;
}

// Load BYT3LAB Theme Content Administration & Post Types
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/meta-boxes.php';
require_once get_template_directory() . '/inc/admin-page.php';
require_once get_template_directory() . '/inc/contact-handler.php';

// Theme support (Featured Images / Thumbnails & Title Tag)
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
});

// Enqueue theme base style & premium enhancements
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('byt3lab_wordpress_theme-style', get_stylesheet_uri(), [], '1.0.0');
    wp_enqueue_style('byt3lab-premium-theme', get_stylesheet_directory_uri() . '/assets/css/premium-theme.css', ['byt3lab_wordpress_theme-style'], '1.0.0');
    wp_enqueue_script('byt3lab-tooltips-init', get_stylesheet_directory_uri() . '/assets/js/tooltips-init.js', [], '1.0.0', true);
});

// BYT3LAB Builder — enqueue page-specific assets from page JSON config
add_action('wp_enqueue_scripts', function () {
    global $post;

    // Detect slug for both front page and regular pages
    $slug = '';
    if (is_front_page() || is_home()) {
        $configPath = get_stylesheet_directory() . '/config.json';
        if (file_exists($configPath)) {
            $globalCfg = json_decode(file_get_contents($configPath), true);
            if (!empty($globalCfg['special_pages']['front_page'])) {
                $slug = $globalCfg['special_pages']['front_page'];
            }
        }
        
        // Final fallback for front page if config is missing or empty
        if (empty($slug)) {
            $slug = 'home';
        }
    } elseif (is_single()) {
        $slug = 'blog';
    } elseif (is_404()) {
        $slug = 'notfound';
    } elseif (!empty($post->post_name)) {
        $slug = $post->post_name;
    }

    if (empty($slug)) {
        return;
    }

    $jsonPath = get_stylesheet_directory() . '/pages/page-' . $slug . '.json';
    if (!file_exists($jsonPath)) {
        return;
    }

    $cfg = json_decode(file_get_contents($jsonPath), true);
    if (!is_array($cfg)) {
        return;
    }

    // CSS — support both 'css_files' and 'css' keys
    $cssList = [];
    if (!empty($cfg['css_files']) && is_array($cfg['css_files'])) {
        $cssList = $cfg['css_files'];
    } elseif (!empty($cfg['css']) && is_array($cfg['css'])) {
        $cssList = $cfg['css'];
    }

    foreach ($cssList as $i => $asset) {
        $asset = ltrim($asset, '/');
        $src = (preg_match('#^https?://#i', $asset) || strpos($asset, '//') === 0)
            ? $asset
            : get_stylesheet_directory_uri() . '/' . $asset;
        $handle = 'byt3lab_wordpress_theme-page-css-' . $slug . '-' . $i;
        wp_enqueue_style($handle, $src, ['byt3lab_wordpress_theme-style'], null);
    }

    // JS — support both 'js_files' and 'js' keys
    $jsList = [];
    if (!empty($cfg['js_files']) && is_array($cfg['js_files'])) {
        $jsList = $cfg['js_files'];
    } elseif (!empty($cfg['js']) && is_array($cfg['js'])) {
        $jsList = $cfg['js'];
    }

    foreach ($jsList as $i => $asset) {
        $asset = ltrim($asset, '/');
        $src = (preg_match('#^https?://#i', $asset) || strpos($asset, '//') === 0)
            ? $asset
            : get_stylesheet_directory_uri() . '/' . $asset;
        $handle = 'byt3lab_wordpress_theme-page-js-' . $slug . '-' . $i;
        wp_enqueue_script($handle, $src, [], null, true);
    }

    // Component assets — enqueue CSS and JS for each component declared on this page
    if (!empty($cfg['components']) && is_array($cfg['components'])) {
        foreach ($cfg['components'] as $ci => $comp) {
            $compSlug = sanitize_file_name($comp);
            $compDir  = get_stylesheet_directory() . '/components/' . $compSlug;

            $compCss = $compDir . '/' . $compSlug . '.css';
            if (file_exists($compCss)) {
                wp_enqueue_style(
                    'byt3lab_wordpress_theme-comp-' . $compSlug,
                    get_stylesheet_directory_uri() . '/components/' . $compSlug . '/' . $compSlug . '.css',
                    ['byt3lab_wordpress_theme-style'],
                    null
                );
            }

            $compJs = $compDir . '/' . $compSlug . '.js';
            if (file_exists($compJs)) {
                wp_enqueue_script(
                    'byt3lab_wordpress_theme-comp-js-' . $compSlug,
                    get_stylesheet_directory_uri() . '/components/' . $compSlug . '/' . $compSlug . '.js',
                    [],
                    null,
                    true
                );
            }
        }
    }
}, 20);
