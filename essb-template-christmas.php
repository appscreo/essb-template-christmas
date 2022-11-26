<?php

/**
 * Plugin Name: Easy Social Share Buttons for WordPress Add-on - Christmas Templates
 * Description: Activate usage of special holiday Christmas template
 * Plugin URI: https://socialsharingplugin.com
 * Version: 2.0
 * Author: Easy Social Share Buttons Team
 * Author URI: https://socialsharingplugin.com
 */

define('ESSB_TEMPLATEPACK_CHRISTMAS', '2.0');

add_filter('essb4_templates', 'essb_template_christmas_initialize');
add_filter('essb4_templates_class', 'essb_template_christmas_class', 10, 2);
add_action('plugins_loaded', 'essb_template_christmas_styles', 999);
add_action ('admin_enqueue_scripts', 'essb_template_christmas_styles_admin', 999 );

add_filter('essb_share_button_styles_network_icon_classes', 'essb_share_button_styles_network_icon_classes_christmas', 10, 3);
function essb_share_button_styles_network_icon_classes_christmas($template_id, $network_id, $classes) {
    
    if ($template_id == 901 || $template_id == 902) {
        $classes[] = 'essb-s-bg-' . $network_id;
        $classes[] = 'essb-s-c-light';
        $classes[] = 'essb-s-ch-light';
        $classes[] = 'essb-s-bg-network';
    }
    
    return $classes;
}

function essb_template_christmas_initialize($templates) {
	$templates['901'] = 'Christmas Baubles (Retina)';
	$templates['902'] = 'Christmas Presents (Retina)';
	
	return $templates;
}

function essb_template_christmas_class($folder, $template_id) {
	if ($template_id == '901') {
		$folder = 'christmas-retina';
	}
	if ($template_id == '902') {
		$folder = 'christmas-retina essb_template_christmas-presents-retina';
	}
	
	return $folder;
}

function essb_template_christmas_styles() {
	
	if (function_exists('essb_resource_builder')) {
		essb_resource_builder()->add_static_resource(plugins_url () . '/' . basename ( dirname ( __FILE__ ) ) . '/assets/essb-template.css', 'essb-template-pack-christmas', 'css');
	}
	
}

function essb_template_christmas_styles_admin() {
	wp_register_style ( 'essb-admin3-style-christmas', plugins_url () . '/' . basename ( dirname ( __FILE__ ) ) . '/assets/essb-template.css', array (), '1.0' );
	wp_enqueue_style ( 'essb-admin3-style-christmas' );
}