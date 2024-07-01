<?php

/**
 * The template-specific functionality of the plugin.
 *
 * @link       https://https://github.com/dmilegal?tab=repositories
 * @since      1.0.0
 *
 * @package    App_Cpt_Addon
 * @subpackage App_Cpt_Addon/templates
 */

/**
 * The template-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the template-specific stylesheet and JavaScript.
 *
 * @package    App_Cpt_Addon
 * @subpackage App_Cpt_Addon/template
 * @author     Dmitri <test@test.com>
 */
class App_Cpt_Addon_Tpl_Resolver {

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

	public function resolve_template($template) {
    global $post;

    if ( 'lb-application' === $post->post_type && locate_template( array( 'single-lb-application.php' ) ) !== $template ) {
        /*
         * This is a 'movie' post
         * AND a 'single movie template' is not found on
         * theme or child theme directories, so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . 'default.php';
    }

    return $template;
	}
}
