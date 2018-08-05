<?php
/**
 * Corpo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 */

/**
 * Corpo only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dt_corpo_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Corpo, use a find and replace
	 * to change 'dt-corpo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dt-corpo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'dt-corpo-featured-image', 850, 280, true );
	add_image_size( 'dt-corpo-blog-thumb', 450, 260, true );
	add_image_size( 'dt-corpo-blog-thumb-square', 400, 280, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'			=> esc_html__( 'Main Menu', 'dt-corpo' ),
		'topbar_left'   => esc_html__( 'Topbar Left', 'dt-corpo' ),
		'topbar_right'	=> esc_html__( 'Topbar Right', 'dt-corpo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 50,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', dt_corpo_fonts_url() ) );

}
add_action( 'after_setup_theme', 'dt_corpo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dt_corpo_content_width() {

	$content_width = 700;

	if ( dt_corpo_is_frontpage() ) {
		$content_width = 1120;
	}

	/**
	 * Filter Corpo content width of the theme.
	 *
	 * @since Corpo 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'dt_corpo_content_width', $content_width );
}
add_action( 'after_setup_theme', 'dt_corpo_content_width', 0 );
/**
 * Register custom fonts.
 */
function dt_corpo_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto = _x( 'on', 'Roboto font: on or off', 'dt-corpo' );

	if ( 'off' !== $roboto ) {
		$font_families = array();

		$font_families[] = 'Roboto:400,400i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Add preconnect for Google Fonts.
 *
 * @since Corpo 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function dt_corpo_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'corpo-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'dt_corpo_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dt_corpo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dt-corpo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'dt-corpo' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'dt-corpo' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'dt-corpo' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'dt-corpo' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dt_corpo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dt_corpo_scripts() {
	require_once get_parent_theme_file_path( '/inc/static.php' );
}
add_action( 'wp_enqueue_scripts', 'dt_corpo_scripts' );

/**
 * Load the bootstrap nav walker
 */
require get_parent_theme_file_path( '/inc/wp-bootstrap-navwalker.php' );

/**
 * Load the nav walker for topbar
 */
require get_parent_theme_file_path( '/inc/topbar-nav-walker.php' );

/**
 * Load TGMPA
 */
require get_parent_theme_file_path( '/tgmpa/init.php' );

/**
 * Load Codestar Framework
 */
require get_parent_theme_file_path( '/cs-framework/cs-framework.php' );

/**
 * Load breadcrumbs
 */
require get_parent_theme_file_path( '/inc/dimox_breadcrumbs.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );


/**
 * Load WooCommerce Support
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_parent_theme_file_path( '/inc/woocommerce-support.php' );
}