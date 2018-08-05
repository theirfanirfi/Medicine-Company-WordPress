<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'limit'		=> '4',
			'ids'		=> '',
			'style'		=> '1',
			'linked'	=> ''
		),
		$atts
	)
);

$limit = ( ! empty( $limit ) ) ? $limit : 4;
$style = ( ! empty( $style ) ) ? $style : 1;

$args = array(
	'posts_per_page'   => $limit,
	'post_type'        => 'corpo_member',
);

$posts = array();

if (! empty( $ids ) ) {

	$posts = explode( ',', $ids );

} else {

	$get_posts = get_posts( $args );

	foreach ( $get_posts as $post ) {
		$posts[] = $post->ID;
	}
}
?>
<div class="row corpo_team_members">
	<?php foreach ( $posts as $post ) : ?>
		<div class="col-lg-3 col-md-4 col-sm-6">
			<?php echo do_shortcode( '[corpo_team_member_' . $style . ' id="' . $post . '" linked="' . $linked . '"]' ); ?>
		</div>
	<?php endforeach; ?>
</div><!-- /.corpo_team_members -->
