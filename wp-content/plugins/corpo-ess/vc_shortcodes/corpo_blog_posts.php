<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// $cats = Corpo_Ess_Helpers::taxonomy_values( 'category' );

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Blog Posts', 'corpo-ess'),
	'base'			=> 'corpo_blog_posts',
	'description'	=> esc_html__( 'Place the heading for the section.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'param_name'	=> 'limit',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'How many posts', 'corpo-ess' ),
			'description'	=> esc_html__( 'How many posts you want to display in this block.', 'corpo-ess' ),
			'value'			=> '2'
		),

		array(
			'param_name'	=> 'cat',
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Category', 'corpo-ess' ),
			'description' 	=> esc_html__( 'Select the category to display posts.', 'corpo-ess' ),
			'value'			=> Corpo_Ess_Helpers::vc_taxonomy_values( 'category' ),
		),

		array(
			'param_name'	=> 'multiple_cat',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Multiple Categories', 'corpo-ess' ),
			'description'	=> esc_html__( 'If you want to display post from multiple category then please enter the category id separated by coma. Ex 10,23,44', 'corpo-ess' ),
		),

	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_blog_posts extends WPBakeryShortCode {}
