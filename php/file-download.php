<?php
include_once "../php/partials/db_connect.php";

// Downloads files
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM ideas";
    $result = mysqli_query($connect, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = '../uploads/' . $file['file_name'];
    
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);
    }
