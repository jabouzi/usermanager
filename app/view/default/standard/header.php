<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="robots" content="noindex,nofollow" />
        <title><?php echo lang('site.title'); ?></title>
        <link href="/public/css/base.css" rel="stylesheet" type="text/css" />
	</head>
    <body>
        <div class="outter-wrap">
            <div class="inner-wrap">
                <div id="header">
                    <div id="title-site">
                        <a href=""><h1>UMA</h1></a>
                        
                        <? if (islogged()) : ?>
                            <div id="site-deconnection"><?=ucfirst($_SESSION['membres']['user']['prenom'])?> <?=ucfirst($_SESSION['membres']['user']['nom'])?> <a href="process_login.php?logout=true">Déconnection</a><br />
                            <? if (isset($_SESSION['membres']['user']['archive_site'])) : ?>
                            <small>Archives (<?=$_SESSION['membres']['user']['archive_site']?>)<a href="process_login.php?quit_archive=true"> Quitter l'archive</a></small>
                            <? endif ?>
                            </div>
                        <? endif  ?>
					</div>
                    <h2 id="title-header"></h2>
				</div>
                <div id="main" class="clear-fix">
