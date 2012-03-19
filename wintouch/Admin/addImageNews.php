<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();
/*
  Update user account basic details - for loggined user 
*/
$auth	=	new Authentication();

 $eid	=	$_GET["eid"];

  if(isset($_POST["submitAccount"])){                  
			
				$uploader	=	new Uploader("../uploads/news_images/");
		        $uploader->setMaxSize(5);
		        $uploader->setExtensions(array("jpg","png","jpeg"));
		         if($uploader->uploadFile("txtFilename"))
	     	       {
		            $imagepath	=	$uploader->getUploadName();	
				     if($auth->updateimage($imagepath,$eid)){
					 $msg1 = "Image added successfully !";
					 }
				  }else{ 		
		 			$msg1=$uploader->getMessage();
					}
		header("Location:addImageNews.php?eid=$eid&msg1=$msg1");
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
					<legend>News Images</legend>					
					<div class="row700 redText"><?php echo $msg;?></div>
					
					News Images -  <a href="list_newsimages.php?eid=<?php echo $eid;?>">Back To Listing</a>
			
				<form name="eventFrm" method="post" action="addImageNews.php?eid=<?php echo $eid;?>" enctype="multipart/form-data">
				<div class="row700"><span class="message"><?php echo $msg1;?></span></div>						
				
				<div class="row700">
					<div class="row150">Image </div>
				    <div class="row450"><input type="file" name="txtFilename" id="txtFilename" /></div>
				</div>
				
				<div class="row700">
					<div class="row150">&nbsp;</div>
					<div class="row250"><input type="submit" name="submitAccount" id="submitAccount" class="button" value="Add" /></div>
				</div>				
				</form>				
			</div>		
	</div>
</div>
<?php include("footer.php");?>