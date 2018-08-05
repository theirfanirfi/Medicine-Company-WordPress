<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'id'	=> '',
			'class'	=> ''
		),
		$atts
	)
);

if ( ! empty( $id ) ) {
	Corpo_Ess_Slider::get_slider( $id, $class );
} else {
	return '<p>' . esc_html__( 'Slider ID Not Found', 'corpo-ess' );
}

?>