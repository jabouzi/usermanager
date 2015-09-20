	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
			<fieldset>
				<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
					<thead>
						<tr>
							<td><?php echo lang('form.firstname'); ?></td>
							<td><?php echo lang('form.lastname'); ?></td>
							<td><?php echo lang('form.active'); ?></td>
							<td><?php echo lang('form.is.admin'); ?></td>
							<td><?php echo lang('title.edit.account'); ?></td>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach ($users as $user) {
							if ($_SESSION['user']['id'] != $user->get_id())
							{
								echo '<tr><td style="padding:12px">';
								echo $user->get_first_name();
								echo '</td>';
								echo '<td style="padding:12px">';
								echo $user->get_last_name();
								echo '</td>';
								echo '<td style="padding:12px">';
								echo '<img src="'.$bool[$user->get_active()].'"></a></td>';
								echo '</td>';
								echo '<td style="padding:12px">';
								echo '<img src="'.$bool[$user->get_admin()].'"></a></td>';
								echo '</td>';
								echo '<td style="padding:12px"><a href="/'.get_site_lang().'/application/edit/' . $user->get_username() . '">';
								echo '<img src="/public/img/icn_edit.png"></a></td>';
								echo '</a></td></tr>';
							}
						}
					?>
					</tbody>
				</table>
			</fieldset>
		</div>
	</div>
</div>

