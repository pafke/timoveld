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
	wp_enqueue_style( 'prettyphoto',  get_bloginfo('template_directory')."/prettyPhoto.css" );

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
	wp_enqueue_script( 'typer-plugin', get_template_directory_uri() . '/js/jquery.typer.js', '', '', true);
	wp_enqueue_script( 'pretty-photo', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', '', '', true);

}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function add_skills_post() {
  register_post_type( 'skill',
    array(
      'labels' => array(
        'name' => __( 'Skills' ),
        'singular_name' => __( 'Skill' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'add_skills_post' );

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function skill_meta_box() {

	$screens = array( 'skill' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'skill_id',
			__( 'Skill level', 'skill_textdomain' ),
			'skill_meta_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'skill_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function skill_meta_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'skill_meta_box', 'skill_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'skill_meta', true );

	echo '<label for="skill_field">';
	_e( 'Niveau van skill' );
	echo '</label> ';
	echo '<input type="number" id="skill_field" name="skill_field" value="' . esc_attr( $value ) . '" size="15" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function save_skill_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['skill_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['skill_meta_box_nonce'], 'skill_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['skill_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['skill_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'skill_meta', $my_data );
}
add_action( 'save_post', 'save_skill_data' );



// Change the columns for the edit CPT screen
function change_columns( $cols ) {
  $cols = array(
    'cb'       => '<input type="checkbox" />',
    'title'       => '',
    'skill_meta' => __( 'Skill_meta', 'trans' ),
  );
  return $cols;
}
add_filter( "manage_skill_posts_columns", "change_columns" );

function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "skill_meta":
      $refer = get_post_meta( $post_id, 'skill_meta', true);
      echo '<a href="' . $refer . '">' . $refer. '</a>';
      break;
  }
}
add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );



