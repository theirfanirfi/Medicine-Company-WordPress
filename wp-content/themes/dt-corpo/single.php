<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

get_header();

$classes = dt_corpo_sidebar_position();

?>

<div class="container corpo_inside_page">
	<div class="row corpo_layout_style <?php echo esc_attr( $classes['position'] ); ?>">
		<div class="<?php echo esc_attr( $classes['column'] ); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/content', 'single' );
							get_template_part( 'template-parts/author-box' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'dt-corpo' ) . '</span><span class="nav-title"><span class="corpo_prev_nav"><i class="fa fa-long-arrow-left"></i></span>%title</span>',
								'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'dt-corpo' ) . '</span><span class="nav-title">%title<span class="corpo_next_nav"><i class="fa fa-long-arrow-right"></i></span></span>',
							) );

						endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- /.col-md-9 -->

		<?php if ( $classes['sidebar'] == true ) : ?>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div><!-- /.col-md-3 -->
		<?php endif; ?>
	</div><!-- /.row -->
</div><!-- .container -->

<?php get_footer();
