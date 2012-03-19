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
		
		$rec	=	$obj->getAllEbrochure($start,$limit);
		$size	=	count($rec);		
			
		/*-------------------------------deletion------------------------*/
		$delete	=	$_GET["delete"];
		if(isset($delete)){
			$id	=	$_GET["id"];
			$tt	=	$obj->delEbrochure($id);
			@unlink("../uploads/ebrochure/".$tt."");			
			header("Location:list_ebrochure.php?msg=Document Deleted");
			exit;		
		}
		
		/*======================================================*/
		$webpageTitle	=	"List E-brochure";
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
				<legend>List E-brochure</legend>
				
					<ul class="listing">
					<li class="title">
						<div class="row50">SI</div>		
						<div class="row100">Project</div>																
					</li>
					<?php if(count($rec)>0){
					$i	=	0;										
					while($i < $size){				
					?>	
					<li>
					<div class="row50"><?php echo $i+1+$start;?></div>
					<div class="row150"><a target="_blank" href="../uploads/ebrochure/<?php echo $rec[$i]["ebrochure"];?>"><?php echo $rec[$i]["name"];?></a></div>		
					
				 <div class="row50"><a href="list_ebrochure.php?delete=set&id=<?php echo $rec[$i]["id"];?>" onclick="return askDelete();" >Delete</a></div>					
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
							<a href="list_ebrochure.php?start=<?php echo $str;?>" class="visited"><?php echo $i;?></a>
							<?php
						}else{
							?>
							<a href="list_ebrochure.php?start=<?php echo $str;?>"><?php echo $i;?></a>
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