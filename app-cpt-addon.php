<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://github.com/dmilegal?tab=repositories
 * @since             1.0.0
 * @package           App_Cpt_Addon
 *
 * @wordpress-plugin
 * Plugin Name:       App CPT Addon
 * Plugin URI:        https://https://github.com/dmilegal
 * Description:       Added application cpt for casino/bookmakers.
 * Version:           1.0.0
 * Author:            Dmitriy Krapivko
 * Author URI:        https://https://github.com/dmilegal?tab=repositories/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       app-cpt-addon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'APP_CPT_ADDON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-app-cpt-addon-activator.php
 */
function activate_app_cpt_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-app-cpt-addon-activator.php';
	App_Cpt_Addon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-app-cpt-addon-deactivator.php
 */
function deactivate_app_cpt_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-app-cpt-addon-deactivator.php';
	App_Cpt_Addon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_app_cpt_addon' );
register_deactivation_hook( __FILE__, 'deactivate_app_cpt_addon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-app-cpt-addon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_app_cpt_addon() {

	$plugin = new App_Cpt_Addon();
	$plugin->run();

}
run_app_cpt_addon();
