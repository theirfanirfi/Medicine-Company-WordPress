<?php

/**
 * Services Addon for the theme.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/services
 */

/**
 * The class for service addon.
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/services
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Services {

	/**
	 * The key for registering service post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/services/post_type_key    $post_type_key  Store the post type key.
	 */
	protected $post_type_key;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->post_type_key = 'corpo_service';

		// Register Meta box
		// $this->add_metabox();
	}

	/**
	 * Register custom post type.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function regiter_post_type() {

		$labels = array(
			'name'					=> _x( 'Services', 'Post Type General Name', 'corpo-ess' ),
			'singular_name'			=> _x( 'Service', 'Post Type Singular Name', 'corpo-ess' ),
			'menu_name'				=> esc_html__( 'Corpo Services', 'corpo-ess' ),
			'name_admin_bar'		=> esc_html__( 'Service', 'corpo-ess' ),
			'archives'				=> esc_html__( 'Service Archives', 'corpo-ess' ),
			'attributes'			=> esc_html__( 'Service Attributes', 'corpo-ess' ),
			'parent_item_colon'		=> esc_html__( 'Parent Service:', 'corpo-ess' ),
			'all_items'				=> esc_html__( 'All Services', 'corpo-ess' ),
			'add_new_item'			=> esc_html__( 'Add New Service', 'corpo-ess' ),
			'add_new'				=> esc_html__( 'Add New', 'corpo-ess' ),
			'new_item'				=> esc_html__( 'New Service', 'corpo-ess' ),
			'edit_item'				=> esc_html__( 'Edit Service', 'corpo-ess' ),
			'update_item'			=> esc_html__( 'Update Service', 'corpo-ess' ),
			'view_item'				=> esc_html__( 'View Service', 'corpo-ess' ),
			'view_items'			=> esc_html__( 'View Services', 'corpo-ess' ),
			'search_items'			=> esc_html__( 'Search Service', 'corpo-ess' ),
			'not_found'				=> esc_html__( 'Not found', 'corpo-ess' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'corpo-ess' ),
			'featured_image'		=> esc_html__( 'Service Banner', 'corpo-ess' ),
			'set_featured_image'	=> esc_html__( 'Set banner image', 'corpo-ess' ),
			'remove_featured_image'	=> esc_html__( 'Remove banner image', 'corpo-ess' ),
			'use_featured_image'	=> esc_html__( 'Use as banner image', 'corpo-ess' ),
			'insert_into_item'		=> esc_html__( 'Insert into service', 'corpo-ess' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this service', 'corpo-ess' ),
			'items_list'			=> esc_html__( 'Services list', 'corpo-ess' ),
			'items_list_navigation'	=> esc_html__( 'Services list navigation', 'corpo-ess' ),
			'filter_items_list'		=> esc_html__( 'Filter services list', 'corpo-ess' ),
		);
		$rewrite = array(
			'slug'					=> 'services',
			'with_front'			=> true,
			'pages'					=> true,
			'feeds'					=> true,
		);
		$capabilities = array(
			'edit_post'				=> 'edit_services',
			'read_post'				=> 'read_services',
			'delete_post'			=> 'delete_services',
			'edit_posts'			=> 'edit_servicess',
			'edit_others_posts'		=> 'edit_others_servicess',
			'publish_posts'			=> 'publish_servicess',
			'read_private_posts'	=> 'read_private_servicess',
		);
		$args = array(
			'label'					=> esc_html__( 'Service', 'corpo-ess' ),
			'description'			=> esc_html__( 'Services post type for describe services.', 'corpo-ess' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'			=> false,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu' 			=> true,
			'menu_position'			=> 70,
			'menu_icon'				=> 'dashicons-admin-page',
			'show_in_admin_bar'		=> true,
			'show_in_nav_menus'		=> true,
			'can_export'			=> true,
			'has_archive'			=> true,		
			'exclude_from_search'	=> true,
			'publicly_queryable'	=> true,
			'rewrite'				=> $rewrite,
			// 'capabilities'			=> $capabilities,
		);

		register_post_type( $this->post_type_key, $args );

	}

	/**
	 * Add Capabilities for this post type
	 *
	 * @todo  add this on register_activation_hook
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function add_capabilities() {

		$role = get_role('administrator');
		$role->add_cap('edit_service');
		$role->add_cap('read_service');
		$role->add_cap('delete_service');
		$role->add_cap('edit_services');
		$role->add_cap('edit_others_services');
		$role->add_cap('publish_services');
		$role->add_cap('read_private_services');

	}

	/**
	 * Register meta box for service
	 *
	 * This is require codestar framework.
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	
	public function add_metabox( $options ) {
		
		$options[]		= array(
			'id'			=> '_corpo_services_details',
			'title'			=> esc_html__( 'Service Settings For Tab', 'corpo-ess' ),
			'post_type'		=> $this->post_type_key,
			'context'		=> 'normal',
			'priority'		=> 'default',
			'sections'		=> array(

				array(
					'name'		=> 'corpo_service_details',
					'fields'	=> array(

						array(
							'id'		=> 'name',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Title', 'corpo-ess' ),
						),

						array(
							'id'		=> 'subtitle',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Subtitle', 'corpo-ess' ),
						),

						array(
							'id'		=> 'archive_title',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Title for Archive', 'corpo-ess' ),
						),

						array(
							'id'		=> 'icon',
							'type'		=> 'icon',
							'title'		=> esc_html__( 'Icon', 'corpo-ess' ),
						),

						array(
							'id'		=> 'content',
							'type'		=> 'textarea',
							'title'		=> esc_html__( 'Content', 'corpo-ess' )
						),

						array(
							'id'				=> 'features',
							'type'				=> 'group',
							'title'				=> esc_html__( 'Features', 'corpo-ess' ),
							'button_title'		=> esc_html__( 'Add New', 'corpo-ess' ),
							'accordion_title'	=> esc_html__( 'Add New Feature', 'corpo-ess' ),
							'fields'			=> array(
								array(
									'id'		=> 'name',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Name', 'corpo-ess' ),
								),
								array(
									'id'		=> 'icon',
									'type'		=> 'icon',
									'title'		=> esc_html__( 'Icon', 'corpo-ess' ),
								),
							),
						),

					),
				),

			),
		);

		return $options;

	}

	/**
	 * Display Service ID in WordPress admin
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	
	public function add_id_column( $columns ) {
		$columns['service_id'] = 'ID';
		return $columns;
	}

	// Add it.
	public function add_column_content( $column, $id ) {
		if( 'service_id' == $column ) {
			echo $id;
		}
	}

}
