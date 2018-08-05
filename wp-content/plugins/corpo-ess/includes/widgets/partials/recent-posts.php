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

$query_args = array(
			'ignore_sticky_posts' 	=> true,
			'posts_per_page' 		=> $instance['limit']
		);
$the_query = new WP_Query( $query_args );

if ( $the_query->have_posts() ) : ?>

	<div class="recent_posts_widget">

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<a class="post_item" href="<?php the_permalink(); ?>">
				<div class="thumb">
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'thumbnail' );
						} else {
							echo '<img src="' . get_theme_file_uri( '/assets/images/no-img-thumb-small.jpg' ) . '" alt="' . get_the_title() . '">';
						}
					?>
				</div><!-- /.thumb -->

				<div class="content">
					<h4><?php the_title(); ?></h4>
					<?php
						if ( in_array( 'date', (array) $instance['meta'] ) ) {
							echo '<div class="date">' . get_the_date() . '</div>';
						}
						if ( in_array( 'comment', (array) $instance['meta'] ) ) {
							$comments = wp_count_comments( get_the_ID() );

							if ( $comments->approved > 0 ) {
								echo '<div class="comments"><i class="fa fa-comments"></i> ' . $comments->approved . ' </div>';
							}
						}
					?>
				</div><!-- /.content -->
			</a><!-- /.post_item -->
		<?php endwhile; ?>

	</div><!-- /.recent_posts_widget -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif;

echo $args['after_widget'];