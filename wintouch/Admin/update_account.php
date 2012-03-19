<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$obj	=	new Authentication();
$results	=	$obj->getAdminInfo($userId);		

if(isset($_POST["submitAccount"])){
	$obj->setAdminId($userId);
	if($obj->updateAdminAccount($_POST)){
		$msg1="Account details updated successfully !"		;
	}else{
		$msg1=	$obj->errorMessage;
	}
	
	header("Location:update_account.php?msg1=$msg1");
	exit;
}

if(isset($_POST["submitPassword"])){
	$obj->setAdminId($userId);
	if($obj->updateAdminPassword($_POST)){
		$msg2=	"Password updated successfully !";		
	}else{
		$msg2=	$obj->errorMessage;
	}
	
	header("Location:update_account.php?msg2=$msg2");
	exit;
}

$webpageTitle	=	"Update Account";

$msge	=$_GET["msg1"];

$msg	=$_GET["msg2"];
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
				<legend>Update Account</legend>
				<form name="passwordFrm" method="post" action="update_account.php">
				<div class="row700"><span class="message redText"><?php echo $msg;?></span></div>
				<div class="row700"><span class="message redText"><?php echo $msge;?></span></div>
				<div class="row700">
					<div class="row150">Current Password <span class="required">*</span></div>
					<div class="row250"><input type="password" name="txtCurrentPassword" id="txtCurrentPassword" size="35" maxlength="15" class="textfields" /></div>
				</div>
				<div class="row700">
					<div class="row150">New Password <span class="required">*</span></div>
					<div class="row250"><input type="password" name="txtNewPassword" id="txtNewPassword" size="35" maxlength="15" class="textfields" /></div>
				</div>
				<div class="row700">
					<div class="row150">&nbsp;</div>
					<div class="row250"><input type="submit" name="submitPassword" id="submitPassword" class="button" value="Update Password" /></div>
				</div>
				</form>		
						
				<form name="accountFrm" action="update_account.php?id=<?php echo $id;?>" method="post">
				<div class="row700"><span class="message"><?php echo $msg1;?></span></div>
				<div class="row700">
					<div class="row150">Username<span class="required">*</span></div>
					<div class="row250"><input type="text" name="txtUserName" id="txtUserName" class="textfields" size="35" maxlength="15" value="<?php echo $results[0]["username"];?>" /></div>
				</div>				
				<div class="row700">
					<div class="row150">Full Name<span class="required">*</span></div>
					<div class="row250"><input type="text" name="txtFullName" id="txtFullName" class="textfields" size="35" maxlength="60" value="<?php echo $results[0]["fullname"];?>" /></div>
				</div>
				<div class="row700">
					<div class="row150">Email Id<span class="required">*</span></div>
					<div class="row250"><input type="text" name="txtemail" id="txtemail" class="textfields" size="35" maxlength="60" value="<?php echo $results[0]["email_id"];?>" /></div>
				</div>
				<div class="row700">
					<div class="row150">&nbsp;</div>
					<div class="row250"><input type="submit" name="submitAccount" id="submitAccount" class="button" value="Update Account" /></div>
				</div>
				</form>									
				</fieldset>
			</div>
		</div>
	</div>	
<?php include("footer.php");?>