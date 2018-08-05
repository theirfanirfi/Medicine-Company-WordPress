<?php
/**
 * Base class for widget using codestar framework fields.
 * Created by: DeathMark (https://github.com/DeathMark)
 */

class Corpo_Ess_Widget extends WP_Widget {
	function get_options() {
		return array();
	}

	function update( $new_instance, $old_instance ) {
		$instance 			= $old_instance;

		$options 			= $this->get_options();

		foreach ($options as $option) {
			if (isset($new_instance[$option['id']])) {
				$instance[$option['id']]    = $new_instance[$option['id']];
			} else if (in_array($option['type'], array('group', 'checkbox'))) {
				$instance[$option['id']]    = '';
			}
		}

		return $instance;
	}

	function form( $instance ) {

		// Get field from array and return as codestar fields
		$options            = $this->get_options();

		$default_options    = array();

		foreach ( $options as $option ) {
			$default_options[$option['id']] 	= isset( $option['default'] ) ? $option['default'] : '';
		}

		$instance 	= wp_parse_args( (array) $instance, $default_options );

		// render fields.
		foreach ( $options as $option ) {
			$id 			= $option['id'];
			$unique 		= '';

			if ( !in_array( $option['type'], array('group' ) ) ) {

				$option['id']	= $this->get_field_id( $id );
				$option['name']	= $this->get_field_name( $id );

			} else {
				$unique 		= 'widget-' . $this->id_base . '[' . $this->number . ']';
			}

			if ( function_exists( 'cs_add_element' ) ) {
				echo cs_add_element( $option, is_array( $instance[$id] ) ? $instance[$id] : esc_attr( $instance[$id] ), $unique );
			} else {
				echo '<p>' . esc_html__( 'This widget is require Corpo theme by Decent Themes.', 'corpo-ess' ) . '</p>';
			}
		}
	}
}