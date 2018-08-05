<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

$clasess = array();
$style_opt = cs_get_option( 'corpo_blog_style' );
$thumbnail_opt = cs_get_option( 'corpo_blog_thumbnail' );
$readmore_opt = cs_get_option( 'corpo_blog_readmore' );
$meta_data = cs_get_option( 'corpo_blog_meta' );

if ( $style_opt == 'grid' ) {
	$clasess[] = 'corpo_blog_post_2';
} else {
	$clasess[] = 'corpo_blog_post_2';
}

if ( $thumbnail_opt == false ) {
	$clasess[] = 'corpo_thumbnail_disabled';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $clasess ); ?>>
	<?php
		if ( is_sticky() && is_home() ) :
			echo '<i class="fa fa-thumb-tack"></i>';
		endif;
	?>
	
	<?php if ( has_post_thumbnail() && $thumbnail_opt == true ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'dt-corpo-blog-thumb-square' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() && in_array( 'date', (array) $meta_data ) == true ) : ?>
			<div class="entry-meta">
				<?php
					echo dt_corpo_time_link();
					dt_corpo_edit_link();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h2 class="entry-title"><a href="' . get_the_permalink() . '" rel="bookmark">', '</a></h2>'); ?>

	</header><!-- .entry-header -->

	<div class="entry-excerpt">
		<?php
			if ( 'post' === get_post_type() ) {
				echo '<div class="entry-tcs">';

				if ( get_the_category_list() && dt_corpo_categorized_blog() && in_array( 'category', (array) $meta_data ) == true ) {
					echo '<span class="cat-lists">';
						echo '<i class="fa fa-tag"></i>';
						echo '<span class="screen-reader-text">' . esc_html__( 'Categories', 'dt-corpo' ) . '</span>';
						echo get_the_category_list( ', ' );
					echo '</span>';
				}

				if ( comments_open() && in_array( 'comment', (array) $meta_data ) == true ) {
					echo '<span class="comment-count">';
						echo '<i class="fa fa-comments"></i>';
						comments_popup_link();
					echo '</span>';
				}

				if (function_exists( 'the_views' ) && in_array( 'views', (array) $meta_data ) == true ) {
					echo '<span class="post-views">';
						echo '<i class="fa fa-eye"></i>';
						echo the_views();
					echo '</span>';
				}

				if ( in_array( 'share', (array) $meta_data ) ) {
					echo '<span class="post-share">';
						echo '<i class="fa fa-share-alt"></i>';
						echo dt_corpo_share_buttons();
					echo '</span>';
				}

				echo '</div>';
			}

			echo '<div class="content">';
			if ( has_post_thumbnail() ) {
				dt_corpo_the_excerpt( 260 );
			} else {
				dt_corpo_the_excerpt( 350 );
			}

			echo '</div>';

			// Page Break
			wp_link_pages( array(
				'before'		=> '<div class="page-links">' . esc_html__( 'Pages:', 'dt-corpo' ),
				'after'			=> '</div>',
				'link_before'	=> '<span class="page-number">',
				'link_after'	=> '</span>',
			) );
		?>

		<?php if ( $readmore_opt == true || get_the_title() == false ) : ?>
			<a href="<?php the_permalink(); ?>" class="dt-btn btn-skew sm-btn"><?php echo esc_html__( 'Read more', 'dt-corpo' ); ?></a>
		<?php endif; ?>

	</div><!-- .entry-excerpt -->

</article><!-- #post-## -->
