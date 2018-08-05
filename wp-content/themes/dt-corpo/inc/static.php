<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Register and enqueue static files and dependencies
 */

// Add custom fonts, used in the main stylesheet.
wp_enqueue_style( 'corpo-fonts', dt_corpo_fonts_url(), array(), null );

/**
 * Register all dependencies scripts and css
 */

// Smooth-Scroll.js
wp_register_script(
	'smooth-scroll',
	get_parent_theme_file_uri( '/assets/js/smooth-scroll.js'),
	array(),
	'1.0.0',
	true
);

// WOW.js
wp_register_script(
	'wow',
	get_parent_theme_file_uri( '/assets/dependencies/wow/wow.min.js'),
	array(),
	'1.1.2',
	true
);

// Loaders.css
wp_register_style(
	'loaders',
	get_parent_theme_file_uri( '/assets/dependencies/loaders.css/loaders.min.css' ),
	array(),
	'0.1.2',
	'all'
);

// Swiper.js
{
	wp_register_script(
		'swiper',
		get_parent_theme_file_uri( '/assets/dependencies/Swiper/js/swiper.min.js' ),
		array(),
		'3.4.1',
		true
	);
	wp_register_style(
		'swiper',
		get_parent_theme_file_uri( '/assets/dependencies/Swiper/css/swiper.min.css' ),
		array(),
		'3.4.1',
		'all'
	);
}

// jQuery Appear
wp_register_script(
	'jquery-appear',
	get_parent_theme_file_uri( '/assets/dependencies/jquery.appear.bas2k/jquery.appear.js' ),
	array('jquery'),
	'1.0.0',
	true
);

{
	$query_args = array(
		'key' => cs_get_option( 'corpo_map_api_key', '' ),
		'region' => cs_get_option( 'corpo_map_api_region', 'US' ),
	);

	$map_url = add_query_arg( $query_args, 'https://maps.googleapis.com/maps/api/js' );

	// Google Map API
	wp_register_script(
		'gmap-api',
		esc_url( $map_url ),
		array(),
		null,
		true
	);
	
	// GMAP3
	wp_register_script(
		'gmap3',
		get_parent_theme_file_uri( '/assets/dependencies/gmap3/gmap3.min.js' ),
		array('gmap-api'),
		'7.2',
		true
	);
}

// Font Awesome
wp_register_style(
	'font-awesome',
	get_parent_theme_file_uri('/assets/dependencies/font-awesome/css/font-awesome.min.css'),
	array(),
	'4.7.0',
	'all'
);

// Countup
wp_register_script(
	'countup',
	get_parent_theme_file_uri('/assets/dependencies/countUp.js/countUp.min.js'),
	array('jquery'),
	'1.1.1',
	true
);

// Bootstrap
wp_register_script(
	'bootstrap',
	get_parent_theme_file_uri('/assets/dependencies/bootstrap/js/bootstrap.min.js'),
	array('jquery'),
	'3.3.7',
	true
);
wp_register_style(
	'bootstrap',
	get_parent_theme_file_uri('/assets/dependencies/bootstrap/css/bootstrap.min.css'),
	array(),
	'3.3.0',
	'all'
);

// Animate.css
wp_register_style(
	'animate',
	get_parent_theme_file_uri('/assets/dependencies/animate.css/animate.min.css'),
	array(),
	'3.5.1',
	'all'
);

// Preloader CSS
$preloader_opt = cs_get_option( 'corpo_preloader' );
$preloader_color_opt = cs_get_option( 'corpo_preloader_color' );
if ( ! empty( $preloader_opt ) ) {
	
	wp_enqueue_style( 'loaders' );

	$color = ( !empty( $preloader_color_opt ) ) ? $preloader_color_opt : 'rgba(0,0,0,0.95)' ;

	$preloader_css = '
	#preloader {
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		background-color: ' . esc_attr( $color ) . ';
		z-index: 9999;
	}
	#loader {
		position: absolute;
		top: 50%;
		left: 50%;
	}';
	wp_add_inline_style( 'loaders', $preloader_css );
}

/**
 * Enqueue Style and Scripts
 */
wp_enqueue_style( 'bootstrap' );
wp_enqueue_style( 'font-awesome' );

// Theme stylesheet.
wp_enqueue_style( 'dt-corpo-style', get_stylesheet_uri() );

// Hook - If you want to add some other CSS
do_action( 'dt_corpo_custom_styles' );

// Make a fake stylesheet to load inline CSS
wp_register_style( 'dt-corpo-faker', false );
wp_enqueue_style( 'dt-corpo-faker' );

// Load the html5 shiv.
wp_enqueue_script( 'html5', get_parent_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

// Enqueue registered scripts
wp_enqueue_script( 'bootstrap' );

if ( cs_get_option( 'corpo_smoothscroll', false ) ) {
	wp_enqueue_script( 'smooth-scroll' );
}

wp_enqueue_script( 'corpo', get_parent_theme_file_uri( '/assets/js/app.js' ), array( 'jquery' ), '1.0', true );


if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}


/**
 * Display custom color CSS.
 */
if ( get_theme_mod( 'colorscheme' ) == 'custom' || is_customize_preview() ) {
	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );

	$data = dt_corpo_custom_colors_css();

	wp_add_inline_style( 'dt-corpo-faker', $data );
}