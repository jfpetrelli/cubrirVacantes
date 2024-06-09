<?php require_once("generic/header.php"); 
require_once("../controllers/c_users.php");
require_once("../models/m_users.php");
require_once("../models/m_vacants.php");
require_once("../models/m_users_vacants.php");

if (!isset($_SESSION['user_id'])){

  header('Location:../views/index.php');
  exit();


}

//Creo una instancia de la clase Users y traigo los datos del usuario (sea admin o no)

$users = new Users();
$resp = $users->all($_SESSION['user_id']);

//Si el usuario no es administrador lo envio a su sesion.
if($_SESSION['admin'] == 0){
  header('Location:../views/userlogin.php');
  exit();
}

if($_SESSION['admin'] == 1){
  header('Location:../views/adminlogin.php');
  exit();
}


//Guardo los datos del perfil del usuario para rellenar
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

//Creo instancia de la clase Vacants
$vacants = new Vacants();
$resp = $vacants->expirationVacants();  // Muestra las inscripciones finalizadas que ya pueden descargarse
$resp2 = $vacants->expirationVacantsProfe(); // Muestra las inscripciones finalizadas en el select para cargar los meritos

$resp4 = $users->allUsers(); // Muestra todos los usuarios

//Muestro los usuarios postulados para cargar los puntajes
$selected = '';

if(!empty($_GET['search'])){
  if(empty($_GET['vacant'])){
    header('Location:../views/searchvacanterror.php');
    exit();
  }
  $userVacants = new UsersVacants();
  $resp3 = $userVacants->getScore($_GET['vacant']); // Traigo los usuarios postulados en una vacante
  $selected = $_GET['vacant']; // variable para guardar la vacante seleccionada

}else{
  $selected = '';
  
}



?>

<div class="container">
  <div class="row my-3 justify-content-center text-center">
    <div class="col-12 border bg-light m-2">
      <ul class="nav nav-tabs my-2" id="myTab">
        <li class="nav-item">
          <a href="#puntajes" class="nav-link active" data-bs-toggle="tab">Cargar puntajes</a>
        </li>
        <li class="nav-item">
          <a href="#profile" class="nav-link" data-bs-toggle="tab">Editar Perfil</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade" id="profile">
          <form action="../controllers/c_users.php" method = "POST">
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
                    <input type="email" class="form-control" id="email" disabled name = "email" value = "<?= $email ?>">
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

        <div class="tab-pane fade  show active " id="puntajes">
          <form class=""   method = "GET">
              <div class="row justify-content-start m-2">
                <div class="col-6">
                  <div class="form-group text-start"> 
                    <label for="postulaciones" class="col-form-label">Vacante</label>
                    <select class="form-select" name="vacant">
                    <?php
                    while($row = mysqli_fetch_array($resp2)){
                      ?><option value = "<?= $row['id'] ?>"
                      <?php if($selected == $row['id']){
                                  ?> selected <?php } 
                            ?>>
                      <?=$row['place']?></option> <?php
                    }

                    ?>
                    </select>
                  </div>
                </div>
                <div class="col-1 align-self-end">
                  <button type="submit" class="btn btn-primary" title="Buscar" name="search" value = "ok">Buscar</button>
                </div>
              </div>
          </form>
          <form class="" action="../controllers/c_users_vacants.php" method = "GET">
          <input type="hidden" name="vacant" value="<?=$selected?>">
                <div class="row justify-content-start my-3">
                  <div class="col-12">
                    <table class="table align-middle">
                      <thead>
                        <tr class="table-primary">
                        <th scope="col">Usuario</th>
                          <th scope="col">Fecha postulación</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Puntaje</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      if(!empty($_GET['search'])){
                    while($row = mysqli_fetch_array($resp3)){
                      ?>
                      <tr class="table-secondary">
                      <th scope="row"><input type="hidden" name = "user_id[]" value =<?= $row['user_id']; ?>><?= $row['user_id']; ?>
                      <th scope="row"><?= $row['date']; ?>
                        <th scope="row"><?= $row['surname']; ?>
                        <th scope="row"><?= $row['name']; ?>
                        <td>
                            <div class="row justify-content-center">
                              <div class="col-4">
                                <input class="form-control" type="number" name= "score[]" min="0" value= "<?= $row['score']; ?>">
                              </div>
                            </div>
                          </td>
                      </tr>
                      <?php

                    }
                  }

            ?>
                      </tbody>
                    </table>
                  </div>    
                </div>
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary" title="Cargar" name="upload" value = "ok">Cargar</button>
                </div>
              </div>
          </form>
        </div>
    </div>
  </div>
</div>

<?php require_once("generic/footer.php");  ?>
