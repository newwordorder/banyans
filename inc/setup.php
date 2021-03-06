<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'understrap_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary', 'understrap' ),
			'header-social' => __( 'Header social', 'understrap' ),
			'header-contact' => __( 'Header contact', 'understrap' ),
			'footer-corporate' => __( 'Footer corporate', 'understrap' ),
			'footer-help' => __( 'Footer help', 'understrap' ),
			'footer-contact' => __( 'Footer contact', 'understrap' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( '600x400', 600, 400, array( 'center', 'center' ) );
		add_image_size( '400x600', 400, 600, array( 'center', 'center' ) );
		add_image_size( '600x600', 600, 600, array( 'center', 'center' ) );

		add_filter( 'image_size_names_choose', 'my_custom_sizes' );

		function my_custom_sizes( $sizes ) {
		    return array_merge( $sizes, array(
		        '600x400' => __( '600x400' ),
				'400x600' => __( '400x600' ),
				'600x600' => __( '600x600' ),
		    ) );
		}

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();

	}
endif; // understrap_setup.
add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		return '';
	}
}
add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {

		return $post_excerpt . ' ...';
	}
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
