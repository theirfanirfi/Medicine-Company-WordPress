<div id="wpbody">
	<div id="wpbody-content">

		<div class="about-wrap">

			<h1>
				<?php echo __( 'Welcome to Runway', 'runway' ); ?>
				<span class="version">
					<?php
					$framework = wp_get_theme( 'runway-framework' );
					if ( $framework->exists() ) {
						echo 'Version ' . $framework->Version;
					}
					?>
				</span>
			</h1>

			<div class="about-text">
				<?php echo __( 'A better way to create WordPress themes. Runway is a powerful development environment for making awesome themes', 'runway' ); ?>.
			</div>

			<div class="runway-badge"><br></div>

			<div class="clear"></div>

			<?php global $Dashboard_Admin; ?>

			<h2 class="nav-tab-wrapper tab-controlls">
				<a data-tabrel="#getting-started" href="#getting-started" class="nav-tab nav-tab-active">
					<?php echo __( 'Getting Started', 'runway' ); ?>
				</a>
				<a data-tabrel="#support" href="#support" class="nav-tab">
					<?php echo __( 'Help', 'runway' ); ?>
					&amp; <?php echo __( 'Support', 'runway' ); ?>
				</a>
				<a data-tabrel="#release-notes" href="#release-notes" class="nav-tab">
					<?php echo __( 'Release Notes', 'runway' ); ?></a>
				<a data-tabrel="#credits" href="#credits" class="nav-tab">
					<?php echo __( 'Credits', 'runway' ); ?>
				</a>
			</h2>

			<div id="getting-started" class="tab tab-active">
				<?php include_once __DIR__ . '/views/getting-started.php'; ?>
			</div>
			<div id="support" class="tab">
				<?php include_once __DIR__ . '/views/support.php'; ?>
			</div>
			<div id="release-notes" class="tab">
				<?php include_once __DIR__ . '/views/release-notes.php'; ?>
			</div>
			<div id="credits" class="tab">
				<?php include_once __DIR__ . '/views/credits.php'; ?>
			</div>

			<div class="clear"></div>
		</div><!-- about-wrap -->


		<div class="clear"></div>
	</div><!-- wpbody-content -->

	<div class="clear"></div>
</div> <!-- id="wpbody" -->
