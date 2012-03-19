<?php
error_reporting(E_ALL ^ E_NOTICE);
	$ps = array("Font","Text","Border","Layout","Background","Other"); 
	$activepanel=$_GET["Style"]."";
	if ($activepanel=="")
	{
		$activepanel="Font";
	}
	$activetext="";
?>

<script type="text/javascript" src="../Scripts/Dialog/Dialog_Tag_Style.js"></script>
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width:95px" valign="top" id="navtd">	
			
			<?php							
				$iscurrent=false;		
				foreach ($ps as $px)
				{ 				
					$url=$_SERVER["PHP_SELF"];
					$url=$url."?Tag=".$_GET["Tag"];
					$url=$url."&Tab=Style";
					$url=$url."&UC=".$_GET["UC"];
					$url=$url."&Style=".$px;
					$url=$url."&Theme=".$_GET["Theme"];
					$url=$url."&setting=".$_GET["setting"];
						
					if (strtolower($activepanel)==strtolower($px))
					{
						$activetext=$px;
						print "<a tabindex='-1' class='ActiveStyleNav' href='".$url."'>";
						print "<img alt='' src='../Images/style.".$px.".gif' style='border:0; vertical-align:inherit;'>";
						print $px;
						print "</a>";
					}
					else
					{
						print "<a tabindex='-1' class='StyleNav' href='".$url."'>";
						print "<img alt='' src='../Images/style.".$px.".gif' style='border:0; vertical-align:inherit;'>";
						print $px;
						print "</a>";
					}
				}
			?>
		</td>
		<td style="white-space:nowrap;width:10" ></td>
		<td valign="top">
			<?php
				require "Tag/tag_style_".strtolower($activepanel).".php";
			?>				
		</td>
	</tr>
</table>
<script type="text/javascript">
Window_GetElement(window,"navtd",true).ondblclick=function()
{
	if(event.shiftKey)
		alert(element.style.cssText);
}
</script>