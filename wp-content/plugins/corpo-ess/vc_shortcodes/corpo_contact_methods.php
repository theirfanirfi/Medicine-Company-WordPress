<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Contact Methods', 'corpo-ess'),
	'base'			=> 'corpo_contact_methods',
	'description'	=> esc_html__( 'Place the contact methods items.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type'			=> 'param_group',
			'heading'		=> esc_html__( 'Items', 'corpo-ess' ),
			'param_name'	=> 'items',
			'description'	=> esc_html__( 'Select the method icon and add the content.', 'corpo-ess' ),
			'params'		=> array(
				array(
					'type'			=> 'iconpicker',
					'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
					'param_name'	=> 'icon',
					'value'			=> 'fa fa-adjust',
					'settings'		=> array(
						'emptyIcon' => false,
						'iconsPerPage' => 4000,
					),
					'description'	=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
				),

				array(
					'type'			=> 'textarea',
					'heading'		=> esc_html__( 'Content', 'corpo-ess' ),
					'param_name'	=> 'content',
					'description'	=> esc_html__( 'The address content.', 'corpo-ess' ),
				),
			),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_contact_methods extends WPBakeryShortCode {}
