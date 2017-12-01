<?= $this->load->view('header_view', array('titulo' => 'Reporte de paciente' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Reporte de paciente</h1>
    <?php
        echo validation_errors();
        echo form_open('Reportes/Reporte_pacientes/index', array('class' => 'ui form', 'method' => 'get'));

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

    <?php 
        echo form_submit('','Generar', $button);
        echo form_close();
    ?>
  </div>

  <?php if ($paciente && $paciente_estado && $expediente): ?>
    <table class="ui single line celled table">
        <tbody>
            <tr>
                <td colspan="4">Paciente:</td>
            </tr>
            <tr>
                <td>Nombre completo:</td>
                <td><?= $expediente->nombre_completo ?></td>
                <td>Número unico de identidad:</td>
                <td><?= $expediente->dui ?></td>
            </tr>
                <td>Sexo:</td>
                <td><?= $expediente->sexo ?></td>
                <td>Edad:</td>
                <td><?= $expediente->edad ?></td>
            <tr>
                <td>Estado civil:</td>
                <td><?= $expediente->estado_civil ?></td>
                <td>Dirección:</td>
                <td><?= $expediente->direccion ?></td>
            </tr>
            <tr>
                <td>Número de expediente:</td>
                <td><?= $paciente->getNumero() ?></td>
                <td>Fecha de apertura:</td>
                <td><?= $expediente->fecha_apertura ?></td>
            </tr>
            <tr>
                <td>Peso:</td>
                <td><?= $paciente_estado->getPeso()?></td>
                <td>Ingresos 12 meses:</td>
                <td><?= $paciente_estado->getIngresos()?></td>
            </tr>
            <tr>
                <td>Estado:</td>
                <td><?= $paciente_estado->getEstado()?></td>
                <td>Clasificación OMS:</td>
                <td><?= $paciente_estado->getClasificacion()?></td>
            </tr>
            <tr>
                <td>Criterio ARV:</td>
                <td><?= $paciente_estado->getCriterioArv()?></td>
                <td>Criterio Cambio ARV:</td>
                <td><?= $paciente_estado->getCriterioCambioArv()?></td>
            </tr>
            <tr>
                <td>Tipo de paciente:</td>
                <td><?= $paciente_estado->getTipo()?></td>
                <td>Criterio Egreso ARV:</td>
                <td><?= $paciente_estado->getEgreso()?></td>
            </tr>
            <tr>
                <td>Servicio:</td>
                <td><?= $paciente_estado->getServicio()?></td>
                <td>Médico:</td>
                <td><?= $paciente_estado->getMedico()?></td>
            </tr>
            <tr>
                <td colspan="4">Vía Transmisión:</td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td colspan="3" ><?= $paciente->getVia()->getNombre()?></td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td colspan="3" ><?= $paciente->getVia()->getDescripcion()?></td>
            </tr>
            <tr>
                <td colspan="4">Enfermedad:</td>
            </tr>
            <?php foreach ($paciente->getEnfermedades() as $enfermdad): ?>
                <tr>
                    <td>Nombre:</td>
                    <td colspan="3" ><?= $enfermdad->getNombre()?></td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td colspan="3" ><?= $enfermdad->getDescripcion()?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="4">Clinica:</td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td colspan="3" ><?= $paciente->getClinica()->getNombre()?></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td colspan="3" ><?= $paciente->getClinica()->getDireccion()?></td>
            </tr>
        </tbody>
    </table>
  <?php endif ?>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>