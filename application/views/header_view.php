<html>
<head>
	<title><?= $titulo ?></title>
	<link href=<?= base_url("assets/semantic/dist/semantic.min.css")?> rel="stylesheet" media="screen">
	<link href=<?= base_url("assets/stylesheets/style.css")?> rel="stylesheet" media="screen">
</head>
<body>

<?php if($this->session->userdata('logged_in')) :?>
	<div class="ui left fixed vertical inverted menu">
	<div class="item">
		<!-- <img class="ui mini image" src="/images/logo.png"> -->
		<h2 class="header-sistem">SIMVIH</h2>
	</div>
	<a href="<?=base_url("/Consultar_expediente")?>" class="item">Expediente</a>
	<div class="ui inverted item accordion">
		<div class="title">
			Administración
		</div>
		<div class="content">
			<a href="<?=base_url("/gestionar_usuarios")?>" class="item">Gestionar usuarios</a>		
		</div>
	</div>
	<a href="<?= base_url("/Login/logout") ?>" class="item">Logout</a>
	</div>
<?php endif ?>


<div class="header_content">
	<div class="navigation">
	<?php if(!$this->session->userdata('logged_in')) :?>
	<?php else:?>
	<?php endif;?>
	</div>
</div>
