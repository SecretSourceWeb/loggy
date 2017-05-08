<?php
/*
 * Plugin Name: loggy
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: loggy
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-loggy.php' );
require_once( 'includes/class-loggy-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-loggy-admin-api.php' );
require_once( 'includes/lib/class-loggy-post-type.php' );
require_once( 'includes/lib/class-loggy-taxonomy.php' );

/**
 * Returns the main instance of loggy to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object loggy
 */
function loggy () {
	$instance = loggy::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = loggy_Settings::instance( $instance );
	}

	return $instance;
}

loggy();