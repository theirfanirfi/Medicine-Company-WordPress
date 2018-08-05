<?php
global $help_tabs_admin;
// Breadcrumbs
//................................................................

if ( $_GET['navigation'] == 'new-page' ) {
	// New page
	$breadcrumb = __( 'New Admin Page', 'runway' );
} else {
	// Edit page
	$breadcrumb = sprintf( __( 'Edit: %s', 'runway' ), $page['settings']['title'] );
}
// Set breadcrumbs
$this->navigation_bar( array( $breadcrumb ) );

if ( isset( $message ) ) { ?>
	<div id="message" class="updated below-h2"><p><?php echo rf_string( $message ); ?></p></div>
<?php } else { ?>
	<div id="message" class="updated below-h2" style="display: none;"></div>
<?php }

// $this->load_data_types();
global $libraries;
$form_builder = $libraries['FormsBuilder'];

// Set builder options
$options = array(
	'new_page_id' => isset( $new_page_id ) ? $new_page_id : '',
	'page'        => $page,
	'settings'    => array(
		'tabs'          => true,
		'containers'    => true,
		'fields'        => true,
		'page_settings' => true
	),
	'page_json'   => isset( $page_json ) ? $page_json : ''
);

$form_builder->save_action = 'save_option_page';
$form_builder->form_builder( $options );
