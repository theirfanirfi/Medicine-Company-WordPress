<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'dt_corpo_after_body' ); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dt-corpo' ); ?></a>

	<header id="header" class="site-header">
		<?php
			// Header Top Bar
			if ( get_theme_mod( 'dt_corpo_header_top_bar', true ) == true) {
				get_template_part( 'template-parts/header/topbar' );
			}

			// Header Main Part
			get_template_part( 'template-parts/header/main' );
		?>

	</header><!-- #header -->

	<?php
		if ( ( is_front_page() && is_page() ) == false ) {
			get_template_part( 'template-parts/page-header' );
		}
	?>

    <div id="content" class="site-content">
