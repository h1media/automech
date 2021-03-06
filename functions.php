<?php
/**
 * Functions and definitions
 *
 * @package Alternative
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function alternative_setup() {
	load_theme_textdomain( 'automech' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'automech' ),
		'social'  => __( 'Footer Menu', 'automech' ),
	] );
}

add_action( 'after_setup_theme', 'automech' );


/**
 * Enqueues scripts and styles.
 *
 */
function alternative_scripts() {
	wp_enqueue_style( 'alternative-style', get_stylesheet_uri() );
	wp_enqueue_style( 'alternative-ie', get_template_directory_uri() . '/dist/css/ie.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie', 'conditional', 'lt IE 10' );
	wp_enqueue_style( 'alternative-ie8', get_template_directory_uri() . '/dist/css/ie8.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie8', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'alternative-ie7', get_template_directory_uri() . '/dist/css/ie7.css', array( 'alternative-style' ), '20161017' );
	wp_style_add_data( 'alternative-ie7', 'conditional', 'lt IE 8' );
	wp_enqueue_style( 'alternative-app', get_template_directory_uri() . '/dist/css/app.css', array(), '20161017' );
	wp_enqueue_style( 'alternative-fa', get_template_directory_uri() . '/dist/css/font-awesome.min.css', array(), '20161017' );
	wp_enqueue_script( 'alternative-html5', get_template_directory_uri() . '/dist/js/html5.js', array(), '20161017' );
	wp_script_add_data( 'alternative-html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'alternative-gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCmkQe4eP-IL_YcEh909H6XxHfl3uaRGhk', array( 'jquery' ), '20161017' );
	wp_enqueue_script( 'alternative-app', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), '20161017' );

	wp_localize_script( 'alternative-app', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'alternative_scripts' );

show_admin_bar( false );

function my_acf_google_map_api( $api ) {
	$api['key'] = 'AIzaSyCmkQe4eP-IL_YcEh909H6XxHfl3uaRGhk';

	return $api;
}

add_filter( 'acf/fields/google_map/api', 'my_acf_google_map_api' );


add_theme_support( 'custom-logo' );


function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu'  => __( 'Extra Menu' ),
		)
	);
}

add_action( 'init', 'register_my_menus' );


//settings tab
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
	) );
}
