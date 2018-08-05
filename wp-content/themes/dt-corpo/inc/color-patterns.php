<?php
/**
 * Corpo: Color Patterns
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 */

/**
 * Generate the CSS for the current custom color scheme.
 */
function dt_corpo_custom_colors_css() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	/**
	 * Filter Corpo default saturation level.
	 *
	 * @since Corpo 1.0
	 *
	 * @param $saturation integer
	 */
	$saturation = absint( apply_filters( 'dt_corpo_custom_colors_saturation', 50 ) );
	$reduced_saturation = ( .8 * $saturation ) . '%';
	$saturation = $saturation . '%';
	$css = '
/**
 * Corpo: Color Patterns
 *
 * Colors are ordered from dark to light.
 */

/* Texts Color */
.colors-custom button,
.colors-custom input[type="button"],
.colors-custom input[type="submit"],
.colors-custom #menu-search-form > .search-form .search-submit:hover,
.colors-custom #menu-search-form > .search-form .search-submit:focus,
.colors-custom .corpo_breadcrumbs,
.colors-custom .recent_posts_widget > .post_item > .content > h4,
.colors-custom .corpo_blog_post_1 > .item_content_area > .title > a:hover,
.colors-custom .site-header .corpo_top_bar #menu-social-networks > li > a:hover,
.colors-custom .corpo_team_member_2 > .overlay > h4,
.colors-custom .corpo_team_member_2 > .overlay > .dt-social-link a:hover,
.colors-custom .corpo_team_member_1 > .overlay > .name > h4,
.colors-custom .corpo_team_member_1 > .overlay > .dt-social-link > li a:hover,
.colors-custom .widget > [class$="-container"] > ul li a:hover,
.colors-custom .widget > ul li a:hover,
.colors-custom .entry-header > .entry-title > a:hover,
.colors-custom .entry-header > .entry-meta > a,
.colors-custom .corpo_icon_box_4:hover i,
.colors-custom .corpo_testimonial_3 > .client-details > .details > h4,
.colors-custom .corpo_testimonial_3 > .client-details > .details > .dt-social-link > li > a:hover,
.colors-custom .corpo_services_tab > .tab_content_items > .tab-pane > .subtitle,
.colors-custom .list-style.iconic li > i,
.colors-custom .corpo_contact_methods > .item > .icon > i,
.colors-custom .corpo_members_carousel > .details_area_carousel .swiper-slide > .slider-content > h4,
.colors-custom .entry-excerpt > .entry-tcs > span > a:hover,
.colors-custom .entry-content > .entry-tcs > span > a:hover,
.colors-custom .entry-excerpt > .entry-tcs > .post-share > .share-trigger > .sharer-items > a:hover,
.colors-custom .entry-content > .entry-tcs > .post-share > .share-trigger > .sharer-items > a:hover,
.colors-custom .corpo_statics_counter:not(.dark_mode) > .content,
.colors-custom .copyright-bar p a,
.colors-custom .widget_tag_cloud a,
.colors-custom .corpo_blog_post_2 > i,
.colors-custom .entry-header .post-edit-link,
.colors-custom .corpo_prev_nav:hover > i,
.colors-custom .corpo_next_nav:hover > i,
.colors-custom .nav-next a:hover .corpo_next_nav > i,
.colors-custom .nav-previous a:hover .corpo_prev_nav > i,
.colors-custom .corpo_single_service > .service_top_area > .subtitle,
.colors-custom .site-footer .dt-social-link li a:hover,
.colors-custom .site-header .corpo_bs_navbar .nav > li.active > a,
.colors-custom .site-header .corpo_bs_navbar .nav > li.open > a,
.colors-custom .site-header .corpo_bs_navbar .nav > li:hover > a,
.colors-custom .site-header .corpo_bs_navbar .nav > li.active > a:hover,
.colors-custom .site-header .corpo_bs_navbar .nav > li > a:hover,
.colors-custom .corpo_image_box_2:hover > .content > .box_title {
	color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
}
@media (min-width: 768px) {
	.colors-custom.transparent-menu .site-header .corpo_bs_navbar:not(.navbar-fixed-top) .nav > li.active > a,
	.colors-custom.transparent-menu .site-header .corpo_bs_navbar:not(.navbar-fixed-top) .nav > li:hover > a,
	.colors-custom.transparent-menu .site-header .corpo_bs_navbar:not(.navbar-fixed-top) .nav > li.active > a:hover,
	.colors-custom.transparent-menu .site-header .corpo_bs_navbar:not(.navbar-fixed-top) .nav > li > a:hover {
		color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
	}
}

