<?php
/**
 * Initialize the Custom Section Post Meta Boxes. 
 */
add_action( 'admin_init', 'customsection_mb' );
function customsection_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $csection_mb = array(
    'id'          => 'customsection_meta_box',
    'title'       => __( 'Post Setting', 'brehoh_plg' ),
    'desc'        => '',
    'pages'       => array( 'custom-section' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(

      array(
        'label'       => __( 'Choose Custom Section Format Here', 'brehoh_plg' ),
        'id'          => 'cs_format',
        'type'        => 'select',
		'std'		 => 'cs_black',
		'choices'     => array( 
			  array(
                'value'       => 'cs_white',
                'label'       => __( 'White Background Section', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'cs_gray',
                'label'       => __( 'Gray Background Section', 'brehoh_plg' )
              ),
			  array(
                'value'       => 'cs_para',
                'label'       => __( 'Parallax Section', 'brehoh_plg' )
              ),
		)
      ),
	  array(
        'label'       => __( 'Parallax Detail', 'brehoh_plg' ),
        'id'          => 'cs_p_text',
        'type'        => 'textblock-titled',
        'desc'        => __( '<b>Title of post</b> will be parallax <b>subtitle</b>.<br/> <b>Post content</b> will be parallax <b>text</b>.<br/><b>Featured Image</b> will be parallax <b>background image</b>.', 'brehoh_plg' ),
        'condition'   => 'cs_format:is(cs_para)'
      ),
	  array(
        'label'       => __( 'Section Icon', 'brehoh_plg' ),
        'id'          => 'cs_p_icon',
        'type'        => 'text',
        'desc'        => __( 'Input your section icon here. <br/> You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. eg. fa-quote-left', 'brehoh_plg' ),
        'condition'   => ''
      ),
	  array(
        'label'       => __( 'Section Subtitle', 'brehoh_plg' ),
        'id'          => 'cs_open_text',
        'type'        => 'textarea-simple',
		'rows'		 => '3',
        'desc'        => __( 'Insert section subtitle text here.', 'brehoh_plg' ),
        'condition'   => 'cs_format:not(cs_para)'
      ),
	  
	  
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $csection_mb );

}