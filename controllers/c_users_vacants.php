<?php

require_once('../models/m_users_vacants.php');
require_once('../models/m_vacants.php');

session_start();
$userVacants = new UsersVacants();

    if (!empty($_POST['postulate'])){

        $user_id = $_SESSION['user_id'];
        $vacant = $_POST['vacant'];

        $isexist = $userVacants->isexist($user_id, $vacant);

        if($isexist == 'error'){
           return header("Location:../views/cverror.php");
        }

         $formatters = array('.doc','.pdf','.docx');
         $cvName = $_FILES['cvFile']['name'];
         $cvTemp = $_FILES['cvFile']['tmp_name'];
         $ext = substr($cvName, strrpos($cvName, '.'));
         $vacantPath = new Vacants();
         $resp2 = $vacantPath->getPath($vacant);
         $path;
         while($row = mysqli_fetch_array($resp2)){
            $path = $row['path'];

        }
 
        if (in_array($ext, $formatters)){
            if(move_uploaded_file($cvTemp, "$path/$cvName")){

                $resp = $userVacants->insert($user_id, $vacant, $cvName);

                if($resp == 'ok'){
                    header("Location:../views/cvok.php");
                }else{
                    header("Location:../views/cverror.php");
                }
            }
        }else{
            return header("Location:../views/formaterror.php");
        }
        
    }

    if (!empty($_GET['upload'])){

        if(empty($_GET['vacant'])){
            header("Location:../views/scoreloaderror.php");
            
            
        }else{
            if(!empty($_GET['user_id'])){
                $resp3 = $userVacants->insertScore($_GET['vacant'], $_GET['user_id'], $_GET['score']);

                if($resp3 == 'ok'){
                    header("Location:../views/scoreloadok.php");
                }else{
                    header("Location:../views/scoreloaderror.php");
                }
                
            }
            
            
        }

    }

?>
