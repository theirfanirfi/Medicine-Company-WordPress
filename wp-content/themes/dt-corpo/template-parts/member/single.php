<?php
/**
 * Template part for displaying corpo member single
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
?>
<div class="corpo_member_profile_details">
	<div class="row">
		<div class="col-md-4">
			<div class="profile-image">
				<?php if ( has_post_thumbnail( $id ) ) : ?>
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $id ) ); ?>" alt="<?php echo get_the_title( $id ); ?>">
				<?php else : ?>
					<img src="<?php echo get_theme_file_uri( '/assets/images/profile-blank.jpg' ); ?>" alt="<?php echo get_the_title( $id ); ?>">
				<?php endif; ?>
			</div><!-- /.profile-image -->
		</div><!-- /.profile-image -->

		<div class="col-md-8">
			<div class="profile-info">
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
				<h3 class="profile-title"><?php echo esc_attr( $name ); ?></h3>
				<?php if ( ! empty( $meta_data['title'] ) ) : ?>
					<div class="profile-job">
						<?php echo esc_html( $meta_data['title'] ); ?>
					</div>
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
			</div><!-- /.profile-info -->

			<div class="profile-content">
				<?php the_content(); ?>
			</div><!-- /.profile-content -->
		</div><!-- /.col-md-8 -->
	</div><!-- /.row -->
</div><!-- /.corpo_member_profile_details -->