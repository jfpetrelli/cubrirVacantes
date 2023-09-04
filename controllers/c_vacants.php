<?php

    require_once('../models/m_vacants.php');
    require_once('c_inactiveSession.php');

    if(!empty($_POST['register'])){
    
        if(!empty($_POST['place']) && !empty($_POST['career']) 
            && !empty($_POST['from_date']) && !empty($_POST['to_date'])){

            try{
                $vacant = new Vacants();  //Creo instancia de Vacante
                $path = "../cvs/" . $_POST['place'] . ' ' . $_POST['from_date'] . ' ' . $_POST['to_date'] ;  // Creo la ruta donde va a estar la Carpeta con los CVS de esta Vacante
                if(is_dir($path)){
                    header('Location:../views/404.php');
                    exit();
                }
                $fecha_actual = date("Y-m-d");
                $to_date = $_POST['to_date'] ;
//                $to_date = date("d-m-Y",strtotime($to_date));
                $from_date = $_POST['from_date'] ;
//                $from_date = date("d-m-Y",strtotime($from_date));
                if($fecha_actual > $to_date || $from_date > $to_date){
                    header('Location:../views/vacanterror.php');
                    exit();
                }
                
                
                $resp = $vacant->insert($_POST['place'], $_POST['career'], $_POST['from_date'], $_POST['to_date'], $_POST['detail'], $path); // Mando los datos para guardaros en BD

                if($resp == 'ok'){
                    mkdir($path); // Creo la carpeta
                    header('Location:../views/vacantok.php');
                    exit();
                }else{
                    header('Location:../views/vacanterror.php');
                    exit();
                }
            }catch(Exception $e){
                header('Location:../views/404.php');
                exit();
            }   
            
        }
    
    }

?>
