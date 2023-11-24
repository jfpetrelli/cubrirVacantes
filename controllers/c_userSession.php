<?php

    session_start();

    if(!empty($_GET['signoff'])){
        if($_GET['signoff'] == 1){
            session_start();
            session_destroy();
            header('Location:../views/index.php');
            exit();
        }
    }

  if($_SESSION['admin'] == 1){
    header('Location:../views/adminlogin.php');
    exit();
  }
  if($_SESSION['admin'] == 0){
    header('Location:../views/userlogin.php');
    exit();
  }

  if($_SESSION['admin'] == 2){
    header('Location:../views/profelogin.php');
    exit();
  }

?>
