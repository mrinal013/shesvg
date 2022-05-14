<?php
/**
 * Plugin Name: SHESVG Elementor
 * Plugin URI: https://github.com/mrinal013/shesvg
 * Description: Assessment of Pixelaar
 * Version: 1.0.0
 * Author: Mrinal Haque
 * Author URI: https://mrinal.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: shesvg
 *
 * Elementor tested up to: 3.6.5
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * define constants
 */
define( 'SHESVG_ROOT', __DIR__);
define( 'SHESVG_ASSET', SHESVG_ROOT . '/assets' );

function shesvg_elementor_addon() {

    // Load plugin file
    require_once( __DIR__ . '/includes/shesvg.php' );

    // Run the plugin
    \Shesvg_Elementor_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'shesvg_elementor_addon' );