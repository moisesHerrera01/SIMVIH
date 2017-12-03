<?= $this->load->view('header_view', array('titulo' => 'Gestión de usuarios' ), TRUE) ?>
<br>
<div class="ui grid">
  <div class="ui five wide column"></div>
  <div class="ui eight wide column">
    <div class="ui hidden message" id="mensajeSuccess">
      <i class="close icon"></i>
      <div class="header ">
        El usuario se creo exitosamente
      </div>
      <p></p>
    </div>
  </div>
</div>
<br>

<section>
  <div class="ui text container segment">
    <h1 class"ui header">Gestión de usuarios de SIMVIH</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Gestionar_usuarios/create', array('class' => 'ui form'));?>
      <div class="field">
        <input type="text" name="ename" value="" placeholder="Nombre de empleado">
      </div>
      <div class="field">
        <input type="text" name="uname" value="" placeholder="Nombre de usuario">
      </div>
      <div class="field">
        <input type="password" name="pw" value="" placeholder="Contraseña">
      </div>
      <div class="field">
        <input type="password" name="repw" value="" placeholder="Contraseña de nuevo">
      </div>
      <div class="field">
        <select class="ui fluid dropdown" name="activo">
          <option value="default" selected>Seleccione activo</option>
          <option value="si">Si</option>
          <option value="no">No</option>
        </select>
      </div>
      <div class="field">
        <select class="ui fluid dropdown" name="rol">
          <option value="default" selected>Seleccione rol</option>
          <option value="4">Administrador</option>
          <option value="5">Promotor</option>
          <option value="6">Supervisor</option>
        </select>
      </div>

      <input type="submit" name="commit" value="Create User" class="ui primary button">
    <?php echo form_close();?>
  </div>

</section>
<script>

  $(document).ready(function () {
    //alert("<?= $this->uri->segment(3)?>");
    if ("<?= $this->uri->segment(3)?>" == "success"){
      $("#mensajeSuccess").removeClass("hidden");
      $("#mensajeSuccess").addClass("green");
    }else{

    }
  });
</script>
<?= $this->load->view('footer_view', '', TRUE) ?>
