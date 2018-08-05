<nav class="corpo_bs_navbar navbar navbar-default">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#corpo_navbar_render" aria-expanded="false">
				<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'dt-corpo' ); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		</div>

		<?php
			wp_nav_menu( array(
				'menu'              => 'main',
				'theme_location'    => 'main',
				'depth'             => 4,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'corpo_navbar_render',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker())
			);
		?>
	</div><!-- /.container -->
</nav><!-- .corpo_bs_navbar -->
<div id="nav_fake_supporter"></div>