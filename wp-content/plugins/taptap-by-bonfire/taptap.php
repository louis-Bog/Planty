<?php
/*
Plugin Name: TapTap, by Bonfire 
Plugin URI: https://bonfirethemes.com/
Description: Super customizable  menu for WordPress. Customize under Appearance → Customize → TapTap Plugin.
Version: 5.6
Author: Bonfire Themes
Author URI: https://bonfirethemes.com/
Text Domain: taptap
Domain Path: /languages
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
	function taptap_theme_customizer( $wp_customize ) {
	
        //
        // ADD "TapTap Plugin" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('taptap_panel', array('title' => esc_html__('TapTap Plugin', 'taptap'),'priority' => 10,));


        //
        // ADD "Menu Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_menu_button_section',array('title' => esc_html__( 'Menu Button', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide menu button */
        $wp_customize->add_setting('taptap_hide_menu_button',array('sanitize_callback' => 'sanitize_taptap_hide_menu_button',));
        function sanitize_taptap_hide_menu_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_menu_button',array('type' => 'checkbox','label' => esc_html__('Hide menu button','taptap'),'description' => esc_html__('Menu label will remain visible (if one is entered below). If hiding for the purpose of using a custom activation element, give the element the "taptap-custom-activator" class).','taptap'), 'section' => 'taptap_menu_button_section',));
        
        /* open menu on hover */
        $wp_customize->add_setting('taptap_open_menu_on_hover',array('sanitize_callback' => 'sanitize_taptap_open_menu_on_hover',));
        function sanitize_taptap_open_menu_on_hover( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_open_menu_on_hover',array('type' => 'checkbox','label' => esc_html__('Open on hover','taptap'),'description' => esc_html__('Menu will be opened when mouse is moved over menu button. On touch devices, menu will still open by tap.','taptap'), 'section' => 'taptap_menu_button_section',));
        
        /* menu button style */
        $wp_customize->add_setting('taptap_menu_button_style',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_button_style',array(
            'type' => 'select',
            'label' => esc_html__('Button style','taptap'),
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'style1' => 'Style #1',
                'style2' => 'Style #2',
                'style3' => 'Style #3',
                'style4' => 'Style #4',
                'style5' => 'Style #5',
                'style6' => 'Style #6',
        ),
        ));
        
        /* menu button skinny */
        $wp_customize->add_setting('taptap_menu_button_skinny',array('sanitize_callback' => 'sanitize_taptap_menu_button_skinny',));
        function sanitize_taptap_menu_button_skinny( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_button_skinny',array('type' => 'checkbox','label' => esc_html__('Show thin menu button variations','taptap'), 'section' => 'taptap_menu_button_section',));

        /* menu button animation */
        $wp_customize->add_setting('taptap_menu_button_animation',array(
            'default' => 'none',
        ));
        $wp_customize->add_control('taptap_menu_button_animation',array(
            'type' => 'select',
            'label' => esc_html__('Menu button animation','taptap'),
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'none' => 'No animation',
                'xsign' => 'X sign',
                'minussign' => 'Minus sign',
        ),
        ));
        
        /* menu button animation speed */
        $wp_customize->add_setting('taptap_menu_button_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_animation_speed',));
        function sanitize_taptap_menu_button_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_animation_speed',array('type' => 'text','label' => esc_html__('Animation speed (in seconds)','taptap'),'description' => esc_html__('Also applies to logo and search elements (for unified hover speed appearance). Example: 0.5. If empty, defaults to 0.25','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button opacity */
        $wp_customize->add_setting('taptap_menu_button_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_opacity',));
        function sanitize_taptap_menu_button_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_opacity',array('type' => 'text','label' => esc_html__('Opacity','taptap'),'description' => esc_html__('Example: 0.5. If empty, defaults to 1','taptap'),'section' => 'taptap_menu_button_section',));

        /* menu button color */
        $wp_customize->add_setting( 'taptap_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_color',array(
            'label' => esc_html__('Menu Button','taptap'), 'settings' => 'taptap_menu_button_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'taptap_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_hover_color',array(
            'label' => esc_html__('Menu Button Hover','taptap'), 'settings' => 'taptap_menu_button_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button color (active) */
        $wp_customize->add_setting( 'taptap_menu_button_active_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_active_color',array(
            'label' => esc_html__('Menu Button (active)','taptap'), 'settings' => 'taptap_menu_button_active_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button hover color (active) */
        $wp_customize->add_setting( 'taptap_menu_button_active_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_active_hover_color',array(
            'label' => esc_html__('Menu Button Hover (active)','taptap'), 'settings' => 'taptap_menu_button_active_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button position */
        $wp_customize->add_setting('taptap_menu_button_position',array(
            'default' => 'left',
        ));
        $wp_customize->add_control('taptap_menu_button_position',array(
            'type' => 'select',
            'label' => esc_html__('Menu button position','taptap'),
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
        ),
        ));
        
        /* menu button top distance */
        $wp_customize->add_setting('taptap_menu_button_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_top_distance',));
        function sanitize_taptap_menu_button_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_top_distance',array('type' => 'text','label' => esc_html__('Top distance (in pixels)','taptap'),'description' => esc_html__('Example: 25. If empty, defaults to 10','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button left/right distance */
        $wp_customize->add_setting('taptap_menu_button_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_side_distance',));
        function sanitize_taptap_menu_button_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_side_distance',array('type' => 'text','label' => esc_html__('Left/right distance (in pixels)','taptap'),'description' => esc_html__('Example: 35. If empty, defaults to 15','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button label */
        $wp_customize->add_setting('taptap_menu_button_label',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label',));
        function sanitize_taptap_menu_button_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label',array('type' => 'text','label' => esc_html__('Label','taptap'),'description' => esc_html__('If empty, no label will be shown','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* secondary menu button label */
        $wp_customize->add_setting('taptap_secondary_menu_button_label',array('default' => '','sanitize_callback' => 'sanitize_taptap_secondary_menu_button_label',));
        function sanitize_taptap_secondary_menu_button_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_secondary_menu_button_label',array('type' => 'text','label' => esc_html__('Secondary label','taptap'),'description' => esc_html__('Secondary label is displayed when menu is opened.','taptap'),'section' => 'taptap_menu_button_section',));

        /* menu button label hide when menu open */
        $wp_customize->add_setting('taptap_menu_button_hide',array('sanitize_callback' => 'sanitize_taptap_menu_button_hide',));
        function sanitize_taptap_menu_button_hide( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_button_hide',array('type' => 'checkbox','label' => esc_html__('Hide label when menu opened','taptap'), 'section' => 'taptap_menu_button_section',));
        
        /* menu button label horizontal position */
        $wp_customize->add_setting('taptap_menu_button_label_horizontal_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_horizontal_position',));
        function sanitize_taptap_menu_button_label_horizontal_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_horizontal_position',array('type' => 'text','label' => esc_html__('Label horizontal position (in pixels)','taptap'),'description' => esc_html__('Label position is relative to the menu button. Negative values accepted. If empty, defaults to 40 (if empty when menu button is hidden, defaults to 0)','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button label vertical position */
        $wp_customize->add_setting('taptap_menu_button_label_vertical_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_vertical_position',));
        function sanitize_taptap_menu_button_label_vertical_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_vertical_position',array('type' => 'text','label' => esc_html__('Label vertical position (in pixels)','taptap'),'description' => esc_html__('Label position is relative to the menu button. Negative values accepted. If empty, defaults to 6 (if empty when menu button is hidden, defaults to 0)','taptap'),'section' => 'taptap_menu_button_section',));

        /* menu button label color */
        $wp_customize->add_setting( 'taptap_menu_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_label_color',array(
            'label' => esc_html__('Label','taptap'), 'settings' => 'taptap_menu_button_label_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button label hover color */
        $wp_customize->add_setting( 'taptap_menu_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_button_label_hover_color',array(
            'label' => esc_html__('Label Hover','taptap'), 'settings' => 'taptap_menu_button_label_hover_color', 'section' => 'taptap_menu_button_section' )
        ));
        
        /* menu button label font size */
        $wp_customize->add_setting('taptap_menu_button_label_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_font_size',));
        function sanitize_taptap_menu_button_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_font_size',array('type' => 'text','label' => esc_html__('Label font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button label letter spacing */
        $wp_customize->add_setting('taptap_menu_button_label_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_letter_spacing',));
        function sanitize_taptap_menu_button_label_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_letter_spacing',array('type' => 'text','label' => esc_html__('Label letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_button_section',));
        
        /* menu button label font */
        $wp_customize->add_setting('taptap_menu_button_label_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_button_label_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_menu_button_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* menu button label theme font */
        $wp_customize->add_setting('taptap_menu_button_label_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_button_label_theme_font',));
        function sanitize_taptap_menu_button_label_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_button_label_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_menu_button_section',));


        //
        // ADD "Logo" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_logo_section',array('title' => esc_html__( 'Logo', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide logo */
        $wp_customize->add_setting('taptap_hide_logo',array('sanitize_callback' => 'sanitize_taptap_hide_logo',));
        function sanitize_taptap_hide_logo( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_logo',array('type' => 'checkbox','label' => esc_html__('Hide logo','taptap'),'description' => esc_html__('If selected, logo will not be displayed.','taptap'), 'section' => 'taptap_logo_section',));

        /* logo position */
        $wp_customize->add_setting('taptap_logo_position',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_logo_position',array(
            'type' => 'select',
            'label' => esc_html__('Logo position','taptap'),
            'section' => 'taptap_logo_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* logo top distance */
        $wp_customize->add_setting('taptap_logo_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_top_distance',));
        function sanitize_taptap_logo_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_top_distance',array('type' => 'text','label' => esc_html__('Top distance (in pixels)','taptap'),'description' => esc_html__('Example: 35. If empty, defaults to 23','taptap'),'section' => 'taptap_logo_section',));
        
        /* logo left/right distance */
        $wp_customize->add_setting('taptap_logo_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_side_distance',));
        function sanitize_taptap_logo_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_side_distance',array('type' => 'text','label' => esc_html__('Left/right distance (in pixels)','taptap'),'description' => esc_html__('Example: 35. If empty, defaults to 15','taptap'),'section' => 'taptap_logo_section',));

        /* logo image */
        $wp_customize->add_setting('taptap_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_logo_image',
            array(
                'label' => esc_html__('Upload logo image','taptap'),
                'description' => wp_kses( __('<strong>How to add retina logo:</strong> Enable retina script in Misc section, then upload both the regular and retina logo files and make sure they are named correctly. If retina logo is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-logo.png and my-logo@2x.png (note that the retina logo must have "@2x" at the end. @3x images work as well.).<br><br>','taptap'), $allowed_html_array ),
                'settings' => 'taptap_logo_image',
                'section' => 'taptap_logo_section',
        )
        ));

        /* secondary logo image */
        $wp_customize->add_setting('taptap_secondary_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_secondary_logo_image',
            array(
                'label' => esc_html__('Upload secondary logo image','taptap'),
                'description' => esc_html__('This image will replace the original logo image when the menu is opened. Useful if you would like to switch to a logo with a different color scheme when the menu is open.','taptap'),
                'settings' => 'taptap_secondary_logo_image',
                'section' => 'taptap_logo_section',
        )
        ));

        /* logo max height */
        $wp_customize->add_setting('taptap_logo_max_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_max_height',));
        function sanitize_taptap_logo_max_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_max_height',array('type' => 'text','label' => esc_html__('Maximum logo image height (in pixels)','taptap'),'description' => esc_html__('Maximum height of logo image. If empty, defaults to 35','taptap'),'section' => 'taptap_logo_section',));
        
        /* logo color */
        $wp_customize->add_setting( 'taptap_logo_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_logo_color',array(
            'label' => esc_html__('Logo','taptap'), 'settings' => 'taptap_logo_color', 'section' => 'taptap_logo_section' )
        ));
        
        /* logo hover color */
        $wp_customize->add_setting( 'taptap_logo_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_logo_hover_color',array(
            'label' => esc_html__('Logo Hover','taptap'), 'settings' => 'taptap_logo_hover_color', 'section' => 'taptap_logo_section' )
        ));
        
        /* logo font size */
        $wp_customize->add_setting('taptap_logo_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_font_size',));
        function sanitize_taptap_logo_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 14','taptap'),'section' => 'taptap_logo_section',));
        
        /* logo letter spacing */
        $wp_customize->add_setting('taptap_logo_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_letter_spacing',));
        function sanitize_taptap_logo_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_letter_spacing',array('type' => 'text','label' => esc_html__('Letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_logo_section',));
        
        /* logo font */
        $wp_customize->add_setting('taptap_logo_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_logo_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_logo_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* logo theme font */
        $wp_customize->add_setting('taptap_logo_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_logo_theme_font',));
        function sanitize_taptap_logo_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_logo_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_logo_section',));
        

        //
        // ADD "WooCommerce Shopping Cart Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_woo_cart_section',array('title' => esc_html__( 'WooCommerce Shopping Cart Button', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* show woocommerce shopping cart button */
        $wp_customize->add_setting('taptap_show_woo_button',array('sanitize_callback' => 'sanitize_taptap_show_woo_button',));
        function sanitize_taptap_show_woo_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_woo_button',array('type' => 'checkbox','label' => esc_html__('Display shopping cart button','taptap'),'description' => esc_html__('When enabled, icon will be shown when WooCommerce also activated.','taptap'), 'section' => 'taptap_woo_cart_section',));

        /* woo icon select */
        $wp_customize->add_setting('taptap_woo_icon_select',array(
            'default' => 'cart',
        ));
        $wp_customize->add_control('taptap_woo_icon_select',array(
            'type' => 'select',
            'label' => esc_html__('Icon','taptap'),
            'section' => 'taptap_woo_cart_section',
            'choices' => array(
                'cart' => 'Cart',
                'bag' => 'Bag',
        ),
        ));

        /* woo icon color */
        $wp_customize->add_setting( 'taptap_woo_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_woo_icon_color',array(
            'label' => esc_html__('Icon color','taptap'), 'settings' => 'taptap_woo_icon_color', 'section' => 'taptap_woo_cart_section' )
        ));

        /* woo icon hover color */
        $wp_customize->add_setting( 'taptap_woo_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_woo_icon_hover_color',array(
            'label' => esc_html__('Icon color (hover)','taptap'), 'settings' => 'taptap_woo_icon_hover_color', 'section' => 'taptap_woo_cart_section' )
        ));

        /* woo item count color */
        $wp_customize->add_setting( 'taptap_woo_item_count_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_woo_item_count_color',array(
            'label' => esc_html__('Item count color','taptap'), 'settings' => 'taptap_woo_item_count_color', 'section' => 'taptap_woo_cart_section' )
        ));

        /* woo item count background color */
        $wp_customize->add_setting( 'taptap_woo_item_count_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_woo_item_count_background_color',array(
            'label' => esc_html__('Item count background color','taptap'), 'settings' => 'taptap_woo_item_count_background_color', 'section' => 'taptap_woo_cart_section' )
        ));

        /* woo button position */
        $wp_customize->add_setting('taptap_woo_button_position',array(
            'default' => 'right',
        ));
        $wp_customize->add_control('taptap_woo_button_position',array(
            'type' => 'select',
            'label' => esc_html__('Woo button position','taptap'),
            'section' => 'taptap_woo_cart_section',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
        ),
        ));
        
        /* woo button top distance */
        $wp_customize->add_setting('taptap_woo_button_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_woo_button_top_distance',));
        function sanitize_taptap_woo_button_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_woo_button_top_distance',array('type' => 'text','label' => esc_html__('Top distance (in pixels)','taptap'),'description' => esc_html__('Example: 25','taptap'),'section' => 'taptap_woo_cart_section',));
        
        /* woo button left/right distance */
        $wp_customize->add_setting('taptap_woo_button_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_woo_button_side_distance',));
        function sanitize_taptap_woo_button_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_woo_button_side_distance',array('type' => 'text','label' => esc_html__('Left/right distance (in pixels)','taptap'),'description' => esc_html__('Example: 35','taptap'),'section' => 'taptap_woo_cart_section',));


        //
        // ADD "Search Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_search_section',array('title' => esc_html__( 'Search Button', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* hide search */
        $wp_customize->add_setting('taptap_hide_search_button',array('sanitize_callback' => 'sanitize_taptap_hide_search_button',));
        function sanitize_taptap_hide_search_button( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_hide_search_button',array('type' => 'checkbox','label' => esc_html__('Hide search','taptap'),'description' => esc_html__('Search label will remain visible (if one is entered below).','taptap'), 'section' => 'taptap_search_section',));
        
        /* search button skinny */
        $wp_customize->add_setting('taptap_search_button_skinny',array('sanitize_callback' => 'sanitize_taptap_search_button_skinny',));
        function sanitize_taptap_search_button_skinny( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_button_skinny',array('type' => 'checkbox','label' => esc_html__('Show thin search button variation','taptap'), 'section' => 'taptap_search_section',));
        
        /* search button flip */
        $wp_customize->add_setting('taptap_search_button_flip',array('sanitize_callback' => 'sanitize_taptap_search_button_flip',));
        function sanitize_taptap_search_button_flip( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_button_flip',array('type' => 'checkbox','label' => esc_html__('Flip search button','taptap'), 'section' => 'taptap_search_section',));

        /* search button color */
        $wp_customize->add_setting( 'taptap_search_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_color',array(
            'label' => esc_html__('Search Button','taptap'), 'settings' => 'taptap_search_button_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button hover color */
        $wp_customize->add_setting( 'taptap_search_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_hover_color',array(
            'label' => esc_html__('Search Button Hover','taptap'), 'settings' => 'taptap_search_button_hover_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button position */
        $wp_customize->add_setting('taptap_search_button_position',array(
            'default' => 'right',
        ));
        $wp_customize->add_control('taptap_search_button_position',array(
            'type' => 'select',
            'label' => esc_html__('Search button position','taptap'),
            'section' => 'taptap_search_section',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
        ),
        ));
        
        /* search button top distance */
        $wp_customize->add_setting('taptap_search_button_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_top_distance',));
        function sanitize_taptap_search_button_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_top_distance',array('type' => 'text','label' => esc_html__('Top distance (in pixels)','taptap'),'description' => esc_html__('Example: 25. If empty, defaults to 10','taptap'),'section' => 'taptap_search_section',));
        
        /* search button left/right distance */
        $wp_customize->add_setting('taptap_search_button_side_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_side_distance',));
        function sanitize_taptap_search_button_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_side_distance',array('type' => 'text','label' => esc_html__('Left/right distance (in pixels)','taptap'),'description' => esc_html__('Example: 35. If empty, defaults to 10','taptap'),'section' => 'taptap_search_section',));
        
        /* search button label */
        $wp_customize->add_setting('taptap_search_button_label',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label',));
        function sanitize_taptap_search_button_label($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label',array('type' => 'text','label' => esc_html__('Label','taptap'),'description' => esc_html__('If empty, no label will be shown','taptap'),'section' => 'taptap_search_section',));
        
        /* search button label horizontal position */
        $wp_customize->add_setting('taptap_search_button_label_horizontal_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_horizontal_position',));
        function sanitize_taptap_search_button_label_horizontal_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_horizontal_position',array('type' => 'text','label' => esc_html__('Label horizontal position (in pixels)','taptap'),'description' => esc_html__('Label position is relative to the search button. Negative values accepted. If empty, defaults to -55 (if empty when search button is hidden, defaults to 0)','taptap'),'section' => 'taptap_search_section',));
        
        /* search button label vertical position */
        $wp_customize->add_setting('taptap_search_button_label_vertical_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_vertical_position',));
        function sanitize_taptap_search_button_label_vertical_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_vertical_position',array('type' => 'text','label' => esc_html__('Label vertical position (in pixels)','taptap'),'description' => esc_html__('Label position is relative to the search button. Negative values accepted. If empty, defaults to 6 (if empty when search button is hidden, defaults to 0)','taptap'),'section' => 'taptap_search_section',));

        /* search button label color */
        $wp_customize->add_setting( 'taptap_search_button_label_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_label_color',array(
            'label' => esc_html__('Label','taptap'), 'settings' => 'taptap_search_button_label_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button label hover color */
        $wp_customize->add_setting( 'taptap_search_button_label_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_button_label_hover_color',array(
            'label' => esc_html__('Label Hover','taptap'), 'settings' => 'taptap_search_button_label_hover_color', 'section' => 'taptap_search_section' )
        ));
        
        /* search button label font size */
        $wp_customize->add_setting('taptap_search_button_label_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_font_size',));
        function sanitize_taptap_search_button_label_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_font_size',array('type' => 'text','label' => esc_html__('Label font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_search_section',));
        
        /* search button label letter spacing */
        $wp_customize->add_setting('taptap_search_button_label_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_letter_spacing',));
        function sanitize_taptap_search_button_label_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_letter_spacing',array('type' => 'text','label' => esc_html__('Label letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_search_section',));
        
        /* search button label font */
        $wp_customize->add_setting('taptap_search_button_label_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_search_button_label_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_search_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* search button label theme font */
        $wp_customize->add_setting('taptap_search_button_label_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_button_label_theme_font',));
        function sanitize_taptap_search_button_label_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_button_label_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_search_section',));
        

        //
        // ADD "Search Field & Overlay" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_search_field_section',array('title' => esc_html__( 'Search Field & Overlay', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* search field height */
        $wp_customize->add_setting('taptap_search_field_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_height',));
        function sanitize_taptap_search_field_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_height',array('type' => 'text','label' => esc_html__('Search field height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 65','taptap'),'section' => 'taptap_search_field_section',));
        
        /* search field placeholder text */
        $wp_customize->add_setting('taptap_search_placeholder',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_placeholder',));
        function sanitize_taptap_search_placeholder($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_placeholder',array('type' => 'text','label' => esc_html__('Search field placeholder text','taptap'),'description' => esc_html__('If empty, defaults to "enter search term"','taptap'),'section' => 'taptap_search_field_section',));
        
        /* search field align right */
        $wp_customize->add_setting('taptap_search_field_right',array('sanitize_callback' => 'sanitize_taptap_search_field_right',));
        function sanitize_taptap_search_field_right( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_field_right',array('type' => 'checkbox','label' => esc_html__('Align search field text to right','taptap'), 'section' => 'taptap_search_field_section',));
        
        /* search field animation speed */
        $wp_customize->add_setting('taptap_search_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_animation_speed',));
        function sanitize_taptap_search_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_animation_speed',array('type' => 'text','label' => esc_html__('Animation speed (in seconds)','taptap'),'description' => esc_html__('Example: 0.5. If empty, defaults to 0.25','taptap'),'section' => 'taptap_search_field_section',));
        
        /* hide clear field */
        $wp_customize->add_setting('taptap_search_clear_field',array('sanitize_callback' => 'sanitize_taptap_search_clear_field',));
        function sanitize_taptap_search_clear_field( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_search_clear_field',array('type' => 'checkbox','label' => esc_html__('Hide clear field function','taptap'), 'section' => 'taptap_search_field_section',));
        
        /* search close button color */
        $wp_customize->add_setting( 'taptap_search_close_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_close_button_color',array(
            'label' => esc_html__('Close search button','taptap'), 'settings' => 'taptap_search_close_button_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search close button color */
        $wp_customize->add_setting( 'taptap_search_close_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_close_button_hover_color',array(
            'label' => esc_html__('Close search button hover','taptap'), 'settings' => 'taptap_search_close_button_hover_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search clear field button color */
        $wp_customize->add_setting( 'taptap_search_clear_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_clear_button_color',array(
            'label' => esc_html__('Clear search field button','taptap'), 'settings' => 'taptap_search_clear_button_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search clear field button color */
        $wp_customize->add_setting( 'taptap_search_clear_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_clear_button_hover_color',array(
            'label' => esc_html__('Clear search field button hover','taptap'), 'settings' => 'taptap_search_clear_button_hover_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field placeholder text color */
        $wp_customize->add_setting( 'taptap_search_field_placeholder_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_placeholder_color',array(
            'label' => esc_html__('Search field placeholder text','taptap'), 'settings' => 'taptap_search_field_placeholder_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field text color */
        $wp_customize->add_setting( 'taptap_search_field_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_text_color',array(
            'label' => esc_html__('Search field text','taptap'), 'settings' => 'taptap_search_field_text_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field background color */
        $wp_customize->add_setting( 'taptap_search_field_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_field_background_color',array(
            'label' => esc_html__('Search field background','taptap'), 'settings' => 'taptap_search_field_background_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search field background opacity */
        $wp_customize->add_setting('taptap_search_background_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_background_opacity',));
        function sanitize_taptap_search_background_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_background_opacity',array('type' => 'text','label' => esc_html__('Search field background opacity','taptap'),'description' => esc_html__('Example: 0.5. If empty, defaults to 1','taptap'),'section' => 'taptap_search_field_section',));

        /* text field font size */
        $wp_customize->add_setting('taptap_search_field_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_font_size',));
        function sanitize_taptap_search_field_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 15','taptap'),'section' => 'taptap_search_field_section',));
        
        /* text field letter spacing */
        $wp_customize->add_setting('taptap_search_field_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_letter_spacing',));
        function sanitize_taptap_search_field_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_letter_spacing',array('type' => 'text','label' => esc_html__('Letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_search_field_section',));

        /* text field font */
        $wp_customize->add_setting('taptap_search_field_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_search_field_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_search_field_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* text field theme font */
        $wp_customize->add_setting('taptap_search_field_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_field_theme_font',));
        function sanitize_taptap_search_field_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_field_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_search_field_section',));
        
        /* search overlay color */
        $wp_customize->add_setting( 'taptap_search_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_search_overlay_color',array(
            'label' => esc_html__('Overlay','taptap'), 'settings' => 'taptap_search_overlay_color', 'section' => 'taptap_search_field_section' )
        ));
        
        /* search overlay opacity */
        $wp_customize->add_setting('taptap_search_overlay_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_search_overlay_opacity',));
        function sanitize_taptap_search_overlay_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_search_overlay_opacity',array('type' => 'text','label' => esc_html__('Overlay opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.5) If empty, defaults to 0.5','taptap'),'section' => 'taptap_search_field_section',));


        //
        // ADD "Header" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_header_section',array('title' => esc_html__( 'Header', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* show header */
        $wp_customize->add_setting('taptap_show_header',array('sanitize_callback' => 'sanitize_taptap_show_header',));
        function sanitize_taptap_show_header( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_header',array('type' => 'checkbox','label' => esc_html__('Show header','taptap'),'description' => esc_html__('Display background behind menu/search buttons and logo','taptap'), 'section' => 'taptap_header_section',));

        /* header height */
        $wp_customize->add_setting('taptap_header_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_height',));
        function sanitize_taptap_header_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_height',array('type' => 'text','label' => esc_html__('Header height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 65','taptap'),'section' => 'taptap_header_section',));

        /* header opacity */
        $wp_customize->add_setting('taptap_header_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_opacity',));
        function sanitize_taptap_header_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_opacity',array('type' => 'text','label' => esc_html__('Header opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.5) If empty, defaults to 1','taptap'),'section' => 'taptap_header_section',));

        /* show header shadow */
        $wp_customize->add_setting('taptap_show_header_shadow',array('sanitize_callback' => 'sanitize_taptap_show_header_shadow',));
        function sanitize_taptap_show_header_shadow( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_header_shadow',array('type' => 'checkbox','label' => esc_html__('Show header shadow','taptap'),'description' => esc_html__('Display shadow behind menu/search buttons and logo','taptap'), 'section' => 'taptap_header_section',));
        
        /* header shadow opacity */
        $wp_customize->add_setting('taptap_header_shadow_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_shadow_opacity',));
        function sanitize_taptap_header_shadow_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_shadow_opacity',array('type' => 'text','label' => esc_html__('Header shadow opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.75) If empty, defaults to 0.4','taptap'),'section' => 'taptap_header_section',));

        /* header background color */
        $wp_customize->add_setting( 'taptap_header_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_header_background_color',array(
            'label' => esc_html__('Header Background','taptap'), 'settings' => 'taptap_header_background_color', 'section' => 'taptap_header_section' )
        ));

        /* header background image */
        $wp_customize->add_setting('taptap_header_bg_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_header_bg_image',
            array(
                'label' => esc_html__('Header background image','taptap'),
                'settings' => 'taptap_header_bg_image',
                'section' => 'taptap_header_section',
        )
        ));

        /* header background image as pattern */
        $wp_customize->add_setting('taptap_header_bg_pattern',array('sanitize_callback' => 'sanitize_taptap_header_bg_pattern',));
        function sanitize_taptap_header_bg_pattern( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_header_bg_pattern',array('type' => 'checkbox','label' => esc_html__('Show background image as pattern','taptap'),'section' => 'taptap_header_section',));

        /* header background image opacity */
        $wp_customize->add_setting('taptap_header_bg_image_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_header_bg_image_opacity',));
        function sanitize_taptap_header_bg_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_header_bg_image_opacity',array('type' => 'text','label' => esc_html__('Header background image opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.75) If empty, defaults to 1','taptap'),'section' => 'taptap_header_section',));


        //
        // ADD "Menu Container & Overlay" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_container_section',array('title' => esc_html__( 'Menu Container & Overlay', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* menu appearance */
        $wp_customize->add_setting('taptap_menu_appearance',array(
            'default' => 'slidetop',
        ));
        $wp_customize->add_control('taptap_menu_appearance',array(
            'type' => 'select',
            'label' => esc_html__('Menu appearance','taptap'),
            'section' => 'taptap_container_section',
            'choices' => array(
                'slidetop' => 'Slide Top',
                'slideleft' => 'Slide Left',
                'slideright' => 'Slide Right',
                'slidebottom' => 'Slide Bottom',
                'fade' => 'Fade',
        ),
        ));
        
        /* menu appearance speed */
        $wp_customize->add_setting('taptap_menu_appearance_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_appearance_speed',));
        function sanitize_taptap_menu_appearance_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_appearance_speed',array('type' => 'text','label' => esc_html__('Appearance speed (in seconds)','taptap'),'description' => esc_html__('If empty, defaults to 0.5 (also applies to customizations in "Content Animation" section.)','taptap'),'section' => 'taptap_container_section',));
        
        /* menu appearance scaling */
        $wp_customize->add_setting('taptap_menu_appearance_scaling',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_appearance_scaling',));
        function sanitize_taptap_menu_appearance_scaling($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_appearance_scaling',array('type' => 'text','label' => esc_html__('Appearance scaling (0-1)','taptap'),'description' => esc_html__('If empty, defaults to 0.75. To disable scaling, enter value as 1','taptap'),'section' => 'taptap_container_section',));
        
        /* apply scaling to container background */
        $wp_customize->add_setting('taptap_menu_appearance_scaling_background',array('sanitize_callback' => 'sanitize_taptap_menu_appearance_scaling_background',));
        function sanitize_taptap_menu_appearance_scaling_background( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_appearance_scaling_background',array('type' => 'checkbox','label' => esc_html__('Extend scaling to background','taptap'), 'description' => esc_html__('If unchecked, scaling is applied to menu contents only','taptap'),'section' => 'taptap_container_section',));
        
        /* menu width */
        $wp_customize->add_setting('taptap_menu_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_width',));
        function sanitize_taptap_menu_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_width',array('type' => 'text','label' => esc_html__('Width (in pixels)','taptap'),'description' => esc_html__('Applied when Slide Left or Slide Right appearance selected. If empty, defaults to full width','taptap'),'section' => 'taptap_container_section',));
        
        /* menu height */
        $wp_customize->add_setting('taptap_menu_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_height',));
        function sanitize_taptap_menu_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_height',array('type' => 'text','label' => esc_html__('Height (in pixels)','taptap'),'description' => esc_html__('Applied when Slide Top or Slide Bottom appearance selected. If empty, defaults to full height','taptap'),'section' => 'taptap_container_section',));
        
        /* corner roundness */
        $wp_customize->add_setting('taptap_menu_corner_roundness',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_corner_roundness',));
        function sanitize_taptap_menu_corner_roundness($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_corner_roundness',array('type' => 'text','label' => esc_html__('Background corner roundness (in pixels)','taptap'),'description' => esc_html__('Example: 10 or 50','taptap'),'section' => 'taptap_container_section',));
        
        /* distance from edges */
        $wp_customize->add_setting('taptap_distance_from_edges',array('default' => '','sanitize_callback' => 'sanitize_taptap_distance_from_edges',));
        function sanitize_taptap_distance_from_edges($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_distance_from_edges',array('type' => 'text','label' => esc_html__('Distance from edges (in pixels)','taptap'),'description' => esc_html__('Example: 10 or 50','taptap'),'section' => 'taptap_container_section',));
        
        /* content horizontal alignment */
        $wp_customize->add_setting('taptap_content_horizontal_alignment',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_content_horizontal_alignment',array(
            'type' => 'select',
            'label' => esc_html__('Content horizontal alignment','taptap'),
            'section' => 'taptap_container_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));
        
        /* content vertical alignment */
        $wp_customize->add_setting('taptap_content_vertical_alignment',array(
            'default' => 'top',
        ));
        $wp_customize->add_control('taptap_content_vertical_alignment',array(
            'type' => 'select',
            'label' => esc_html__('Content vertical alignment','taptap'),
            'section' => 'taptap_container_section',
            'choices' => array(
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
        ),
        ));
        
        /* content max width */
        $wp_customize->add_setting('taptap_menu_container_content_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_content_width',));
        function sanitize_taptap_menu_container_content_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_content_width',array('type' => 'text','label' => esc_html__('Max content width (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 800','taptap'),'section' => 'taptap_container_section',));
        
        /* left padding */
        $wp_customize->add_setting('taptap_menu_container_left_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_left_padding',));
        function sanitize_taptap_menu_container_left_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_left_padding',array('type' => 'text','label' => esc_html__('Left padding (in pixels)','taptap'),'description' => esc_html__('Left distance for contents inside menu container. If empty, defaults to 25','taptap'),'section' => 'taptap_container_section',));
        
        /* right padding */
        $wp_customize->add_setting('taptap_menu_container_right_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_right_padding',));
        function sanitize_taptap_menu_container_right_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_right_padding',array('type' => 'text','label' => esc_html__('Right padding (in pixels)','taptap'),'description' => esc_html__('Right distance for contents inside menu container. If empty, defaults to 25','taptap'),'section' => 'taptap_container_section',));
        
        /* top padding */
        $wp_customize->add_setting('taptap_menu_container_top_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_top_padding',));
        function sanitize_taptap_menu_container_top_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_top_padding',array('type' => 'text','label' => esc_html__('Top padding (in pixels)','taptap'),'description' => esc_html__('Top distance for contents inside menu container. If left empty, defaults to 75','taptap'),'section' => 'taptap_container_section',));
        
        /* bottom padding */
        $wp_customize->add_setting('taptap_menu_container_bottom_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_container_bottom_padding',));
        function sanitize_taptap_menu_container_bottom_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_container_bottom_padding',array('type' => 'text','label' => esc_html__('Bottom padding (in pixels)','taptap'),'description' => esc_html__('Bottom distance for contents inside menu container. If left empty, defaults to 75','taptap'),'section' => 'taptap_container_section',));
        
        /* background color */
        $wp_customize->add_setting( 'taptap_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color',array(
            'label' => esc_html__('Background color','taptap'), 'description' => 'Please note: To create pulsating background color effect, also select colors #2 and #3 below (pulsating will not take effect unless all three colors are chosen)', 'settings' => 'taptap_background_color', 'section' => 'taptap_container_section' )
        ));
        
        /* background color two */
        $wp_customize->add_setting( 'taptap_background_color_two', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color_two',array(
            'label' => esc_html__('Background color #2','taptap'), 'settings' => 'taptap_background_color_two', 'section' => 'taptap_container_section' )
        ));
        
        /* background color three */
        $wp_customize->add_setting( 'taptap_background_color_three', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_color_three',array(
            'label' => esc_html__('Background color #3','taptap'), 'settings' => 'taptap_background_color_three', 'section' => 'taptap_container_section' )
        ));

        /* background color gradient */
        $wp_customize->add_setting('taptap_background_gradient',array('sanitize_callback' => 'sanitize_taptap_background_gradient',));
        function sanitize_taptap_background_gradient( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_background_gradient',array('type' => 'checkbox','label' => esc_html__('Show background colors as gradient animation','taptap'),'section' => 'taptap_container_section',));
        
        /* background color pulsating speed */
        $wp_customize->add_setting('taptap_background_animation_speed',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_animation_speed',));
        function sanitize_taptap_background_animation_speed($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_animation_speed',array('type' => 'text','label' => esc_html__('Background color pulsating speed (in seconds)','taptap'),'description' => esc_html__('If you have entered all three background colors above, then you can use this setting to control the color pulsating speed. If empty, defaults to 10','taptap'),'section' => 'taptap_container_section',));

        /* background image */
        $wp_customize->add_setting('taptap_background_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_background_image',
            array(
                'label' => esc_html__('Background image','taptap'),
                'settings' => 'taptap_background_image',
                'section' => 'taptap_container_section',
        )
        ));
        
        /* background image as pattern */
        $wp_customize->add_setting('taptap_background_pattern',array('sanitize_callback' => 'sanitize_taptap_background_pattern',));
        function sanitize_taptap_background_pattern( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_background_pattern',array('type' => 'checkbox','label' => esc_html__('Show background image as pattern','taptap'),'section' => 'taptap_container_section',));
        
        /* background image width */
        $wp_customize->add_setting('taptap_background_image_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_image_width',));
        function sanitize_taptap_background_image_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_image_width',array('type' => 'text','label' => esc_html__('Background image width','taptap'),'description' => esc_html__('Can be entered in pixels or percentages (example: 200px or 50%). Height displayed proportionally. If empty, defaults to full screen.','taptap'),'section' => 'taptap_container_section',));
        
        /* background image opacity */
        $wp_customize->add_setting('taptap_background_image_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_image_opacity',));
        function sanitize_taptap_background_image_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_image_opacity',array('type' => 'text','label' => esc_html__('Background image opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.5) If empty, defaults to 0.1','taptap'),'section' => 'taptap_container_section',));
        
        /* background color opacity */
        $wp_customize->add_setting('taptap_background_color_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_color_opacity',));
        function sanitize_taptap_background_color_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_color_opacity',array('type' => 'text','label' => esc_html__('Background color opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.95) If empty, defaults to 1','taptap'),'section' => 'taptap_container_section',));

        /* background image horizontal alignment */
        $wp_customize->add_setting('taptap_background_horizontal_alignment',array(
            'default' => 'center',
        ));
        $wp_customize->add_control('taptap_background_horizontal_alignment',array(
            'type' => 'select',
            'label' => esc_html__('Background image horizontal alignment','taptap'),
            'section' => 'taptap_container_section',
            'choices' => array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
        ),
        ));

        /* background image horizontal alignment (num) */
        $wp_customize->add_setting('taptap_background_horizontal_alignment_num',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_horizontal_alignment_num',));
        function sanitize_taptap_background_horizontal_alignment_num($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_horizontal_alignment_num',array('type' => 'text','label' => esc_html__('Background image horizontal alignment','taptap'),'description' => esc_html__('Can be entered in pixels or percentage (example: 200px or 25%). Overrides the option above.','taptap'),'section' => 'taptap_container_section',));
        
        
        /* background image vertical alignment */
        $wp_customize->add_setting('taptap_background_vertical_alignment',array(
            'default' => 'middle',
        ));
        $wp_customize->add_control('taptap_background_vertical_alignment',array(
            'type' => 'select',
            'label' => esc_html__('Background image vertical alignment','taptap'),
            'section' => 'taptap_container_section',
            'choices' => array(
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
        ),
        ));

        /* background image vertical alignment (num) */
        $wp_customize->add_setting('taptap_background_vertical_alignment_num',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_vertical_alignment_num',));
        function sanitize_taptap_background_vertical_alignment_num($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_vertical_alignment_num',array('type' => 'text','label' => esc_html__('Background image vertical alignment','taptap'),'description' => esc_html__('Can be entered in pixels or percentage (example: 200px or 25%). Overrides the option above.','taptap'),'section' => 'taptap_container_section',));
        
        /* background overlay color */
        $wp_customize->add_setting( 'taptap_background_overlay_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_background_overlay_color',array(
            'label' => esc_html__('Overlay','taptap'), 'settings' => 'taptap_background_overlay_color', 'section' => 'taptap_container_section' )
        ));
        
        /* background overlay opacity */
        $wp_customize->add_setting('taptap_background_overlay_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_background_overlay_opacity',));
        function sanitize_taptap_background_overlay_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_background_overlay_opacity',array('type' => 'text','label' => esc_html__('Overlay opacity','taptap'),'description' => esc_html__('From 0-1 (example: 0.5) If empty, defaults to 0.5','taptap'),'section' => 'taptap_container_section',));


        //
        // ADD "Heading Text" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_heading_text_section',array('title' => esc_html__( 'Heading Text', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* heading text */
        $wp_customize->add_setting('taptap_heading_text',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_text',));
        function sanitize_taptap_heading_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_text',array('type' => 'text','label' => esc_html__('Text','taptap'),'section' => 'taptap_heading_text_section',));
        
        /* heading text color */
        $wp_customize->add_setting( 'taptap_heading_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_heading_color',array(
            'label' => esc_html__('Heading Text','taptap'), 'settings' => 'taptap_heading_color', 'section' => 'taptap_heading_text_section' )
        ));
        
        /* heading link */
        $wp_customize->add_setting('taptap_heading_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_link',));
        function sanitize_taptap_heading_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_link',array('type' => 'text','label' => esc_html__('Link','taptap'),'section' => 'taptap_heading_text_section',));

        /* heading font size */
        $wp_customize->add_setting('taptap_heading_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_font_size',));
        function sanitize_taptap_heading_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 14','taptap'),'section' => 'taptap_heading_text_section',));
        
        /* heading letter spacing */
        $wp_customize->add_setting('taptap_heading_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_letter_spacing',));
        function sanitize_taptap_heading_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_letter_spacing',array('type' => 'text','label' => esc_html__('Letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_heading_text_section',));

        /* heading line height */
        $wp_customize->add_setting('taptap_heading_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_line_height',));
        function sanitize_taptap_heading_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_line_height',array('type' => 'text','label' => esc_html__('Line height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 16','taptap'),'section' => 'taptap_heading_text_section',));

        /* heading font */
        $wp_customize->add_setting('taptap_heading_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_heading_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_heading_text_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* heading theme font */
        $wp_customize->add_setting('taptap_heading_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_theme_font',));
        function sanitize_taptap_heading_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_heading_text_section',));


        //
        // ADD "Subheading Text" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_subheading_text_section',array('title' => esc_html__( 'Subheading Text', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* subheading distance */
        $wp_customize->add_setting('taptap_subheading_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_distance',));
        function sanitize_taptap_subheading_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_distance',array('type' => 'text','label' => esc_html__('Spacing between heading/subheading (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 5.','taptap'),'section' => 'taptap_subheading_text_section',));
        
        /* subheading text */
        $wp_customize->add_setting('taptap_subheading_text',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_text',));
        function sanitize_taptap_subheading_text($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_text',array('type' => 'text','label' => esc_html__('Text','taptap'),'section' => 'taptap_subheading_text_section',));
        
        /* subheading text color */
        $wp_customize->add_setting( 'taptap_subheading_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_subheading_color',array(
            'label' => esc_html__('Subheading Text','taptap'), 'settings' => 'taptap_subheading_color', 'section' => 'taptap_subheading_text_section' )
        ));
        
        /* subheading link */
        $wp_customize->add_setting('taptap_subheading_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_link',));
        function sanitize_taptap_subheading_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_link',array('type' => 'text','label' => esc_html__('Link','taptap'),'section' => 'taptap_subheading_text_section',));

        /* subheading font size */
        $wp_customize->add_setting('taptap_subheading_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_font_size',));
        function sanitize_taptap_subheading_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 10','taptap'),'section' => 'taptap_subheading_text_section',));
        
        /* subheading letter spacing */
        $wp_customize->add_setting('taptap_subheading_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_letter_spacing',));
        function sanitize_taptap_subheading_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_letter_spacing',array('type' => 'text','label' => esc_html__('Letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_subheading_text_section',));

        /* subheading line height */
        $wp_customize->add_setting('taptap_subheading_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_line_height',));
        function sanitize_taptap_subheading_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_line_height',array('type' => 'text','label' => esc_html__('Line height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 16','taptap'),'section' => 'taptap_subheading_text_section',));

        /* subheading font */
        $wp_customize->add_setting('taptap_subheading_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_subheading_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_subheading_text_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* subheading theme font */
        $wp_customize->add_setting('taptap_subheading_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_subheading_theme_font',));
        function sanitize_taptap_subheading_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_subheading_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_subheading_text_section',));


        //
        // ADD "Heading Image" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_heading_image_section',array('title' => esc_html__( 'Heading Image', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* heading image */
        $wp_customize->add_setting('taptap_heading_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_heading_image',
            array(
                'label' => esc_html__('Image','taptap'),
                'description' => wp_kses( __('<strong>How to add retina image:</strong> Enable retina script in Misc section, then upload both the regular and retina image files and make sure they are named correctly. If retina image is uploaded, it will be shown on retina screens with no further setup necessary. <br><br> Example:<br> my-image.png and my-image@2x.png (note that the retina image must have "@2x" at the end. @3x images work as well.).<br><br>','taptap'), $allowed_html_array ),
                'settings' => 'taptap_heading_image',
                'section' => 'taptap_heading_image_section',
        )
        ));
        
        /* heading image max width */
        $wp_customize->add_setting('taptap_heading_image_max_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_max_width',));
        function sanitize_taptap_heading_image_max_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_max_width',array('type' => 'text','label' => esc_html__('Maximum width','taptap'),'section' => 'taptap_heading_image_section',));
        
        /* heading image link */
        $wp_customize->add_setting('taptap_heading_image_link',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_link',));
        function sanitize_taptap_heading_image_link($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_link',array('type' => 'text','label' => esc_html__('Link','taptap'),'section' => 'taptap_heading_image_section',));
        
        /* heading image new window */
        $wp_customize->add_setting('taptap_heading_image_new_window',array('sanitize_callback' => 'sanitize_taptap_heading_image_new_window',));
        function sanitize_taptap_heading_image_new_window( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_heading_image_new_window',array('type' => 'checkbox','label' => esc_html__('Open in new window/tab','taptap'),'section' => 'taptap_heading_image_section',));
        
        /* heading image top margin */
        $wp_customize->add_setting('taptap_heading_image_top_margin',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_top_margin',));
        function sanitize_taptap_heading_image_top_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_top_margin',array('type' => 'text','label' => esc_html__('Top margin (in pixels)','taptap'),'section' => 'taptap_heading_image_section',));
        
        /* heading image bottom margin */
        $wp_customize->add_setting('taptap_heading_image_bottom_margin',array('default' => '','sanitize_callback' => 'sanitize_taptap_heading_image_bottom_margin',));
        function sanitize_taptap_heading_image_bottom_margin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_heading_image_bottom_margin',array('type' => 'text','label' => esc_html__('Bottom margin (in pixels)','taptap'),'section' => 'taptap_heading_image_section',));


        //
        // ADD "Widgets" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_widget_section',array('title' => esc_html__( 'Widgets', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* widgets top distance */
        $wp_customize->add_setting('taptap_widget_top_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_top_distance',));
        function sanitize_taptap_widget_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_top_distance',array('type' => 'text','label' => esc_html__('Top distance (in pixels)','taptap'),'description' => esc_html__('Useful if you would like to have more space between the menu and widget area. If empty, defaults to 30','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget title font size */
        $wp_customize->add_setting('taptap_widget_title_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_font_size',));
        function sanitize_taptap_widget_title_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_font_size',array('type' => 'text','label' => esc_html__('Title font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 12','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget title letter spacing */
        $wp_customize->add_setting('taptap_widget_title_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_letter_spacing',));
        function sanitize_taptap_widget_title_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_letter_spacing',array('type' => 'text','label' => esc_html__('Title letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget title letter spacing */
        $wp_customize->add_setting('taptap_widget_title_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_line_height',));
        function sanitize_taptap_widget_title_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_line_height',array('type' => 'text','label' => esc_html__('Title line height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 12','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget title font */
        $wp_customize->add_setting('taptap_widget_title_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_widget_title_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_menu_widget_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));

        /* widget title theme font */
        $wp_customize->add_setting('taptap_widget_title_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_title_theme_font',));
        function sanitize_taptap_widget_title_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_title_theme_font',array('type' => 'text','label' => esc_html__('Title advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget font size */
        $wp_customize->add_setting('taptap_widget_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_font_size',));
        function sanitize_taptap_widget_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 12','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget letter spacing */
        $wp_customize->add_setting('taptap_widget_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_letter_spacing',));
        function sanitize_taptap_widget_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_letter_spacing',array('type' => 'text','label' => esc_html__('Letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget line height */
        $wp_customize->add_setting('taptap_widget_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_line_height',));
        function sanitize_taptap_widget_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_line_height',array('type' => 'text','label' => esc_html__('Line height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 16','taptap'),'section' => 'taptap_menu_widget_section',));

        /* widget font */
        $wp_customize->add_setting('taptap_widget_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_widget_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_menu_widget_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));

        /* widget theme font */
        $wp_customize->add_setting('taptap_widget_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_widget_theme_font',));
        function sanitize_taptap_widget_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_widget_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_menu_widget_section',));
        
        /* widget title color */
        $wp_customize->add_setting( 'taptap_widget_title_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_title_color',array(
            'label' => esc_html__('Widget title','taptap'), 'settings' => 'taptap_widget_title_color', 'section' => 'taptap_menu_widget_section' )
        ));
        
        /* widget text color */
        $wp_customize->add_setting( 'taptap_widget_text_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_text_color',array(
            'label' => esc_html__('Widget text','taptap'), 'settings' => 'taptap_widget_text_color', 'section' => 'taptap_menu_widget_section' )
        ));
        
        /* widget link color */
        $wp_customize->add_setting( 'taptap_widget_link_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_link_color',array(
            'label' => esc_html__('Widget link','taptap'), 'settings' => 'taptap_widget_link_color', 'section' => 'taptap_menu_widget_section' )
        ));

        /* widget link hover color */
        $wp_customize->add_setting( 'taptap_widget_link_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_widget_link_hover_color',array(
            'label' => esc_html__('Widget link (hover)','taptap'), 'settings' => 'taptap_widget_link_hover_color', 'section' => 'taptap_menu_widget_section' )
        ));


        //
        // ADD "Styled Scrollbar" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_scrollbar_section',array('title' => esc_html__( 'Styled Scrollbar', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));

        /* show styled scrollbar */
        $wp_customize->add_setting('taptap_styled_scrollbar',array('sanitize_callback' => 'sanitize_taptap_styled_scrollbar',));
        function sanitize_taptap_styled_scrollbar( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_styled_scrollbar',array('type' => 'checkbox','label' => esc_html__('Enable styled scrollbar','taptap'),'description' => esc_html__('If ticked, the menu will have a styled scrollbar. Applied on desktop only. On mobile, native scroll of a device is used.','taptap'), 'section' => 'taptap_scrollbar_section',));
        
        /* show on mouseover only */
        $wp_customize->add_setting('taptap_styled_scrollbar_hover_only',array('sanitize_callback' => 'sanitize_taptap_styled_scrollbar_hover_only',));
        function sanitize_taptap_styled_scrollbar_hover_only( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_styled_scrollbar_hover_only',array('type' => 'checkbox','label' => esc_html__('Show on mouseover only','taptap'),'description' => esc_html__('If ticked, the scrollbar will be shown only when mouse is over the menu area.','taptap'), 'section' => 'taptap_scrollbar_section',));
        
        /* scrollbar distance */
        $wp_customize->add_setting('taptap_styled_scrollbar_distance',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_distance',));
        function sanitize_taptap_styled_scrollbar_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_distance',array('type' => 'text','label' => esc_html__('Distance from sides (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 3','taptap'),'section' => 'taptap_scrollbar_section',));
        
        /* scrollbar thickness */
        $wp_customize->add_setting('taptap_styled_scrollbar_width',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_width',));
        function sanitize_taptap_styled_scrollbar_width($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_width',array('type' => 'text','label' => esc_html__('Thickness (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 5','taptap'),'section' => 'taptap_scrollbar_section',));
        
        /* rounded corners */
        $wp_customize->add_setting('taptap_styled_scrollbar_rounded',array('default' => '','sanitize_callback' => 'sanitize_taptap_styled_scrollbar_rounded',));
        function sanitize_taptap_styled_scrollbar_rounded($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_styled_scrollbar_rounded',array('type' => 'text','label' => esc_html__('Corner roundness (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_scrollbar_section',));
        
        /* scrollbar color */
        $wp_customize->add_setting('taptap_styled_scrollbar_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_color',array(
            'label' => esc_html__('Scrollbar','taptap'),'settings' => 'taptap_styled_scrollbar_color','section' => 'taptap_scrollbar_section' )
        ));
        
        /* scrollbar color (when dragged) */
        $wp_customize->add_setting('taptap_styled_scrollbar_color_dragged',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_color_dragged',array(
            'label' => esc_html__('Scrollbar (when dragged)','taptap'),'settings' => 'taptap_styled_scrollbar_color_dragged','section' => 'taptap_scrollbar_section' )
        ));
        
        /* scrollbar background color */
        $wp_customize->add_setting('taptap_styled_scrollbar_background_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_styled_scrollbar_background_color',array(
            'label' => esc_html__('Scrollbar background','taptap'),'settings' => 'taptap_styled_scrollbar_background_color','section' => 'taptap_scrollbar_section' )
        ));
        
        
        //
        // ADD "Content Animation" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_content_animation_section',array('title' => esc_html__( 'Content Animation', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* elements to animate */
        $wp_customize->add_setting('taptap_content_animation_elements',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_elements',));
        function sanitize_taptap_content_animation_elements($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_elements',array('type' => 'text','label' => esc_html__('Enter elements to animate (*required for animation to kick in)','taptap'),'description' => esc_html__('Enter the classes/IDs of the elements you wish to animate, separate with comma like you would in a stylesheet. Example: "#my-content, .content-wrapper"','taptap'),'section' => 'taptap_content_animation_section',));
        
        /* scaling */
        $wp_customize->add_setting('taptap_content_animation_scale',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_scale',));
        function sanitize_taptap_content_animation_scale($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_scale',array('type' => 'text','label' => esc_html__('Scaling','taptap'),'description' => esc_html__('To scale down, enter number smaller than 1. To scale up, enter number higher than 1. Example: 0.8 or 1.25. If empty, defaults to 0.95','taptap'),'section' => 'taptap_content_animation_section',));
        
        /* move x */
        $wp_customize->add_setting('taptap_content_animation_movex',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_movex',));
        function sanitize_taptap_content_animation_movex($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_movex',array('type' => 'text','label' => esc_html__('Horizontal move (in pixels)','taptap'),'description' => esc_html__('To move content right, enter a positive value. To move content left, enter negative value. Example: 100 or -100. If empty, no movement occurs.','taptap'),'section' => 'taptap_content_animation_section',));

        /* move y */
        $wp_customize->add_setting('taptap_content_animation_movey',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_movey',));
        function sanitize_taptap_content_animation_movey($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_movey',array('type' => 'text','label' => esc_html__('Vertical move (in pixels)','taptap'),'description' => esc_html__('To move content down, enter a positive value. To move content up, enter negative value. Example: 100 or -100. If empty, no movement occurs.','taptap'),'section' => 'taptap_content_animation_section',));

        /* opacity */
        $wp_customize->add_setting('taptap_content_animation_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_animation_opacity',));
        function sanitize_taptap_content_animation_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_animation_opacity',array('type' => 'text','label' => esc_html__('Opacity','taptap'),'description' => esc_html__('Example: 0.6 or 0.75. If empty, defaults to 1','taptap'),'section' => 'taptap_content_animation_section',));
        
        /* blur */
        $wp_customize->add_setting('taptap_content_blur',array('default' => '','sanitize_callback' => 'sanitize_taptap_content_blur',));
        function sanitize_taptap_content_blur($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_content_blur',array('type' => 'text','label' => esc_html__('Blur','taptap'),'description' => esc_html__('Example: 5 or 10. If empty, blur effect disabled','taptap'),'section' => 'taptap_content_animation_section',));
        
        /* blur on mobile only */
        $wp_customize->add_setting('taptap_content_blur_mobile',array('sanitize_callback' => 'sanitize_taptap_content_blur_mobile',));
        function sanitize_taptap_content_blur_mobile( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_content_blur_mobile',array('type' => 'checkbox','label' => esc_html__('Show blur effect on touch devices only','taptap'),'description' => esc_html__('Due to possible rendering issues in current versions of Chrome (the effect may cause a noticeable flicker when applied), you may want to show the blur effect on touch devices only, where it is much more reliable.','taptap'), 'section' => 'taptap_content_animation_section',));

    
        //
        // ADD "Alternate Close Button" SECTION TO "TapTap Plugin" PANEL 
        //
        $wp_customize->add_section('taptap_alt_close_section',array('title' => esc_html__( 'Alternate Close Button', 'taptap' ),'panel'  => 'taptap_panel','priority' => 9));
        
        /* show alternate close button */
        $wp_customize->add_setting('taptap_show_alt_close',array('sanitize_callback' => 'sanitize_taptap_show_alt_close',));
        function sanitize_taptap_show_alt_close( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_show_alt_close',array('type' => 'checkbox','label' => esc_html__('Show alternate close button','taptap'),'description' => esc_html__('Useful for cases where the default menu button (which transforms and also behaves as the close button) is hidden and a custom element is used to activate the menu.','taptap'), 'section' => 'taptap_alt_close_section',));

        /* alternate close button absolute position */
        $wp_customize->add_setting('taptap_alt_close_absolute_position',array('sanitize_callback' => 'sanitize_taptap_alt_close_absolute_position',));
        function sanitize_taptap_alt_close_absolute_position( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_alt_close_absolute_position',array('type' => 'checkbox','label' => esc_html__('Absolute position','taptap'),'description' => esc_html__('If unchecked, the close button will stick to the top when the menu is scrolled.','taptap'), 'section' => 'taptap_alt_close_section',));
        
        /* alternate close button position left */
        $wp_customize->add_setting('taptap_alt_close_position_left',array('sanitize_callback' => 'sanitize_taptap_alt_close_position_left',));
        function sanitize_taptap_alt_close_position_left( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_alt_close_position_left',array('type' => 'checkbox','label' => esc_html__('Align left','taptap'),'description' => esc_html__('Position left. If unchecked, the close button will be positioned on right side of screen.','taptap'), 'section' => 'taptap_alt_close_section',));
        
        /* alternate close animation */
        $wp_customize->add_setting('taptap_alt_close_hover_minus',array('sanitize_callback' => 'sanitize_taptap_alt_close_hover_minus',));
        function sanitize_taptap_alt_close_hover_minus( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_alt_close_hover_minus',array('type' => 'checkbox','label' => esc_html__('Hover animation','taptap'),'description' => esc_html__('When enabled, the close button will animate into a minus sign on hover.','taptap'), 'section' => 'taptap_alt_close_section',));

        /* alternate close button color */
        $wp_customize->add_setting('taptap_alt_close_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_alt_close_color',array(
            'label' => esc_html__('Alternate close button','taptap'), 'settings' => 'taptap_alt_close_color', 'section' => 'taptap_alt_close_section' )
        ));
        
        /* alternate close button hover color */
        $wp_customize->add_setting('taptap_alt_close_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_alt_close_hover_color',array(
            'label' => esc_html__('Alternate close button (hover)','taptap'), 'settings' => 'taptap_alt_close_hover_color', 'section' => 'taptap_alt_close_section' )
        ));

        /* alternate close button top distance */
        $wp_customize->add_setting('taptap_alt_close_top_distance',array('sanitize_callback' => 'sanitize_taptap_alt_close_top_distance',));
        function sanitize_taptap_alt_close_top_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_alt_close_top_distance',array(
            'type' => 'text',
            'label' => esc_html__('Top distance','taptap'),
            'description' => esc_html__('Example: 45. If empty, defaults to 20.','taptap'),
            'section' => 'taptap_alt_close_section',
        ));
        
        /* alternate close button side distance */
        $wp_customize->add_setting('taptap_alt_close_side_distance',array('sanitize_callback' => 'sanitize_taptap_alt_close_side_distance',));
        function sanitize_taptap_alt_close_side_distance($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_alt_close_side_distance',array(
            'type' => 'text',
            'label' => esc_html__('Side distance','taptap'),
            'description' => esc_html__('Example: 45. If empty, defaults to 20.','taptap'),
            'section' => 'taptap_alt_close_section',
        ));

        /* alternate close button thickness */
        $wp_customize->add_setting('taptap_alt_close_thickness',array('sanitize_callback' => 'sanitize_taptap_alt_close_thickness',));
        function sanitize_taptap_alt_close_thickness($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_alt_close_thickness',array(
            'type' => 'text',
            'label' => esc_html__('Thickness','taptap'),
            'description' => esc_html__('Example: 5. If empty, defaults to 2.','taptap'),
            'section' => 'taptap_alt_close_section',
        ));

        
        //
        // ADD "Misc" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_misc_section',array('title' => esc_html__( 'Misc', 'taptap' ),'panel' => 'taptap_panel','priority' => 9));
        
        /* enable smart scroll */
        $wp_customize->add_setting('taptap_enable_smart_scroll',array('sanitize_callback' => 'sanitize_taptap_enable_smart_scroll',));
        function sanitize_taptap_enable_smart_scroll( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_enable_smart_scroll',array('type' => 'checkbox','label' => esc_html__('Enable smart scroll','taptap'),'description' => esc_html__('If ticked, header elements will hide when scrolled downwards and become visible again when scrolled upwards.','taptap'), 'section' => 'taptap_misc_section',));
        
        /* open on front page */
        $wp_customize->add_setting('taptap_open_on_front_page',array('sanitize_callback' => 'sanitize_taptap_open_on_front_page',));
        function sanitize_taptap_open_on_front_page( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_open_on_front_page',array('type' => 'checkbox','label' => esc_html__('Open on front page?','taptap'),'description' => esc_html__('If ticked, menu is open by default on the front page.','taptap'), 'section' => 'taptap_misc_section',));
        
        /* body scroll lock */
        $wp_customize->add_setting('taptap_body_scroll_lock',array('sanitize_callback' => 'sanitize_taptap_body_scroll_lock',));
        function sanitize_taptap_body_scroll_lock( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_body_scroll_lock',array('type' => 'checkbox','label' => esc_html__('Lock body scroll','taptap'),'description' => esc_html__('If ticked, the body scroll will be disabled when menu is opened (unless scrolling is handled in an unusual way by the theme).','taptap'), 'section' => 'taptap_misc_section',));
        
        /* show submenu when current */
        $wp_customize->add_setting('taptap_current_menu_open',array('sanitize_callback' => 'sanitize_taptap_current_menu_open',));
        function sanitize_taptap_current_menu_open( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_current_menu_open',array('type' => 'checkbox','label' => esc_html__('Show submenu when current','taptap'),'description' => esc_html__('Open submenu by default when the menu item linking to current page resides inside.','taptap'), 'section' => 'taptap_misc_section',));
        
        /* absolute positioning */
        $wp_customize->add_setting('taptap_absolute_position',array('sanitize_callback' => 'sanitize_taptap_absolute_position',));
        function sanitize_taptap_absolute_position( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_absolute_position',array('type' => 'checkbox','label' => esc_html__('Absolute positioning','taptap'),'description' => esc_html__('If ticked, the menu/search buttons and logo leave the screen when scrolled.','taptap'), 'section' => 'taptap_misc_section',));
        
        /* header, search above menu */
        $wp_customize->add_setting('taptap_header_above_menu',array('sanitize_callback' => 'sanitize_taptap_header_above_menu',));
        function sanitize_taptap_header_above_menu( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_header_above_menu',array('type' => 'checkbox','label' => esc_html__('Show header elements above menu','taptap'),'description' => esc_html__('If ticked, the logo and search button will be visible when menu is open. If left unchecked, they will appear behind the menu.','taptap'), 'section' => 'taptap_misc_section',));
        
        /* push down site */
        $wp_customize->add_setting('taptap_push_down_site',array('sanitize_callback' => 'sanitize_taptap_push_down_site',));
        function sanitize_taptap_push_down_site( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_push_down_site',array('type' => 'checkbox','label' => esc_html__('Push down site','taptap'),'description' => esc_html__('If ticked, your site will be pushed down by the height of the TapTap menu.','taptap'), 'section' => 'taptap_misc_section',));

        /* don't load Font Awesome */
        $wp_customize->add_setting('taptap_no_fontawesome',array('sanitize_callback' => 'sanitize_taptap_no_fontawesome',));
        function sanitize_taptap_no_fontawesome( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_fontawesome',array('type' => 'checkbox','label' => esc_html__('Do not load Font Awesome icon set','taptap'),'description' => esc_html__('Useful if you do not use any icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.','taptap'),'section' => 'taptap_misc_section',));
        
        /* don't load Line Awesome */
        $wp_customize->add_setting('taptap_no_lineawesome',array('sanitize_callback' => 'sanitize_taptap_no_lineawesome',));
        function sanitize_taptap_no_lineawesome( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_lineawesome',array('type' => 'checkbox','label' => esc_html__('Do not load Line Awesome icon set','taptap'),'description' => esc_html__('Useful if you do not use any icons or if your theme or another plugin already loads it, to prevent it from being loaded twice unnecessarily.','taptap'),'section' => 'taptap_misc_section',));
        
        /* don't load Google Fonts */
        $wp_customize->add_setting('taptap_no_gfonts',array('sanitize_callback' => 'sanitize_taptap_no_gfonts',));
        function sanitize_taptap_no_gfonts( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_gfonts',array('type' => 'checkbox','label' => esc_html__('Do not load Google Fonts','taptap'),'description' => esc_html__('Useful if you do not wish to use any of the included Google Fonts and are using your theme fonts instead.','taptap'),'section' => 'taptap_misc_section',));
        
        /* enable retina.js */
        $wp_customize->add_setting('taptap_no_retina',array('sanitize_callback' => 'sanitize_taptap_no_retina',));
        function sanitize_taptap_no_retina( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_no_retina',array('type' => 'checkbox','label' => esc_html__('Enable retina script support for logo/heading image','taptap'),'description' => esc_html__('Please note: can potentially cause a conflict with some elements in some themes. To display image as retina when this script is disabled, simply upload the image twice as large (example: if image file height is 150, set the height value as 75).','taptap'),'section' => 'taptap_misc_section',));

        /* smaller than */
        $wp_customize->add_setting('taptap_smaller_than',array('sanitize_callback' => 'sanitize_taptap_smaller_than',));
        function sanitize_taptap_smaller_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_smaller_than',array(
            'type' => 'text',
            'label' => esc_html__('Hide at certain width/resolution','taptap'),
            'description' => wp_kses( __('<strong>Example #1:</strong> If you want to show TapTap on desktop only, enter the values as 0 and 500. <br><br> <strong>Example #2:</strong> If you want to show TapTap on mobile only, enter the values as 500 and 5000. <br><br> Feel free to experiment with your own values to get the result that is right for you. If fields are empty, TapTap will be visible at all browser widths and resolutions. <br><br> Hide TapTap menu if browser width or screen resolution (in pixels) is between...','taptap'), $allowed_html_array ),
            'section' => 'taptap_misc_section',
        ));
        
        /* larger than */
        $wp_customize->add_setting('taptap_larger_than',array('sanitize_callback' => 'sanitize_taptap_larger_than',));
        function sanitize_taptap_larger_than($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_larger_than',array(
            'type' => 'text',
            'description' => esc_html__('..and:','taptap'),
            'section' => 'taptap_misc_section',
        ));
        
        /* hide theme menu */
        $wp_customize->add_setting('taptap_hide_theme_menu',array('sanitize_callback' => 'sanitize_taptap_hide_theme_menu',));
        function sanitize_taptap_hide_theme_menu($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hide_theme_menu',array(
            'type' => 'text',
            'label' => esc_html__('Advanced: Hide theme menu','taptap'),
            'description' => esc_html__('If you have set TapTap to show only at a certain resolution, know the class/ID of your theme menu and would like to hide it when TapTap is visible, enter the class/ID into this field (example: "#my-theme-menu"). Multiple classes/IDs can be entered (separate with comma as you would in a stylesheet).','taptap'),
            'section' => 'taptap_misc_section',
        ));


        //
        // ADD "TapTap (Vertical menu)" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_panel('taptap_vert_panel', array('title' => esc_html__('TapTap (Vertical menu)', 'taptap'),'priority' => 10,));
        
        //
        // ADD "Menu & Submenu" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_submenu_section',array('title' => esc_html__( 'Menu & Submenu Items', 'taptap' ),'panel' => 'taptap_vert_panel','priority' => 9));
        
        /* alternate submenu activation */
        $wp_customize->add_setting('taptap_alternate_submenu_activation',array('sanitize_callback' => 'sanitize_taptap_alternate_submenu_activation',));
        function sanitize_taptap_alternate_submenu_activation( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_alternate_submenu_activation',array('type' => 'checkbox','label' => esc_html__('Alternate submenu activation','taptap'),'description' => esc_html__('Make entire top-level menu item open the submenu. If unchecked, only the arrow icon opens submenu','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* close menu after click */
        $wp_customize->add_setting('taptap_close_menu_on_click',array('sanitize_callback' => 'sanitize_taptap_close_menu_on_click',));
        function sanitize_taptap_close_menu_on_click( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_close_menu_on_click',array('type' => 'checkbox','label' => esc_html__('Close menu after click','taptap'),'description' => esc_html__('Close menu when menu item is clicked/tapped (useful on one-page websites where menu links lead to anchors, not new pages).','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* menu item font size */
        $wp_customize->add_setting('taptap_menu_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_font_size',));
        function sanitize_taptap_menu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_font_size',array('type' => 'text','label' => esc_html__('Menu item font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 14','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* submenu item font size */
        $wp_customize->add_setting('taptap_submenu_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_font_size',));
        function sanitize_taptap_submenu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_font_size',array('type' => 'text','label' => esc_html__('Submenu item font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 13','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* menu item vertical spacing */
        $wp_customize->add_setting('taptap_menu_vertical_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_vertical_spacing',));
        function sanitize_taptap_menu_vertical_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_vertical_spacing',array('type' => 'text','label' => esc_html__('Menu items vertical spacing (in pixels)','taptap'),'description' => esc_html__('Enter custom value to increase spacing between between menu items.','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* submenu item vertical spacing */
        $wp_customize->add_setting('taptap_submenu_vertical_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_vertical_spacing',));
        function sanitize_taptap_submenu_vertical_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_vertical_spacing',array('type' => 'text','label' => esc_html__('Submenu items vertical spacing (in pixels)','taptap'),'description' => esc_html__('Enter custom value to increase spacing between between submenu items.','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* menu item letter spacing */
        $wp_customize->add_setting('taptap_menu_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_letter_spacing',));
        function sanitize_taptap_menu_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_letter_spacing',array('type' => 'text','label' => esc_html__('Menu items letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* submenu item letter spacing */
        $wp_customize->add_setting('taptap_submenu_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_letter_spacing',));
        function sanitize_taptap_submenu_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_letter_spacing',array('type' => 'text','label' => esc_html__('Submenu items letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* menu item color */
        $wp_customize->add_setting( 'taptap_menu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_color',array(
            'label' => esc_html__('Menu item','taptap'), 'settings' => 'taptap_menu_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item color (current) */
        $wp_customize->add_setting( 'taptap_menu_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_color_current',array(
            'label' => esc_html__('Menu item (current)','taptap'), 'settings' => 'taptap_menu_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item hover color */
        $wp_customize->add_setting( 'taptap_menu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_hover_color',array(
            'label' => esc_html__('Menu item hover','taptap'), 'settings' => 'taptap_menu_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item hover color (current) */
        $wp_customize->add_setting( 'taptap_menu_hover_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_hover_color_current',array(
            'label' => esc_html__('Menu item hover (current)','taptap'), 'settings' => 'taptap_menu_hover_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item color */
        $wp_customize->add_setting( 'taptap_submenu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_color',array(
            'label' => esc_html__('Submenu item','taptap'), 'settings' => 'taptap_submenu_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item color (current) */
        $wp_customize->add_setting( 'taptap_submenu_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_color_current',array(
            'label' => esc_html__('Submenu item (current)','taptap'), 'settings' => 'taptap_submenu_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item hover color */
        $wp_customize->add_setting( 'taptap_submenu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_hover_color',array(
            'label' => esc_html__('Submenu item hover','taptap'), 'settings' => 'taptap_submenu_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu item hover color (current) */
        $wp_customize->add_setting( 'taptap_submenu_hover_color_current', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_hover_color_current',array(
            'label' => esc_html__('Submenu item hover (current)','taptap'), 'settings' => 'taptap_submenu_hover_color_current', 'section' => 'taptap_menu_submenu_section' )
        ));

        /* submenu arrow color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_color',array(
            'label' => esc_html__('Submenu arrow','taptap'), 'settings' => 'taptap_submenu_arrow_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu arrow hover color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_hover_color',array(
            'label' => esc_html__('Submenu arrow (hover)','taptap'), 'settings' => 'taptap_submenu_arrow_hover_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* submenu arrow divider color */
        $wp_customize->add_setting( 'taptap_submenu_arrow_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_arrow_divider_color',array(
            'label' => esc_html__('Submenu arrow divider','taptap'), 'settings' => 'taptap_submenu_arrow_divider_color', 'section' => 'taptap_menu_submenu_section' )
        ));
        
        /* menu item font */
        $wp_customize->add_setting('taptap_menu_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_menu_submenu_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* menu item theme font */
        $wp_customize->add_setting('taptap_menu_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_theme_font',));
        function sanitize_taptap_menu_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* submenu arrow position (top-level items) */
        $wp_customize->add_setting('taptap_menu_arrow_alignment',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_arrow_alignment',));
        function sanitize_taptap_menu_arrow_alignment($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_arrow_alignment',array('type' => 'text','label' => esc_html__('Submenu arrow position (top-level items, in pixels)','taptap'),'description' => esc_html__('At certain settings, the arrow next to a top-level menu item may need to be vertically re-aligned. If you find the it to be misaligned, enter a number here to nudge it into position. Example: 5','taptap'),'section' => 'taptap_menu_submenu_section',));
        
        /* submenu arrow position (submenu items) */
        $wp_customize->add_setting('taptap_submenu_arrow_alignment',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_arrow_alignment',));
        function sanitize_taptap_submenu_arrow_alignment($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_arrow_alignment',array('type' => 'text','label' => esc_html__('Submenu arrow position (submenu items, in pixels)','taptap'),'description' => esc_html__('At certain settings, the arrow next to a sublevel menu item may need to be vertically re-aligned. If you find the it to be misaligned, enter a number here to nudge it into position. Example: 5','taptap'),'section' => 'taptap_menu_submenu_section',));

        /* enable menu item apperance animation */
        $wp_customize->add_setting('taptap_menu_item_animation',array('sanitize_callback' => 'sanitize_taptap_menu_item_animation',));
        function sanitize_taptap_menu_item_animation( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_item_animation',array('type' => 'checkbox','label' => esc_html__('Menu item appearance animation','taptap'),'description' => esc_html__('When selected, menu items will animate individually upon menu activation (additional settings found below).','taptap'),'section' => 'taptap_menu_submenu_section',));

        /* menu item apperance origin */
        $wp_customize->add_setting('taptap_menu_item_animation_origin',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_item_animation_origin',));
        function sanitize_taptap_menu_item_animation_origin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_item_animation_origin',array('type' => 'text','label' => esc_html__('Menu item appearance origin (in pixels)','taptap'),'description' => esc_html__('Distance from which the menu item appearance animation originates (negative values accepted). If empty, defaults to 50','taptap'),'section' => 'taptap_menu_submenu_section',));


        //
        // ADD "Menu Item Descriptions" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_description_section',array('title' => esc_html__( 'Menu Item Descriptions', 'taptap' ),'panel' => 'taptap_vert_panel','priority' => 9));
        
        /* display menu item description above menu item */
        $wp_customize->add_setting('taptap_menu_description_above',array('sanitize_callback' => 'sanitize_taptap_menu_description_above',));
        function sanitize_taptap_menu_description_above( $input ) { if ( $input === true ) { return 1; } else { return ''; } }
        $wp_customize->add_control('taptap_menu_description_above',array('type' => 'checkbox','label' => esc_html__('Display menu item descriptions above menu items','taptap'),'description' => esc_html__('If unchecked, descriptions will be displayed below menu items','taptap'),'section' => 'taptap_menu_description_section',));
        

        /* menu item description font size */
        $wp_customize->add_setting('taptap_menu_description_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_font_size',));
        function sanitize_taptap_menu_description_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_font_size',array('type' => 'text','label' => esc_html__('Menu description font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_menu_description_section',));
        
        /* menu item description color */
        $wp_customize->add_setting( 'taptap_menu_description_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_description_color',array(
            'label' => esc_html__('Menu item description','taptap'), 'settings' => 'taptap_menu_description_color', 'section' => 'taptap_menu_description_section' )
        ));
        
        /* menu item description top padding */
        $wp_customize->add_setting('taptap_menu_description_top_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_top_padding',));
        function sanitize_taptap_menu_description_top_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_top_padding',array('type' => 'text','label' => esc_html__('Menu description top padding (in pixels)','taptap'),'description' => esc_html__('Enter custom value to increase top spacing around menu item description.','taptap'),'section' => 'taptap_menu_description_section',));
        
        /* menu item description bottom padding */
        $wp_customize->add_setting('taptap_menu_description_bottom_padding',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_bottom_padding',));
        function sanitize_taptap_menu_description_bottom_padding($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_bottom_padding',array('type' => 'text','label' => esc_html__('Menu description bottom padding (in pixels)','taptap'),'description' => esc_html__('Enter custom value to increase bottom spacing around menu item description.','taptap'),'section' => 'taptap_menu_description_section',));
        
        /* menu item description line height */
        $wp_customize->add_setting('taptap_menu_description_line_height',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_line_height',));
        function sanitize_taptap_menu_description_line_height($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_line_height',array('type' => 'text','label' => esc_html__('Menu description line height (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_menu_description_section',));
        
        /* menu item description letter spacing */
        $wp_customize->add_setting('taptap_menu_description_letter_spacing',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_letter_spacing',));
        function sanitize_taptap_menu_description_letter_spacing($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_letter_spacing',array('type' => 'text','label' => esc_html__('Menu description letter spacing (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 0','taptap'),'section' => 'taptap_menu_description_section',));
        
        /* menu item description font */
        $wp_customize->add_setting('taptap_menu_description_font',array(
            'default' => 'style1',
        ));
        $wp_customize->add_control('taptap_menu_description_font',array(
            'type' => 'select',
            'label' => esc_html__('Font','taptap'),
            'section' => 'taptap_menu_description_section',
            'choices' => array(
                'style1' => 'Montserrat (regular)',
                'style2' => 'Montserrat (bold)',
                'style3' => 'Varela Round',
                'style4' => 'Hind Siliguri (regular)',
                'style5' => 'Hind Siliguri (bold)',
                'style6' => 'Dosis',
                'style7' => 'Roboto (thin)',
                'style8' => 'Roboto (regular)',
                'style9' => 'Roboto Condensed (regular)',
                'style10' => 'Roboto Condensed (bold)',
                'style11' => 'Bree Serif',
                'style12' => 'Droid Serif',
                'style13' => 'Muli (bold)',
        ),
        ));
        
        /* menu item description theme font */
        $wp_customize->add_setting('taptap_menu_description_theme_font',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_description_theme_font',));
        function sanitize_taptap_menu_description_theme_font($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_description_theme_font',array('type' => 'text','label' => esc_html__('Advanced feature: Use theme fonts','taptap'),'description' => esc_html__('If you know the name of and would like to use your theme font(s), enter it in the textfield below as it appears in the theme stylesheet (font selection will be automatically overriden).','taptap'),'section' => 'taptap_menu_description_section',));


        //
        // ADD "Menu Icons" SECTION TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_section('taptap_menu_icon_section',array('title' => esc_html__( 'Menu Icons', 'taptap' ),'panel' => 'taptap_vert_panel','priority' => 9));

        /* menu item icon size */
        $wp_customize->add_setting('taptap_menu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_icon_size',));
        function sanitize_taptap_menu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_icon_size',array('type' => 'text','label' => esc_html__('Icon size (top-level items, in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_menu_icon_section',));

        /* submenu item icon size */
        $wp_customize->add_setting('taptap_submenu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_icon_size',));
        function sanitize_taptap_submenu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_icon_size',array('type' => 'text','label' => esc_html__('Icon size (submenu items, in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 11','taptap'),'section' => 'taptap_menu_icon_section',));

        /* menu item icon position */
        $wp_customize->add_setting('taptap_menu_icon_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_menu_icon_position',));
        function sanitize_taptap_menu_icon_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_menu_icon_position',array('type' => 'text','label' => esc_html__('Icon position (top-level items, in pixels)','taptap'),'description' => esc_html__('If you have set custom icon and text sizes that are radically different from one another, the icon next to a top-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position.','taptap'),'section' => 'taptap_menu_icon_section',));

        /* submenu item icon position */
        $wp_customize->add_setting('taptap_submenu_icon_position',array('default' => '','sanitize_callback' => 'sanitize_taptap_submenu_icon_position',));
        function sanitize_taptap_submenu_icon_position($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_submenu_icon_position',array('type' => 'text','label' => esc_html__('Icon position (submenu items, in pixels)','taptap'),'description' => esc_html__('If you have set custom icon and text sizes that are radically different from one another, the icon next to a sub-level menu item may need to be vertically re-positioned. If you find the icon to be misaligned, enter a number here to nudge it into position.','taptap'),'section' => 'taptap_menu_icon_section',));
        
        /* icon color */
        $wp_customize->add_setting( 'taptap_menu_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_icon_color',array(
            'label' => esc_html__('Icon','taptap'), 'settings' => 'taptap_menu_icon_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* icon hover color */
        $wp_customize->add_setting( 'taptap_menu_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_menu_icon_hover_color',array(
            'label' => esc_html__('Icon hover','taptap'), 'settings' => 'taptap_menu_icon_hover_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* submenu icon color */
        $wp_customize->add_setting( 'taptap_submenu_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_icon_color',array(
            'label' => esc_html__('Submenu icon','taptap'), 'settings' => 'taptap_submenu_icon_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        /* submenu icon hover color */
        $wp_customize->add_setting( 'taptap_submenu_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_submenu_icon_hover_color',array(
            'label' => esc_html__('Submenu icon hover','taptap'), 'settings' => 'taptap_submenu_icon_hover_color', 'section' => 'taptap_menu_icon_section' )
        ));
        
        
        //
        // ADD "TapTap (Image-based menu)" PANEL TO "TapTap Plugin" PANEL
        //
        $wp_customize->add_panel('taptap_img_panel', array('title' => esc_html__('TapTap (Image-based menu)', 'taptap'),'priority' => 10,));
        
        //
        // ADD "Colors" SECTION TO "TapTap (Image-based menu)" PANEL
        //
        $wp_customize->add_section('taptap_img_colors_section',array(
            'title' => esc_html__( 'Colors', 'taptap' ),
            'panel' => 'taptap_img_panel',
            'priority' => 9
        ));

        /* first menu item color */
        $wp_customize->add_setting('taptap_image_menu_first_menu_item_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_first_menu_item_color',array(
            'label' => esc_html__('First menu item','taptap'),'settings' => 'taptap_image_menu_first_menu_item_color','section' => 'taptap_img_colors_section' )
        ));

        /* sub-menu items color */
        $wp_customize->add_setting('taptap_image_menu_submenu_item_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_submenu_item_color',array(
            'label' => esc_html__('Sub-menu items','taptap'),'settings' => 'taptap_image_menu_submenu_item_color','section' => 'taptap_img_colors_section' )
        ));

        /* sub-menu items hover color */
        $wp_customize->add_setting('taptap_image_menu_submenu_item_hover_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_submenu_item_hover_color',array(
            'label' => esc_html__('Sub-menu items (hover)','taptap'),'settings' => 'taptap_image_menu_submenu_item_hover_color','section' => 'taptap_img_colors_section' )
        ));

        /* first menu item dropdown indicator color */
        $wp_customize->add_setting('taptap_image_menu_dropdown_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_dropdown_color',array(
            'label' => esc_html__('Dropdown indicator','taptap'),'settings' => 'taptap_image_menu_dropdown_color','section' => 'taptap_img_colors_section' )
        ));

        /* first menu item dropdown indicator background color */
        $wp_customize->add_setting('taptap_image_menu_dropdown_bg_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_dropdown_bg_color',array(
            'label' => esc_html__('Dropdown indicator background','taptap'),'settings' => 'taptap_image_menu_dropdown_bg_color','section' => 'taptap_img_colors_section' )
        ));

        /* submenu item dropdown indicator color */
        $wp_customize->add_setting('taptap_image_submenu_dropdown_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_submenu_dropdown_color',array(
            'label' => esc_html__('Submenu dropdown indicator','taptap'),'settings' => 'taptap_image_submenu_dropdown_color','section' => 'taptap_img_colors_section' )
        ));

        /* submenu item dropdown indicator background color */
        $wp_customize->add_setting('taptap_image_submenu_dropdown_bg_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_submenu_dropdown_bg_color',array(
            'label' => esc_html__('Submenu dropdown indicator background','taptap'),'settings' => 'taptap_image_submenu_dropdown_bg_color','section' => 'taptap_img_colors_section' )
        ));

        /* background color */
        $wp_customize->add_setting('taptap_image_menu_bg_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_bg_color',array(
            'label' => esc_html__('Background','taptap'),'settings' => 'taptap_image_menu_bg_color','section' => 'taptap_img_colors_section' )
        ));

        /* scrollbar color */
        $wp_customize->add_setting('taptap_image_menu_scrollbar_color',array('sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'taptap_image_menu_scrollbar_color',array(
            'label' => esc_html__('Scrollbar','taptap'),'settings' => 'taptap_image_menu_scrollbar_color','section' => 'taptap_img_colors_section' )
        ));

        //
        // ADD "Layout" SECTION TO "TapTap (Image-based menu)" PANEL
        //
        $wp_customize->add_section('taptap_img_layout_section',array(
            'title' => esc_html__( 'Layout', 'taptap' ),
            'panel' => 'taptap_img_panel',
            'priority' => 9
        ));

        /* menu item animation origin */
        $wp_customize->add_setting('taptap_image_menu_animation_origin',array('default' => '','sanitize_callback' => 'sanitize_taptap_image_menu_animation_origin',));
        function sanitize_taptap_image_menu_animation_origin($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_image_menu_animation_origin',array('type' => 'text','label' => esc_html__('Appearance animation origin (in pixels)','taptap'),'description' => esc_html__('Negative values accepted. If empty, defaults to 125','taptap'),'section' => 'taptap_img_layout_section',));

        /* menu item animation opacity */
        $wp_customize->add_setting('taptap_image_menu_animation_opacity',array('default' => '','sanitize_callback' => 'sanitize_taptap_image_menu_animation_opacity',));
        function sanitize_taptap_image_menu_animation_opacity($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_image_menu_animation_opacity',array('type' => 'text','label' => esc_html__('Appearance animation opacity','taptap'),'description' => esc_html__('From 0-1. To disable fade-in of menu items, enter value as 1','taptap'),'section' => 'taptap_img_layout_section',));

        /* menu item corner roundness */
        $wp_customize->add_setting('taptap_image_menu_corner_roundness',array('default' => '','sanitize_callback' => 'sanitize_taptap_image_menu_corner_roundness',));
        function sanitize_taptap_image_menu_corner_roundness($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_image_menu_corner_roundness',array('type' => 'text','label' => esc_html__('Corner roundness (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 7','taptap'),'section' => 'taptap_img_layout_section',));

        /* menu item gap */
        $wp_customize->add_setting('taptap_image_menu_item_gap',array('default' => '','sanitize_callback' => 'sanitize_taptap_image_menu_item_gap',));
        function sanitize_taptap_image_menu_item_gap($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_image_menu_item_gap',array('type' => 'text','label' => esc_html__('Gap between top-level menu items (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 20','taptap'),'section' => 'taptap_img_layout_section',));

        //
        // ADD "Images" SECTION TO "TapTap (Image-based menu)" PANEL
        //
        $wp_customize->add_section('taptap_img_images_section',array(
            'title' => esc_html__( 'Images', 'taptap' ),
            'panel' => 'taptap_img_panel',
            'priority' => 9
        ));

        /* menu item background image 01 */
        $wp_customize->add_setting('taptap_image_menu_image_one');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_one',
            array(
                'label' => esc_html__('1st menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_one',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 02 */
        $wp_customize->add_setting('taptap_image_menu_image_two');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_two',
            array(
                'label' => esc_html__('2nd menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_two',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 03 */
        $wp_customize->add_setting('taptap_image_menu_image_three');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_three',
            array(
                'label' => esc_html__('3rd menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_three',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 04 */
        $wp_customize->add_setting('taptap_image_menu_image_four');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_four',
            array(
                'label' => esc_html__('4th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_four',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 05 */
        $wp_customize->add_setting('taptap_image_menu_image_five');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_five',
            array(
                'label' => esc_html__('5th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_five',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 06 */
        $wp_customize->add_setting('taptap_image_menu_image_six');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_six',
            array(
                'label' => esc_html__('6th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_six',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 07 */
        $wp_customize->add_setting('taptap_image_menu_image_seven');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_seven',
            array(
                'label' => esc_html__('7th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_seven',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 08 */
        $wp_customize->add_setting('taptap_image_menu_image_eight');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_eight',
            array(
                'label' => esc_html__('8th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_eight',
                'section' => 'taptap_img_images_section',
        )
        ));

        /* menu item background image 09 */
        $wp_customize->add_setting('taptap_image_menu_image_nine');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'taptap_image_menu_image_nine',
            array(
                'label' => esc_html__('9th menu item image','taptap'),
                'settings' => 'taptap_image_menu_image_nine',
                'section' => 'taptap_img_images_section',
        )
        ));


        //
        // ADD "TapTap (Horizontal menu)" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('taptap_hor_panel', array('title' => esc_html__('TapTap (Horizontal menu)', 'taptap'),'priority' => 10,));
        
        //
        // ADD "Section Titles" SECTION TO "TapTap (Horizontal menu)" PANEL
        //
        $wp_customize->add_section('taptap_hor_titles_section',array(
            'title' => esc_html__( 'Section Titles', 'taptap' ),
            'description' => wp_kses( __('<strong>Note:</strong>To turn a regular menu item into a section title, give it the "taptap-title" class in the WordPress menu builder.<br><br>','taptap'), $allowed_html_array ),
            'panel' => 'taptap_hor_panel',
            'priority' => 9
        ));

        /* section title font size */
        $wp_customize->add_setting('taptap_hor_title_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_hor_title_font_size',));
        function sanitize_taptap_hor_title_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hor_title_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 14','taptap'),'section' => 'taptap_hor_titles_section',));

        /* section title color */
        $wp_customize->add_setting( 'taptap_hor_title_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_title_color',array(
            'label' => esc_html__('Section title','taptap'), 'settings' => 'taptap_hor_title_color', 'section' => 'taptap_hor_titles_section' )
        ));
        
        /* section title icon size */
        $wp_customize->add_setting('taptap_hor_title_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_hor_title_icon_size',));
        function sanitize_taptap_hor_title_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hor_title_icon_size',array('type' => 'text','label' => esc_html__('Icon size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 14','taptap'),'section' => 'taptap_hor_titles_section',));

        /* section title icon color */
        $wp_customize->add_setting( 'taptap_hor_title_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_title_icon_color',array(
            'label' => esc_html__('Icon','taptap'), 'settings' => 'taptap_hor_title_icon_color', 'section' => 'taptap_hor_titles_section' )
        ));

        /* section title line color */
        $wp_customize->add_setting( 'taptap_hor_title_line_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_title_line_color',array(
            'label' => esc_html__('Line','taptap'), 'settings' => 'taptap_hor_title_line_color', 'section' => 'taptap_hor_titles_section' )
        ));

        //
        // ADD "Menu Items" SECTION TO "TapTap (Horizontal menu)" PANEL
        //
        $wp_customize->add_section('taptap_hor_menu_item_section',array(
            'title' => esc_html__( 'Menu Items', 'taptap' ),
            'panel' => 'taptap_hor_panel',
            'priority' => 9
        ));

        /* menu item font size */
        $wp_customize->add_setting('taptap_hor_menu_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_hor_menu_font_size',));
        function sanitize_taptap_hor_menu_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hor_menu_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 16','taptap'),'section' => 'taptap_hor_menu_item_section',));

        /* menu item color */
        $wp_customize->add_setting( 'taptap_hor_menu_item_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_menu_item_color',array(
            'label' => esc_html__('Menu item','taptap'), 'settings' => 'taptap_hor_menu_item_color', 'section' => 'taptap_hor_menu_item_section' )
        ));

        /* menu item hover color */
        $wp_customize->add_setting( 'taptap_hor_menu_item_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_menu_item_hover_color',array(
            'label' => esc_html__('Menu item (hover)','taptap'), 'settings' => 'taptap_hor_menu_item_hover_color', 'section' => 'taptap_hor_menu_item_section' )
        ));

        /* sub-menu arrow icon color */
        $wp_customize->add_setting( 'taptap_hor_submenu_arrow_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_submenu_arrow_icon_color',array(
            'label' => esc_html__('Sub-menu arrow icon','taptap'), 'settings' => 'taptap_hor_submenu_arrow_icon_color', 'section' => 'taptap_hor_menu_item_section' )
        ));

        /* sub-menu arrow icon hover color */
        $wp_customize->add_setting( 'taptap_hor_submenu_arrow_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_submenu_arrow_icon_hover_color',array(
            'label' => esc_html__('Sub-menu arrow icon (hover)','taptap'), 'settings' => 'taptap_hor_submenu_arrow_icon_hover_color', 'section' => 'taptap_hor_menu_item_section' )
        ));

        //
        // ADD "Menu Icons" SECTION TO "TapTap (Horizontal menu)" PANEL
        //
        $wp_customize->add_section('taptap_hor_menu_icon_section',array(
            'title' => esc_html__( 'Menu Icons', 'taptap' ),
            'panel' => 'taptap_hor_panel',
            'priority' => 9
        ));

        /* menu item icon size */
        $wp_customize->add_setting('taptap_hor_menu_icon_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_hor_menu_icon_size',));
        function sanitize_taptap_hor_menu_icon_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hor_menu_icon_size',array('type' => 'text','label' => esc_html__('Icon size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 20','taptap'),'section' => 'taptap_hor_menu_icon_section',));

        /* menu item icon color */
        $wp_customize->add_setting( 'taptap_hor_menu_item_icon_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_menu_item_icon_color',array(
            'label' => esc_html__('Icon','taptap'), 'settings' => 'taptap_hor_menu_item_icon_color', 'section' => 'taptap_hor_menu_icon_section' )
        ));

        /* menu item icon hover color */
        $wp_customize->add_setting( 'taptap_hor_menu_item_icon_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_menu_item_icon_hover_color',array(
            'label' => esc_html__('Icon (hover)','taptap'), 'settings' => 'taptap_hor_menu_item_icon_hover_color', 'section' => 'taptap_hor_menu_icon_section' )
        ));

        //
        // ADD "Back Button" SECTION TO "TapTap (Horizontal menu)" PANEL
        //
        $wp_customize->add_section('taptap_hor_back_button_section',array(
            'title' => esc_html__( 'Back Button', 'taptap' ),
            'panel' => 'taptap_hor_panel',
            'priority' => 9
        ));

        /* back button font size */
        $wp_customize->add_setting('taptap_hor_back_button_font_size',array('default' => '','sanitize_callback' => 'sanitize_taptap_hor_back_button_font_size',));
        function sanitize_taptap_hor_back_button_font_size($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('taptap_hor_back_button_font_size',array('type' => 'text','label' => esc_html__('Font size (in pixels)','taptap'),'description' => esc_html__('If empty, defaults to 16','taptap'),'section' => 'taptap_hor_back_button_section',));

        /* back button color */
        $wp_customize->add_setting( 'taptap_hor_back_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_back_button_color',array(
            'label' => esc_html__('Back button','taptap'), 'settings' => 'taptap_hor_back_button_color', 'section' => 'taptap_hor_back_button_section' )
        ));

        /* back button hover color */
        $wp_customize->add_setting( 'taptap_hor_back_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_back_button_hover_color',array(
            'label' => esc_html__('Back button (hover)','taptap'), 'settings' => 'taptap_hor_back_button_hover_color', 'section' => 'taptap_hor_back_button_section' )
        ));

        /* back button arrow color */
        $wp_customize->add_setting( 'taptap_hor_back_button_arrow_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_back_button_arrow_color',array(
            'label' => esc_html__('Arrow','taptap'), 'settings' => 'taptap_hor_back_button_arrow_color', 'section' => 'taptap_hor_back_button_section' )
        ));

        /* back button arrow hover color */
        $wp_customize->add_setting( 'taptap_hor_back_button_arrow_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_back_button_arrow_hover_color',array(
            'label' => esc_html__('Arrow (hover)','taptap'), 'settings' => 'taptap_hor_back_button_arrow_hover_color', 'section' => 'taptap_hor_back_button_section' )
        ));

        /* back button line color */
        $wp_customize->add_setting( 'taptap_hor_back_button_line_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'taptap_hor_back_button_line_color',array(
            'label' => esc_html__('Line','taptap'), 'settings' => 'taptap_hor_back_button_line_color', 'section' => 'taptap_hor_back_button_section' )
        ));

    }
	add_action('customize_register', 'taptap_theme_customizer');

	//
	// Add menu to theme (unless hidden on specified posts/pages)
	//
    
	function bonfire_taptap_footer() {
        if( is_singular() ) {
            $meta_value = get_post_meta( get_the_ID(), 'taptap-hide-checkbox', true );
            if( empty( $meta_value ) ) {
                include( plugin_dir_path( __FILE__ ) . 'include.php');
            }
        } else {
            include( plugin_dir_path( __FILE__ ) . 'include.php');
        }
	}
	add_action('wp_footer','bonfire_taptap_footer');

	//
	// ADD the walker class (for menu descriptions)
	//
	class TapTap_Menu_Description extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			
			$class_names = $value = '';
	
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';
	
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
	
			$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	
			$item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';

            /* menu item description above menu items */
            if(get_theme_mod('taptap_menu_description_above', '') !== '') {
                $item_output .= '<div class="taptap-menu-item-description">' . $item->description . '</div>';
            }

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

            /* menu item description below menu items */
            if(get_theme_mod('taptap_menu_description_above', '') === '') {
                $item_output .= '<div class="taptap-menu-item-description">' . $item->description . '</div>';
            }

			$item_output .= '</a>';
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
		}
    }

    //
	// ADD the walker class (for image menu wrappers)
	//
    class TapTap_Image_Menu_Wrappers extends Walker_Nav_Menu {
        private $_before = null;
    
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            if ( null === $this->_before ) {
                $this->_before = $args->before;
            }
            if ( 0 == $depth ) {
                $args->before = '<div class="taptap-image-sub-wrapper"><div class="taptap-image-grid-item">' . $this->_before;
            } else {
                $args->before = $this->_before;
            }
            parent::start_el( $output, $item, $depth, $args, $id );
        }
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            if ( 0 == $depth ) {
                $output .= '</div></div>';
            }
            $output .= "</li>\n";
        }
    }

    //
	// WooCommerce cart AJAX
    //
    add_filter( 'woocommerce_add_to_cart_fragments', 'bonfire_woocommerce_header_add_to_cart_fragment' );

    function bonfire_woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <a class="taptap-cart-count" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'bonfire'); ?>"><div class="taptap-shopping-icon"></div><span><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'bonfire'), $woocommerce->cart->cart_contents_count);?></span></span></a>
        <?php
        $fragments['a.taptap-cart-count'] = ob_get_clean();
        return $fragments;
    }

	//
	// ENQUEUE taptap.css
	//
	function bonfire_taptap_css() {
        wp_register_style( 'bonfire-taptap-css', plugins_url( '/taptap.css', __FILE__ ) . '', array(), '1', 'all' );
        wp_enqueue_style( 'bonfire-taptap-css' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_css' );

	//
	// ENQUEUE taptap-accordion.js
	//
	function bonfire_taptap_accordion() {
        if(get_theme_mod('taptap_alternate_submenu_activation')) {
            wp_register_script( 'bonfire-taptap-accordion-full-link', plugins_url( '/taptap-accordion-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-accordion-full-link' );
        } else {
            wp_register_script( 'bonfire-taptap-accordion', plugins_url( '/taptap-accordion.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-accordion' );
        }
	}
    add_action( 'wp_enqueue_scripts', 'bonfire_taptap_accordion' );
    
    //
	// ENQUEUE taptap-horizontal-menu.js
	//
	function bonfire_taptap_horizontal_js() {
        wp_register_script( 'bonfire-taptap-horizontal-js', plugins_url( '/taptap-horizontal-menu.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
        wp_enqueue_script( 'bonfire-taptap-horizontal-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_horizontal_js' );

    //
	// ENQUEUE taptap-image-menu.js
	//
	function bonfire_taptap_image_js() {
        wp_register_script( 'bonfire-taptap-image-js', plugins_url( '/taptap-image-menu.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
        wp_enqueue_script( 'bonfire-taptap-image-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_image_js' );
	
	//
	// ENQUEUE taptap.js
	//
	function bonfire_taptap_js() {
        wp_register_script( 'bonfire-taptap-js', plugins_url( '/taptap.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
        wp_enqueue_script( 'bonfire-taptap-js' );
	}
	add_action( 'wp_enqueue_scripts', 'bonfire_taptap_js' );
	
	//
	// ENQUEUE taptap-close-on-click.js
	//
    if(get_theme_mod('taptap_close_menu_on_click')) {
		function bonfire_taptap_close_on_click_js() {
            if(get_theme_mod('taptap_alternate_submenu_activation')) {
                wp_register_script( 'bonfire-taptap-close-on-click-js-full-link', plugins_url( '/taptap-close-on-click-full-link.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-taptap-close-on-click-js-full-link' );
            } else {
                wp_register_script( 'bonfire-taptap-close-on-click-js', plugins_url( '/taptap-close-on-click.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
                wp_enqueue_script( 'bonfire-taptap-close-on-click-js' );
            }
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_taptap_close_on_click_js' );
	}
    
    //
	// ENQUEUE retina.min.js
	//
    if(get_theme_mod('taptap_no_retina', '') !== '') {
        function bonfire_taptap_retina_js() {
            wp_register_script( 'bonfire-taptap-retina-js', plugins_url( '/retina.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
            wp_enqueue_script( 'bonfire-taptap-retina-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_retina_js' );
    }

    //
	// ENQUEUE taptap-body-scroll-lock.js
	//
    if(get_theme_mod('taptap_body_scroll_lock', '') !== '') {
        function bonfire_taptap_body_scroll_lock_js() {
            wp_register_script( 'bonfire-taptap-body-scroll-lock-js', plugins_url( '/taptap-body-scroll-lock.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
            wp_enqueue_script( 'bonfire-taptap-body-scroll-lock-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_body_scroll_lock_js' );
    }
    
    //
	// ENQUEUE taptap-smart-scroll.js
	//
    if(get_theme_mod('taptap_enable_smart_scroll', '') !== '') {
        function bonfire_taptap_smart_scroll_js() {
            wp_register_script( 'bonfire-taptap-smart-scroll-js', plugins_url( '/taptap-smart-scroll.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
            wp_enqueue_script( 'bonfire-taptap-smart-scroll-js' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_smart_scroll_js' );
    }
    
    //
	// ENQUEUE jquery.scrollbar.min.js (except on touch devices)
	//
    if(get_theme_mod('taptap_styled_scrollbar', '') !== '') {
        function bonfire_taptap_scrollbar_js() {
            if ( wp_is_mobile() ) { } else {
                wp_register_script( 'bonfire-taptap-scrollbar-js', plugins_url( '/jquery.scrollbar.min.js', __FILE__ ) . '', array( 'jquery' ), '1' );  
                wp_enqueue_script( 'bonfire-taptap-scrollbar-js' );
            }
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_scrollbar_js' );
    }
    
    //
	// ENQUEUE Google WebFonts
	//
    if(get_theme_mod('taptap_no_gfonts', '') === '') {
        function taptap_fonts_url() {
            $font_url = '';

            if ( 'off' !== _x( 'on', 'Google font: on or off', 'taptap' ) ) {
                $font_url = add_query_arg( 'family', urlencode( 'Montserrat:400,700|Varela Round|Hind Siliguri:400,600|Dosis:600|Roboto:100,400|Roboto Condensed:400,700|Bree Serif|Droid Serif:400|Muli:700' ), "//fonts.googleapis.com/css" );
            }
            return $font_url;
        }
        function bonfire_taptap_font() {
            wp_enqueue_style( 'taptap-fonts', taptap_fonts_url(), array(), '1.0.0' );
        }
        add_action( 'wp_enqueue_scripts', 'bonfire_taptap_font' );
    }

	//
	// Enqueue Font Awesome (unless disabled)
	//
    if(get_theme_mod('taptap_no_fontawesome', '') === '') {
		function bonfire_taptap_fontawesome() {
            wp_register_style( 'taptap-fontawesome', plugins_url( '/fonts/font-awesome/css/all.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'taptap-fontawesome' );
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_taptap_fontawesome' );
	}

    //
	// Enqueue Line Awesome (unless disabled)
	//
    if(get_theme_mod('taptap_no_lineawesome', '') === '') {
		function bonfire_taptap_lineawesome() {
            wp_register_style( 'taptap-lineawesome', plugins_url( '/fonts/line-awesome/css/line-awesome.min.css', __FILE__ ) . '', array(), '1', 'all' );  
            wp_enqueue_style( 'taptap-lineawesome' );
		}
		add_action( 'wp_enqueue_scripts', 'bonfire_taptap_lineawesome' );
	}

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
            'taptap-by-bonfire' => ( 'TapTap: Vertical Menu' ),
            'taptap-by-bonfire-image' => ( 'TapTap: Image-Based Menu' ),
            'taptap-by-bonfire-horizontal' => ( 'TapTap: Horizontal Menu' ),
		) );
    }
    
    //
	// Translation-ready
	//
    function taptap_load_plugin_textdomain() {
        load_plugin_textdomain( 'taptap', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'taptap_load_plugin_textdomain' );
	
    //
	// Add 'Settings' link to plugin page
	//
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'taptap_add_action_links' );
    function taptap_add_action_links ( $links ) {
        $mylinks = array(
        '<a href="' . admin_url( 'customize.php?autofocus[panel]=taptap_panel' ) . '">Settings</a>',
        );
    return array_merge( $links, $mylinks );
    }
    
	//
	// Allow Shortcodes in Text Widget
	//
	add_filter('widget_text', 'do_shortcode');
	
	//
	// Register Widgets
	//
	function bonfire_taptap_widgets_init() {

		register_sidebar( array(
		'name' => esc_html__( 'TapTap Widgets (above menu)', 'bonfire' ),
		'id' => 'taptap-widgets-above',
		'description' => esc_html__( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));
        
        register_sidebar( array(
		'name' => esc_html__( 'TapTap Widgets (below menu)', 'bonfire' ),
		'id' => 'taptap-widgets',
		'description' => esc_html__( 'Drag widgets here', 'bonfire' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
		));

	}
	add_action( 'widgets_init', 'bonfire_taptap_widgets_init' );

	//
	// Insert theme customizer options into the footer
	//
	function bonfire_taptap_header_customize() {

		if( is_singular() ) {
            $meta_value = get_post_meta( get_the_ID(), 'taptap-hide-checkbox', true );
            if( empty( $meta_value ) ) {
                include( plugin_dir_path( __FILE__ ) . 'include-styles.php');
            }
        } else {
            include( plugin_dir_path( __FILE__ ) . 'include-styles.php');
        }

	}
	add_action('wp_head','bonfire_taptap_header_customize');
    
    //
    // Hide TapTap on specific posts/pages
    //
    function taptap_hide_custom_meta() {
        add_meta_box( 'taptap_hide', esc_html__( 'TapTap plugin', 'taptap' ), 'taptap_meta_callback', 'post', 'normal', 'high' );
        add_meta_box( 'taptap_hide', esc_html__( 'TapTap plugin', 'taptap' ), 'taptap_meta_callback', 'page', 'normal', 'high' );
    }
    add_action( 'add_meta_boxes', 'taptap_hide_custom_meta' );
    // Output
    function taptap_meta_callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), 'taptap_nonce' );
        $taptap_stored_meta = get_post_meta( $post->ID );
        ?>
    
        <p>
            <div class="taptap-row-content">
                <label for="taptap-hide-checkbox">
                    <input type="checkbox" name="taptap-hide-checkbox" id="taptap-hide-checkbox" value="yes" <?php if ( isset ( $taptap_stored_meta['taptap-hide-checkbox'] ) ) checked( $taptap_stored_meta['taptap-hide-checkbox'][0], 'yes' ); ?> />
                    <?php esc_html_e( 'Hide TapTap menu on this post/page', 'taptap' )?>
                </label>
            </div>
        </p>
    
        <?php
    }
    // Save
    function taptap_hide_save( $post_id ) {
    
        // Check save status
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ 'taptap_nonce' ] ) && wp_verify_nonce( $_POST[ 'taptap_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    
        // Exit script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
        }
    
        // Check input and sanitize/save if needed
        if( isset( $_POST[ 'meta-text' ] ) ) {
            update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
        }
        
        // Check input and save
        if( isset( $_POST[ 'taptap-hide-checkbox' ] ) ) {
            update_post_meta( $post_id, 'taptap-hide-checkbox', 'yes' );
        } else {
            update_post_meta( $post_id, 'taptap-hide-checkbox', '' );
        }
    
    }
    add_action( 'save_post', 'taptap_hide_save' );

?>