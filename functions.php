<?php

add_action('wp_enqueue_scripts', 'ark_register_styles');
/**
 * Enqueues styles.
 */

function ark_register_styles() {

	// Bootstrap
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css', array(), '3.3.6' );

	// Theme javascript plugins
	wp_enqueue_style('jquery.mCustomScrollbar', get_template_directory_uri() . '/assets/plugins/scrollbar/jquery.mCustomScrollbar.css', array(), '3.1.12' );
	wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/assets/owl.carousel.css', array(), '1.3.2' );
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '3.5.1' );
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/plugins/magnific-popup/magnific-popup.css', array(), '1.1.0' );
	wp_enqueue_style('cubeportfolio', get_template_directory_uri() . '/assets/plugins/cubeportfolio/css/cubeportfolio.min.css', array(), '3.8.0' );

	// Icon Fonts
	if ( class_exists('ffContainer') ) {
		ark_wp_enqueue_framework_icon_fonts_styles();
	}else{
		wp_enqueue_style('ark-modified-font-awesome', get_template_directory_uri() . '/no-ff/iconfonts/ff-font-awesome4/ff-font-awesome4.css' );
		wp_enqueue_style('ark-modified-font-et-line', get_template_directory_uri() . '/no-ff/iconfonts/ff-font-et-line/ff-font-et-line.css' );
	}

	// Theme Styles
	wp_enqueue_style('ark-one-page-business', get_template_directory_uri() . '/assets/css/one-page-business.css' );
	wp_enqueue_style('ark-landing', get_template_directory_uri() . '/assets/css/landing.css' );

	// Stylesheet from the PARENT theme
	wp_enqueue_style('ark-style', get_template_directory_uri().'/style.css' );

	// Stylesheet from the CHILD theme
	wp_enqueue_style('ark-style-child', get_stylesheet_directory_uri().'/style.css' );

	if ( class_exists('ffContainer') ) {
		ark_wp_enqueue_theme_google_fonts_styles();
	}else{
		wp_enqueue_style( 'ark-fonts', ark_fonts_url(), array(), null );
		wp_enqueue_style( 'ark-fonts-family', get_template_directory_uri() . '/no-ff/no-ff-fonts.css' );
	}

	if( class_exists('WooCommerce') ) {
		wp_enqueue_style('ark-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css');
	}
	$url = ark_get_custom_color_css_url();
	wp_enqueue_style('ark-colors', $url );

	// TwentyTwenty
	wp_enqueue_style('twentytwenty', get_template_directory_uri() . '/assets/plugins/twentytwenty/css/twentytwenty.css', array() );
}