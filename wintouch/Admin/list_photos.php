<?php
ob_start();
session_start();
include("autoload.php");
include("session.php");
		$db		=	new Database_MySql();
		$db->connect();
		
		$obj	=	new Project();
		
		$start	=	$_GET["start"];
		$limit		=	15;
		if(empty($start)){
			$start	=	0;
		}

		$project =$_POST["project"];
         if(empty($project))	{		 
		 $project =$_GET["project"];
		 
                }	
		
		
		$rec	=	$obj->getAllPhotos($project,$start,$limit);
		$size	=	count($rec);
		
		$records=$obj->getProjects();
			
		/*-------------------------------deltion------------------------*/
		$delete	=	$_GET["delete"];
		if(isset($delete)){
			$id	=	$_GET["id"];
			$tt	=	$obj->delPhoto($id);
			@unlink("../uploads/gallery/".$tt."");			
			header("Location:list_photos.php?msg=Photo Deleted");
			exit;		
		}
		
		/*======================================================*/
		$webpageTitle	=	"List Photos";
		$msg	=$_GET["msg"];
?>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
				<legend>List Photos</legend>
				
				
				<form name="frm_Continent" method="post" action="list_photos.php">
						
						<div class="row700">
							<div class="row200">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($i=0;$i<count($records);$i++){
								$keyword	=	$tmplist[0]["project_id"];
								?>
									<option value="<?php echo $records[$i]["id"];?>" <?php if($project==$records[$i]["id"]){?> selected="selected"<?php }?>><?php echo $records[$i]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
						<div class="row700"><input type="submit" name="submitbutton" id="submitbutton" value="Search"/></div>
						
					</form>
				
				
				
				
				
					<ul class="listing">
					<li class="title">
						<div class="row50">SI</div>
						<div class="row150">Image</div>
						<div class="row250">Caption</div>	
						<div class="row120">Project Name</div>						
					</li>
					<?php if(count($rec)>0){
					$i	=	0;										
					while($i < $size){				
					?>	
					<li>
					<div class="row50"><?php echo $i+1;?></div>
					<div class="row150"><img src="../uploads/gallery/<?php echo $rec[$i]["image_name"];?>" class="imgBoxSel" title="Gallery Image" border="0" width="100" height="90"/></div>
					<div class="row250"><?php echo $rec[$i]["caption"];?></div>
					<div class="row120"><?php echo $rec[$i]["name"];?></div>						
					<div class="row50"><a href="list_photos.php?delete=set&id=<?php echo $rec[$i]["id"];?>" onclick="return askDelete();" >Delete</a></div>					
					</li>
				<?php $i++;
				}
					
				$cnt	=	ceil($obj->totalRecords/$limit);
				?>
				<li class="page">						
					<?php
					for($i=1;$i<=$cnt;$i++){
						$str	=	($i-1)*$limit;
						if($start==$str){
							?>
							<a href="list_photos.php?project=<?php echo $project;?>&start=<?php echo $str;?>" class="visited"><?php echo $i;?></a>
							<?php
						}else{
							?>
							<a href="list_photos.php?project=<?php echo $project;?>&start=<?php echo $str;?>"><?php echo $i;?></a>
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
					<!--------------------- Pagination ends here ---------------->	

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