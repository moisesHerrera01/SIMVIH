<?= $this->load->view('header_view', array('titulo' => 'Dashboard' ), TRUE) ?>

<section>

<div class="ui top attached tabular menu">
  <h3 class="ui header item">Dashboard</h3>
</div>
<br>
<div class="ui centered cards">

    <div class="card">
        <div class="content">
            <div class="header">Clinicas</div>
            <div class="description">
                <div class="ui statistic">
                    <div class="value">
                        250
                    </div>
                    <div class="label">
                        Establecimientos
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="content">
            <div class="header">Existencias</div>
            <div class="description">
                <div class="ui statistic">
                    <div class="value">
                        1,360
                    </div>
                    <div class="label">
                        Medicamentos
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="content">
            <div class="header">Pacientes</div>
            <div class="description">
                <div class="ui statistic">
                    <div class="value">
                        5,550
                    </div>
                    <div class="label">
                        Personas
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</section>

<?= $this->load->view('footer_view', '', TRUE) ?>