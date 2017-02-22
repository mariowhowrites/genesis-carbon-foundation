<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ceibaweb.com
 * @since      1.0.0
 *
 * @package    Genesis_Carbon_Foundation
 * @subpackage Genesis_Carbon_Foundation/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Genesis_Carbon_Foundation
 * @subpackage Genesis_Carbon_Foundation/includes
 * @author     Mario Vega <mario@ceibaweb.com>
 */
class Genesis_Carbon_Foundation_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'genesis-carbon-foundation',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
