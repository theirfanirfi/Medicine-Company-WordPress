<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

?>
	<?php
		if ( ! ( is_404() || ( is_page() && is_front_page() ) == true ) ) {
			get_template_part( 'template-parts/footer/shortcodes' );
		}
	?>
	</div><!-- #content -->

	<footer id="footer" class="site-footer">
		<?php
			get_template_part( 'template-parts/footer/widgets-area' );
			get_template_part( 'template-parts/footer/site-info' );
		?>
	</footer><!-- #footer -->
</div><!-- #page -->
<?php do_action( 'dt_corpo_before_footer' ); ?>
<?php wp_footer(); ?>

</body>
</html>
