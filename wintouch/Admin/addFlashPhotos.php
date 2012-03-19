<?php
ob_start();
session_start();
include("autoload.php");
include("session.php");
	$db		=	new Database_MySql();
	$db->connect();
	
	$obj	=	new Project();
	$records=$obj->getProjects();
	
	$limit	=	5;
		
	$veid=$_POST["project"];
	
	
	
		
	
	if(isset($_POST["addButton"]))
	{
		 $uploader	=	new Uploader("../uploads/flash_images/");
		 $uploader->setMaxSize(7);
		 $uploader->setExtensions(array("jpg","png","gif","jpeg"));
		 $imageFlash	=	array();
		
		 for($i=0;$i<$limit;$i++)
		 {
			if($uploader->uploadFile('txtImage'.$i)){
				$imagepath	=	$uploader->getUploadName();		
				$imageFlash[$i]	=	$imagepath;
				$obj->addFlashImage($imagepath,$veid);
			}
		 }
		 createXml($imageFlash,$veid);
		header("Location:addFlashPhotos.php?msg=Photos uploaded");
		exit;
	}	
	
	
	function createXml($image,$pid){
	
				$doc = new DOMDocument();
				$doc->formatOutput = true;
				
				$r = $doc->createElement( "data" );
				$doc->appendChild( $r );
				/*-------------------------------settings ---------------------------*/
				$b = $doc->createElement( "settings" );
				//settings element
				$name = $doc->createElement( "swfWidth" );
				$name->appendChild(
				$doc->createTextNode( "550" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "swfHeight" );
				$name->appendChild(
				$doc->createTextNode( "170" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "imageWidth" );
				$name->appendChild(
				$doc->createTextNode( "550" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "imageHeight" );
				$name->appendChild(
				$doc->createTextNode( "170" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "columns" );
				$name->appendChild(
				$doc->createTextNode( "3" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "rows" );
				$name->appendChild(
				$doc->createTextNode( "3" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "spacing" );
				$name->appendChild(
				$doc->createTextNode( "6" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "autoPlay" );
				$name->appendChild(
				$doc->createTextNode( "true" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "delay" );
				$name->appendChild(
				$doc->createTextNode( "3" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "cycleTransitions" );
				$name->appendChild(
				$doc->createTextNode( "true" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "useButtons" );
				$name->appendChild(
				$doc->createTextNode( "true" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "leftButton" );
				$name->appendChild(
				$doc->createTextNode( "flashxml/flashimages/left.png" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "rightButton" );
				$name->appendChild(
				$doc->createTextNode( "flashxml/flashimages/right.png" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "leftButtonOver" );
				$name->appendChild(
				$doc->createTextNode( "flashxml/flashimages/left_over.png" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "rightButtonOver" );
				$name->appendChild(
				$doc->createTextNode( "flashxml/flashimages/right_over.png" )
				);
				$b->appendChild( $name );
				//end settings element
				$r->appendChild( $b );
				
				/*-----------------------------end settings-----------------------------------------*/
				
				$m = $doc->createElement( "media" );
				
				//media element
				$ct	=	count($image);
				for($i=0;$i<$ct;$i++){
					$it = $doc->createElement( "item" );
					$url = $doc->createElement( "url" );
					$url->appendChild(
					$doc->createTextNode( "uploads/flash_images/$image[$i]" ));
					$it->appendChild( $url );
					
					$m->appendChild($it);
				}
				//end settings element
				$r->appendChild( $m );
				
				/*----------------------------end contents-------------------------*/
				$util	=	new Utilities();
				$fname	=	$util->getRandom();
				echo $doc->saveXML();
				$doc->save("../uploads/flash_xml/$fname.xml");
				
				$obj	=	new Project();
				$obj->addFlash($fname,$pid);
				
		}
	
$msg	=$_GET["msg"]; 	
$webpageTitle	=	"Add Flash Photos";
?>

<?php include("header.php");?>
<div id="page">
	<div id="pageLeft">
		<?php include("menu.php");?>		
	</div>
	<div id="pageRight">
		<div class="content">&nbsp;
		
			<fieldset id="main">
			<legend>ADD Flash Photos</legend>
			
			<div class="formBox">
			<form name="frm_themes" action="addFlashPhotos.php" method="post" enctype="multipart/form-data">
					<div class="row700"><span class="redText"><?php echo $msg;?></span></div> 
						
						<div class="row700">
							<div class="row100">Project Name<span class="required">*</span></div>						
							<div class="row350"><select name="project" id="project" style="width:150px;">
								<option value="">---------- Select ----------</option>
								<?php for($j=0;$j<count($records);$j++){
								$keyword	=	$details[0]["id"];
								?>
									<option value="<?php echo $records[$j]["id"];?>" <?php if($keyword==$records[$j]["id"]){?> selected="selected"<?php }?>><?php echo $records[$j]["name"];?></option>
									<?php }?>							
								</select></div>
						</div>
						<?php for($i=0;$i<$limit;$i++){?>
						<div class="row700">
							<div class="row100">Upload Photo<span class="required">*</span></div>
							<div class="row250"><input type="file" name="txtImage<?php echo $i;?>" id="txtImage<?php echo $i;?>" /></div>							
						</div>
						<?php }?>
						<div class="row700">
							<div class="row150">&nbsp;</div>
							<div class="row300"><input type="submit" name="addButton" id="addButton" class="button" value="Upload" /></div>
						</div>
						<div class="row700"><span class="required">*</span>Max Photo Size(1 MB)</div>
					</form>
			</div>
			</fieldset>
		</div>
	</div>
<script type="text/javascript">

</script>
	
<?php 
include("footer.php");
?>