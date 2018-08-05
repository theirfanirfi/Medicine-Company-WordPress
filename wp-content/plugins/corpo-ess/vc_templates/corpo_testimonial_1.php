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
<div class="corpo_testimonial_1 <?php echo ( ! empty( $transparent ) ) ? 'transparent' : ''; ?>">
	<div class="client-thumb">
		<div class="client-avatar">
			<div class="image">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				<?php else : ?>
					<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank-thumb.jpg' ); ?>" alt="<?php echo esc_attr( $title ); ?>">
				<?php endif; ?>
			</div>
		</div><!-- /.client-avatar -->

		<h4><?php echo esc_html( $title ); ?></h4>
	</div><!-- /.client-thumb -->

	<div class="content">
		<?php the_content(); ?>
	</div><!-- /.content -->
</div><!-- /.corpo_testimonial_1 -->
<?php wp_reset_postdata(); ?>