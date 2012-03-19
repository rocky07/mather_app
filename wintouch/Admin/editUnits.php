<?php
ob_start();
include("autoload.php");
include("session.php");

	$db      =     new Database_MySql();
	$db->connect();
	
	$obj	=	new Project();

	$keyword= $_GET["project"];
    $towerid =$_GET["id"]; 	
	$fid =$_GET["fid"]; 
    $uid =$_GET["uid"]; 
	
	$prjname = $obj->getProjectName($keyword);
	$fname = $obj->getFloorName($fid);
	
	$ftype= $obj->getFloorType($keyword);
	$document= $obj->getDocuments($keyword);
	
	$tmp = $obj->getUnitsById($uid);
	
	
    if(isset($_POST["addButton"])){
	
			if($obj->updateUnitName($_POST,$fid,$uid)){
				$msg	=	"Updated Successfully !";
				header("Location:add_units.php?project=$keyword&id=$towerid&fid=$fid&msg=$msg");
		        exit;
			}else{
				$msg	=	$obj->errorMessage;
				header("Location:editUnits.php?project=$keyword&id=$towerid&fid=$fid&uid=$uid&msg=$msg");
		        exit;
		    }
		
	}
	
	$msg	=$_GET["msg"];
	$pageName	=	"Edit Units";	 	   
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
			<legend>Edit Units</legend>
			<div class="formBox">
			<div class="row200"><span class="redText"><?php echo $msg; ?></span></div>
			
				<form name="frm_Cms" method="post" action="editUnits.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&uid=<?php echo $uid;?>">	
				
				<input type="hidden" name="project" id="project" value="<?php echo $keyword;?>" />
				<input type="hidden" name="id" id="id" value="<?php echo $towerid;?>" />
				<input type="hidden" name="fid" id="fid" value="<?php echo $fid;?>" />
				<input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>" />
				
					<div class="row700">
						<div class="row200">Project Name :</div>						
						<div class="row350"><?php echo $prjname[0]["name"];?></div>
					</div>
				
					<div class="row700">
						<div class="row200">Floor Name :</div>						
						<div class="row350"><?php echo $fname[0]["floor_name"];?></div>
					</div>		
				 
          			<div class="row700">
					   <div class="row200">Unit Name<span class="required">*</span></div>
					   <div class="row350"><input type="text" name="unit" id="unit" value="<?php echo $tmp[0]["unit_name"];?>"/></div>
					</div> 
					
					<div class="row700">
					   <div class="row200">Floor Type</div>
					   <div class="row350"><select name="floortype" id="floortype">
					   <option value="">Select</option>
					   <?php for($j=0;$j<count($ftype);$j++){?>
					   <option value="<?php echo $ftype[$j]["id"];?>" <?php if($tmp[0]["floor_type_id"]==$ftype[$j]["id"]){?> selected="selected" <?php }?> ><?php echo $ftype[$j]["floor_type_name"];?></option>
					   <?php }?>
					   </select></div>
					</div> 
					
					<div class="row700">
					   <div class="row200">Status<span class="required">*</span></div>
					   <div class="row350"><select name="status" id="status">
					   <option value="">Select</option>
					   <option value="1" <?php if($tmp[0]["status"]==1){?> selected="selected" <?php }?> >Sold</option>
					   <option value="2" <?php if($tmp[0]["status"]==2){?> selected="selected" <?php }?> >Vacant</option>
					   <option value="3" <?php if($tmp[0]["status"]==3){?> selected="selected" <?php }?> >Other</option>
					   </select></div>
					</div>
					
					<div class="row700">
					   <div class="row200">Square Feet</div>
					   <div class="row350"><input type="text" name="sqfeet" id="sqfeet" value="<?php echo $tmp[0]["square_feet"];?>"/></div>
					</div> 
					 
					<div class="row700">
					   <div class="row200">No of Rooms</div>
					   <div class="row350"><input type="text" name="rooms" id="rooms" value="<?php echo $tmp[0]["noofrooms"];?>"/></div>
					</div>
					
					<div class="row700">
					   <div class="row200">Select Document</div>
					   <div class="row350"><select name="docu" id="docu">
					   <option value="">Select</option>
					   <?php for($k=0;$k<count($document);$k++){?>
					   <option value="<?php echo $document[$k]["id"];?>" <?php if($tmp[0]["document_id"]==$document[$k]["id"]){?> selected="selected" <?php }?> ><?php echo $document[$k]["caption"];?></option>
					   <?php }?>
					   </select></div>
					</div>
					
					<div class="row700">
					   <div class="row200"></div>
					   <div class="row350"><input type="submit" name="addButton" id="addButton" value="Update"/></div>
			</div> 
				</form>
			</div>
			</fieldset>			
		</div>
	</div>
	

<?php include("footer.php");?>