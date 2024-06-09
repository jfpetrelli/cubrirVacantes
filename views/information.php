<?php 
include("generic/header.php"); 
include("../models/m_vacants.php");

// Creo instancia de Vacantes para mostrar los datos de la vacante que está abierta para inscribirse
$vacants = new Vacants();
$resp = $vacants->allVacants();

// Configuración de paginación
$records_per_page = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

?>

<div class="container">
    <div class="row my-3 text-center">
        <h1>Llamados a cubrir vacantes</h1>
        <?php
        $count = 0;
        while($row = mysqli_fetch_array($resp)){ // Recorro el grilla que me devuelve la consulta
            $count++;
            if($count > $start_from && $count <= ($start_from + $records_per_page)) {
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
                            if (isset($_SESSION['user_id'])){   //Si existe una sesion abierta redirecciono
                                if($_SESSION['admin'] == 0){
                                ?> <a class="text-info" href="userlogin.php">Postularme</a> 
                                <?php
                                }else{
                                ?> <a class="text-info" href=""></a> 
                                <?php
                                }
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
        }
        ?>
    </div>
    <!-- Paginación -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1; ?>">Anterior</a>
                </li>
            <?php } ?>
            <?php 
            $total_vacants = mysqli_num_rows($resp);
            $total_pages = ceil($total_vacants / $records_per_page);
            for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php } ?>
            <?php if ($page < $total_pages) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1; ?>">Siguiente</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>

<?php require_once("generic/footer.php"); ?>


