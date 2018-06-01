<?php
 /**
 * WP Dou Shortcodes
 *
 * @package     io.newage.wp-dou
 * @author      Roman Dutchak
 * @copyright   2019 NewAge Ukraine LLC
 * @license     Apache License, Version 2.0
 *
 * @wordpress-plugin
 * Plugin Name: WP Dou Shortcodes
 * Plugin URI:  https://github.com/newageio/wp-dou
 * Description: WP Shortcodes for DOU.ua
 * Version:     0.0.1
 * Author:      https://github.com/newageio
 * Author URI:  https://example.com
 * Text Domain: wp-dou
 * License:     Apache License, Version 2.0
 * License URI: http://www.apache.org/licenses/LICENSE-2.0
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
