<?= $this->load->view('header_view', array('titulo' => 'Gestión de antiretrovirales' ), TRUE) ?>

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
    ?>
  </div>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>