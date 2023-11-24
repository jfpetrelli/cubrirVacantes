<?php 
session_start();
ob_start();
$existe = false;
if (isset($_SESSION['user_id'])){

  if (!($_SESSION['user_id'] == null || $_SESSION['user_id'] == '')) {
    $existe = true;
  }


}
if(isset($_SESSION['tiempo']) ) {

  //Tiempo en segundos para dar vida a la sesión.
  $inactivo = 300;//5min en este caso.

  //Calculamos tiempo de vida inactivo.
  $vida_session = time() - $_SESSION['tiempo'];

      //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
      if($vida_session > $inactivo)
      {
          //Removemos sesión.
          session_unset();
          //Destruimos sesión.
          session_destroy();              
          //Redirigimos pagina.
          header('Location:../views/index.php');
          exit();
      } else {  // si no ha caducado la sesion, actualizamos
          $_SESSION['tiempo'] = time();
      }


} else {
  //Activamos sesion tiempo.
  $_SESSION['tiempo'] = time();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="./img/utn.ico" sizes="(min-width: 1420px) 1420px, 100vw"/>
    
    <title>Cubrir Vacantes</title>
    
</head>
<body class="pt-5 mt-5 mb-5 pb-3">
<header class="fixed-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" title="Pag. Principal">Cubrir Vacantes</a>
    <div class="d-flex justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="information.php">Postulaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="meritos.php">Meritos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="help.php">Ayuda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contacto</a>
        </li>
        <li class="nav-item dropdown">
        <?php 
         if($existe){
          ?>
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><svg alt="Person" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill mb-1" viewBox="0 0 16 16">
          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg>
          <?php 
         echo $_SESSION['user_id'];
          ?></a>
          <div class="dropdown-menu  navbar-dark bg-primary" style = "right:1%; left:auto;">
          <a class="nav-link" href="../controllers/c_userSession.php">Mi perfil</a>  
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="../controllers/c_userSession.php?signoff=1">Cerrar Session</a>
          </div>
          
          <?php 
         }else{
          ?>
          <a class="nav-link" href="" data-bs-toggle = "modal" data-bs-target = "#signinModal">Iniciar Sesion</a>
          <?php 
         }

        ?>
     
        </li>
    </ul>
    </div>
  </div>
</nav>


</header>


<?php require_once("signin.php"); ?>
