<?php
// BYT3LAB Builder - auto-include component assets for pricing-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'pricing-body';
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

<div class="component-pricing-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- Hero / Title Header -->
    <section class="py-5 text-center position-relative overflow-hidden" style="background: radial-gradient(circle at bottom left, rgba(2, 132, 199, 0.08), transparent 60%), #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 position-relative" style="z-index: 2;">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Packs D'Accompagnement</span>
            <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a;">Nos Tarifs & Offres</h1>
            <p class="lead mx-auto" style="max-width: 700px; color: #475569;">
                Des forfaits d'ingénierie transparents et adaptés à la taille de vos projets pour un accompagnement optimal à chaque étape de votre transformation numérique.
            </p>
        </div>
    </section>

    <!-- Pricing Packages -->
    <section class="py-5" style="background: #f8fafc;">
        <div class="container py-5 text-start">
            <div class="row g-4 justify-content-center">

                <!-- Pack 1: Web -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between border" style="background: #ffffff; border-color: #e2e8f0 !important; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03);">
                        <div class="p-4" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <span class="font-monospace small fw-bold" style="color: #0284c7 !important;">DÉVELOPPEMENT WEB</span>
                            <h3 class="h4 fw-bold mt-1" style="color: #0f172a;">Pack Site Web</h3>
                            <p class="small mb-0" style="color: #475569;">Création de vitrines modernes et optimisées pour le référencement.</p>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small mb-4" style="color: #475569;">
                                <li class="mb-2">✓ Maquette Figma sur-mesure</li>
                                <li class="mb-2">✓ Codage responsive web/mobile</li>
                                <li class="mb-2">✓ Intégration SEO de base</li>
                                <li class="mb-2">✓ Hébergement & nom de domaine</li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary w-100 py-2 fw-bold" style="color: #0284c7; border-color: #0284c7;">Demander un devis</a>
                        </div>
                    </div>
                </div>

                <!-- Pack 2: Application -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between border" style="background: #ffffff; border-color: #e2e8f0 !important; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03);">
                        <div class="p-4" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <span class="font-monospace small fw-bold" style="color: #0284c7 !important;">SUR-MESURE COMPLEXE</span>
                            <h3 class="h4 fw-bold mt-1" style="color: #0f172a;">Pack App Métier</h3>
                            <p class="small mb-0" style="color: #475569;">Développement de portails métiers et d'applications mobiles performantes.</p>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small mb-4" style="color: #475569;">
                                <li class="mb-2">✓ App mobile iOS / Android</li>
                                <li class="mb-2">✓ Base de données sécurisée</li>
                                <li class="mb-2">✓ API REST & Panel Admin</li>
                                <li class="mb-2">✓ Support & Mises à jour</li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary w-100 py-2 fw-bold" style="color: #0284c7; border-color: #0284c7;">Demander un devis</a>
                        </div>
                    </div>
                </div>

                <!-- Pack 3: Audit & Sec -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between border" style="background: #ffffff; border-color: #e2e8f0 !important; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03);">
                        <div class="p-4" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <span class="font-monospace small fw-bold" style="color: #0284c7 !important;">RESILIENCE & CYBER</span>
                            <h3 class="h4 fw-bold mt-1" style="color: #0f172a;">Pack Audit & Sec</h3>
                            <p class="small mb-0" style="color: #475569;">Audit de vulnérabilité et durcissement de vos systèmes actuels.</p>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small mb-4" style="color: #475569;">
                                <li class="mb-2">✓ Tests d'intrusion (pentesting)</li>
                                <li class="mb-2">✓ Rapport détaillé d'erreurs</li>
                                <li class="mb-2">✓ Application de correctifs de sécurité</li>
                                <li class="mb-2">✓ Isolation réseau VPC & WAF</li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary w-100 py-2 fw-bold" style="color: #0284c7; border-color: #0284c7;">Demander un devis</a>
                        </div>
                    </div>
                </div>

                <!-- Pack 4: Installation IT -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 rounded-4 overflow-hidden d-flex flex-column justify-content-between border" style="background: #ffffff; border-color: #e2e8f0 !important; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.03);">
                        <div class="p-4" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <span class="font-monospace small fw-bold" style="color: #0284c7 !important;">DEVOPS & SYSTEM</span>
                            <h3 class="h4 fw-bold mt-1" style="color: #0f172a;">Installation IT</h3>
                            <p class="small mb-0" style="color: #475569;">Mise en place de serveurs, réseaux et d'architectures d'automatisation.</p>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small mb-4" style="color: #475569;">
                                <li class="mb-2">✓ Config serveurs locaux / cloud</li>
                                <li class="mb-2">✓ Containerisation Docker</li>
                                <li class="mb-2">✓ Pipeline CI/CD automatisé</li>
                                <li class="mb-2">✓ Backup & Monitoring</li>
                            </ul>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary w-100 py-2 fw-bold" style="color: #0284c7; border-color: #0284c7;">Demander un devis</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>

