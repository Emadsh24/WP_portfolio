<?php
// create custom plugin settings menu
add_action('admin_menu', 'brehoh_google_map_menu');

function brehoh_google_map_menu() {

	//create new top-level menu
	add_menu_page('Google Map Setting', 'Google Map Setting', 'administrator', __FILE__, 'brehoh_google_map_page',plugins_url('/map.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_gmap_setting' );
}


function register_gmap_setting() {
	//register our settings
	register_setting( 'google-map-settings-group', 'map_coordinate' );
	register_setting( 'google-map-settings-group', 'map_zoom' );
	register_setting( 'google-map-settings-group', 'map_lightness' );
	register_setting( 'google-map-settings-group', 'map_saturation' );
	register_setting( 'google-map-settings-group', 'map_image' );
	register_setting( 'google-map-settings-group', 'map_marker_image' );
	register_setting( 'google-map-settings-group', 'marker_content' );
	register_setting( 'google-map-settings-group', 'gmap_display' );
	register_setting( 'google-map-settings-group', 'gmap_run' );
}

function brehoh_google_map_page() {
?>
<div class="wrap">
<h2>Google Map Setting</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'google-map-settings-group' ); ?>
    <?php do_settings_sections( 'google-map-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('1. Google Map Latitude and Longitude','brehoh_plg') ?></th>
        <td><input type="text" name="map_coordinate" value="<?php echo get_option('map_coordinate'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php _e('2. Google Map Zoom Value','brehoh_plg') ?></th>
        <td><input type="text" name="map_zoom" value="<?php echo get_option('map_zoom'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e('3. Google Map Lightness Value','brehoh_plg') ?></th>
        <td><input type="text" name="map_lightness" value="<?php echo get_option('map_lightness'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e('4. Google Map Saturation Value','brehoh_plg') ?></th>
        <td><input type="text" name="map_saturation" value="<?php echo get_option('map_saturation'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('5. Google Map Marker Icon','brehoh_plg') ?></th>
        <td>
        <label for="upload_image">
            <input id="map_image" type="text" size="36" name="map_image" value="<?php echo get_option('map_image'); ?>" />
            <input id="upload_image_button" class="button" type="button" value="Upload Image" />
            <br /><?php _e('Enter a URL or upload an image (recommended size 37x37px)','brehoh_plg') ?>
        </label>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('6. Image on Google Map Marker Content','brehoh_plg') ?></th>
        <td>
        <label for="upload_image">
            <input id="map_marker_image" type="text" size="36" name="map_marker_image" value="<?php echo get_option('map_marker_image'); ?>" />
            <input id="upload_image_button2" class="button" type="button" value="Upload Image" />
            <br /><?php _e('Enter a URL or upload an image (recommended max width 400px)','brehoh_plg') ?>
        </label>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><?php _e('7. Google Map Marker Content','brehoh_plg') ?></th>
        <td><textarea id="marker_content" cols="30" rows="5" name="marker_content"><?php echo get_option('marker_content'); ?></textarea></td>
        </tr>
       
        
        
        
    </table>
    
    <?php submit_button(); ?>

</form>
		<h4><?php _e('Explanation:','brehoh_plg') ?></h4>
		<ol>
        	<li><p><?php _e('You can check your latitude and longitude in <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm">here</a>. example value: -6.94010,107.62575 ','brehoh_plg') ?></p></li>
            <li><p><?php _e('Input your zoom level in here. example value: 15','brehoh_plg') ?></p></li>
            <li><p><?php _e('Input your value for map lightness here. example value: 7','brehoh_plg') ?></p></li>
            <li><p><?php _e('Input your value for map saturation here. example value :0 (for making normal map), default map is -100 (monochrome)).','brehoh_plg') ?></p></li>
            <li><p><?php _e('You can upload your icon image there.','brehoh_plg') ?></p></li>
			<li><p><?php _e('You can upload your image for marker content there.','brehoh_plg') ?></p></li>
            <li><p><?php _e('The content will be appear if the marker is clicked. You can use HTML tag there.','brehoh_plg') ?></p></li>
        </ol>
</div>
<?php } 

add_action('admin_enqueue_scripts', 'brehoh_gmap_admin');
 
function brehoh_gmap_admin() {
	if (isset($_GET['page']) && $_GET['page'] == 'brehoh_plugin/inc/google-map.php') {
        wp_enqueue_media();
        wp_enqueue_script('my-admin-js',plugins_url( '/js/gmap.js' , __FILE__ ) , array('jquery'),'', true);
	}
}
function marker_content() { ?> 
        <!--MAP MARKER CONTENT-->
        <div class="hidden map-content">
        	<div class="box-map">
            	<img src="<?php echo get_option('map_marker_image'); ?>" alt="">
                <?php echo wpautop( get_option('marker_content'), true ); ?>
            </div>
        </div>
        <!--MAP MARKER CONTENT END-->

<?php } 

function brehoh_google_map_start() { ?> 


		
			<script type="text/javascript">
			(function ($) {
				'use strict';
				
				//google map load after all page finish
    			$(window).on("load", function() { 
					<?php if  ( get_option('map_image') != '') { ?> var icons = '<?php echo get_option('map_image'); ?>'; 
					<?php } else {?> var icons ='<?php echo plugins_url( '/office-building.png' , __FILE__ ) ?>' <?php }?>
					
					$('#map_canvas').gmap({
						'center': '<?php if  ( get_option('map_coordinate') != '') { echo get_option('map_coordinate');} else { echo "-6.94010,107.62575";} ?>',
						'zoom': <?php if  ( get_option('map_zoom') != '') { echo get_option('map_zoom');} else { echo "15";} ?> ,
						scrollwheel: false,
						'disableDefaultUI': false,
						'styles': [{
							stylers: [{
								lightness: <?php if  ( get_option('map_lightness') != '') { echo get_option('map_lightness');} else { echo "7";} ?>
							}, {
								saturation: <?php if  ( get_option('map_saturation') != '') { echo get_option('map_saturation');} else { echo "-100";} ?>
							}]
						}],
						'callback': function () {
							var self = this;
							
							self.addMarker({
								'position': this.get('map').getCenter(),
								icon: icons,
							}).click(function () {
								self.openInfoWindow({
									<?php $string = get_option('marker_content'); $output = preg_replace('!\s+!m', ' ', $string); ?>
									'content': $('.map-content').html()
								}, this);
							});
			
						}
			
					});
				});
			
				
			
			
			})(jQuery);
			</script>

<?php
}

function g_maps_load_home() {
	if (have_posts()){
		global $post; /* load script only on homepage*/
		if(  is_page_template( 'homepage-slider.php' )|| is_page_template( 'homepage-video.php' )|| is_page_template( 'homepage-youtube.php' ) || is_page_template( 'homepage-custom-layout.php' )
		 || is_singular( 'contact' ))  {
		wp_enqueue_script( 'ui_map',plugins_url( '/js/jquery.ui.map.js' , __FILE__ ),array(),'', 'in_footer');
		wp_enqueue_script( 'gmap','https://maps.google.com/maps/api/js?sensor=true',array(),'', 'in_footer');
		add_action( 'wp_footer', 'brehoh_google_map_start',102 );
		add_action( 'wp_footer', 'marker_content',1 );
		}
	}
} 





function brehoh_gmap() {
	add_action( 'wp_enqueue_scripts', 'g_maps_load_home' );			
}    
add_action( 'init', 'brehoh_gmap' );


