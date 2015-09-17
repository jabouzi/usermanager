	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
<form action="/<?php echo get_site_lang(); ?>/admin/processprofile" method="post" id="editform">
<fieldset>
					<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
						<tbody>
	<tr>
        <td><input type="hidden" name="id" id="id" value="<?php echo $user->get_id(); ?>"/></td> 
    </tr>
    <tr>
		<td><label for="email"><?php echo lang('form.email'); ?>:</label></td>
		<td><input type="text" name="email" id="email" value="<?php echo print_post_text('email', $user->get_email()); ?>" data-validate="required" data-type="email" /></td>
	</tr>
    <tr>
		<td><label for="first_name"><?php echo lang('form.firstname'); ?>:</label></td>
		<td><input type="text" name="first_name" id="first_name" value="<?php echo print_post_text('first_name', $user->get_first_name()); ?>" data-validate="required"  /></td>
	</tr>
	<tr>
		<td><label for="last_tname"><?php echo lang('form.lastname'); ?>:</label></td>
		<td><input type="text" name="last_name" id="last_name" value="<?php echo print_post_text('last_name', $user->get_last_name()); ?>" data-validate="required" /></td>
	</tr>
	<tr>
		<td><label for="password"><?php echo lang('form.password'); ?>:</label></td>
		<td><input type="password" name="password" id="password" value="<?php echo print_post_text('password'); ?>" autocomplete="off" /></td>
	</tr>
    <div>
		<tr><td><label for="submit"> </label></td>
			<td><input id="submitedit" type="button" value="<?php echo lang('title.edit.profile'); ?>" class="submitbutton" /></td>
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
