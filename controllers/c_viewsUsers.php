<?php

require('models/db.php');

$con = new Conection();

$users = $con->getUsers();

require('index.php');
?>