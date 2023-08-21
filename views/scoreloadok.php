<?php require_once("generic/header.php");  
if (!ISSET($_SESSION['user_id'])){

  return header('Location:../views/index.php');

}

if($_SESSION['admin'] == 0){
    return header('Location:../views/userlogin.php');
  }

?>

<div class="row my-3 text-center">
    <h1>Puntajes</h1>
  <div class="container">
    <div class="row form-group has-success justify-content-center">
      <div class="col-6">
        <input type="text" value="Puntajes cargados" class="form-control is-valid" disabled>
      </div>
    </div>
    <div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="adminlogin.php"><input title="Volver" type="button" class="btn btn-primary" value = "Volver"></a>
      </div>    
    </div>
  </div>
</div>


<?php require_once("generic/footer.php");  ?>
