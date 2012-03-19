<?php
ob_start();
session_start();
include("autoload.php");
include("session.php");
	$db		=	new Database_MySql();
	$db->connect();
	
	$obj	=	new Project();
	$records=$obj->getProjects();
	
	$limit	=	1;
		
	$veid=$_POST["project"];
		
	function cropImage($imagepath){
		 $save = "../uploads/gallery/" . $imagepath;
		$tft = new easyImageEdit();
		$tft->load($save);
		if ($tft->getWidth() > 800)		
			$tft->resizeToWidth(800);
		$tft->save($save);
	}
		
	if(isset($_POST["addButton"]))
	{
		 $uploader	=	new Uploader("../uploads/gallery/");
		 $uploader->setMaxSize(2);
		 $uploader->setExtensions(array("jpg","png","gif","jpeg"));
		
		 for($i=0;$i<$limit;$i++)
		 {
			if($uploader->uploadFile('txtImage'.$i)){
				$imagepath	=	$uploader->getUploadName();
		//		cropImage($imagepath);//crop image &save
				$caption	=	$_POST["txtCaption".$i];
				$obj->addImage($imagepath,$caption,$veid);
			}
		 }
		header("Location:addPhotos.php?msg=Photos uploaded");
		exit;
	}	
	
$msg	=$_GET["msg"]; 	
$webpageTitle	=	"Add Photos";
?>

<?php include("header.php");?>
<div id="page">
	<div id="pageLeft">
		<?php include("menu.php");?>		
	</div>
	<div id="pageRight">
		<div class="content">&nbsp;
		
			<fieldset id="main">
			<legend>ADD Photos</legend>
			
			<div class="formBox">
			<form name="frm_themes" action="addPhotos.php" method="post" enctype="multipart/form-data">
					<div class="row700"><span class="redText"><?php echo $msg;?></span></div> 
						
						<div class="row700">
							<div class="row100">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($j=0;$j<count($records);$j++){
								$keyword	=	$details[0]["id"];
								?>
									<option value="<?php echo $records[$j]["id"];?>" <?php if($keyword==$records[$j]["id"]){?> selected="selected"<?php }?>><?php echo $records[$j]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
						<?php for($i=0;$i<$limit;$i++){?>
						<div class="row700">
							<div class="row100">Upload Photo<span class="required">*</span></div>
							<div class="row250"><input type="file" name="txtImage<?php echo $i;?>" id="txtImage<?php echo $i;?>" /></div>
							<div class="row100">Caption</div>
							<div class="row180"><input type="text" name="txtCaption<?php echo $i;?>" id="txtCaption<?php echo $i;?>" /></div>
						</div>
						<?php }?>
						<div class="row700">
							<div class="row150">&nbsp;</div>
							<div class="row300"><input type="submit" name="addButton" id="addButton" class="button" value="Upload" /></div>
						</div>
						<div class="row700"><span class="required">*</span>Max Photo Size(1 MB)</div>
					</form>
			</div>
			</fieldset>
		</div>
	</div>
<script type="text/javascript">

</script>
	
<?php 
include("footer.php");
?>