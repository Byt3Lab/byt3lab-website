<?php
// BYT3LAB Builder - auto-include component assets for apropos-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'apropos-body';
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

<div class="component-apropos-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->

    <!-- 1. Hero Section -->
    <section class="apropos-hero text-center position-relative">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="mb-4">
                        <span class="apropos-hero__badge font-monospace text-uppercase">
                            <span>⚡</span> Souveraineté &amp; Innovation Numérique
                        </span>
                    </div>

                    <h1 class="f-nasalization display-4 fw-bold apropos-hero__title mb-4">
                        Bâtir la Première <span class="apropos-hero__title-gradient">Puissance Technologique</span> Africaine
                    </h1>

                    <p class="lead mx-auto mb-5 fs-5" style="max-width: 860px; color: #334155; line-height: 1.8;">
                        <strong>BYT3LAB</strong> est un écosystème hybride articulé autour de deux forces majeures : l'<strong>Ingénierie Logicielle de pointe</strong> (progiciels de gestion, cloud souverain) et notre <strong>Pôle Agence de Communication (NGRAFIX)</strong>, conçu pour accompagner les organisations dans la maîtrise de leur identité visuelle, leur stratégie marketing et la création de visuels à fort impact.
                    </p>

                    <!-- Quick Navigation Actions -->
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                        <a href="#pole-communication" class="a-button a-button--primary btn btn-lg px-4 py-3 fw-bold text-uppercase d-inline-flex align-items-center gap-2" style="border-radius: 8px; background: #9333ea; border-color: #9333ea;">
                            <span>🎨 Découvrir le Pôle NGRAFIX</span>
                        </a>
                        <a href="#equipe" class="btn btn-outline-primary btn-lg px-4 py-3 fw-bold text-uppercase d-inline-flex align-items-center gap-2" style="border-radius: 8px; border-color: rgba(2, 132, 199, 0.4); color: #0284c7;">
                            <span>Notre Équipe</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        </a>
                        <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-outline-secondary btn-lg px-4 py-3 fw-bold text-uppercase" style="border-radius: 8px;">
                            Nos Solutions Métiers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container py-5 text-start">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;" data-bs-toggle="tooltip" title="Notre Vision Stratégique">Manifeste &amp; Histoire</span>
                    <h2 class="f-nasalization display-6 fw-bold mb-4" style="color: #0f172a;">
                        Pourquoi BYT3LAB a été créé ?
                    </h2>
                    <p class="mb-4" style="color: #334155; line-height: 1.8; font-size: 16px;">
                        Pendant trop longtemps, les entreprises et institutions locales ont été tributaires de logiciels importés, coûteux en devises, inadaptés aux réalités fiscales locales, et enfermant leurs données stratégiques à l'étranger.
                    </p>
                    <p class="mb-4" style="color: #334155; line-height: 1.8; font-size: 16px;">
                        Parallèlement, de nombreuses organisations souffraient d'un déficit d'image : une valeur métier réelle mais invisible, faute d'une identité visuelle moderne et d'une stratégie de communication affirmée.
                    </p>
                    <p class="mb-4" style="color: #334155; line-height: 1.8; font-size: 16px;">
                        <strong>BYT3LAB</strong> est né pour combler cette double rupture : fusionner la puissance de l'<strong>ingénierie logicielle avancée</strong> avec la force d'impact d'une <strong>agence de communication stratégique (NGRAFIX)</strong>. Nous permettons aux organisations de fonctionner avec une autonomie technologique totale et de rayonner auprès de leurs clients.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-4 position-relative" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.3);">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/media/byt3lab_sng.png'); ?>" alt="Byt3lab" style="height: 48px; width: auto;" />
                            <div>
                                <h3 class="f-nasalization h4 mb-0 text-white c-navbar__brand-text--shiny">BYT3LAB </h3><br>
                                <small class="font-monospace" style="color: #94a3b8;">Software Engineering &amp; Communication Agency</small>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge rounded-circle p-2 mt-1" style="background: rgba(56, 189, 248, 0.2); color: #38bdf8;">✓</span>
                                <div>
                                    <strong class="text-white d-block">Pôle 1 : Ingénierie Logicielle &amp; Cloud Souverain</strong>
                                    <p class="small mb-0" style="color: #cbd5e1; line-height: 1.5;">Progiciels de gestion (Melodi ERP, SUKU), développements sur-mesure et serveurs souverains isolés pour une autonomie pérenne.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge rounded-circle p-2 mt-1" style="background: rgba(147, 51, 234, 0.25); color: #c084fc;">✓</span>
                                <div>
                                    <strong class="text-white d-block">Pôle 2 : Agence de Communication &amp; Branding (NGRAFIX)</strong>
                                    <p class="small mb-0" style="color: #cbd5e1; line-height: 1.5;">Identité visuelle 360°, stratégie marketing de positionnement, réalisations graphiques publicitaires et UI/UX d'excellence.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge rounded-circle p-2 mt-1" style="background: rgba(16, 185, 129, 0.2); color: #34d399;">✓</span>
                                <div>
                                    <strong class="text-white d-block">Un Guichet Unique à Haute Valeur Ajoutée</strong>
                                    <p class="small mb-0" style="color: #cbd5e1; line-height: 1.5;">Plus besoin de dissocier vos prestataires techniques et créatifs : nous alignons parfaitement le moteur applicatif et l'image de marque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Section Pôle Communication Agency & NGRAFIX -->
    <section id="pole-communication" class="py-5" style="background: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; scroll-margin-top: 80px;">
        <div class="container py-5 text-start">
            
            <div class="row align-items-center mb-5 g-4">
                <div class="col-lg-8">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(147, 51, 234, 0.08); border: 1px solid rgba(147, 51, 234, 0.25);">
                        <span style="font-size: 15px;">🎨</span>
                        <span class="font-monospace fw-semibold" style="color: #9333ea; font-size: 12px; letter-spacing: 0.8px;">
                            COMMUNICATION AGENCY &amp; CRÉATIVITÉ • BRANCHE NGRAFIX
                        </span>
                    </div>
                    <h2 class="f-nasalization display-6 fw-bold mb-3" style="color: #0f172a;">
                        Aider les Organisations à <span style="background: linear-gradient(135deg, #9333ea 0%, #0284c7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Mieux Communiquer</span> &amp; Impacter
                    </h2>
                    <p class="mb-0 fs-6" style="color: #334155; line-height: 1.8;">
                        La technologie n'atteint son plein potentiel que lorsqu'elle est portée par une image de marque irréprochable et un discours stratégique percutant. À travers sa branche spécialisée <strong>NGRAFIX</strong>, BYT3LAB opère comme une véritable agence de communication intégrée, accompagnant les entreprises, PME et institutions pour maîtriser leur identité visuelle, orchestrer leur stratégie marketing et concevoir des supports visuels qui captent l'attention et génèrent des résultats.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end d-flex flex-column flex-sm-row flex-lg-column align-items-lg-end justify-content-lg-center gap-2">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary font-monospace py-2.5 px-4 fw-semibold d-inline-flex align-items-center justify-content-center gap-2" style="background: #9333ea; border-color: #9333ea; border-radius: 8px; font-size: 14px;">
                        <span>Confier un projet à NGRAFIX</span>
                        <span>&rarr;</span>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary font-monospace py-2 px-3 fw-semibold d-inline-flex align-items-center justify-content-center gap-2" style="border-radius: 8px; border-color: #1877F2; color: #1877F2; font-size: 13px; background: rgba(24, 119, 242, 0.05);">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span>Page Facebook NGRAFIX</span>
                    </a>
                </div>
            </div>

            <!-- 4 Piliers Clés NGRAFIX -->
            <div class="row g-4 mb-5">
                
                <!-- Pilier 1: Identité Visuelle -->
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border ngrafix-card position-relative overflow-hidden" style="border-color: #e2e8f0;">
                        <div class="ngrafix-icon-badge mb-3" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a; font-size: 16px;">Maîtrise de l'Identité Visuelle</h3>
                        <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                            Nous forgeons des univers graphiques identifiables et pérennes : logos distinctifs, chartes graphiques complètes, typographies et règles d'usage qui valorisent votre crédibilité.
                        </p>
                        <ul class="list-unstyled small mb-0 font-monospace text-muted d-flex flex-column gap-1.5" style="font-size: 11px;">
                            <li><span style="color: #9333ea;">✔</span> Logotypes &amp; Brand Guidelines</li>
                            <li><span style="color: #9333ea;">✔</span> Refonte &amp; Modernisation de Marque</li>
                            <li><span style="color: #9333ea;">✔</span> Papeterie &amp; Supports Officiels</li>
                        </ul>
                    </div>
                </div>

                <!-- Pilier 2: Stratégie Marketing -->
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border ngrafix-card position-relative overflow-hidden" style="border-color: #e2e8f0;">
                        <div class="ngrafix-icon-badge mb-3" style="background: rgba(2, 132, 199, 0.1); color: #0284c7;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M16 12l-4-4-4 4M12 8v8"/></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a; font-size: 16px;">Stratégie Marketing &amp; Impact</h3>
                        <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                            Positionnez votre organisation avec clarté et conviction. Nous élaborons votre proposition de valeur, votre storytelling de marque et vos campagnes pour mobiliser vos audiences.
                        </p>
                        <ul class="list-unstyled small mb-0 font-monospace text-muted d-flex flex-column gap-1.5" style="font-size: 11px;">
                            <li><span style="color: #0284c7;">✔</span> Positionnement &amp; Proposition de Valeur</li>
                            <li><span style="color: #0284c7;">✔</span> Plans de Communication 360°</li>
                            <li><span style="color: #0284c7;">✔</span> Storytelling &amp; Narration Stratégique</li>
                        </ul>
                    </div>
                </div>

                <!-- Pilier 3: Réalisation de Visuels -->
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border ngrafix-card position-relative overflow-hidden" style="border-color: #e2e8f0;">
                        <div class="ngrafix-icon-badge mb-3" style="background: rgba(16, 185, 129, 0.1); color: #059669;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a; font-size: 16px;">Réalisation de Visuels Tous Supports</h3>
                        <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                            Conception graphique haut de gamme pour tous vos canaux de diffusion : visuels pour réseaux sociaux, plaquettes institutionnelles, affiches, roll-ups, packaging et motion design.
                        </p>
                        <ul class="list-unstyled small mb-0 font-monospace text-muted d-flex flex-column gap-1.5" style="font-size: 11px;">
                            <li><span style="color: #059669;">✔</span> Campagnes Digitales &amp; Social Media</li>
                            <li><span style="color: #059669;">✔</span> Plaquettes &amp; Catalogues Institutionnels</li>
                            <li><span style="color: #059669;">✔</span> Affiches, Roll-ups &amp; Événementiel</li>
                        </ul>
                    </div>
                </div>

                <!-- Pilier 4: UI/UX Design -->
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 bg-white border ngrafix-card position-relative overflow-hidden" style="border-color: #e2e8f0;">
                        <div class="ngrafix-icon-badge mb-3" style="background: rgba(245, 158, 11, 0.1); color: #d97706;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2 font-monospace" style="color: #0f172a; font-size: 16px;">UI/UX Design &amp; Expérience Digitale</h3>
                        <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                            En connexion directe avec notre pôle logiciel, NGRAFIX conçoit des interfaces fluides, esthétiques et intuitives qui maximisent l'adoption de vos progiciels et applications.
                        </p>
                        <ul class="list-unstyled small mb-0 font-monospace text-muted d-flex flex-column gap-1.5" style="font-size: 11px;">
                            <li><span style="color: #d97706;">✔</span> Design Systems &amp; Ergonomie Logicielle</li>
                            <li><span style="color: #d97706;">✔</span> Prototypes Interactifs &amp; Tests Utilisateurs</li>
                            <li><span style="color: #d97706;">✔</span> Parcours Clients Optimisés</li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Synergy Banner: Software Engineering + Communication Agency -->
            <div class="p-4 p-md-5 rounded-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%); color: #ffffff; border: 1px solid rgba(147, 51, 234, 0.3); box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.4);">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);">
                            <span class="font-monospace fw-semibold" style="color: #c084fc; font-size: 11px;">LA FORCE DU DOUBLE CŒUR : TECH + COMMUNICATION</span>
                        </div>
                        <h3 class="f-nasalization h3 fw-bold mb-3" style="color: #ffffff;">
                            Pourquoi Choisir un Partenaire Qui Maîtrise le Code et l'Image ?
                        </h3>
                        <p class="text-light opacity-75 mb-0" style="font-size: 15px; line-height: 1.8;">
                            Contrairement aux modèles traditionnels où les agences de communication ne comprennent pas les contraintes techniques, et où les sociétés de développement négligent la dimension visuelle, <strong>BYT3LAB aligne les deux expertises</strong>. Vos outils technologiques sont performants, et votre communication est immédiatement irrésistible.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-column gap-2 align-items-lg-end">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary font-monospace py-2.5 px-4 fw-semibold w-100 w-lg-auto" style="background: #9333ea; border-color: #9333ea; border-radius: 8px; font-size: 13px;">
                                🎨 Lancer un projet de Branding
                            </a>
                            <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success font-monospace py-2 px-3 fw-semibold w-100 w-lg-auto text-white" style="border-color: #22c55e; border-radius: 8px; font-size: 13px;">
                                💬 WhatsApp Direct Créatif
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- 6. Section Présentation de l'Équipe (Dynamic via byt3lab_team CPT) -->
    <section id="equipe" class="py-5" style="background: #ffffff; border-top: 1px solid #e2e8f0; scroll-margin-top: 90px;">
        <div class="container py-5 text-center">
            <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-2" style="color: #0284c7;" data-bs-toggle="tooltip" title="Les esprits brillants derrière nos solutions">Capital Humain</span>
            <h2 class="f-nasalization display-6 fw-bold mb-3" style="color: #0f172a;">L'Équipe d'Excellence BYT3LAB</h2>
            <p class="mx-auto mb-5 fs-6" style="max-width: 760px; color: #334155; line-height: 1.7;">
                Architectes logiciels, ingénieurs cloud, designers d'expérience et consultants métiers : découvrez les passionnés qui construisent chaque jour la première puissance technologique africaine.
            </p>

            <div>
                <a href="<?php echo esc_url(home_url('/equipe/')); ?>" class="btn btn-outline-primary btn-sm px-4 py-2 font-monospace fw-bold" style="border-radius: 6px;">
                    Consulter notre équipe &rarr;
                </a>
            </div>
            <!-- Join the team CTA -->
            <div class="mt-5 p-4 rounded-4 text-center mx-auto" style="max-width: 800px; background: #f8fafc; border: 1px solid #e2e8f0;">
                <h4 class="f-nasalization h5 fw-bold mb-2" style="color: #0f172a;">Vous souhaitez rejoindre notre aventure ?</h4>
                <p class="text-muted small mb-3">Nous recherchons en permanence des talents passionnés par l'ingénierie et le design.</p>
                <a href="<?php echo esc_url(home_url('/carriere/')); ?>" class="btn btn-outline-primary btn-sm px-4 py-2 font-monospace fw-bold" style="border-radius: 6px;">
                    Consulter nos offres de Carrière &rarr;
                </a>
            </div>
        </div>
    </section>


    <!-- 7. Section CTA Final -->
    <section class="py-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff;">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge mb-3 px-3 py-2 rounded-pill font-monospace" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">
                        COLLABORONS ENSEMBLE
                    </span>
                    <h2 class="f-nasalization display-5 fw-bold mb-4">
                        Prêt à Révolutionner Votre Écosystème Numérique ?
                    </h2>
                    <p class="lead text-light mb-5 fs-5 opacity-75">
                        Que vous ayez besoin d'un progiciel métier clé en main, d'un audit de cybersécurité ou d'une direction artistique d'envergure, nous sommes prêts.
                    </p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="a-button a-button--primary btn btn-lg py-3 px-5 fw-bold text-uppercase" style="border-radius: 8px;">
                            Nous Contacter
                        </a>
                        <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success btn-lg py-3 px-5 fw-bold text-uppercase" style="border-radius: 8px;">
                            WhatsApp Direct
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>
