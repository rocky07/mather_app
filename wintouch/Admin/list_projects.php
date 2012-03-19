<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$start	=	$_GET["start"];
$limit		=	10;
if(empty($start)){
	$start	=	0;
}

$obj	=	new Project();

$id		=	$_GET["id"];

$searchtext	=	$_POST["textsearch"];
$records	=	$obj->getAllProjects($start,$limit,$searchtext);	


if(isset($_POST["submitbutton"])){
	$records	=	$obj->getAllProjects($start,$limit,$searchtext);	
	$size	=	count($records);
	for($k=0;$k<$size;$k++){
		$prirty=$_POST["priorityselect".$k];
		$pid=$_POST["cid".$k];
		$obj->updatePriorityForPrj($prirty,$pid);
	}	
	header("Location:list_projects.php");
	exit;
}else{
	$records	=	$obj->getAllProjects($start,$limit,$searchtext);
}

$size	=	count($records);

if($_GET["action"]=="delete"){	
	$obj->delProjects($id);
	header("Location:list_projects.php?msg=Deleted successfully !");
	exit;
}

$webpageTitle	=	"List Projects";
$msg1	=$_GET["msg1"];
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
				<legend>List Projects</legend>				
				<div class="formBox">
				<form name="frms" action="list_projects.php?id=<?php echo $id;?>" method="post" >
				<div class="row700 redText"><?php echo $msg1;?></div>
				<div class="row200">Search: </div>
					<div class="row250">
						<input type="text" name="textsearch" id="textsearch" class="textfield" size="30" maxlength="80" value="<?php echo $searchtext;?>"/>
					</div>
					<div class="row100">
						<input type="submit" name="searchBt" id="searchBt" class="button" value="Search" />
					</div>
				</form>
				</div>
						
				<ul class="listing">
				<li class="title">
					<div class="row50">Sl</div>
					<div class="row100">Project Name</div>
				<!--	<div class="row50">Project Type</div>-->
					<div class="row150">Project Image</div>
					
					<div class="row100">Location Map</div>
					<!--<div class="row100">Project Logo</div>-->
					<div class="row50">Priority</div>
					<div class="row100">Action</div>		
				</li>
				
				 <form name="frms" action="list_projects.php" method="post" onSubmit="return validateForm(this);">
				<?php
				if($size > 0){
				for($i=0;$i<$size;$i++){?>
				<li>
				
					<div class="row50"><?php echo $i+1+$start;?></div>
					<div class="row100"><?php echo $records[$i]["name"];?></div>
				<?php /*?>	<div class="row50"><?php echo $records[$i]["project_type"];?></div><?php */?>
					<div class="row150"><img src="../uploads/project_images/<?php echo $records[$i]["project_image"];?>" border="1" class="imgBoxSel" height="70" width="70"/></div>
					
				<?php /*?>	<div class="row50"><?php echo $records[$i]["location"];?></div><?php */?>
					<?php if(!empty($records[$i]["location_map"])){?>
					<div class="row100"><img src="../uploads/project/<?php echo $records[$i]["location_map"];?>" border="1" class="imgBoxSel" height="70" width="70" /></div>
					<?php }else{?>
					<div class="row100">
					<form action="add_locationMap.php?id=<?php echo $records[$i]["id"];?>" method="post">
						<input type="submit" name="sendButton" id="sendButton" class="button" value="Add Map" />
					</form>
					</div>
					<?php }?>
					<?php /*?><div class="row100"><img src="../uploads/project_logo/<?php echo $records[$i]["project_logo"];?>" border="1" class="imgBoxSel" height="50" width="50"/></div>
					<?php */?>
					<div class="row50">												
					<select name="priorityselect<?php echo $i;?>" id="priorityselect<?php echo $i;?>">
						<option value="na">na</option>		
							<?php 
							$count=$obj->totalRec;
							for($j=1;$j<$count+1;$j++){?>
								<option value="<?php echo $j;?>" <?php if($j==$records[$i]["prj_priority"]){?> selected="selected" <?php }?>><?php echo $j;?></option>
							<?php }?>	
							</select> 		
							<input type="hidden" name="cid<?php echo $i;?>" id="cid<?php echo $i;?>" value="<?php echo $records[$i]["id"];?>">				
							</div>
					
					
					<div class="row100"><a href="add_project.php?vid=<?php echo $records[$i]["id"];?>">Edit</a>&nbsp; | &nbsp;<a href="list_projects.php?action=delete&id=<?php echo $records[$i]["id"]?>" onclick="return askDelete();">Delete</a></div>								
				</li>
				<?php }		?>
				
				<input type="submit" name="submitbutton" id="submitbutton" value="update">
					</form>	
						
				
				<?php $cnt	=	ceil($obj->totalRec/$limit);
				?>
				<li class="page">						
					<?php
					for($i=1;$i<=$cnt;$i++){
						$str	=	($i-1)*$limit;
						if($start==$str){
							?>
							<a href="list_projects.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>&textsearch=<?php echo $searchtext;?>" class="visited"><?php echo $i;?></a>
							<?php
						}else{
							?>
							<a href="list_projects.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>&textsearch=<?php echo $searchtext;?>"><?php echo $i;?></a>
							<?php
						}
					}
					?>
				</li>					
				<?php }else{?>
				<li class="page">
					<span class="message">No records found</span>
				</li>
				<?php }?>
			</ul>							
				<div  class="note">
					<p>*Search with Name or Location .</p>
				</div>								
				</fieldset>
			</div>
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

function validateForm(frm)
{
	flag=true;
	var allElements=frm.elements;
	for( var i=0;i<allElements.length;i++)
	{
		if(allElements[i].type=="select-one" )
		{
			if(allElements[i].value=='na')
			{				
			alert("All Values mustbe valid..");
			flag=false;
			}
		}
		
	}
	return flag;
}
</script> 
	
<?php include("footer.php");?>