<?php 
	// Turn on debugging
	define( 'WP_DEBUG', true );

	// Flush cache
	wp_cache_flush();	

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
	  register_post_type( 'journalists', $args ); 
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
	  register_post_type( 'journalists', $args ); 
	  flush_rewrite_rules();
	}
	add_action( 'init', 'imprisoned_journalist_options' );

	// Number of days journalist has been imprisoned
	function days_in_jail() {
		$now = time();
	    $date = get_field("date_imprisoned");
	    $date = join('-', str_split($date, 4));
	    $date = join('-', str_split($date, 7));
	    $date = strtotime($date);
	    $datediff = $now - $date;
	    $datediff = floor($datediff/(60*60*24));
	    $datediff = number_format($datediff);
	    echo $datediff; 
	}

	// Add support links to admin menu
	add_action('admin_bar_menu', 'support_links', 999);

	function support_links($wp_admin_bar) {
		$args = array(
			'id'    => 'support_links',
			'title' => 'Support Links',
			'href'  => '/Press-Freedom/wp-admin/post.php?post=30&action=edit',
			'meta'  => array('class' => 'support-links')
		);
		$wp_admin_bar->add_node($args);
	}

	// Add related links to admin menu
	add_action('admin_bar_menu', 'related_links', 999);

	function related_links($wp_admin_bar) {
		$args = array(
			'id'    => 'related_links',
			'title' => 'Related Links',
			'href'  => '/Press-Freedom/wp-admin/post.php?post=38&action=edit',
			'meta'  => array('class' => 'related-links')
		);
		$wp_admin_bar->add_node($args);
	}

	// Add read more to post excerpt
	function new_excerpt_more($more) {
	    global $post;
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">...</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

?>
