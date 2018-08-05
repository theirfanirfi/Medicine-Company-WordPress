<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'bg_image'	=> '',
			'bg_color'	=> '',
			'items'		=> ''
		),
		$atts
	)
);

$items = (array) vc_param_group_parse_atts( $items );

wp_enqueue_script( 'swiper' );
wp_enqueue_style( 'swiper' );

$attr = '';

if ( ! empty ( $bg_image) ) {
	$attr .= 'background-image:url("' . wp_get_attachment_url( $bg_image ) .'"); ';
}

if ( ! empty ( $bg_color) ) {
	$attr .= 'background-color:' . $bg_color . ';';
}


?>
<div class="corpo_block logo_carousel" <?php echo ( $attr ) ? 'style="' . esc_attr( $attr ) . '"' : ''; ?>>
	<div class="container">
		<div class="corpo_logo_carousel" data-carousel="swiper">
			<div class="logo_carousel_container" data-swiper="container" data-loop="true" data-autoplay="5000" data-speed="600" data-breakpoints='{"5000": {"slidesPerView": 5}, "1024": {"slidesPerView": 4}, "768": {"slidesPerView": 3}, "500": {"slidesPerView": 2} }'>
				<div class="swiper-wrapper">
					<?php foreach ( $items as $item ) : ?>
						<div class="swiper-slide">
							<?php if (! empty( $item['link'] ) ) : ?>
								<a class="brand_logo" href="<?php echo esc_url( $item['link'] ); ?>">
							<?php else : ?>
								<span class="brand_logo">
							<?php endif; ?>
								<img src="<?php echo wp_get_attachment_url( $item['image'] ); ?>" alt="<?php echo ! empty( $item['title'] ) ? esc_attr( $item['title'] ) : '';  ?>">
							<?php if (! empty( $item['link'] ) ) : ?>
								</a>
							<?php else : ?>
								</span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div><!-- /.swiper-wrapper -->
			</div><!-- /.logo_carousel_container -->
		</div><!-- /.corpo_logo_carousel -->
	</div><!-- /.container -->
</div><!-- /.corpo_block_logo_carousel -->
