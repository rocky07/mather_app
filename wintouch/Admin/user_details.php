<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();


$id	=	$_GET["id"];
$obj	=	new User();
$tmplist	=	$obj->getUserInfo($id);	

if(isset($_POST["submitAccount"])){
	$add	=	new User();
	$add->setUserId($id);
	//print_r($_POST);
	if($add->updateuser($_POST)){
		$msg1 = "Updated successfully !";			
	}else{
		$msg1=	$add->errorMessage;
	}
	header("Location:user_details.php?msg1=$msg1&id=$id");
	exit;

}

 if(isset($_POST["cancelbutton"])){
	 	header("Location:list_users.php?msg=$msg");
		exit;
	 }





$webpageTitle	=	"User Details";
$msg	=$_GET["msg1"];
?>


<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
					<legend>User Details</legend>					
					<div class="formBox">
				<form name="frms" action="user_details.php?id=<?php echo $id;?>" method="post" >
				<div class="row700"><span class="message redText"><?php echo $msg;?></span></div>
				
				<input type="hidden"  name="ff"value="<?php echo $id;?>" />
 										
						<li>
							<div class="row700">
                                    <div class="row180">Username<span class="required">*</span></div>
                                    <div class="row300"><input type="text" name="txtUserName" id="txtUserName" class="textfield" size="35" maxlength="30" value="<?php echo $tmplist[0]["username"]; ?>"/></div>
                                    </div>
									
									
							<!--<div class="row700">
                                    <div class="row180">Password<span class="required">*</span></div>
                                    <div class="row300"><input type="password" name="txtPassword" id="txtPassword" class="textfield" size="30" maxlength="30" value="<?php //echo $tmplist[0]["password"]; ?>"/></div>
                                    </div>-->	
									
									<div class="row700">
                                    <div class="row180">Fullname<span class="required">*</span></div>
                                    <div class="row300"><input type="text" name="txtFullName" id="txtFullName" class="textfield" size="35" maxlength="30" value="<?php echo $tmplist[0]["fullname"]; ?>"/></div>
                                    </div>
																	
									<div class="row700">
                                    <div class="row180">Email<span class="required">*</span></div>
                                    <div class="row300"><input type="text" name="txtemail" id="txtemail" class="textfield" size="35" maxlength="30" value="<?php echo $tmplist[0]["email_id"]; ?>"/></div>
                                    </div>							
								<div class="row700">
                                            <div class="row180">&nbsp;</div>
                                            <div class="row300"><input type="submit" name="submitAccount" class="button" value="Submit" /><input type="submit" name="cancelbutton" class="button" value="Cancel" /></div>
                                        </div> 				
				        </li>
														
							
				</fieldset>
			</div>
		</div>
	</div>	
<?php include("footer.php");?>