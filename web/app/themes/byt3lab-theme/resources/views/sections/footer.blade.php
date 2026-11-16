<footer class="c-footer">
    <div class="container">

        <div class="c-footer__main row text-start">
            <div class="c-footer__col col-lg-5 col-md-6 col-sm-12 mb-4 mb-lg-0">
                <div class="c-footer__logo d-flex align-items-center mb-3">
                    <span class="c-footer__logo-text">{{ $siteName }}</span>
                </div>
                <p class="c-footer__text">
                    Nous sommes une jeune entreprise ambitieuse dont le but est de révolutionner l'Afrique en créant des richesses propres au continent grâce à l'informatique et à la technologie.
                </p>
                <p class="c-footer__text">
                    Notre mission est claire : propulser et hisser l'Afrique au rang de première puissance technologique mondiale à travers des solutions locales innovantes.
                </p>
            </div>

            <div class="c-footer__col col-lg-3 col-md-3 col-sm-6 mb-4 mb-lg-0">
                <h3 class="c-footer__title">Nos Services</h3>
                <ul class="m-footer-links p-0 m-0">
                    @foreach($servicesLinks as $link)
                        <li class="m-footer-links__item">
                            <a href="{{ $link->url }}" class="m-footer-links__link">{{ $link->title }}</a>
                        </li>
                    @endforeach
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
                        <span class="m-footer-contact__label d-block">WhatsApp :</span>
                        <a href="https://wa.me/237655000000" class="m-footer-contact__link" target="_blank" rel="noopener">
                            +237 6xx xx xx xx
                        </a>
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
                    <a href="#" class="a-social-link" aria-label="Facebook">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="#" class="a-social-link" aria-label="Twitter">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                    <a href="#" class="a-social-link" aria-label="LinkedIn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                </div>
            </div>

            <div class="c-footer__newsletter col-md-6 col-sm-12">
                <h3 class="c-footer__title mb-2">Newsletter</h3>
                <p class="c-footer__newsletter-desc mb-2">
                    Abonnez-vous pour suivre l'évolution de la révolution technologique africaine.
                </p>
                <form class="m-newsletter-form" action="#" method="POST">
                    <div class="m-newsletter-form__group d-flex align-items-center">
                        <input type="email" class="m-newsletter-form__input flex-grow-1" placeholder="Votre adresse email" required aria-label="Email Address">
                        <button type="submit" class="a-button m-newsletter-form__btn">S'abonner</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="c-footer__bar d-flex flex-column flex-sm-row justify-content-between align-items-center py-3">
            <p class="c-footer__copyright mb-2 mb-sm-0">
                <span class="c-footer__brand-highlight">{{ $siteName }}</span> &copy; {{ $currentYear }} Tous droits réservés.
            </p>
            <div class="c-footer__legal-links d-flex gap-3">
                <a href="#" class="c-footer__legal-link">Conditions d'utilisation</a>
                <a href="#" class="c-footer__legal-link">Politique de confidentialité</a>
            </div>
        </div>

    </div>
</footer>
