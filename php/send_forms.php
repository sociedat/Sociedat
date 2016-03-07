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
        
        send_form($subject, $body, '');
    }
    
    if($_POST['sendMembership']){
        echo '<p>Registro de membresía</p>';
        $file = $_FILES['payment']['tmp_name'];
        echo "RUTA del archivo: ".$file."<br><br>    ";
        $body =  $_POST['payment']."<br>".
            $_POST['userFirstName']."<br>".
            $_POST['userLastName']."<br>".
            $_POST['birth']."<br>".
            $_POST['userGenre']."<br>".
            $_POST['nationality']."<br>".
            $_POST['educationLevel']."<br>".
            $_POST['occupation']."<br>".
            $_POST['userMail']."<br>".
            $_POST['twitterId']."<br>".
            $_POST['facebookId']."<br>".
            $_POST['linkedinId']."<br>".
            $_POST['githubId']."<br>".
            $_POST['generalDescription']."<br>".
            $_POST['publications']."<br>".
            $_POST['userGroups']."<br>".
            $_POST['interestingTopics']."<br>".
            $_POST['diffusionIdeas']."<br>".
            $_POST['giveConferences']."<br>";
        
        $subject = "Solicitud de registro de nuevo miembro";
        send_form($subject, $body, $file);
    }
    

    
}



function send_form($subject, $body, $file){
        
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
        if($file)
            $mail->AddAttachment($file);
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