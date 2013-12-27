<?php
/*
Plugin Name: PPM Lightbox
Plugin URI: http://perfectpointmarketing.com/plugins/ppm-lightbox
Description: This plugin will enable lightbox in wordpress
Author: Perfect Point Marketing
Author URI: http://perfectpointmarketing.com
Version: 1.0
*/


/*Some Set-up*/
define('PPM_LB_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );


/* Adding Latest jQuery from Wordpress */
function ppm_lightbox_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'ppm_lightbox_latest_jquery');

/* Adding plugin javascript active file */
wp_enqueue_script('ppm-lb-plugin-active', PPM_LB_PLUGIN_PATH.'js/jquery.prettyPhoto.js', array('jquery'));
/* Adding plugin javascript active file */
wp_enqueue_script('ppm-lb-plugin-script-active', PPM_LB_PLUGIN_PATH.'js/ppm-lb-active.js', array('jquery'));

/* Adding Plugin custm CSS file */
wp_enqueue_style('ppm-lb-plugin-style', PPM_LB_PLUGIN_PATH.'css/prettyPhoto.css');
?>