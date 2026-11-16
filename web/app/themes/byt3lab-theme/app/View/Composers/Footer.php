<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    protected static $views = ['sections.footer'];

    public function with()
    {
        return [
            'siteName'      => get_bloginfo('name'),
            'homeUrl'       => home_url('/'),
            'servicesLinks' => $this->getMenuItems('footer'),
            'currentYear'   => date('Y'),
        ];
    }

    private function getMenuItems(string $location): array
    {
        $locations = get_nav_menu_locations();
        if (empty($locations[$location])) {
            return [];
        }

        $items = wp_get_nav_menu_items($locations[$location]) ?: [];

        // On garde uniquement le premier niveau (liens directs)
        return array_values(array_filter($items, fn($item) => (int) $item->menu_item_parent === 0));
    }
}
