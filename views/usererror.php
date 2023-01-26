<?php require_once("generic/header.php");  
include("../controllers/c_users.php")  ?>

<div class="row my-3 text-center">
  <h1>Inicio de Sesion</h1>
  <div class="container">
  <div class="row form-group has-danger justify-content-center">
      <div class="col-4">
        <input type="text" value="Usuario y/o contraseña incorrecta" class="form-control is-invalid" disabled>
      </div>    
    </div>
  </div>
  <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="index.php"><input type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
  </div>
</div>


<?php require_once("generic/footer.php");  ?>
