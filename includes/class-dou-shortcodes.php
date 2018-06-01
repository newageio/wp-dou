<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Dou_Shortcodes {

	public function vacancies_shortcode($attr)
	{
		return $this->wcpt_get_template('dou-public-display.php', ['data' => Dou_Vacancies::load($attr['company'])]);
	}

	/**
	 * Locate template.
	 *
	 * Locate the called template.
	 * Search Order:
	 * 1. /themes/theme/woocommerce-plugin-templates/$template_name
	 * 2. /themes/theme/$template_name
	 * 3. /plugins/woocommerce-plugin-templates/templates/$template_name.
	 *
	 * @since 1.0.0
	 *
	 * @param 	string 	$template_name			Template to load.
	 * @param 	string 	$string $template_path	Path to templates.
	 * @param 	string	$default_path			Default path to template files.
	 * @return 	string 							Path to the template file.
	 */
	protected function wcpt_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) $template_path = 'dou/';
		if ( ! $default_path ) $default_path = plugin_dir_path( __FILE__ ) . '../public/templates/'; // Path to the template folder

		$template = locate_template([
			$template_path . $template_name,
			$template_name
		]);
		if ( ! $template ) $template = $default_path . $template_name;
		return apply_filters( 'wcpt_locate_template', $template, $template_name, $template_path, $default_path );
	}

	private function wcpt_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
		if ( is_array( $args ) && isset( $args ) ) :
			extract( $args );
		endif;
		$template_file = $this->wcpt_locate_template( $template_name, $tempate_path, $default_path );
		if ( ! file_exists( $template_file ) ) :
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
			return;
		endif;
		include $template_file;
	}
}
