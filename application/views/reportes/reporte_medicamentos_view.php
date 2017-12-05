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
$cantidad = 0;
if($compras_arv):
  $this->table->set_heading('Nombre ARV','Número de producto','Cantidad compras','Cantidad consumida');
  $this->table->add_row($arv->getNombre(), $compras_arv->numero_producto, $compras_arv->cantidad, $consumido_arv);
elseif ($compras_arvs):
  foreach ($consumidos as $c) {
    foreach ($compras_arvs as $arv) {
        if ($c['numero'] == $arv->numero_producto) :
              $this->table->set_heading('Número de producto','Cantidad compras','Consumido');
              $this->table->add_row($arv->numero_producto, $arv->cantidad, $c['cantidad']);         
        endif;
  }
}
  ?>
<section>       
<?=
   $this->table->generate();  
?>
</section>
<?php endif ?>


<?= $this->load->view('footer_view', '', TRUE) ?>