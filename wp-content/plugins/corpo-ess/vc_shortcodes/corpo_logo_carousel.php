<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Logo Carousel', 'corpo-ess'),
	'base'			=> 'corpo_logo_carousel',
	'description'	=> esc_html__( 'Place your brands or logo carousel here.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Items', 'corpo-ess' ),
			'param_name' => 'items',
			'description' => esc_html__( 'Add item for carousel - image, title and link.', 'corpo-ess' ),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'corpo-ess' ),
					'param_name' => 'image',
					'description' => esc_html__( 'Upload the image.', 'corpo-ess' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'corpo-ess' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Enter the item title.', 'corpo-ess' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link', 'corpo-ess' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Enter the link for the item.', 'corpo-ess' ),
				),
			),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_logo_carousel extends WPBakeryShortCode {}
