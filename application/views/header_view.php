<html>
<head>
	<title><?= $titulo ?></title>
	<link rel="icon" type="image/x-icon" href="<?= base_url("assets/images/logo-s.jpg")?>" />
	<link href=<?= base_url("assets/semantic/dist/semantic.min.css")?> rel="stylesheet" media="screen">
	<link href=<?= base_url("assets/stylesheets/style.css")?> rel="stylesheet" media="screen">
</head>
<body>

<?php if($this->session->userdata('logged_in')) :?>
	<div class="ui left fixed vertical inverted menu">
	<div class="item">
		<!-- <img class="ui mini image" src="/images/logo.png"> -->
		<h2 class="logo-sistem">SIMVIH</h2>
	</div>
	<a href="<?=base_url("/Consultar_expediente")?>" class="item">Expediente</a>
	<a href="<?=base_url("/gestionar_pacientes")?>" class="item">Gestionar Pacientes</a>
	<div class="ui inverted item accordion">
		<div class="title">
			Administración
		</div>
		<div class="content">
			<a href="<?=base_url("/gestionar_usuarios")?>" class="item">Gestionar usuarios</a>		
		</div>
	</div>
	<a href="<?= base_url("/Login/logout") ?>" class="item">Cerrar sesión</a>
	</div>
<?php endif ?>


<div class="header_content">
	<div class="navigation">
	<?php if(!$this->session->userdata('logged_in')) :?>
	<?php else:?>
	<?php endif;?>
	</div>
</div>
