<?php
/**
 * Slider Render Template - Style 1
 */

$attr = '';

if ( $meta['loop'] ) {
	$attr .= 'data-loop=true';
}

if ( $meta['autoplay'] == true && ! empty( $meta['autoplay_interval'] ) ) {
	$attr .= ' data-autoplay=' . $meta['autoplay_interval'];
}

if ( ! empty( $meta['speed'] ) ) {
	$attr .= ' data-speed=' . $meta['speed'];
}

if ( $meta['fade'] ) {
	$attr .= ' data-effect=fade data-crossfade=true';
}

if ( is_array( $meta['slides'] ) ) : ?>

<section class="corpo_slider default-style <?php echo esc_attr( $class ); ?>" data-carousel="swiper">
	<div class="corpo_slider_container" data-swiper="container" <?php echo esc_attr( $attr ); ?>>

		<div class="swiper-wrapper">
			<?php foreach ($meta['slides'] as $slide ) : ?>
				
				<?php
					$image_url = '';
					if ( ! empty( $slide['background'] ) ) {
						$image_url = wp_get_attachment_url( $slide['background'] );
					}
				?>
				<div class="swiper-slide" data-bg-image="<?php echo esc_url( $image_url ); ?>">
					
					<?php
						if ( $slide['overlay'] ) {
							echo '<div class="overlay"></div>';
						}
					?>

					<div class="slider-caption">
						<div class="container">
							<?php if ( $slide['title_small'] ) : ?>
								<div class="title_small" data-animate="fadeInUp"><?php echo wp_kses_post( $slide['title_small'] ); ?></div>
							<?php endif; ?>

							<?php if ( $slide['title_main'] ) : ?>
								<div class="title_main" data-animate="fadeInUp" data-delay="0.3s"><?php echo wp_kses_post( $slide['title_main'] ); ?></div>
							<?php endif; ?>
							
							<?php if ( $slide['content'] ) : ?>
								<div class="content" data-animate="fadeInUp" data-delay="0.4s">
									<?php echo wpautop( $slide['content'] ); ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $slide['btn_1_link'] ) && ! empty( $slide['btn_1_text'] ) ) : ?>
								<a href="<?php echo esc_url( $slide['btn_1_link'] ); ?>" class="dt-btn btn-skew" data-animate="fadeInUp" data-delay="0.6s"><?php echo esc_html( $slide['btn_1_text'] ); ?></a>
							<?php endif; ?>

							<?php if ( ! empty( $slide['btn_2_link'] ) && ! empty( $slide['btn_2_text'] ) ) : ?>
								<a href="<?php echo esc_url( $slide['btn_2_link'] ) ?>" class="dt-btn" data-animate="fadeInUp" data-delay="0.7s"><?php echo esc_html( $slide['btn_2_text'] ); ?></a>
							<?php endif; ?>
						</div><!-- /.container -->
					</div><!-- /.slider-caption -->
				</div><!-- /.swiper-slide -->

			<?php endforeach; ?>
		</div><!-- /.swiper-wrapper -->
		
		<?php if ( $meta['pagination'] ) : ?>
			<div class="swiper-pagination" data-swiper="pagination"></div>
		<?php endif; ?>
		
		<?php if ( $meta['navigation'] ) : ?>
			<span class="corpo_next_nav" data-swiper="next">
				<i class="fa fa-long-arrow-right"></i>
			</span>
			<span class="corpo_prev_nav" data-swiper="prev">
				<i class="fa fa-long-arrow-left"></i>
			</span>
		<?php endif; ?>
	</div><!-- /.corpo_slider_container -->
</section><!-- /.corpo_slider -->
<?php endif; ?>