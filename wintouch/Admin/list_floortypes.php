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

$searchtext	=	$_GET["textsearch"];
$records	=	$obj->getAllfloortype($start,$limit,$searchtext);	
$size	=	count($records);

if($_GET["action"]=="delete"){	
	$obj->delFloortypes($id);
	header("Location:list_floortypes.php?msg=Deleted successfully !");
	exit;
}
$webpageTitle	=	"List Floor Types";
$msg	=$_GET["msg1"];
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
				<legend>List Floor Types</legend>				
				<div class="formBox">
				<form name="frms" action="list_floortypes.php?id=<?php echo $id;?>" method="get" >
				<div class="row700"><span class="message"><?php echo $msg;?></span></div>
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
					<div class="row150">Image</div>
					<div class="row120">Project Name</div>
					<div class="row120">Floor Type Name</div>
					<div class="row120">SqFeet</div>				
					<div class="row100">Action</div>		
				</li>
				
				<?php
				if($size > 0){
				for($i=0;$i<$size;$i++){?>
				<li>
					<div class="row50"><?php echo $i+1;?></div>
					<div class="row150"><img src="../uploads/floor_type/<?php echo $records[$i]["Image_name"];?>" border="1" class="imgBoxSel" height="100" width="100"/></div>
					
					<div class="row120"><?php echo $records[$i]["name"];?></div>
					<div class="row120"><?php echo $records[$i]["floor_type_name"];?></div>	
					<div class="row120"><?php echo $records[$i]["square_feet"];?></div>					
					<div class="row100"><a href="add_floortype.php?id=<?php echo $records[$i]["id"]?>">Edit</a>&nbsp; | &nbsp;<a href="list_floortypes.php?action=delete&id=<?php echo $records[$i]["id"]?>" onclick="return askDelete();">Delete</a></div>								
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
							<a href="list_floortypes.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>&textsearch=<?php echo $searchtext;?>" class="visited"><?php echo $i;?></a>
							<?php
						}else{
							?>
							<a href="list_floortypes.php?pageId=<?php echo $pageId;?>&start=<?php echo $str;?>&textsearch=<?php echo $searchtext;?>"><?php echo $i;?></a>
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
					<p>*Search with Project Name or Floor Type Name .</p>
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
</script> 
	
<?php include("footer.php");?>