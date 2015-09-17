	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
			<form action="/<?php echo get_site_lang(); ?>/application/processadd" method="post" id="addform" name="addform">
				<fieldset>
					<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
						<tbody>
							<tr>
								<td><label for="user_name"><?php echo lang('form.username'); ?>:</label></td>
								<td><input type="text" name="user_name" id="user_name" value="<?php echo print_post_text('user_name'); ?>" data-validate="required" /></td>
							</tr>
							<tr>
								<td><label for="user_password"><?php echo lang('form.password'); ?>:</label></td>
								<td><input type="password" name="user_password" id="user_password" value="" data-validate="required" autocomplete="off" /></td>
							</tr>
							<tr>
								<td><label for="email"><?php echo lang('form.email'); ?>:</label></td>
								<td><input type="text" name="user_email" id="user_email" value="<?php echo print_post_text('user_email'); ?>" data-validate="required" /></td>
							</tr>
							<tr>
								<td><label for="first_name"><?php echo lang('form.firstname'); ?>:</label></td>
								<td><input type="text" name="user_first_name" id="user_first_name" value="<?php echo print_post_text('user_first_name'); ?>" data-validate="required"  /></td>
							</tr>
							<tr>
								<td><label for="last_name"><?php echo lang('form.lastname'); ?>:</label></td>
								<td><input type="text" name="user_last_name" id="user_last_name" value="<?php echo print_post_text('user_last_name'); ?>" data-validate="required" /></td>
							</tr>	
							<tr>
								<td><label for="status"><?php echo lang('form.active'); ?>:</label></td>
								<td><input type="checkbox" name="user_active" id="user_active" value="1" <?php if (intval(print_post_text('user_active')) == 1) echo 'checked'; ?>></td>
							</tr>
							<tr>
								<td><label for="submit"> </label></td>
								<td><input id="submitadd" type="button" value="<?php echo lang('title.add.account'); ?>" class="submitbutton"/></td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="5" cellspacing="0" class="form-table w100">
						<tbody>
							<tr>
								<td><span class="error error_form_msg"><?php echo lang('form.check.required.fields'); ?></span></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</form>
		</div>
	</div>
</div>
