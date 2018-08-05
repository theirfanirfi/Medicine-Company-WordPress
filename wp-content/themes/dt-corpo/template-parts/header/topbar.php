<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */
if ( ! has_nav_menu( 'topbar_left' ) &&  ! has_nav_menu( 'topbar_right' ) ) {
	return;
}
?>
<div class="corpo_top_bar">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php
					if ( has_nav_menu( 'topbar_left' ) ) {
						wp_nav_menu( array(
							'theme_location' 	=> 'topbar_left',
							'container'			=> false,
							'depth'				=> 1,
							'menu_class'		=> 'top_bar_nav',
							'walker'			=> new Topbar_Menu_Walker()
						) );
					}
				?>
			</div><!-- /.col-md-8 -->
			<div class="col-md-4">
				<?php
					if ( has_nav_menu( 'topbar_right' ) ) {
						wp_nav_menu( array(
							'theme_location' 	=> 'topbar_right',
							'container'			=> false,
							'depth'				=> 1,
							'link_before'		=> '<span class="sr-only">',
							'link_after'		=> '</span>',
							'menu_class'		=> 'top_bar_nav pull-right',
							'walker'			=> new Topbar_Menu_Walker()
						) );
					}
				?>
			</div><!-- /.col-md-4 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.corpo_top_bar -->