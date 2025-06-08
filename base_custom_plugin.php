<?php
/*
	Plugin Name: [Plugin Name]
	Creation Date: DD/MM/YYYY
	Author: [Plugin Author]
	Description: This is a plugin designed to [Do Something] for the [Domain Name] website.
	Version: 1.1
	
	Last Updated: [Current Date - DD/MM/YYYY]
	Updated By: [Update Author]
*/
   
	$plugin_content = "Plugin could not be loaded properly";

	function base_custom_install() {
		
	};
	
	function base_custom_deactivate() {
		
	};

	function base_custom_load_files() {
		wp_register_script( 'base_custom_jquery', plugins_url('/js/base_custom.js', __FILE__), array('jquery'));
		
		wp_enqueue_script( 'base_custom_jquery' );
		
		
		wp_register_style( 'base_custom_css', plugins_url('/css/base_custom.css', __FILE__));
		
		wp_enqueue_style( 'base_custom_css' );
		
	};
	
	// Activation/Deactivation Hooks
	register_activation_hook( __FILE__, 'base_custom_install' );
	
	add_action('wp_enqueue_scripts', 'base_custom_load_files');	
?>