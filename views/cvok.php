<?php require_once("generic/header.php");  
if (!isset($_SESSION['user_id'])){

  header('Location:../views/index.php');
  exit();

}

if($_SESSION['admin'] == 1){
    header('Location:../views/adminlogin.php');
    exit();
  }

?>

<div class="row my-3 text-center">
    <h1>Postulación</h1>
    <div class="container">
    <div class="row form-group has-success justify-content-center">
        <div class="col-6">
        <input type="text" value="Postulación exitosa" class="form-control is-valid" disabled>
        </div>
    </div>
</div>
<div class="row form-group has-danger justify-content-center">
      <div class="col-1 m-2">
        <a href="userlogin.php"><input title="Volver" type="button" class="btn btn-primary" value = "Volver"></a>
      </div>   
  </div>



<?php require_once("generic/footer.php");  ?>
