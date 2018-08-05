<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'values'	=> ''
		),
		$atts
	)
);

$items = (array) vc_param_group_parse_atts( $values );

if ( is_array( $items ) ) :
$count = 0;
$el_id = uniqid( 'cst_' );
?>

<div class="corpo_services_tab row">
	<div class="col-md-3 tab_menu_items">
		<ul role="tablist">

			<?php foreach ($items as $item => $id ) : ?>
				<?php
					if ( ! empty( $id['id'] ) ) :
						$meta_data = get_post_meta( $id['id'], '_corpo_services_details', true );
						
					?>
					<li role="presentation" class="<?php echo ( $item == 0 ) ? 'active' : ''; ?>">
						<a href="#<?php echo esc_attr( $el_id . $item ) ?>" aria-controls="<?php echo esc_attr( $el_id . $item ) ?>" role="tab" data-toggle="tab">
							<span class="icon-box">
								<?php if ( ! empty( $meta_data['icon'] ) ) : ?>
									<i class="<?php echo esc_attr( $meta_data['icon'] ); ?>" aria-hidden="true"></i>
								<?php else : ?>
									<i class="fa fa-check" aria-hidden="true"></i>
								<?php endif; ?>
							</span>
							<?php if ( ! empty( $meta_data['name'] ) ) : ?>
								<span class="title"><?php echo esc_html( $meta_data['name'] ); ?></span>
							<?php endif; ?>
						</a>
					</li>
			<?php
				endif;
				endforeach;
			?>
		</ul><!-- /.dt-tabs-nav -->
	</div><!-- /.col-md-3 -->


	<div class="col-md-9 tab_content_items">
		<?php foreach ($items as $item => $id ) :
			if ( ! empty( $id['id'] ) ) :
			$meta_data = get_post_meta( $id['id'], '_corpo_services_details', true );
		?>
		<div role="tabpanel" class="tab-pane fade <?php echo ( $item == 0 ) ? 'in active' : ''; ?>" id="<?php echo esc_attr( $el_id . $item ) ?>">
			
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
			<?php if ( !empty( $id['more'] ) ) : ?>
				<a href="<?php echo get_the_permalink( $id['id'] ); ?>" class="dt-btn btn-skew sm-btn"><?php echo esc_html__( 'Get Details', 'corpo-ess' ); ?></a>
			<?php endif; ?>
		</div>
		<?php
			endif;
			endforeach;
		?>
	</div><!-- /.col-md-9 -->
</div><!-- /.corpo_services_tab -->

<?php
endif;