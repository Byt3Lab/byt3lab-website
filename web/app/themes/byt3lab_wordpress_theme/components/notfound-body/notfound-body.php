<?php
// BYT3LAB Builder - auto-include component assets for notfound-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'notfound-body';
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

<div class="component-notfound-body bg-white text-dark d-flex align-items-center justify-content-center" style="min-height: 75vh; background: radial-gradient(circle at center, rgba(2, 132, 199, 0.08), transparent 70%), #ffffff;">
    <!-- BYT3LAB-CONTENT-START -->
    <div class="container py-5 text-center">
        <div class="mx-auto" style="max-width: 600px;">
            <!-- Big premium error number -->
            <div class="f-nasalization display-1 fw-bold mb-3" style="font-size: 8rem; color: #0284c7; background: linear-gradient(to right, #0284c7, #2563eb); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                404
            </div>
            
            <h1 class="f-nasalization h2 fw-bold mb-4" style="color: #0f172a;">Erreur système : page introuvable</h1>
            
            <p class="fs-5 mb-5" style="color: #475569;">
                Désolé, la page que vous recherchez n'existe pas ou a été déplacée. Vous pouvez retourner directement à l'accueil.
            </p>

            <!-- Home button -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="a-button a-button--primary btn btn-lg py-3 px-5 fw-bold text-uppercase" style="border-radius: 8px;">
                Retourner à l'accueil
            </a>
        </div>
    </div>
    <!-- BYT3LAB-CONTENT-END -->
</div>