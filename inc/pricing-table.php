<?php
// Registers the new post type 

function aslina_pricingtable_posttype() {
	register_post_type( 'pricing-table',
		array(
			'labels' => array(
				'name' => __( 'Pricing Table', 'brehoh_plg' ),
				'singular_name' => __( 'Pricing Table' , 'brehoh_plg'),
				'add_new' => __( 'Add New Pricing Table', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Pricing Table', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Pricing Table', 'brehoh_plg' ),
				'new_item' => __( 'Add New Pricing Table', 'brehoh_plg' ),
				'view_item' => __( 'View Pricing Table', 'brehoh_plg' ),
				'search_items' => __( 'Search Pricing Table', 'brehoh_plg' ),
				'not_found' => __( 'No Pricing Table found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Pricing Table found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "pricing-table"), // Permalinks format
			'menu_position' => 5,
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'aslina_pricingtable_posttype' );


