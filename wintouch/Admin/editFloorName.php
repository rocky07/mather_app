<?php
ob_start();
include("autoload.php");
include("session.php");

$db		=	new Database_MySql();
$db->connect();

$obj	=	new Project();

$keyword= $_GET["project"];
$towerid= $_GET["id"];
$fid = $_GET["fid"];

if(!empty($fid)){
$recds = $obj->fetchFloorById($fid);
}
	
if(isset($_POST["submitAccount"])){
	
	if($obj->updateFloorname($_POST,$fid)){
		$msg1 = "Floor Name Updated successfully !";	
		header("Location:add_floors.php?project=$keyword&id=$towerid&msg=$msg1");
	    exit;		
	}else{
		$msg1=	$obj->errorMessage;
		header("Location:editFloorName.php?project=$keyword&id=$towerid&fid=$fid&msg1=$msg1");
	    exit;
	}
	

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
			<legend>Edit Floor Name</legend>
			<br />
			<div class="formBox">
				<form name="accountFrm" method="post" action="editFloorName.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>">
				<div class="row200"><span class="message"><?php echo $msg1;?></span></div>
								
				<div class="row700">
					<div class="row150">Floor Name<span class="required">*</span></div>
					<div class="row250"><input type="text" name="floor" id="floor" class="textfields" value="<?php echo $recds[0]["floor_name"];?>"/></div>
				</div>			
				
				<div class="row700">
					<div class="row150">&nbsp;</div>
					<div class="row250"><input type="submit" name="submitAccount" id="submitAccount" class="button" value="Update" /></div>
				</div>
		   
				</form>				
				<div class="clear"></div>
			</div>
		</fieldset>
		
	</div>
</div>  
</div>
<?php include("footer.php");?>