<?php 

session_start();
$existe = false;
if (ISSET($_SESSION['user_id'])){

  if (!($_SESSION['user_id'] == null || $_SESSION['user_id'] == '')) {
    $existe = true;
  }


}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    

    
</head>
<header class="fixed-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Cubrir Vacantes</a>
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
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/></svg></a>
          <div class="dropdown-menu  navbar-dark bg-primary" style = "right:1%; left:auto;">
          <a class="nav-link" href="../controllers/c_userSession.php">Perfil</a>  
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


<body class="pt-5 mt-5 mb-5 pb-3">


<?php require_once("signin.php"); ?>
