<?php

/**
 * Testimonials Addon for the theme.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/team
 */

/**
 * The class for testimonials addon.
 *
 * Loading visual composer map and templates
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/testimonials
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Testimonials {

	/**
	 * The key for registering team testimonials post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/testimonials/post_type_key    $post_type_key  Store the post type key.
	 */
	protected $post_type_key;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->post_type_key = 'corpo_testimonial';

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
			'name'					=> _x( 'Testimonials', 'Post Type General Name', 'corpo-ess' ),
			'singular_name'			=> _x( 'Testimonial', 'Post Type Singular Name', 'corpo-ess' ),
			'menu_name'				=> esc_html__( 'Corpo Testimonials', 'corpo-ess' ),
			'name_admin_bar'		=> esc_html__( 'Testimonial', 'corpo-ess' ),
			'archives'				=> esc_html__( 'Testimonial Archives', 'corpo-ess' ),
			'attributes'			=> esc_html__( 'Testimonial Attributes', 'corpo-ess' ),
			'parent_item_colon'		=> esc_html__( 'Parent testimonial:', 'corpo-ess' ),
			'all_items'				=> esc_html__( 'All testimonials', 'corpo-ess' ),
			'add_new_item'			=> esc_html__( 'Add New testimonial', 'corpo-ess' ),
			'add_new'				=> esc_html__( 'Add New', 'corpo-ess' ),
			'new_item'				=> esc_html__( 'New testimonial', 'corpo-ess' ),
			'edit_item'				=> esc_html__( 'Edit testimonial', 'corpo-ess' ),
			'update_item'			=> esc_html__( 'Update testimonial', 'corpo-ess' ),
			'view_item'				=> esc_html__( 'View testimonial', 'corpo-ess' ),
			'view_items'			=> esc_html__( 'View testimonials', 'corpo-ess' ),
			'search_items'			=> esc_html__( 'Search testimonial', 'corpo-ess' ),
			'not_found'				=> esc_html__( 'Not found', 'corpo-ess' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'corpo-ess' ),
			'featured_image'		=> esc_html__( 'Profile Image', 'corpo-ess' ),
			'set_featured_image'	=> esc_html__( 'Set author image', 'corpo-ess' ),
			'remove_featured_image'	=> esc_html__( 'Remove author image', 'corpo-ess' ),
			'use_featured_image'	=> esc_html__( 'Use as author image', 'corpo-ess' ),
			'insert_into_item'		=> esc_html__( 'Insert into testimonial', 'corpo-ess' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this testimonial', 'corpo-ess' ),
			'items_list'			=> esc_html__( 'Testimonials list', 'corpo-ess' ),
			'items_list_navigation'	=> esc_html__( 'Testimonials list navigation', 'corpo-ess' ),
			'filter_items_list'		=> esc_html__( 'Filter testimonials list', 'corpo-ess' ),
		);
		$capabilities = array(
			'edit_post'				=> 'edit_testimonial',
			'read_post'				=> 'read_testimonial',
			'delete_post'			=> 'delete_testimonial',
			'edit_posts'			=> 'edit_testimonials',
			'edit_others_posts'		=> 'edit_others_testimonials',
			'publish_posts'			=> 'publish_testimonials',
			'read_private_posts'	=> 'read_private_testimonials',
		);
		$args = array(
			'label'					=> esc_html__( 'Testimonial', 'corpo-ess' ),
			'description'			=> esc_html__( 'Testimonial post type', 'corpo-ess' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'			=> false,
			'public'				=> false,
			'show_ui'				=> true,
			'show_in_menu' 			=> true,
			'menu_position'			=> 70,
			'menu_icon'				=> 'dashicons-editor-quote',
			'show_in_admin_bar'		=> true,
			'show_in_nav_menus'		=> true,
			'can_export'			=> true,
			'has_archive'			=> false,		
			'exclude_from_search'	=> true,
			'publicly_queryable'	=> false,
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
		$role->add_cap('edit_testimonial');
		$role->add_cap('read_testimonial');
		$role->add_cap('delete_testimonial');
		$role->add_cap('edit_testimonials');
		$role->add_cap('edit_others_testimonials');
		$role->add_cap('publish_testimonials');
		$role->add_cap('read_private_testimonials');

	}

	/**
	 * Register meta box for Testimonials
	 *
	 * This is require codestar framework.
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	
	public function add_metabox( $options ) {
		
		$options[]		= array(
			'id'			=> '_corpo_testimonial_details',
			'title'			=> esc_html__( 'Testimonial Details', 'corpo-ess' ),
			'post_type'		=> $this->post_type_key,
			'context'		=> 'normal',
			'priority'		=> 'default',
			'sections'		=> array(

				array(
					'name'		=> 'corpo_testimonial_details',
					'fields'	=> array(

						array(
							'id'		=> 'name',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Full Name', 'corpo-ess' ),
						),

						array(
							'id'		=> 'title',
							'type'		=> 'text',
							'title'		=> esc_html__( 'Job Title', 'corpo-ess' ),
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
		$columns['testimonial_id'] = 'ID';
		return $columns;
	}

	// Add it.
	public function add_column_content( $column, $id ) {
		if( 'testimonial_id' == $column ) {
			echo $id;
		}
	}

}
