<?php
 echo $this->load->view('header_view', array('titulo' => 'Consultar historial' ), TRUE);
 $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
 );
 $this->table->set_template($template);
	if ($expediente) {
		 foreach ($expediente as $d) {
		    $this->table->set_heading('Fecha','motivo','Peso(lb)','Medico','Diagnostico');
			$this->table->add_row(date("d-m-Y",strtotime($d->fecha_consulta)),$d->motivo_consulta, $d->peso, $d->medico_atendio, $d->diagnostico);
	 }}else{
	 	redirect($this->config->base_url()."Consultar_expediente/index/".$numero_exp);
	}



?>

<section>

<div class="ui top attached tabular menu">
  <h2 class="ui header item">Historial del paciente</h2>
</div>

<?= $this->table->generate() ?>

<a href=<?= $this->config->base_url()."Consultar_expediente/index/".$numero_exp ?>>Atras</a>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>