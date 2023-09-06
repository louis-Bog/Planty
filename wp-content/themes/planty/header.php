<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


  <header class="header">
    <a href="<?php echo home_url('/'); ?>">
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo">
    </a>
    <nav role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">
      <button type="button" aria-expanded="false" aria-controls="primary-menu" class="menu-toggle">
        <img class="menu_burger" src="<?php echo get_template_directory_uri(); ?>/assets/img/menu_burger.png" alt="Logo">
        <?php esc_html_e('', 'text-domain'); ?>
      </button>
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'main',
          'container' => 'ul', // afin d'éviter d'avoir une div autour 
          'menu_class' => 'site__header__menu', // ma classe personnalisée 

        )
      );
      ?>
  </header>

  <?php wp_body_open(); ?>