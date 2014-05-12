<?php
require("mailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = "localhost";

    $mail->From = "itoito@gmail.com";
    $mail->FromName = "Nombre del Remitente";
    $mail->Subject = "Subject del correo";
    $mail->AddAddress("itoito@gmail.com","Nombre 01");
    $mail->AddAddress("itoito@gmail.com","Nombre 02");
    $mail->AddCC("itoito@gmail.com");
    $mail->AddBCC("itoito@gmail.com");

    $body  = "Hola <strong>amigo</strong><br>";
    $body .= "probando <i>PHPMailer<i>.<br><br>";
    $body .= "<font color='red'>Saludos</font>";
    $mail->Body = $body;
    $mail->AltBody = "Hola amigo\nprobando PHPMailer\n\nSaludos";
    $mail->AddAttachment("../ficheros/2010-10-06_10-58-31.jpg", "foto.jpg");
    //$mail->AddAttachment("files/demo.zip", "demo.zip");
    $mail->Send();
?>