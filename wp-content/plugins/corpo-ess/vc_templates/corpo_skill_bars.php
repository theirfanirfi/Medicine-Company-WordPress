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

// Load scripts
wp_enqueue_script( 'jquery-appear' );

$items = (array) vc_param_group_parse_atts( $values );
?>

<div class="corpo_skill_bars">
	<?php
		if ( ! empty( $items ) ) :
			foreach ( $items as $item ) :
				$color = ( ! empty( $item['color'] ) ) ? 'style=background-color:' . $item['color'] : '';
	?>
		<div class="skill-item">
			<div class="skill-progress" <?php echo esc_attr( $color ); ?> data-skillbar="<?php echo esc_attr( $item['value']); ?>"></div>
			<div class="skill-value"><?php echo esc_html( $item['value']); ?></div>
			<div class="skill-label"><?php echo esc_html( $item['label']); ?></div>
		</div><!-- /.skill-item -->
	<?php
			endforeach;
		endif;
	?>
</div><!-- /.corpo_skill_bars -->