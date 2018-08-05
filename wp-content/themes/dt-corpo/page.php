<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

get_header();

$classes = dt_corpo_sidebar_position();

if ( dt_corpo_is_vc_content() ) : ?>
	
	<div id="visual_composer_page">
		<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
		?>
	</div><!-- /#visual_composer_page -->

<?php else : ?>

	<div class="container corpo_inside_page">
		<div class="row corpo_layout_style <?php echo esc_attr( $classes['position'] ); ?>">
			<div class="<?php echo esc_attr( $classes['column'] ); ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/page/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

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

<?php endif; ?>

<?php get_footer();
