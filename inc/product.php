<?php
// Registers the new post type 

function wpt_product_posttype() {
	register_post_type( 'product',
		array(
			'labels' => array(
				'name' => __( 'Product', 'brehoh_plg' ),
				'singular_name' => __( 'Product' , 'brehoh_plg'),
				'add_new' => __( 'Add New Product', 'brehoh_plg' ),
				'add_new_item' => __( 'Add New Product', 'brehoh_plg' ),
				'edit_item' => __( 'Edit Product', 'brehoh_plg' ),
				'new_item' => __( 'Add New Product', 'brehoh_plg' ),
				'view_item' => __( 'View Product', 'brehoh_plg' ),
				'search_items' => __( 'Search Product', 'brehoh_plg' ),
				'not_found' => __( 'No Product found', 'brehoh_plg' ),
				'not_found_in_trash' => __( 'No Product found in trash', 'brehoh_plg' )
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments' , 'excerpt'),
			'capability_type' => 'post',
			'rewrite' => array("slug" => "product"), // Permalinks format
			'menu_position' => 7,
			'exclude_from_search' => true 
		)
	);

}

add_action( 'init', 'wpt_product_posttype' );

//add taxonomies Product category)
function aslina_taxonomies_product() {
	$labels = array(
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ), 
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Product Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'aslina_taxonomies_product', 0 );

// Add Meta Box Info
class productinfoMetabox {
	private $screen = array(
		'product',
	);
	private $meta_fields = array(
		array(
			'label' => 'livePreview',
			'id' => 'livepreview_24686',
			'type' => 'url',
                        'default' => '#',
		),
		array(
			'label' => 'gallery',
			'id' => 'gallery_81274',
			'type' => 'media',
                        'default' => 'http://via.placeholder.com/550x290.jpg',
		),
		array(
			'label' => 'viewpresention ',
			'id' => 'viewpresention_75213',
			'type' => 'url',
                        'default' => '#',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'productinfo',
				__( 'ProductInfo', 'product' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'advanced',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'productinfo_data', 'productinfo_nonce' );
		echo 'more option of project';
		$this->field_generator( $post );
	}
	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.productinfo-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
                            
				case 'media':
					$input = sprintf(
						'<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button productinfo-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value,
						$meta_field['id'],
						$meta_field['id']
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['productinfo_nonce'] ) )
			return $post_id;
		$nonce = $_POST['productinfo_nonce'];
		if ( !wp_verify_nonce( $nonce, 'productinfo_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('productinfoMetabox')) {
	new productinfoMetabox;
};