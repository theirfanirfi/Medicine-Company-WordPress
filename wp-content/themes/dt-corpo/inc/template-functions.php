<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dt_corpo_body_classes( $classes ) {
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'corpo-customizer';
	}

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'corpo-front-page';
	}

	// Get the colorscheme or the default if there isn't one.
	$colors = dt_corpo_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'light' ) );
	$classes[] = 'colors-' . $colors;

	return $classes;
}
add_filter( 'body_class', 'dt_corpo_body_classes' );

/**
 * Checks to see if we're on the homepage or not.
 */
function dt_corpo_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Add class to body tag
 */
add_filter( 'body_class', 'dt_corpo_body_class' );
function dt_corpo_body_class( $classes ) {

	if ( get_theme_mod( 'dt_corpo_header_style', 'non-transparent' ) == 'transparent' ) {
		$classes[] = 'transparent-menu';
	} else {
		$classes[] = 'non-transparent-menu';
	}

	if ( 
		get_theme_mod( 'dt_corpo_header_top_bar', true ) == true
		&&
		( has_nav_menu( 'topbar_left' ) || has_nav_menu( 'topbar_right' ) )
	) {
		$classes[] = 'top_bar_enabled';
	}

	return $classes;
}

/**
 * Add Search form on the menu
 *
 * @todo Design the form.
 *
 */
if ( get_theme_mod( 'header_menu_search', true ) == true ) {

	add_filter( 'wp_nav_menu_items', 'dt_corpo_search_box_to_menu', 10, 2 );

	function dt_corpo_search_box_to_menu( $items, $args ) {
		if ( $args->theme_location == 'main' ) {
			$items .= '<li id="menu-search-form">';
			$items .= get_search_form( false );
			$items .= '<a href="#"><i class="search-trigger fa fa-search"></i></a>';
			$items .= '</li>';
		}

		return $items;
	}
}

/**
 * Detect visual composer
 */
function dt_corpo_is_vc_content() {
	global $post;
	$matches        = array();
	$preg_match_ret = preg_match( '/\[.*vc_row.*\]/s', $post->post_content, $matches );
	if ( $preg_match_ret !== 0 && $preg_match_ret !== false ) {
		return true;
	}

	return false;
}

/**
 * Get excerpt with limit
 */
