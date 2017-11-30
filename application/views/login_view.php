<?= $this->load->view('header_view', array('titulo' => 'Login' ), TRUE) ?>

<div class="login-header"></div>

<div class="login-content">
  <div class="ui center aligned container" style="width:25em">
    <h1 class="header-sistem">SIMVIH</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('Login/trigger', array('class' => 'ui form'));?>
      <div class="field">
        <input type="text" name="uname" value="" placeholder="Nombre de usuario">
      </div>
      <div class="field">
        <input type="password" name="pw" value="" placeholder="Contraseña">
      </div>
      <div class="field">
        <input type="submit" class="ui fluid primary button" name="commit" value="Login">
      </div>
    <?php echo form_close();?>
  </div>

  <div class="login-footer">
    <p>Creado por SHLDevelop</p>
  </div>

</div>

</html>