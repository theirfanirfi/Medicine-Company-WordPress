<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */
$clasess = array();
$clasess[] = 'corpo_single_page';

$meta_data = get_post_meta( get_the_ID(), '_corpo_page_title_options', true );
$title_display = ( isset( $meta_data['title_display'] ) ) ? $meta_data['title_display'] : true;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $clasess ); ?>>
	
	<?php if ( $title_display == true ) : ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php dt_corpo_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dt-corpo' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
