<?php

// Déclaration du Header et du Footer
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );
function planty_register_assets() {
    
    // Déclarer jQuery
    wp_enqueue_script('jquery' );
    
    // Déclarer le JS
	wp_enqueue_script( 
        'planty', 
        get_template_directory_uri() . '/assets/js/script.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );
    
    // Chargement de la feuille du style du theme parent
 	wp_enqueue_style( 'planty-theme', get_template_directory_uri() . '/style.css' );

     // Chargement de la feuille de style complémentaire du thème enfant
      wp_enqueue_style( 'planty-child-theme', get_stylesheet_directory_uri() . '/assets/css/main.css' );

       // Chargement de la feuille de style complémentaire du thème enfant
       wp_enqueue_style( 'planty-child-theme', get_stylesheet_directory_uri() . '/assets/css/rencontrer.css' );
}
add_action( 'wp_enqueue_scripts', 'planty_register_assets' );


// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Désactivation de Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' ); 