<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

?>
<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	<?php
		$logo_url = '';
		$logo_contrast_url = '';
		$get_logo = get_theme_mod( 'custom_logo' );
		$get_logo_contrast = get_theme_mod( 'custom_logo_contrast' );

		// Main Logo
		if ( ! empty( $get_logo ) ) {
			$logo_url = wp_get_attachment_url( $get_logo );
		} else {
			$logo_url = get_theme_file_uri( '/assets/images/logo.png' );
		}

		// Logo contrast
		if ( ! empty( $get_logo_contrast ) ) {
			$logo_contrast_url = wp_get_attachment_url( $get_logo_contrast );
		} else {
			$logo_contrast_url = get_theme_file_uri( '/assets/images/logo-contrast.png' );
		}
	?>
	<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="normal-logo">
	<img src="<?php echo esc_url( $logo_contrast_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="transparent-logo">
</a>