<?= $this->load->view('header_view', array('titulo' => 'Gestión de pacientes' ), TRUE) ?>
<br>
<div class="ui grid">
  <div class="ui five wide column"></div>
  <div class="ui eight wide column">
    <div class="ui hidden message" id="mensajeError">
      <i class="close icon"></i>
      <div class="header ">
        El paciente se ingreso correctamente
      </div>
      <p></p>
    </div>
  </div>
</div>
<br>
<section>
  <div class="ui text container segment">
    <h1 class"ui header">Gestión de pacientes</h1>
    <?php
         $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
      );
       $this->table->set_template($template);
    echo validation_errors();
    echo form_open('Gestionar_pacientes/create', array('class' => 'ui form'));

      $num = array(
          'name' => 'numero_expediente',
          'placeholder' => 'Ingrese el numero de expediente',
      );

      $fecha = array(
          'name' => 'fecha_diagnostico',
          'placeholder' => 'Ingrese fecha diagnostico',
          'type' => "date"
      );



      $cli = array(
        'default' => 'Ingrese la clinica'
      );
      foreach ($clinicas as $cl) {
        $cli[$cl->getId()] = $cl->getNombre();
      }

      $via = array(
          'default' => 'Ingrese la vía de contagio'
      );
      foreach ($vias as $v) {
        $via[$v->getId()] = $v->getNombre();
      }


        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');
        $select = array('class'=>"ui fluid dropdown");  

      echo "<div class='field'>";
        echo form_label('Numero expediente:', 'num', $atriLabel);
        echo "<div>";
          echo form_input($num);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
        echo form_label('Fecha diagnostico:', 'fecha', $atriLabel);
        echo "<div>";
          echo form_input($fecha);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Clinica:', 'cli', $atriLabel);
        echo "<div>";
          echo form_dropdown('clinica', $cli, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Vía de contagio:', 'via', $atriLabel);
        echo "<div>";
          echo form_dropdown('via_transmision', $via, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo form_submit('','Crear paciente', $button);
         
    echo form_close();

  $this->table->set_heading('N° expediente','Fecha de diagnostico','Clinica','Vía de contagio','Enfermedades','Expediente','Historial');
  foreach ($pacientes as $p) {
      $enf = '<a href='.$this->config->base_url().'Enfermedades_oportunistas/index/'.$p->getId().'>Enfermedades</a>';
      $exp = '<a href='.$this->config->base_url().'Consultar_expediente/index/'.$p->getNumero().'>Expediente</a>';
      $est = '<a href='.$this->config->base_url().'Gestionar_estado_pacientes/index/'.$p->getId().'>Historial</a>';
      $this->table->add_row($p->getNumero(),date("d-m-Y",strtotime($p->getFecha())),$p->getClinica()->getNombre(),$p->getVia()->getNombre(),$enf,$exp,$est);
  }
    ?>
  </div>
</section>
<section>
       
<?=
 $this->table->generate() 
?>
</section>
<script>

  $(document).ready(function () {
    //alert("<?= $this->uri->segment(3)?>");
    if ("<?= $this->uri->segment(3)?>" == "success"){
      $("#mensajeError").removeClass("hidden");
      $("#mensajeError").addClass("green");
    }else{

    }
  });


</script>
<?= $this->load->view('footer_view', '', TRUE) ?>