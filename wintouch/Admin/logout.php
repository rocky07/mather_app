<?php
session_start();
include("autoload.php");
$reg	=	new Session();

$reg->clearSession("LOGGED_ADMIN_ID");
$reg->clearAll();
header("Location:index.php?msg1=Logged out of Admin !");
exit;
 
?>