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
        
        $headers = array (
            'From' => 'info@sociedat.com',
            'Reply-To' => 'vmaceda29@gmail.com'
        );
        
        mail($to, $subject, $body, $headers);    
    }
    
}

?>