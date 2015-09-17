	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
			<fieldset>
				<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
					<tbody>
						<?php
							foreach ($users as $user) {
								echo '<tr><td style="padding:12px"><a href="/'.get_site_lang().'/admin/edit/' . $user->get_id() . '">';
								echo $user->get_first_name() . " " . $user->get_last_name();
								echo '</a></td></tr>';
							}
						?>
					</tbody>
				</table>
			</fieldset>
		</div>
	</div>
</div>
