<?php

/**
 *
 * @link              http://github.com/newageio/wp-dou
 * @since             0.0.1
 * @package           Dou
 *
 * @wordpress-plugin
 * Plugin Name:       WP Dou Shortcodes
 * Version:           0.0.1
 * Author:            Roman Dutchak
 * Author URI:        https://newage.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dou
 */
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DOU_VERSION', '0.0.1' );

require plugin_dir_path( __FILE__ ) . 'includes/class-dou.php';


function run_plugin_name() {

	$plugin = new Dou();
	$plugin->run();

}
run_plugin_name();
