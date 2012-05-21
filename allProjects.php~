<?php
ob_start();
include("autoload.php");
$util = new Utils();
$records=$util->listAllProjects();
$result=json_encode($records);
echo $result;
//echo str_replace("\/", "/", $result);
//echo '[{"id":"1","name":"Palm Meadows1","loc":"Alampady","images":"uploads/project_images/-MhtLV5CvNY_upload.jpg"}]';
?>