<?php require_once("generic/header.php");  
if (!ISSET($_SESSION['user_id'])){

  return header('Location:../views/index.php');

}

if($_SESSION['admin'] == 1){
    return header('Location:../views/adminlogin.php');
  }

?>

<div class="row my-3 text-center">
  <h1>Envío de Correo</h1>
  <div class="container">
  <div class="row form-group has-danger justify-content-center">
      <div class="col-4">
        <input type="text" value="Error al enviar mail, consulte con el Administrador." class="form-control is-invalid" disabled>
      </div>    
    </div>
  </div>
  <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="userlogin.php"><input type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
  </div>
</div>


<?php require_once("generic/footer.php");  ?>
