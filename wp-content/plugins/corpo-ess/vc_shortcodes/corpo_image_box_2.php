<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Image Box (Style 2)', 'corpo-ess'),
	'base'			=> 'corpo_image_box_2',
	'description'	=> esc_html__( 'Place a box with background image.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'heading',
			'type'			=> 'textfield',
			'admin_label'	=> true,
			'heading'		=> esc_html__( 'Heading', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the title for the box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'image',
			'type'			=> 'attach_image',
			'heading'		=> esc_html__( 'Image', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the image for the box background.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'content',
			'type'			=> 'textarea_html',
			'heading'		=> esc_html__( 'Image', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the content for this box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'btn_name',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Name', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the button name for this box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'btn_link',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Link', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the button link for the box.', 'corpo-ess' ),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_image_box_2 extends WPBakeryShortCode {}
