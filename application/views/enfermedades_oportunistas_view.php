<?= $this->load->view('header_view', array('titulo' => 'Enfermedades' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Enfermedades oportunistas</h1>
    <?php
         $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
      );
       $this->table->set_template($template);
    echo validation_errors();
    echo form_open('Enfermedades_oportunistas/addEnfermedad', array('class' => 'ui form'));

      $enf = array(
          'default' => 'Ingrese la enfermedad',
      );

      foreach ($enfermedades_all as $e) {
        $enf[$e->getId()] = $e->getNombre();
      }

        $select = array('class'=>"ui fluid dropdown");
        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');
      echo "<div class='field'>";
        echo form_label('Enfermedad:', 'enf', $atriLabel);
        echo "<div>";
          echo form_dropdown('id_enfermedad', $enf, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo form_hidden('id_paciente', $id_paciente);
      echo form_submit('','Agregar', $button);         
    echo form_close();

    $this->table->set_heading('Enfermedad','Descripcion');
    foreach ($enfermedades as $e) {      
        $this->table->add_row($e->getNombre(),$e->getDescripcion());
    }
    ?>
  </div>
</section>
<section>
       
<?= $this->table->generate() ?>
<a href=<?= $this->config->base_url()."Gestionar_pacientes/" ?>>Atras</a>
</section>

<?= $this->load->view('footer_view', '', TRUE) ?>