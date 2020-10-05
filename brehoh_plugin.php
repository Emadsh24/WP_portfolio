<?php
/**
 * Plugin Name: Portfoilio 
 * Plugin URI: http://emadsh24.ru
 * Description: This is plugin bundle for <strong>Gallery WordPress Theme</strong>.
 * Author: Emad Shtay
 * Author URI: http://emadsh24.ru
 * Version: 1
 */



//CUSTOM POST TYPE SETTING
//include team custom post type  & metaboxes
//include('inc/team.php');
//include('inc/team-metaboxes.php');
//include portfolio custom post type  & metaboxes
include('inc/portfolio.php');
//include('inc/portfolio-ar.php');
include('inc/product.php');
include('inc/portfolio-metaboxes.php');
include('inc/arpost.php');

//include services custom post type  & metaboxes
//include('inc/services.php');
//include('inc/services-metaboxes.php');
//include pricing table custom post type  & metaboxes
//include('inc/pricing-table.php');
//include('inc/pricing-table-metaboxes.php');
//include contact custom post type  
//include('inc/contact.php');
//include custom section post type & metaboxes  
//include('inc/custom-section.php');
//include('inc/customsection-metaboxes.php');
//include google map
//include('inc/google-map.php');

//plugin translation
function custom_plugin_setup() {
    load_plugin_textdomain('brehoh_plg', false, dirname(plugin_basename(__FILE__)) . '/lang/');
} // end custom_theme_setup
add_action('after_setup_theme', 'custom_plugin_setup');
