<?php 
	// Hide admin bar
	show_admin_bar(true);

	// Tell WP Super Cache & W3 Total Cache to not cache WPReadable requests
	define( 'DONOTCACHEPAGE', true );

	// Add featured image functionality
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	}

	// Image caption
	function the_post_thumbnail_caption() {
	  global $post;

	  $thumbnail_id    = get_post_thumbnail_id($post->ID);
	  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

	  if ($thumbnail_image && isset($thumbnail_image[0])) {
	    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
	  }
	}

	// Imprisoned journalist custom content 
	function imprisoned_journalist() {
	  $args = array();
	  register_post_type( 'product', $args ); 
	}
	add_action( 'init', 'imprisoned_journalist' );

	function imprisoned_journalist_options() {
	  $labels = array(
	    'name'               => _x( 'Imprisoned Journalists', 'post type general name' ),
	    'singular_name'      => _x( 'Imprisoned Journalist', 'post type singular name' ),
	    'add_new'            => _x( 'Add New', 'book' ),
	    'add_new_item'       => __( 'Add New Journalist' ),
	    'edit_item'          => __( 'Edit Journalist' ),
	    'new_item'           => __( 'New Journalist' ),
	    'all_items'          => __( 'All Journalists' ),
	    'view_item'          => __( 'View Journalist' ),
	    'search_items'       => __( 'Search Journalists' ),
	    'not_found'          => __( 'No journalists found' ),
	    'not_found_in_trash' => __( 'No entries found in the Trash' ), 
	    'parent_item_colon'  => '',
	    'menu_name'          => 'Imprisoned Journalists'
	  );
	  $args = array(
	    'labels'        => $labels,
	    'description'   => 'Imprisoned journalists',
	    'public'        => true,
	    'menu_position' => 5,
	    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
	    'has_archive'   => true,
	  );
	  register_post_type( 'product', $args ); 
	}
	add_action( 'init', 'imprisoned_journalist_options' );
?>
