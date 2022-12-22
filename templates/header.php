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
    <div class="d-flex justify-content-end" id="navbarColor01">
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
          <a class="nav-link" href="#" data-bs-toggle = "modal" data-bs-target = "#exampleModal">Iniciar Sesion</a>
        </li>
    </ul>
    </div>
  </div>
</nav>


</header>


<body class="pt-5 mt-5 mb-5 pb-3">
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>