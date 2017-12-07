<?= $this->load->view('header_view', array('titulo' => 'Reporte medicamentos' ), TRUE) ?>
<section>
  <div class="ui text container segment">
    <h1 class"ui header">Reporte de medicamentos</h1>
    <?php
         $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
      );
       $this->table->set_template($template);
    echo validation_errors();
    echo form_open('Reportes/Reporte_medicamentos/index', array('class' => 'ui form', 'method' => 'get'));

       $esq = array(
        'default' => 'Esquema de ARV'
      );
      foreach ($arvs as $ar) {
        $esq[$ar->getId()] = $ar->getNombre().' ('.$ar->getAbreviatura().')';
      }

      $cli = array(
        'default' => 'Clinica'
      );
      foreach ($cls as $cl) {
        $cli[$cl->getId()] = $cl->getNombre();
      }

      $fecha_i = array(
          'name' => 'fecha_i',
          'placeholder' => 'Ingrese fecha inicial',
          'type' => "date"
      );

      $fecha_f = array(
          'name' => 'fecha_f',
          'placeholder' => 'Ingrese fecha final',
          'type' => "date"
      );

        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');
        $select = array('class'=>"ui fluid dropdown");  


      echo "<div class='field'>";
        echo form_label('Fecha inicio:', 'fecha_i', $atriLabel);
        echo "<div>";
          echo form_input($fecha_i);
        echo "</div>";
      echo "</div>";


      echo "<div class='field'>";
        echo form_label('Fecha fin:', 'fecha_f', $atriLabel);
        echo "<div>";
          echo form_input($fecha_f);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Clinica:', 'cli', $atriLabel);
        echo "<div>";
          echo form_dropdown('clinica', $cli, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Antiretroviral:', 'esq', $atriLabel);
        echo "<div>";
          echo form_dropdown('arv', $esq, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo form_submit('','generar', $button);
         
    echo form_close();
    ?>
  </div>
</section>
<?php
$id_arv = $this->input->get('arv');
$fecha_i = $this->input->get('fecha_i');
$fecha_f = $this->input->get('fecha_f');
$id_clinica = $this->input->get('clinica');
$this->table->set_heading('Nombre ARV','Abreviatura','Número de producto','Cantidad comprado','Cantidad consumida');

if($fecha_i!='' && $fecha_f!='' && $id_arv!='default' && $id_clinica!='default'):  
  $this->table->add_row($cantidad['nombre'] ,$cantidad['abreviatura'] ,$cantidad['numero'] ,$cantidad['comprado'] ,$cantidad['cantidad']);
  echo '<section>';
    echo $this->table->generate();
  echo '</section>';  
elseif ($id_arv =='default' && $fecha_i!='' && $fecha_f!='' && $id_clinica!='default'):
  foreach ($cantidades as $c) {      
      $this->table->add_row($c['nombre'], $c['abreviatura'], $c['numero'] , $c['comprado'] , $c['cantidad']);         
  }
  echo '<section>';
  echo $this->table->generate();
echo '</section>';  
endif
?>
<?= $this->load->view('footer_view', '', TRUE) ?>