<?= $this->load->view('header_view', array('titulo' => 'Reporte de Normas' ), TRUE) ?>

<script type="text/javascript">
      var resumen = <?= json_encode($resumen) ?>;
</script>

<script src="<?= base_url('assets/javascripts/Chart.min.js') ?>"></script>

<section>

    <div class="ui text container segment">
        <h1 class"ui header">Reporte de normas</h1>
        <?php
            echo validation_errors();
            echo form_open('Reportes/Reporte_normas/index', array('class' => 'ui form', 'method' => 'get'));

            $atriLabel = array('class' => 'col-lg-2 control-label');
            $button = array('class' => 'ui primary button');

        ?>
            
            <div class='field'>
                <?= form_label('Clinica:', 'numero', $atriLabel) ?>
                <div>
                    <select name="clinica" id="clinica" class="ui fluid dropdown">
                        <option value="default">Seleccione al clinica</option>
                        <?php foreach ($clinicas as $clinica) : ?>
                            <option value="<?= $clinica->getId() ?>"><?= $clinica->getId() ?> - <?= $clinica->getNombre() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="field">
                <label for="">Fecha Incial</label>
                <input type="date" id="fecha_inicial" name="fecha_inicial">
            </div>

            <div class="field">
                <label for="">Fecha Final</label>
                <input type="date" id="fecha_final" name="fecha_final">
            </div>

        <?php 
            echo form_submit('','Generar', $button);
            echo form_close();
        ?>
    </div>

<?php if ($get) : ?>
<?php if (!$grafico) : ?>
<table class="ui single line celled table">
    <thead>
    <tr>
        <th>Norma</th>
        <th>Si</th>
        <th>No</th>
        <th>No aplica</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Asesoria pre prueba</td>
        <td> <?= $resumen['asesoria_pre_prueba']['si'] ?> </td>
        <td> <?= $resumen['asesoria_pre_prueba']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Asesoria post prueba</td>
        <td> <?= $resumen['asesoria_post_prueba']['si'] ?> </td>
        <td> <?= $resumen['asesoria_post_prueba']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Asesoria pre embarazo</td>
        <td> <?= $resumen['asesoria_pre_embarazo']['si'] ?> </td>
        <td> <?= $resumen['asesoria_pre_embarazo']['no'] ?> </td>
        <td> <?= $resumen['asesoria_pre_embarazo']['no_aplica'] ?> </td>
    </tr>
    <tr>
        <td>Asesoria post embarazo</td>
        <td> <?= $resumen['asesoria_post_embarazo']['si'] ?> </td>
        <td> <?= $resumen['asesoria_post_embarazo']['no'] ?> </td>
        <td> <?= $resumen['asesoria_post_embarazo']['no_aplica'] ?> </td>
    </tr>
    <tr>
        <td>Anticonceptivos</td>
        <td> <?= $resumen['anticonceptivos']['si'] ?> </td>
        <td> <?= $resumen['anticonceptivos']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Charla contagio</td>
        <td> <?= $resumen['charla_contagio']['si'] ?> </td>
        <td> <?= $resumen['charla_contagio']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Charla prevención</td>
        <td> <?= $resumen['charla_prevencion']['si'] ?> </td>
        <td> <?= $resumen['charla_prevencion']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Grupo de lucha VIH</td>
        <td> <?= $resumen['grupo_lucha_vih']['si'] ?> </td>
        <td> <?= $resumen['grupo_lucha_vih']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Charla autocuidado</td>
        <td> <?= $resumen['charla_autocuidado']['si'] ?> </td>
        <td> <?= $resumen['charla_autocuidado']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Charla alimentación</td>
        <td> <?= $resumen['charla_alimentacion']['si'] ?> </td>
        <td> <?= $resumen['charla_alimentacion']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Charla sexualidad</td>
        <td> <?= $resumen['charla_sexualidad']['si'] ?> </td>
        <td> <?= $resumen['charla_sexualidad']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Evaluación psicologica</td>
        <td> <?= $resumen['evaluacion_psicologica']['si'] ?> </td>
        <td> <?= $resumen['evaluacion_psicologica']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Evaluación nutricionista</td>
        <td> <?= $resumen['evaluacion_nutricionista']['si'] ?> </td>
        <td> <?= $resumen['evaluacion_nutricionista']['no'] ?> </td>
        <td> -- </td>
    </tr>
    <tr>
        <td>Lactancia materna</td>
        <td> <?= $resumen['lactancia_materna']['si'] ?> </td>
        <td> <?= $resumen['lactancia_materna']['no'] ?> </td>
        <td> <?= $resumen['lactancia_materna']['no_aplica'] ?> </td>
    </tr>
    </tbody>
