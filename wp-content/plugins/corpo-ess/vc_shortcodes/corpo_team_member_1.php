<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Member Profile (Style 1)', 'corpo-ess'),
	'base'			=> 'corpo_team_member_1',
	'description'	=> esc_html__( 'Place a team member profile.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'id',
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Member Profile', 'corpo-ess' ),
			'description'	=> esc_html__( 'Select the member profile to display.', 'corpo-ess' ),
			'value'			=> Corpo_Ess_Helpers::vc_posts_values( 'corpo_member', '---' ),
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
class WPBakeryShortCode_corpo_team_member_1 extends WPBakeryShortCode {}
