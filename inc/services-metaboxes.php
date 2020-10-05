<?php
/**
 * Initialize the services Post Meta Boxes. 
 */
add_action( 'admin_init', 'services_mb' );
function services_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $services_mb = array(
    'id'          => 'services_meta_box',
    'title'       => __( 'Services Setting', 'brehoh_plg' ),
    'desc'        => '',
    'pages'       => array( 'services' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Services Icon', 'brehoh_plg' ),
        'id'          => 'sv_icon',
        'type'        => 'text',
        'desc'        => __( 'Input services icon here.  You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. <br/>eg. fa-paw', 'brehoh_plg' )
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $services_mb );

}