<?php
/**
 * Displaying footer shortcodes
 */
$shortcodes = cs_get_option( 'corpo_shortcodes' );

echo '<div class="corpo_footer_shortcodes">';
echo do_shortcode( $shortcodes );
echo '</div>';

?>
