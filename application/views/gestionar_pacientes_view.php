<?= $this->load->view('header_view', array('titulo' => 'Gestión de pacientes' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Gesión de pacientes</h1>
    <?php
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
        'name' => 'clinica',
        'placeholder' => 'Ingrese la clinica',
      );

      $via = array(
          'name' => 'via_transmision',
          'placeholder' => 'Ingrese la vía de contagio',
      );


        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');


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
          echo form_input($cli);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Vía de contagio:', 'via', $atriLabel);
        echo "<div>";
          echo form_input($via);
        echo "</div>";
      echo "</div>";

      echo form_submit('','Crear paciente', $button);
         
    echo form_close();
    ?>
  </div>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>