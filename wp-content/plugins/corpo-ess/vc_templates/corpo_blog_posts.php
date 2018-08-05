<?php
if ( ! defined( "ABSPATH" ) ) {
	die( "-1" );
}
// Shortcode attributes
extract(
	shortcode_atts(
		array(
			'limit' 		=> '2',
			'cat'			=> '',
			'multiple_cat'	=> '',
		),
		$atts
	)
);

$args = array(
			'ignore_sticky_posts' 	=> true,
			'posts_per_page' 		=> $limit
		);

if ( ! empty( $multiple_cat ) ) {

	$args['cat'] = $multiple_cat;

} elseif ( ! empty( $cat ) ) {

	$args['cat'] = $cat;
}

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) :
?>

<div class="corpo_blog_posts">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('corpo_blog_post_1'); ?>>
			<div class="item_top_area">
				<ul class="meta">
					<li>
						<a href="<?php the_permalink(); ?>" class="item date">
							<span><?php echo get_the_date( 'j' ); ?></span>
							<span><?php echo get_the_date( 'F Y' ); ?></span>
						</a>
					</li>
					<li>
						<a href="<?php the_permalink(); ?>#respond" class="item">
							<span class="fa fa-comments"></span>
							<?php $comments = wp_count_comments( get_the_ID() ); ?>
							<span><?php echo sprintf( esc_html__( '%1$s Comments', 'dt-corpo' ), $comments->approved ); ?></span>
						</a>
					</li>
					<?php if ( function_exists( 'the_views' ) ) : ?>
					<li>
						<span class="item">
							<span class="fa fa-eye"></span>
							<span><?php the_views(); ?></span>
						</span>
					</li>
					<?php endif; ?>
				</ul><!-- /.meta -->
				
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="thumb">
					<?php the_post_thumbnail( 'dt-corpo-blog-thumb' ); ?>
				</div><!-- /.thumb -->
				<?php endif; ?>
			</div><!-- /.item_top_area -->

			<div class="item_content_area">
				<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="read-more-btn dt-btn btn-skew"><?php echo esc_html( esc_html__( 'Read more', 'corpo-ess' ) ); ?></a>
			</div><!-- /.item_content_area -->
		</div><!-- /.corpo_blog_post_item -->
	<?php endwhile; ?>
</div><!-- /.row -->

<?php
	wp_reset_postdata();
else :
endif;
?>