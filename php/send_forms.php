<?php
require_once('class.phpmailer.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['getInfo'])){
        echo '<p>Solicitud de información de cursos</p>';        
        
        $body =  "Nombre del solicitante: " . $_POST['userName']
            . "\nEmail de contacto: " . $_POST['email']
            . "\nCurso de interés: " . $_POST['requiredCourse']
            . "\nPerfil de los estudiantes: " . $_POST['profile']
            . "\nDuración deseada: " . $_POST['duration'];
        $subject = "Solicitud de información de cursos SOCIEDAT";
        
        send_form($subject, $body);
    }

    
}



function send_form($subject, $body){
        
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
        $mail->SetFrom('info@sociedat.org', 'SoCieDat');
        $mail->AddReplyTo("info@sociedat.org","SoCieDat");
        $mail->Subject = $subject;

   
        $mail->MsgHTML($body);
        //indico destinatario
        $address = "contacto@sociedat.org";
        $mail->AddAddress($address, "Sociedad de Científicos de Datos");
        if(!$mail->Send()) {
            echo "Error al enviar: " . $mail->ErrorInfo;
        } else {
            echo "Mensaje enviado!";
        }
    }


?>