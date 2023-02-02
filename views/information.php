<?php include("generic/header.php"); 
    include("../models/m_vacants.php");

    //Creo instancia de Vacantes para mostrar los datos de la vacante que está abierta para inscribirse
    $vacants = new Vacants();
    $resp = $vacants->allVacants();

    

?>

<div class="container">
    <div class="row my-3 text-center">
        <h1>Llamados a cubrir vacantes</h1>
        <?php
              
        while($row = mysqli_fetch_array($resp)){ // Recorro el grilla que me devuelve la consulta
        ?>
        <div class="row justify-content-center">
            <div class="col-10 border bg-light m-2">
                <div class="p-3 text-start">
                    <h4><?= $row['place'] ?></h4>
                    <h5><?= $row['career'] ?> &nbsp;  <?= $row['from_date'] ?> - <?= $row['to_date'] ?> </h5>
                    <p>
                        <?= $row['detail'] ?>                    
                    </p>
                    <div class="d-flex justify-content-end">
                    <?php 
                        if (ISSET($_SESSION['user_id'])){   //Si existe una sesion abierta redirecciono

                            ?> <a class="text-info" href="userlogin.php">Postularme</a> 
                            <?php
                          
                          }else{    //sino pido que inicie sesion

                            ?> <a class="text-info" href="" data-bs-toggle = "modal" data-bs-target = "#signinModal">Postularme</a>  
                            <?php
                          }
                          
                    ?>

                    </div>
                 </div>
            </div>
        </div>
        <?php
            }
        ?>
   
    </div>

</div>

<?php require_once("generic/footer.php"); ?>
