<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}

// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'number'			=> '',
			'heading'			=> '',
			'align'				=> '',
			'color'				=> 'black',
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

$classes = array();

$classes[] = ( $align ) ? ' right_align' : ' left_align';
$classes[] = $color;

if ( $number && strlen( $number ) > 1 ) {
	$classes[] = 'has_num_2x';
} else if ( $number ) {
	$classes[] = 'has_num';
}

?>

<div class="corpo_icon_box_3<?php echo esc_attr(  implode( ' ', $classes ) ); ?>">
	<?php if ( ! empty( $number ) ) : ?>
	<span class="number"><?php echo esc_attr( $number ); ?></span>
	<?php endif; ?>

	<div class="icon">
		<i class="<?php echo esc_attr( $iconClass ); ?>" aria-hidden="true"></i>
	</div><!-- /.icon -->

	<div class="content">
		<h3 class="title"><?php echo esc_html( $heading ); ?></h3>
		<?php echo wpb_js_remove_wpautop( $content, true ); ?>
	</div><!-- /.content -->
</div><!-- /.corpo_icon_box_3 -->