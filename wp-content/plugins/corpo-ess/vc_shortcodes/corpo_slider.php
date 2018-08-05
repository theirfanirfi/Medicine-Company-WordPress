<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Corpo Slider', 'corpo-ess'),
	'base'			=> 'corpo_slider',
	'description'	=> esc_html__( 'Place the slider.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type'			=> 'dropdown',
			'param_name'	=> 'id',
			'heading'		=> esc_html__( 'Slider', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the slider you want to display.', 'corpo-ess' ),
			'admin_label'	=> true,
			'value'			=> Corpo_Ess_Helpers::vc_posts_values( 'corpo_slider', '---' ),
		),

		array(
			'param_name'	=> 'class',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Custom Class', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the custom class for this slider.', 'corpo-ess' ), 
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_slider extends WPBakeryShortCode {}
