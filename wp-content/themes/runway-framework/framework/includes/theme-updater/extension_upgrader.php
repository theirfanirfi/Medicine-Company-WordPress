<?php

class Extension_Upgrader extends Theme_Upgrader {

	public function upgrade_strings() {

		$this->strings['up_to_date']          = __( 'The extension is at the latest version.', 'runway' );
		$this->strings['no_package']          = __( 'Update package not available.', 'runway' );
		$this->strings['downloading_package'] = __( 'Downloading update from <span class="code">%s</span>&#8230;', 'runway' );
		$this->strings['unpack_package']      = __( 'Unpacking the update&#8230;', 'runway' );
		$this->strings['remove_old']          = __( 'Removing the old version of the extension&#8230;', 'runway' );
		$this->strings['remove_old_failed']   = __( 'Could not remove the old extension.', 'runway' );
		$this->strings['process_failed']      = __( 'Extension update failed.', 'runway' );
		$this->strings['process_success']     = __( 'Extension updated successfully.', 'runway' );

	}

	public function install_strings() {

		$this->strings['no_package']          = __( 'Install package not available.', 'runway' );
		$this->strings['downloading_package'] = __( 'Downloading install package from <span class="code">%s</span>&#8230;', 'runway' );
		$this->strings['unpack_package']      = __( 'Unpacking the package&#8230;', 'runway' );
		$this->strings['installing_package']  = __( 'Installing the extension&#8230;', 'runway' );
		$this->strings['no_files']            = __( 'The extension contains no files.', 'runway' );
		$this->strings['process_failed']      = __( 'Extension install failed.', 'runway' );
		$this->strings['process_success']     = __( 'Extension installed successfully.', 'runway' );
		/* translators: 1: theme name, 2: version */
		$this->strings['process_success_specific'] = __( 'Successfully installed the extension <strong>%1$s %2$s</strong>.', 'runway' );
		$this->strings['parent_theme_search']      = __( 'This extension requires a parent extension. Checking if it is installed&#8230;', 'runway' );
		/* translators: 1: theme name, 2: version */
		$this->strings['parent_theme_prepare_install'] = __( 'Preparing to install <strong>%1$s %2$s</strong>&#8230;', 'runway' );
		/* translators: 1: theme name, 2: version */
		$this->strings['parent_theme_currently_installed'] = __( 'The parent extension, <strong>%1$s %2$s</strong>, is currently installed.', 'runway' );
		/* translators: 1: theme name, 2: version */
		$this->strings['parent_theme_install_success'] = __( 'Successfully installed the parent extension, <strong>%1$s %2$s</strong>.', 'runway' );
		$this->strings['parent_theme_not_found']       = __(
			'<strong>The parent extension could not be found.</strong> You will need to install the parent extension, <strong>%s</strong>, before you can use this child extension.',
			'runway'
		);

	}

	public function bulk_upgrade( $extensions, $args = array() ) {

		$defaults    = array(
			'clear_update_cache' => true,
		);
		$parsed_args = wp_parse_args( $args, $defaults );

		$this->init();
		$this->bulk = true;
		$this->upgrade_strings();

		$current = get_site_transient( 'update_themes' );

		add_filter( 'upgrader_pre_install', array( $this, 'current_before' ), 10, 2 );
		add_filter( 'upgrader_post_install', array( $this, 'current_after' ), 10, 2 );
		add_filter( 'upgrader_clear_destination', array( $this, 'delete_old_theme' ), 10, 4 );

		$this->skin->header();

		// Connect to the Filesystem first.
		$res = $this->fs_connect( array( WP_CONTENT_DIR ) );
		if ( ! $res ) {
			$this->skin->footer();

			return false;
		}

		$this->skin->bulk_header();

		// Only start maintenance mode if:
		// - running Multisite and there are one or more themes specified, OR
		// - a theme with an update available is currently in use.
		// @TODO: For multisite, maintenance mode should only kick in for individual sites if at all possible.
		$maintenance = ( is_multisite() && ! empty( $extensions ) );
		foreach ( $extensions as $extension ) {
			$maintenance = $maintenance || $extension == get_stylesheet() || $extension == get_template();
		}
		if ( $maintenance ) {
			$this->maintenance_mode( true );
		}

		$results = array();

		$this->update_count   = count( $extensions );
		$this->update_current = 0;

		foreach ( $extensions as $extension ) {
			$this->update_current ++;

			$this->skin->theme_info = $this->theme_info( $extension );

			if ( ! isset( $current->extensions[ $extension ] ) ) {
				$this->skin->set_result( true );
				$this->skin->before();
				$this->skin->feedback( 'up_to_date' );
				$this->skin->after();
				$results[ $extension ] = true;
				continue;
			}

			// Get the URL to the zip file
			$r = $current->extensions[ $extension ];

			$result = $this->run( array(
				'package'           => $r['package'],
				'destination'       => get_theme_root( $extension ),
				'clear_destination' => true,
				'clear_working'     => true,
				'hook_extra'        => array(
					'theme' => $extension
				),
			) );

			$results[ $extension ] = $this->result;

			// Prevent credentials auth screen from displaying multiple times
			if ( false === $result ) {
				break;
			}
		} //end foreach $plugins

		$this->maintenance_mode( false );

		do_action( 'upgrader_process_complete', $this, array(
			'action' => 'update',
			'type'   => 'theme',
			'bulk'   => true,
			'themes' => $extensions,
		) );

		$this->skin->bulk_footer();

		$this->skin->footer();

		// Cleanup our hooks, in case something else does a upgrade on this connection.
		remove_filter( 'upgrader_pre_install', array( $this, 'current_before' ) );
		remove_filter( 'upgrader_post_install', array( $this, 'current_after' ) );
		remove_filter( 'upgrader_clear_destination', array( $this, 'delete_old_theme' ) );

		// Refresh the Theme Update information
		wp_clean_themes_cache( $parsed_args['clear_update_cache'] );

		return $results;

	}

}

require_once __DIR__ . '/bulk_extension_upgrader_skin.php';
