<?php

function storeImageInFilePath() {
    $message = [];

    $targetFile = $_FILES['image']['name'];
    $imageExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedFileType = ['jpg', 'jpeg', 'png'];

    // Validate if image is uploaded

    if (!file_exists($_FILES['image']['tmp_name'])) {

        $message['empty'] = 'Select an image to upload';
        return false;

    } else if ($_FILES['image']['size'] > 2097152) {

        //Validate that file is not more than 2MB
        $message['maxFileSizeExceeded'] = 'File is too large. File should not be more than 2 megabytes';                
        return false;
        
    } else if (!in_array($imageExtension, $allowedFileType)) {

        $message['filetype'] = 'Allowed file formats are jpg, jpeg, and png';
        return false;

    } else {

        // Set storage directory 
        $imageDir = FILE_STORAGE;
        $imageBaseName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image = $imageBaseName . '.' .time() . '.' .$imageExtension;
        $filepath = $imageDir . $image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath)) {
            return $filepath;
        }
    }
}
