<?= $this->load->view('header_view', array('titulo' => 'Gestión de cumplimiento' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Gestión de cumplimiento</h1>
    <?php
        echo validation_errors();
        echo form_open('Gestionar_cumplimiento/create', array('class' => 'ui form'));

        $atriLabel = array('class' => 'col-lg-2 control-label');
        $button = array('class' => 'ui primary button');
    ?>

    <div class='field'>
        <?= form_label('Paciente:', 'numero', $atriLabel) ?>
        <div>
            <select name="paciente" id="paciente" class="ui fluid dropdown">
                <option value="default">Seleccione al paciente</option>
                <?php foreach ($pacientes as $paciente) : ?>
                    <option value="<?= $paciente->getId() ?>"><?= $paciente->getId() ?> - Expediente: <?= $paciente->getNumero() ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>


    <h4 class="ui dividing header">Cumplimientos:</h4>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Se le impartio una asesoria pre prueba de VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_pre_prueba" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_pre_prueba" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Se le impartio una asesoria post prueba de VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_post_prueba" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_post_prueba" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Se le impartio una asesoria pre embarazo?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_pre_embarazo" tabindex="0" value="Si" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_pre_embarazo" value="No" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_pre_embarazo" checked="" value="No aplica" tabindex="0" class="hidden">
                        <label>No aplica</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Se le impartio una asesoria post embarazo?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_post_embarazo" tabindex="0" value="Si" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_post_embarazo" value="No" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="asesoria_post_embarazo" checked="" value="No aplica" tabindex="0" class="hidden">
                        <label>No aplica</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Usa algún tipo de metodo de barrera?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="anticonceptivos" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="anticonceptivos" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Se le impartio una charla de contagio de VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_contagio" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_contagio" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Se le impartio una charla de prevención del VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_prevencion" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_prevencion" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Pertenece a algún grupo de lucha del VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="grupo_lucha_vih" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="grupo_lucha_vih" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Recibio alguna charla de autocuidado del VIH?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_autocuidado" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_autocuidado" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Recibio alguna charla de alimentación?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_alimentacion" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_alimentacion" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Recibio alguna charla de educación sexual?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_sexualidad" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="charla_sexualidad" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Se ha realizado alguna evaluación psicologíca?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="evaluacion_psicologica" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="evaluacion_psicologica" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <div class="two fields">
            <div class='field'>
                <label>¿Se ha realizado alguna evaluación nutricionista?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="evaluacion_nutricionista" value="true" tabindex="0" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="evaluacion_nutricionista" value="false" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>

            <div class='field'>
                <label>¿Se ha dado lactancia materna antes de realizarce la prueba?</label>
                <div class="inline fields">
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="lactancia_materna" tabindex="0" value="Si" class="hidden">
                        <label>Si</label>
                    </div>
                    </div>
                    <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="lactancia_materna" value="No" checked="" tabindex="0" class="hidden">
                        <label>No</label>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='field'>
        <label>Fecha de la prueba:</label>
        <div>
            <input type="date" name="fecha_prueba" id="fecha_prueba" >
        </div>
    </div>

    <div class='field'>
        <label>Fecha de inicio de las charlas:</label>
        <div>
            <input type="date" name="fecha_inicio_charlas" id="fecha_inicio_charlas" >
        </div>
    </div>
        
    <?php
        echo form_submit('','Crear cumplimiento', $button);
        echo form_close();
    ?>
</div>

<?php
    $template = array(
        'table_open' => '<table class="ui single line celled table">'
    );
    $this->table->set_template($template);
    
    $this->table->set_heading('N° cumplimiento', 'Paciente', 'Asesoria pre prueba', 'Asesoria post prueba', 'Asesoria pre embarazo', 
                    'Asesoria post embarazo', 'Anticonceptivo', 'Charla de contagio', 'Charla de prevención', 'Grupo de lucha',
                    'Charla de autocuidado', 'Charla de alimentación', 'Charla de educación sexual', 'Evaluación psicologíca', 'Evaluación nutricionista',
                    'Lactancia materna', 'Fecha de prueba', 'Fecha de inicio charlas');
    
    foreach ($cumplimientos as $cumplimiento) {
        $this->table->add_row(
            $cumplimiento->getId(),
            $cumplimiento->getPaciente()->getId(),
            $cumplimiento->getAsesoriaPrePrueba(),
            $cumplimiento->getAsesoriaPostPrueba(),
            $cumplimiento->getAsesoriaPreEmbarazo(),
            $cumplimiento->getAsesoriaPostEmbarazo(),
            $cumplimiento->getAnticonceptivos(),
            $cumplimiento->getCharlaContagio(),
            $cumplimiento->getCharlaPrevencion(),
            $cumplimiento->getGrupoLuchaVih(),
            $cumplimiento->getCharlaAutocuidado(),
            $cumplimiento->getCharlaAlimentacion(),
            $cumplimiento->getCharlaSexualidad(),
            $cumplimiento->getEvaluacionPsicologica(),
            $cumplimiento->getEvaluacionNutricionista(),
            $cumplimiento->getLactanciaMaterna(),
            $cumplimiento->getFechaPrueba(),
            $cumplimiento->getFechaInicioCharlas()
        );
    }
    echo '<div style="overflow:scroll;overflow-y:hidden;width:100%;">';
        echo $this->table->generate();
    echo "</div>";
?>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>
