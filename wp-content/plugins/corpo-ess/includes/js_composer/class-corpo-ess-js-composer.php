<?php

/**
 * The visual composer functionality of the plugin.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/js_composer
 */

/**
 * The visual composer functionality of the plugin.
 *
 * Loading visual composer map and templates
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/js_composer
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Js_Composer {

	/**
	 * The directory of shortcode template
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/js_composer_templates    $shortcodes    Maintains and registered shortcode files.
	 */
	protected $shortcodes;

	/**
	 * The directory of shortcode template
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/js_composer_templates    $templates    Maintains and registered shortcode files.
	 */
	protected $templates;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->shortcodes = CORPO_ESS_DIR . 'vc_shortcodes/';
		$this->templates = CORPO_ESS_DIR . 'vc_templates/';
	}

	/**
	 * Initialize the visual composer plugin
	 *
	 * @since    1.0.0
	 */
	public function init() {

		// Set VC as Theme
		vc_set_as_theme();

		// Change the VC template directory
		vc_set_shortcodes_templates_dir( $this->templates );

	}

	/**
	 * Add new parameters to visual composer default shortcodes
	 */
	
	public function add_new_params() {

		// Add new param to vc_row
		vc_add_param( 'vc_row', array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Make container', 'corpo-ess'),
			'param_name'	=> 'container',
		));

		vc_add_param( 'vc_row', array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Make dark section', 'corpo-ess'),
			'param_name'	=> 'dark_section',
		));

		// Add new param to contact-form-7
		if ( defined( 'WPCF7_VERSION' ) ) {
			vc_add_param( 'contact-form-7', array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__( 'Form Settings', 'corpo-ess'),
				'param_name'	=> 'html_class',
				'value'			=> array(
					__( 'Dark Mode', 'corpo-ess' ) => ' transparent-form',
					__( 'Corpo Form', 'corpo-ess' ) => ' corpo-form'
				)
			));
		}
		
	}

	/**
	 * Load the required shortcode map for visual composer
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function load_elements() {

		/**
		 * The class responsible for the registering recent post widget.
		 */
		foreach ( glob( $this->shortcodes . '*.php' ) as $file ) {

			// Load file
			include_once $file;
			
		}

	}

}
