<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.decentthemes.com/
 * @since             1.0.0
 * @package           Corpo_Ess
 *
 * @wordpress-plugin
 * Plugin Name:       Corpo Essentials
 * Plugin URI:        https://www.decentthemes.com/products/corpo-wordpress
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.2
 * Author:            Decent Themes
 * Author URI:        https://www.decentthemes.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       corpo-ess
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Constant for the plugins
 */
define( 'CORPO_ESS_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-corpo-ess-activator.php
 */
function activate_corpo_ess() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-corpo-ess-activator.php';
	Corpo_Ess_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-corpo-ess-deactivator.php
 */
function deactivate_corpo_ess() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-corpo-ess-deactivator.php';
	Corpo_Ess_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_corpo_ess' );
register_deactivation_hook( __FILE__, 'deactivate_corpo_ess' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-corpo-ess.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_corpo_ess() {

	$plugin = new Corpo_Ess();
	$plugin->run();

}
run_corpo_ess();


/**
 * Load the demo importer
 */
require plugin_dir_path( __FILE__ ) . 'importer/importer.php';
