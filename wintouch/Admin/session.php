<?php
session_start();
$register	=	new Session();
$userId	    =	$register->getSession("LOGGED_ADMIN_ID");
$name	=	$register->getSession("LOGGED_ADMIN_NAME");
$email	=	$register->getSession("LOGGED_ADMIN_EMAIL");
$username	=	$register->getSession("LOGGED_ADMIN_USERNAME");
if(!isset($userId)){
		header("Location:index.php?msg=Please Login");
		exit;
}

?>