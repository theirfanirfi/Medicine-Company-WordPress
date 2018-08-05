<?php
/**
 * Displaying service box
 */

$meta_data = get_post_meta( get_the_ID(), '_corpo_services_details', true );
$readmore = cs_get_option( 'corpo_service_readmore' );
?>
<div class="corpo_icon_box_3">

	<div class="icon">
		<i class="<?php echo ( $meta_data['icon'] ) ? $meta_data['icon'] : 'fa fa-check'; ?>" aria-hidden="true"></i>
	</div><!-- /.icon -->

	<div class="content">
		<h3 class="title">
			<?php
				if ( ! empty( $meta_data['archive_title'] ) ) {
					echo esc_html( $meta_data['archive_title'] );
				} else {
					the_title();
				}
			?>
		</h3>
		<?php
			if ( ! empty( $meta_data['content'] ) ) {
				echo wp_kses_post( $meta_data['content'] );
			} else {
				dt_corpo_the_excerpt( 160 );
			}
		?>
	</div><!-- /.content -->

	<?php if ( $readmore ) : ?>
		<div class="readmore">
			<a href="<?php the_permalink() ?>" class="dt-btn btn-skew sm-btn"><?php esc_html_e( 'Read more', 'dt-corpo' ); ?></a>
		</div>
	<?php endif; ?>
</div><!-- /.corpo_icon_box_3 -->