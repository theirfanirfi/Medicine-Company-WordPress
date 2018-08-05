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

$classes = dt_corpo_sidebar_position();
$style_opt = cs_get_option( 'corpo_blog_style' );
?>

<div class="container corpo_inside_page">

	<div class="row corpo_layout_style <?php echo esc_attr( $classes['position'] ); ?>">
		<div class="<?php echo esc_attr( $classes['column'] ); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php if ( have_posts() ) { ?>

					<div class="corpo_list_archive <?php echo ( $style_opt == 'grid' ) ? 'two_column' : ''; ?>">
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						}
						?>
					</div><!-- /.corpo_list_archive -->

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
		</div><!-- /.col-md-9 -->

		<?php if ( $classes['sidebar'] == true ) : ?>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div><!-- /.col-md-3 -->
		<?php endif; ?>
	</div><!-- /.row -->

</div><!-- .container -->

<?php get_footer();
