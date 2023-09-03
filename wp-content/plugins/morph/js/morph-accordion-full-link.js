jQuery(document).ready(function ($) {
'use strict';
	/* add sub-menu arrow */
	$('.morph-by-bonfire ul li ul').before($('<span class="morph-sub-arrow"><span class="morph-sub-arrow-inner"></span></span>'));

	/* accordion */
	$(".morph-by-bonfire .menu > li > span, .morph-by-bonfire .sub-menu > li > span").on('click', function(e) {
	e.preventDefault();
		if (false == $(this).next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("morph-submenu-active");
            $(this).siblings().find("span").removeClass("morph-submenu-active");
		}
		$(this).next().slideToggle(300);
		$(this).toggleClass("morph-submenu-active");
	})
	
	/* sub-menu arrow animation */
	$(".morph-by-bonfire .menu > li > span").on('click', function(e) {
	e.preventDefault();
		if($(".morph-by-bonfire .sub-menu > li > span").hasClass('morph-submenu-active'))
			{
				$(".morph-by-bonfire .sub-menu > li > span").removeClass("morph-submenu-active");
			}
	})

	/* accordion */
	$(".morph-by-bonfire .menu > li.menu-item-has-children > a, .morph-by-bonfire .sub-menu > li.menu-item-has-children > a").on('click', function(e) {
	e.preventDefault();
		if (false == $(this).next().next().is(':visible')) {
			$(this).parent().siblings().find(".sub-menu").slideUp(300);
			$(this).siblings().find(".sub-menu").slideUp(300);
			$(this).parent().siblings().find("span").removeClass("morph-submenu-active");
            $(this).siblings().find("span").removeClass("morph-submenu-active");
		}
		$(this).next().next().slideToggle(300);
		$(this).next().toggleClass("morph-submenu-active");
	})

	/* hover */
	$(".morph-by-bonfire .menu > li.menu-item-has-children > a, .morph-by-bonfire .sub-menu > li.menu-item-has-children > a").hover(
		function() {
			$(this).parent().addClass("full-item-arrow-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-arrow-hover");
	});
	$(".morph-by-bonfire .menu > li > span, .morph-by-bonfire .sub-menu > li > span").hover(
		function() {
			$(this).parent().addClass("full-item-arrow-hover");
		},
		function() {
			$(this).parent().removeClass("full-item-arrow-hover");
	});
	
	/* sub-menu arrow animation */
	$(".morph-by-bonfire .menu > li.menu-item-has-children > a").on('click', function(e) {
	e.preventDefault();
		if($(".morph-by-bonfire .sub-menu > li > span").hasClass('morph-submenu-active'))
			{
				$(".morph-by-bonfire .sub-menu > li > span").removeClass("morph-submenu-active");
			}
	})
	
	/* close sub-menus when menu button clicked */
	$(".morph-main-menu-button-wrapper, .morph-main-menu-activator, .morph-background-overlay").on('click', function(e) {
		if($(".morph-by-bonfire .menu > li > span, .morph-by-bonfire .sub-menu > li > span").hasClass('morph-submenu-active'))
			{
				$(".morph-by-bonfire .menu > li").find(".sub-menu").slideUp(300);
				$(".morph-by-bonfire .menu > li > span, .morph-by-bonfire .sub-menu > li > span").removeClass("morph-submenu-active");
			}
	})
	
});