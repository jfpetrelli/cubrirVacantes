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
    <div class="row form-group has-success justify-content-center">
        <div class="col-6">
        <input title="Vacante cargada" type="text" value="Vacante cargada" class="form-control is-valid" disabled>
        <br>
        <a href="adminlogin.php">Volver</a>
        </div>
    </div>
</div>
  </div>


<?php require_once("generic/footer.php");  ?>
