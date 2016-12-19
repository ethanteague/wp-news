<?php 
defined( 'ABSPATH' ) || exit;
define( 'SC_ADVANCED_CACHE', true );
if ( is_admin() ) { return; }
if ( ! @file_exists( WP_CONTENT_DIR . '/sc-config/config-' . $_SERVER['HTTP_HOST'] . '.php' ) ) { return; }
$GLOBALS['sc_config'] = include( WP_CONTENT_DIR . '/sc-config/config-' . $_SERVER['HTTP_HOST'] . '.php' );
if ( empty( $GLOBALS['sc_config'] ) || empty( $GLOBALS['sc_config']['enable_page_caching'] ) ) { return; }
if ( @file_exists( '/var/www/html/wp-content/plugins/simple-cache/inc/dropins/file-based-page-cache.php' ) ) { include_once( '/var/www/html/wp-content/plugins/simple-cache/inc/dropins/file-based-page-cache.php' ); }
