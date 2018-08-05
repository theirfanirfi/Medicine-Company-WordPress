<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 * Meta boxes for posts and pages
 *
 * @var array
 */

$options      = array();

/**
 * Posts & Pages settings
 */
$options[]		= array(
	'id'			=> '_corpo_page_options',
	'title'			=> esc_html__( 'Page/Post Settings', 'dt-corpo' ),
	'post_type'		=> array( 'post', 'page', 'corpo_member', 'corpo_service' ),
	'context'		=> 'normal',
	'priority'		=> 'default',
	'sections'  => array(

		array(
			'name'  => 'corpo_page_settings_section',
			'fields' => array(

				array(
					'id'			=> 'page_header_global',
					'type'			=> 'switcher',
					'title'			=> esc_html__( 'Use Global Settings', 'dt-corpo' ),
					'default'		=> true,
				),

				array(
					'id'			=> 'page_header',
					'type'			=> 'switcher',
					'title'			=> esc_html__( 'Page Header', 'dt-corpo' ),
					'default'		=> true,
					'dependency'	=> array( 'page_header_global', '!=', 'true' ),
				),

				array(
					'id'			=> 'header_image',
					'type'			=> 'image',
					'title'			=> esc_html__( 'Header Image', 'dt-corpo' ),
					'dependency'	=> array( 'page_header_global', '!=', 'true' ),
					'desc'			=> esc_html__( 'Default: Featured image, if fail will get image from global settings.', 'dt-corpo' ),
				),

				array(
					'id'			=> 'custom_title',
					'type'			=> 'text',
					'title'			=> esc_html__( 'Custom Title', 'dt-corpo' ),
					'dependency'	=> array( 'page_header_global', '!=', 'true' ),
					'desc'			=> esc_html__( 'Set custom title for the page header. Default: The post title.', 'dt-corpo' ),
				),

				array(
					'id'			=> 'breadcrumbs',
					'type'			=> 'switcher',
					'title'			=> esc_html__( 'Header Breadcrumbs', 'dt-corpo' ),
					'desc'			=> esc_html__( 'Display breadcrumbs on the page header', 'dt-corpo' ),
					'default'		=> true,
					'dependency'	=> array( 'page_header_global', '!=', 'true' ),
				),

			),
		),

	),
);

/**
 * Pages
 */
$options[]		= array(
	'id'			=> '_corpo_page_title_options',
	'title'			=> esc_html__( 'Title Options', 'dt-corpo' ),
	'post_type'		=> array( 'page', 'corpo_service' ),
	'context'		=> 'side',
	'priority'		=> 'default',
	'sections'  => array(

		array(
			'name'  => 'corpo_page_settings_section',
			'fields' => array(

				array(
					'id'			=> 'title_display',
					'type'			=> 'switcher',
					'title'			=> esc_html__( 'Display title on single', 'dt-corpo' ),
					'default'		=> true
				),

			),
		),

	),
);

CSFramework_Metabox::instance( $options );
