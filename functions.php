<?php
/**
 * Red Willow Theme
 *
 * @package   Red_Willow_Theme
 * @link      https://rankfoundry.com
 * @copyright Copyright (C) 2021-2023, Rank Foundry LLC - support@rankfoundry.com
 * @since     1.0.0
 * @license   GPL-2.0+
 *
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/*--------------------------------------------------------------*/
/*---------------------- Theme Setup ---------------------------*/
/*--------------------------------------------------------------*/
// Define theme version
if (!defined('RED_WILLOW_THEME_VERSION')) {
    define('RED_WILLOW_THEME_VERSION', '1.0.0');
}

// Define theme directory path
if (!defined('RED_WILLOW_THEME_DIR')) {
    define('RED_WILLOW_THEME_DIR', trailingslashit( get_stylesheet_directory() ));
}

// Define theme directory URI
if (!defined('RED_WILLOW_THEME_DIR_URI')) {
    define('RED_WILLOW_THEME_DIR_URI', trailingslashit( esc_url( get_stylesheet_directory_uri() )));
}

// Define current theme name
if (!defined('CURRENT_THEME_NAME')) {
    $current_theme_obj = wp_get_theme();
    define('CURRENT_THEME_NAME', $current_theme_obj->get('Name'));
}

// Load the Composer autoloader.
require_once RED_WILLOW_THEME_DIR . 'vendor/autoload.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;


/*--------------------------------------------------------------*/
/*------------------ Theme Update Checker ----------------------*/
/*--------------------------------------------------------------*/
if ( 'Red Willow' === CURRENT_THEME_NAME ) {
	$themeUpdateChecker = PucFactory::buildUpdateChecker(
		'https://github.com/rankfoundry/red-willow-theme/',
		RED_WILLOW_THEME_DIR . '/functions.php',
		'red-willow',
		48
	);
	$themeUpdateChecker->setBranch('master');
}


/*---------------------------------------------------------------*/
/*---------------------- Theme Styles ---------------------------*/
/*---------------------------------------------------------------*/
function red_willow_enqueue_styles() {
	wp_enqueue_style( 'red-willow', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

add_action( 'wp_enqueue_scripts', 'red_willow_enqueue_styles' ); 

