<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage DT Corpo
 * @version    2.6.1 for parent theme DT Corpo for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

require get_parent_theme_file_path( '/tgmpa/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'dt_corpo_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function dt_corpo_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Corpo Essential Plugin
		array(
			'name'				=> esc_html__( 'Corpo Essential', 'dt-corpo' ),
			'slug'				=> 'corpo-ess',
			'source'			=> get_template_directory() . '/tgmpa/plugins/corpo-ess.zip',
			'required'			=> true,
			'version'			=> '1.0.2',
		),

		// Visual Composer
		array(
			'name'			=> esc_html__( 'Visual Composer', 'dt-corpo' ),
			'slug'			=> 'js_composer',
			'version'		=> '5.1.1',
			'source'		=> esc_url( 'https://cdn.decentthemes.com/wp-plugins/js_composer.zip' ),
			'required'		=> true,
			'external_url'	=> esc_url( 'https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431' ),
		),

		// Contact Form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'dt-corpo' ),
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

		// WP Post Views
		array(
			'name'		=> esc_html__( 'WP-PostViews', 'dt-corpo' ),
			'slug'		=> 'wp-postviews',
			'required'	=> false,
		),

	);

	/*
	 * Config for TGMPA
	 */
	$config = array(
		'id'			=> 'dt-corpo',
		'default_path'	=> '',
		'menu'			=> 'corpo-install-plugins',
		'has_notices'	=> true,
		'dismissable'	=> true,
		'dismiss_msg'	=> '',
		'is_automatic'	=> false,
		'message'		=> '',
	);

	tgmpa( $plugins, $config );
}
