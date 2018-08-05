<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'heading'	=> '',
			'image'		=> '',
			'btn_name'	=> '',
			'btn_link'	=> '',
		),
		$atts
	)
);

?>
<div class="corpo_image_box_1" data-bg-image="<?php echo wp_get_attachment_url( $image ); ?>">
	
	<div class="overlay">
		<h3 class="box_title"><?php echo esc_html( $heading ); ?></h3>
	</div><!-- /.overlay -->

	<div class="overlay_content">
		<div class="content">
		
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>

			<?php if ( ! empty( $btn_name ) && ! empty( $btn_link ) ) : ?>
				<a href="<?php echo esc_url( $btn_link ); ?>" class="dt-btn dt-btn-white"><?php echo esc_html( $btn_name ); ?></a>
			<?php endif; ?>
		</div><!-- /.content -->
	</div><!-- /.overlay_content -->
</div><!-- /.corpo_image_box_1 -->