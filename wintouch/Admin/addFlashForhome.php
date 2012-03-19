<?php
ob_start();
include("autoload.php");
include("session.php");
$db		=	new Database_MySql();
$db->connect();

$obj	=	new Project();

if(isset($_POST["txtSub"]))
{
		$stNo	=	trim($_POST["txtUni"]);					
			if(empty($stNo)){
				$msg	=	"Enter mandatory fields";
				header("Location:addFlashForhome.php?msg=$msg");
				exit;
			}			
			
		 $uploader	=	new Uploader("../uploads/flashHome/");
		 $uploader->setMaxSize(7);
		 $uploader->setExtensions(array("jpg","png","gif","jpeg"));
		 $imageFlash	=	array();
		 $caption		=	array();
		 $link			=	array();
		
		 for($i=0;$i<$stNo;$i++)
		 {
			if($uploader->uploadFile("txtImage".$i)){
				$imagepath	=	$uploader->getUploadName();		
				$imageFlash[$i]	=	$imagepath;	
				$caption[$i]		=	$_POST["txtSquare".$i];
				 $link[$i]			=	$_POST["txtStair".$i];			
			}
		 }
		 $fl	=	$obj->getHomeFlash();
		 if(trim($fl)==""){
			 createXml($imageFlash,$caption,$link);
		 }else{
		 	updateXml($imageFlash,$caption,$link,$fl);		 
		 }
		 header("Location:addFlashForhome.php?msg=$msg");
		exit;
	
}

function updateXml($image,$caption,$linkhl,$fl){

$doc = new DOMDocument('1.0', 'utf-8');
$doc->formatOutput = true;
$doc->preserveWhiteSpace = false;
$doc->load("../uploads/flash_xml/$fl.xml");

$ct	=	count($image);
for($i=0;$i<$ct;$i++){
	$it = $doc->createElement( "item" );
	
	$url = $doc->createElement( "url" );
	$url->appendChild(
	$doc->createTextNode( "uploads/flashHome/$image[$i]" ));
	$it->appendChild( $url );
	
	$link = $doc->createElement( "link" );
	$link->appendChild(
	$doc->createTextNode($linkhl[$i]));
	$it->appendChild( $link );
	
	$link = $doc->createElement( "transition" );
	$link->appendChild(
	$doc->createTextNode("1"));
	$it->appendChild( $link );
	
	$content	=	$doc->createElement("content");
	
	$txt		=	$doc->createElement("text");
	
	$pos		=	$doc->createElement("position");
	$pos->appendChild(
	$doc->createTextNode("left"));
	$txt->appendChild($pos);
	
	$x		=	$doc->createElement("x");
	$x->appendChild(
	$doc->createTextNode("0"));
	$txt->appendChild($x);
	
	$y		=	$doc->createElement("y");
	$y->appendChild(
	$doc->createTextNode("140"));
	$txt->appendChild($y);
	
	$color		=	$doc->createElement("color");
	$color->appendChild(
	$doc->createTextNode("#000000"));
	$txt->appendChild($color);
	
	$size		=	$doc->createElement("size");
	$size->appendChild(
	$doc->createTextNode("16"));
	$txt->appendChild($size);
	
	$bgColor		=	$doc->createElement("bgColor");
	$bgColor->appendChild(
	$doc->createTextNode("#FFFFFF"));
	$txt->appendChild($bgColor);
	
	$bgAlpha		=	$doc->createElement("bgAlpha");
	$bgAlpha->appendChild(
	$doc->createTextNode("0"));
	$txt->appendChild($bgAlpha);
	
	$words		=	$doc->createElement("words");
	$words->appendChild(
	$doc->createTextNode($caption[$i]));
	$txt->appendChild($words);
	
	$content->appendChild($txt);
	$it->appendChild($content);
	$doc->getElementsByTagName('media')->item(0)->appendChild($it);

	
}

//$xml->getElementsByTagName('media')->item(0)->appendChild($it);

$doc->save("../uploads/flash_xml/$fl.xml");
}

function createXml($image,$caption,$linkhl){
				print_r($link);
				echo $link[0];
				$doc = new DOMDocument();
				$doc->formatOutput = true;
				
				$r = $doc->createElement( "data" );
				$doc->appendChild( $r );
				/*-------------------------------settings ---------------------------*/
				$b = $doc->createElement( "settings" );
				//settings element
				$name = $doc->createElement( "swfWidth" );
				$name->appendChild(
				$doc->createTextNode( "150" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "swfHeight" );
				$name->appendChild(
				$doc->createTextNode( "150" )
				);
				$b->appendChild( $name );
				//end settings element
				//settings element
				$name = $doc->createElement( "imageWidth" );
				$name->appendChild(
				$doc->createTextNode( "150" )
				);
				$b->appendChild( $name );
				//end settings element
				
				//settings element
				$name = $doc->createElement( "imageHeight" );
				$name->appendChild(
				$doc->createTextNode( "150" )
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
				$doc->createTextNode( "3" )
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
				$doc->createTextNode( "false" )
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
					$doc->createTextNode( "uploads/flashHome/$image[$i]" ));
					$it->appendChild( $url );
					
					$link = $doc->createElement( "link" );
					$link->appendChild(
					$doc->createTextNode("$linkhl[$i]"));
					$it->appendChild( $link );
					
					$content	=	$doc->createElement("content");
					
					$txt		=	$doc->createElement("text");
					
					$pos		=	$doc->createElement("position");
					$pos->appendChild(
					$doc->createTextNode("left"));
					$txt->appendChild($pos);
					
					$x		=	$doc->createElement("x");
					$x->appendChild(
					$doc->createTextNode("0"));
					$txt->appendChild($x);
					
					$y		=	$doc->createElement("y");
					$y->appendChild(
					$doc->createTextNode("105"));
					$txt->appendChild($y);
					
					$color		=	$doc->createElement("color");
					$color->appendChild(
					$doc->createTextNode("#000000"));
					$txt->appendChild($color);
					
					$size		=	$doc->createElement("size");
					$size->appendChild(
					$doc->createTextNode("12"));
					$txt->appendChild($size);
					
					$bgColor		=	$doc->createElement("bgColor");
					$bgColor->appendChild(
					$doc->createTextNode("#FFFFFF"));
					$txt->appendChild($bgColor);
					
					$bgAlpha		=	$doc->createElement("bgAlpha");
					$bgAlpha->appendChild(
					$doc->createTextNode("50"));
					$txt->appendChild($bgAlpha);
					
					$words		=	$doc->createElement("words");
					$words->appendChild(
					$doc->createTextNode($caption[$i]));
					$txt->appendChild($words);
					
					$content->appendChild($txt);
					$it->appendChild($content);
					
					
					$m->appendChild($it);
					
				}
				//end settings element
				$r->appendChild( $m );
				
				/*----------------------------end contents-------------------------*/
				$fname	=	"homeFlash";
				$doc->saveXML();
				$doc->save("../uploads/flash_xml/$fname.xml");
				
				$obj	=	new Project();
				$obj->addFlashHome($fname);
				
		}

$msg=$_GET["msg"];
$webpageTitle	=	"Add Flash Image for Home";
?>
<script language="javascript" src="../User/js/second.js" type="text/javascript"></script>
<script type="text/javascript" src="js/Ajax/newajax.js"></script>
<script type="text/javascript" src="js/Ajax/prototype.js"></script>
<?php include("header.php");?>
	<div id="page">
		<div id="pageLeft">
		<?php include("menu.php");?>		
		</div>
		<div id="pageRight">
			<div id="content">
				<fieldset id="main">
					<legend>Add Flash Image for Home</legend>
					<div class="row700">&nbsp;</div>
					<div class="row700 redText"><?php echo $msg;?></div>
						<form name="frm_Continent" method="post" action="addFlashForhome.php" enctype="multipart/form-data">
						
						<div class="row700">
							<div class="row200">No of Projects<span class="required">*</span></div>
							<div class="row250"><input type="text" name="txtUni" id="txtUni" class="textfield" size="25" onblur="return checkFloor(this.value);" onkeyup="return checkFloor(this.value);"/>						</div>
						</div>
						<div id="NoStages">
							<div class="row700">
								<div class="row200">&nbsp;</div>
								<div class="row250"><input type="button" name="butGo"  value="go" onclick="return checkFloor(txtUni.value);"/>
								</div>
							</div>
						</div>
						
						</form>
					<div class="row700">
						<p class="notes">
						* indicates mandatory fields
						</p>
						<p class="notes">
						* It is Possible to add images Later
						</p>
						</div>
						<div class="row700">&nbsp;</div>
				</fieldset>
				
				
				<script type="text/javascript" language="javascript">
			var f4 = new LiveValidation('txtUni');
			
			
			 f4.add( Validate.Numericality );
			 txtTtype.add(Validate.Exclusion, { within: ['0'], failureMessage: "Please select something!"});
			 
	</script>
				
			</div>
		</div>
	</div>
	
<?php include("footer.php");?>