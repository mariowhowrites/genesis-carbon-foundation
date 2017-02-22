<?php

/**
 * Fired during plugin activation
 *
 * @link       https://ceibaweb.com
 * @since      1.0.0
 *
 * @package    Genesis_Carbon_Foundation
 * @subpackage Genesis_Carbon_Foundation/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Genesis_Carbon_Foundation
 * @subpackage Genesis_Carbon_Foundation/includes
 * @author     Mario Vega <mario@ceibaweb.com>
 */
class Genesis_Carbon_Foundation_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
			require( __DIR__ . '/vendor/autoload.php' );
		} else {
			function carbon_foundation_spl_autoload_register( $class ) {
				$prefix = 'Carbon_Foundation';
				if ( stripos( $class, $prefix ) === false ) {
					return;
				}

				$file_path = plugin_dir_path( dirname( __FILE__ ) ) . '/includes/core/' . str_ireplace( 'Carbon_Foundation\\', '', $class ) . '.php';
				$file_path = str_replace( '\\', DIRECTORY_SEPARATOR, $file_path );
				include_once( $file_path );
			}

			spl_autoload_register( 'carbon_foundation_spl_autoload_register' );
		}
	}

}
