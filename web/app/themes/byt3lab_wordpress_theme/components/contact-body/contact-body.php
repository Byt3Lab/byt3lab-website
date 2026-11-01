<?php
// Handle direct POST submission fallback (guarantees form works even without AJAX)
$byt3lab_form_result = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!empty($_POST['byt3lab_direct_submit']) || (isset($_POST['action']) && $_POST['action'] === 'byt3lab_submit_contact'))) {
    if (function_exists('byt3lab_process_contact_submission')) {
        $byt3lab_form_result = byt3lab_process_contact_submission($_POST);
    }
}

// BYT3LAB Builder - auto-include component assets for contact-body
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'contact-body';
$__byt3lab_css_path = get_stylesheet_directory() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.css';
$__byt3lab_js_path = get_stylesheet_directory() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.js';
$__byt3lab_css_uri = get_stylesheet_directory_uri() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.css';
$__byt3lab_js_uri = get_stylesheet_directory_uri() . '/components/' . $__byt3lab_comp_slug . '/' . $__byt3lab_comp_slug . '.js';
if (file_exists($__byt3lab_css_path) && !in_array($__byt3lab_css_uri, $GLOBALS['byt3lab_assets_printed']['css'])) {
    echo '<link rel="stylesheet" href="' . esc_url($__byt3lab_css_uri) . '" />' . "\n";
    $GLOBALS['byt3lab_assets_printed']['css'][] = $__byt3lab_css_uri;
}
?>

