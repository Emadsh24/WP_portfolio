<?php// Register Custom Post Type arbicPost
// Post Type Key: arbicpost
function create_arbicpost_cpt() {

	$labels = array(
		'name' => __( 'arabicPosts', 'Post Type General Name', 'ar-post' ),
		'singular_name' => __( 'arbicPost', 'Post Type Singular Name', 'ar-post' ),
		'menu_name' => __( 'arabicPosts', 'ar-post' ),
		'name_admin_bar' => __( 'arbicPost', 'ar-post' ),
		'archives' => __( 'arbicPost Archives', 'ar-post' ),
		'attributes' => __( 'arbicPost Attributes', 'ar-post' ),
		'parent_item_colon' => __( 'Parent arbicPost:', 'ar-post' ),
		'all_items' => __( 'All arabicPosts', 'ar-post' ),
		'add_new_item' => __( 'Add New arbicPost', 'ar-post' ),
		'add_new' => __( 'Add New', 'ar-post' ),
		'new_item' => __( 'New arbicPost', 'ar-post' ),
		'edit_item' => __( 'Edit arbicPost', 'ar-post' ),
		'update_item' => __( 'Update arbicPost', 'ar-post' ),
		'view_item' => __( 'View arbicPost', 'ar-post' ),
		'view_items' => __( 'View arabicPosts', 'ar-post' ),
		'search_items' => __( 'Search arbicPost', 'ar-post' ),
		'not_found' => __( 'Not found', 'ar-post' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'ar-post' ),
		'featured_image' => __( 'Featured Image', 'ar-post' ),
		'set_featured_image' => __( 'Set featured image', 'ar-post' ),
		'remove_featured_image' => __( 'Remove featured image', 'ar-post' ),
		'use_featured_image' => __( 'Use as featured image', 'ar-post' ),
		'insert_into_item' => __( 'Insert into arbicPost', 'ar-post' ),
		'uploaded_to_this_item' => __( 'Uploaded to this arbicPost', 'ar-post' ),
		'items_list' => __( 'arabicPosts list', 'ar-post' ),
		'items_list_navigation' => __( 'arabicPosts list navigation', 'ar-post' ),
		'filter_items_list' => __( 'Filter arabicPosts list', 'ar-post' ),
	);
	$args = array(
		'label' => __( 'arbicPost', 'ar-post' ),
		'description' => __( '', 'ar-post' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'post-formats', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'arbicpost', $args );

}
add_action( 'init', 'create_arbicpost_cpt', 0 );