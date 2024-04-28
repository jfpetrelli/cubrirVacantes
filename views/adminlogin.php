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

if($_SESSION['admin'] == 2){
  header('Location:../views/profelogin.php');
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
$resp2 = $vacants->expirationVacants(); // Muestra las inscripciones finalizadas en el select para cargar los meritos

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
          <a href="#profile" class="nav-link <?php if($selected == ''){ ?> active <?php }?>" data-bs-toggle="tab">Perfil</a>
        </li>
        <li class="nav-item">
          <a href="#finalizadas" class="nav-link" data-bs-toggle="tab">Inscripciones finalizadas</a>
        </li>
        <li class="nav-item">
          <a href="#cargarv" class="nav-link" data-bs-toggle="tab">Cargar vacante</a>
        </li>
 <!--        <li class="nav-item">
          <a href="#users" class="nav-link" data-bs-toggle="tab">Usuarios registrados</a>
        </li>
-->
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade <?php if($selected == ''){ ?> show active <?php }?>" id="profile">
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
                    <input type="email" class="form-control" id="email" name = "email" value = "<?= $email ?>">
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
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary" title="Cargar mail" name="uploadMail" value = "ok">Cargar Correo</button>
                </div>
              </div>
          </form>
        </div>
        <div class="tab-pane fade" id="finalizadas">
        <form action="../controllers/c_vacants.php" method = "POST">
          <table class="table align-middle">
            <thead>
              <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Cierre </th>
                <th scope="col">Carrera</th>
                <th scope="col">Vacante</th>
                <th scope="col">CVs recibidos</th>
              </tr>
            </thead>
            <tbody>
            <?php
                    while($row = mysqli_fetch_array($resp)){
                      ?>
                      <tr class="table-secondary">
                      <th scope="row"><?= $row['id']; ?>
                        <th scope="row"><?= $row['from_date']; ?>
                        <th scope="row"><?= $row['to_date']; ?>
                        <th scope="row"><?= $row['career']; ?>
                        <th scope="row"><?= $row['place']; ?>
                        <td>
                          <a class= "text-align-end d-block" href="../controllers/c_downloadCV.php?vacant=<?= $row['id']; ?>"><small>Descargar</small></a>
                          <a class= "text-align-end d-block" href="../controllers/c_enviar_correo.php?vacant=<?= $row['id']; ?>"><small>Enviar por correo</small></a>
                        </td>
                      </tr>
                      <?php

                    }

            ?>
            </tbody>
          </table>
          <div class="col-12">
                  <button type="submit" class="btn btn-primary" title="Cargar méritos" name="uploadMeritos" value = "ok">Cargar Méritos</button>
                </div>
          </form>
        </div>
        <div class="tab-pane fade" id="cargarv">
          <form method="POST" action="../controllers/c_vacants.php">
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="puesto" class="col-form-label">Puesto</label>
                    <input type="text" class="form-control" id="puesto" name="place" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="carrera" class="col-form-label">Carrera</label>
                    <select class="form-select" id="carrera" name="career" required>
                        <option default>Ingeniería de Sistemas</option>
                        <option>Ingeniería Química</option>
                        <option>Ingeniería Eléctrica</option>
                        <option>Ingeniería Mecánica</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="f_ini" class="col-form-label">Fecha inicio inscripción</label>
                    <input type="date" class="form-control" id="f_ini" value = "<?php echo date('Y-m-d'); ?>" name="from_date" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group text-start">
                    <label for="f_fin" class="col-form-label">Fecha fin inscripción</label>
                    <input type="date" class="form-control" id="f_ini" value = "<?php echo date('Y-m-d'); ?>" name="to_date" required>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center m-2">
                <div class="col-12">
                  <div class="form-group  text-start">
                    <label for="descrip" class="form-label mt-4">Descripción</label>
                    <textarea class="form-control" id="descrip" rows="3" name="detail"></textarea>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end m-3">
                <div class="col-12">
                  <button title="Cargar vacante" type="submit" class="btn btn-primary" name="register" value = "ok">Cargar Vacante</button>
                </div>
              </div>
          </form>
        </div>

        <div class="tab-pane fade" id="users">    
                <div class="row justify-content-start my-3">
                  <div class="col-12">
                    <table class="table align-middle">
                      <thead>
                        <tr class="table-primary">
                        <th scope="col">Usuario</th>
                        <th scope="col">Apellido</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Documento</th>
                          <th scope="col">Fecha Nacimiento</th>
                          <th scope="col">Provincia</th>
                          <th scope="col">Ciudad</th>
                          <th scope="col">Domicilio</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                    while($row = mysqli_fetch_array($resp4)){
                      ?>
                      <tr class="table-secondary">
                      <th scope="row"><?= $row['user_id']; ?>
                      <th scope="row"><?= $row['surname']; ?>
                      <th scope="row"><?= $row['name']; ?>
                      <th scope="row"><?= $row['document']; ?>
                      <th scope="row"><?= $row['date']; ?>
                      <th scope="row"><?= $row['state']; ?>
                      <th scope="row"><?= $row['city']; ?>
                      <th scope="row"><?= $row['address']; ?>
                      </tr>
                      <?php
                    }
            ?>
                      </tbody>
                    </table>
                  </div>    
                </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once("generic/footer.php");  ?>
