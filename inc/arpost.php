<?php
// Registers the new post type 

function wpt_product_posttype1() {
	register_post_type( 'arpost',
		array(
			'labels' => array(
				'name' => __( 'Arabic Post', 'brehoh_plg' ),
				'singular_name' => __( 'Arabic Post' , 'brehoh_plg'),
				'add_new' => __( 'Add New Arabic Post', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Arabic Post', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Arabic Post', 'brehoh_plg' ),
				'new_item' => __( 'Add New Arabic Post', 'brehoh_plg' ),
				'view_item' => __( 'View Arabic Post', 'brehoh_plg' ),
				'search_items' => __( 'Search Arabic Post', 'brehoh_plg' ),
				'not_found' => __( 'No Arabic Post found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Arabic Post found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' , 'excerpt','post-formats'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "arpost"), // Permalinks format
			'menu_position' => 6,
			'exclude_from_search' => true ,
                        'capability_type' => 'post',
                        'has_archive' => 'true'
            )
	);

}

add_action( 'init', 'wpt_product_posttype1' );

//add taxonomies Arabic Post category)
function aslina_taxonomies_product1() {
	$labels = array(
		'name'              => _x( 'Arabic Post Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Arabic Post Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Arabic Post Categories' ),
		'all_items'         => __( 'All Arabic Post Categories' ),
		'parent_item'       => __( 'Parent Arabic Post Category' ),
		'parent_item_colon' => __( 'Parent Arabic Post Category:' ),
		'edit_item'         => __( 'Edit Arabic Post Category' ), 
		'update_item'       => __( 'Update Arabic Post Category' ),
		'add_new_item'      => __( 'Add New Arabic Post Category' ),
		'new_item_name'     => __( 'New Arabic Post Category' ),
		'menu_name'         => __( 'Arabic Post Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'arpost_category', 'arpost', $args );
}
add_action( 'init', 'aslina_taxonomies_product1', 0 );

//create two taxonomies, genres and tags for the post type "tag"
add_action( 'init', 'create_tag_taxonomies', 0 );
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag','arpost',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}