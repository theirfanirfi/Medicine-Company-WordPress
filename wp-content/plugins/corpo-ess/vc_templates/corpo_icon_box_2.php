<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'heading'			=> '',
			'image'				=> '',
		),
		$atts
	)
);
?>

<div class="corpo_icon_box_2">
	<img src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo esc_attr( $heading ); ?>" class="box_icon">

	<div class="box-content">

		<h3 class="title"><?php echo esc_html( $heading ); ?></h3>

		<div class="content">
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
		</div><!-- /.content -->
		
	</div><!-- /.box-content -->
</div><!-- /.corpo_icon_box_1 -->