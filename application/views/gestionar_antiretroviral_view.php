<?= $this->load->view('header_view', array('titulo' => 'Gestión de antiretrovirales' ), TRUE) ?>
<br>
<div class="ui grid">
  <div class="ui five wide column"></div>
  <div class="ui eight wide column">
    <div class="ui hidden message" id="mensajeSuccess">
      <i class="close icon"></i>
      <div class="header ">
        ¡El antirretroviral se creo satisfactoriamente!
      </div>
      <p></p>
    </div>
  </div>
</div>
<br>
<section>
  <div class="ui text container segment">
    <h1 class"ui header">Gestión de antiretroviral</h1>
    <?php
        echo validation_errors();
        echo form_open('Gestionar_antiretroviral/create', array('class' => 'ui form'));

        $nombre = array(
            'name' => 'nombre',
            'placeholder' => 'Ingrese el nombre del antiretroviral',
        );

        $abr = array(
            'name' => 'abreviatura',
            'placeholder' => 'Ingrese la abreviatura del antiretroviral'
        );

        $desc = array(
            'name' => 'descripcion',
            'placeholder' => 'Ingrese la descripción del antiretroviral',
        );

        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');


        echo "<div class='field'>";
            echo form_label('Nombre antiretroviral:', 'nomb', $atriLabel);
            echo "<div>";
                echo form_input($nombre);
            echo "</div>";
        echo "</div>";

        echo "<div class='field'>";
            echo form_label('Abreviatura antiretroviral:', 'abr', $atriLabel);
            echo "<div>";
                echo form_input($abr);
            echo "</div>";
        echo "</div>";

        echo "<div class='field'>";
            echo form_label('Descripción antiretroviral:', 'desc', $atriLabel);
            echo "<div>";
                echo form_textarea($desc);
            echo "</div>";
        echo "</div>";

        echo form_submit('','Crear antiretroviral', $button);
         
    echo form_close();

    $template = array(
        'table_open' => '<table class="ui single line celled table">'
    );
    $this->table->set_template($template);
    
    $this->table->set_heading('N° antiretroviral','Nombre', 'Abreviatura', 'Descripción');
    
    foreach ($antiretrovirales as $antiretroviral) {
        $this->table->add_row(
            $antiretroviral->getId(),
            $antiretroviral->getNombre(),
            $antiretroviral->getAbreviatura(),
            $antiretroviral->getDescripcion()
        );
    }
    ?>
  </div>

  <?= $this->table->generate() ?>

</section>
<script>

  $(document).ready(function () {
    if ("<?= $this->uri->segment(3)?>" == "success"){
      $("#mensajeSuccess").removeClass("hidden");
      $("#mensajeSuccess").addClass("green");
    }
  });
</script>
<?= $this->load->view('footer_view', '', TRUE) ?>