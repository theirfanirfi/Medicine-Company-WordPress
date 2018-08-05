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

get_header(); ?>

<div class="container corpo_inside_page">
	<main id="main" class="site-main">

		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/member/single' );

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- .container -->

<?php get_footer();
