<?php
/*
    Extension Name: Download Directory
    Extension URI:
    Version: 0.1
    Description: Find new extensions and add-ons for the Runway framework.
    Author:
    Author URI:
    Text Domain:
    Domain Path:
    Network:
    Site Wide Only:
*/

// Settings
$fields = array(
	'var'   => array(),
	'array' => array()
);

$default = array();

global $settingshortname;

$settings = array(
	'name'             => __( 'Add-ons', 'runway' ),
	'alias'            => 'directory',
	'option_key'       => $settingshortname . 'download-directory',
	'fields'           => $fields,
	'default'          => $default,
	'parent_menu'      => 'hidden',
	'menu_permissions' => 'administrator',
	'file'             => __FILE__,
	'js'               => array(
		FRAMEWORK_URL . 'framework/js/jquery-ui.min.js',
	),
	'css'              => array(
		FRAMEWORK_URL . 'framework/includes/download-directory/css/style.css',
	),
);

global $directory, $Directory_Settings;

// Required components
include __DIR__ . '/object.php';

$Directory_Settings = new Directory_Settings_Object( $settings );

// Load admin components
if ( is_admin() ) {
	include __DIR__ . '/settings-object.php';
	$directory = new Directory_Admin( $settings );
}

if ( ! function_exists( 'download_directory_report' ) ) {
	function download_directory_report( $reports_object ) {

		global $directory;

		$downloads_tmp_dir = $directory->downloads_dir;
		$reports_object->assign_report( array(
			'source'          => 'Download Directory',
			'report_key'      => 'download_tmp_dir_exists',
			'path'            => $downloads_tmp_dir,
			'success_message' => sprintf( __( 'Downloads directory (%s) is exists.', 'runway' ), $downloads_tmp_dir ),
			'fail_message'    => sprintf( __( 'Downloads directory (%s) is not exists.', 'runway' ), $downloads_tmp_dir ),
		), 'DIR_EXISTS' );

		$reports_object->assign_report( array(
			'source'          => 'Download Directory',
			'report_key'      => 'download_tmp_dir_writable',
			'path'            => $downloads_tmp_dir,
			'success_message' => sprintf( __( 'Downloads directory (%s) is writable.', 'runway' ), $downloads_tmp_dir ),
			'fail_message'    => sprintf( __( 'Downloads directory (%s) is not writable.', 'runway' ), $downloads_tmp_dir ),
		), 'IS_WRITABLE' );

	}
	add_action( 'add_report', 'download_directory_report' );
}
