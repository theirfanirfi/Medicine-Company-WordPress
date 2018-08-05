<?php

/**
 * Register a widget to display recent posts with thumbnails
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
class Corpo_Ess_Recent_Posts_Widget extends Corpo_Ess_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, esc_html__( 'Corpo :: Recent Posts', 'corpo-ess' ) );
	}

	function widget( $args, $instance ) {

		include plugin_dir_path( __FILE__ ) . 'partials/recent-posts.php';

	}

	function get_options() {
		return array(
			array(
				'id'		=> 'title',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Title:', 'corpo-ess' ),
				'default'	=> esc_html__( 'Recent Posts', 'corpo-ess' )
			),
			array(
				'id'		=> 'limit',
				'type'		=> 'number',
				'title'		=> esc_html__( 'Post limit:', 'corpo-ess' ),
				'default'	=> '4',
			),
			array(
				'id'		=> 'meta',
				'type'		=> 'checkbox',
				'class'		=> 'horizontal',
				'title'		=> esc_html__( 'Display Meta:', 'corpo-ess' ),
				'options'	=> array(
					'date'		=> esc_html__( 'Date', 'corpo-ess' ),
					'comment'	=> esc_html__( 'Comments Count', 'corpo-ess' ),
				),
			),
			
		);
	}
}
