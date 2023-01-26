<?php

    session_start();

    if(!empty($_GET['signoff'])){
        if($_GET['signoff'] == 1){
            session_start();
            session_destroy();
            return header('Location:../views/index.php');
        }
    }

  if($_SESSION['admin'] == '1'){
    return header('Location:../views/adminlogin.php');
  }
  if($_SESSION['admin'] == '0'){
    return header('Location:../views/userlogin.php');
  }
    


?>
