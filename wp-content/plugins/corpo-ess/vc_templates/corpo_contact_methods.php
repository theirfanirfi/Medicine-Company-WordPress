<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'items'	=> ''
		),
		$atts
	)
);

$items = (array) vc_param_group_parse_atts( $items );
?>

<div class="corpo_contact_methods">
	<?php
		if ( is_array( $items ) ) :
			foreach ( $items as $item ) :
	?>
		<div class="item">
			<div class="icon">
				<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
			</div>
			<div class="content">
				<?php echo wpautop( $item['content'] ); ?>
			</div>
		</div>
	<?php
			endforeach;
		endif;
	?>
</div><!-- /.corpo_contact_methods -->