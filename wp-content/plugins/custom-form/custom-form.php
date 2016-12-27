<?php
/*
Plugin Name: Custom Form
Description: [wpcf-vietsky-box-search-flight]
Version: 1.0.0
Author: MinhNguyen
*/

define( 'CUSTOM_FORM_VERSION', '1.0.0' );
define ('USING_SESSION', false);

if ( ! defined( 'WP_CF_PLUGIN_BASENAME' ) )
	define( 'WP_CF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if ( ! defined( 'WP_CF_PLUGIN_NAME' ) )
	define( 'WP_CF_PLUGIN_NAME', trim( dirname( WPCF7_PLUGIN_BASENAME ), '/' ) );

if ( ! defined( 'WP_CF_PLUGIN_DIR' ) )
	define( 'WP_CF_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'WP_CF_PLUGIN_URL' ) )
	define( 'WP_CF_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );

require_once( 'functions/functions.php' );
require_once( 'functions/functions.load.php' );
require_once( 'functions/functions.authentication.php');
require_once( 'widgets/world.tour.widget.php');
require_once( 'widgets/promotion.and.season.products.php');
require_once( 'widgets/right.promotion.php');

?>