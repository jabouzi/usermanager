<?php

    $name_readonly = '';

    if ((get_admin_level() > 1 && get_admin_level() < 5) || is_readonly()) $name_readonly = 'readonly';
    else
    {
       if (is_readonly()) $name_readonly = 'readonly';
    }

    if ($_SESSION['membres']['user']['code_m'] == $_GET['code_m']) $name_readonly = '';
?>

<tr class="th">
	<td colspan="4"><label>Nom</label></td>
	<td colspan="4"><label>Prénom</label></td>
	<td colspan="2"><label title="">Sexe</label></td>
</tr>
<tr>
	<td colspan="4"><input class="w100" type="text" title="Nom" name="name" validate="text" <?=$name_readonly?> value="<?=$user['nom']?>" /></td>
	<td colspan="4"><input class="w100" type="text" title="Prénom"  name="prenom" validate="text" <?=$name_readonly?> value="<?=$user['prenom']?>" /></td>
	<td colspan="2"><select class="w100" title="Sexe" name="sex" size="1" validate="option">
		<option value=""></option>
		<option value="M" <? if ($user['sexe'] == 'M') echo 'SELECTED' ?> >Homme</option>
		<option value="F" <? if ($user['sexe'] == 'F') echo 'SELECTED' ?> >Femme</option>
	</select></td>
	<? if (strpos($_GET['source'],'create') !== false) : ?>
		<td colspan="2"><input type="button" class="verifier_athlete" value="Vérifier membre"></td>
	<? endif ?>
</tr>
<? /* ligne 2 */ ?>
<tr class="th">
	<td colspan="4"><label>No. de porte et Nom de rue</label></td>
	<td colspan="4"><label>Ville</label></td>
	<td colspan="4"><label>Province</label></td>
</tr>
<tr>
	<td colspan="4"><input class="w100" type="text" title="Adresse" name="adresse" validate="text" value="<?=$user['adresse']?>" /></td>
	<td colspan="4"><input class="w100" type="text" title="Ville" name="ville" validate="text" value="<?=$user['ville']?>" /></td>
	<td colspan="4"><?=display_select(provinces(), $user['province'], 'province',  'province', 'w100', true, 'Province') ?></td>
</tr>
<? /* ligne 3 */ ?>
<tr class="th">
	<td colspan="2"><label>Code postal</label></td>
	<td colspan="4"><label>Date de naissance&nbsp;&nbsp;<small>(aaaa-mm-jj)</small></label></td>
</tr>
<tr>
	<td colspan="2"><input class="w100" type="text" title="Code postale" name="code_postal"  validate="text" value="<?=$user['code_postal']?>" /></td>
    <? if ($_GET['source'] == 'athletes_create' || $_GET['source'] == 'athletes_update' ) : ?>
        <td colspan="4"><input class="w100" type="text" title="Date de naissance" name="birth_date" maxlength="10" validate="date" value="<?=$user['ddn']?>" /></td>
    <? else : ?>
        <td colspan="4"><input class="w100" type="text" title="Date de naissance" name="birth_date" maxlength="10" value="<?=$user['ddn']?>" /></td>
    <? endif ?>
</tr>
<tr>
	<td colspan="12"><hr/></td>
</tr>
<tr class="th">
	<td colspan="6"><label>Courriel</label></td>
	<? if ($_GET['source'] != 'gestionnaires_create' && $_GET['source'] != 'gestionnaires_update' ) : ?>
		<td colspan="6"><label>Mot de passe</label></td>
	<? endif ?>
</tr>
<tr>
    <td colspan="6"><input class="w100" type="text" title="Courriel" name="email" validate="email" value="<?=$user['email']?>" /></td>
    <? if ($_GET['source'] != 'gestionnaires_create' && $_GET['source'] != 'gestionnaires_update' ) : ?>
		<td colspan="6"><input class="w100" type="password" title="Mot de passe" name="password"  maxlength="100" value="" <?php if ($_GET['source'] == 'athletes_create') { ?> validate="text"; <?php } ?> ></td>
	<? endif ?>
</tr>

