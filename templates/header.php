<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<header class="fixed-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Cubrir Vacantes</a>
    <div class="d-flex justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="information.php">Informacion
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="help.php">Ayuda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle = "modal" data-bs-target = "#signinModal">Iniciar Sesion</a>
        </li>
    </ul>
    </div>
  </div>
</nav>


</header>


<body class="pt-5 mt-5 mb-5 pb-3">


<?php include("templates/signin.php"); ?>
