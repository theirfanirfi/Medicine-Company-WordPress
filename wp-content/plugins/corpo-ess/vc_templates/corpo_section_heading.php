<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'heading'	=> '',
			'style'		=> '',
		),
		$atts
	)
);

?>
<div class="corpo_section_heading <?php echo esc_attr( str_replace( ',', ' ', $style ) ); ?>">
	
	<?php if ( ! empty( $heading ) ) : ?>
		<h2 class="section-title"><?php echo esc_attr( $heading); ?></h2>
	<?php endif; ?>
	
	<?php if ( ! empty(  $content ) ) : ?>
	<div class="section-content">
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div><!-- /.section-content -->
	<?php endif; ?>

</div><!-- /.corpo_section_heading -->
<div class="clearfix"></div>