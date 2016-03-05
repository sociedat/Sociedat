<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['getInfo'])){
        echo '<p>Solicitud de información de cursos</p>';        
        
        $body =  "Nombre del solicitante: " . $_POST['userName']
            . "\nEmail de contacto: " . $_POST['email']
            . "\nCurso de interés: " . $_POST['requiredCourse']
            . "\nPerfil de los estudiantes: " . $_POST['profile']
            . "\nDuración deseada: " . $_POST['duration'];         
        $to = "contacto@sociedat.org";
        $subject = "Solicitud de información de cursos SOCIEDAT";
        
        send_form($to, $subject, $body);
        
    }
        
    function send_form($to, $subject, $body){
        require_once('class.phpmailer.php');
        $mail = new PHPMailer();   
        
        //indico a la clase que use SMTP
        $mail->IsSMTP();
        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        $mail->SMTPDebug = 2;
        //Debo de hacer autenticación SMTP
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        //indico el servidor de Gmail para SMTP
        $mail->Host = "smtp.sendgrid.net";
        //indico el puerto que usa Gmail
        $mail->Port = 465;
        //indico un usuario / clave de un usuario de gmail
        $mail->Username = "azure_ba1608611275c790d8b4945c590c8684@azure.com";
        $mail->Password = "DopplerEffect2015";
        $mail->SetFrom('azure_ba1608611275c790d8b4945c590c8684@azure.com', 'SoCieDat');
        $mail->AddReplyTo("vmaceda29@gmail.com","SoCieDat");
        $mail->Subject = "Prueba de Postal";

        $mail->MsgHTML($body);
        //indico destinatario
        $address = "contacto@sociedat.org";
        $mail->AddAddress($address, "Nombre completo");
        if(!$mail->Send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
        } else {
        echo "Mensaje enviado!";
        }
    }
    
}

?>