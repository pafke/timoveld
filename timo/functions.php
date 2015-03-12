<?php
/**
 * folder functions and definitions
 *
 * @package folder
 */

/**
 * Enqueue scripts and styles.
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'portfolio-small', 400, 300, true );

function themes() {
	wp_enqueue_style( 'folder-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'fonts', "http://fonts.googleapis.com/css?family=Raleway:700,800,100,400,200,300" );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themes' );

function theme_name_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
	wp_enqueue_script('jquery');	
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', '', '', false);
	
	wp_enqueue_script( 'scrollDown', get_template_directory_uri() . '/js/scrollDown.js', '', '', true);
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', '', '', true);
	wp_enqueue_script( 'waypoint-triggers', get_template_directory_uri() . '/js/waypoint.triggers.js', '', '', true);
	
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );