<?php require_once("generic/header.php");  
if (!ISSET($_SESSION['user_id'])){

  return header('Location:../views/index.php');

}

if($_SESSION['admin'] == 0){
    return header('Location:../views/userlogin.php');
  }

?>

<div class="row my-3 text-center">
  <h1>Postulación</h1>
  <div class="container">
  <div class="row form-group has-danger justify-content-center">
      <div class="col-4">
        <input type="text" value="Error al cargas el puntaje." class="form-control is-invalid" disabled>
      </div>    
    </div>
  </div>
  <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="adminlogin.php"><input type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
  </div>
</div>


<?php require_once("generic/footer.php");  ?>
