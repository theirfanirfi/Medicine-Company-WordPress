<?php

if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'id'			=> '',
			'transparent'	=> '',
		),
		$atts
	)
);

global $post;

$post = get_post( $id );
setup_postdata( $post );

$meta_data = get_post_meta( $id, '_corpo_testimonial_details', true );

$title = '';

if ( ! empty( $meta_data['name'] ) ) {
	$title = $meta_data['name'];
} else { 
	$title = get_the_title();
}

?>
<div class="corpo_testimonial_3 <?php echo ( ! empty( $transparent ) ) ? 'transparent' : ''; ?>">
	<div class="client-comments">
		<?php the_content(); ?>
	</div><!-- /.client-comments -->

	<div class="client-details">
		<div class="client-avatar">
			<div class="image">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				<?php else : ?>
					<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank-thumb.jpg' ); ?>" alt="<?php echo esc_attr( $title ); ?>">
				<?php endif; ?>
			</div>
		</div><!-- /.client-avatar -->

		<div class="details">
			<h4><?php echo esc_html( $title ); ?></h4>
			
			<?php if ( ! empty( $meta_data['title'] ) ) : ?>
				<p><?php echo esc_html( $meta_data['title'] ); ?></p>
			<?php endif; ?>
			
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
		</div><!-- /.details -->
	</div><!-- /.client-details -->
</div><!-- /.corpo_testimonial_3 -->
<?php wp_reset_postdata(); ?>