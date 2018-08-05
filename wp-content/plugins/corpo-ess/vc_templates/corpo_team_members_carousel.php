<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'limit'		=> '4',
			'ids'		=> '',
			'full'		=> '',
			'details'	=> '',
		),
		$atts
	)
);

$limit = ( ! empty( $limit ) ) ? $limit : 4;
$style = ( ! empty( $style ) ) ? $style : 1;

$args = array(
	'posts_per_page'   => $limit,
	'post_type'        => 'corpo_member',
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
<div class="corpo_members_carousel" data-carousel="swiper">
	
	<div class="details_area_carousel" data-swiper="container" data-initial="3" data-loop="true" data-looped="5" data-effect="fade" data-crossfade="true">
		<div class="swiper-wrapper">
			<?php
				foreach ($posts as $post ) :
					$meta_data = get_post_meta( $post, '_corpo_member_details', true );
			?>
				<div class="swiper-slide">
					
					<?php if ( has_post_thumbnail( $post ) ) : ?>
						<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post ) ); ?>" alt="<?php echo get_the_title( $post ); ?>">
					<?php else : ?>
						<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank.jpg' ); ?>" alt="<?php echo get_the_title( $post ); ?>">
					<?php endif; ?>

					<div class="slider-content">
						<?php
							$name = '';
							if ( 
								! empty( $meta_data['first_name'] )
								&&
								! empty( $meta_data['last_name'] )
							) {
								$name = $meta_data['first_name'] . ' ' . $meta_data['last_name'];
							} else {
								$name = get_the_title( $post );
							}
						?>

						<h4><?php echo esc_attr( $name ); ?></h4>
						
						<?php if ( ! empty( $meta_data['title'] ) ) : ?>
							<span><?php echo esc_html( $meta_data['title'] ); ?></span>
						<?php endif; ?>

						<?php
							if ( ! empty( $full ) ) {
								echo apply_filters( 'the_content', get_post_field( 'post_content', $post ) );
							} elseif ( ! empty( $meta_data['bio'] ) ) {
								echo '<p>';
								echo wp_kses_post( $meta_data['bio'] );
								echo '</p>';
							}
						?>

						<?php if ( is_array( $meta_data['social_profiles'] ) ) : ?>
							<ul class="dt-social-link">
								<?php foreach ( $meta_data['social_profiles'] as $item ) : ?>
									<li>
										<a href="<?php echo esc_url( $item['link'] ); ?>" title="<?php echo esc_attr( $item['name'] ); ?>">
											<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
										</a>
									</li>
								<?php endforeach; ?>
							</ul><!-- /.dt-social-link -->
						<?php endif; ?>

						<?php if ( ! empty( $details) ) : ?>
							<a href="<?php echo get_the_permalink( $post ); ?>" class="dt-btn btn-skew"><?php echo esc_html__( 'Full profile', 'corpo-ess' ); ?></a>
						<?php endif; ?>
					</div>
					<!-- /.slider-content -->
				</div><!-- /.swiper-slide -->
			<?php
				endforeach;
			?>
		</div><!-- /.swiper-wrapper -->

		<div class="corpo_next_nav" data-swiper="next">
			<i class="fa fa-long-arrow-right"></i>
		</div><!-- /.corpo_prev_nav -->
		<div class="corpo_prev_nav" data-swiper="prev">
			<i class="fa fa-long-arrow-left"></i>
		</div><!-- /.corpo_prev_nav -->

	</div>
	<div class="thumbs_area_carousel" data-swiper="ascontrol" data-initial="2" data-items="3" data-center="true" data-space="10" data-click-to-slide="true" data-loop="true" data-looped="5" data-direction="vertical">
		<div class="swiper-wrapper">
			<?php foreach ($posts as $post ) : ?>
				<div class="swiper-slide">
					<?php if ( has_post_thumbnail( $post ) ) : ?>
						<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'thumbnail' ) ?>
						<img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo get_the_title( $post ); ?>">
					<?php else : ?>
						<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank-thumb.jpg' ); ?>" alt="<?php echo get_the_title( $post ); ?>">
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div><!-- /.corpo_members_carousel -->