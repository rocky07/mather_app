<?php
ob_start();
include("autoload.php");
$db		=	new Database_MySql();
$db->connect();
	//Check User Login : Authentication //
	if(isset($_POST["loginButton"]))
	{
		$auth	=	new Authentication();
		$result	=	$auth->checkAdminLogin($_POST);
		if($result)
		{
			$register	=	new Session();
			$register->setSession("LOGGED_ADMIN_ID",$auth->userId);
			$register->setSession("LOGGED_ADMIN_NAME",$auth->fullname);
			$register->setSession("LOGGED_ADMIN_EMAIL",$auth->email);
			$register->setSession("LOGGED_ADMIN_USERNAME",$auth->username);
			header("Location:dashboard.php");
			exit;
		}
		else
		{
			$message	=	$auth->errorMessage;
		}
		echo $message;
		header("Location:index.php?msg=$message");
		exit;
	}
	$msg	=	$_GET["msg"];
	$msg1	=	$_GET["msg1"];
	$webpageTitle	=	"Login";
	
	
	
?>
<?php  include("header.php");?>
	<div id="page">
		<div class="loginForm">
		<form name="frm_login" action="index.php" method="post">
		<div class="row580"><span class="redText"><?php echo $message;?></span></div>
		<div class="row580"><span class="redText"><?php echo $msg;?></span></div>
			<div class="row580"><span class="redText"><?php echo $msg1;?></span></div>
			<div class="row580">&nbsp;</div>
			<div class="row580">
				<div class="row220 alright">Username<span class="required">*</span></div>
				<div class="row320"><input type="text" name="txtUser" size="30" class="textfield" /></div>
			</div>
			<div class="row580">
				<div class="row220 alright">Password<span class="required">*</span></div>
				<div class="row320"><input type="password" name="txtPassword" size="30" class="textfield" /></div>
			</div>
			<div class="row580">
				<div class="row220 alright">&nbsp;<span class="required"></span></div>
				<div class="row320"><input type="submit" name="loginButton" id="submit" value="Login" class="button" /></div>
			</div>
		</form>	
		</div>
	</div>
<?php  include("footer.php");?>