<?php

require_once('../models/m_vacants.php');

session_start();

$vacant = $_GET['vacant'];
$vacantPath = new Vacants();
$resp2 = $vacantPath->getPath($vacant);
$path;
while($row = mysqli_fetch_array($resp2)){
   $path = $row['path'];
}

// Creamos un instancia de la clase ZipArchive
$zip = new ZipArchive();

// Creamos y abrimos un archivo zip temporal
 $zip->open("CVS.zip",ZipArchive::CREATE);

 $files =array_slice(scandir($path),2);
 foreach($files as $file){
    //Añadimos un archivo dentro del directorio que hemos creado
    $zip->addFile("$path/".$file);
}

 // Una vez añadido los archivos deseados cerramos el zip.
 $zip->close();
 // Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=CVS.zip");
 // leemos el archivo creado
 readfile('CVS.zip');
 // Por último eliminamos el archivo temporal creado
 unlink('CVS.zip');//Destruye el archivo temporal

?>
