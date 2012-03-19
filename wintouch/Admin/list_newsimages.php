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
$eid		=	$_GET["eid"];
$obj	= new Authentication();

	$records	=	$obj->listimage(array("start"=>$start,"limit"=>$limit),$eid);
	$size	=	count($records);

if($_GET["action"]=="delete"){
	$id		=	$_GET["id"];
	$tt	=	$obj->deleteimages($id);
	if(!empty($tt)){
				$img_path	=	"../uploads/news_images/".$tt."";
				@unlink("$img_path");
	           $msg1="Deleted Successfully";	
			   }
		header("Location:list_newsimages.php?eid=$eid&msg1=$msg1");
		exit;
	
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
					<legend>News Images</legend>					
					<div class="row700 redText"><?php echo $msg;?></div>
			
		
			<div class="row200 redText"><?php echo $msg1;?></div>
			
					Add News Images  -<a href="addImageNews.php?eid=<?php echo $eid;?>">Back to Add News Images</a>
						
				<div class="clear"></div>				
				
			<ul class="listing">
				<li class="title">
					<div class="row50">SI</div>
					<div class="row150">Image</div>
										
				</li>
				<form name="fms1" action="list_events.php" method="post">
				<?php
				if(count($records)>0){
				$util	=	new Utilities();
					for($i=0;$i<count($records);$i++){
						?>
						<li>
							<div class="row50"><?php echo $i+1+$start;?></div>
							<div class="row150"><img  src="thumb.php?image=../uploads/news_images/<?php echo $records[$i]["image_name"];?>&w=0&h=0&cw=100&ch=100" class="imgBoxSel" alt="thumb" border="0"/></div>
											
							<div class="row50">													
							<a href="list_newsimages.php?action=delete&id=<?php echo $records[$i]["id"]?>&eid=<?php echo $records[$i]["news_id"];?>" onclick="return askDelete();">Delete</a>
							</div>							
						</li>
						<?php
					}	
					?>					
					</form>	
					
					<?php
					//echo $obj->totalRecords;
					$cnt	=	ceil($obj->totalRecords/$limit);
					?>
					<li class="page">
					Pages:						
						<?php
						for($i=1;$i<=$cnt;$i++){
							$str	=	($i-1)*$limit;
							if($start==$str){
								?>
								<a href="list_newsimages.php?eid=<?php echo $eid;?>&start=<?php echo $str;?>" class="visited"><?php echo $i;?></a>
								<?php
							}else{
								?>
								<a href="list_newsimages.php?eid=<?php echo $eid;?>&start=<?php echo $str;?>"><?php echo $i;?></a>
								<?php
							}
						}
						?>
					</li>
					
					<?php
				
				}else{
					?>
					<li class="page">
						<span class="message">No records found</span>
					</li>
					<?php
				}
				?>
			</ul>
			
			
	
		</fieldset>
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