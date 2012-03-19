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
	
	$limit	=15;
	$start	=$_GET["start"];
	if(empty($start)){
		$start	=0;
    }
	
	$prjname = $obj->getProjectName($keyword);
	$fname = $obj->getFloorName($fid);
	
	$ftype= $obj->getFloorType($keyword);
	$document= $obj->getDocuments($keyword);
	
	
	if(!empty($keyword)){
	$tmplist = $obj->fetchUnit($keyword,$towerid,$fid,$start,$limit);
    $size =count($tmplist);
	}
	
	if($_GET["action"]=="del"){
	    $uid		=	$_GET["uid"];
		$fid		=	$_GET["fid"];
	    $towerid =$_GET["id"]; 
		$keyword= $_GET["project"];
		$tt	=	$obj->deleteUnit($uid);		
		header("Location:add_units.php?project=$keyword&id=$towerid&fid=$fid&msg=Deleted successfully");
		exit;
   }
	
	
	if(isset($_POST["addButton"])){
		//$lett	=	"A";//remove
	//	for($k=0;$k<4;$k++){//remove  it
			$name	=	$_POST["unit"].$lett;
			if($obj->addUnitName($_POST,$name,$keyword,$towerid,$fid)){
				$msg	=	"Added Successfully !";
			}else{
				$msg	=	$obj->errorMessage;
		    }
			//$lett	=	chr(ord($lett)+1);
			
			
		//}
		header("Location:add_units.php?project=$keyword&id=$towerid&fid=$fid&msg=$msg");
		exit;
	}
	
	$msg	=$_GET["msg"];
	$pageName	=	"Add Units";	 	   
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
			<legend>Add Units</legend>
			<div class="formBox">
			<div class="row200"><span class="redText"><?php echo $msg; ?></span></div>
			
			<div class="row200" align="right"><a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>">Back To Add Floors</a></div>
			
				<form name="frm_Cms" method="post" action="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>">	
				
				<input type="hidden" name="project" id="project" value="<?php echo $keyword;?>" />
				<input type="hidden" name="id" id="id" value="<?php echo $towerid;?>" />
				<input type="hidden" name="fid" id="fid" value="<?php echo $fid;?>" />
				
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
					   <div class="row350"><input type="text" name="unit" id="unit"/></div>
					</div> 
					
					<div class="row700">
					   <div class="row200">Floor Type</div>
					   <div class="row350"><select name="floortype" id="floortype">
					   <option value="">Select</option>
					   <?php for($j=0;$j<count($ftype);$j++){?>
					   <option value="<?php echo $ftype[$j]["id"];?>"><?php echo $ftype[$j]["floor_type_name"];?></option>
					   <?php }?>
					   </select></div>
					</div> 
					
					<div class="row700">
					   <div class="row200">Status<span class="required">*</span></div>
					   <div class="row350"><select name="status" id="status">
					   <option value="">Select</option>
					   <option value="1">Sold</option>
					   <option value="2">Vacant</option>
					   <option value="3">Other</option>
					   </select></div>
					</div>
					
					<div class="row700">
					   <div class="row200">Square Feet</div>
					   <div class="row350"><input type="text" name="sqfeet" id="sqfeet"/></div>
					</div> 
					 
					<div class="row700">
					   <div class="row200">No of Rooms</div>
					   <div class="row350"><input type="text" name="rooms" id="rooms"/></div>
					</div>
					
					<div class="row700">
					   <div class="row200">Select Document</div>
					   <div class="row350"><select name="docu" id="docu">
					   <option value="">Select</option>
					   <?php for($k=0;$k<count($document);$k++){?>
					   <option value="<?php echo $document[$k]["id"];?>"><?php echo $document[$k]["caption"];?></option>
					   <?php }?>
					   </select></div>
					</div>
					
					<div class="row700">
					   <div class="row200"></div>
					   <div class="row350"><input type="submit" name="addButton" id="addButton" value="Add"/></div>
			</div> 
				</form>
			</div>
			</fieldset>
			
			
			<!--listing-->
			
			
				 <?php if(count($tmplist)!="") {?>	
         <ul class="listing">					
				<li class="title">
				    <div class="row50">SI No</div>		
					<div class="row100">Unit Name</div>	
					<div class="row100">Square feet</div>	
					<div class="row50">Status</div>
					<div class="row100">No of Rooms</div>
					<div class="row50">Floor Type</div>	
					<div class="row100">Document</div>							
				</li>				
				<?php 
				$i	=	0;										
				while($i < $size) {
				?>						
				<li>
				    <div class="row50"><?php echo $i+1+$start;?></div>	
					<div class="row100"><?php echo $tmplist[$i]["unit_name"];?></div>	
					<div class="row100"><?php echo $tmplist[$i]["square_feet"];?></div>	
					<div class="row50"><?php if($tmplist[$i]["status"]==1){ echo "Sold"; }else if($tmplist[$i]["status"]==2){ echo "Vacant";} else { echo "Other";} ?> </div>	
					<div class="row100"><?php echo $tmplist[$i]["noofrooms"];?></div>	
					<div class="row50">
					<?php echo $tt= $obj->fetchfloortype($tmplist[$i]["floor_type_id"]);?>
					</div>						
				    <div class="row100">
					<?php $dd= $obj->fetchDocumentById($tmplist[$i]["document_id"]);?>
					
					<a target="_blank" href="../uploads/documents/<?php echo $dd[0]["document_name"];?>"><?php echo $dd[0]["caption"];?></a>
					
					</div>	
					<div class="row50"><a href="editUnits.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&uid=<?php echo $tmplist[$i]["id"];?>" >Edit</a></div>
					<div class="row50"><a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&uid=<?php echo $tmplist[$i]["id"];?>&action=del" onclick="return askDelete();" >Delete</a></div>
					
				</li>			
				<?php
				$i++;
				}?>	
							
				<li class="page">
				<!--<div class="row50">Pages : </div>-->
				<?php
					$cnt=$obj->totalRec/$limit;
					$cnt=ceil($cnt);
					$current	=	($start/$limit)+1;						
					$pg	=	new Pages();
					$pages	=	$pg->getPages($current,$cnt,$limit);
					$first	=	$pg->getFirst($cnt,$limit);
					$last	=	$pg->getLast($cnt,$limit);
					$prev	=	$pg->getPrev($current,$cnt,$limit);
					$next	=	$pg->getNext($current,$cnt,$limit);
				?>
				<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $first;?>" class="nav">&laquo;&laquo;First</a>
				<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $prev;?>" class="nav">&laquo;Prev</a>
				<?php
					for($j=0;$j<count($pages);$j++)
					{
						$star=($pages[$j]-1)*$limit;
						if($start==$star)
						{?>
						<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $star;?>" class="visited"><?php echo $pages[$j];?></a>
				<?php }else{?>
						<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $star;?>" ><?php echo $pages[$j];?></a>
				<?php }
					}
				?>
				<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $next;?>" class="nav">Next&raquo;</a>
				<a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $fid;?>&start=<?php echo $last;?>" class="nav">Last&raquo;&raquo;</a>
				<div class="clear"></div>				
			</li>
		</ul>
		<?php }?>
		
		<!--end of listing-->
			
			
		</div>
	</div>
	
<script type="text/javascript">
function askDelete(){
	if(confirm("Do you want to delete this item ? click OK to continue, CANCEL to exit")){
		return true;
	}else{
		return false;
	}
}
</script> 	
<?php include("footer.php");?>