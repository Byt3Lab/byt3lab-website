<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class NavWalker extends Walker_Nav_Menu
{
    /**
     * Ouvre un niveau (ul)
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $classes = $depth === 0
            ? 'c-navbar__dropdown'
            : 'c-navbar__dropdown c-navbar__dropdown--sub';

        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    /**
     * Ouvre un item (li)
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = $depth ? str_repeat("\t", $depth) : '';

        // Classes du li
        $classes = ['c-navbar__item'];
        if ($depth > 0) {
            $classes = ['c-navbar__dropdown-item'];
        }

        $has_children = in_array('menu-item-has-children', $item->classes ?? [], true);
        if ($has_children && $depth === 0) {
            $classes[] = 'c-navbar__item--has-dropdown';
        }
        if ($has_children && $depth > 0) {
            $classes[] = 'c-navbar__dropdown-item--has-dropdown';
        }

        // Détection item actif (page courante)
        $is_current = in_array('current-menu-item', $item->classes ?? [], true)
            || in_array('current_page_item', $item->classes ?? [], true);

        // Classes du lien
        $link_classes = $depth === 0 ? 'a-link c-navbar__link' : 'a-link c-navbar__dropdown-link';
        if ($is_current) {
            $link_classes .= ' is-active';
        }

        $output .= $indent . '<li class="' . esc_attr(implode(' ', $classes)) . '">';

        $atts = [
            'href'   => $item->url ?: '#',
            'class'  => $link_classes,
            'title'  => $item->attr_title ?: '',
            'target' => $item->target ?: '',
            'rel'    => $item->xfn ?: '',
        ];

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a' . $attributes . '>' . esc_html($title) . '</a>';
    }
}
