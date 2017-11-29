<?php
 include_once("header_view.php");
 $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'
);
 $this->table->set_template($template);

 foreach ($expediente as $d) {
 	$title = array('data' => "Historial del paciente: ", 'colspan' => "2");
    $this->table->add_row($title);
	$this->table->add_row('Medico que atendió: ', $d->medico_atendio);
	$this->table->add_row('Diagnostico:', $d->diagnostico);
	$this->table->add_row('Fecha de la consulta:', date("d-m-Y",strtotime($d->fecha_consulta)));
	$this->table->add_row('Motivo de la consulta: ', $d->motivo_consulta);
	$this->table->add_row('Peso(lb): ', $d->peso); 	
 }
 echo $this->table->generate();


 echo ('<a href='.$this->config->base_url()."Consultar_expediente".'>Atras</a>');

 include_once("footer_view.php");
 ?>