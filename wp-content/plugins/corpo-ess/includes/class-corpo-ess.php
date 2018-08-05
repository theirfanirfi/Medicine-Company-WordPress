<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Corpo_Ess_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'corpo-ess';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->register_widgets();
		$this->js_composer();
		$this->team_member();
		$this->testimonials();
		$this->services();
		$this->slider();
		$this->helpers();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Corpo_Ess_Loader. Orchestrates the hooks of the plugin.
	 * - Corpo_Ess_i18n. Defines internationalization functionality.
	 * - Corpo_Ess_Admin. Defines all hooks for the admin area.
	 * - Corpo_Ess_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-corpo-ess-loader.php';

		/**
		 * Load the helper class to get all helpful functions for the plugins
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-corpo-ess-helpers.php';

		/**
		 * The class to create all widgets for the theme.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/class-corpo-ess-widgets.php';

		/**
		 * The class to create and handle the visual composer shotcodes and templates.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/js_composer/class-corpo-ess-js-composer.php';

		/**
		 * The class to create custom post type for member profile and manage other things.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/team/class-corpo-ess-team.php';

		/**
		 * The class to create custom post type for slider and manage other things.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/slider/class-corpo-ess-slider.php';

		/**
		 * The class to create custom post type for services and manage other things.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/services/class-corpo-ess-services.php';

		/**
		 * The class to create custom post type for testimonial and manage other things.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/testimonials/class-corpo-ess-testimonials.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-corpo-ess-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		$this->loader = new Corpo_Ess_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Corpo_Ess_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Corpo_Ess_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the widgets built for the theme
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function register_widgets() {

		$widgets = new Corpo_Ess_Widgets();

		$this->loader->add_action( 'widgets_init', $widgets, 'register_widgets' );

	}

	/**
	 * Register all of the widgets built for the theme
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function js_composer() {

		$js_composer = new Corpo_Ess_Js_Composer();

		// Add Actions
		$this->loader->add_action( 'vc_before_init', $js_composer, 'init' );
		$this->loader->add_action( 'vc_before_init', $js_composer, 'add_new_params' );
		$this->loader->add_action( 'vc_before_init', $js_composer, 'load_elements' );

	}

	/**
	 * Run addon for the team module
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function team_member() {

		$team = new Corpo_Ess_Team();

		// Add Actions
		$this->loader->add_action( 'init', $team, 'regiter_post_type' );
		$this->loader->add_filter( 'cs_metabox_options', $team, 'add_metabox' );

	}

	/**
	 * Run addon for the testimonials module
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function testimonials() {

		$testimonials = new Corpo_Ess_Testimonials();

		// Add Actions
		$this->loader->add_action( 'init', $testimonials, 'regiter_post_type' );
		$this->loader->add_filter( 'cs_metabox_options', $testimonials, 'add_metabox' );

	}

	/**
	 * Run addon for the services module
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function services() {

		$services = new Corpo_Ess_Services();

		// Add Actions
		$this->loader->add_action( 'init', $services, 'regiter_post_type' );
		$this->loader->add_filter( 'cs_metabox_options', $services, 'add_metabox' );

	}

	/**
	 * Run addon for the services module
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function slider() {

		$slider = new Corpo_Ess_Slider();

		// Add Actions
		$this->loader->add_action( 'init', $slider, 'regiter_post_type' );
		$this->loader->add_filter( 'cs_metabox_options', $slider, 'add_metabox' );

	}

	/**
	 * Helper Functions
	 */
	private function helpers() {
		$helper = new Corpo_Ess_Helpers();

		$this->loader->add_filter( 'user_contactmethods', $helper, 'user_custom_field' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Corpo_Ess_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
