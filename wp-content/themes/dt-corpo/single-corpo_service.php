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
?>

<div class="container corpo_inside_page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/service/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->	
</div><!-- .container -->

<?php get_footer();
