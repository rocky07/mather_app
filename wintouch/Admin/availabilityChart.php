<?php
ob_start();
include("autoload.php");
include("session.php");

	$db      =     new Database_MySql();
	$db->connect();
	
	$obj	=	new Project();
	$records=$obj->getProjects();
	
	
	$keyword= $_POST["project"];
	
	if(empty($keyword)){
	$keyword= $_GET["project"];
	}
	
	$limit	=15;
	$start	=$_GET["start"];
	if(empty($start)){
		$start	=0;
    }
	
	if(!empty($keyword)){
	$tmplist = $obj->fetchTower($keyword,$start,$limit);
    $size =count($tmplist);
	}
	
	if($_GET["action"]=="del"){
		$id		=	$_GET["id"];
		$keyword= $_GET["project"];
		$tt	=	$obj->deleteTower($id);		
		header("Location:availabilityChart.php?project=$keyword&msg=Deleted successfully");
		exit;
   }
	
	
	if(isset($_POST["addButton"])){
	
			if($obj->addTowerName($_POST,$keyword)){
				$msg	=	"Added Successfully !";
			}else{
				$msg	=	$obj->errorMessage;
		    }
		header("Location:availabilityChart.php?project=$keyword&msg=$msg");
		exit;
	}
	
	$msg	=$_GET["msg"];
	$pageName	=	"Add Availability Chart";	 	   
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
			<legend>Availability Chart</legend>
			<div class="formBox">
			<div class="row200"><span class="redText"><?php echo $msg; ?></span></div>
			
				<form name="frm_Cms" method="post" action="availabilityChart.php">	
				
				<input type="hidden" name="project" id="project" value="<?php echo $keyword;?>" />
				
					<div class="row700">
						<div class="row200">Project Name<span class="required">*</span></div>						
						<div class="row350"><select name="project" id="project" style="width:150px;" onchange="frm_Cms.submit();">
							<option value="">---------- Select ----------</option>
							<?php for($i=0;$i<count($records);$i++){?>							
								<option value="<?php echo $records[$i]["id"];?>" <?php if($keyword==$records[$i]["id"]){?> selected="selected"<?php }?>><?php echo $records[$i]["name"];?></option>
								<?php }?>							
							</select></div>
					</div>	
					
			 <?php if(!empty($keyword)){ ?>		
					
			  <div class="row700"><h3 style="color:#FF0000">Add Towers</h3></div>
			
          			<div class="row700">
					   <div class="row200">Tower Name<span class="required">*</span></div>
					   <div class="row350"><input type="text" name="tower" id="tower"/></div>
					</div>   
					
					<div class="row700">
					   <div class="row200"></div>
					   <div class="row350"><input type="submit" name="addButton" id="addButton" value="Add"/></div>
					</div> 
					   
									
			 <?php }?>
				</form>
			</div>
			</fieldset>
			
			
			<!--listing-->
			
			
				 <?php if(count($tmplist)!="") {?>	
         <ul class="listing">					
				<li class="title">
				    <div class="row150">SI No</div>		
					<div class="row150">Tower Name</div>								
				</li>				
				<?php 
				$i	=	0;										
				while($i < $size) {
				?>						
				<li>
				    <div class="row150"><?php echo $i+1+$start;?></div>	
					<div class="row150"><?php echo $tmplist[$i]["tower_name"];?></div>		
					
					<div class="row150"><a href="add_floors.php?project=<?php echo $keyword;?>&id=<?php echo $tmplist[$i]["id"];?>" >Add Floors</a></div>
								
					<div class="row50"><a href="editTowerName.php?project=<?php echo $keyword;?>&id=<?php echo $tmplist[$i]["id"];?>" >Edit</a></div>
					<div class="row50"><a href="availabilityChart.php?project=<?php echo $keyword;?>&id=<?php echo $tmplist[$i]["id"];?>&action=del" onclick="return askDelete();" >Delete</a></div>
					
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
				<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $first;?>" class="nav">&laquo;&laquo;First</a>
				<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $prev;?>" class="nav">&laquo;Prev</a>
				<?php
					for($j=0;$j<count($pages);$j++)
					{
						$star=($pages[$j]-1)*$limit;
						if($start==$star)
						{?>
						<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $star;?>" class="visited"><?php echo $pages[$j];?></a>
				<?php }else{?>
						<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $star;?>" ><?php echo $pages[$j];?></a>
				<?php }
					}
				?>
				<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $next;?>" class="nav">Next&raquo;</a>
				<a href="availabilityChart.php?project=<?php echo $keyword;?>&start=<?php echo $last;?>" class="nav">Last&raquo;&raquo;</a>
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