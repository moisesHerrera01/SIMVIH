<?= $this->load->view('header_view', array('titulo' => 'Estado paciente' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Estado del paciente</h1>
    <?php
         $template = array(
        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="ui single line celled table">'
      );
       $this->table->set_template($template);
    echo validation_errors();
    echo form_open('Gestionar_estado_pacientes/create', array('class' => 'ui form'));

      $peso = array(
          'name' => 'peso',
          'placeholder' => 'Ingrese el peso',
      );

      $hosp = array(
          'name' => 'hosp',
          'placeholder' => 'Ingrese hospitalizaciones en los ultimos 12 meses',
          'type' => "number"
      );

      $serv = array(
      'default' => 'Servicio de atención',
      'Ambulatorio' => 'Ambulatorio', 
      'Hospitalizacion' => 'Hospitalizacion'
      );

      $tip = array(        
      'default' => 'Tipo de paciente',
      'Activo en ARV' => 'Activo en ARV',
      'Activo sin ARV' => 'Activo sin ARV',
      'No acepto tratamiento' => 'No acepto tratamiento',
      'Abandono a 90 dias' => 'Abandono a 90 dias'
      );

      $cla = array(
        'default' => 'Clasificación según OMS',
        'Estadio 1'  => 'Estadio 1',
        'Estadio 2'  => 'Estadio 2',
        'Estadio 3'  => 'Estadio 3',
        'Estadio 4'  => 'Estadio 4'
      );

      $est = array(
      'default' => 'Estado actual',
      'Asintomatico' => 'Asintomatico',
      'Sintomatico sin sida' => 'Sintomatico sin sida',
      'Paciente con sida' => 'Paciente con sida' 
      );

      $arv = array(
      'default' => 'Criterio de ARV',  
      'Nuevo' => 'Nuevo',
      'Reinicio' => 'Reinicio', 
      'Seguimiento traslado' => 'Seguimiento traslado',
      'Seguimiento retorno al pais' => 'Seguimiento retorno al pais',
      'Embarazada' => 'Embarazada'
      ); 

      $esq = array(
        'default' => 'Esquema de ARV'
      );
      foreach ($arvs as $ar) {
        $esq[$ar->getId()] = $ar->getNombre().' ('.$ar->getAbreviatura().')';
      }

      $camb = array(
      'default' => 'Criterio de cambio ARV',
      'Efectos adversos' => 'Efectos adversos',
      'Falla virologia' => 'Falla virologia',
      'Genotipo' => 'Genotipo',
      'Desabastecimiento local' => 'Desabastecimiento local',
      'Desabastecimiento nacional' => 'Desabastecimiento nacional'
      );

      $egr = array(
      'default' => 'Criterio para egreso de ARV',
      'Alta exigida' => 'Alta exigida',
      'Traslado al ISSS' => 'Traslado al ISSS',
      'Traslado al exterior' => 'Traslado al exterior',
      'Traslado a otro hospital' => 'Traslado a otro hospital',
      'Suspensión' => 'Suspensión',
      'Finalización de PPE' => 'Finalización de PPE',
      'Fallecido' => 'Fallecido'
      );

      $med = array(
          'name' => 'med',
          'placeholder' => 'Médico responsable',
      );

      $gra = array(
        'default' => 'Grado de autonomía'
      );
      foreach ($grds as $gr) {
        $gra[$gr->getId()] = 'Deambulación: '.$gr->getDeambulacion().', Alimentación: '.$gr->getAlimentacion().', Aseo: '.$gr->getAseo();
      }

        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');
        $select = array('class'=>"ui fluid dropdown");


      echo "<div class='field'>";
        echo form_label('Peso:', 'peso', $atriLabel);
        echo "<div>";
          echo form_input($peso);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
        echo form_label('Hospitaliziaciones:', 'hosp', $atriLabel);
        echo "<div>";
          echo form_input($hosp);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Servicio:', 'serv', $atriLabel);
        echo "<div>";
          echo form_dropdown('servicio', $serv, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Tipo de paciente:', 'tip', $atriLabel);
        echo "<div>";
          echo form_dropdown('tipo', $tip, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Clasificación según OMS:', 'cla', $atriLabel);
        echo "<div>";
        echo form_dropdown('clasificacion', $cla, 'default',$select);
        echo "</div>";
      echo "</div>";

           echo "<div class='field'>";
      echo form_label('Estado actual:', 'est', $atriLabel);
        echo "<div>";
           echo form_dropdown('estado', $est, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Criterio para ARV:', 'arv', $atriLabel);
        echo "<div>";
          echo form_dropdown('cri', $arv, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Esquema de ARV:', 'esq', $atriLabel);
        echo "<div>";
          echo form_dropdown('esquema', $esq, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Criterio de cambio ARV:', 'camb', $atriLabel);
        echo "<div>";
          echo form_dropdown('camb', $camb, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Criterio de egreso de ARV:', 'egr', $atriLabel);
        echo "<div>";
          echo form_dropdown('egreso', $egr, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Médico responsable:', 'med', $atriLabel);
        echo "<div>";
          echo form_input($med);
        echo "</div>";
      echo "</div>";

      echo "<div class='field'>";
      echo form_label('Grado autonomía:', 'gra', $atriLabel);
        echo "<div>";
         echo form_dropdown('grado', $gra, 'default',$select);
        echo "</div>";
      echo "</div>";

      echo form_hidden('id_paciente', $id_paciente);
      echo form_submit('','Agregar', $button);
         
    echo form_close();
   ?>
  </div>
  <a href=<?= $this->config->base_url()."Gestionar_pacientes/" ?>>Atras</a>
</section>
<?= $this->load->view('footer_view', '', TRUE) ?>