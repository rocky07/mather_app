<?php
ob_start();
include("autoload.php");
include("session.php");
include_once("js/fckeditor/fckeditor.php") ;
$db		=	new Database_MySql();
$db->connect();

$id=$_GET["vid"];
echo "";

$obj	=	new Project();

$dist = $obj->fetchDistricts();

$tmplist	=	$obj->getProjectDetails($id);

if(isset($_POST["addButton"]) && $_GET["action"]!="update"){	

    $uploader	=	new Uploader("../uploads/project_images/");
	$uploader->setMaxSize(5);
	$uploader->setExtensions(array("jpg","png","jpeg","bmp","gif"));
	
	
	//$uploader1	=	new Uploader("../uploads/project_logo/");
//	$uploader1->setMaxSize(5);
//	$uploader1->setExtensions(array("jpg","png","jpeg","bmp","gif"));
//	
	
	if($uploader->uploadFile("txtFilename"))
	{
    $path	=	$uploader->getUploadName();		
	
	//if($uploader1->uploadFile("txtlogo"))
//	{
//    $logopath	=	$uploader1->getUploadName();	
     
	if($obj->addProject($_POST,$path,$logopath)){
		$msg1 = "Added successfully !";			
	}
//	}
	}else{
		$msg1=	$obj->errorMessage;
	}
	header("Location:add_project.php?msg1=$msg1");
	exit;
	
}else if(isset($_POST["addButton"]) && $_GET["action"]=="update"){
	$veid=$_POST["id"];
	$obj->setPId($veid);
	
	$imageFile	=	$_FILES['txtFilename']['name'];
	$logoFile	=	$_FILES['txtlogo']['name'];
	
	  if($imageFile)
			{
				$uploader	=	new Uploader("../uploads/project_images/");		
				$uploader->setMaxSize(5);
				$uploader->setExtensions(array("jpg","png","gif","jpeg"));		
				if($uploader->uploadFile("txtFilename"))
				{
				$imagepath	=	$uploader->getUploadName();				
				$extension	=	$uploader->getExtension($appimagepath);						 
				$pevName	=	$obj->getPrevimage($veid);
					if(!empty($pevName))
						{
								unlink("../uploads/project_images/{$pevName}");
						}
				}
				
				}
			else
				{
					 $imagepath	=	$obj->getPrevimage($veid);	
				}
				
				
							
			if($logoFile)
			{
				$uploader	=	new Uploader("../uploads/project_logo/");		
				$uploader->setMaxSize(5);
				$uploader->setExtensions(array("jpg","png","gif","jpeg"));		
				if($uploader->uploadFile("txtlogo"))
				{
				$ipath	=	$uploader->getUploadName();									 
				$pevName	=	$obj->getPrevimage1($veid);
					if(!empty($pevName))
						{
								unlink("../uploads/project_logo/{$pevName}");
						}
				}
				
				}
			else
				{
					 $ipath	=	$obj->getPrevimage1($veid);	
				}				
						
	if($obj->updateProject($_POST,$imagepath,$ipath)){
		$msg1 = "Updated successfully !";			
	}else{
		$msg1=	$obj->errorMessage;
	}
	header("Location:add_project.php?vid=$veid&msg1=$msg1");
	exit;	
}


$webpageTitle	=	"Project";

