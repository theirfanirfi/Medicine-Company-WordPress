<?php
global $apm, $alias_;

$pages_dir = $apm->pages_dir;

if ( ! function_exists( 'get_copy_alias' ) ) {
	function get_copy_alias( $alias ) {

		global $apm, $alias_;
		$pages     = $apm->get_pages_list();
		$check_sum = 0;
		foreach ( $pages as $page ) {
			if ( $alias == $page->settings->alias ) {
				$check_sum++;
			}
		}

		if ( $check_sum > 0 ) {
			$alias_ .= '-copy';
			get_copy_alias( $alias . '-copy' );
		}

	}
}

if ( get_stylesheet_directory() == get_template_directory() ) {
	echo '<br>' . __( 'You must create or activate a Runway child theme to add options pages', 'runway' ) .
	     ': <a href="' . admin_url( 'admin.php?page=themes' ) . '">' . __( 'Runway Themes', 'runway' ) . '</a>';
} else {
	if ( ! isset( $this->navigation ) || empty( $this->navigation ) ) {
		$this->navigation = 'list-pages';
	}

	switch ( $this->navigation ) {
		case 'new-page': {
			$new_page_id = time();

			$page = array(
				'settings' => array(
					'page_id'          => $new_page_id,
					'title'            => __( 'New Options Page', 'runway' ),
					'alias'            => 'options-page',
					'adminMenuTopItem' => 'current-theme',
					'showPageTitle'    => 'true',
				),
				'elements' => array(),
			);

			$page_json = json_encode( $page );

			include_once __DIR__ . '/views/page-builder.php';

		}
			break;

		// edit page
		case 'edit-page': {
			$wp_filesystem = get_runway_wp_filesystem();

			$page_id = $_GET['page_id'];

			if ( file_exists( $pages_dir . $page_id . '.json' ) ) {
				$page_json = $wp_filesystem->get_contents( runway_prepare_path( $pages_dir . $page_id . '.json' ) );
				$page      = json_decode( $page_json, true );

				$page      = $apm->inputs_decode( $page );
				$page_json = addslashes( $page_json );

				include_once __DIR__ . '/views/page-builder.php';
			} else {
				wp_die( __( 'Page not found', 'runway' ) );
			}
		}
			break;

		// list available pages
		case 'list-pages': {
			$pages = $apm->get_pages_list();
			include_once __DIR__ . '/views/list-pages.php';

		}
			break;

		case 'confirm-remove-page': {
			$wp_filesystem = get_runway_wp_filesystem();
			$page_id       = $_GET['page_id'];

			if ( file_exists( $pages_dir . $page_id . '.json' ) ) {
				$page_json = $wp_filesystem->get_contents( runway_prepare_path( $pages_dir . $page_id . '.json' ) );
				$page      = json_decode( $page_json, true );

				$item_confirm   = 'option page';
				$item_title     = $page['settings']['title'];
				$action_url_yes = admin_url( 'admin.php?page=options-builder&navigation=remove-page&page_id=' . $page_id . '&_wpnonce=' . wp_create_nonce( 'remove-page' ) );
				$action_url_no  = admin_url( 'admin.php?page=options-builder' );

				require_once get_template_directory() . '/framework/templates/delete-confirmation.php';
			} else {
				wp_die( __( 'Page not found', 'runway' ) );
			}
		}
			break;

		case 'remove-page': {
			check_admin_referer( 'remove-page' );

			$apm->del_page( $_GET['page_id'], $pages_dir );
			$pages = $apm->get_pages_list();

			include_once __DIR__ . '/views/list-pages.php';
		}
			break;

		case 'duplicate-page': {
			check_admin_referer( 'duplicate-page' );

			$wp_filesystem = get_runway_wp_filesystem();

			$page_id = $_GET['page_id'];

			if ( file_exists( $pages_dir . $page_id . '.json' ) ) {
				$page_json = $wp_filesystem->get_contents( runway_prepare_path( $pages_dir . $page_id . '.json' ) );
				$page      = json_decode( $page_json );

				$page->settings->page_id = time();
				$page->settings->title   = $page->settings->title . ' (' . __( 'copy', 'runway' ) . ')';
				$new_alias               = sanitize_title( $page->settings->title );
				$alias_                  = $new_alias;
				get_copy_alias( $new_alias );
				$page->settings->alias = $alias_;

				$page_json = json_encode( $page );

				foreach ( $page->elements as $element ) {
					// replace indexes
					if ( is_object( $element ) && property_exists( $element, 'index' ) ) {
						$old_index = $element->index;
						$new_index = $apm->make_ID();
						$page_json = str_replace( '"' . $old_index . '"', '"' . $new_index . '"', $page_json );

						// replace aliases
						if ( $element->template === 'field' ) {
							$old_el_alias = $element->alias;
							$new_el_alias = $old_el_alias . '-copy';
							$page_json    = str_replace(
								array(
									'"alias":"' . $old_el_alias . '"',
									'"conditionalAlias":"' . $old_el_alias . '"'
								),
								array(
									'"alias":"' . $new_el_alias . '"',
									'"conditionalAlias":"' . $new_el_alias . '"'
								),
								$page_json
							);
						}
					}
				}

				$wp_filesystem->put_contents(
					runway_prepare_path( $pages_dir . $page->settings->page_id . '.json' ),
					$page_json,
					FS_CHMOD_FILE
				);

				$pages = $apm->get_pages_list();
				include_once __DIR__ . '/views/list-pages.php';
			} else {
				wp_die( __( 'Page not found', 'runway' ) );
			}

			include_once __DIR__ . '/views/list-pages.php';
		}
			break;

		case 'reset-fields-page': {
			check_admin_referer( 'reset-fields-page' );

			$apm->reset_to_default( $pages_dir, $_GET['page_id'] );
			$pages = $apm->get_pages_list();

			include_once __DIR__ . '/views/list-pages.php';
		}
			break;

		default : {
			include_once __DIR__ . '/views/list-pages.php';
		}
			break;

	}

}
