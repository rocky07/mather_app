<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$obj	=	new Authentication();

if($_GET["action"]=="delete"){
	$id		=	$_GET["phid"];
	$tt	=	$obj->deleteNws($id);
}

if(isset($_POST["submitBt"])){
	$records	=	$obj->listNews();
	$size	=	count($records);
	
	for($k=0;$k<$size;$k++){
		$prirty=$_POST["priorityselect".$k];
		$nid=$_POST["cid".$k];
		$obj->updatePriorityForPressRelease($prirty,$nid);
		$msg="Updated Successfully";
	}	
	header("Location:list_news.php?msg=$msg");
	exit;
}else{
	$records	=	$obj->listNews();
}

$msg	=$_GET["msg"];
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
			<legend>List News</legend>			
			<div class="formBox">
				<div class="row700 redText"><?php echo $msg;?></div>	
			</div>			
			<ul class="listing">
				<li class="title">
					<div class="row50">SI</div>
					<div class="row150">Head Lines</div>	
					<div class="row300">News</div>
					<div class="row50">Priority</div>						
				</li>
				<form name="fms1" action="list_news.php" method="post" onSubmit="return validateForm(this);">
				<?php
				if(count($records)>0){
				$util	=	new Utilities();
					for($i=0;$i<count($records);$i++){
						?>
						<li>
							<div class="row50"><?php echo $i+1;?></div>
							<div class="row150">
							<?php echo str_replace("\n","<br>",$records[$i]["news_headline"])?>
							</div>
							<div class="row300">
							<?php echo str_replace("\n","<br>",$records[$i]["news_details"])?>
							</div>
							<div class="row50">												
							<select name="priorityselect<?php echo $i;?>" id="priorityselect<?php echo $i;?>" onchange="changeOrder(this);">
								<option value="na">na</option>		
								<?php $count=$obj->totalRecords;
								for($j=1;$j<$count+1;$j++){?>
								<option value="<?php echo $j;?>" <?php if($j==$records[$i]["news_priority"]){?> selected="selected" <?php }?>><?php echo $j;?></option>
								<?php }?>	
							</select> 		
							<input type="hidden" name="cid<?php echo $i;?>" id="cid<?php echo $i;?>" value="<?php echo $records[$i]["news_id"];?>">				
							</div>
							
							<div class="row100"><a href="list_newsimages.php?eid=<?php echo $records[$i]["news_id"];?>">List Images</a></div>
							
							<div class="row50">
							<a href="addNews.php?phid=<?php echo $records[$i]["news_id"]?>">Edit</a>
							</div>
							
							<div class="row50">
							<a href="list_news.php?action=delete&phid=<?php echo $records[$i]["news_id"]?>" onclick="return askDelete();">Delete</a>
							</div>							
						</li>
						<?php }?>
						<input type="submit" name="submitBt" id="submitBt" value="update">
					</form>
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

function changeOrder(selObj)
{
	var elements=document.forms[0].elements;
	for( var i=0;i<elements.length;i++)
	{
		if(elements[i].type=="select-one" && elements[i]!=selObj)
		{
			if(selObj.value==elements[i].value)
			{
			elements[i].options[0].selected=true;
			break;
			}
		}
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