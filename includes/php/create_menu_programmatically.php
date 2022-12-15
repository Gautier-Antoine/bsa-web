<?php

add_action('after_setup_theme', 'auto_menu_navigation_creation');
/**
 * Register menu elements and create the menus
 *
 * @return void
 */
function auto_menu_navigation_creation()
{
    $header = array(
        array(
            'title' => 'Qui sommes-nous?',
            'url' => '#',
            'key' => 'qui-sommes-nous'
        ),
        array(
            'title' => 'Carrières',
            'url' => '#',
            'key' => 'carrieres'
        ),
        // ? ADD SUB ELEMENTS
            array(
                'title' => 'Lorem',
                'url' => '#',
                'parent' => 'carrieres',
                'key' => 'lorem'
            ),
            array(
                'title' => 'Ipsum',
                'url' => '#',
                'parent' => 'carrieres',
                'key' => 'ipsum'
            ),
        array(
            'title' => 'Actualités',
            'url' => '#',
            'key' => 'actualites'
        ),
        array(
            'title' => 'Presse',
            'url' => '#',
            'key' => 'presse'
        ),
        array(
            'title' => 'Contact',
            'url' => '#',
            'key' => 'contact'
        )
    );
    $footer = array(
        array(
            'title' => 'Qui sommes-nous?',
            'url' => '#',
            'key' => 'qui-sommes-nous'
        ),
        array(
            'title' => 'Carrières',
            'url' => '#',
            'key' => 'carrieres'
        ),
        array(
            'title' => 'Actualités',
            'url' => '#',
            'key' => 'actualites'
        ),
        array(
            'title' => 'Plan du site',
            'url' => '#',
            'key' => 'plan-du-site'
        ),
        array(
            'title' => 'Mentions Légales',
            'url' => '#',
            'key' => 'mentions-legales'
        )
    );
    $social = array(
        array(
            'title' => 'Presse',
            'url' => '#',
            'key' => 'presse'
        ),
        array(
            'title' => 'Contact',
            'url' => '#',
            'key' => 'contact'
        )
    );

    create_menu_auto('Header', $header, 'header');
    create_menu_auto('Le groupe', $footer, 'le-groupe');
    create_menu_auto('Lorem Ipsum', $social, 'lorem');
}
/**
 * Create menu programmatically
 *
 * @param String $name
 * @param Array $list
 * @param String $location
 * @return void
 */
function create_menu_auto($name, $list, $location)
{
    $menu_exists = wp_get_nav_menu_object($name);
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($name);
        $menu = get_term_by('name', $name, 'nav_menu');
        $new_menu_obj = array();
        foreach ($list as $element) {
            $new_menu_obj[$element['key']] = array();
            if ( array_key_exists( 'parent', $element ) )
                $new_menu_obj[$element['key']]['parent'] = $element['parent'];

            $new_menu_obj[$element['key']]['id'] = wp_update_nav_menu_item(
                $menu->term_id,
                0,
                array(
                    'menu-item-title' =>  __($element['title']),
                    'menu-item-url' => $element['url'],
                    'menu-item-type' => 'custom',
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $new_menu_obj[$element['parent']]['id']
                )
            );
        }
    }
    $locations = get_theme_mod('nav_menu_locations');
    $locations[$location] = get_term_by('name', $name, 'nav_menu')->term_id;
    set_theme_mod('nav_menu_locations', $locations);
}