<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$auth	=	new Authentication();

$phid=	$_GET["phid"];

if(!empty($phid)){
$recds = $auth->fetchNewsById($phid);
}

if(isset($_POST["updateAccount"])){

	if($auth->updateNews($_POST,$phid)){
		$msg1 = "News updated successfully !";	
		header("Location:list_news.php?msg1=$msg1");
		exit;		
	}else{
		$msg1=	$auth->errorMessage;
	}
	header("Location:addNews.php?phid=$phid&msg1=$msg1");
	exit;
}


if(isset($_POST["submitAccount"])){

	if($auth->createNews($_POST)){
		$msg1 = "News created successfully !";			
	}else{
		$msg1=	$auth->errorMessage;
	}
	header("Location:addNews.php?msg1=$msg1");
	exit;
}

$msg1=	$_GET["msg1"];

?>
<?php include("header.php");?>
<link href="css/style.css" rel="stylesheet" type="text/css" />

	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
			<fieldset id="main">
			<legend>Create News</legend>			
			<div class="formBox">
				<div class="row700 redText"><?php echo $msg1;?></div>				
				<form name="accountFrm" method="post" action="addNews.php?phid=<?php echo $phid;?>">
					<div class="row700">
						<div class="row200">News Head Line<span class="required">*</span></div>
						<div class="row350"><input type="text" name="txtNews" size="25" maxlength="235" value="<?php echo $recds[0]["news_headline"];?>" class="textfield"/>					
						</div>
					</div>
					<div class="row700">
						<div class="row200">News<span class="required">*</span></div>
						<div class="row350"><textarea name="txtData" id="txtData" rows="5" cols="35" class="textfield"><?php echo $recds[0]["news_details"];?></textarea>	
						</div>
					</div>
					<?php if(isset($phid)) {?>
					<div class="row700">
						<div class="row200">&nbsp;</div>
						<div class="row350"><input type="submit" name="updateAccount" id="updateAccount" class="button" value="Update" /></div>
					</div>
					<?php }else {?>
					<div class="row700">
						<div class="row200">&nbsp;</div>
						<div class="row350"><input type="submit" name="submitAccount" id="submitAccount" class="button" value="Create" /></div>
					</div>
					<?php }?>
				</form>				
				<div class="clear"></div>				
			</div>			
		</fieldset>
	</div>
</div>
<?php include("footer.php");?>