<?php

	// if uninstall.php is not called by WordPress, die
	if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
		die;
	}

	$option_name = 'wp_base_custom_option';

	delete_option( $option_name );

	// for site options in Multisite
	delete_site_option( $option_name );

	// drop a custom database table
	global $wpdb;
	$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}_base_custom_table" );
?>