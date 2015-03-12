<?php


function enque_files() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.1.8.3.min.js', array(), '1.0.0', false );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', false );
	wp_enqueue_script( 'tofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed.js', array(), '1.0.0', false );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '1.0.0', false );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array(), '1.0.0', false );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array(), '1.0.0', false );
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array(), '1.0.0', false );
}

add_action( 'wp_enqueue_scripts', 'enque_files' );
