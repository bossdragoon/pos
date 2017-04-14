<?php

    // upload.php
    // 'images' refers to your file input name attribute
    if (empty($_FILES['imgupload'])) {
        echo json_encode(array('error' => 'No files found for upload.'));
        // or you can throw an exception 
        return; // terminate
    }

    // get the files posted
    $images = $_FILES['imgupload'];

    // get user id posted
    $id_edit = empty($_POST['id_edit']) ? '' : $_POST['id_edit'];

    // a flag to see if everything is ok
    $success = null;

    // file paths to store
    $paths = array();

    // get file names
    $filenames = $images['name'];

    
    
    // Deleting all user's old avatar even if file extension is different
    // (1 user = 1 pic in directory)
    $possibleFiles = glob("../../public/images/" . $id_edit . '.*');
    foreach ($possibleFiles as $foundfile) {
        unlink($foundfile);
    }    
    
    
    // loop and process files
    for ($i = 0; $i < count($filenames); $i++) {
        $ext = explode('.', basename($filenames[$i]));
//        $target = "../../public/images/" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
        $target = "../../public/images/" . DIRECTORY_SEPARATOR . $id_edit . "." . array_pop($ext);
        if (move_uploaded_file($images['tmp_name'][$i], $target)) {
            $success = true;
            $paths[] = $target;
        } else {
            $success = false;
            break;
        }
    }

    // check and process based on successful status 
    if ($success === true) {
        // store a successful response (default at least an empty array). You
        // could return any additional response info you need to the plugin for
        // advanced implementations.
        $output = array();
        // for example you can get the list of files uploaded this way
        // $output = ['uploaded' => $paths];
    } elseif ($success === false) {
        $output = array('error' => 'Error while uploading images. Contact the system administrator');
        // delete any uploaded files
        foreach ($paths as $file) {
            unlink($file);
        }
    } else {
        $output = array('error' => 'No files were processed.');
    }

    // return a json encoded response for plugin to process successfully
    echo json_encode($output);
