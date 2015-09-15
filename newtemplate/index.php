<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="robots" content="noindex,nofollow" />
        <title>SKI QUÉBEC ALPIN : Module de gestion des membres</title>
        <link rel="icon" href="/favicon.png" type="image/png" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link href="/favicon.ico" rel="shortcut icon" />
        <link href="css/base.css" rel="stylesheet" type="text/css" />
	</head>
    <body>
        <div class="outter-wrap">
            <div class="inner-wrap">
                <div id="header">
                    <div id="title-site">
                        <a href="index.php"><h1>UM</h1></a>
                        <?/* if (is_logged()) : ?>
                            <div id="site-deconnection"><?=ucfirst($_SESSION['membres']['user']['prenom'])?> <?=ucfirst($_SESSION['membres']['user']['nom'])?> <a href="process_login.php?logout=true">Déconnection</a><br />
                            <? if (isset($_SESSION['membres']['user']['archive_site'])) : ?>
                            <small>Archives (<?=$_SESSION['membres']['user']['archive_site']?>)<a href="process_login.php?quit_archive=true"> Quitter l'archive</a></small>
                            <? endif ?>
                            </div>
                        <? endif */ ?>
					</div>
                    <h2 id="title-header">Module des membres</h2>
				</div>
                <div id="main" class="clear-fix">
                    <div id="left-container"><?include('includes/inc_left-menu.php')?></div>
                    <div id="right-container">
                        <h3 id="title-page">                            
                            Bienvenue dans votre module de gestion des membres!
						</h3>
                        <div id="content-page">
							<?php if (isset($_SESSION['membres']['message'])) : ?>
								<div id="error"><?php echo $_SESSION['membres']['message']; ?></div>
								<?php unset($_SESSION['membres']['message']); ?>
							<?php else : ?>
								<div id="error" style="display:none"></div>
							<?php endif; ?>
                            <? require_once('login.php'); ?>
						</div>
					</div>
				</div>
                <div id="footer">
					<div class="footer-menu">
						<a href="index.php">Accueil</a><a href="process_login.php?logout=true">Déconnection</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

