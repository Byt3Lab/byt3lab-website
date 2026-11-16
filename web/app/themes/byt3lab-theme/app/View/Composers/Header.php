<?php

namespace App\View\Composers;

use App\Walkers\NavWalker;
use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = ['sections.header'];

    public function with()
    {
        return [
            'siteName'    => get_bloginfo('name'),
            'homeUrl'     => home_url('/'),
            'primaryMenu' => $this->renderMenu('primary'),
            'ctaText'     => 'Contact',
            'ctaUrl'      => home_url('/contact'),
        ];
    }

    private function renderMenu(string $location): string
    {
        if (!has_nav_menu($location)) {
            return '';
        }

        return wp_nav_menu([
            'theme_location' => $location,
            'echo'           => false,
            'container'      => false,
            'menu_class'     => 'c-navbar__menu',
            'fallback_cb'    => false,
            'walker'         => new NavWalker(),
        ]) ?: '';
    }
}
