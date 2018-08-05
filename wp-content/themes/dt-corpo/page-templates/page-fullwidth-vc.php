<?php
/**
 * Template Name: Full Width for VC
 */
get_header(); ?>
<div class="corpo_inside_page for-vc">
	<div class="corpo_layout_style">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
					while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

					endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- /.row -->
</div><!-- .corpo_inside_page -->
<?php get_footer();