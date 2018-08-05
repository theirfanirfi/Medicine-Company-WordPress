<?php
// Get all arguments
extract( $args );

$defaults = array(
	'title' => '',
	'limit' => '',
	'meta' => array( 'date', 'comments' )
);

// Set the title
$title = apply_filters('widget_title', $instance['title']);

echo $args['before_widget'];

if ( $title ) {
	echo $args['before_title'] . $title . $args['after_title'];
}

?>
<div class="corpo_address_widget">
	<?php if ( ! empty( $instance['logo'] ) ) : ?>
	<div class="logo">
		<img src="<?php echo wp_get_attachment_url( $instance['logo'] ); ?>" alt="<?php echo get_the_title( $instance['logo'] ); ?>">
	</div><!-- /.logo -->
	<?php endif; ?>

	<?php
		if ( ! empty( $instance['content'] ) ) {
			echo '<div class="content">';
			echo wp_kses_post( $instance['content'] );
			echo '</div>';
		}
	?>
	
	<?php
		if ( in_array( 'addr', (array) $instance['info'] ) && function_exists( 'cs_get_option' ) ) :
		$address_lines = cs_get_option( 'corpo_address' );
		if ( is_array( $address_lines ) ) :
	?>
		<ul class="address">
			<?php
				foreach ($address_lines as $line ) {
					echo '<li>';
					echo ( ! empty( $line['icon'] ) ) ? '<i class="' . esc_attr( $line['icon'] ) . '"></i> ' : '';
					echo wp_kses_post( $line['line'] );
					echo '</li>';
				}
			?>
		</ul><!-- /.address -->
	<?php
		endif;
		endif;
	?>

	<?php
		if ( in_array( 'social', (array) $instance['info'] ) && function_exists( 'cs_get_option' ) ) :
		$social_profiles = cs_get_option( 'corpo_social_profiles' );
		if ( is_array( $social_profiles ) ) :
	?>
		<ul class="dt-social-link">
			<?php foreach ($social_profiles as $profile ) : ?>
				<li>
					<a href="<?php echo esc_url( $profile['link'] ); ?>" title="<?php echo esc_attr( $profile['name'] ); ?>">
						<i class="<?php echo esc_attr( $profile['icon'] ); ?>"></i>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php
		endif;
		endif;
	?>
</div><!-- /.corpo_address_widget -->
<?php
echo $args['after_widget'];