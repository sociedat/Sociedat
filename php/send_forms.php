<?php
require_once('class.phpmailer.php');

function send_form($userEmail, $userName, $subject, $body, $file){
    
    $mail = new PHPMailer();   

    //indico a la clase que use SMTP
    $mail->IsSMTP();
    //permite modo debug para ver mensajes de las cosas que van ocurriendo
    $mail->SMTPDebug = 2;
    //Debo de hacer autenticación SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    //indico el servidor de Gmail para SMTP
    $mail->Host = "smtp.zoho.com";
    //indico el puerto que usa Gmail
    $mail->Port = 465;
    //indico un usuario / clave de un usuario de gmail
    $mail->Username = "info@sociedat.org";
    $mail->Password = "DopplerEffect2015";
    $mail->SetFrom('info@sociedat.org', 'SoCieDat-Website');
    $mail->AddReplyTo($userEmail, $userName);
    $mail->Subject = $subject;

    
    $mail->MsgHTML($body);
    if($file)
        $mail->AddAttachment($file);
    //indico destinatario
    $address = "contacto@sociedat.org";
    $mail->AddAddress($address, "Sociedad de Científicos de Datos");
    $mail->CharSet = 'UTF-8';
    if(!$mail->Send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
        return array('type' => 'error', 'text' => $mail->ErrorInfo);
    } else {
        echo "Mensaje enviado!";
        //echo unlink($file) ? "File Deleted" : "Problem deleting file";
        return array('response' => 'success', 'text' => 'Mensaje enviado!');
    }
}


?>