<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://allotmentandy.github.io
 * @since      1.0.0
 *
 * @package    Andy_Wp_Pb
 * @subpackage Andy_Wp_Pb/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Andy_Wp_Pb
 * @subpackage Andy_Wp_Pb/includes
 * @author     andy <wppb@londinium.com>
 */
class Andy_Wp_Pb_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'andy-wp-pb',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
