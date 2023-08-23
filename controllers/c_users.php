<?php

    require_once('../models/m_users.php');

    //Actualizar mail de admin (para envio de CVS)

    if(!empty($_POST['uploadMail'])){
        session_start();
        if(!empty($_POST['email'])){
            
            try{
                $user = new Users();
                $resp = $user->updateMail($_SESSION['user_id'], $_POST['email']);
                if($resp == 'ok'){
                    header('Location:../views/mailupok.php');
                    exit();
                }else{
                    header('Location:../views/mailuperror.php');
                    exit();
                }
            }catch(Exception $e){
                header('Location:../views/mailuperror.php');
                exit();
            }   

        }
    
    }

    //Registro de nuevo usuario (no admin)

    if(!empty($_POST['register'])){
    
        if(!empty($_POST['user_id']) && !empty($_POST['password']) && !empty($_POST['name']) 
        && !empty($_POST['surname']) && !empty($_POST['document_type']) && !empty($_POST['document_number']) 
        && !empty($_POST['date_of_birth']) && !empty($_POST['city']) && !empty($_POST['state']) 
        && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['password2'])){


            if($_POST['password'] == $_POST['password2']){
                try{
                    $user = new Users();
                    $resp = $user->insert($_POST['user_id'], $_POST['password'], $_POST['name'], $_POST['surname'], $_POST['document_type']
                    ,$_POST['document_number'], $_POST['date_of_birth'], $_POST['city'], $_POST['state']
                    , $_POST['address'], $_POST['email'], $_POST['floor'], $_POST['appart']);

                    if($resp == 'ok'){
                        header('Location:../views/registerok.php');
                        exit();
                    }else{
                        header('Location:../views/registererror.php');
                        exit();
                    }
                }catch(Exception $e){

                    header('Location:../views/registererror.php');
                    exit();
                }   
                

            }
            
        }
    
    }


    //Inicio de Sesion y Cierre de Sesion (guardo los campos en variables de sesion)

    if(!empty($_POST['signin'])){

        session_destroy();
        if(!empty($_POST['user_id']) && !empty($_POST['password'])){

            try{
                $user = new Users();
                $resp = $user->signin($_POST['user_id'], $_POST['password']);
                $admin = 0;
                while($row = mysqli_fetch_array($resp)){
                    $admin = $row['admin'];
                    session_start();
                    $_SESSION['user_id'] = $_POST['user_id'];
                    $_SESSION['user'] = $user;
                    $_SESSION['admin'] = $admin;
                    
                    if($admin == 1){
                        header('Location:../views/adminlogin.php');
                        exit();
                    }if($admin == 0){
                        header('Location:../views/userlogin.php');
                        exit();
                    }
                }
                
                session_destroy();
                header('Location:../views/usererror.php');
                exit();
                
            }catch(Exception $e){
                echo $e;
                session_destroy();
                header('Location:../views/usererror.php');
                exit();
            }   
                            
            
        }

    }
?>
