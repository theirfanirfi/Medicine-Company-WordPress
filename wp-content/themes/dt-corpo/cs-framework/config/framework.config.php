<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Framework settings
 * @var array
 */
$settings 			= array(
	'menu_title'		=> esc_html__( 'Corpo Settings', 'dt-corpo' ),
	'menu_type'			=> 'menu', // menu, submenu, options, theme, etc.
	'menu_slug'			=> 'corpo-framework',
	'ajax_save'			=> false,
	'show_reset_all'	=> false,
	'framework_title'	=> esc_html__( 'Corpo', 'dt-corpo' ) . '<small>' . esc_html( ' by Decent Themes', 'dt-corpo' ) . '</small>'
);

/**
 * Framework options
 * @var array
 */
$options        = array();

/**
 * General settings
 */
$options[]		= array(
	'name'		=> 'corpo_general_settings',
	'title'		=> esc_html__( 'General', 'dt-corpo' ),
	'icon'		=> 'fa fa-bars',
	'fields'      => array(

		array(
			'id'		=> 'corpo_back_to_top',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Back To Top Button', 'dt-corpo' ),
			'default'	=> true
		),

		array(
			'id'			=> 'corpo_preloader',
			'type'			=> 'select',
			'title'			=> esc_html__( 'Preloader Style', 'dt-corpo' ),
			'class'			=> 'chosen',
			'options'		=> array(
				''								=> esc_html__('No Preloader', 'dt-corpo' ),
				'ball-pulse-3'					=> esc_html__('Ball Pulse', 'dt-corpo' ),
				'ball-grid-pulse-9'				=> esc_html__('Ball Grid Pulse', 'dt-corpo' ),
				'ball-clip-rotate-1'			=> esc_html__('Ball Clip Rotate', 'dt-corpo' ),
				'ball-clip-rotate-pulse-2'		=> esc_html__('Ball Clip Rotate Pulse', 'dt-corpo' ),
				'ball-clip-rotate-multiple-2'   => esc_html__('Ball Clip Rotate Multiple', 'dt-corpo' ),
				'ball-pulse-rise-6'				=> esc_html__('Ball Pulse Rise', 'dt-corpo' ),
				'ball-pulse-sync-3'				=> esc_html__('Ball Pulse Sync', 'dt-corpo' ),
				'ball-beat-3'					=> esc_html__('Ball Beat', 'dt-corpo' ),
				'ball-grid-beat-9'				=> esc_html__('Ball Gird Beat', 'dt-corpo' ),
				'ball-rotate-1'					=> esc_html__('Ball Rotate', 'dt-corpo' ),
				'ball-zig-zag-2'				=> esc_html__('Ball Zig-Zag', 'dt-corpo' ),
				'ball-zig-zag-deflect-2'		=> esc_html__('Ball-Zig-Zag Deflect', 'dt-corpo' ),
				'ball-triangle-path-3'			=> esc_html__('Ball Triangle Path', 'dt-corpo' ),
				'ball-scale-1'					=> esc_html__('Ball Scale', 'dt-corpo' ),
				'ball-scale-ripple-1'			=> esc_html__('Ball Scale Ripple', 'dt-corpo' ),
				'ball-scale-multiple-3'			=> esc_html__('Ball Scale Multiple', 'dt-corpo' ),
				'ball-scale-ripple-multiple-3'	=> esc_html__('Ball Scale Ripple Multiple', 'dt-corpo' ),
				'ball-spin-fade-loader-8'		=> esc_html__('Ball Spin Fade Loader', 'dt-corpo' ),
				'square-spin-1'					=> esc_html__('Square Spin', 'dt-corpo' ),
				'cube-transition-2'				=> esc_html__('Cube Transition', 'dt-corpo' ),
				'line-scale-5'					=> esc_html__('Line Scale', 'dt-corpo' ),
				'line-scale-party-4'			=> esc_html__('Line Scale Party', 'dt-corpo' ),
				'line-scale-pulse-out-5'		=> esc_html__('Line Scale Pulse Out', 'dt-corpo' ),
				'line-scale-pulse-out-rapid-5'	=> esc_html__('Line Scale Pulse Out Rapid', 'dt-corpo' ),
				'line-spin-fade-loader-8'		=> esc_html__('Line Spin Fade Loader', 'dt-corpo' ),
				'triangle-skew-spin-1'			=> esc_html__('Triangle Skew Spin', 'dt-corpo' ),
				'pacman-5'						=> esc_html__('Pacman', 'dt-corpo' ),
				'semi-circle-spin-5'			=> esc_html__('Semi Circle Spin', 'dt-corpo' ),
			),
		),

		array(
			'id'		=> 'corpo_preloader_color',
			'title'		=> esc_html__( 'Preloader background', 'dt-corpo' ),
			'type'		=> 'color_picker',
			'default'	=> 'rgba(0,0,0,0.75)'
		),

		array(
			'type'		=> 'notice',
			'class'		=> 'info',
			'content'	=> esc_html__( 'This address will display in footer about us widget and some others area.', 'dt-corpo' ),
		),

		array(
			'id'				=> 'corpo_address',
			'type'				=> 'group',
			'title'				=> null,
			'button_title'		=> esc_html__( 'Add New', 'dt-corpo' ),
			'accordion_title'	=> esc_html__( 'Add New Field', 'dt-corpo' ),
			'fields'			=> array(

				array(
					'id'			=> 'line',
					'type'			=> 'textarea',
					'title'			=> esc_html__( 'Address Line', 'dt-corpo' ),
				),

				array(
					'id'			=> 'icon',
					'type'			=> 'icon',
					'title'			=> esc_html__( 'Line Icon', 'dt-corpo' ),
				),

			),
			'default'			=> array(
				array(
					'line'	=> 'Example Inc., 48 Design Street, Melbourne, AU.',
					'icon'	=> 'fa fa-map-marker',
				),
				array(
					'line'	=> '+880 1210 123456, +880 0781 123456.',
					'icon'	=> 'fa fa-phone',
				),
				array(
					'line'	=> 'inc@example.com.',
					'icon'	=> 'fa fa-envelope',
				),
			)
		),

		array(
			'type'		=> 'notice',
			'class'		=> 'info',
			'content'	=> esc_html__( 'This social profiles will display in your whole site.', 'dt-corpo' ),
		),

		array(
			'id'				=> 'corpo_social_profiles',
			'type'				=> 'group',
			'title'				=> null,
			'button_title'		=> esc_html__( 'Add New', 'dt-corpo' ),
			'accordion_title'	=> esc_html__( 'Add New Profile', 'dt-corpo' ),
			'fields'			=> array(

				array(
					'id'			=> 'name',
					'type'			=> 'text',
					'title'			=> esc_html__( 'Name', 'dt-corpo' ),
				),

				array(
					'id'			=> 'link',
					'type'			=> 'text',
					'title'			=> esc_html__( 'Link', 'dt-corpo' ),
				),

				array(
					'id'			=> 'icon',
					'type'			=> 'icon',
					'title'			=> esc_html__( 'Icon', 'dt-corpo' ),
				),

			),
			'default'			=> array(

				array(
					'name'	=> esc_html__( 'Facebook', 'dt-corpo' ),
					'link'	=> '#facebook',
					'icon'	=> 'fa fa-facebook',
				),

				array(
					'name'	=> esc_html__( 'Twitter', 'dt-corpo' ),
					'link'	=> '#twitter',
					'icon'	=> 'fa fa-twitter',
				),

				array(
					'name'	=> esc_html__( 'Pinterest', 'dt-corpo' ),
					'link'	=> '#pinterest',
					'icon'	=> 'fa fa-pinterest',
				),

				array(
					'name'	=> esc_html__( 'Linkedin', 'dt-corpo' ),
					'link'	=> '#linkedin',
					'icon'	=> 'fa fa-linkedin',
				),

				array(
					'name'	=> esc_html__( 'Instagram', 'dt-corpo' ),
					'link'	=> '#Instagram',
					'icon'	=> 'fa fa-instagram',
				),

			)
		),

	)
);

