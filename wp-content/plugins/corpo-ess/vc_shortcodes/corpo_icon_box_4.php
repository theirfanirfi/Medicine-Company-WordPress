<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Map this shortcode
vc_map(array(
	'name'			=> esc_html__( 'Icon Box (Style 4)', 'corpo-ess'),
	'base'			=> 'corpo_icon_box_4',
	'description'	=> esc_html__( 'Place a box with icon.', 'corpo-ess' ),
	'category'		=> esc_html__( 'Corpo Elements', 'corpo-ess' ),
	'params'		=> array(

		array(
			'type'		=> 'dropdown',
			'heading'	=> esc_html__( 'Icon library', 'corpo-ess' ),
			'value'		=> array(
				__( 'Font Awesome', 'corpo-ess' ) => 'fontawesome',
				__( 'Open Iconic', 'corpo-ess' ) => 'openiconic',
				__( 'Typicons', 'corpo-ess' ) => 'typicons',
				__( 'Entypo', 'corpo-ess' ) => 'entypo',
				__( 'Linecons', 'corpo-ess' ) => 'linecons',
				__( 'Mono Social', 'corpo-ess' ) => 'monosocial',
				__( 'Material', 'corpo-ess' ) => 'material',
			),
			'param_name'	=> 'type',
			'description'	=> esc_html__( 'Select icon library.', 'corpo-ess' ),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_fontawesome',
			'value'			=> 'fa fa-adjust',
			'settings'		=> array(
				'emptyIcon' => false,
				'iconsPerPage' => 4000,
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'fontawesome',
			),
			'description'	=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_openiconic',
			'value'			=> 'vc-oi vc-oi-dial',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'openiconic',
				'iconsPerPage'	=> 4000,
			),
			'dependency'		=> array(
				'element'		=> 'type',
				'value'			=> 'openiconic',
			),
			'description'		=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_typicons',
			'value'			=> 'typcn typcn-adjust-brightness',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'typicons',
				'iconsPerPage'	=> 4000,
			),
			'dependency'		=> array(
				'element'		=> 'type',
				'value'			=> 'typicons',
			),
			'description'		=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_entypo',
			'value'			=> 'entypo-icon entypo-icon-note',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'entypo',
				'iconsPerPage'	=> 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_linecons',
			'value'			=> 'vc_li vc_li-heart',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'linecons',
				'iconsPerPage'	=> 4000,
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'linecons',
			),
			'description'	=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),

		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_monosocial',
			'value'			=> 'vc-mono vc-mono-fivehundredpx',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'monosocial',
				'iconsPerPage'	=> 4000,
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'monosocial',
			),
			'description'	=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),
		
		array(
			'type'			=> 'iconpicker',
			'heading'		=> esc_html__( 'Icon', 'corpo-ess' ),
			'param_name'	=> 'icon_material',
			'value'			=> 'vc-material vc-material-cake',
			'settings'		=> array(
				'emptyIcon'		=> false,
				'type'			=> 'material',
				'iconsPerPage'	=> 4000,
			),
			'dependency'	=> array(
				'element'	=> 'type',
				'value'		=> 'material',
			),
			'description'	=> esc_html__( 'Select icon from library.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'heading',
			'type'			=> 'textfield',
			'admin_label'	=> true,
			'heading'		=> esc_html__( 'Heading', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the title for the box.', 'corpo-ess'), 
		),

		array(
			'param_name'	=> 'content',
			'type'			=> 'textarea_html',
			'heading'		=> esc_html__( 'Image', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the content for this box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'btn_name',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Name', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the button name for this box.', 'corpo-ess' ),
		),

		array(
			'param_name'	=> 'btn_link',
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Button Link', 'corpo-ess' ),
			'description'	=> esc_html__( 'Enter the button link for the box.', 'corpo-ess' ),
		),
	)
));

// Convert this as shortcode
class WPBakeryShortCode_corpo_icon_box_4 extends WPBakeryShortCode {}
