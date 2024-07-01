<?php

/**
 * The setting-specific functionality of the plugin.
 *
 * @link       https://https://github.com/dmilegal?tab=repositories
 * @since      1.0.0
 *
 * @package    App_Cpt_Addon
 * @subpackage App_Cpt_Addon/settings
 */

/**
 * The settings-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the settings-specific stylesheet and JavaScript.
 *
 * @package    App_Cpt_Addon
 * @subpackage App_Cpt_Addon/settings
 * @author     Dmitri <test@test.com>
 */
class App_Cpt_Addon_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function register_hooks() {
		require_once 'actions/actions.php';
		require_once 'filters/filters.php';
		require_once 'acf/acf.php';
	}
}
