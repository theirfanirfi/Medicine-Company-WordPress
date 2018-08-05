<?php

/**
 * Team Member Addon for the theme.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/team
 */

/**
 * The class for team member addon.
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/team
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Team {

	/**
	 * The key for registering team member post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/team/post_type_key    $post_type_key  Store the post type key.
	 */
	protected $post_type_key;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->post_type_key = 'corpo_member';

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
			'name'					=> _x( 'Members', 'Post Type General Name', 'corpo-ess' ),
			'singular_name'			=> _x( 'Member', 'Post Type Singular Name', 'corpo-ess' ),
			'menu_name'				=> esc_html__( 'Corpo Team', 'corpo-ess' ),
			'name_admin_bar'		=> esc_html__( 'Member', 'corpo-ess' ),
			'archives'				=> esc_html__( 'Member Archives', 'corpo-ess' ),
			'attributes'			=> esc_html__( 'Member Attributes', 'corpo-ess' ),
			'parent_item_colon'		=> esc_html__( 'Parent Member:', 'corpo-ess' ),
			'all_items'				=> esc_html__( 'All Members', 'corpo-ess' ),
			'add_new_item'			=> esc_html__( 'Add New Member', 'corpo-ess' ),
			'add_new'				=> esc_html__( 'Add New', 'corpo-ess' ),
			'new_item'				=> esc_html__( 'New Member', 'corpo-ess' ),
			'edit_item'				=> esc_html__( 'Edit Member', 'corpo-ess' ),
			'update_item'			=> esc_html__( 'Update Member', 'corpo-ess' ),
			'view_item'				=> esc_html__( 'View Member', 'corpo-ess' ),
			'view_items'			=> esc_html__( 'View Members', 'corpo-ess' ),
			'search_items'			=> esc_html__( 'Search Member', 'corpo-ess' ),
			'not_found'				=> esc_html__( 'Not found', 'corpo-ess' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'corpo-ess' ),
			'featured_image'		=> esc_html__( 'Profile Image', 'corpo-ess' ),
			'set_featured_image'	=> esc_html__( 'Set profile image', 'corpo-ess' ),
			'remove_featured_image'	=> esc_html__( 'Remove profile image', 'corpo-ess' ),
			'use_featured_image'	=> esc_html__( 'Use as profile image', 'corpo-ess' ),
			'insert_into_item'		=> esc_html__( 'Insert into member', 'corpo-ess' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this member', 'corpo-ess' ),
			'items_list'			=> esc_html__( 'Members list', 'corpo-ess' ),
			'items_list_navigation'	=> esc_html__( 'Members list navigation', 'corpo-ess' ),
			'filter_items_list'		=> esc_html__( 'Filter members list', 'corpo-ess' ),
		);
		$rewrite = array(
			'slug'					=> 'team',
			'with_front'			=> true,
			'pages'					=> true,
			'feeds'					=> true,
		);
		$capabilities = array(
			'edit_post'				=> 'edit_member',
			'read_post'				=> 'read_member',
			'delete_post'			=> 'delete_member',
			'edit_posts'			=> 'edit_members',
			'edit_others_posts'		=> 'edit_others_members',
			'publish_posts'			=> 'publish_members',
			'read_private_posts'	=> 'read_private_members',
		);
		$args = array(
			'label'					=> esc_html__( 'Member', 'corpo-ess' ),
			'description'			=> esc_html__( 'Team Member profiles post type', 'corpo-ess' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'			=> false,
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_menu' 			=> true,
			'menu_position'			=> 70,
			'menu_icon'				=> 'dashicons-groups',
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
		$role->add_cap('edit_member');
		$role->add_cap('read_member');
		$role->add_cap('delete_member');
		$role->add_cap('edit_members');
		$role->add_cap('edit_others_members');
		$role->add_cap('publish_members');
		$role->add_cap('read_private_members');

	}

	/**
	 * Register meta box for team member
	 *
	 * This is require codestar framework.
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	
	public function add_metabox( $options ) {
		
		$options[]		= array(
			'id'			=> '_corpo_member_details',
			'title'			=> esc_html__( 'Member Details', 'corpo-ess' ),
			'post_type'		=> $this->post_type_key,
			'context'		=> 'normal',
			'priority'		=> 'default',
			'sections'		=> array(

				array(
					'name'		=> 'corpo_member_details',
					'fields'	=> array(

						array(
							'id'		=> 'first_name',
							'type'		=> 'text',
							'title'		=> esc_html__( 'First Name', 'corpo-ess' ),
						),

						array(
							'id'		=> 'last_name',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Last Name', 'corpo-ess' ),
						),

						array(
							'id'		=> 'title',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Job Title', 'corpo-ess' ),
						),

						array(
							'id'		=> 'bio',
							'type'		=> 'textarea',
							'title'		=> esc_html__( 'Short Bio', 'corpo-ess' ),
						),

						array(
							'id'				=> 'social_profiles',
							'type'				=> 'group',
							'title'				=> esc_html__( 'Social Profiles', 'corpo-ess' ),
							'button_title'		=> esc_html__( 'Add New', 'corpo-ess' ),
							'accordion_title'	=> esc_html__( 'Add New Profile', 'corpo-ess' ),
							'fields'			=> array(
								array(
									'id'		=> 'name',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Name', 'corpo-ess' ),
								),
								array(
									'id'		=> 'link',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Link', 'corpo-ess' ),
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
	 * Display member ID in WordPress admin
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	
	public function add_id_column( $columns ) {
		$columns['member_id'] = 'ID';
		return $columns;
	}

	// Add it.
	public function add_column_content( $column, $id ) {
		if( 'member_id' == $column ) {
			echo $id;
		}
	}

}
