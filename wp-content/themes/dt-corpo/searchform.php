<?php
/**
 * Template for displaying search forms in Corpo
 *
 * @package WordPress
 * @subpackage DT_Corpo
 * @since 1.0
 * @version 1.0
 */

$formID = uniqid('search-form-');
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $formID ); ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'dt-corpo' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr( $formID ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'dt-corpo' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'dt-corpo' ); ?></span></button>
</form>
