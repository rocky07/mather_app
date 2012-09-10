<?php
ob_start();
include("autoload.php");
$id=$_REQUEST["id"];
$util = new Utils();
$records=$util->listProjectDetails($id);
$imageArray=$util->listGalleryImages($id);
$floorType=$util->listFloorTypeImages($id);
$records["gallery"]=$imageArray;
$records["floortypes"]=$floorType;
//$result=json_encode($records);
$summary=$records[0]["summary"];
//$summary=stripTags($summary);

$records[0]["summary"]=html_entity_decode($summary);
$records[0]["specification"]=html_entity_decode($records[0]["specification"]);
$records[0]["amenities"]=html_entity_decode($records[0]["amenities"]);


$data=json_encode($records);
echo $data;
//$data='<a> "asas" </a><p>aaaa</>';
//$data=str_replace("<\z"","<'",$data);

//$data="<p>data here </p><h1>header</h1>";
//$data=strip_tags($data);
//echo $_GET['callback'].'('.json_encode($records).');'

//echo strip_tags(html_entity_decode($summary));


?>