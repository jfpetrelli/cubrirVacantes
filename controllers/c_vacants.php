<?php

    require_once('../models/m_vacants.php');


    if(!empty($_POST['register'])){
    
        if(!empty($_POST['place']) && !empty($_POST['career']) 
            && !empty($_POST['from_date']) && !empty($_POST['to_date'])){

            try{
                $vacant = new Vacants();  //Creo instancia de Vacante
                $path = "../cvs/" . $_POST['place'] . ' ' . $_POST['from_date'] . ' ' . $_POST['to_date'] ;  // Creo la ruta donde va a estar la Carpeta con los CVS de esta Vacante
                if(!is_dir($path)){
                    mkdir($path); // Creo la carpeta
                }else{
                    return header('Location:../views/404.php');
                }
                
                $resp = $vacant->insert($_POST['place'], $_POST['career'], $_POST['from_date'], $_POST['to_date'], $_POST['detail'], $path); // Mando los datos para guardaros en BD

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
