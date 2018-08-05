<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Google Map', 'corpo-ess'),
	'base'			=> 'corpo_google_map',
	'description'	=> esc_html__( 'Place the Google Map.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'latitude',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Latitude', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the latitude address. (Go latlong.net for Latitude address.)', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'longitude',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Longitude', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the longitude address. (Go latlong.net for Longitude address.)', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'marker',
			'type'			=> 'attach_image',
			'heading'		=> esc_html__( 'Marker', 'corpo-ess' ),
			'description'	=> esc_html__( 'Add the marker icon for the map.', 'corpo-ess' ), 
		),

		array(
			'param_name'	=> 'collapsible',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Collapsible', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if this you want to set this as collapsible.', 'corpo-ess' ), 
		),

		array(
			'param_name'	=> 'trigger_text',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Text', 'corpo-ess' ),
			'description'	=> esc_html__( 'Add the button text for collapsible map.', 'corpo-ess' ), 
		),

		array(
			'param_name'	=> 'open_map',
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Open Map', 'corpo-ess' ),
			'description'	=> esc_html__( 'Check if this you want to active map when site load.', 'corpo-ess' ), 
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_google_map extends WPBakeryShortCode {}
