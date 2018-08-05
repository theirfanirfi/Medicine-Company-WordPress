<?php
/**
 * Corpo back compat functionality
 *
 * Prevents Corpo from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since Corpo 1.0
 */

/**
 * Prevent switching to Corpo on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Corpo 1.0
 */
function dt_corpo_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'dt_corpo_upgrade_notice' );
}
add_action( 'after_switch_theme', 'dt_corpo_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Corpo on WordPress versions prior to 4.7.
 *
 * @since Corpo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dt_corpo_upgrade_notice() {
	$message = sprintf( esc_html__( 'Corpo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'dt-corpo' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Corpo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dt_corpo_customize() {
	wp_die( sprintf( esc_html__( 'Corpo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'dt-corpo' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'dt_corpo_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Corpo 1.0
 *
 * @global string $wp_version WordPress version.
 */
function dt_corpo_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Corpo requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'dt-corpo' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'dt_corpo_preview' );
