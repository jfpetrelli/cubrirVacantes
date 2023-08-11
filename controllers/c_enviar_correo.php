<?php

require_once('../models/m_vacants.php');
require_once('../models/m_users.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/PHPMailer.php';

session_start();

$user = new Users();
$resp = $user->all($_SESSION['user_id']); 
$emailUser;
while($row = mysqli_fetch_array($resp)){
   $emailUser = $row['email'];
}

$vacant = $_GET['vacant'];
$vacantPath = new Vacants(); // Creo instancia de Vacante para traer la ruta de la carpeta donde se guardan los CVS de esta vacante
$resp2 = $vacantPath->getPath($vacant);
$path;
$place;
$career;
$detail;
while($row = mysqli_fetch_array($resp2)){
   $path = $row['path'];
   $place = $row['place'];
   $career = $row['career'];
   $detail = $row['detail'];
}

 //Se añade un directorio
 $files =array_slice(scandir($path),2);

 try{
 $mail = new PHPMailer(true);

   $mail->SMTPDebug = 0;
   $mail->isSMTP();
   
   //Configuracion servidor mail

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
   $mail->setFrom('pruebatotti@gmail.com', 'CVs Cubrir Vacantes');
   $mail->AddAddress($emailUser);
   $mail->isHTML(true);
   $mail->CharSet = 'UTF-8';
   $mail->Subject = $place.'-'.$career;
   $mail->Body = 'Informes de CVs'."<br>".$detail;
   $ok = $mail->send();
   if($ok){
      return header('Location:../views/mailok.php');
   }else{
      return header('Location:../views/mailerror.php');
   }
   }catch(Exception $e){
     echo $mail->ErrorInfo;
   }


?>
