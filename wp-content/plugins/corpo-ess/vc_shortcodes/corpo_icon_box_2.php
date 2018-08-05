<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Icon Box (Style 2)', 'corpo-ess'),
	'base'			=> 'corpo_icon_box_2',
	'description'	=> esc_html__( 'Place a box with image icon.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'image',
			'type'			=> 'attach_image',
			'heading'		=> esc_html__( 'Icon Image', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the icon image for the box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'heading',
			'type'			=> 'textfield',
			'admin_label'	=> true,
			'heading'		=> esc_html__( 'Heading', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the title for the box.', 'corpo-ess' ),
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
class WPBakeryShortCode_corpo_icon_box_2 extends WPBakeryShortCode {}