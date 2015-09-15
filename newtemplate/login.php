<?php
  $request_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<form action="process_login.php" method="post">
	<fieldset name="connexion">
		<legend>Gestion de membership SQA : Connexion</legend>
		<table align="center" border="0" cellpadding="5" cellspacing="0" class="form-table w100">
			<tr>
				<th nowrap="nowrap" width="50%"><label for="login_user">Nom d'utilisateur&nbsp;:</label></th>
				<td nowrap="nowrap" width="50%"><input id="login_user" class="w100" name="nom_ut" tabindex="1" type="text" value="" /></td>
			</tr>
			<tr>
				<th nowrap="nowrap"><label for="login_pass">Mot de passe&nbsp;:</label></th>
				<td nowrap="nowrap"><input id="login_pass" class="w100" name="password" tabindex="2" type="password" value="" /></td>
			</tr>
			<tr>
				<!--<th nowrap="nowrap"><label for="login_auto">Connexion automatique&nbsp;:</label></th>
				<td nowrap="nowrap"><input id="login_auto" name="Auto" type="checkbox" value="Auto" /></td>-->
			</tr>
			<tr>
				<td colspan="2"><hr /></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input class="btnfrm" type="submit" value="Connection" /></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><a href="index.php?source=mot_de_passe">Mot de passe oublié ?</a></td>
			</tr>
		</table>
	</fieldset>
    <input type="hidden" name="redirect_url" value="<?=base64_encode($request_url)?>" />
</form>
