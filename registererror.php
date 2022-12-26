<?php include("templates/header.php"); ?>

<div class="row my-3 text-center">
  <h1>Registrarse</h1>
  <div class="container">
  <div class="row form-group has-danger justify-content-center">
      <div class="col-4">
        <input type="text" value="Error al registrarse, reintentelo nuevamente" class="form-control is-invalid" disabled>
      </div>    
    </div>
  </div>
  <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="signup.php"><input type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
  </div>
</div>


<?php include("templates/footer.php"); ?>