function dt_corpo_the_excerpt( $charlength ) {
	$excerpt = get_the_excerpt();
	$charlength ++;

	if ( mb_strlen( $excerpt ) > $charlength ) {

		$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

/**
 * Get the sidebar position
 */
function dt_corpo_sidebar_position() {

	$sidebar_opt = cs_get_option( 'corp_sidebar' );

	$class = array(
		'column'	=> 'col-md-9',
		'position'	=> 'right',
		'sidebar'	=> true,
	);

	if ( $sidebar_opt == 'full-width' ) {

		$class['column'] = 'col-md-12';
		$class['sidebar'] = false;

	} elseif ( $sidebar_opt == 'left' ) {
		$class['column'] = 'col-md-9 pull-right';
		$class['position'] = 'left';
		$class['sidebar'] = true;

	} else {
		$class['column'] = 'col-md-9';
		$class['position'] = 'right';
		$class['sidebar'] = true;
	}

	return $class;

}

/**
 * Get the user contact methods
 */
function dt_corpo_get_user_profiles() {

	$contact_methods = array();

	if ( get_the_author_meta( 'url' ) ) {
		$contact_methods['website']['link'] = get_the_author_meta( 'url' );
		$contact_methods['website']['icon'] = 'fa fa-globe';
		$contact_methods['website']['title'] = esc_html__( 'Website', 'dt-corpo' );
	}
	
	if ( get_the_author_meta( 'facebook' ) ) {
		$contact_methods['facebook']['link'] = get_the_author_meta( 'facebook' );
		$contact_methods['facebook']['icon'] = 'fa fa-facebook';
		$contact_methods['facebook']['title'] = esc_html__( 'Facebook Profile', 'dt-corpo' );
	}

	if ( get_the_author_meta( 'twitter' ) ) {
		$contact_methods['twitter']['link'] = 'https://twitter.com/' . get_the_author_meta( 'twitter' );
		$contact_methods['twitter']['icon'] = 'fa fa-twitter';
		$contact_methods['twitter']['title'] = esc_html__( 'Twitter Profile', 'dt-corpo' );
	}

	if ( get_the_author_meta( 'google-plus' ) ) {
		$contact_methods['google-plus']['link'] = get_the_author_meta( 'google-plus' );
		$contact_methods['google-plus']['icon'] = 'fa fa-google-plus';
		$contact_methods['google-plus']['title'] = esc_html__( 'Google Profile', 'dt-corpo' );
	}

	if ( get_the_author_meta( 'linkedin' ) ) {
		$contact_methods['linkedin']['link'] = get_the_author_meta( 'linkedin' );
		$contact_methods['linkedin']['icon'] = 'fa fa-linkedin';
		$contact_methods['linkedin']['title'] = esc_html__( 'Linkedin Profile', 'dt-corpo' );
	}

	return $contact_methods;

}

/**
 * Share buttons
 */
function dt_corpo_share_buttons( $post = 0 ) {
	$post = get_post( $post );

	$output = '';
	$output .= '<span class="share-trigger">' . esc_html__( 'Share', 'dt-corpo' ) . '<span class="sharer-items">';
	$output .= '<a class="dt-share-btn" href="' . esc_url( 'http://www.facebook.com/sharer.php?u=' . get_the_permalink( $post->ID ) ) . '"><i class="fa fa-facebook"></i></a>';
	$output .= '<a class="dt-share-btn" href="' . esc_url( 'http://twitter.com/share?url=' . get_the_permalink( $post->ID ) . '&text=' . get_the_title( $post->ID ) ) . '"><i class="fa fa-twitter"></i></a>';
	$output .= '<a class="dt-share-btn" href="' . esc_url( 'https://plus.google.com/share?url=' . get_the_permalink( $post->ID ) ) . '"><i class="fa fa-google-plus"></i></a>';
	$output .= '<a class="dt-share-btn" href="' . esc_url( 'http://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $post->ID ) ) . '"><i class="fa fa-linkedin"></i></a>';
	$output .= '</span></span>';

	return $output;
}

/**
 * Set limit of member item display
 */
function dt_copro_member_display_limit( $query ) {

	$limit = get_option( 'posts_per_page' );

	$limit_opt = cs_get_option( 'corpo_team_items' );

	if ( ! empty( $limit_opt )) {
		$limit = $limit_opt;
	}

	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( is_post_type_archive( 'corpo_member' ) ) {

		$query->set( 'posts_per_page', $limit );

		return;

	}
}
add_action( 'pre_get_posts', 'dt_copro_member_display_limit', 1 );

/**
 * Set limit of service item display
 */
function dt_copro_service_display_limit( $query ) {

	$limit = get_option( 'posts_per_page' );

	$limit_opt = cs_get_option( 'corpo_service_items' );

	if ( ! empty( $limit_opt )) {
		$limit = $limit_opt;
	}

	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( is_post_type_archive( 'corpo_service' ) ) {

		$query->set( 'posts_per_page', $limit );

		return;

	}
}
add_action( 'pre_get_posts', 'dt_copro_service_display_limit', 1 );

/**
 * Preloader
 */
function dt_corpo_preloader_markup() {
	$preloader_opt = cs_get_option( 'corpo_preloader' );

	if ( !empty( $preloader_opt ) ) :
		$style_name = substr( $preloader_opt, 0, -2 );
		$style_div = substr( $preloader_opt, -1 );
?>
	<div id="preloader">
		<div id="loader">
			<div class="loader-inner <?php echo esc_attr( $style_name ); ?>">
				<?php for ( $div=0; $div < $style_div; $div++ ) : ?>
					<div></div>
				<?php endfor; ?>
			</div>
		</div><!-- /#loader -->
	</div><!-- /#preloader -->
<?php
	endif;
}
add_action( 'dt_corpo_after_body', 'dt_corpo_preloader_markup', 1 );

/**
 * Back to top
 */
function dt_corpo_backtotop_markup() {
	$bttp_opt = cs_get_option( 'corpo_back_to_top' );

	if ( $bttp_opt == true ) {
		echo '<a href="#header" class="return-to-top"><i class="fa fa-chevron-up"></i></a>';
	}
}
add_action( 'dt_corpo_before_footer', 'dt_corpo_backtotop_markup', 1 );