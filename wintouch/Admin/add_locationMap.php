<?php
ob_start();
include("autoload.php");
include("session.php");
 $db		=	new Database_MySql();
 $db->connect();

 $pid	=	$_GET["id"];
 $obj	=	new Project();
 
 $details=$obj->getLocationMap($pid);
 $records=$obj->getProjects();

 if(isset($_POST["addButton"])){
	$uploader	=	new Uploader("../uploads/project/");
	$uploader->setMaxSize(1);
	$uploader->setExtensions(array("jpg","png","jpeg","gif"));
	
	$veid=$_POST["project"];
		
	if($uploader->uploadFile("file")){
		$caption = $_POST["file1"];
		$imagepath	=	$uploader->getUploadName();
		$image=$obj->updateLocationMap($imagepath,$veid);
		if($image){
			@unlink("../uploads/project/".$image);
			$msg1 = "Map Uploaded successfully !";	
			header("Location:list_projects.php?msg1=$msg1");
			exit;		
		}else{
			$msg1	=	$obj->errorMessage;
			header("Location:list_projects.php?msg1=$msg1");
			exit;
		}
	}	
	
}

$msg=$_GET["msg1"];
$webpageTitle	=	"Upload Location Map";
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
					<legend>Upload Location Map</legend>
					<div class="row700">&nbsp;</div>
					<div class="row700 redText"><?php echo $msg1;?></div>
						
						<form name="frm_Continent" method="post" action="add_locationMap.php" enctype="multipart/form-data">
						<div class="row700">
							<div class="row200">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($i=0;$i<count($records);$i++){
								$keyword	=	$details[0]["id"];
								?>
									<option value="<?php echo $records[$i]["id"];?>" <?php if($keyword==$records[$i]["id"]){?> selected="selected"<?php }?>><?php echo $records[$i]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
						<div class="row700">
							<div class="row200">Location Map<span class="required">*</span></div>
							<div class="row350"><input type="file" name="file" id="file" value="<?php echo $details[0]["location_map"];?>" /></div>		   					
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