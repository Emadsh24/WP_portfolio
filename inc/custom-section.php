<?php
// Registers the new post type 

function csection_posttype() {
	register_post_type( 'custom-section',
		array(
			'labels' => array(
				'name' => __( 'Custom Section', 'brehoh_plg' ),
				'singular_name' => __( 'Custom Section' , 'brehoh_plg'),
				'add_new' => __( 'Add New Custom Section', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Custom Section', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Custom Section', 'brehoh_plg' ),
				'new_item' => __( 'Add New Custom Section', 'brehoh_plg' ),
				'view_item' => __( 'View Custom Section', 'brehoh_plg' ),
				'search_items' => __( 'Search Custom Section', 'brehoh_plg' ),
				'not_found' => __( 'No Custom Section found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Custom Section found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "custom-section"), // Permalinks format
			'menu_position' => 5,
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'csection_posttype' );


