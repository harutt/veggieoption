<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.css');
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $css_version );

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/voption.css');
		wp_enqueue_style( 'voption-styles', get_stylesheet_directory_uri() . '/css/voption.css', array(), $css_version );

		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/fonts/CircularStd.css');
		wp_enqueue_style( 'voption-fonts', get_stylesheet_directory_uri() . '/fonts/CircularStd.css', array(), $css_version );


		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/owl.carousel.css');
		wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.css', array(), $css_version );
		wp_enqueue_style( 'owl-theme', get_stylesheet_directory_uri() . '/css/owl.theme.default.css', array(), false );


		wp_enqueue_script( 'jquery');
		
		$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.js');
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_script( 'owl-scripts', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), NULL, false );
		wp_enqueue_script( 'owl-scripts' );

		wp_register_script( 'voption-scripts', get_template_directory_uri() . '/js/voption.js', array(), NULL, false );
		wp_enqueue_script( 'voption-scripts' );
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );