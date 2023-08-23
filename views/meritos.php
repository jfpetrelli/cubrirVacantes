<?php include("generic/header.php"); 
    include("../models/m_vacants.php");
    include("../models/m_users_vacants.php");

    $vacants = new Vacants();
    $resp = $vacants->allVacantsEnd();
    $selected = '';

    if(!empty($_GET['search'])){
        if(empty($_GET['vacant'])){
            header('Location:../views/searchvacanterror.php');
            exit();
          }
        $userVacants = new UsersVacants();
        $resp3 = $userVacants->getAllScore($_GET['vacant']); // Traigo los usuarios postulados en una vacante
        $selected = $_GET['vacant']; // variable para guardar la vacante seleccionada
      
      }else{
        $selected = '';
      }
?>

<div class="container">
    <div class="row my-3 text-center">
        <h1>Méritos</h1>
        <div class="row justify-content-center">
            <div class="col-10 border bg-light m-2">
                <div class="p-3 text-start">
                    <form class="row justify-content-center"  method = "GET">
                      
                        <div class="row justify-content-start m-2">
                          <div class="col-6">
                            <div class="form-group text-start"> 
                              <label for="vacantes" class="col-form-label">Vacante</label>
                              <select class="form-select" name="vacant" id="vacantes">
                              <?php
                              while($row = mysqli_fetch_array($resp)){
                                ?><option value = "<?= $row['id'] ?>"
                                <?php if($selected == $row['id']){
                                            ?> selected <?php } 
                                      ?>>
                                <?=$row['place'].'-'.$row['career']?></option> <?php
                              }
                          
                              ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-1 align-self-end">
                            <button title="Buscar Vacante" type="submit" class="btn btn-primary" name="search" value = "ok">Buscar</button>
                          </div>
                      
                    </form>
                    <form class="" action="../controllers/c_users_vacants.php" method = "GET">
                        <input type="hidden" name="vacant" value="<?=$selected?>">
                        
                            <div class="row justify-content-start my-3">
                                <div class="col-12">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Fecha postulación</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Puntaje</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(!empty($_GET['search'])){
                                                    while($row = mysqli_fetch_array($resp3)){
                                            ?>
                                            <tr class="table-secondary">
                                                <th scope="row"><input type="hidden" name = "user_id[]" value =<?= $row['user_id']; ?>><?= $row['user_id']; ?>
                                                <th scope="row"><?= $row['date']; ?>
                                                <th scope="row"><?= $row['surname']; ?>
                                                <th scope="row"><?= $row['name']; ?>
                                                <th scope="row"><?= $row['score']; ?>
                                            </tr>
                                            <?php

                                                    }
                                                }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                        
                    </form>
                </div>                    
            </div>    
        </div>
   
    </div>

</div>

<?php require_once("generic/footer.php"); ?>
