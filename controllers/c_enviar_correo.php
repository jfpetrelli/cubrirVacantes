<?php

require_once('../models/m_vacants.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/PHPMailer.php';

session_start();

$vacant = $_GET['vacant'];
$vacantPath = new Vacants(); // Creo instancia de Vacante para traer la ruta de la carpeta donde se guardan los CVS de esta vacante
$resp2 = $vacantPath->getPath($vacant);
$path;
while($row = mysqli_fetch_array($resp2)){
   $path = $row['path'];
}

 //Se añade un directorio
 $files =array_slice(scandir($path),2);

 $mail = new PHPMailer(true);

   $mail->SMTPDebug = SMTP::DEBUG_SERVER;
   $mail->isSMTP();
   
   //Configuracion servidor mail
   $mail->From = "mail@gmail.com"; //remitente
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //seguridad
   $mail->Host = "smtp.gmail.com"; // servidor smtp
   $mail->Port = 465; //puerto 587
   $mail->Username ='pruebatotti@gmail.com'; //nombre usuario
   $mail->Password = 'nxwcfswyopjajden'; //contraseña
   
   foreach($files as $file){
      $mail->AddAttachment("$path/".$file);
   }

   //Agregar destinatario
   $mail->setFrom('pruebatotti@gmail.com', 'Prueba Mail');
   $mail->AddAddress('jfpetrelli@gmail.com');
   $mail->isHTML(true);
   $mail->CharSet = 'UTF-8';
   $mail->Subject = 'Prueba';
   $mail->Body = 'Cuerpo del mensaje';
   $ok = $mail->send();
   if($ok){
      return header('Location:../views/mailok.php');
   }else{
      return header('Location:../views/mailerror.php');
   }



?>
