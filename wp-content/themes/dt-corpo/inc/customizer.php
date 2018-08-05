<?php
/**
 * Corpo: Customizer
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dt_corpo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'dt_corpo_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'dt_corpo_customize_partial_blogdescription',
	) );

	/**
	 * Custom Logo Transparent
	 */
	$wp_customize->add_setting( 'custom_logo_contrast', array(
			'transport'      		=> 'refresh',
			'sanitize_callback'		=> 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'custom_logo_contrast', array(
		'label'         => esc_html__( 'Logo - Transparent', 'dt-corpo' ),
		'section'       => 'title_tagline',
		'priority'      => 9,
		'height'        => 50,
		'width'         => 150,
		'flex_height'   => true,
		'flex_width'    => true,
		'button_labels' => array(
			'select'       => esc_html__( 'Select logo', 'dt-corpo' ),
			'change'       => esc_html__( 'Change logo', 'dt-corpo' ),
			'remove'       => esc_html__( 'Remove', 'dt-corpo' ),
			'default'      => esc_html__( 'Default', 'dt-corpo' ),
			'placeholder'  => esc_html__( 'No logo selected', 'dt-corpo' ),
			'frame_title'  => esc_html__( 'Select logo', 'dt-corpo' ),
			'frame_button' => esc_html__( 'Choose logo', 'dt-corpo' ),
		),
	) ) );

	/**
	 * Custom colors.
	 */
	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'light',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dt_corpo_sanitize_colorscheme',
	) );

	$wp_customize->add_setting( 'colorscheme_hue', array(
		'transport'         	=> 'postMessage',
		'sanitize_callback'		=> 'absint'
	) );

	$wp_customize->add_control( 'colorscheme', array(
		'type'    => 'radio',
		'label'    => esc_html__( 'Color Scheme', 'dt-corpo' ),
		'choices'  => array(
			'light'  => esc_html__( 'Default', 'dt-corpo' ),
			// 'dark'   => esc_html__( 'Dark', 'dt-corpo' ),
			'custom' => esc_html__( 'Custom', 'dt-corpo' ),
		),
		'section'  => 'colors',
		'priority' => 5,
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorscheme_hue', array(
		'mode' => 'hue',
		'section'  => 'colors',
		'priority' => 6,
	) ) );

	/**
	 * Header options.
	 */
	$wp_customize->add_section( 'dt_corpo_header_options', array(
		'title'    => esc_html__( 'Header Settings', 'dt-corpo' ),
		'priority' => 45, // After colors
	) );

	// Header Style
	$wp_customize->add_setting( 'dt_corpo_header_style', array(
		'default'           => 'non-transparent',
		'transport'         => 'refresh',
		'sanitize_callback' => 'dt_corpo_sanitize_header_style',
	) );
	$wp_customize->add_control( 'dt_corpo_header_style', array(
		'label'       => esc_html__( 'Header Style', 'dt-corpo' ),
		'section'     => 'dt_corpo_header_options',
		'type'        => 'radio',
		'choices'     => array(
			'non-transparent'	=> esc_html__( 'Default', 'dt-corpo' ),
			'transparent' 		=> esc_html__( 'Transparent', 'dt-corpo' ),
		)
	) );

	// Top bar settings
	$wp_customize->add_setting( 'dt_corpo_header_top_bar', array(
		'default'			=> true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'dt_corpo_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'dt_corpo_header_top_bar', array(
		'label'       => esc_html__( 'Display Topbar', 'dt-corpo' ),
		'description' => esc_html__( 'Check if you want to display the top bar.', 'dt-corpo' ),
		'section'     => 'dt_corpo_header_options',
		'type'        => 'checkbox',
	) );

	// Search Icon Settings
	$wp_customize->add_setting( 'header_menu_search', array(
		'default'			=> true,
		'transport'         => 'refresh',
		'sanitize_callback'	=> 'dt_corpo_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'header_menu_search', array(
		'label'       => esc_html__( 'Display Search Form', 'dt-corpo' ),
		'description' => esc_html__( 'Check if you want to display the search form in the menu.', 'dt-corpo' ),
		'section'     => 'dt_corpo_header_options',
		'type'        => 'checkbox',
	) );

	/**
	 * Footer Panel
	 */
	$column_classes = array(
		'col-md-1' => '1/12',
		'col-md-2' => '2/12',
		'col-md-3' => '3/12',
		'col-md-4' => '4/12',
		'col-md-5' => '5/12',
		'col-md-6' => '6/12',
		'col-md-7' => '7/12',
		'col-md-8' => '8/12',
		'col-md-9' => '9/12',
		'col-md-10' => '10/12',
		'col-md-11' => '11/12',
		'col-md-12' => '12/12'
	);
	$wp_customize->add_panel( 'dt_corpo_footer_settings', array(
		'title' => esc_html__( 'Footer Settings', 'dt-corpo' ),
		'description' => esc_html__( 'Manage your footer widget position sizes and Copyright information.', 'dt-corpo' ), // Include html tags such as <p>.
		'priority' => 160, // Mixed with top-level-section hierarchy.
	) );

	// Widget Settings
	for ($i=1; $i < 5; $i++) { 
		$wp_customize->add_section( 'dt_corpo_widget_area_' . $i , array(
			'title' => 'Widget Area - '. $i,
			'panel' => 'dt_corpo_footer_settings',
		) );
		$wp_customize->add_setting( 'dt_corpo_widget_area_' . $i . '_display', array(
			'default'			=> true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'dt_corpo_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'dt_corpo_widget_area_' . $i . '_display', array(
			'label'       => esc_html__( 'Display on site', 'dt-corpo' ),
			'section'     => 'dt_corpo_widget_area_'. $i,
			'type'        => 'checkbox',
		) );
		$wp_customize->add_setting( 'dt_corpo_widget_area_' . $i . '_column', array(
			'default'           => 'col-md-4',
			'transport'         => 'refresh',
			'sanitize_callback' => 'dt_corpo_sanitize_widget_columns',
		) );
		$wp_customize->add_control( 'dt_corpo_widget_area_' . $i . '_column' , array(
			'label'       => esc_html__( 'Header Style', 'dt-corpo' ),
			'section'     => 'dt_corpo_widget_area_'. $i,
			'type'        => 'select',
			'choices'     => $column_classes
		) );
	}

	// Copyright Text
	$wp_customize->add_section( 'dt_corpo_footer_copy_area' , array(
		'title' => esc_html__( "Copyright Text", 'dt-corpo' ),
		'panel' => 'dt_corpo_footer_settings',
	) );

	$wp_customize->add_setting( 'dt_corpo_footer_copy_text', array(
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'dt_corpo_sanitize_footer_copyright',
	) );

	$wp_customize->add_control( 'dt_corpo_footer_copy_text', array(
		'label'       => esc_html__( 'Text', 'dt-corpo' ),
		'section'     => 'dt_corpo_footer_copy_area',
		'type'        => 'textarea',
	) );
	
}
add_action( 'customize_register', 'dt_corpo_customize_register' );

