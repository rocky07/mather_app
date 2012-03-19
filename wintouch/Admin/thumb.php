<?php


include("autoload.php");


$image	=	$_GET["image"];
$w		=	$_GET["w"];
$h		=	$_GET["h"];
$cw		=	$_GET["cw"];
$ch		=	$_GET["ch"];

$obj	=	new Thumbcrop();
$obj	->	get_thumb_image($image,$w,$h,$cw,$ch);

?>