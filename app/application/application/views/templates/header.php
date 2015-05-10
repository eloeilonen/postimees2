<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	<meta charset="utf-8">
	<title><?php echo $title ?> - Postimees 2</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
    <META HTTP-EQUIV="cache-control" CONTENT="public">
    <meta http-equiv="expires" content="<?= gmdate('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT' ?> GMT">
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>">Postimees 2</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(! empty($this->fb_user['id'])): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="https://graph.facebook.com/<?= $this->fb_user['id'] ?>/picture" height="20px" width="20px">
                        <?=  $this->fb_user['name'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li style="width: 300px">
                            <img class="pull-left thumbnail" style="margin: 10px" src="https://graph.facebook.com/<?= $this->fb_user['id'] ?>/picture?type=large" height="100px" width="100px">
                            <ul class="pull-left nav" style="margin: 10px">
                                <li><?= $this->fb_user['name'] ?></li>
                                <li><?= $this->fb_user['email'] ?></li>
                                <li class="divider"></li>
                                <li><a href="<?= base_url('fb_login/logout') ?>">logi välja</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php else: ?>
                <li><a href="<?= base_url('fb_login') ?>"><i class="fa fa-facebook"></i> logi sisse</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


	<div id="postimees2" class="container">
	<div class="jumbotron" style="background-color:lavender;">
		<h1><a href="<?php echo base_url('/news'); ?>">Postimees 2</a></h1>
		<p>Veebirakenduste loomine 2014/15 kevad</p>
	</div>

<!--
	<script src="https://apis.google.com/js/client:platform.js" async defer></script>
	<span id="signinButton">
  		<span
		    class="g-signin"
		    data-callback="signinCallback"
		    data-clientid="1082678952766-30kadv0uf0didhdidpefd66um24gom78.apps.googleusercontent.com"
		    data-cookiepolicy="single_host_origin"
		    data-requestvisibleactions="http://schema.org/AddAction"
		    data-scope="https://www.googleapis.com/auth/userinfo.email">
		</span>
	</span>
-->

