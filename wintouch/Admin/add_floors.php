<?php
ob_start();
include("autoload.php");
include("session.php");

	$db      =     new Database_MySql();
	$db->connect();
	
	$obj	=	new Project();

	$keyword= $_GET["project"];

    $towerid =$_GET["id"]; 
	
	$limit	=15;
	$start	=$_GET["start"];
	if(empty($start)){
		$start	=0;
    }
	
	$prjname = $obj->getProjectName($keyword);
	
	if(!empty($keyword)){
	$tmplist = $obj->fetchFloor($keyword,$towerid,$start,$limit);
    $size =count($tmplist);
	}
	
	if($_GET["action"]=="del"){
		$fid		=	$_GET["fid"];
	    $towerid =$_GET["id"]; 
		$keyword= $_GET["project"];
		$tt	=	$obj->deleteFloor($fid);		
		header("Location:add_floors.php?project=$keyword&id=$towerid&msg=Deleted successfully");
		exit;
   }
	
	
	if(isset($_POST["addButton"])){
	
			if($obj->addFloorName($_POST,$keyword,$towerid)){
				$msg	=	"Added Successfully !";
			}else{
				$msg	=	$obj->errorMessage;
		    }
		header("Location:add_floors.php?project=$keyword&id=$towerid&msg=$msg");
		exit;
	}
	
	$msg	=$_GET["msg"];
	$pageName	=	"Add Floors";	 	   
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
			<legend>Add Floors</legend>
			<div class="formBox">
			<div class="row200"><span class="redText"><?php echo $msg; ?></span></div>
			
				<form name="frm_Cms" method="post" action="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>">	
				
				<input type="hidden" name="project" id="project" value="<?php echo $keyword;?>" />
				<input type="hidden" name="id" id="id" value="<?php echo $towerid;?>" />
				
					<div class="row700">
						<div class="row200">Project Name :</div>						
						<div class="row350"><?php echo $prjname[0]["name"];?></div>
					</div>	
			
          			<div class="row700">
					   <div class="row200">Floor Name<span class="required">*</span></div>
					   <div class="row350"><input type="text" name="floor" id="floor"/></div>
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
				    <div class="row150">SI No</div>		
					<div class="row150">Floor Name</div>								
				</li>				
				<?php 
				$i	=	0;										
				while($i < $size) {
				?>						
				<li>
				    <div class="row150"><?php echo $i+1+$start;?></div>	
					<div class="row150"><?php echo $tmplist[$i]["floor_name"];?></div>		
					
					<div class="row150"><a href="add_units.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $tmplist[$i]["id"];?>" >Add Units</a></div>
								
					<div class="row50"><a href="editFloorName.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $tmplist[$i]["id"];?>" >Edit</a></div>
					<div class="row50"><a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&fid=<?php echo $tmplist[$i]["id"];?>&action=del" onclick="return askDelete();" >Delete</a></div>
					
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
				<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $first;?>" class="nav">&laquo;&laquo;First</a>
				<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $prev;?>" class="nav">&laquo;Prev</a>
				<?php
					for($j=0;$j<count($pages);$j++)
					{
						$star=($pages[$j]-1)*$limit;
						if($start==$star)
						{?>
						<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $star;?>" class="visited"><?php echo $pages[$j];?></a>
				<?php }else{?>
						<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $star;?>" ><?php echo $pages[$j];?></a>
				<?php }
					}
				?>
				<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $next;?>" class="nav">Next&raquo;</a>
				<a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $towerid;?>&start=<?php echo $last;?>" class="nav">Last&raquo;&raquo;</a>
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