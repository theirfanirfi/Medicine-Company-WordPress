<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'latitude'		=> '24.592631',
			'longitude'		=> '88.269891',
			'marker'		=> '',
			'collapsible'	=> '',
			'trigger_text'	=> esc_html__( 'SEE LOCATION MAP', 'corpo-ess' ),
			'open_map'		=> ''
		),
		$atts
	)
);
wp_enqueue_script( 'gmap3' );

$marker_link = '';

if ( ! empty( $marker ) ) {
	$marker_link = wp_get_attachment_url( $marker );
} else {
	$marker_link = get_theme_file_uri('/assets/images/map_marker.png');
}

$class = '';

if ( $collapsible == false || $open_map == true ) {
	$class = 'map_active';
}

?>
<div class="corpo_google_map">
	
	<?php if ( $collapsible == true ) : ?>
		<div class="map_trigger">
			<button>
				<?php echo esc_html( $trigger_text ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
			</button>
		</div><!-- /.map_trigger -->
	<?php endif; ?>

	<div class="map_display_area <?php echo esc_attr( $class ); ?>">
		<div class="gmap3-area" data-lat="<?php echo esc_attr( $latitude ); ?>" data-lng="<?php echo esc_attr( $longitude); ?>" data-mrkr="<?php echo esc_url( $marker_link ); ?>">
		</div><!-- /.gmap3-area -->
	</div><!-- /.map_display_area -->
</div><!-- /.corpo_google_map -->