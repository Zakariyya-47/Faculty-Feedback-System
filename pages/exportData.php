<?php

include_once '../php/partials/db_connect.php';

$findDoc =  "SELECT * FROM ideas WHERE file_name IS NOT NULL";
$checkDoc = mysqli_query($connect, $findDoc);
$curdir = getcwd();
$filename	=	'all-uploads.zip';

$zip = new ZipArchive;
if ($zip->open($filename,  ZipArchive::CREATE)){
    while($row	=	$checkDoc->fetch_assoc()){
        $zip->addFile(getcwd().'/'.'../uploads/'.$row['file_name'], $row['file_name']);
    }
    
    $zip->close();
    
    header("Content-type: application/zip"); 
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-length: " . filesize($filename));
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile("$filename");
    unlink($filename);
    header("Location:../pages/dashboard.php?download successful");

}else{
   echo 'Failed!';
}