<?php

/**
 * The widgets-facing functionality of the plugin.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/widgets
 */

/**
 * The widgets-facing functionality of the plugin.
 *
 * Registering widgets widgets for site.
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/widgets
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Widgets {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->load_dependencies();
	}

	/**
	 * Load the required widgets for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Corpo_Ess_Recent_Posts. Recent Posts Widget.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class for creating widget with supported field of codestar framework.
		 */
		include_once plugin_dir_path( __FILE__ ) . 'class-corpo-ess-widget.php';

		/**
		 * The class responsible for the registering recent post widget.
		 */
		include_once plugin_dir_path( __FILE__ ) . 'class-corpo-ess-recent-posts-widget.php';

		/**
		 * The class responsible for the registering about us widget.
		 */
		include_once plugin_dir_path( __FILE__ ) . 'class-corpo-ess-about-us-widget.php';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_widgets() {

		register_widget( 'Corpo_Ess_Recent_Posts_Widget' );
		register_widget( 'Corpo_Ess_About_Us_Widget' );

	}

}
