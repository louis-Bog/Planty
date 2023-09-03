jQuery(document).ready(function (jQuery) {
    'use strict';

    /* add back button to sub-menus */
    jQuery('.taptap-by-bonfire-horizontal .sub-menu').prepend('<a class="taptap-horizontal-close-submenu" href="#"></a>');
    /* add arrow to sub-menu back button */
    jQuery('.taptap-by-bonfire-horizontal .menu-item-has-children > a').prepend('<span class="taptap-horizontal-sub-arrow"></span>');
    /* add line after menu items with .taptap-title class */
    jQuery('<div class="taptap-title-line"></div>').appendTo('.taptap-by-bonfire-horizontal .taptap-title');

    /* show horizontal sub-menu */
    jQuery('.taptap-by-bonfire-horizontal .menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
        
        jQuery(this).siblings().show(0).addClass('is-active');
        jQuery(this).parent().parent().find('> li > a, > li > .taptap-title-line, > .taptap-horizontal-close-submenu').addClass('is-active-top').delay(500).hide(0);
    });
    /* move horizontal menu right */
    jQuery('.menu-item-has-children > a').on('click', function() {
        var val = (parseInt(document.getElementById('taptap-move-horiz').style.left, 0) || 0) - 320;
        document.getElementById('taptap-move-horiz').style.left = val + 'px';
    });
    
    /* hide horizontal sub-menu */
    jQuery('.taptap-horizontal-close-submenu').on('click', function(e) {
        e.preventDefault();
        
        jQuery(this).parent().removeClass('is-active').delay(500).hide(0);
        jQuery(this).parent().parent().parent().find('> li > a, > li > .taptap-title-line, > .taptap-horizontal-close-submenu').show().removeClass('is-active-top');
    });
    /* move horizontal menu left */
    jQuery('.taptap-horizontal-close-submenu').on('click', function() {
        var val = (parseInt(document.getElementById('taptap-move-horiz').style.left, 0) || 0) + 320;
        document.getElementById('taptap-move-horiz').style.left = val + 'px';
    });

    /* clone top-level link and turn into back button */
    jQuery('.taptap-by-bonfire-horizontal .menu-item-has-children > a').each(function() {
        jQuery(this).clone().addClass('taptap-horizontal-back').prependTo(jQuery(this).next().children(':first'));
    });

    /* ignore links on menu items that have .taptap-title class */
    jQuery('.taptap-by-bonfire-horizontal .taptap-title a').on('click', function(e) {
        e.preventDefault();
    });

});