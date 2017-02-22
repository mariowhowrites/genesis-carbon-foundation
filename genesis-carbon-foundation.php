<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ceibaweb.com
 * @since             1.0.0
 * @package           Genesis_Carbon_Foundation
 *
 * @wordpress-plugin
 * Plugin Name:       Genesis Carbon Foundation
 * Plugin URI:        https://ceibaweb.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Mario Vega
 * Author URI:        https://ceibaweb.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       genesis-carbon-foundation
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-genesis-carbon-foundation-activator.php
 */
function activate_genesis_carbon_foundation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-genesis-carbon-foundation-activator.php';
	Genesis_Carbon_Foundation_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-genesis-carbon-foundation-deactivator.php
 */
function deactivate_genesis_carbon_foundation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-genesis-carbon-foundation-deactivator.php';
	Genesis_Carbon_Foundation_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_genesis_carbon_foundation' );
register_deactivation_hook( __FILE__, 'deactivate_genesis_carbon_foundation' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-genesis-carbon-foundation.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_genesis_carbon_foundation() {

	$plugin = new Genesis_Carbon_Foundation();
	$plugin->run();

}
run_genesis_carbon_foundation();
