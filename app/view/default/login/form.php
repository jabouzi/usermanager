<div id="right-container">
	<div id="content-page">
		<form action="/<?php echo get_site_lang(); ?>/login/process" method="post">
			<fieldset name="connexion">
				<legend><?php echo lang('title.login'); ?></legend>
				<table align="center" border="0" cellpadding="5" cellspacing="0" class="form-table w100">
					<tr>
						<th nowrap="nowrap" width="50%"><label for="email"><?php echo lang('form.username'); ?>:</label></th>
						<td nowrap="nowrap" width="50%"><input id="email" class="w100" name="nom_ut" tabindex="1" type="text" value="" /></td>
					</tr>
					<tr>
						<th nowrap="nowrap"><label for="password"><?php echo lang('form.password'); ?>:</label></th>
						<td nowrap="nowrap"><input id="password" class="w100" name="password" tabindex="2" type="password" value="" /></td>
					</tr>
					<tr>
						<td colspan="2"><hr /></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input class="btnfrm" type="submit" value="<?php echo lang('title.login'); ?>" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
</div>

