<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

get_header();
$column_opt = cs_get_option( 'corpo_service_column' );
$style_opt = cs_get_option( 'corpo_service_style' );

$column_size = 'col-md-4 col-sm-6';

if ( $column_opt == '1-2' ) {
	$column_size = 'col-sm-6';

} elseif ( $column_opt == '1-3' ) {
	$column_size = 'col-md-4 col-sm-6';

} elseif ( $column_opt == '1-4' ) {
	$column_size = 'col-md-3 col-sm-6';
}

$style = ( $style_opt ) ? $style_opt : '1';

?>

<div class="container corpo_inside_page">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) { ?>

			<div class="row corpo_service_archive">
				<?php

					while ( have_posts() ) {
						the_post();
						echo '<div class="' . esc_attr( $column_size ) . '">';
						get_template_part( 'template-parts/service/content', $style );
						echo '</div>';
					}
				?>
			</div><!-- /.row -->

			<?php
			the_posts_pagination( array(
				'prev_text' => '<span class="corpo_prev_nav"><i class="fa fa-long-arrow-left"></i></span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'dt-corpo' ) . '</span>',
				'next_text' => '<span class="sr-only">' . esc_html__( 'Next page', 'dt-corpo' ) . '</span><span class="corpo_next_nav"><i class="fa fa-long-arrow-right"></i></span>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'dt-corpo' ) . ' </span>',
			) );

		} else {
			get_template_part( 'template-parts/post/content', 'none' );
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .container -->

<?php get_footer();
