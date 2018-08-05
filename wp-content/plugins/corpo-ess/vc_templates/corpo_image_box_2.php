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
<div class="corpo_image_box_2">
	<div class="thumb">
		<img src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo esc_attr( $heading ); ?>" class="box_bg_image">

		<?php if ( ! empty( $btn_link ) ) : ?>
			<a href="<?php echo esc_url( $btn_link ); ?>" class="box_link" title="<?php echo esc_attr( $btn_name ); ?>"><i class="fa fa-plus"></i></a>
		<?php endif; ?>
	</div><!-- /.thumb -->

	<div class="content">
		<h3 class="box_title"><?php echo esc_html( $heading ); ?></h3>
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div><!-- /.content -->
</div><!-- /.corpo_image_box_2 -->