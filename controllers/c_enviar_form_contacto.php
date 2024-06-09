<?php

require_once('../models/m_vacants.php');
require_once('../models/m_users.php');
require_once('c_inactiveSession.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/PHPMailer.php';

session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    try{
      $mail = new PHPMailer(true);
     
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        
        //Configuracion servidor mail
     
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //seguridad
        $mail->Host = "smtp.gmail.com"; // servidor smtp
        $mail->Port = 465; //puerto 587
        include("../config/config.php");
        $mail->Username =$user_mail; //nombre usuario
        $mail->Password = $pass_mail; //contraseña
     
        //Agregar destinatario
        $mail->setFrom($correo, $nombre);
        $mail->AddAddress($correo);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Mensaje desde la WEB';
        $mail->Body = $mensaje;
        $ok = $mail->send();
        if($ok){
           header('Location:../views/mailok.php');
           exit();
        }else{
           header('Location:../views/mailerror.php');
           exit();
        }
        }catch(Exception $e){
          echo $mail->ErrorInfo;
        }
     
}