$msg	=$_GET["msg1"];
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
					<legend>Project</legend>
					<div class="row700">&nbsp;</div>
					
					<div class="row700 redText"><?php echo $msg;?></div>
						<?php if($id){?>
						<form name="frm_Continent" method="post" action="add_project.php?action=update"  enctype="multipart/form-data">
						<?php }else{?>
						<form name="frm_Continent" method="post" action="add_project.php" enctype="multipart/form-data">
						<?php }?>
						
						<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
						<?php if(!empty($tmplist[0]["location_map"])){?>
						<div class="row700">
							<div class="row200">Update Location Map</div>
							<div class="row150">
								<a href="add_locationMap.php?id=<?php echo $id;?>">Update Map</a>
							</div>
						</div>
						<?php }?>
						<div class="row700">
							<div class="row200">Project Name<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtName" id="txtName" class="textfield" size="25" value="<?php echo $tmplist[0]["name"];?>"/></div>
						</div>							
										
						<div class="row700">
							<div class="row200">Location<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtText" id="txtText" class="textfield" size="25" value="<?php echo $tmplist[0]["location"];?>"/>
							</div>
						</div>
						
						<div class="row700">
							<div class="row200">District<span class="required">*</span></div>
							<div class="row350"><select name="district" id="district">
							<?php for($r=0;$r<count($dist);$r++){?>
							<option value="<?php echo $dist[$r]["id"];?>" <?php if($tmplist[0]["district_id"]==$dist[$r]["id"]){ ?> selected="selected" <?php }?> ><?php echo $dist[$r]["district_name"];?></option>
							<?php }?>
							</select></div>
						</div>	
						
						<div class="row700">
							<div class="row200">Project Category<span class="required">*</span></div>
							<div class="row350"><select name="cat" id="cat">						
							<option value="Apartment" <?php if($tmplist[0]["category"]=="Apartment"){?> selected="selected" <?php }?>>Apartment</option>
						    <option value="Villa" <?php if($tmplist[0]["category"]=="Villa"){?> selected="selected" <?php }?>>Villa</option>
							<option value="Apartment/Villa" <?php if($tmplist[0]["category"]=="Apartment/Villa"){?> selected="selected" <?php }?>>Apartment/Villa</option>
							</select></div>
						</div>	
						
						
						
						<div class="row700">
							<div class="row200">Project Type<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtType" id="txtType" class="textfield" size="25" value="<?php echo $tmplist[0]["project_type"];?>"/>		
							</div>
						</div>
						<div class="row700">
							<div class="row200">Land Area</div>
							<div class="row350"><input type="text" name="txtLand" id="txtLand" class="textfield" size="25" value="<?php echo $tmplist[0]["land_area"];?>"/>
							</div>
						</div>
						<div class="row700">
							<div class="row200">No. of. Units<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtfloors" id="txtfloors" class="textfield" size="25" value="<?php echo $tmplist[0]["no_of_floors"];?>"/>
							</div>
						</div>
						<div class="row700">
							<div class="row200">Unit Type<span class="required">*</span></div>
							<div class="row350"><input type="text" name="txtUni" id="txtUni" class="textfield" size="25" value="<?php echo $tmplist[0]["unit_type"];?>"/>
							</div>
						</div>
						<div class="row700">
							<div class="row200">Project Status<span class="required">*</span></div>
							<div class="row350"><select name="txtTStatus" id="txtTStatus" style="width:187px;">
								<option value="">Select Status</option>
								<option value="New Project" <?php if($tmplist[0]["project_status"]=="New Project"){?> selected="selected" <?php }?>>New Project </option>
								<option value="Ongoing" <?php if($tmplist[0]["project_status"]=="Ongoing"){?> selected="selected" <?php }?>>Ongoing</option>
								<option value="Completed" <?php if($tmplist[0]["project_status"]=="Completed"){?> selected="selected" <?php }?>>Completed</option>
								</select>		
							</div>
						</div>
						<div class="row700">
							<div class="row200">Current Status</div>
							<div class="row350"><select name="txtCStatus" id="txtCStatus" style="width:187px;">
								<option value="">Select Status</option>
								<option value="Ready to occupy" <?php if($tmplist[0]["current_status"]=="Ready to occupy"){?> selected="selected" <?php }?>>Ready to occupy</option>
								<option value="Sold Out" <?php if($tmplist[0]["current_status"]=="Sold Out"){?> selected="selected" <?php }?>>Sold Out</option>
								</select>
							</div>
						</div>
						
						<div class="row700">
							 <div class="row200">Short Summary<span class="required">*</span></div>
						     <div class="row350"><textarea name="txtshort" id="txtshort"><?php echo $tmplist[0]["short_summary"];?></textarea></div>
						</div>	 
							
						<div class="row700">
							<div class="row150">Summary</div>
							<div class="row450">
							
						 <?php
									$oFCKeditor = new FCKeditor('txtSummary') ;
									$oFCKeditor->BasePath = 'js/fckeditor/' ;								
									$oFCKeditor->Value = html_entity_decode($tmplist[0]["summary"]);
									$oFCKeditor->Height = 300 ;
									$oFCKeditor->Width =  400 ;
									$oFCKeditor->Create() ;
						 ?>					
				 						
							</div>
					</div>	
						<div class="row700">
							<div class="row150">Specification</div>
							<div class="row450">
							
						 <?php
									$oFCKeditor = new FCKeditor('txtSpec') ;
									$oFCKeditor->BasePath = 'js/fckeditor/' ;								
									$oFCKeditor->Value = html_entity_decode($tmplist[0]["specification"]);
									$oFCKeditor->Height = 300 ;
									$oFCKeditor->Width =  400 ;
									$oFCKeditor->Create() ;
						 ?>	
						
						</div>
						</div>	
						<div class="row700">
							<div class="row150">Amenities</div>
							<div class="row450">
						 <?php
									$oFCKeditor = new FCKeditor('txtAmeni') ;
									$oFCKeditor->BasePath = 'js/fckeditor/' ;								
									$oFCKeditor->Value = html_entity_decode($tmplist[0]["amenities"]);
									$oFCKeditor->Height = 300 ;
									$oFCKeditor->Width =  400 ;
									$oFCKeditor->Create() ;
						 ?>	
					 	
							</div>
						</div>
						
						<div class="row700">
							<div class="row200">Project Image<span class="required">*</span></div>
							<div class="row350"><input type="file" name="txtFilename" id="txtFilename" /></div>
				        </div>
						
						<!--<div class="row700">
							<div class="row200">Project Logo<span class="required">*</span></div>
							<div class="row350"><input type="file" name="txtlogo" id="txtlogo" /></div>
				        </div>-->
						
						<div class="row700">
							<div class="row200">Latitude<span class="required">*</span></div>
							<div class="row350"><input type="text" name="latitude" id="latitude" value="<?php echo $tmplist[0]["latitude"];?>" /></div>
				        </div>
						
						<div class="row700">
							<div class="row200">Longitude<span class="required">*</span></div>
							<div class="row350"><input type="text" name="longitude" id="longitude" value="<?php echo $tmplist[0]["longitude"];?>" /></div>
				        </div>
						
									
						<div class="row700">
							<div class="row200">&nbsp;</div>
							<div class="row350"><input type="submit" name="addButton" id="addButton" class="button" value="Submit" /></div>
						</div>
						</form>
					
						<div class="row700">&nbsp;</div>
				</fieldset>
			</div>
		</div>
	</div>
	
<?php include("footer.php");?>