<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="false" />
        <meta name="robots" content="noindex,nofollow" />
        <title><?php echo lang('site.title'); ?></title>
        <link href="/public/css/base.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/public/js/jquery.min.js"></script>
		<script type="text/javascript" src="/public/js/vform.js"></script>
		<script type="text/javascript" src="/public/js/app.js"></script>
	</head>
    <body>
        <div class="outter-wrap">
            <div class="inner-wrap">
                <div id="header">
                    <div id="title-site">
                        <a href="/<?php echo get_site_lang(); ?>"><h1>USERS MANAGER APP.</h1></a>
                        
                        <? if (islogged()) : ?>
                            <div id="site-deconnection">
								<?php echo ucfirst($_SESSION['user']['first_name']); ?> <?php echo ucfirst($_SESSION['user']['last_name']); ?>
                            </div>
                        <? endif  ?>
					</div>
                    <h2 id="title-header"><?php echo $title; ?></h2>
				</div>
                <div id="main" class="clear-fix">
