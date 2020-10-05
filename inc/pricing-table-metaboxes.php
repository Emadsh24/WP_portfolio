<?php
/**
 * Initialize the services Post Meta Boxes. 
 */
add_action( 'admin_init', 'pricingtable_mb' );
function pricingtable_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $pricingtable_mb = array(
    'id'          => 'pricing_metabox',
    'title'       => __( 'Pricing Table Setting', 'brehoh_plg' ),
    'desc'        => '',
    'pages'       => array( 'pricing-table' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(

      array(
        'label'       => __( 'Pricing Table Icon', 'brehoh_plg' ),
        'id'          => 'pt_icon',
        'type'        => 'text',
        'desc'        => __( 'Input your Pricing Table icon here. <br/> You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. eg. fa-bug', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Pricing Table Title/Price', 'brehoh_plg' ),
        'id'          => 'pt_price',
        'type'        => 'text',
        'desc'        => __( 'Input pricing table price here. eg. $50', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Pricing Table Small Title', 'brehoh_plg' ),
        'id'          => 'pt_stitle',
        'type'        => 'text',
        'desc'        => __( 'Input pricing table small title here(below the price). eg. per month', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Pricing Table Button Text', 'brehoh_plg' ),
        'id'          => 'pt_btn_text',
        'type'        => 'text',
        'desc'        => __( 'Input pricing table button text here.', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Pricing Table Button Link', 'brehoh_plg' ),
        'id'          => 'pt_btn_link',
        'type'        => 'text',
        'desc'        => __( 'Input pricing table button link here.', 'brehoh_plg' )
      ),
	  
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $pricingtable_mb );

}