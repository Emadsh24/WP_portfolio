<?php
/**
 * Initialize the Team Post Meta Boxes. 
 */
add_action( 'admin_init', 'team_mb' );
function team_mb() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $teamp_mb = array(
    'id'          => 'team_meta_box',
    'title'       => __( 'Team Post Setting', 'brehoh_plg' ),
    'desc'        => '',
    'pages'       => array( 'team-post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
	  array(
        'label'       => __( 'Team Detail', 'brehoh_plg' ),
        'id'          => 'gs_team',
        'type'        => 'tab'
      ),
	  array(
        'id'          => 'team_cp',
        'label'        => __( 'Recommended size for team/featured image is 1200x800px', 'brehoh_plg' ),
		'desc'        => __( 'You can leave the post content blank. The post content only appear on single post.', 'brehoh_plg' ),
        'std'         => '',
        'type'        => 'textblock-titled',
      ),
	  array(
        'label'       => __( 'Team Thumbnail Image', 'brehoh_plg' ),
        'id'          => 'tp_thumb',
        'type'        => 'upload',
        'desc'        => __( 'Upload your thumbnail image here. Recommended size for thumbnail image is 600x600px', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Team Icon', 'brehoh_plg' ),
        'id'          => 'tp_icon',
        'type'        => 'text',
        'desc'        => __( 'Input your team icon here. <br/> You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. eg. fa-github.', 'brehoh_plg' )
      ),
      array(
        'label'       => __( 'Team Position', 'brehoh_plg' ),
        'id'          => 'tp_post',
        'type'        => 'text',
        'desc'        => __( 'Input team position here.', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Team Social Icon', 'brehoh_plg' ),
        'id'          => 'tp_social-icon',
        'type'        => 'tab'
      ),
	   array(
        'label'       => __( 'Facebook link', 'brehoh_plg' ),
        'id'          => 'fb_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Facebook', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Twitter link', 'brehoh_plg' ),
        'id'          => 'twit_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Twitter', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Pinterest link', 'brehoh_plg' ),
        'id'          => 'pinterest_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Pintereset', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Google Plus link', 'brehoh_plg' ),
        'id'          => 'gp_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Google Plus', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Instagram link', 'brehoh_plg' ),
        'id'          => 'instagram_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Instagram', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Xing link', 'brehoh_plg' ),
        'id'          => 'xing_si',
        'type'        => 'text',
        'desc'        => __( 'Input link for Xing', 'brehoh_plg' )
      ),
	  array(
        'label'       => __( 'Another Social icon list', 'brehoh_plg' ),
        'id'          => 'another_si',
        'type'        => 'list-item',
        'desc'        => __( 'Create another social icon list here.', 'brehoh_plg' ),
		'settings'    => array( 
          array(
            'id'          => 'si_icon',
            'label'       => __( 'Social Icon', 'xovlox' ),
            'desc'        => __( 'Input your social icon here. <br/> You can check <a href="http://fontawesome.io/icons/" target="_blank">Here</a> for icon list. eg. fa-github', 'brehoh_plg' ),
            'type'        => 'text',
          ),
		  array(
            'id'          => 'si_icon_link',
            'label'       => __( 'Social Icon Link', 'xovlox' ),
            'desc'        => __( 'Input your social icon link here.', 'brehoh_plg' ),
            'type'        => 'text',
          ),
		)
      ),
	  array(
        'label'       => __( 'Email link', 'brehoh_plg' ),
        'id'          => 'email_si',
        'type'        => 'text',
        'desc'        => __( 'Input email here(email address only,without mailto:)', 'brehoh_plg' )
      ),
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $teamp_mb );

}