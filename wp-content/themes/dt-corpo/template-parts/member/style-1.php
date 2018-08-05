<?php
/**
 * Template part for displaying corpo member thumb
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

$id = get_the_ID();
$meta_data = get_post_meta( $id, '_corpo_member_details', true );

$linked = cs_get_option( 'corpo_team_details_link' );

?>
<div class="corpo_team_member_1">
	<?php if ( has_post_thumbnail( $id ) ) : ?>
		<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id ) ); ?>" alt="<?php echo get_the_title( $id ); ?>">
	<?php else : ?>
		<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank.jpg' ); ?>" alt="<?php echo get_the_title( $id ); ?>">
	<?php endif; ?>

	<div class="overlay">
	
		<?php if ( $linked ) : ?>
			<a href="<?php echo get_the_permalink( $id ); ?>" class="overlay-link">
				<span class="more-link"><?php echo esc_html__( 'Read more ', 'dt-corpo' ); ?></span>
				<span class="sr-only"> <?php echo get_the_title( $id ); ?></span>
			</a>
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
		<div class="name">
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
				<p><?php echo esc_html( $meta_data['title'] ); ?></p>
			<?php endif; ?>
		</div>
	</div><!-- /.overlay -->
</div><!-- /.corpo_team_member_1 -->