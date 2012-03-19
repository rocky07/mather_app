<?php
ob_start();
include("autoload.php");
include("session.php");
 $db		=	new Database_MySql();
 $db->connect();

 $id	=	$_GET["id"];
 $obj	=	new Project();
 
 $floordetails=$obj->getfloortypeDetails($id);
 $records=$obj->getProjects();

if(isset($_POST["addButton"]) && $_GET["action"]!="update"){

	$uploader	=	new Uploader("../uploads/floor_type/");
	$uploader->setMaxSize(1);
	$uploader->setExtensions(array("jpg","png","jpeg","gif"));
	
	if($uploader->uploadFile("file")){
	
		$imagepath	=	$uploader->getUploadName();
	
		if($obj->addfloortype($_POST,$imagepath)){
			$msg = "Added successfully !";			
		}else{
			$msg=	$obj->errorMessage;
		}
	}
	header("Location:add_floortype.php?msg=$msg");
	exit;
	
}else if(isset($_POST["addButton"]) && $_GET["action"]=="update"){

	$uploader	=	new Uploader("../uploads/floor_type/");
	$uploader->setMaxSize(1);
	$uploader->setExtensions(array("jpg","png","jpeg","gif"));
	
	$veid=$_POST["id"];
	
	if($uploader->uploadFile("file")){	
		$imagepath	=	$uploader->getUploadName();
	
		if($image=$obj->updateimage($imagepath,$veid)){
			@unlink("../uploads/floor_type/".$image);
			$msg = "Image Uploaded successfully !";			
		}else{
			$msg=	$obj->errorMessage;
		}
	}
	
	if($pid=$obj->updatefloortype($_POST,$veid)){
		$msg	=	"Updated Successfully !";
	}else{
		$msg=	"Failed !";
	}		
	header("Location:add_floortype.php?msg=$msg&id=$veid");
	exit;
	
}

$msg=$_GET["msg"];
$webpageTitle	=	"Floor Type";
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
					<legend>Floor Type</legend>
					<div class="row700">&nbsp;</div>
					<div class="row700 redText"><?php echo $msg;?></div>
						
						<?php if($id){?>
						<form name="frm_Continent" method="post" action="add_floortype.php?action=update" enctype="multipart/form-data">
						<?php }else{?>
						<form name="frm_Continent" method="post" action="add_floortype.php" enctype="multipart/form-data">
						<?php }?>
						<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
						<div class="row700">
							<div class="row200">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($i=0;$i<count($records);$i++){
								$keyword	=	$floordetails[0]["project_id"];
								?>
									<option value="<?php echo $records[$i]["id"];?>" <?php if($keyword==$records[$i]["id"]){?> selected="selected"<?php }?>><?php echo $records[$i]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
						<div class="row700">
							<div class="row200">Floor Type Name<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtName" id="txtName" class="textfield" size="25" value="<?php echo $floordetails[0]["floor_type_name"];?>" /></div>
						</div>
						<div class="row700">
							<div class="row200">Square Feet<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtSqfeet" id="txtSqfeet" class="textfield" size="25" value="<?php echo $floordetails[0]["square_feet"];?>" /></div>
						</div>						
						<div class="row700">
							<div class="row200">Floor Type Image <span class="required">*</span></div>
							<div class="row350"><input type="file" name="file" id="file" value="<?php echo $floordetails[0]["Image_name"];?>" /></div>
						</div>									   					
						<div class="row700">
							<div class="row200">&nbsp;</div>
							<div class="row250"><input type="submit" name="addButton" id="addButton" class="button" value="Submit" /></div>
						</div>
						</form>	
				</fieldset>
			</div>
		</div>
	</div>
<?php include("footer.php");?>