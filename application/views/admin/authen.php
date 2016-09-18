<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <meta name="msapplication-TileColor" content="#3372DF">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/assets/materialMdl/material.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/assets/my_styles.css">

  </head>

  <body>
	
	<div id='signInCard' class="mdl-card mdl-shadow--8dp">
<!--       <div class="mdl-card__title">
        Painaifun Management System
</div> -->
	  <div id='signLogo' class="mdl-card__media">
	  	<img src='<?php echo base_url();?>resource/assets/img/pnf_logo3.png'>
	  </div>
	  <div class="mdl-card__supporting-text">
        <form id='authForm' action='<?php echo base_url("admin/authen")?>' method='POST'>
    		<div id="TextField1" class="mdl-textfield mdl-js-textfield">
    		  <input class="mdl-textfield__input" type="text" name="pnf_user" pattern="[A-Z,a-z, ]*" />
    		  <label class="mdl-textfield__label" for="user">User name</label>
    		  <span class="mdl-textfield__error">Letters and spaces only</span>
    		</div>
    		<div id="TextField2" class="mdl-textfield mdl-js-textfield">
    		  <input class="mdl-textfield__input" type="password" name="pnf_pass" pattern="[A-Z,a-z, ]*" />
    		  <label class="mdl-textfield__label" for="user">Password</label>
    		  <span class="mdl-textfield__error">Letters and spaces only</span>
    		</div>
    		<button id='signInButton' class="mdl-button mdl-js-button mdl-js-ripple-effect">
      			Login
    		</button>
        </form>
	  </div>
	</div>

    <script src="<?php echo base_url();?>resource/assets/materialMdl/material.min.js"></script>

  </body>
</html>