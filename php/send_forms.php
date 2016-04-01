<?php
header ('Content-type: text/html; charset=utf-8');
require_once('class.phpmailer.php');



$begin = '
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" Content-Type:"text/html" charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SOCIEDAT Sociedad de Científicos de Datos</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <p>';
$end = '
        </p>
    </body>
</html>
';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['contactMessage'])){
        echo 'Mensaje desde formulario de contacto <br>';
        $body = $begin 
            . "<br>Nombre: " . $_POST['name']
            . "<br>Correo: " . $_POST['email']
            . "<br>Asunto: " . $_POST['subject']
            . "<br>Mensaje:" . $_POST['message'] . $end;
        $file = '';
        $subject = $_POST['subject'];
        send_form($subject, $body, $file);
    }
    
    if(isset($_POST['getInfo'])){
        echo 'Solicitud de información de cursos<br>';
        
        $body = $begin . "Nombre del solicitante: " . $_POST['userName']
            . "<br>Email de contacto: " . $_POST['email']
            . "<br>Curso de interés: " . $_POST['requiredCourse']
            . "<br>Perfil de los estudiantes: " . $_POST['profile']
            . "<br>Duración deseada: " . $_POST['duration'] . $end;
        $subject = "Solicitud de información de cursos SOCIEDAT";
        $file = "";
        send_form($subject, $body, $file);
    }
    
    if($_POST['sendMembership']){
        //print_r($_FILES);
        //echo '---';
        require_once('validate_file.php');
        echo 'Registro de membresía<br>';
        $file = $target_path;
        $body =
            $begin
            ."<strong>Datos del solicitante: </strong>"
            ."<br><strong>Nombre: </strong>". $_POST['userFirstName']
            ."<br><strong>Apellidos: </strong>". $_POST['userLastName']
            ."<br><strong>Fecha de nacimiento: </strong>". $_POST['birth']
            ."<br><strong>Género: </strong>". $_POST['userGenre']
            ."<br><strong>Nacionalidad: </strong>". $_POST['nationality']
            ."<br><strong>Nivel de educación: </strong>". $_POST['educationLevel']
            ."<br><strong>Ocupación: </strong>". $_POST['occupation']
            ."<br><strong>E-mail: </strong>". $_POST['userMail']
            ."<br><strong>Twitter: </strong>". $_POST['twitterId']
            ."<br><strong>Facebook: </strong>". $_POST['facebookId']
            ."<br><strong>LinkedIn: </strong>". $_POST['linkedinId']
            ."<br><strong>GitHub: </strong>". $_POST['githubId']
            ."<br><strong>Descripción general, intereses (Cuéntanos un poco de ti): </strong><br>"
            . $_POST['generalDescription']
            ."<br><strong>Publicaciones (Describe las publicaciones con las que cuentas y compartenos la liga): </strong><br>"
            . $_POST['publications']
            ."<br><strong>¿Asistes a seminarios, conferencias, meetups?: </strong>". $_POST['userGroups']
            ."<br><strong>¿Qué temas te gustaría que se difundieran, relacionados con ciencia de datos?:</strong><br>"
            . $_POST['interestingTopics']
            ."<br><strong>¿Te gustaría colaborar a que la ciencia de datos se difunda y crezca en México? Platícanos cómo: </strong><br>"
            . $_POST['diffusionIdeas']
            ."<br><strong>¿Te gustaría dar pláticas o conferencias? .... cuéntanos tus temas: </strong><br>"
            . $_POST['giveConferences']
            . $end;
        
        $subject = "Solicitud de registro de nuevo miembro";
        send_form($subject, $body, $file);
        unset($_POST);
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
    $mail->CharSet = 'UTF-8';
    if(!$mail->Send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
    } else {
        echo "success";
        echo "Mensaje enviado!";
        echo unlink($file) ? "File Deleted" : "Problem deleting file";
    }
}


?>