</table>

<a href="<?= current_url() . "?" . $_SERVER['QUERY_STRING'] . "&grafico=1" ?>">Mostrar Grafica</a>

<?php else: ?>
    
    <div class="chart-container" style="position: relative; height:80vh; width:70vw">
        <canvas id="chart"></canvas>
    </div>

    <a href="<?= current_url() . "?" . rtrim($_SERVER['QUERY_STRING'], "&grafico=1") ?>">Mostrar Tabla</a>

<?php endif ?>
<?php endif ?>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>

<script type="text/javascript">

    var ctx = $('#chart');

    var myBarChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
              'Asesoria pre prueba',
              'Asesoria post prueba',
              'Asesoria pre embarazo',
              'Asesoria post embarazo',
              'Anticonceptivos',
              'Charla contagio',
              'Charla prevención',
              'Grupo de lucha VIH',
              'Charla autocuidado',
              'Charla alimentación',
              'Charla sexualidad',
              'Evaluación psicologica',
              'Evaluación nutricionista',
              'Lactancia materna',
            ],
            datasets: [
              {
                  label: 'Si',
                  data: [
                    resumen['asesoria_pre_prueba']['si'],
                    resumen['asesoria_post_prueba']['si'],
                    resumen['asesoria_pre_embarazo']['si'],
                    resumen['asesoria_post_embarazo']['si'],
                    resumen['anticonceptivos']['si'],
                    resumen['charla_contagio']['si'],
                    resumen['charla_prevencion']['si'],
                    resumen['grupo_lucha_vih']['si'],
                    resumen['charla_autocuidado']['si'],
                    resumen['charla_alimentacion']['si'],
                    resumen['charla_sexualidad']['si'],
                    resumen['evaluacion_psicologica']['si'],
                    resumen['evaluacion_nutricionista']['si'],
                    resumen['lactancia_materna']['si'],
                  ],
                  backgroundColor: "#EC5148",
                  hoverBackgroundColor: "#EC5148",
              },
              {
                  label: 'No',
                  data: [
                    resumen['asesoria_pre_prueba']['no'],
                    resumen['asesoria_post_prueba']['no'],
                    resumen['asesoria_pre_embarazo']['no'],
                    resumen['asesoria_post_embarazo']['no'],
                    resumen['anticonceptivos']['no'],
                    resumen['charla_contagio']['no'],
                    resumen['charla_prevencion']['no'],
                    resumen['grupo_lucha_vih']['no'],
                    resumen['charla_autocuidado']['no'],
                    resumen['charla_alimentacion']['no'],
                    resumen['charla_sexualidad']['no'],
                    resumen['evaluacion_psicologica']['no'],
                    resumen['evaluacion_nutricionista']['no'],
                    resumen['lactancia_materna']['no'],
                  ],
                  backgroundColor: "#36b1eb",
                  hoverBackgroundColor: "#36b1eb",
              },
              {
                  label: 'No Aplica',
                  data: [
                    0,
                    0,
                    resumen['asesoria_pre_embarazo']['no_aplica'],
                    resumen['asesoria_post_embarazo']['no_aplica'],
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    resumen['lactancia_materna']['no_aplica'],
                  ],
                  backgroundColor: "#AEC6CF",
                  hoverBackgroundColor: "#AEC6CF",
              }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Reporte de normas'
            },
            layout: {
                padding: {
                    left: 60,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });
</script>