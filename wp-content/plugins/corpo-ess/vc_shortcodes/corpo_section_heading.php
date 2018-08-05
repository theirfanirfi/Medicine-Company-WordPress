<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Section Heading', 'corpo-ess'),
	'base'			=> 'corpo_section_heading',
	'description'	=> esc_html__( 'Place the heading for the section.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'heading',
			'type'			=> 'textfield',
			'admin_label'	=> true,
			'heading'		=> esc_html__( 'Heading', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the title for the section.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'style',
			'type' 			=> 'checkbox',
			'heading' 		=> esc_html__( 'Style', 'corpo-ess' ),
			'description' 	=> esc_html__( 'Select behavior of the heading.', 'corpo-ess' ),
			'value'			=> array(
				__( 'Stripe', 'corpo-ess' )		=> 'stripe',
				__( 'Align Right', 'corpo-ess' )	=> 'text-right',
				__( 'Align Center', 'corpo-ess' )	=> 'text-center',
			),
		),

		array(
			'param_name'	=> 'content',
			'type'			=> 'textarea_html',
			'heading'		=> esc_html__( 'Image', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the content for this box.', 'corpo-ess' ),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_section_heading extends WPBakeryShortCode {}
