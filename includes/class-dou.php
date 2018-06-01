<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Dou {

	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		$this->version = defined('DOU_VERSION') ? DOU_VERSION : '1.0.0'; 
		$this->plugin_name = 'DOU Shortcodes';
		$this->load_dependencies();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dou-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dou-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dou-shortcodes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dou-vacancies.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dou-feed.php';
		$this->loader = new Dou_Loader();
	}

	private function define_public_hooks() {
		$plugin_public = new Dou_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_shortcode('dou_vacancies', new Dou_Shortcodes(), 'vacancies_shortcode');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}
	
	public function get_version() {
		return $this->version;
	}

}
