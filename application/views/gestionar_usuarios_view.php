<?php include_once("header_view.php");?>

<div class="form_style">
  <h1>Gesión de usuarios de SIMVIH</h1>
  <?php echo validation_errors(); ?>
  <?php echo form_open('Gestionar_usuarios/create');?>
    <p><input type="text" name="ename" value="" placeholder="Nombre de empleado"></p>
    <p><input type="text" name="uname" value="" placeholder="Nombre de usuario"></p>
    <p><input type="password" name="pw" value="" placeholder="Contraseña"></p>
    <p><input type="password" name="repw" value="" placeholder="Contraseña de nuevo"></p>
    <p><select name="activo">
      <option value="si">Si</option>
      <option value="no" selected>No</option>
    </select></p>
    <p><select name="rol">
      <option value="4">Administrador</option>
      <option value="5" selected>Promotor</option>
      <option value="6" selected>Supervisor</option>
    </select></p>

    <p class="submit"><input type="submit" name="commit" value="Create User"></p>
  <?php echo form_close();?>
</div>

<?php include_once("footer_view.php");?>
