<?php
/**
 * Template for displaying page header
 */

$banner_disp 		= cs_get_option( 'corpo_header', true );
$banner_imgDeflt	= get_theme_file_uri( 'assets/images/page-header.jpg' );
$page_header_img	= cs_get_option( 'corpo_header_image' );
$banner_image 		= ( ! empty( $page_header_img ) ) ? $page_header_img : $banner_imgDeflt;
$banner_title		= cs_get_option( 'corpo_header_default_title', __( 'Posts', 'dt-corpo' ) );
$banner_crumb		= cs_get_option( 'corpo_breadcrumbs', true );

if ( is_singular() ) {

	global $post;

	$banner_title	= get_the_title( $post->ID );
	$post_opt 		= get_post_meta( $post->ID, '_corpo_page_options', true );

	if ( is_array( $post_opt ) ) {

		if ( isset( $post_opt['page_header_global'] ) && $post_opt['page_header_global'] == false ) {

			if ( ! empty( $post_opt['custom_title'] ) ) {
				$banner_title	= $post_opt['custom_title'];
			}

			$banner_disp 	= isset( $post_opt['page_header'] ) ? $post_opt['page_header'] : $banner_disp;
			$banner_crumb	= isset( $post_opt['breadcrumbs'] ) ? $post_opt['breadcrumbs'] : $banner_crumb;

			if ( ! empty( $post_opt['header_image'] ) ){
				$banner_image = wp_get_attachment_url( $post_opt['header_image'] );
			}

		}

	}

} elseif ( is_archive() ) {
	$banner_title	= get_the_archive_title();

} elseif ( is_search() ) {
	if ( have_posts() ) {
		$banner_title = sprintf( esc_html__( 'Search Results for: %s', 'dt-corpo' ), '<span>' . get_search_query() . '</span>' );
	} else {
		$banner_title = esc_html__( 'Nothing Found', 'dt-corpo' );
	}

} elseif ( is_404() ) {
	$banner_title = esc_html__( 'Error 404 - Page Not Found', 'dt-corpo' );
}

if ( $banner_disp == false )
	return;

?>

<section class="corpo_page_header" data-bg-image="<?php echo esc_url( $banner_image ); ?>">
	<div class="container">
		<div class="banner-title">
			<h1><?php echo wp_kses_post( $banner_title ); ?></h1>
			<?php
				if ( $banner_crumb == true ) {
					dt_corpo_breadcrumbs();
				}
			?>
		</div>
		<!-- /.banner-title -->
	</div>
	<!-- /.container -->
</section><!-- /.corpo_page_header -->