/**
 * Content Settings
 */
$options[]		= array(
	'name'		=> 'corpo_content_settings',
	'title'		=> esc_html__( 'Content', 'dt-corpo' ),
	'icon'		=> 'fa fa-bars',
	'fields'      => array(

		array(
			'type'		=> 'notice',
			'class'		=> 'info',
			'content'	=> esc_html__( 'This settings will work for global. You can always change the layout settings from the page editor panel.', 'dt-corpo' ),
		),

		array(
			'id'			=> 'corp_sidebar',
			'type'			=> 'radio',
			'title'			=> esc_html__( 'Layout', 'dt-corpo' ),
			'class'			=> 'horizontal',
			'options'		=> array(
				'full-width'	=> esc_html__( 'Full width (No Sidebar)', 'dt-corpo' ),
				'left'			=> esc_html__( 'Left Sidebar', 'dt-corpo' ),
				'right'			=> esc_html__( 'Right Sidebar', 'dt-corpo' )
			),
			'default'		=> 'right'
		),

		array(
			'id'		=> 'corpo_header',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Page Header', 'dt-corpo' ),
			'default'	=> true
		),

		array(
			'id'			=> 'corpo_header_image',
			'type'			=> 'upload',
			'title'			=> esc_html__( 'Default Image', 'dt-corpo' ),
			'desc'			=> esc_html__( 'Select the page header default image. You can always change the default image from the editor.', 'dt-corpo' ),
			'dependency'	=> array( 'corpo_header', '==', 'true' ),
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_html__( 'Upload', 'dt-corpo' ),
				'frame_title'  => esc_html__( 'Select an image', 'dt-corpo' ),
				'insert_title' => esc_html__( 'Use this image', 'dt-corpo' ),
			),
		),

		array(
			'id'			=> 'corpo_breadcrumbs',
			'type'			=> 'switcher',
			'title'			=> esc_html__( 'Breadcrumbs', 'dt-corpo' ),
			'desc'			=> esc_html__( 'Display breadcrumbs on the page header', 'dt-corpo' ),
			'default'		=> true,
			'dependency'	=> array( 'corpo_header', '==', 'true' ),
		),

		array(
			'id'			=> 'corpo_header_default_title',
			'type'			=> 'text',
			'title'			=> esc_html__( 'Default Title', 'dt-corpo' ),
			'desc'			=> esc_html__( 'Set the default title for the page header', 'dt-corpo' ),
		),

		array(
			'id'			=> 'corpo_blog_style',
			'type'			=> 'radio',
			'title'			=> esc_html__( 'Blog Posts Style', 'dt-corpo' ),
			'desc'			=> esc_html__( 'Select which style to display in blog archive.', 'dt-corpo' ),
			'class'			=> 'horizontal',
			'options'		=> array(
				'grid'			=> esc_html__( 'Grid', 'dt-corpo' ),
				'list'			=> esc_html__( 'List', 'dt-corpo' ),
			),
			'default'		=> 'grid'
		),

		array(
			'id'		=> 'corpo_blog_meta',
			'type'		=> 'checkbox',
			'title'		=> esc_html__( 'Display Meta Data', 'dt-corpo' ),
			'desc'		=> esc_html__( 'Check which meta data you want display in blog archive page', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'date'		=> esc_html__( 'Date', 'dt-corpo' ),
				'category'	=> esc_html__( 'Category', 'dt-corpo' ),
				'comment'	=> esc_html__( 'Comments', 'dt-corpo' ),
				'views'		=> esc_html__( 'Views', 'dt-corpo' ),
				'share'		=> esc_html__( 'Share', 'dt-corpo' ),
			),
			'default'  => array( 'date', 'category', 'comment', 'views', 'share' )
		),

		array(
			'id'		=> 'corpo_blog_thumbnail',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Thumbnail', 'dt-corpo' ),
			'default'	=> true
		),

		array(
			'id'		=> 'corpo_blog_readmore',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Read more button', 'dt-corpo' ),
			'default'	=> true
		),

		array(
			'id'			=> 'corpo_shortcodes',
			'type'			=> 'textarea',
			'title'			=> esc_html__( 'Shortcodes after the content', 'dt-corpo' ),
			'desc'			=> esc_html__( 'This shortcodes will display at the bottom of page and before the footer.', 'dt-corpo' ),
			'shortcode'		=> true,
			'attributes'	=> array(
				'placeholder'	=> esc_html__( 'Click on the Add Shortocode button to begin.' , 'dt-corpo' ),
				'rows'			=> 10,
			),
		),

		array(
			'type'		=> 'subheading',
			'content'	=> esc_html__( 'Single Posts Settings', 'dt-corpo' ),
		),

		array(
			'id'		=> 'corpo_single_display_meta',
			'type'		=> 'checkbox',
			'title'		=> esc_html__( 'Display Meta Data', 'dt-corpo' ),
			'desc'		=> esc_html__( 'Check which meta you want to display in blog single post.', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'date'		=> esc_html__( 'Date', 'dt-corpo' ),
				'category'	=> esc_html__( 'Category', 'dt-corpo' ),
				'comment'	=> esc_html__( 'Comments', 'dt-corpo' ),
				'views'		=> esc_html__( 'Views', 'dt-corpo' ),
				'share'		=> esc_html__( 'Share', 'dt-corpo' ),
			),
			'default'  => array( 'date', 'category', 'comment', 'views', 'share' )
		),

		array(
			'id'		=> 'corpo_single_thumbnail',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Featured Image', 'dt-corpo' ),
			'default'	=> true
		),

		array(
			'id'		=> 'corpo_single_author_bio',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Author Bio Box', 'dt-corpo' ),
			'default'	=> true
		),
	)
);

