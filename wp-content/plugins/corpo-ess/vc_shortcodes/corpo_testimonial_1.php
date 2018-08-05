<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Testimonial (Style 1)', 'corpo-ess'),
	'base'			=> 'corpo_testimonial_1',
	'description'	=> esc_html__( 'Place a testimonial item.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'id',
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Testimonial', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the item to display.', 'corpo-ess' ),
			'value'			=> Corpo_Ess_Helpers::vc_posts_values( 'corpo_testimonial', '---' ),
		),

		array(
			'param_name'	=> 'transparent',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Transparent', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if this section is transparent.', 'corpo-ess' ),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_testimonial_1 extends WPBakeryShortCode {}
