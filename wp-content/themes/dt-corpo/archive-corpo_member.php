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

$member_style = cs_get_option( 'corpo_team_style' );
$member_column = cs_get_option( 'corpo_team_column' );

$column = '';

if ( $member_column == '1-2') {
    $column = 'col-sm-6';
} elseif ( $member_column == '1-3' ) {
    $column = 'col-lg-4 col-sm-6';
} elseif ( $member_column == '1-4' ) {
    $column = 'col-lg-3 col-md-4 col-sm-6';
} elseif ( $member_column == '1-6' ) {
    $column = 'col-lg-2 col-md-4 col-sm-6';
}

?>

    <div class="container corpo_inside_page">

        <main id="main" class="site-main">

            <?php if (have_posts()) : ?>
                <div class="row corpo_team_members">
                    <?php
                        while (have_posts()) : the_post();
                            // Define the style
                            $style = ( ! empty( $member_style ) ) ? $member_style : '1';

                            // Set Column
                            echo '<div class="' . esc_attr( $column ) . '">';

                            // Get Style
                            get_template_part('template-parts/member/style', $style);

                            // End column
                            echo '</div>';

                        endwhile;
                    ?>
                </div><!-- /.row -->

            <?php
                the_posts_pagination( array(
                    'prev_text' => '<span class="corpo_prev_nav"><i class="fa fa-long-arrow-left"></i></span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'dt-corpo' ) . '</span>',
                    'next_text' => '<span class="sr-only">' . esc_html__( 'Next page', 'dt-corpo' ) . '</span><span class="corpo_next_nav"><i class="fa fa-long-arrow-right"></i></span>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'dt-corpo' ) . ' </span>',
                ) );

            else :

                get_template_part('template-parts/post/content', 'none');

            endif; ?>

        </main><!-- #main -->

    </div><!-- .container -->

<?php get_footer();
