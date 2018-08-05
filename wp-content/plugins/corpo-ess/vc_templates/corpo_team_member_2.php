<?php

if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'id'		=> '',
			'linked'	=> ''
		),
		$atts
	)
);

$meta_data = get_post_meta( $id, '_corpo_member_details', true );

?>
<div class="corpo_team_member_2">
	<?php if ( has_post_thumbnail( $id ) ) : ?>
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id ) ); ?>" alt="<?php echo get_the_title( $id ); ?>">
	<?php else : ?>
		<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank.jpg' ); ?>" alt="<?php echo get_the_title( $id ); ?>">
	<?php endif; ?>

	<div class="overlay">
		<?php if ( ! empty( $linked ) ) : ?>
			<a href="<?php echo get_the_permalink( $id ); ?>" class="overlay-link">
				<span class="more-link"><?php echo esc_html__( 'Read more ', 'corpo-ess' ); ?></span>
				<span class="sr-only"> <?php echo get_the_title( $id ); ?></span>
			</a>
		<?php endif; ?>

		<?php
			$name = '';
			if ( 
				! empty( $meta_data['first_name'] )
				&&
				! empty( $meta_data['last_name'] )
			) {
				$name = $meta_data['first_name'] . ' ' . $meta_data['last_name'];
			} else {
				$name = get_the_title( $id );
			}
		?>

		<h4><?php echo esc_attr( $name ); ?></h4>

		<?php if ( ! empty( $meta_data['title'] ) ) : ?>
			<span><?php echo esc_html( $meta_data['title'] ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $meta_data['bio'] ) ) : ?>
			<p><?php echo wp_kses_post( $meta_data['bio'] ); ?></p>
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
	</div>
</div><!-- /.corpo_team_member_2 -->