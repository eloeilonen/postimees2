<!DOCTYPE html>

<h1>Postimees 2</h1>

<html>
<head>

	<meta charset="utf-8">

	<title><?php echo $title ?> - Postimees 2</title>

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

<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
