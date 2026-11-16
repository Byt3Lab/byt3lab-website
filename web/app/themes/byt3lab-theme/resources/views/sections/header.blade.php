<nav class="c-navbar">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="c-navbar__logo">
            <a href="{{ $homeUrl }}" class="a-link a-link--logo c-navbar__logo-link">
                {{ $siteName }}
            </a>
        </div>

        <button class="a-button a-button--burger c-navbar__burger" aria-label="Toggle navigation">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        {!! $primaryMenu !!}

        <div class="c-navbar__actions">
            <a href="{{ $ctaUrl }}" class="a-button a-button--primary c-navbar__btn">{{ $ctaText }}</a>
        </div>

    </div>
</nav>
