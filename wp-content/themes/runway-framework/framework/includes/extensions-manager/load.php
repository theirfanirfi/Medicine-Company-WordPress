<?php
/*
	Extension Name: Extension manager
	Extension URI:
	Version: 0.1
	Description: This extensions management module
	Author:
	Author URI:
	Text Domain:
	Domain Path:
	Network:
	Site Wide Only:
*/

// Load this section of the admin
$fields = array(
	'var'   => array(),
	'array' => array()
);

$default = array();

$settings = array(
	'name'             => __( 'Extensions', 'runway' ),
	'option_key'       => $shortname . 'extensions-manager',
	'fields'           => $fields,
	'default'          => $default,
	'parent_menu'      => 'hidden', // managed by framework
	'menu_permissions' => 'administrator',
	'file'             => __FILE__,
);

// Required components
include_once __DIR__ . '/object.php';

$Extm_Settings = new ExtmSettingsObject( $settings );

// Load admin components
if ( is_admin() ) {
	global $extm;

	include_once __DIR__ . '/settings-object.php';
	$extm = new Extm_Admin( $settings );
} else {
	$extm = new ExtmSettingsObject( $settings );
}

do_action( 'extension_manager_is_load' );

if ( ! function_exists( 'title_button_new_extension' ) ) {
	// Setup a custom button in the title
	function title_button_new_extension( $title ) {

		if ( $_GET['page'] == 'extensions' ) {
			$title .= ' <a href="' . admin_url( 'admin.php?page=extensions&navigation=add-extension' ) . '" class="add-new-h2">'
			          . __( 'Upload New', 'runway' ) . '</a> <a href="' . admin_url( 'admin.php?page=directory' ) . '" class="add-new-h2">'
			          . __( 'Search Directory', 'runway' ) . '</a>';
		}

		return $title;

	}
	add_filter( 'framework_admin_title', 'title_button_new_extension' );
}

if ( ! function_exists( 'extensions_manager_report' ) ) {
	function extensions_manager_report( $reports_object ) {

		$extensions_dir = get_template_directory() . '/extensions/';

		$reports_object->assign_report( array(
			'source'          => 'Extensions Manager',
			'report_key'      => 'extension_dir_exists',
			'path'            => $extensions_dir,
			'success_message' => sprintf( __( 'Extensions directory (%s) exists.', 'runway' ), $extensions_dir ),
			'fail_message'    => sprintf( __( 'Extensions directory (%s) does not exist.', 'runway' ), $extensions_dir ),
		), 'DIR_EXISTS' );

		$reports_object->assign_report( array(
			'source'          => 'Extensions Manager',
			'report_key'      => 'extension_dir_writable',
			'path'            => $extensions_dir,
			'success_message' => sprintf( __( 'Extensions directory (%s) is writable.', 'runway' ), $extensions_dir ),
			'fail_message'    => sprintf( __( 'Extensions directory (%s) is not writable.', 'runway' ), $extensions_dir ),
		), 'IS_WRITABLE' );

	}
	add_action( 'add_report', 'extensions_manager_report' );
}
