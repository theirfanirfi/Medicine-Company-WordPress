<?php

/**
 * The helpers functionality of the plugin.
 *
 * @link       https://www.decentthemes.com/
 * @since      1.0.0
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes
 */

/**
 * The helpers functionality of the plugin.
 *
 *
 * @package    Corpo_Ess
 * @subpackage Corpo_Ess/includes
 * @author     Decent Themes <support@decentthemes.com>
 */
class Corpo_Ess_Helpers {


	/**
	 * Get the taxonomies list for the visual
	 * composer dropdown and checkbox field.
	 *
	 * @since    1.0.0
	 */
	public static function vc_taxonomy_values( $taxonomy, $blank = '' ) {

		$terms = get_terms( $taxonomy );

		$options = array();

		if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {

			$blank = ( ! empty( $blank ) ) ? $blank : esc_html__( '-- All --', 'corpo-ess' ) ;

			$options[$blank] = '';

			foreach ( $terms as $term ) {
				$options[$term->name] = $term->term_id;
			}
		} else {
			$options[__( 'Not found', 'corpo-ess' )] = '';
		}

		return $options;
	}

	/**
	 * Get the post lists of any post type for
	 * visual composer dropdown and checkbox field.
	 */
	public static function vc_posts_values( $type, $blank = '' ) {

		$posts = get_posts( array( 'post_type'=> $type ) );

		$options = array();

		if ( is_array( $posts ) ) {

			$blank = ( ! empty( $blank ) ) ? $blank : esc_html__( '-- All --', 'corpo-ess' ) ;

			$options[$blank] = '';

			foreach ( $posts as $post ) {
				$options[$post->post_title] = $post->ID;
			}
		} else {
			$options[__( 'Not found', 'corpo-ess' )] = '';
		}

		return $options;
	}

	/**
	 * Add new contact field for user
	 * @param  array $user_contact predefined methods
	 * @return array               with new fields
	 */
	function user_custom_field( $user_contact ) {

		// Add user contact methods
		$user_contact['facebook']   = esc_html__( 'Facebook URL', 'corpo-ess'   );
		$user_contact['twitter'] = esc_html__( 'Twitter Username', 'corpo-ess' );
		$user_contact['google-plus'] = esc_html__( 'Google Plus URL', 'corpo-ess' );
		$user_contact['linkedin'] = esc_html__( 'Linkedin URL', 'corpo-ess' );

		return $user_contact;
	}

}
