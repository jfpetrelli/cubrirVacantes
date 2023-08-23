<?php require_once("generic/header.php"); 
require_once("../controllers/c_users.php");
require_once("../models/m_users.php");
require_once("../models/m_vacants.php");


if (!isset($_SESSION['user_id'])){

  header('Location:../views/index.php');
  exit();

}

$users = new Users();
$resp = $users->all($_SESSION['user_id']);

if($_SESSION['admin'] == 1){
  header('Location:../views/adminlogin.php');
  exit();
  
}



$email = '';
$name = '';
$surname = '';
$appart = '';
$floor = '';
$address = '';
$document_type = '';
$document_number = '';
$date_of_birth = '';
$city = '';
$state = '';

while($row = mysqli_fetch_array($resp)){
  $email = $row['email'];
  $name = $row['name'];
  $surname = $row['surname'];
  $appart = $row['appart'];
  $floor = $row['floor'];
  $address = $row['address'];
  $document_type = $row['document_type'];
  $document_number = $row['document_number'];
  $date_of_birth = $row['date_of_birth'];
  $city = $row['city'];
  $state = $row['state'];

}

$vacants = new Vacants();
$resp = $vacants->allVacants();

?>


<div class="container">
  <div class="row my-3 justify-content-center text-center">
    <div class="col-12 border bg-light m-2">
      <ul class="nav nav-tabs my-2" id="myTab">
        <li class="nav-item">
          <a href="#profile" class="nav-link active" data-bs-toggle="tab">Perfil</a>
        </li>
        <li class="nav-item">
          <a href="#postulaciones" class="nav-link" data-bs-toggle="tab">Mis Postulaciones</a>
        </li>
        <li class="nav-item">
          <a href="#cv" class="nav-link" data-bs-toggle="tab">Vacantes</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="profile">
        <form action="#">
            
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="user" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" disabled value = "<?= $_SESSION['user_id'] ?>">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" class="form-control" id="email" disabled value = "<?= $email ?>">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="name" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" disabled value = "<?= $name ?>">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="surname" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" id="surname" disabled value = "<?= $surname ?>">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-5">
                      <label for="tipo" class="col-form-label">Tipo</label>
                      <input type="text" class="form-control" id="tipo" disabled value = "<?= $document_type ?>">
                    </div>
                    <div class="form-group text-start col-7">
                      <label for="dni" class="col-form-label">Numero</label>
                      <input type="text" class="form-control" id="dni" disabled value = "<?= $document_number ?>">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="birth" class="col-form-label">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="birth" disabled value = "<?= $date_of_birth ?>">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-5">
                      <label for="tipo" class="col-form-label">Provincia</label>
                      <input  type= "text" class="form-control" id="tipo" disabled value = "<?= $state ?>">
                    </div>
                    <div class="form-group text-start col-7">
                      <label for="localidad" class="col-form-label">Localidad</label>
                      <input type="text" class="form-control" id="localidad" disabled value = "<?= $city ?>">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row justify-content-between">
                    <div class="form-group text-start col-8">
                      <label for="address" class="col-form-label">Direccion</label>
                      <input type="text" class="form-control" id="address" disabled value = "<?= $address ?>">
                    </div>
                    <div class="form-group text-start col-2">
                      <label for="floor" class="col-form-label">Piso</label>
                      <input type="text" class="form-control" id="floor" disabled value = "<?= $floor ?>">
                    </div>
                    <div class="form-group text-start col-2">
                      <label for="appart" class="col-form-label">Dpto.</label>
                      <input type="text" class="form-control" id="appart" disabled value = "<?= $appart ?>">
                    </div>
                  </div>
                </div>
              </div>
            
          </form>
        </div>
        <div class="tab-pane fade" id="postulaciones">
          <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">Fecha Inscripcion</th>
                <th scope="col">Fecha Cierre </th>
                <th scope="col">Vacante</th>
              </tr>
            </thead>
            <tbody>
            <?php
                    include("../models/m_users_vacants.php");
                    $userVacants = new UsersVacants();
                    $resp2 = $userVacants->inscriptions($_SESSION['user_id']);
                    while($row = mysqli_fetch_array($resp2)){
                      ?><tr class="table-secondary">
                      <th scope="row"><?= $row['from_date'] ?></th>
                      <td><?= $row['to_date'] ?></td>
                      <td><?= $row['place'] ?></td>
                    </tr>
                    <?php
                    }

                    ?>

            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="cv">   
          <form class=" border bg-light" action="../controllers/c_users_vacants.php" method = "POST" enctype="multipart/form-data">
            
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start"> 
                    <label for="postulaciones" class="col-form-label">Vacantes</label>

                    <select class="form-select" id="vacant" name = "vacant" required>
                    <?php
                    while($row = mysqli_fetch_array($resp)){
                      ?><option value = "<?= $row['id'] ?>"><?=$row['place']?></option> <?php
                    }

                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start"> 
                    <label for="cv" class="col-form-label">Cargar CV</label>
                    <input type="file" class="form-control" id="cv" name = "cvFile" required>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button title="Postularme" type="submit" class="btn btn-primary" name="postulate" value = "ok">Postularme</button>
                </div>
              </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("generic/footer.php");  ?>
