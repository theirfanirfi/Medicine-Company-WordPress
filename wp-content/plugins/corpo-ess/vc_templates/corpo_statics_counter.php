<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'title'		=> 'Counting',
			'value'		=> '123',
			'dark_mode'	=> ''
		),
		$atts
	)
);

wp_enqueue_script( 'jquery-appear' );
wp_enqueue_script( 'countup' );

?>
<div class="corpo_statics_counter <?php echo ( $dark_mode ) ? 'dark_mode' : 'light_mode'; ?> ">
	<div class="content">
		<span class="value" data-counter="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $value ); ?></span>
		<span class="title"><?php echo esc_html( $title ) ?></span>
	</div><!-- /.content -->
</div><!-- /.corpo_statics_counter -->