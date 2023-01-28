<?php

require_once('../models/m_users_vacants.php');

session_start();
$userVacants = new UsersVacants();

    if (!empty($_POST['postulate'])){

         $formatters = array('.doc','.pdf','.docx');
         $user_id = $_SESSION['user_id'];
         $vacant = $_POST['vacant'];
         $cvName = $_FILES['cvFile']['name'];
         $cvTemp = $_FILES['cvFile']['tmp_name'];
         $ext = substr($cvName, strrpos($cvName, '.'));

         $isexist = $userVacants->isexist($user_id, $vacant);

         if($isexist == 'error'){
            return header("Location:../views/cverror.php");
         }
         
         if (in_array($ext, $formatters)){
            if(move_uploaded_file($cvTemp, "../CVS/$cvName")){

                $resp = $userVacants->insert($user_id, $vacant, $cvName);

                if($resp == 'ok'){
                    header("Location:../views/cvok.php");
                }else{
                    header("Location:../views/cverror.php");
                }
            }
        }
        
    }

?>