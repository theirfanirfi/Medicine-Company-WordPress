<?php
/**
 * WooCommerce Actions and Filters
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.1.0
 */

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', 'dt_corpo_wc_theme_setup' );
function dt_corpo_wc_theme_setup() {

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}

/**
 * Static Resouces for WooCommerce
 */
add_action( 'dt_corpo_custom_styles', 'dt_corpo_wc_enqueue_scripts' );
function dt_corpo_wc_enqueue_scripts() {

	wp_enqueue_style(
		'dt-corpo-woocommerce',
		get_parent_theme_file_uri('/woocommerce.css'),
		array('dt-corpo-style'),
		'1.1.0',
		'all'
	);
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'dt_cropo_wc_register_sidebars' );
function dt_cropo_wc_register_sidebars() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Shop', 'dt-corpo' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'dt-corpo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

/**
 * Add Container to archive page
 */
add_action( 'dt_corpo_wc_wapper_start', 'dt_corpo_wc_start_wrapper', 1 );
function dt_corpo_wc_start_wrapper() {

	echo '<div class="container corpo_inside_page corpo_woocommerce_page"><div class="row">';

}

add_action( 'dt_corpo_wc_wapper_end', 'dt_corpo_wc_end_wrapper', 1 );
function dt_corpo_wc_end_wrapper() {

	echo '</div></div>';

}

/**
 * Add Column on the loop
 */
add_action( 'woocommerce_before_main_content', 'dt_corpo_wc_start_main_wrap', 0 );
function dt_corpo_wc_start_main_wrap() {

	if ( is_active_sidebar( 'sidebar-shop' ) ) {

		echo '<div class="col-md-8 corpo_column_3_products">';

	} else {

		echo '<div class="col-md-12">';

	}

}

add_action( 'woocommerce_after_main_content', 'dt_corpo_wc_end_main_wrap', 9999 );
function dt_corpo_wc_end_main_wrap() {

	echo '</div>';

}

/**
 * Add Column on sidebar
 */
add_action( 'woocommerce_sidebar', 'dt_corpo_wc_start_sidebar_wrap', 0 );
function dt_corpo_wc_start_sidebar_wrap() {

	echo '<div class="col-md-4">';

}

add_action( 'woocommerce_sidebar', 'dt_corpo_wc_end_sidebar_wrap', 9999 );
function dt_corpo_wc_end_sidebar_wrap() {

	echo '</div>';

}

/**
 * Manage products column
 */
if ( is_active_sidebar( 'sidebar-shop' ) ) {

	// Change main loop column
	add_filter( 'loop_shop_columns', 'dt_corpo_wc_shop_columns' );
	function dt_corpo_wc_shop_columns() {

		return 3;

	}

	// Change relate loop column
	add_filter( 'woocommerce_output_related_products_args', 'dt_corpo_wc_related_product_args' );
	function dt_corpo_wc_related_product_args( $args ) {

		$args['posts_per_page'] = 3;
		$args['columns'] = 3;

		return $args;

	}
}

/**
 * WooCommerce Search Form
 */
add_filter( 'get_product_search_form', 'dt_corpo_wc_searchform' );
function dt_corpo_wc_searchform() {

	$formID = uniqid('search-form-');

	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">';
		$form .= '<label for="' . esc_attr( $formID ) . '">';
			$form .= '<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'dt-corpo' ) . '</span>';
		$form .= '</label>';
		$form .= '<input type="search" id="' . esc_attr( $formID ) . ' " class="search-field" placeholder="'. esc_attr_x( 'Search products&hellip;', 'placeholder', 'dt-corpo' ) . '" value="' . get_search_query() . '" name="s" />';
		$form .= '<input type="hidden" name="post_type" value="product" />';
		$form .= '<button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text">' . _x( 'Search', 'submit button', 'dt-corpo' ) . '</span></button>';
	$form .= '</form>';

	return $form;
}

/**
 * Colors Pattern
 */

function dt_corpo_wc_color_pattern( $css, $hue, $saturation ) {
	$wcCSS = '
/* WooCommerce CSS */
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce a.added_to_cart,
.woocommerce input.button
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page a.added_to_cart,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt,
.woocommerce-page input.button {
	background-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
	border-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
	color: #FFF;
}

.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span {
	border-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
}

.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
	background-color: hsl( ' . $hue . ', ' . $saturation  . ', 40% );
}
.woocommerce div.product .woocommerce-tabs .panel > h2:after,
.woocommerce-page div.product .woocommerce-tabs .panel > h2:after,
.woocommerce #reviews #comments h2:after,
.woocommerce-page #reviews #comments h2:after,
.woocommerce .related.products > h2:after,
.woocommerce-page .related.products > h2:after,
.woocommerce #respond #reply-title:after,
.woocommerce-page #respond #reply-title:after,
.woocommerce .up-sells.products > h2:after,
.woocommerce-page .up-sells.products > h2:after,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
	background-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% ) !important;
}
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce a.added_to_cart:hover,
.woocommerce input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page a.added_to_cart:hover,
.woocommerce-page input.button:hover {
	background-color: transparent;
	color: hsl( ' . $hue . ', ' . $saturation  . ', 50% ) !important;
}
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit:disabled[disabled]:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button:disabled[disabled]:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button:disabled[disabled]:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,
.woocommerce-page #respond input#submit.disabled:hover,
.woocommerce-page #respond input#submit:disabled:hover,
.woocommerce-page #respond input#submit:disabled[disabled]:hover,
.woocommerce-page a.button.disabled:hover,
.woocommerce-page a.button:disabled:hover,
.woocommerce-page a.button:disabled[disabled]:hover,
.woocommerce-page button.button.disabled:hover,
.woocommerce-page button.button:disabled:hover,
.woocommerce-page button.button:disabled[disabled]:hover,
.woocommerce-page input.button.disabled:hover,
.woocommerce-page input.button:disabled:hover,
.woocommerce-page input.button:disabled[disabled]:hover {
	color: hsl( ' . $hue . ', ' . $saturation  . ', 50% ) !important;
}
';
    $output = $css . $wcCSS;
    
    return $output;
}
add_filter( 'dt_corpo_custom_colors_css', 'dt_corpo_wc_color_pattern', 10, 3 );