<?php
// Registers the new post type 

function wpt_team_posttype() {
	register_post_type( 'team-post',
		array(
			'labels' => array(
				'name' => __( 'Team Posts', 'brehoh_plg' ),
				'singular_name' => __( 'Team Post' , 'brehoh_plg'),
				'add_new' => __( 'Add New Team Post', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Team Post', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Team Post', 'brehoh_plg' ),
				'new_item' => __( 'Add New Team Post', 'brehoh_plg' ),
				'view_item' => __( 'View Team Post', 'brehoh_plg' ),
				'search_items' => __( 'Search Team Posts', 'brehoh_plg' ),
				'not_found' => __( 'No Team Post found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Team Post found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail','excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "team-post"), // Permalinks format
			'menu_position' => 5,
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'wpt_team_posttype' );


