<?php

function compare_user_data($user1, $user2)
{
	if (isempty($user1['password'])) $user2['password'] = '';
	if (!isset($user1['admin'])) $user1['admin'] = 0;
	if (!isset($user1['status'])) $user1['status'] = 0;
	return array_merge(array_diff_assoc($user1, $user2), array_diff_assoc($user2, $user1));
}

function compare_user_admin($user1, $user2)
{
	if (isempty($user1['password'])) $user2['password'] = '';
	if (!isset($user1['admin'])) $user1['admin'] = 0;
	if (!isset($user1['status'])) $user1['status'] = 0;
	return array_merge(array_diff_assoc($user1, $user2), array_diff_assoc($user2, $user1));
}

function display_languages()
{
	echo '<select id="user_langs" name="user_langs" class="select_footer">';
	foreach(get_site_langs() as $lang)
	{
		$selected = '';
		if (get_site_lang() == $lang) $selected = 'selected';
		echo '<option value="'.$lang.'" '.$selected.'>'.$lang.'</option>';
	}
	echo '</select>';
}