/**
 * Sanitize the colorscheme.
 */
function dt_corpo_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Sanitize the header style.
 */
function dt_corpo_sanitize_header_style( $input ) {
	$valid = array( 'transparent', 'non-transparent' );

	if ( in_array( $input, $valid ) ) {
		return $input;
	}

	return 'non-transparent';
}

/**
 * Sanitize the widget columns.
 */
function dt_corpo_sanitize_widget_columns( $input ) {
	$valid = array(
		'col-md-1',
		'col-md-2',
		'col-md-3',
		'col-md-4',
		'col-md-5',
		'col-md-6',
		'col-md-7',
		'col-md-8',
		'col-md-9',
		'col-md-10',
		'col-md-11',
		'col-md-12'
	);

	if ( in_array( $input, $valid ) ) {
		return $input;
	}

	return 'col-md-3';
}

/**
 * Sanitize the checkbox
 */
function dt_corpo_sanitize_checkbox( $input ) {
	if ( $input == true ) {
		return true;
	}

	return false;
}

/**
 * Sanitize the footer copyright text.
 */
function dt_corpo_sanitize_footer_copyright( $input ) {
	$output = '';
	if ( ! empty( $input ) ) {
		$output = $input;
	} else {
		$output = sprintf(
				esc_html__( '&copy; %1$s %2$s - Designed by %3$s', 'dt-corpo' ),
				date( 'Y' ),
				get_bloginfo( 'name' ),
				'<a href="' . esc_url( 'https://www.decentthemes.com/' ) . '">' . esc_attr( 'Decent Themes' ) . '</a>'
			);
	}

	return $output;
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Corpo 1.0
 * @see dt_corpo_customize_register()
 *
 * @return void
 */
function dt_corpo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Corpo 1.0
 * @see dt_corpo_customize_register()
 *
 * @return void
 */
function dt_corpo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function dt_corpo_customize_preview_js() {
	wp_enqueue_script( 'dt-corpo-customize-preview', get_parent_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'jquery', 'customize-preview' ), '1.0', true );
	
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
	$getColor = "var dt_corpo_custom_color = {$hue};";

	wp_add_inline_script( 'dt-corpo-customize-preview', $getColor );
}
add_action( 'customize_preview_init', 'dt_corpo_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function dt_corpo_panels_js() {
	wp_enqueue_script( 'dt-corpo-customize-controls', get_parent_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'dt_corpo_panels_js' );
