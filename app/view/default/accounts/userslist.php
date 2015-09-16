<div id="right-container">
	<div id="content-page">
		<?php display_message(); ?>
		<table class="data-table" border="1" cellpadding="5" cellspacing="0" style="width:100%">
			<tbody>
<?php 
	foreach ($users as $user) {
		echo '<tr><td><a href="/'.get_site_lang().'/application/edit/' . $user->get_user_name() . '">';
		echo $user->get_user_first_name() . " " . $user->get_user_last_name();
		echo '</a></td></tr>';
	}
?>
			<tbody>
		<table>
	</div>
</div>
</div>
