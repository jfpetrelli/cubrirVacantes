<?php require_once("generic/header.php");  
if (!ISSET($_SESSION['user_id'])){

  return header('Location:../views/index.php');

}

if($_SESSION['admin'] == 0){
    return header('Location:../views/userlogin.php');
  }

?>

<div class="row my-3 text-center">
  <div class="container">
    <div class="row form-group has-danger justify-content-center">
      <div class="col-6">
        <input type="text" value="Error al enviar mail, consulte con el Administrador." class="form-control is-invalid" disabled>
      </div>    
    </div>
    <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="userlogin.php"><input title="Volver" type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
    </div>
  </div>
</div>


<?php require_once("generic/footer.php");  ?>
