<?php
session_start();

$resp;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $resp = startSession();

    echo 'POST';
}else{

    $resp = closeSession();
    echo 'GET';
}


return $resp;
?>

<?php
function startSession(){


    if($_POST['usuario'] == null || $_POST['usuario'] == ''){

        return header('Location:../views/index.php');

    }

    $_SESSION['usuario'] = $_POST['usuario'];

    if( $_SESSION['usuario'] == 'jfpetrelli'){
        return header('Location:../views/adminlogin.php');

    }else{

        return header('Location:../views/userlogin.php');
    }
}

function perfilSession(){

    if( $_SESSION['usuario'] == 'jfpetrelli'){
        return header('Location:../views/adminlogin.php');

    }else{

        return header('Location:../views/userlogin.php');
    }

}






function closeSession(){

    if($_GET['usuario'] == 'usuario'){
        session_destroy();
        return header('Location:../views/index.php');
    }



}

?>