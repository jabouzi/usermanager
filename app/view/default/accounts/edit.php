	<div id="right-container">
		<div id="content-page">
			<?php display_message(); ?>
			<div class="row dissmiss"><a id="cancel" class="cancel"><?php echo lang('form.cancel.delete'); ?><span id="count_num">3</span></a></div>
<form action="/<?php echo get_site_lang(); ?>/application/delete" method="post" id="deleteform">    
         <input id="delete" type="button" value="<?php echo lang('form.delete.account'); ?>" class="deletebutton" />
       <input type="hidden" name="user_name" id="user_name" value="<?php echo $user->get_user_name(); ?>"/>
</form>

<form action="/<?php echo get_site_lang(); ?>/application/processedit" method="post" id="editform">	
<fieldset>
					<table class="form-table" align="center" border="1" cellpadding="5" cellspacing="0" width="100" style="width:100%;table-layout:fixed">
						<tbody>
    <tr>
		<td><label for="user_name"><?php echo lang('form.username'); ?>:</label></td>
		<td><input type="text" name="user_name" id="user_name" value="<?php echo print_post_text('user_name', $user->get_user_name()); ?>" readonly /></td>
	</tr>
    <tr>
		<td><label for="email"><?php echo lang('form.email'); ?>:</label></td>
		<td><input type="text" name="user_email" id="user_email" value="<?php echo print_post_text('user_email', $user->get_user_email()); ?>" data-validate="required" data-type="email" /></td>
	</tr>
    <tr>
		<td><label for="user_first_name"><?php echo lang('form.firstname'); ?>:</label></td>
		<td><input type="text" name="user_first_name" id="user_first_name" value="<?php echo print_post_text('user_first_name', $user->get_user_first_name()); ?>" data-validate="required" /></td>
	</tr>
	<tr>
		<td><label for="user_last_tname"><?php echo lang('form.lastname'); ?>:</label></td>
		<td><input type="text" name="user_last_name" id="user_last_name" value="<?php echo print_post_text('user_last_name', $user->get_user_last_name()); ?>" data-validate="required" /></td>
	</tr>
	<tr>
		<td><label for="user_password"><?php echo lang('form.password'); ?>:</label></td>
		<td><input type="password" name="user_password" id="user_password" value="<?php echo print_post_text('user_password'); ?>" autocomplete="off" /></td>
	</tr>
	<tr>
		<td><label for="status"><?php echo lang('form.active'); ?>:</label></td>
		<td><input type="checkbox" name="user_active" id="user_active" value="1" <?php if (intval(print_post_text('user_active', $user->get_user_active())) == 1) echo 'checked'; ?>>
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

