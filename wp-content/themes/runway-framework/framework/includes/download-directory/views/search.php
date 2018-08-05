<table class="wp-list-table widefat plugin-install" cellspacing="0">
	<thead>
	<tr>
		<th scope="col" id="name" class="manage-column column-name" style=""><?php _e( 'Name', 'runway' ) ?></th>
		<th scope="col" id="version" class="manage-column column-version" style=""><?php _e( 'Version', 'runway' ) ?></th>
		<th scope="col" id="description" class="manage-column column-description" style=""><?php _e( 'Description', 'runway' ) ?></th>
	</tr>
	</thead>

	<tbody id="the-list">
		<?php $search_exts = $directory->search_request_extensions( $_POST['s'] );
			  if( isset($search_exts) && !empty($search_exts) ) {
					foreach ( $search_exts as $token => $extension ) { ?>
						<tr>
							<td class="name column-name"><strong><?php echo wp_kses_post($extension->name) ?></strong>
								<div class="action-links">
									<a href="<?php echo admin_url('admin.php?page=directory&amp;tab=item-information&amp;item=the-item-name&amp;TB_iframe=true&amp;width=600&amp;height=550'); ?>" class="thickbox" title="More information">Details</a> |
									<a class="install-now" href="<?php echo admin_url('admin.php?page=directory&amp;action=install&amp;item=the-item-name&amp;_wpnonce='); ?>" title="<?php echo ($extm->is_install($token)) ? __('Reinstall', 'runway') : __('Install Now', 'runway') ?>">
										<?php echo ($extm->is_install($token)) ? __('Reinstall', 'runway') : __('Install Now', 'runway') ?>
									</a>
								</div>
							</td>
							<td class="vers column-version"><?php echo wp_kses_post($extension->version) ?></td>
							<td class="desc column-description"><?php echo wp_kses_post($extension->description) ?></td>
						</tr>
			  <?php }
		}?>
	</tbody>

	<tfoot>
	<tr>
		<th scope="col" class="manage-column column-name" style=""><?php _e( 'Name', 'runway' ) ?></th>
		<th scope="col" class="manage-column column-version" style=""><?php _e( 'Version', 'runway' ) ?></th>
		<th scope="col" class="manage-column column-description" style=""><?php _e( 'Description', 'runway' ) ?></th>
	</tr>
	</tfoot>
</table>
