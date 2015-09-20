<?php

if (islogged())
{
	echo '<div id="left-container">
	<ul class="left-menu">';
	if (isadmin()) {
		$links = array('/'.get_site_lang() => lang('title.accounts'),
				   '/'.get_site_lang().'/application/add'=> lang('title.add.account'),
				   '/'.get_site_lang().'/application/import'=> lang('title.import.accounts')
				   );
	}
	$links['/'.get_site_lang().'/application/profile'] = lang('title.profile');
	$links['/'.get_site_lang().'/login/logout'] = lang('login.logout');

	
	foreach ($links as $link=>$title) {
		echo '<li><a href="' . $link . '">' . $title . '</a></li>';
	}
	
	echo '</ul>
	</div>';

}
