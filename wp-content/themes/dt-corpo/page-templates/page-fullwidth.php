<?php
/**
 * Template Name: Full Width
 */
get_header(); ?>
<div class="container corpo_inside_page">
	<div class="row corpo_layout_style">
		<div class="col-md-12">
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
		</div><!-- /.col-md-12 -->
	</div><!-- /.row -->
</div><!-- .container -->
<?php get_footer();