<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Team Members', 'corpo-ess'),
	'base'			=> 'corpo_team_members',
	'description'	=> esc_html__( 'Place the team member list here.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'limit',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Limit', 'corpo-ess' ),
			'description'	=> esc_html__( 'Numbers of member will display?.', 'corpo-ess' ),
			'value'			=> 4
		),

		array(
			'param_name'	=> 'ids',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'IDs', 'corpo-ess' ),
			'description'	=> esc_html__( 'Add the member IDs sperated by comma (Ex: 525,36,45). Note: The limit will not work if you set IDs.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'style',
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Style', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the style for for member profile.', 'corpo-ess' ),
			'value'			=> array(
				__( 'Default', 'corpo-ess' ) => '1',
				__( 'Alternate', 'corpo-ess' ) => '2'
			),
		),

		array(
			'param_name'	=> 'linked',
			'type' 			=> 'checkbox',
			'heading' 		=> esc_html__( 'Clickable Profile', 'corpo-ess' ),
			'description' 	=> esc_html__( 'Check if you want add link to member details page.', 'corpo-ess' ),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_team_members extends WPBakeryShortCode {}
