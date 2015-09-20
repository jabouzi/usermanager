	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
			<div class="row dissmiss"><a id="cancel" class="cancel"><?php echo lang('form.cancel.delete'); ?><span id="count_num">3</span></a></div>
<form action="/<?php echo get_site_lang(); ?>/application/delete" method="post" id="deleteform">    
    <input id="delete" type="button" value="<?php echo lang('form.delete.account'); ?>" class="deletebutton" />
    <input type="hidden" name="username" id="name" value="<?php echo $user->get_username(); ?>"/>
</form>

<form action="/<?php echo get_site_lang(); ?>/application/processedit" method="post" id="editform">
<input type="hidden" name="id" id="id" value="<?php echo $user->get_id(); ?>"/>
<fieldset>
					<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
						<tbody>
    <tr>
		<td><label for="name"><?php echo lang('form.username'); ?>:</label></td>
		<td><input type="text" name="username" id="name" value="<?php echo print_post_text('name', $user->get_username()); ?>" readonly /></td>
	</tr>
    <tr>
		<td><label for="email"><?php echo lang('form.email'); ?>:</label></td>
		<td><input type="text" name="email" id="email" value="<?php echo print_post_text('email', $user->get_email()); ?>" data-validate="required" data-type="email" /></td>
	</tr>
    <tr>
		<td><label for="first_name"><?php echo lang('form.firstname'); ?>:</label></td>
		<td><input type="text" name="first_name" id="first_name" value="<?php echo print_post_text('first_name', $user->get_first_name()); ?>" data-validate="required" /></td>
	</tr>
	<tr>
		<td><label for="last_tname"><?php echo lang('form.lastname'); ?>:</label></td>
		<td><input type="text" name="last_name" id="last_name" value="<?php echo print_post_text('last_name', $user->get_last_name()); ?>" data-validate="required" /></td>
	</tr>
	<tr>
		<td><label for="password"><?php echo lang('form.password'); ?>:</label></td>
		<td><input type="password" name="password" id="password" value="<?php echo print_post_text('password'); ?>" autocomplete="off" /></td>
	</tr>
	<tr>
		<td><label for="status"><?php echo lang('form.is.admin'); ?>:</label></td>
		<td><input type="checkbox" name="admin" id="admin" value="1" <?php if (intval(print_post_text('admin', $user->get_admin())) == 1) echo 'checked'; ?>>
    </tr>
	<tr>
		<td><label for="status"><?php echo lang('form.active'); ?>:</label></td>
		<td><input type="checkbox" name="active" id="active" value="1" <?php if (intval(print_post_text('active', $user->get_active())) == 1) echo 'checked'; ?>>
    </tr>
    <div>
		<tr><td><label for="submit"> </label></td>
			<td><input id="submitedit" type="button" value="<?php echo lang('title.edit.account'); ?>" class="submitbutton" /></td>
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

