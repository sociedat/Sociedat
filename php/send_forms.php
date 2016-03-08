<?php
require_once('class.phpmailer.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['getInfo'])){
        echo '<p>Solicitud de información de cursos</p>';
        
        $body =  "Nombre del solicitante: " . $_POST['userName']
            . "<br>Email de contacto: " . $_POST['email']
            . "<br>Curso de interés: " . $_POST['requiredCourse']
            . "<br>Perfil de los estudiantes: " . $_POST['profile']
            . "<br>Duración deseada: " . $_POST['duration'];
        $subject = "Solicitud de información de cursos SOCIEDAT";
        $file = "";
        send_form($subject, $body, $file);
    }
    
    if($_POST['sendMembership']){
        echo '<p>Registro de membresía</p>';
        $file = $_FILES['payment']['tmp_name'];
        echo "RUTA del archivo: ".$file."<br><br>    ";
        $body =  
            "Datos del solicitante:"
            ."<br>Nombre: ". $_POST['userFirstName']
            ."<br>Apellidos: ". $_POST['userLastName']
            ."<br>Fecha de nacimiento: ". $_POST['birth']
            ."<br>Género: ". $_POST['userGenre']
            ."<br>Nacionalidad: ". $_POST['nationality']
            ."<br>Nivel de educación: ". $_POST['educationLevel']
            ."<br>Ocupación: ". $_POST['occupation']
            ."<br>E-mail: ". $_POST['userMail']
            ."<br>Twitter: ". $_POST['twitterId']
            ."<br>Facebook: ". $_POST['facebookId']
            ."<br>LinkedIn: ". $_POST['linkedinId']
            ."<br>GitHub: ". $_POST['githubId']
            ."<br>Descripción general, intereses (Cuéntanos un poco de ti): <br>"
            . $_POST['generalDescription']
            ."<br>Publicaciones (Describe las publicaciones con las que cuentas y compartenos la liga): <br>"
            . $_POST['publications']
            ."<br>¿Asistes a seminarios, conferencias, meetups?: ". $_POST['userGroups']
            ."<br>¿Qué temas te gustaría que se difundieran, relacionados con ciencia de datos?:<br>"
            . $_POST['interestingTopics']
            ."<br>¿Te gustaría colaborar a que la ciencia de datos se difunda y crezca en México? Platícanos cómo: <br>"
            . $_POST['diffusionIdeas']
            ."<br>¿Te gustaría dar pláticas o conferencias? .... cuéntanos tus temas: <br>"
            . $_POST['giveConferences'];
        
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
    if(!$mail->Send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
    } else {
        echo "success";
        echo "Mensaje enviado!";
    }
}


?>