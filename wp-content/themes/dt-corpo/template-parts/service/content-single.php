<?php
/**
 * Displaying service box
 */
$clasess = array();
$clasess[] = 'corpo_single_service';
$meta_data = get_post_meta( get_the_ID(), '_corpo_services_details', true );
$post_setts = get_post_meta( get_the_ID(), '_corpo_page_title_options', true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $clasess ); ?>>
	<?php if ( ! empty( $post_setts['title_display'] ) ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php dt_corpo_edit_link( get_the_ID() ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	
	<div class="service_top_area">
		<?php if ( ! empty( $meta_data['name'] ) ) : ?>
			<h3 class="title"><?php echo esc_html( $meta_data['name'] ); ?></h3>
		<?php endif; ?>
		<?php if ( ! empty( $meta_data['subtitle'] ) ) : ?>
			<div class="subtitle">
				<?php echo esc_html( $meta_data['subtitle'] ); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $meta_data['content'] ) ) : ?>
			<div class="content">
				<?php echo wp_kses_post( $meta_data['content'] ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_array( $meta_data['features'] ) ) : ?>
			<ul class="list-style iconic">
				<?php foreach ($meta_data['features'] as $item ) : ?>
					<li>
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
						<?php endif; ?>
						<?php if ( ! empty( $item['name'] ) ) : ?>
							<span><?php echo esc_html( $item['name'] ); ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div><!-- /.service_top_area -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dt-corpo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->