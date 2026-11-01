<?php
// BYT3LAB Builder - auto-include component assets for accueil-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'accueil-body';
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

<div class="component-accueil-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- 1. Hero Section: High-Tech Engineering & Cockpit Showcase -->
    <section class="hero-tech-bg position-relative overflow-hidden py-5">
        <div class="hero-grid-pattern"></div>
        
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center justify-content-center text-center mb-5">
                <div class="col-lg-10 col-xl-9">
                    <h1 class="f-nasalization display-3 fw-bold mb-4" style="color: #0f172a; line-height: 1.15;">
                        Bâtir la <span style="background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Première Puissance</span> Technologique &amp; Souveraine
                    </h1>

                    <p class="lead mb-4 mx-auto" style="max-width: 820px; color: #475569; font-size: 18px; line-height: 1.7;">
                        BYT3LAB conçoit des architectures logicielles de haute précision, des progiciels métiers modulaires et des infrastructures cloud sécurisées pour propulser l'autonomie numérique des organisations africaines.
                    </p>

                    <!-- Well-proportioned Call to Actions -->
                    <div class="d-flex gap-3 justify-content-center flex-wrap mb-5">
                        <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-primary font-monospace py-2 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                            <span>Explorer nos Solutions</span>
                            <span>&rarr;</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-outline-secondary font-monospace py-2 px-4 fw-semibold" style="border-radius: 8px; font-size: 14px;">
                            Nos Services
                        </a>
                        <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success font-monospace py-2 px-3 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 8px; font-size: 14px;">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                            <span>WhatsApp Direct</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 1.5 Dual Pillars: Software Engineering & Communication Agency -->
    <section class="py-5" style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            
            <div class="text-center mb-5 mx-auto" style="max-width: 800px;">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7; font-size: 12px;">DEUX PÔLES SYNERGIQUES</span>
                <h2 class="f-nasalization h2 fw-bold mb-3" style="color: #0f172a;">
                    L'Excellence du Code &amp; la Puissance de l'Image
                </h2>
                <p class="mb-0" style="color: #334155; line-height: 1.7;">
                    BYT3LAB structure son savoir-faire autour de deux branches complémentaires pour donner à votre organisation les moyens de ses ambitions numériques et de son rayonnement.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">
                <!-- Pôle 1: Byt3lab Tech -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-4 h-100 border d-flex flex-column" style="background: #f8fafc; border-color: #e2e8f0 !important; border-top: 4px solid #0284c7 !important;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge font-monospace px-3 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; font-size: 11px;">
                                PÔLE 1 • SOFTWARE ENGINEERING
                            </span>
                            <span style="font-size: 22px;">💻</span>
                        </div>
                        <h3 class="f-nasalization h3 fw-bold mb-3" style="color: #0f172a;">Byt3lab</h3>
                        <p class="mb-4" style="color: #334155; line-height: 1.7; font-size: 15px;">
                            Ingénierie logicielle avancée et progiciels de gestion intégrés conçus pour l'indépendance opérationnelle de votre entreprise.
                        </p>
                        <ul class="list-unstyled d-flex flex-column gap-2 small font-monospace mb-4" style="color: #334155;">
                            <li><span class="text-primary fw-bold">✓</span> Développement SaaS, Plateformes Web &amp; Applications Mobiles</li>
                            <li><span class="text-primary fw-bold">✓</span> Infrastructures Cloud Souveraines, DevOps &amp; Cybersécurité</li>
                        </ul>
                        <div class="mt-auto pt-3 border-top d-flex gap-2 flex-wrap">
                            <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-sm btn-primary font-monospace px-3 py-2 fw-semibold" style="background: #0284c7; border: none; border-radius: 6px; font-size: 13px;">
                                Découvrir nos Solutions &rarr;
                            </a>
                            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace px-3 py-2 fw-semibold" style="border-radius: 6px; font-size: 13px;">
                                Services Ingénierie
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pôle 2: Ngrafix Studio -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-4 h-100 border d-flex flex-column" style="background: #f8fafc; border-color: #e2e8f0 !important; border-top: 4px solid #9333ea !important;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="badge font-monospace px-3 py-1 rounded-pill" style="background: rgba(147, 51, 234, 0.1); color: #9333ea; font-size: 11px;">
                                PÔLE 2 • COMMUNICATION AGENCY
                            </span>
                            <span style="font-size: 22px;">🎨</span>
                        </div>
                        <h3 class="f-nasalization h3 fw-bold mb-3" style="color: #0f172a;">Ngrafix</h3>
                        <p class="mb-4" style="color: #334155; line-height: 1.7; font-size: 15px;">
                            Notre agence de communication et de création visuelle dédiée à aider les organisations à mieux communiquer, convaincre et impacter.
                        </p>
                        <ul class="list-unstyled d-flex flex-column gap-2 small font-monospace mb-4" style="color: #334155;">
                            <li><span style="color: #9333ea; font-weight: bold;">✓</span> Maîtrise de l'Identité Visuelle : Logos, Chartes 360° &amp; Branding</li>
                            <li><span style="color: #9333ea; font-weight: bold;">✓</span> Stratégie Marketing, Positionnement &amp; Plans de Communication</li>
                            <li><span style="color: #9333ea; font-weight: bold;">✓</span> Réalisation de Visuels : Réseaux sociaux, Print, Plaquettes &amp; UI/UX</li>
                        </ul>
                        <div class="mt-auto pt-3 border-top d-flex gap-2 flex-wrap">
                            <a href="<?php echo esc_url(home_url('/a-propos/#pole-communication')); ?>" class="btn btn-sm btn-primary font-monospace px-3 py-2 fw-semibold" style="background: #9333ea; border: none; border-radius: 6px; font-size: 13px;">
                                Découvrir le Pôle NGRAFIX &rarr;
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-sm btn-outline-secondary font-monospace px-3 py-2 fw-semibold" style="border-radius: 6px; font-size: 13px;">
                                Demander un Devis Créatif
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary font-monospace px-3 py-2 fw-semibold d-inline-flex align-items-center gap-1.5" style="border-radius: 6px; font-size: 13px; border-color: #1877F2; color: #1877F2;">
                                <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                <span>Facebook Ngrafix</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-5" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-5 text-start">
            
            <div class="text-center mb-5">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;">Processus de Réalisation</span>
                <h2 class="f-nasalization h1 fw-bold" style="color: #0f172a;">La Démarche d'Ingénierie BYT3LAB</h2>
                <p class="mx-auto mt-2" style="max-width: 650px; color: #334155; line-height: 1.7;">
                    Un cycle de production rigoureux pour garantir le respect des délais, la sécurité et la pérennité de vos systèmes.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border" style="border-color: #e2e8f0 !important;">
                        <div class="f-nasalization h4 fw-bold mb-2" style="color: #0284c7;">01</div>
                        <h4 class="h6 fw-bold mb-2 text-dark">Audit &amp; Cadrage</h4>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Immersion dans vos processus métiers, rédaction des spécifications et validation des maquettes UI interactives.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border" style="border-color: #e2e8f0 !important;">
                        <div class="f-nasalization h4 fw-bold mb-2" style="color: #0284c7;">02</div>
                        <h4 class="h6 fw-bold mb-2 text-dark">Sprints &amp; Démo</h4>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Développement itératif par modules. Démonstrations bimensuelles pour recueillir vos retours en temps réel.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border" style="border-color: #e2e8f0 !important;">
                        <div class="f-nasalization h4 fw-bold mb-2" style="color: #0284c7;">03</div>
                        <h4 class="h6 fw-bold mb-2 text-dark">Tests &amp; Sécurité</h4>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Audits de sécurité, tests unitaires et de montée en charge pour garantir une stabilité maximale en production.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border" style="border-color: #e2e8f0 !important;">
                        <div class="f-nasalization h4 fw-bold mb-2" style="color: #0284c7;">04</div>
                        <h4 class="h6 fw-bold mb-2 text-dark">Déploiement &amp; SLA</h4>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Mise en production sécurisée sur votre infrastructure, formation de vos équipes et assistance technique continue.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-top: 1px solid rgba(255,255,255,0.1);">
        <div class="container py-5 position-relative" style="z-index: 2;">
            
            <span class="badge px-3 py-1 rounded-pill font-monospace mb-3" style="background: rgba(2, 132, 199, 0.25); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.4); font-size: 11px;">
                DÉMARRER UN PROJET
            </span>

            <h2 class="f-nasalization display-5 fw-bold mb-3" style="color: #ffffff;">
                Construisons le Futur Technologique Ensemble
            </h2>

            <p class="lead mx-auto mb-4 text-white-50" style="max-width: 680px; font-size: 17px; line-height: 1.7;">
                Que vous souhaitiez déployer un progiciel prêt à l'emploi (Melodi ERP, SUKU) ou développer une architecture sur-mesure : nos ingénieurs sont prêts.
            </p>

            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary font-monospace py-2.5 px-4 fw-semibold" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                    Lancer une collaboration &rarr;
                </a>
                <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light font-monospace py-2.5 px-4 fw-semibold d-inline-flex align-items-center gap-2" style="border-radius: 8px; font-size: 14px;">
                    <span>WhatsApp Ingénierie</span>
                </a>
            </div>

        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>