/**
 * Team Settings
 */
$options[]		= array(
	'name'		=> 'corpo_team_settings',
	'title'		=> esc_html__( 'Team', 'dt-corpo' ),
	'icon'		=> 'fa fa-bars',
	'fields'      => array(

		array(
			'id'		=> 'corpo_team_style',
			'type'		=> 'radio',
			'title'		=> esc_html__( 'Item Style', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'1'		=> esc_html__( 'Default', 'dt-corpo' ),
				'2'		=> esc_html__( 'Alternate', 'dt-corpo' ),
			),
			'default'  => '1'
		),

		array(
			'id'		=> 'corpo_team_column',
			'type'		=> 'radio',
			'title'		=> esc_html__( 'Column Size', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'1-3'		=> esc_html__( '1/3', 'dt-corpo' ),
				'1-4'		=> esc_html__( '1/4', 'dt-corpo' ),
			),
			'default'  => '1-4'
		),

		array(
			'id'		=> 'corpo_team_items',
			'type'		=> 'number',
			'title'		=> esc_html__( 'Items per page', 'dt-corpo' ),
			'default'  => 8
		),

		array(
			'id'		=> 'corpo_team_details_link',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Link To Details Page', 'dt-corpo' ),
			'default'	=> true
		),
	)
);

/**
 * Service Settings
 */
