<?php

    require_once('../models/m_vacants.php');


    if(!empty($_POST['register'])){
    
        if(!empty($_POST['place']) && !empty($_POST['career']) 
            && !empty($_POST['from_date']) && !empty($_POST['to_date'])){

            try{
                $user = new Vacants();
                $path = "../cvs/" . $_POST['place'] . ' ' . $_POST['from_date'] . ' ' . $_POST['to_date'] ; 
                if(!is_dir($path)){
                    mkdir($path);
                }else{
                    return header('Location:../views/404.php');
                }
                
                $resp = $user->insert($_POST['place'], $_POST['career'], $_POST['from_date'], $_POST['to_date'], $_POST['detail'], $path);

                if($resp == 'ok'){
                    return header('Location:../views/vacantok.php');
                }else{
                    return header('Location:../views/404.php');
                }
            }catch(Exception $e){
                return header('Location:../views/404.php');
            }   
            
        }
    
    }


?>
