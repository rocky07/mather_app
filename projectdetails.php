<?php
ob_start();
include("autoload.php");

$util = new Utils();
$records=$util->listProjectDetails(1);
$result=json_encode($records);
//echo str_replace("\/", "/", $records);
echo $result;
?>