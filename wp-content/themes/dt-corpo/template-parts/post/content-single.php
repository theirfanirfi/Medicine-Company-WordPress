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
$clasess[] = 'corpo_single_post';

$meta_data = cs_get_option( 'corpo_single_display_meta' );
$featured_img = cs_get_option( 'corpo_single_thumbnail', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $clasess ); ?>>
	
	<?php if ( has_post_thumbnail() && $featured_img == true ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'dt-corpo-featured-image' ); ?>
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

		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
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

			the_content();

			// Page Break
			wp_link_pages( array(
				'before'		=> '<div class="page-links">' . esc_html__( 'Pages:', 'dt-corpo' ),
				'after'			=> '</div>',
				'link_before'	=> '<span class="page-number">',
				'link_after'	=> '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer">
		<div class="tags">
			<?php $tags_list = get_the_tag_list( '', ', '); ?>
			<?php if ( $tags_list ) : ?>
				<span class="meta-title"><?php esc_html_e( 'Tags:', 'dt-corpo' ); ?></span> <?php echo wp_kses_post( $tags_list ); ?>
			<?php endif; ?>
		</div><!-- /.tags -->
	</div><!-- /.entry-footer -->

</article><!-- #post-## -->
