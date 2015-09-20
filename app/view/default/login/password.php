<div id="right-container">
	<div id="content-page">
		<?php display_message(); ?>
		<form action="/<?php echo get_site_lang(); ?>/login/processpwd" method="post">
			<fieldset name="connexion">
				<table align="center" border="0" cellpadding="5" cellspacing="0" class="form-table w100">
					<tr>
						<th nowrap="nowrap" width="50%"><label for="email"><?php echo lang('form.email'); ?>:</label></th>
						<td nowrap="nowrap" width="50%"><input id="email" class="w100" name="email" tabindex="1" type="text" value="<?php echo $email; ?>" /></td>
					</tr>
					<tr>
						<td colspan="2"><hr /></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input class="btnfrm" type="submit" value="<?php echo lang('login.send'); ?>" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
</div>

