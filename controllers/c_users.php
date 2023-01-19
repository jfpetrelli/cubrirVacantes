<?php

    require_once('../models/m_users.php');


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
                        return header('Location:../views/registerok.php');
                    }else{
                        return header('Location:../views/registererror.php');
                    }
                }catch(Exception $e){

                    return header('Location:../views/registererror.php');
                }   
                

            }
            
        }
    
    }


    return header('Location:../views/registererror.php');

?>
