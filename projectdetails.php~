<?php
ob_start();
include("autoload.php");

$util = new Utils();
$records=$util->listProjectDetails(1);
$imageArray=$util->listGalleryImages(1);
$floorType=$util->listFloorTypeImages(1);
$records["gallery"]=$imageArray;
$records["floortypes"]=$floorType;
$result=json_encode($records);
//echo str_replace("\/", "/", $records);
echo $result;
?>