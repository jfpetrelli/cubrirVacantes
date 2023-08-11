<?php

    require_once('../models/m_vacants.php');


    if(!empty($_POST['register'])){
    
        if(!empty($_POST['place']) && !empty($_POST['career']) 
            && !empty($_POST['from_date']) && !empty($_POST['to_date'])){

            try{
                $vacant = new Vacants();  //Creo instancia de Vacante
                $path = "../cvs/" . $_POST['place'] . ' ' . $_POST['from_date'] . ' ' . $_POST['to_date'] ;  // Creo la ruta donde va a estar la Carpeta con los CVS de esta Vacante
                if(is_dir($path)){
                    return header('Location:../views/404.php');
                }
                $fecha_actual = date("d-m-Y");
                $to_date = $_POST['to_date'] ;
                $to_date = date("d-m-Y",strtotime($to_date));
                $from_date = $_POST['from_date'] ;
                $from_date = date("d-m-Y",strtotime($from_date));
                if($fecha_actual > $to_date){
                    return header('Location:../views/vacanterror.php');
                }
                if($from_date >= $to_date){
                    return header('Location:../views/vacanterror.php');
                }
                
                $resp = $vacant->insert($_POST['place'], $_POST['career'], $_POST['from_date'], $_POST['to_date'], $_POST['detail'], $path); // Mando los datos para guardaros en BD

                if($resp == 'ok'){
                    mkdir($path); // Creo la carpeta
                    return header('Location:../views/vacantok.php');
                }else{
                    return header('Location:../views/vacanterror.php');
                }
            }catch(Exception $e){
                return header('Location:../views/404.php');
            }   
            
        }
    
    }


?>
