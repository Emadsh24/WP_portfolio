<?php
/**
 * Initialize the arPost Post Meta Boxes. 
 */
add_action( 'admin_init', 'arPost_mb' );
function arPost_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $arPost_mb = array(
    'id'          => 'arPost_meta_box',
    'title'       => __( 'arPost Setting', 'brehoh_plg' ),
    'desc'        => '',
    'pages'       => array( 'arPost' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(

      array(
        'label'       => __( 'arPost Format Setting', 'brehoh_plg' ),
        'id'          => 'arPost_format',
        'type'        => 'tab',
      ),
	  array(
        'label'       => __( 'Choose arPost Format Here', 'brehoh_plg' ),
        'id'          => 'port_format',
        'type'        => 'select',
		'std'		 => 'port_standard',
		'choices'     => array( 
			  array(
                'value'       => 'port_standard',
                'label'       => __( 'arPost Standard', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'port_gallery',
                'label'       => __( 'arPost Gallery', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'port_slider',
                'label'       => __( 'arPost Slider', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'port_video',
                'label'       => __( 'arPost Video', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'port_audio',
                'label'       => __( 'arPost Audio', 'brehoh_plg' )
              ),
		)
      ),
	  
	  array(
        'label'       => __( 'Big Image Setting', 'brehoh_plg' ),
        'id'          => 'port_image_setting',
        'type'        => 'upload',
        'desc'        => __( 'Upload your image here. Leave it blank if you want to used featured image.', 'brehoh_plg' ),
        'condition'   => 'port_format:is(port_standard)'
      ),
	  array(
        'label'       => __( 'Gallery Setting', 'brehoh_plg' ),
        'id'          => 'port_gallery_setting',
        'type'        => 'gallery',
        'desc'        => __( 'Create your arPost gallery here. <br/>Try to use same ratio for each image.', 'brehoh_plg' ),
        'condition'   => 'port_format:is(port_gallery)'
      ),
	  array(
        'label'       => __( 'Slider Setting', 'brehoh_plg' ),
        'id'          => 'port_slider_setting',
        'type'        => 'gallery',
        'desc'        => __( 'Create your arPost Slider here.', 'brehoh_plg' ),
        'condition'   => 'port_format:is(port_slider)'
      ),
	  array(
        'label'       => __( 'Video Setting', 'brehoh_plg' ),
        'id'          => 'port_video_setting',
        'type'        => 'text',
        'desc'        => __( 'Insert the link for video embed here.<br/> For video from youtube/vimeo just put the link without any attribute like ?wmode=opaque.<br/>eg: http://www.youtube.com/embed/nAuo7KEQHT4 or http://player.vimeo.com/video/64078587', 'brehoh_plg' ),
        'condition'   => 'port_format:is(port_video)'
      ),
	   array(
        'label'       => __( 'Audio Setting', 'brehoh_plg' ),
        'id'          => 'port_audio_setting',
        'type'        => 'textarea',
		'rows'        => '3',
        'desc'        => __( 'Insert your iframe/embedded code for audio here.<br/>
		You can input iframe/embed code from youtube/vimeo here too, if you don\'t like the default style of arPost video.', 'brehoh_plg' ),
        'condition'   => 'port_format:is(port_audio)'
      ),
	  array(
        'label'       => __( 'arPost Icon', 'brehoh_plg' ),
        'id'          => 'port_icon',
        'type'        => 'text',
        'desc'        => __( 'Input arPost icon here.  You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. <br/>eg. fa-paw', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'arPost Detail Setting', 'brehoh_plg' ),
        'id'          => 'port_detail_tab',
        'type'        => 'tab',
      ),
	  array(
        'label'       => __( 'arPost Client', 'brehoh_plg' ),
        'id'          => 'port_client',
        'type'        => 'text',
        'desc'        => __( 'Insert your arPost client here.', 'brehoh_plg' ),
      ),
	  array(
        'label'       => __( 'arPost Date', 'brehoh_plg' ),
        'id'          => 'port_date',
        'type'        => 'text',
        'desc'        => __( 'Insert your arPost date here.', 'brehoh_plg' ),
      ),
	  array(
        'label'       => __( 'arPost Button Link', 'brehoh_plg' ),
        'id'          => 'port_item_btn_link',
        'type'        => 'text',
        'desc'        => __( 'Insert your button link here. Leave it blank if you dont want it.', 'brehoh_plg' ),
      ),
	  array(
        'label'       => __( 'arPost Button Text', 'brehoh_plg' ),
        'id'          => 'port_item_btn_text',
        'type'        => 'text',
        'desc'        => __( 'Insert your button text here. Leave it blank if you dont want it.', 'brehoh_plg' ),
      ),
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $arPost_mb );

}