$options[]		= array(
	'name'		=> 'corpo_service_settings',
	'title'		=> esc_html__( 'Service', 'dt-corpo' ),
	'icon'		=> 'fa fa-bars',
	'fields'      => array(

		array(
			'id'		=> 'corpo_service_style',
			'type'		=> 'radio',
			'title'		=> esc_html__( 'Item Style', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'1'		=> esc_html__( 'Style 1', 'dt-corpo' ),
				'2'		=> esc_html__( 'Style 2', 'dt-corpo' ),
				'3'		=> esc_html__( 'Style 3', 'dt-corpo' ),
				'4'		=> esc_html__( 'Style 4', 'dt-corpo' ),
				'5'		=> esc_html__( 'Style 5', 'dt-corpo' ),
			),
			'default'  => '1'
		),

		array(
			'id'		=> 'corpo_service_column',
			'type'		=> 'radio',
			'title'		=> esc_html__( 'Column Size', 'dt-corpo' ),
			'class'		=> 'horizontal',
			'options'	=> array(
				'1-2'		=> esc_html__( '1/2', 'dt-corpo' ),
				'1-3'		=> esc_html__( '1/3', 'dt-corpo' ),
				'1-4'		=> esc_html__( '1/4', 'dt-corpo' ),
			),
			'default'  => '1-4'
		),

		array(
			'id'		=> 'corpo_service_items',
			'type'		=> 'number',
			'title'		=> esc_html__( 'Items per page', 'dt-corpo' ),
			'default'  => 6
		),

		array(
			'id'		=> 'corpo_service_readmore',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Display Read More Button', 'dt-corpo' ),
			'default'	=> true
		),
	)
);

/**
 * Misc Settings
 */
$options[]		= array(
	'name'		=> 'corpo_misc_settings',
	'title'		=> esc_html__( 'Misc Settings', 'dt-corpo' ),
	'icon'		=> 'fa fa-bars',
	'fields'	=> array(

		array(
			'id'		=> 'corpo_smoothscroll',
			'type'		=> 'switcher',
			'title'		=> esc_html__( 'Smooth Scroll Pages', 'dt-corpo' ),
		),

		array(
			'type'		=> 'text',
			'title'		=> esc_html__( 'Google Map API Key', 'dt-corpo' ),
			'id'		=> 'corpo_map_api_key',
			'desc'		=> esc_html__( 'Enter the Google Map API Key. You can generate API here: https://youtu.be/JDgF3Z6dC_w', 'dt-corpo' ),
		),
		array(
			'type'		=> 'text',
			'title'		=> esc_html__( 'Google Map Region Code', 'dt-corpo' ),
			'id'		=> 'corpo_map_api_region',
			'desc'		=> esc_html__( 'Get map region list here: https://goo.gl/XeoqP', 'dt-corpo' ),
		),
	)
);

CSFramework::instance( $settings, $options );