<div class="component-contact-body bg-white text-dark">
    <!-- BYT3LAB-CONTENT-START -->
    
    <!-- 1. Hero / Title Header -->
    <section class="contact-hero-bg position-relative overflow-hidden py-5">
        <div class="contact-grid-pattern"></div>
        
        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10 col-xl-9">
                    
                    <div class="mb-3 d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background: rgba(2, 132, 199, 0.08); border: 1px solid rgba(2, 132, 199, 0.25);">
                        <span class="status-live-pulse"></span>
                        <span class="font-monospace fw-semibold" style="color: #0284c7; font-size: 12px; letter-spacing: 0.5px;">
                            INGÉNIERIE, PARTENARIATS &amp; DÉMONSTRATIONS
                        </span>
                    </div>

                    <h1 class="f-nasalization display-4 fw-bold mb-3" style="color: #0f172a; line-height: 1.15;">
                        Engagez vos Projets <span style="background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Technologiques</span>
                    </h1>

                    <p class="lead mb-4 mx-auto" style="max-width: 780px; color: #475569; font-size: 18px; line-height: 1.7;">
                        Échangez directement avec nos architectes logiciels, planifiez une démonstration personnalisée de nos progiciels (Melodi ERP, SUKU) ou lancez votre projet d'infrastructure cloud souveraine.
                    </p>

                    <!-- Telemetry / Reassurance Row -->
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            ⚡ Réponse garantie sous <strong>24 heures</strong>
                        </div>
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            💬 Échange direct via <strong>WhatsApp RH &amp; Ventes</strong>
                        </div>
                        <div class="px-3 py-1.5 rounded-3 font-monospace small" style="background: #f8fafc; border: 1px solid #e2e8f0; color: #334155;">
                            🏢 Bureaux à <strong>Douala &amp; Yaoundé</strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- 2. Main Form & Coordinates Section -->
    <section class="py-5" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
        <div class="container py-4 text-start">
            <div class="row g-5">
                
                <!-- Left: Interactive Form -->
                <div class="col-lg-7">
                    <div class="contact-form-card">
                        
                        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                            <div>
                                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">FORMULAIRE SÉCURISÉ</span>
                                <h2 class="f-nasalization h4 fw-bold mb-0" style="color: #0f172a;">Parlez-nous de votre Projet</h2>
                            </div>
                            <span class="badge font-monospace" style="background: rgba(16, 185, 129, 0.1); color: #059669; border: 1px solid rgba(16, 185, 129, 0.2); font-size: 11px;">
                                Confidentialité Garantie
                            </span>
                        </div>

                        <!-- Success Alert Feedback -->
                        <?php 
                        $show_success = ($byt3lab_form_result && !empty($byt3lab_form_result['success']));
                        $show_error   = ($byt3lab_form_result && empty($byt3lab_form_result['success']));
                        $success_msg  = $show_success ? $byt3lab_form_result['message'] : 'Votre message a été transmis avec succès à nos équipes techniques !';
                        $error_msg    = $show_error ? $byt3lab_form_result['message'] : 'Une erreur est survenue lors de l\'envoi de votre demande.';
                        $wa_direct    = ($show_success && !empty($byt3lab_form_result['whatsapp_url'])) ? $byt3lab_form_result['whatsapp_url'] : 'https://wa.me/237696879475';
                        ?>
                        <div id="byt3lab-contact-alert" class="alert alert-success <?php echo $show_success ? '' : 'd-none'; ?> mb-4 p-3 rounded-3" style="border: 1px solid #86efac; background: #f0fdf4; color: #166534;" role="alert">
                            <div class="d-flex align-items-start gap-2">
                                <span style="font-size: 20px;">✅</span>
                                <div>
                                    <strong>Votre demande a été transmise avec succès à nos équipes techniques !</strong><br />
                                    <span id="byt3lab-contact-alert-desc"><?php echo esc_html($success_msg); ?></span>
                                    <div id="byt3lab-contact-wa-wrap" class="mt-2.5 pt-2 border-top border-success-subtle <?php echo $show_success ? '' : 'd-none'; ?>">
                                        <a id="byt3lab-contact-wa-btn" href="<?php echo esc_url($wa_direct); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success font-monospace px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1.5" style="background-color: #25D366; border: none; font-size: 12px; border-radius: 6px;">
                                            <span>💬 Accélérer le traitement via WhatsApp</span>
                                            <span>&rarr;</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Error Alert Feedback -->
                        <div id="byt3lab-contact-error" class="alert alert-danger <?php echo $show_error ? '' : 'd-none'; ?> mb-4 p-3 rounded-3" style="border: 1px solid #fca5a5; background: #fef2f2; color: #991b1b;" role="alert">
                            <div class="d-flex align-items-start gap-2">
                                <span style="font-size: 20px;">⚠️</span>
                                <div id="byt3lab-contact-error-msg"><?php echo esc_html($error_msg); ?></div>
                            </div>
                        </div>

                        <form id="byt3lab-contact-form" method="POST" action="" class="row g-3" data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                            <input type="hidden" name="action" value="byt3lab_submit_contact" />
                            <input type="hidden" name="byt3lab_direct_submit" value="1" />
                            <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce('byt3lab_contact_nonce')); ?>" />
                            
                            <!-- Honeypot anti-spam -->
                            <div style="display:none !important;" aria-hidden="true">
                                <input type="text" name="byt3lab_hp" value="" tabindex="-1" autocomplete="off" />
                            </div>

                            <!-- Nom & Prénom -->
                            <div class="col-md-6">
                                <label for="contact_name" class="form-label font-monospace fw-semibold small" style="color: #334155;">Nom &amp; Prénom *</label>
                                <input type="text" id="contact_name" name="name" class="form-control contact-input" placeholder="ex: Jean-Paul Mbianda" required />
                            </div>

                            <!-- Organisation / Entreprise -->
                            <div class="col-md-6">
                                <label for="contact_org" class="form-label font-monospace fw-semibold small" style="color: #334155;">Entreprise / Organisation</label>
                                <input type="text" id="contact_org" name="org" class="form-control contact-input" placeholder="ex: Groupe Logistique Sahel" />
                            </div>

                            <!-- Email Professionnel -->
                            <div class="col-md-6">
                                <label for="contact_email" class="form-label font-monospace fw-semibold small" style="color: #334155;">Email Professionnel *</label>
                                <input type="email" id="contact_email" name="email" class="form-control contact-input" placeholder="ex: direction@entreprise.cm" required />
                            </div>

                            <!-- Téléphone / WhatsApp -->
                            <div class="col-md-6">
                                <label for="contact_phone" class="form-label font-monospace fw-semibold small" style="color: #334155;">Téléphone / WhatsApp</label>
                                <input type="tel" id="contact_phone" name="phone" class="form-control contact-input" placeholder="ex: +237 6xx xx xx xx" />
                            </div>

                            <!-- Objet / Pôle concerné -->
                            <div class="col-12">
                                <label for="contact_subject" class="form-label font-monospace fw-semibold small" style="color: #334155;">Nature de votre demande *</label>
                                <select id="contact_subject" name="subject" class="form-select contact-input" required>
                                    <option value="" disabled selected>Sélectionnez l'objet principal...</option>
                                    <option value="Demande de démo Melodi ERP">Demande de Démonstration : Melodi ERP (Facturation, POS, Compta, suku, etc)</option>
                                    <option value="Ingénierie Logicielle sur-mesure">Ingénierie Logicielle : Développement SaaS / Mobile / Progiciel dédié</option>
                                    <option value="Infrastructure Cloud & Sécurité">Cloud &amp; Infrastructure : Serveurs souverains, DevOps, Cybersécurité</option>
                                    <option value="Ngrafix Studio">Design &amp; Image de Marque : Ngrafix Studio (UI/UX, Identité)</option>
                                    <option value="Candidature & Carrière">Recrutement &amp; Carrières chez BYT3LAB</option>
                                    <option value="Autre demande">Autre demande de partenariat / Conseil technique</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <label for="contact_message" class="form-label font-monospace fw-semibold small" style="color: #334155;">Détails de votre besoin ou projet *</label>
                                <textarea id="contact_message" name="message" class="form-control contact-input" rows="5" placeholder="Décrivez vos objectifs, contraintes techniques, échéances prévues ou modules progiciels souhaités..." required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary font-monospace py-2.5 px-4 fw-semibold w-100 d-flex align-items-center justify-content-center gap-2" style="background: #0284c7; border-color: #0284c7; border-radius: 8px; font-size: 14px;">
                                    <span>Transmettre ma demande</span>
                                    <span>&rarr;</span>
                                </button>
                                <div class="text-center text-muted small mt-2" style="font-size: 11px;">
                                    🔒 Vos coordonnées ne font l'objet d'aucune commercialisation à des tiers.
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Right: Coordinates & Direct Access -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        
                        <!-- Direct WhatsApp Box -->
                        <div class="p-4 rounded-4" style="background: #ffffff; border: 1.5px solid #22c55e; box-shadow: 0 4px 20px -2px rgba(34, 197, 94, 0.08);">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 22px;">💬</span>
                                <h3 class="h5 fw-bold mb-0 font-monospace" style="color: #15803d;">Canal WhatsApp Direct</h3>
                            </div>
                            <p class="small mb-3" style="color: #334155; line-height: 1.6;">
                                Besoin d'une réponse rapide ou d'un premier échange informel avec un ingénieur ? Notre équipe est joignable directement par messagerie instantanée.
                            </p>
                            <div class="d-grid gap-2">
                                <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-success font-monospace py-2 px-3 fw-semibold d-flex align-items-center justify-content-center gap-2" style="background-color: #25D366; border: none; border-radius: 8px; font-size: 13px;">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.196 8.196 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.25-.75-.67-1.26-1.5-1.4-1.75-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.43.13-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.23.9 2.43 1.03 2.6.13.17 1.77 2.7 4.29 3.78.6.26 1.07.41 1.44.53.6.19 1.15.16 1.59.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.07-.1-.23-.17-.48-.29z"/></svg>
                                    <span>Ligne Principale : +237 696 879 475</span>
                                </a>
                                <a href="https://wa.me/237652354837" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success font-monospace py-2 px-3 fw-semibold d-flex align-items-center justify-content-center gap-2" style="border-radius: 8px; font-size: 13px;">
                                    <span>Ligne Secondaire : +237 652 354 837</span>
                                </a>
                            </div>
                        </div>

                        <!-- Email Contacts Card -->
                        <div class="contact-info-card">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span style="font-size: 20px;">✉️</span>
                                <h3 class="h6 fw-bold mb-0 font-monospace" style="color: #0f172a;">Adresses Électroniques Dédiées</h3>
                            </div>
                            <div class="d-flex flex-column gap-2 small">
                                <div>
                                    <span class="text-muted d-block" style="font-size: 11px;">PROJETS, COMMERCIAL &amp; PARTENARIATS :</span>
                                    <a href="mailto:contact@byt3lab.com" class="fw-semibold text-decoration-none" style="color: #0284c7;">contact@byt3lab.com</a>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="text-muted d-block" style="font-size: 11px;">RECRUTEMENT &amp; TALENTS :</span>
                                    <a href="mailto:carrieres@byt3lab.com" class="fw-semibold text-decoration-none" style="color: #0284c7;">carrieres@byt3lab.com</a>
                                </div>
                                <div class="pt-2 border-top">
                                    <span class="text-muted d-block" style="font-size: 11px;">SUPPORT TECHNIQUE &amp; CLIENTS :</span>
                                    <a href="mailto:support@byt3lab.com" class="fw-semibold text-decoration-none" style="color: #0284c7;">support@byt3lab.com</a>
                                </div>
                            </div>
                        </div>

                        <!-- Offices Card -->
                        <div class="contact-info-card">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span style="font-size: 20px;">🏢</span>
                                <h3 class="h6 fw-bold mb-0 font-monospace" style="color: #0f172a;">Pôles Opérationnels &amp; Présence</h3>
                            </div>
                            <div class="d-flex flex-column gap-3 small" style="color: #334155;">
                                <div>
                                    <strong class="text-dark d-block">Pôle Douala (Littoral)</strong>
                                </div>
                                <div class="pt-2 border-top">
                                    <strong class="text-dark d-block">Pôle Yaoundé (Centre)</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="p-3 rounded-3" style="background: #ffffff; border: 1px solid #e2e8f0;">
                            <div class="d-flex justify-content-between align-items-center font-monospace small mb-1">
                                <span class="text-muted">Horaires Bureaux :</span>
                                <span class="fw-semibold text-dark">Lun - Ven : 08h00 - 18h30 (GMT+1)</span>
                                <span class="fw-semibold text-dark">Sam : 10h00 - 17h00 (GMT+1)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Interactive FAQ Section -->
    <section class="py-5" style="background: #ffffff;">
        <div class="container py-4 text-start">
            
            <div class="mb-5 text-center mx-auto" style="max-width: 720px;">
                <span class="text-uppercase tracking-wider fw-bold font-monospace d-block mb-1" style="color: #0284c7; font-size: 12px;">QUESTIONS FRÉQUENTES</span>
                <h2 class="f-nasalization h2 fw-bold mb-3" style="color: #0f172a;">Ce que nos Clients nous Demandent Souvent</h2>
                <p class="mb-0" style="color: #334155; line-height: 1.7;">
                    Retrouvez les réponses aux interrogations régulières avant de démarrer un projet avec BYT3LAB.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="faq-card h-100">
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">⚡ Sous quel délai pouvons-nous démarrer un projet ?</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Après un premier cadrage technique de 48h, nous rédigeons la note de cadrage et les spécifications d'architecture. Selon l'envergure, le premier sprint démarre généralement sous 5 à 10 jours ouvrés.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="faq-card h-100">
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">🖥️ Peut-on planifier une démonstration de Melodi ERP ou SUKU ?</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Absolument. Nos ingénieurs organisent des démonstrations interactives en visioconférence ou directement dans vos locaux avec un jeu de données représentatif de votre activité.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="faq-card h-100">
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">🔒 Comment garantissez-vous la souveraineté de nos données ?</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Tous nos progiciels peuvent être installés sur vos propres serveurs physiques (on-premise) ou sur des clusters cloud privés et isolés, sans aucune dépendance vis-à-vis d'éditeurs tiers extérieurs.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="faq-card h-100">
                        <h3 class="h6 fw-bold mb-2 font-monospace" style="color: #0f172a;">🌍 Intervenez-vous auprès d'entreprises hors du Cameroun ?</h3>
                        <p class="small mb-0" style="color: #334155; line-height: 1.6;">
                            Oui. Nous accompagnons des organisations en zone CEMAC, UEMOA ainsi qu'à l'international grâce à nos méthodes de travail agiles, nos revues en continu et nos infrastructures sécurisées à distance.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- BYT3LAB-CONTENT-END -->
</div>

<?php
// Print JS at bottom of component so DOM elements are available immediately
if (file_exists($__byt3lab_js_path) && !in_array($__byt3lab_js_uri, $GLOBALS['byt3lab_assets_printed']['js'])) {
    echo '<script src="' . esc_url($__byt3lab_js_uri) . '"></script>' . "\n";
    $GLOBALS['byt3lab_assets_printed']['js'][] = $__byt3lab_js_uri;
}
?>
