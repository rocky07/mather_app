<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$start	=	$_GET["start"];
$limit		=	15;
if(empty($start)){
	$start	=	0;
}

$obj	=	new Project();

$id		=	$_GET["id"];

$records	=	$obj->getAllAvailabilityCharts($start,$limit);	
$size	=	count($records);

/*if($_GET["action"]=="delete"){	
	$obj->delProjects($id);
	header("Location:list_projects.php?msg=Deleted successfully !");
	exit;
}*/

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
				<legend>List Availability Charts</legend>				
				<ul class="listing">
				<li class="title">
					<div class="row50">Sl</div>
					<div class="row200">Project Name</div>	
				</li>
				<?php
				if($size > 0){
				for($i=0;$i<$size;$i++){?>
				<li>
					<div class="row50"><?php echo $i+1;?></div>
					<div class="row180"><?php echo $records[$i]["name"];?></div>
					<div class="row100"><a href="availabilityChart.php?id=<?php echo $records[$i]["id"];?>">Edit</a></div>								
				</li>
				<?php }				
				
				$cnt	=	ceil($obj->totalRec/$limit);
				?>
				<li class="page">						
					<?php
					for($i=1;$i<=$cnt;$i++){
						$str	=	($i-1)*$limit;
						if($start==$str){
							?>
							<a href="list_availabilityChart.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>" class="visited"><?php echo $i;?></a>
							<?php
						}else{
							?>
							<a href="list_availabilityChart.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>"><?php echo $i;?></a>
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
</script> 
	
<?php include("footer.php");?>