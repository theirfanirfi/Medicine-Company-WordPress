<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'heading'			=> '',
			'btn_name'			=> '',
			'btn_link'			=> '',
			'heading'			=> '',
			'type'				=> 'fontawesome',
			'icon_fontawesome'	=> 'fa fa-adjust',
			'icon_openiconic'	=> 'vc-oi vc-oi-dial',
			'icon_typicons'		=> 'typcn typcn-adjust-brightness',
			'icon_entypo'		=> 'entypo-icon entypo-icon-note',
			'icon_linecons'		=> 'vc_li vc_li-heart',
			'icon_monosocial'	=> 'vc-mono vc-mono-fivehundredpx',
			'icon_material'		=> 'vc-material vc-material-cake',
		),
		$atts
	)
);

// Enqueue fonts
vc_icon_element_fonts_enqueue( $type );

// Icon class
$iconClass = isset( ${'icon_' . $type} ) ? esc_attr( ${'icon_' . $type} ) : 'fa fa-adjust';
?>

<div class="corpo_icon_box_4">
	<i class="<?php echo esc_attr( $iconClass ); ?>" aria-hidden="true"></i>
	<h3 class="title"><?php echo esc_html( $heading ); ?></h3>

	<div class="content">
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div><!-- /.content -->
	<?php if ( ! empty( $btn_name ) && ! empty( $btn_link ) ) : ?>
		<a href="<?php echo esc_url( $btn_link ); ?>" class="dt-btn btn-skew sm-btn"><?php echo esc_html( $btn_name ); ?></a>
	<?php endif; ?>
</div><!-- /.corpo_icon_box_4 -->