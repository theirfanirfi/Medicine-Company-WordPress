<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Testimonials Carousel', 'corpo-ess'),
	'base'			=> 'corpo_tesimonials_carousel',
	'description'	=> esc_html__( 'Place the testimonials carousel with various style.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'limit',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'corpo-ess' ),
			'description'	=> esc_html__( 'Numbers of testimonials will display?.', 'corpo-ess' ),
			'value'			=> 4
		),

		array(
			'param_name'	=> 'ids',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'IDs', 'corpo-ess' ),
			'description'	=> esc_html__( 'Add the testimonials IDs sperated by comma (Ex: 525,36,45). Note: The limit will not work if you set IDs.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'style',
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Style', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the style for testimonial item.', 'corpo-ess' ),
			'value'			=> array(
				__( 'Style 1', 'corpo-ess' ) => '1',
				__( 'Style 2', 'corpo-ess' ) => '2',
				__( 'Style 3', 'corpo-ess' ) => '3'
			),
		),

		array(
			'param_name'	=> 'transparent',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Transparent', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if this section is transparent.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'per_page',
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Items Per Page', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select how many items you want display in a slide.', 'corpo-ess' ),
			'value'			=> array( 1, 2, 3 ),
		),

		array(
			'param_name'	=> 'paginate',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Pagination', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if you want to display pagination bullets.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'navigate',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Navigation', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if you want to display navigation/next-prev links.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'loop',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Loop', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if you want to make the carousel infinite.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'autoplay',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Autoplay time', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the autoplay time in millisecond. For example: 5000. Note: 0 or Blank value will disable autoplay.', 'corpo-ess' ),
		),

	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_tesimonials_carousel extends WPBakeryShortCode {}
