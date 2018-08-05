<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Statics Counter', 'corpo-ess'),
	'base'			=> 'corpo_statics_counter',
	'description'	=> esc_html__( 'Place a counting statics item.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'value',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Value', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the counting value (Ex: 123).', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'title',
			'type'			=> 'textfield',
			'admin_label'	=> true,
			'heading'		=> esc_html__( 'Title', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the value title or description.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'dark_mode',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Dark mode enable', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if this element in the dark section.', 'corpo-ess' ), 
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_statics_counter extends WPBakeryShortCode {}
