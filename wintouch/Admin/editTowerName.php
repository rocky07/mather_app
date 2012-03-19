<?php
ob_start();
include("autoload.php");
include("session.php");

$db		=	new Database_MySql();
$db->connect();

	$obj	=	new Project();

$keyword= $_GET["project"];

$id = $_GET["id"];
if(!empty($id)){
$recds = $obj->fetchTowerById($id);
}
	
if(isset($_POST["submitAccount"])){
	
	if($obj->updateTowername($_POST,$id)){
		$msg1 = "Tower Name Updated successfully !";	
		header("Location:availabilityChart.php?project=$keyword&msg=$msg1");
	    exit;		
	}else{
		$msg1=	$obj->errorMessage;
		header("Location:editTowerName.php?project=$keyword&id=$id&msg1=$msg1");
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
			<legend>Edit Tower Name</legend>
			<br />
			<div class="formBox">
				<form name="accountFrm" method="post" action="editTowerName.php?project=<?php echo $keyword;?>&id=<?php echo $id;?>">
				<div class="row200"><span class="message"><?php echo $msg1;?></span></div>
								
				<div class="row700">
					<div class="row150">Tower Name<span class="required">*</span></div>
					<div class="row250"><input type="text" name="tower" id="tower" class="textfields" value="<?php echo $recds[0]["tower_name"];?>"/></div>
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