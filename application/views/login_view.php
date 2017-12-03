<?= $this->load->view('header_view', array('titulo' => 'Login' ), TRUE) ?>
<?php $error = $this->uri->segment(3)?>
  
<script src="<?= base_url('assets/javascripts/main.js') ?>"></script>
<script src='<?= base_url('assets/javascripts/jquery-1.11.3.min.js') ?>'></script>
<script src='<?= base_url('assets/semantic/dist/semantic.js') ?>'></script>

<div class="login-header"></div>

<div class="ui hidden message" id="mensajeError">
  <i class="close icon"></i>
  <div class="header">
    El usuario o la contraseña es incorrecta
  </div>
  <p>Por favor, intente de nuevo</p>
</div>

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


<script>

  $(document).ready(function () {
    //alert("<?= $this->uri->segment(3)?>");
    if ("<?= $this->uri->segment(3)?>" == "error"){
      $("#mensajeError").removeClass("hidden");
      $("#mensajeError").addClass("red");
    }else{

    }
  });


</script>
</div>

</html>