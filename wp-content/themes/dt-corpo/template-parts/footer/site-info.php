<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

?>
<div class="copyright-bar">
	<div class="container">
		<div class="site-info">
			<p>
				<?php
					$copy_text = get_theme_mod( 'dt_corpo_footer_copy_text' );

					if ( ! empty( $copy_text ) ) {

						echo wp_kses_post( $copy_text );

					} else {

						echo sprintf(
							esc_html__( '&copy; %1$s %2$s - Designed by %3$s', 'dt-corpo' ),
							date( 'Y' ),
							get_bloginfo( 'name' ),
							'<a href="' . esc_url( 'https://www.technolinker.com/' ) . '">' . esc_attr( 'Technolinker Inc' ) . '</a>'
						);

					}
				?>
			</p>
		</div><!-- .site-info -->
	</div><!-- /.container -->
</div><!-- /.copyright-bar -->