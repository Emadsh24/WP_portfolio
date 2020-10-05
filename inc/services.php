<?php
// Registers the new post type 

function aslina_services_posttype() {
	register_post_type( 'services',
		array(
			'labels' => array(
				'name' => __( 'Services Posts', 'brehoh_plg' ),
				'singular_name' => __( 'Services Post' , 'brehoh_plg'),
				'add_new' => __( 'Add New Services Post', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Services Post', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Services Post', 'brehoh_plg' ),
				'new_item' => __( 'Add New Services Post', 'brehoh_plg' ),
				'view_item' => __( 'View Services Post', 'brehoh_plg' ),
				'search_items' => __( 'Search Services Posts', 'brehoh_plg' ),
				'not_found' => __( 'No Services Post found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Services Post found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "services"), // Permalinks format
			'menu_position' => 5,
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'aslina_services_posttype' );


