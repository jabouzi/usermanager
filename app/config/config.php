<?php

$config['default'] = 'application';
$config['lang'] = 'fr';
if (strstr($_SERVER['HTTP_HOST'], 'tgiprojects.com'))
{
	$config['database'] = 'jabouzic_usermanager';
	$config['username'] = 'jabouzic_db';
	$config['password'] = '7024043';
	$config['host'] = 'localhost';
}
else
{
	$config['database'] = 'usermanager';
	$config['username'] = 'root';
	$config['password'] = '7024043';
	$config['host'] = 'localhost';
}

$config['driver'] = 'mysql';
$config['site_languages'] = array('fr', 'en', 'es');
$config['autoload_helpers'] = array('functions');
$config['autoload_languages'] = array('application');
