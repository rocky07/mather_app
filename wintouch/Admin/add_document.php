<?php
ob_start();
include("autoload.php");
include("session.php");


$db		=	new Database_MySql();
$db->connect();


$obj	=	new Project();
$records=$obj->getProjects();

if(isset($_POST["addButton"])){	

    $uploader	=	new Uploader("../uploads/documents/");
	$uploader->setMaxSize(5);
	$uploader->setExtensions(array("doc","docx","txt","xls","xlsx","pdf","html"));
	
	if($uploader->uploadFile("txtFilename"))
	{
    $path	=	$uploader->getUploadName();	
     
	if($obj->addDocument($_POST,$path)){
		$msg1 = "Added successfully !";			
	}	
	}else{
		$msg1=	$obj->errorMessage;
	}
	header("Location:add_document.php?msg1=$msg1");
	exit;
	
}

$webpageTitle	=	"Add Document";

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
					<legend>Add Document</legend>
					<div class="row700">&nbsp;</div>					
					<div class="row700 redText"><?php echo $msg;?></div>
				
						<form name="frm_Continent" method="post" action="add_document.php"  enctype="multipart/form-data">
						
						<div class="row700">
							<div class="row200">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($i=0;$i<count($records);$i++){
								$keyword	=	$tmplist[0]["project_id"];
								?>
									<option value="<?php echo $records[$i]["id"];?>" <?php if($keyword==$records[$i]["id"]){?> selected="selected"<?php }?>><?php echo $records[$i]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
					
						<div class="row700">
							<div class="row200">Caption<span class="required">*</span></div>
							<div class="row350"><input type="text" name="caption" id="caption" class="textfield" size="25" value="<?php echo $tmplist[0]["caption"];?>"/></div>
						</div>							
										
			
						<div class="row700">
							<div class="row200">Document<span class="required">*</span></div>
							<div class="row350"><input type="file" name="txtFilename" id="txtFilename" /></div>
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