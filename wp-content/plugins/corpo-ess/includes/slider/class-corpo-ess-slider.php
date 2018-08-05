<?php

/**
 * Slider Addon for the theme.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/team
 */

/**
 * The class for slider addon.
 *
 * Slider addon for the theme
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/slider
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Slider {

	/**
	 * The key for registering team slider post type.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      corpo-ess/slider/post_type_key    $post_type_key  Store the post type key.
	 */
	protected $post_type_key;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->post_type_key = 'corpo_slider';

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
			'name'					=> _x( 'Sliders', 'Post Type General Name', 'corpo-ess' ),
			'singular_name'			=> _x( 'Slider', 'Post Type Singular Name', 'corpo-ess' ),
			'menu_name'				=> esc_html__( 'Corpo Sliders', 'corpo-ess' ),
			'name_admin_bar'		=> esc_html__( 'Slider', 'corpo-ess' ),
			'archives'				=> esc_html__( 'Slider Archives', 'corpo-ess' ),
			'attributes'			=> esc_html__( 'Slider Attributes', 'corpo-ess' ),
			'parent_item_colon'		=> esc_html__( 'Parent slider:', 'corpo-ess' ),
			'all_items'				=> esc_html__( 'All sliders', 'corpo-ess' ),
			'add_new_item'			=> esc_html__( 'Add New slider', 'corpo-ess' ),
			'add_new'				=> esc_html__( 'Add New', 'corpo-ess' ),
			'new_item'				=> esc_html__( 'New slider', 'corpo-ess' ),
			'edit_item'				=> esc_html__( 'Edit slider', 'corpo-ess' ),
			'update_item'			=> esc_html__( 'Update slider', 'corpo-ess' ),
			'view_item'				=> esc_html__( 'View slider', 'corpo-ess' ),
			'view_items'			=> esc_html__( 'View sliders', 'corpo-ess' ),
			'search_items'			=> esc_html__( 'Search slider', 'corpo-ess' ),
			'not_found'				=> esc_html__( 'Not found', 'corpo-ess' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'corpo-ess' ),
			'featured_image'		=> esc_html__( 'Defaut Image', 'corpo-ess' ),
			'set_featured_image'	=> esc_html__( 'Set default image', 'corpo-ess' ),
			'remove_featured_image'	=> esc_html__( 'Remove default image', 'corpo-ess' ),
			'use_featured_image'	=> esc_html__( 'Use as default image', 'corpo-ess' ),
			'insert_into_item'		=> esc_html__( 'Insert into slider', 'corpo-ess' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this slider', 'corpo-ess' ),
			'items_list'			=> esc_html__( 'Sliders list', 'corpo-ess' ),
			'items_list_navigation'	=> esc_html__( 'Sliders list navigation', 'corpo-ess' ),
			'filter_items_list'		=> esc_html__( 'Filter sliders list', 'corpo-ess' ),
		);
		$capabilities = array(
			'edit_post'				=> 'edit_slider',
			'read_post'				=> 'read_slider',
			'delete_post'			=> 'delete_slider',
			'edit_posts'			=> 'edit_sliders',
			'edit_others_posts'		=> 'edit_others_sliders',
			'publish_posts'			=> 'publish_sliders',
			'read_private_posts'	=> 'read_private_sliders',
		);
		$args = array(
			'label'					=> esc_html__( 'Slider', 'corpo-ess' ),
			'description'			=> esc_html__( 'Slider post type', 'corpo-ess' ),
			'labels'				=> $labels,
			'supports'				=> array( 'title' ),
			'hierarchical'			=> false,
			'public'				=> false,
			'show_ui'				=> true,
			'show_in_menu' 			=> true,
			'menu_position'			=> 70,
			'menu_icon'				=> 'dashicons-slides',
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
		$role->add_cap('edit_slider');
		$role->add_cap('read_slider');
		$role->add_cap('delete_slider');
		$role->add_cap('edit_sliders');
		$role->add_cap('edit_others_sliders');
		$role->add_cap('publish_sliders');
		$role->add_cap('read_private_sliders');

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
			'id'			=> '_corpo_slider_data',
			'title'			=> esc_html__( 'Slider Management Interface', 'corpo-ess' ),
			'post_type'		=> $this->post_type_key,
			'context'		=> 'normal',
			'priority'		=> 'default',
			'sections'		=> array(

				array(
					'name'		=> 'corpo_slider_data',
					'fields'	=> array(

						array(
							'type'		=> 'subheading',
							'content'	=> esc_html__( 'Slider Settings', 'corpo-ess' ),
						),

						array(
							'id'		=> 'style',
							'type'		=> 'radio',
							'title'		=> esc_html__( 'Style', 'corpo-ess' ),
							'class'		=> 'horizontal',
							'options'	=> array(
								'1'		=> esc_html__( 'Default', 'corpo-ess' ),
								'2'		=> esc_html__( 'Alternate', 'corpo-ess' ),
							),

							'default'	=> '1'
						),

						array(
							'id'		=> 'fade',
							'type'		=> 'switcher',
							'title'		=> esc_html__( 'Fade Effect', 'corpo-ess' ),
							'default'	=> true
						),

						array(
							'id'		=> 'navigation',
							'type'		=> 'switcher',
							'title'		=> esc_html__( 'Display Navigation', 'corpo-ess' ),
							'default'	=> true
						),

						array(
							'id'		=> 'pagination',
							'type'		=> 'switcher',
							'title'		=> esc_html__( 'Display Pagination', 'corpo-ess' ),
							'default'	=> true
						),

						array(
							'id'		=> 'loop',
							'type'		=> 'switcher',
							'title'		=> esc_html__( 'Loop', 'corpo-ess' ),
							'default'	=> true
						),

						array(
							'id'		=> 'autoplay',
							'type'		=> 'switcher',
							'title'		=> esc_html__( 'Autoplay', 'corpo-ess' ),
							'default'	=> true
						),

						array(
							'id'		=> 'autoplay_interval',
							'type'		=> 'number',
							'title'		=> esc_html__( 'Autoplay Interval', 'corpo-ess' ),
							'default'	=> '5000',
							'dependency'   => array( 'autoplay', '==', 'true' ),
						),

						array(
							'id'		=> 'speed',
							'type'		=> 'number',
							'title'		=> esc_html__( 'Speed', 'corpo-ess' ),
							'default'	=> '600'
						),

						array(
							'type'		=> 'subheading',
							'content'	=> esc_html__( 'Slides', 'corpo-ess' ),
						),

						array(
							'id'				=> 'slides',
							'type'				=> 'group',
							'title'				=> null,
							'button_title'		=> esc_html__( 'Add New', 'corpo-ess' ),
							'accordion_title'	=> 'title_main',
							'fields'			=> array(

								array(
									'id'		=> 'background',
									'type'		=> 'image',
									'title'		=> esc_html__( 'Background Image', 'corpo-ess' ),
								),

								array(
									'id'		=> 'overlay',
									'type'		=> 'switcher',
									'title'		=> esc_html__( 'Overlay Background', 'corpo-ess' ),
									'default'	=> true
								),

								array(
									'id'		=> 'title_small',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Title 1 (Small)', 'corpo-ess' ),
								),

								array(
									'id'		=> 'title_main',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Title 2 (Main)', 'corpo-ess' ),
								),

								array(
									'id'		=> 'content',
									'type'		=> 'textarea',
									'title'		=> esc_html__( 'Content', 'corpo-ess' ),
								),

								array(
									'id'		=> 'btn_1_text',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Button 1 Text', 'corpo-ess' ),
								),

								array(
									'id'		=> 'btn_1_link',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Button 1 Link', 'corpo-ess' ),
								),

								array(
									'id'		=> 'btn_2_text',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Button 2 Text', 'corpo-ess' ),
								),

								array(
									'id'		=> 'btn_2_link',
									'type'		=> 'text',
									'title'		=> esc_html__( 'Button 2 Link', 'corpo-ess' ),
								),
							),
							'default'			=> array(
								array(
									'title_small'	=> 'We Are The Corpo',
									'title_main'	=> 'For Financial Experts',
									'content'		=> 'Quickly promote inexpensive e-commerce with excellent meta-services. Appropriately reinvent cross-unit human',
									'btn_1_text'	=> 'View More',
									'btn_1_link'	=> '#link-1',
									'btn_2_text'	=> 'Buy Now',
									'btn_2_link'	=> '#link-2',
								),

								array(
									'title_small'	=> 'We Are The Corpo',
									'title_main'	=> 'For Financial Experts',
									'content'		=> 'Quickly promote inexpensive e-commerce with excellent meta-services. Appropriately reinvent cross-unit human',
									'btn_1_text'	=> 'View More',
									'btn_1_link'	=> '#link-1',
									'btn_2_text'	=> 'Buy Now',
									'btn_2_link'	=> '#link-2',
								),

								array(
									'title_small'	=> 'We Are The Corpo',
									'title_main'	=> 'For Financial Experts',
									'content'		=> 'Quickly promote inexpensive e-commerce with excellent meta-services. Appropriately reinvent cross-unit human',
									'btn_1_text'	=> 'View More',
									'btn_1_link'	=> '#link-1',
									'btn_2_text'	=> 'Buy Now',
									'btn_2_link'	=> '#link-2',
								),
							)
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
		$columns['slider_id'] = 'ID';
		return $columns;
	}

	// Add it.
	public function add_column_content( $column, $id ) {
		if( 'slider_id' == $column ) {
			echo $id;
		}
	}

	/**
	 * Render the slider
	 * @param  [type] $id the slider id or post id
	 */
	static function get_slider( $id, $class = '' ) {
		
		$meta = get_post_meta( $id, '_corpo_slider_data', true );

		$style = 1;

		if ( ! empty( $meta['style'] ) ) {
			$style = $meta['style'];
		}

		// Enqueue Style and Scripts
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'swiper' );
		wp_enqueue_script( 'swiper' );

		// Load template
		include plugin_dir_path( __FILE__ ) . 'partials/style-' . $style . '.php';
	}

}
