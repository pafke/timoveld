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

add_image_size( 'portfolio-small', 500, 500, true );

function folder_scripts() {
	wp_enqueue_style( 'folder-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'fonts', "http://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,300,700" );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'folder_scripts' );
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

if (!is_admin()) add_action("wp_enqueue_scripts", "enque_fliptext", 11);
function enque_fliptext() {
   wp_register_script('fliptext', get_bloginfo(template_directory)."/js/jquery.flipping_text.min.js", false, null);
   wp_enqueue_script('fliptext');
   wp_register_script('jqUI', get_bloginfo(template_directory)."/js/jquery-ui-1.10.4.custom.min.js", false, null);
   wp_enqueue_script('jqUI');   
}

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
}

/**/