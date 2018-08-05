<?php
/**
 * DT Importer : https://github.com/AminulBD/dt-demo-importer
 */

define( 'DT_IMPORTER_VER' , '1.0.1' );
define( 'DT_IMPORTER_DIR' , plugin_dir_path( __FILE__ ) );
define( 'DT_IMPORTER_URI' , plugin_dir_url( __FILE__ ) );
define( 'DT_IMPORTER_CONTENT_DIR' , DT_IMPORTER_DIR . '/demos/' );
define( 'DT_IMPORTER_CONTENT_URI' , DT_IMPORTER_URI . '/demos/' );

/**
 * Scripts and styles for admin
 */
function dt_importer_enqueue_scripts() {

	wp_enqueue_script( 'dt-importer', DT_IMPORTER_URI . '/assets/js/dt-importer.js', array( 'jquery' ), DT_IMPORTER_VER, true);
	wp_enqueue_style( 'dt-importer-css', DT_IMPORTER_URI . '/assets/css/dt-importer.css', null, DT_IMPORTER_VER);

	wp_localize_script( 'dt-importer', 'dt_importer', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'dt_importer_enqueue_scripts' );


/**
 * Load Importer
 */
require_once DT_IMPORTER_DIR . '/classes/abstract.class.php';
require_once DT_IMPORTER_DIR . '/classes/importer.class.php';

/**
 * Initialize DT Importer
 */
$settings 	= array(
	'menu_parent'	=> 'tools.php',
	'menu_title'	=> esc_html__('Demo Importer', 'corpo-ess'),
	'menu_type'		=> 'add_submenu_page',
	'menu_slug'		=> 'corpo-importer',
);

$items 		= array(

	'demo-1' => array(
		'title'			=> esc_html__('Demo - 1', 'corpo-ess'),
		'preview_url'	=> esc_url( 'http://crpwp.preview.decentthemes.com/' ),
		'slider_id'		=> 11,
		'front_page'	=> 'Home',
		'blog_page'		=> 'Blog',
		'menus'			=> array(
			'main'				=> 'Main Menu',
			'topbar_left'		=> 'Contact',
			'topbar_right'		=> 'Social Networks',
		)
	),

	'demo-2' => array(
		'title'			=> esc_html__('Demo - 2', 'corpo-ess'),
		'preview_url'	=> esc_url( 'http://crpwp.preview.decentthemes.com/version2/' ),
		'slider_id'		=> 14,
		'front_page'	=> 'Home',
		'blog_page'		=> 'Blog',
		'menus'			=> array(
			'main'				=> 'Main Menu',
			'topbar_left'		=> 'Contact',
			'topbar_right'		=> 'Social Networks',
		)
	),

	'demo-3' => array(
		'title'			=> esc_html__('Demo - 3', 'corpo-ess'),
		'preview_url'	=> esc_url( 'http://crpwp.preview.decentthemes.com/version3/' ),
		'slider_id'		=> 35,
		'front_page'	=> 'Home',
		'blog_page'		=> 'Blog',
		'menus'			=> array(
			'main'				=> 'Main Menu',
			'topbar_left'		=> 'Contact',
			'topbar_right'		=> 'Social Networks',
		)
	),
);
DT_Demo_Importer::instance( $settings, $items );