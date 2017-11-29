<html>
<head>
	<title><?= $titulo ?></title>
	<link href=<?= base_url("assets/semantic/dist/semantic.min.css")?> rel="stylesheet" media="screen">
	<link href=<?= base_url("assets/stylesheets/style.css")?> rel="stylesheet" media="screen">
</head>
<body>

<? if(!$this->session->userdata('logged_in')) :?>
	<div class="ui left fixed vertical inverted menu">
	<div class="item">
		<!-- <img class="ui mini image" src="/images/logo.png"> -->
		<h2 class="ui inverted header">SIMVIH</h2>
	</div>
	<a class="item" data-vivaldi-spatnav-clickable="1">Features</a>
	<a class="item" data-vivaldi-spatnav-clickable="1">Testimonials</a>
	<a class="item" data-vivaldi-spatnav-clickable="1">Sign-in</a>
	</div>
<? endif ?>


<div class="header_content">
	<div class="navigation">
	<?php if(!$this->session->userdata('logged_in')) :?>
	<?php else:?>
	<?php endif;?>
	</div>
</div>
