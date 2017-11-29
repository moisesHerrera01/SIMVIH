<?= $this->load->view('header_view', array('titulo' => 'Gestión de usuarios' ), TRUE) ?>

<section>
  <div class="ui text container segment">
    <h1>Gesión de usuarios de SIMVIH</h1>
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

<?= $this->load->view('footer_view', '', TRUE) ?>
