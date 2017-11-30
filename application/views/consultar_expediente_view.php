<?php
	echo $this->load->view('header_view', array('titulo' => 'Consultar expediente' ), TRUE);
	$template = array(
			'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
	);
	$this->table->set_template($template);

 	$title = array('data' => "Información general: ", 'colspan' => "2");
    $this->table->add_row($title);
	$this->table->add_row('Número de expediente: ', $expediente->numero_expediente);
	$this->table->add_row('Sexo:', $expediente->sexo);
	$this->table->add_row('Edad:', $expediente->edad);
	$this->table->add_row('Nombre completo: ', $expediente->nombre_completo);
	$this->table->add_row('Número unico de identidad: ', $expediente->dui);
	$this->table->add_row('Fecha de apertura: ', date("d-m-Y",strtotime($expediente->fecha_apertura)));
	$this->table->add_row('Estado civil: ', $expediente->estado_civil);
	$this->table->add_row('Dirección: ', $expediente->direccion); 
?>
<section>

<div class="ui top attached tabular menu">
  <h2 class="ui header item">Consultar expediente</h2>
</div>

<?= $this->table->generate() ?>

<a href=<?=$this->config->base_url()."Consultar_historial"?>>Historial del paciente</a>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>