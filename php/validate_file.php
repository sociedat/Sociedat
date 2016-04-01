<?php

// Check for errors
if($_FILES['file_to_upload']['error'] > 0){
    die('An error ocurred when uploading.');
}
else {
  
    
    //print_r($_FILES);
    echo "Nombre del archivo: " . $_FILES['file_upload']['name'] . "<br>";
    echo "Tipo: " . $_FILES['file_upload']['type'] . "<br>";
    echo "Tamaño: " . ($_FILES["file_upload"]["size"] / 1024) . "KB <br>";
    //echo "Carpeta temporal: " . $_FILES['file_upload']['tmp_name']." <br>";


    /*
    if(!getimagesize($_FILES['file_upload']['tmp_name'])){
        die('Please ensure you are uploading an image.');
    } 
    */
    
    
    // Check filetype
    $type = $_FILES['file_upload']['type'];
    echo '<br>Tipo de archivo: '.$type.'<br>';
    switch($type) {
        case 'image/jpg': break;
        case 'image/jpeg': break;
        case 'image/png': break;
        case 'image/bmp': break;
        /*case 'application/pdf': break; */
        default:    
            die('Unsupported filetype uploaded.');
    }    
    
    // Check filesize
    if($_FILES['file_upload']['size'] > 512000){
        die('File uploaded exceeds maximum upload size.');
    }

    // Check if the file exists
    if(file_exists('../upload/' . $_FILES['file_upload']['name'])){
        die('File with that name already exists.');
    }

    // Upload file
    $target_path = '../upload/' . basename($_FILES['file_upload']['name']);
    if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path )){
        die('Error uploading file - check destination is writeable.');
    }
    
    //die('File uploaded successfully.');
    
    
}
?>