<?php

// Déclarer le JS

// Déclaration du Header et du Footer
function register_my_menu()
{
    register_nav_menus(array(
        'main' => 'Menu Principal',
        'footer' => 'Bas de page',
    ));
}
add_action('after_setup_theme', 'register_my_menu');
function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
{

    $menu_item = $data_object;
    $atts['aria-current'] = $menu_item->current ? 'page' : '';
    $atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);
}

function planty_admin_lien_nav($items, $args)
{
    // Vérifiez si l'emplacement du menu correspond à celui du pied de page
    if ($args->theme_location === 'footer') {
        return $items; // Ne faites rien, renvoyez simplement les éléments du menu tels qu'ils sont
    }

    if (is_user_logged_in() && current_user_can('administrator')) {
        $admin_url = esc_url(get_admin_url());
        $items .= '<li class="LienAdmin"><a href="' . $admin_url . '">Admin</a></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'planty_admin_lien_nav', 10, 2);

function planty_register_assets()
{
    wp_enqueue_script(
        'planty',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery'),
        '1.0',
        true
    );

    // Chargement de la feuille du style du theme parent
    wp_enqueue_style('planty-theme', get_template_directory_uri() . '/style.css');

    // Chargement de la feuille de style complémentaire du thème enfant
    wp_enqueue_style('planty-child-theme', get_stylesheet_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'planty_register_assets');


// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Définir d'autres tailles d'images
add_image_size('img_gout_fruits', 295, 196);
add_image_size('img_gout_fruits', 196, 131);

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

// Désactivation de Gutenberg
add_filter('use_block_editor_for_post', '__return_false');

add_filter('wpcf7_autop_or_not', '__return_false');
