<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Skill Bars', 'corpo-ess'),
	'base'			=> 'corpo_skill_bars',
	'description'	=> esc_html__( 'Place your skills with animated & colorful bars.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type'			=> 'param_group',
			'heading'		=> esc_html__( 'Values', 'corpo-ess' ),
			'param_name'	=> 'values',
			'description'	=> esc_html__( 'Enter values for skills - title, value and color.', 'corpo-ess' ),
			'value'			=> urlencode( json_encode( array(
				array(
					'label' => esc_html__( 'Development', 'corpo-ess' ),
					'value' => '90',
				),
				array(
					'label' => esc_html__( 'Design', 'corpo-ess' ),
					'value' => '80',
				),
				array(
					'label' => esc_html__( 'Marketing', 'corpo-ess' ),
					'value' => '70',
				),
			) ) ),
			'params'		=> array(
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Label', 'corpo-ess' ),
					'param_name'	=> 'label',
					'description'	=> esc_html__( 'Enter text used as title of bar.', 'corpo-ess' ),
					'admin_label'	=> true,
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__( 'Value', 'corpo-ess' ),
					'param_name'	=> 'value',
					'description'	=> esc_html__( 'Enter value of bar.', 'corpo-ess' ),
					'admin_label'	=> true,
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__( 'Color', 'corpo-ess' ),
					'param_name'	=> 'color',
					'description'	=> esc_html__( 'Select color for this item.', 'corpo-ess' ),
				),
			),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_skill_bars extends WPBakeryShortCode {}
