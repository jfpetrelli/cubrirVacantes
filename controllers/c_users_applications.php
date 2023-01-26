<?php

session_start();

    $formatters = array('.doc','.pdf','.docx');
    if (!empty($_GET['postulate'])){
         $user_id = $_SESSION['user_id'];
         $vacant = $_GET['vacant'];
         $cv = $_FILES['cv']['name'];
         $cvTemp = $_FILES['cv']['tmp_name'];
         $ext = substr($cv, strrpos($cv, '.'));
         echo $_FILES['cv']['name'];
         echo $_SESSION['user_id'];
         /*
         if (in_array($ext, $formatters)){
            if(move_uploaded_file($cvTemp, "CVS/$cv")){

//              $query = "INSERT INTO postulaciones (id_usuario, id_vacante, nombre, apellido, telefono, email) VALUES ('$idUsu','$id','$nombre', '$apellido','$telefono','$email');";
 //             $result = mysqli_query($link, $query); 
                $result =true;
                if ($result){
                   // header("Location:Detalles.php?var=$id");
                   echo "adsd";
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
                    <?php
                }
            }
        }
        */
    }

?>
