<?php

/**
 * Register a widget to company info and contacts
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/widgets
 */

/**
 * Creating the recent post widget for the plugin
 *
 *
 * @since      1.0.0
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes/widgets
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_About_Us_Widget extends Corpo_Ess_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, esc_html__( 'Corpo :: About Us', 'corpo-ess' ) );
	}

	function widget( $args, $instance ) {

		include plugin_dir_path( __FILE__ ) . 'partials/about-us.php';

	}

	function get_options() {

		return array(
			array(
				'id'		=> 'title',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Title:', 'corpo-ess' ),
				'default'	=> esc_html__( 'About Us', 'corpo-ess' )
			),

			array(
				'id'		=> 'logo',
				'type'		=> 'image',
				'title'		=> esc_html__( 'Logo:', 'corpo-ess' )
			),

			array(
				'id'		=> 'content',
				'type'		=> 'textarea',
				'title'		=> esc_html__( 'Content:', 'corpo-ess' ),
				'attributes'	=> array(
					'rows'		=> 5
				),
			),

			array(
				'id'		=> 'info',
				'type'		=> 'checkbox',
				'class'		=> 'horizontal',
				'title'		=> esc_html__( 'Display:', 'corpo-ess' ),
				'options'	=> array(
					'addr'		=> esc_html__( 'Address', 'corpo-ess' ),
					'social'	=> esc_html__( 'Social Profiles', 'corpo-ess' ),
				),
			),

			array(
				'id'		=> 'notice',
				'type'		=> 'notice',
				'class'		=> 'info',
				'content'	=> sprintf(
								esc_html__( 'Edit the site address and social icons form %1$s.', 'dt-corpo' ),
								'<a href="' . admin_url( 'admin.php?page=corpo-framework' ) . '">' . esc_attr( 'here' ) . '</a>'
							)
			),
		);
	}
}
