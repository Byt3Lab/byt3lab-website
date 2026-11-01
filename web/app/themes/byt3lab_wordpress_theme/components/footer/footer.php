<?php
// BYT3LAB Builder - auto-include component assets for footer
if (!isset($GLOBALS['byt3lab_assets_printed'])) {
    $GLOBALS['byt3lab_assets_printed'] = ['css' => [], 'js' => []];
}
$__byt3lab_comp_slug = 'footer';
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

<div class="component-footer">
    <!-- BYT3LAB-CONTENT-START -->
    <footer class="c-footer">
        <div class="container">
            
            <div class="c-footer__main row text-start">
                <div class="c-footer__col col-lg-5 col-md-6 col-sm-12 mb-4 mb-lg-0">
                    <div class="c-footer__logo d-flex align-items-center gap-2 mb-3">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/media/byt3lab_sng.png'); ?>" alt="Byt3lab" style="height: 40px; width: auto;" />
                        <span class="c-footer__logo-text f-nasalization " style="font-weight:bold; font-size:24px;">Byt3lab</span>
                    </div>
                    <div>
                        <small class="font-monospace" style="color: #94a3b8;">Software Engineering &amp; Communication Agency</small>
                    </div>
                    <p class="c-footer__text">
                        Notre mission : développer des produits technologiques simples, intuitifs et sécurisés pour accompagner les entreprises et les institutions dans leur croissance.
                    </p>
                </div>

                <div class="c-footer__col col-lg-3 col-md-3 col-sm-6 mb-4 mb-lg-0">
                    <h3 class="c-footer__title">Actions Rapides</h3>
                    <ul class="m-footer-links p-0 m-0">
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="m-footer-links__link">Qui nous sommes</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/equipe/')); ?>" class="m-footer-links__link">Notre Équipe</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="m-footer-links__link">Nos Solutions</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/services/')); ?>" class="m-footer-links__link">Nos Services</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/realisations/')); ?>" class="m-footer-links__link">Nos Réalisations</a></li>
                        <li class="m-footer-links__item"><a href="https://www.facebook.com/profile.php?id=61571483432231" target="_blank" rel="noopener" class="m-footer-links__link" style="color: #c084fc;">🎨 Ngrafix (Design &amp; Communication)</a></li>
                        <li class="m-footer-links__item"><a href="https://melodi.byt3lab.com" target="_blank" rel="noopener" class="m-footer-links__link">Melodi (ERP modulaire et scalable)</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/carriere/')); ?>" class="m-footer-links__link" style="color: #38bdf8;">💼 Carrières &amp; Recrutement</a></li>
                        <li class="m-footer-links__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="m-footer-links__link">Nous Contacter</a></li>
                    </ul>
                </div>

                <div class="c-footer__col col-lg-4 col-md-3 col-sm-6 mb-4 mb-lg-0">
                    <h3 class="c-footer__title">Contact Info</h3>
                    <ul class="m-footer-contact p-0 m-0">
                        <li class="m-footer-contact__item mb-2">
                            <span class="m-footer-contact__label d-block">Siège social :</span>
                            <span class="m-footer-contact__text">Douala / Yaoundé, Cameroun</span>
                        </li>
                        <li class="m-footer-contact__item mb-2">
                            <span class="m-footer-contact__label d-block">Téléphone / WhatsApp :</span>
                            <a href="tel:+237696879475" class="m-footer-contact__link">+237 696 879 475</a><br>
                            <a href="https://wa.me/237652354837" class="m-footer-contact__link" target="_blank" rel="noopener">+237 652 354 837</a>
                        </li>
                        <li class="m-footer-contact__item">
                            <span class="m-footer-contact__label d-block">Email :</span>
                            <a href="mailto:contact@byt3lab.com" class="m-footer-contact__link">contact@byt3lab.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="c-footer__secondary row align-items-center py-4 text-start">
                <div class="m-social-block col-md-6 col-sm-12 mb-4 mb-md-0">
                    <h4 class="m-social-block__title mb-2">Suivez-nous</h4>
                    <div class="m-social-block__list d-flex gap-2">
                        <a href="https://facebook.com/byt3lab" class="a-social-link" aria-label="Facebook BYT3LAB" title="Facebook BYT3LAB" target="_blank" rel="noopener">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="https://www.facebook.com/profile.php?id=61571483432231" class="a-social-link" aria-label="Facebook Ngrafix Studio" title="Facebook NGRAFIX (Design &amp; Communication)" target="_blank" rel="noopener" style="border-color: rgba(147, 51, 234, 0.4); color: #c084fc;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <a href="https://linkedin.com/company/byt3lab" class="a-social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                        <a href="https://youtube.com/@byt3lab" class="a-social-link" aria-label="YouTube" target="_blank" rel="noopener">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                        </a>
                    </div>
                </div>

                <div class="c-footer__newsletter col-md-6 col-sm-12">
                    <h3 class="c-footer__title mb-2">Rejoignez notre communauté</h3>
                    <p class="c-footer__newsletter-desc mb-3">Suivez l'actualité de la révolution technologique africaine en direct sur notre chaîne WhatsApp.</p>
                    <a href="https://wa.me/237696879475" target="_blank" rel="noopener noreferrer" class="btn btn-success py-3 px-4 fw-bold d-inline-flex align-items-center gap-2" style="background-color: #25D366; border: none; border-radius: 8px; color: #ffffff;">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.51 1.036 3.531l-.679 2.48 2.538-.665c.983.536 2.109.843 3.303.844 3.18 0 5.767-2.587 5.768-5.766.001-3.18-2.585-5.767-5.766-5.766zm3.385 8.163c-.144.405-.837.774-1.17.822-.303.044-.7.062-2.12-.524-1.815-.749-2.981-2.597-3.072-2.717-.089-.12-.74-1.026-.74-1.956 0-.93.486-1.385.66-1.577.174-.192.38-.24.506-.24.126 0 .252.002.361.007.115.006.27-.044.422.321.157.377.536 1.309.584 1.405.048.096.08.21.016.337-.064.127-.096.206-.192.321-.096.115-.202.257-.289.345-.096.096-.197.201-.084.394.113.193.502.827 1.077 1.339.739.658 1.362.862 1.555.958.193.096.307.08.422-.048.115-.128.495-.577.627-.775.132-.198.264-.165.441-.099.177.066 1.13.533 1.323.63.193.096.321.144.368.225.048.081.048.468-.096.873z"/></svg>
                        S'abonner à notre Chaîne WhatsApp
                    </a>
                </div>
            </div>
            
            <div class="c-footer__bar d-flex flex-column flex-sm-row justify-content-between align-items-center py-3">
                <p class="c-footer__copyright mb-2 mb-sm-0">
                    <span class="c-footer__brand-highlight">Byt3lab</span> &copy; 2026 Tous droits réservés.
                </p>
                <div class="c-footer__legal-links d-flex gap-3">
                    <a href="#" class="c-footer__legal-link">Conditions d'utilisation</a>
                    <a href="#" class="c-footer__legal-link">Politique de confidentialité</a>
                </div>
            </div>

        </div>
    </footer>
    <!-- BYT3LAB-CONTENT-END -->
</div>