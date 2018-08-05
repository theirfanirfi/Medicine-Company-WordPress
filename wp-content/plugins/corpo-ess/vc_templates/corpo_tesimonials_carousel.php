<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'limit'			=> '4',
			'ids'			=> '',
			'style'			=> '1',
			'per_page'		=> '1',
			'paginate'		=> '',
			'navigate'		=> '',
			'loop'			=> '',
			'autoplay'		=> '',
			'transparent'	=> '',
		),
		$atts
	)
);

$limit = ( ! empty( $limit ) ) ? $limit : 4;
$style = ( ! empty( $style ) ) ? $style : 1;

$responsive = ' data-items="1"';

if ( $per_page == 2 ) {
	$responsive = ' data-breakpoints=\'{ "5000": {"slidesPerView": 2}, "800": {"slidesPerView": 1} }\'';
} elseif ( $per_page == 3 ) {
	$responsive = ' data-breakpoints=\'{ "5000": {"slidesPerView": 3}, "1024": {"slidesPerView": 2}, "800": {"slidesPerView": 1} }\'';
}

$classes = '';
if ( ! empty( $navigate ) ) {
	$classes .= 'navigation_enabled ';
}

if ( ! empty( $paginate ) ) {
	$classes .= 'pagination_enabled ';
}

if ( ! empty( $transparent ) ) {
	$classes .= 'transparent-testimonials ';
}

$args = array(
	'posts_per_page'   => $limit,
	'post_type'        => 'corpo_testimonial',
);

$posts = array();

if (! empty( $ids ) ) {

	$posts = explode( ',', $ids );

} else {

	$get_posts = get_posts( $args );

	foreach ( $get_posts as $post ) {
		$posts[] = $post->ID;
	}
}

wp_enqueue_script( 'swiper' );
wp_enqueue_style( 'swiper' );
?>
<div class="corpo_testimonials_carousel <?php echo esc_attr( $classes ); ?>" data-carousel="swiper">
	<div
		 class="corpo_testimonials_container"
		 data-swiper="container"
		 data-space="30"
		<?php
			if ( ! empty( $autoplay ) || $autoplay > 0 ) {
				echo ' data-autoplay="' . esc_attr( $autoplay ) . '"';
			}
			if ( ! empty( $loop ) ) {
				echo ' data-loop="true"';
			}
			echo $responsive; ?>
		>
		<div class="swiper-wrapper">
			<?php
				foreach ( $posts as $post ) {
					echo '<div class="swiper-slide">';
					echo do_shortcode( '[corpo_testimonial_' . $style . ' id="' . $post . '"]' );
					echo '</div>';
				}
			?>
		</div><!-- /.swiper-wrapper -->

		<?php if ( ! empty( $navigate ) ) : ?>
		<div class="corpo_next_nav" data-swiper="next">
			<i class="fa fa-long-arrow-right"></i>
		</div><!-- /.corpo_prev_nav -->
		<div class="corpo_prev_nav" data-swiper="prev">
			<i class="fa fa-long-arrow-left"></i>
		</div><!-- /.corpo_prev_nav -->
		<?php endif; ?>

		<?php if ( ! empty( $paginate ) ) : ?>
		<div class="testimonials_carousel_pagination" data-swiper="pagination"></div>
		<?php endif; ?>

	</div><!-- /.corpo_testimonials_container -->
</div><!-- /.corpo_testimonials_carousel -->
