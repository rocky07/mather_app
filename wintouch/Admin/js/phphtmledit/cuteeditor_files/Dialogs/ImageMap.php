<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("Include_GetString.php") ;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo GetString("ImageMap") ; ?></title>
		
		<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.1)" />
		<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)" />
		<link href="../Themes/<?php echo $Theme; ?>/dialog.css" type="text/css" rel="stylesheet" />
		<!--[if IE]>
			<link href="../style/IE.css" type="text/css" rel="stylesheet" />
		<![endif]-->
		<script type="text/javascript" src="../Scripts/Dialog/DialogHead.js"></script>
		<style type="text/css">
		.row { HEIGHT: 22px }
		.cb { VERTICAL-ALIGN: middle }
		.itemimg { VERTICAL-ALIGN: middle }
		.editimg { VERTICAL-ALIGN: middle }
		.cell1 { VERTICAL-ALIGN: middle }
		.cell2 { VERTICAL-ALIGN: middle }
		.cell3 { PADDING-RIGHT: 4px; VERTICAL-ALIGN: middle; TEXT-ALIGN: right }
		.cb { }
		</style>
	</head>
	<body>
		<table border="0" cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<td style="padding:4px 0 1px 4px">
&nbsp;&nbsp;&nbsp; <img src="../Images/ImageMap.gif" onclick="newMap();" title="<?php echo GetString("AddHotSpot") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
<img src="../Images/link.gif" onclick="Addlink(this);" title="<?php echo GetString("InsertLink") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
<img id="img_zoom_in" src="../Images/zoom_in.gif" onclick="Zoom_In();" title="<?php echo GetString("ZoomIn") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
<img id="img_zoom_out" src="../Images/zoom_out.gif" onclick="Zoom_Out();" title="<?php echo GetString("ZoomOut") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
<img id="img_bestfit" src="../Images/bestfit.gif" onclick="BestFit();" title="<?php echo GetString("BestFit") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
<img id="img_actualsize" src="../Images/Actualsize.gif" onclick="Actualsize();" title="<?php echo GetString("ActualSize") ; ?>"
	class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" />
				</td>
			</tr>
			<tr>
				<td valign="top" style="height:280">
<iframe id="iframe" marginheight="1" marginwidth="1" src="../template.php" width="100%" scrolling="yes"	height="100%"></iframe>
				</td>
			</tr>
		</table>
						<div style="padding-top:10px; text-align:center">
<input class="formbutton" type="button" value="   <?php echo GetString("Insert") ; ?>   " onclick="do_insert()" id="Button1" /> 
&nbsp;&nbsp;&nbsp; 
<input class="formbutton" type="button" value="   <?php echo GetString("Cancel") ; ?>  " onclick="do_Close()" id="Button2" />
						</div>
	</body>
	<script type="text/javascript">
	    var query_string = "?<?php echo $_SERVER["QUERY_STRING"]; ?>";
	    var AddLinktoImageMap = "<?php echo GetString("AddLinktoImageMap"); ?>";
	</script>
	<script type="text/javascript" src="../Scripts/Dialog/DialogFoot.js"></script>
	<script type="text/javascript" src="../Scripts/Dialog/Dialog_ImageMap.js"></script>
</html>