<?php require_once("generic/header.php");  
if (!isset($_SESSION['user_id'])){

  header('Location:../views/index.php');
  exit();

}

if($_SESSION['admin'] == 0){
    header('Location:../views/userlogin.php');
    exit();
  }

?>

<div class="row my-3 text-center">
    <div class="container">
    <div class="row form-group has-success justify-content-center">
        <div class="col-6">
        <input title="Meritos cargados" type="text" value="Meritos Cargados" class="form-control is-valid" disabled>
        <br>
        <a href="adminlogin.php">Volver</a>
        </div>
    </div>
</div>
  </div>


<?php require_once("generic/footer.php");  ?>