/* Border color */
.colors-custom .btn-skew,
.colors-custom .dt-btn:hover,
.colors-custom .dt-btn:focus,
.colors-custom button,
.colors-custom input[type="button"],
.colors-custom input[type="submit"],
.colors-custom .page-numbers.current,
.colors-custom .page-numbers:hover,
.colors-custom .corpo_icon_box_1 > .icon,
.colors-custom .widget_tag_cloud a,
.colors-custom .corpo_statics_counter,
.colors-custom .corpo_prev_nav:hover,
.colors-custom .corpo_next_nav:hover,
.colors-custom .nav-next a:hover .corpo_next_nav,
.colors-custom .nav-previous a:hover .corpo_prev_nav,
.colors-custom .corpo_testimonial_1 > .client-thumb > .client-avatar,
.colors-custom .corpo_testimonial_2 > .client-thumb > .client-avatar,
.colors-custom .site-header .corpo_bs_navbar .navbar-toggle,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li.active > a,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:hover,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:focus,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:hover {
	border-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
}
.corpo_testimonial_1 > .content:before {
	border-right-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
}
.corpo_testimonial_2 > .content:after {
	border-top-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );	
}

/* background color */
.colors-custom .btn-skew:after,
.colors-custom button:hover,
.colors-custom button:focus,
.colors-custom input[type="button"]:hover,
.colors-custom input[type="button"]:focus,
.colors-custom input[type="submit"]:hover,
.colors-custom input[type="submit"]:focus,
.colors-custom .dt-btn:after,
.colors-custom .widget .widget-title:after,
.colors-custom .corpo_google_map > .map_trigger,
.colors-custom .page-numbers.current,
.colors-custom .page-numbers:hover,
.colors-custom .corpo_icon_box_1 > .icon i,
.colors-custom .corpo_icon_box_1:hover .icon,
.colors-custom .corpo_statics_counter:before,
.colors-custom .corpo_statics_counter:after,
.colors-custom .corpo_team_member_2 > .overlay > span:after,
.colors-custom .swiper-pagination-bullets .swiper-pagination-bullet-active,
.colors-custom .corpo_section_heading.stripe > .section-title:after,
.colors-custom .corpo_testimonial_1 > .content,
.colors-custom .corpo_testimonial_2 > .content,
.colors-custom .widget_tag_cloud a:hover,
.colors-custom .corpo_prev_nav:hover:before,
.colors-custom .corpo_prev_nav:hover:after,
.colors-custom .corpo_next_nav:hover:before,
.colors-custom .corpo_next_nav:hover:after,
.colors-custom .nav-next a:hover .corpo_next_nav:before,
.colors-custom .nav-next a:hover .corpo_next_nav:after,
.colors-custom .nav-previous a:hover .corpo_prev_nav:before,
.colors-custom .nav-previous a:hover .corpo_prev_nav:after,
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li > a > .icon-box:hover > i, 
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li.active > a > .icon-box > i,
.colors-custom .site-header .corpo_bs_navbar .navbar-toggle:focus,
.colors-custom .site-header .corpo_bs_navbar .navbar-toggle:hover,
.colors-custom .site-header .corpo_bs_navbar .navbar-toggle .icon-bar,
.colors-custom .return-to-top,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li.active > a,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:hover,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:focus,
.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li > a:hover {
	background-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
}

@media (max-width: 767px) {
	.colors-custom .site-header .corpo_bs_navbar .nav li.active > a,
	.colors-custom .site-header .corpo_bs_navbar .nav li.active > a,
	.colors-custom .site-header .corpo_bs_navbar .nav li.open > a,
	.colors-custom .site-header .corpo_bs_navbar .nav li:hover > a,
	.colors-custom .site-header .corpo_bs_navbar .nav li > a:hover,
	.colors-custom .site-header .corpo_bs_navbar .nav li > a:focus,
	.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li:hover > a,
	.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > li:focus > a,
	.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > .active > a,
	.colors-custom .site-header .corpo_bs_navbar .nav .dropdown-menu > .active > a:hover {
		background-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
		border-color: hsl( ' . $hue . ', ' . $saturation  . ', 50% );
		color: #fff !important;
	}
}


/* Background color alpha */
.colors-custom .corpo_image_box_1 .overlay_content,
.colors-custom .corpo_image_box_2 > .thumb > .box_link {
	background-color: hsla( ' . $hue . ', ' . $saturation  . ', 50%, 0.8 );
}
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li > a > .icon-box:hover,
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li.active > a > .icon-box {
	background-color: hsla( ' . $hue . ', ' . $saturation  . ', 50%, 0.4 );
}
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li > a > .icon-box:hover:after,
.colors-custom .corpo_services_tab > .tab_menu_items > ul > li.active > a > .icon-box:after {
	background-color: hsla( ' . $hue . ', ' . $saturation  . ', 50%, 0.6 );
}
';


	/**
	 * Filters Corpo custom colors CSS.
	 *
	 * @since Corpo 1.0
	 *
	 * @param $css        string Base theme colors CSS.
	 * @param $hue        int    The user's selected color hue.
	 * @param $saturation string Filtered theme color saturation level.
	 */
	return apply_filters( 'dt_corpo_custom_colors_css', $css, $hue, $saturation );
}
