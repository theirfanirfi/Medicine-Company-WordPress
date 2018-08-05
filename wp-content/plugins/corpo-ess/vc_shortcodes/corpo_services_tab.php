<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Services Tab', 'corpo-ess'),
	'base'			=> 'corpo_services_tab',
	'description'	=> esc_html__( 'Place the services item with nice tabbed styles.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type'			=> 'param_group',
			'heading'		=> esc_html__( 'Items', 'corpo-ess' ),
			'param_name'	=> 'values',
			'description'	=> esc_html__( 'Enter values for skills - title, value and color.', 'corpo-ess' ),
			'params'		=> array(
				array(
					'type'			=> 'dropdown',
					'param_name'	=> 'id',
					'heading'		=> esc_html__( 'Service', 'corpo-ess' ),
					'description'	=> esc_html__( 'Select the service item you want display.', 'corpo-ess' ),
					'admin_label'	=> true,
					'value'			=> Corpo_Ess_Helpers::vc_posts_values( 'corpo_service', '---' ),
				),

				array(
					'type'			=> 'checkbox',
					'param_name'	=> 'more',
					'heading'		=> esc_html__( 'Details Link', 'corpo-ess' ),
					'description'	=> esc_html__( 'Check if you want link to details page.', 'corpo-ess' ),
				),
			),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_services_tab extends WPBakeryShortCode {}
