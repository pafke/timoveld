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
	if (! wp_is_mobile() ) {
		wp_enqueue_style( 'desktop-style',  get_bloginfo('template_directory')."/css/mobile.css" );
	}
	wp_enqueue_style( 'fonts', "http://fonts.googleapis.com/css?family=Raleway:700,800,100,400,200,300" );
	//wp_enqueue_style( 'swipebox-style',  get_bloginfo('template_directory')."/css/swipebox.css" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themes' );

function add_header_data() { ?>
	<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/favicon.ico" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Mijn naam is Timo Veld. Ik maak websites en animaties die je op dit portfolio kunt bekijken. Wil je meer weten? Twijfel dan niet om contact met mij op te nemen!"/>
<?php }
add_action('wp_head', 'add_header_data');

function theme_name_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", '', '', false);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'masonry_include', get_template_directory_uri() . '/js/masonry.min.js', '', '', true);
	wp_enqueue_script( 'scrollDown', get_template_directory_uri() . '/js/scrollDown.js', '', '', true);
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', '', '', true);
	wp_enqueue_script( 'waypoint-scrollTos', get_template_directory_uri() . '/js/waypoint.triggers.js', '', '', true);
	wp_enqueue_script( 'typer-plugin', get_template_directory_uri() . '/js/jquery.typer.js', '', '', true);
	wp_enqueue_script( 'swipebox', get_template_directory_uri() . '/js/jquery.swipebox.min.js', '', '', true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', '', '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

// Custom post type skills toevoegen
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

// Meta box toevoegen met custom waarde 'skill'
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

// Callback die input field genereerd aan de backend
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

// Skill data op custom post type opslaan
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


// Collums aanpassen
function change_columns( $cols ) {
  $cols = array(
    'cb'       => '<input type="checkbox" />',
    'title'       => '',
    'skill_meta' => __( 'Skill level', 'trans' ),
  );
  return $cols;
}
add_filter( "manage_skill_posts_columns", "change_columns" );
// Column skill level tonen bij custom post type skills
function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "skill_meta":
      $refer = get_post_meta( $post_id, 'skill_meta', true);
      echo $refer;
      break;
  }
}
add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

// Quickedit box aanmaken voor skill level
function skill_add_quicksave($column_name, $post_type) {
    if ($column_name != 'skill_meta') return;
    ?>
    <fieldset class="inline-edit-col-left">
    <div class="inline-edit-col">
        <span class="title">Skill level</span>
        <input type="number" name="new_meta_skill" id="new_meta_skill" value="" />
    </div>
    </fieldset>
    <?php
}
add_action('quick_edit_custom_box',  'skill_add_quicksave', 10, 2);

// Save quickedit waarde
function skill_save_quick_edit_data($post_id) {
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
    // to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;
    // Check permissions
    if ( 'skill' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);
    if (isset($_POST['new_meta_skill']) && ($post->post_type != 'revision')) {
        $skill_set_id = esc_attr($_POST['new_meta_skill']);
        if ($skill_set_id)
            update_post_meta( $post_id, 'skill_meta', $skill_set_id);
        else
            delete_post_meta( $post_id, 'skill_meta');
    }
    return $skill_set_id;
}
add_action('save_post', 'skill_save_quick_edit_data');

// Remove automatic class from thumbnails/Emoji support/and wlwmanifest
remove_action( 'begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wlwmanifest_link');

// Remove Yoast comment
add_action('get_header', 'start_ob');
add_action('wp_head', 'end_ob', 999);

function start_ob() {
	ob_start('remove_yoast');
}
function end_ob() {
	ob_end_flush();
}

function remove_yoast($output) {

	if (defined('WPSEO_VERSION')) {

		$targets = array(
			'<!-- This site is optimized with the Yoast WordPress SEO plugin v'.WPSEO_VERSION.' - https://yoast.com/wordpress/plugins/seo/ -->',
			'<!-- / Yoast WordPress SEO plugin. -->',
			'<!-- This site uses the Google Analytics by Yoast plugin v'.GAWP_VERSION.' - https://yoast.com/wordpress/plugins/google-analytics/ -->',
			'<!-- / Google Analytics by Yoast -->'
		);
		
		$output = str_ireplace($targets, '', $output);
		$output = trim($output); 
		$output = preg_replace('/^[ \t]*[\r\n]+/m', '', $output);
	}
	return $output;
}
