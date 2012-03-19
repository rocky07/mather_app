<?php
error_reporting(E_ALL ^ E_NOTICE);
require("Include_Security.php") ;
header("Expires: " . gmdate("D, d M Y H:i:s", time() + (-1*60)) . " GMT");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.1)" />
		<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)" />
		<link href="../Themes/<?php echo $Theme; ?>/dialog.css" type="text/css" rel="stylesheet" />
		<!--[if IE]>
			<link href="../Style/IE.css" type="text/css" rel="stylesheet" />
		<![endif]-->
		<style type="text/css">
	    #uploader1 {height:60; VISIBILITY: inherit; Z-INDEX: 2}
		</style>
		<script type="text/javascript" src="../Scripts/Dialog/DialogHead.js"></script>
	    <title><?php echo GetString("Browse") ; ?> </title>
	    
	    
    <?php
     
      $Current_FilesGalleryPath=$FilesGalleryPath;
      if (@$_GET["DP"]!="")
      {
        $Current_FilesGalleryPath=$_GET["DP"];
      }
    ?>
    
	</head>
	<body>
		<div id="container">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
	            <tr>
		            <td style="white-space:nowrap; width:250px">
		            </td>
		            <td valign="bottom" style="width:200px">
			            <?php
							$ButtonStatusClass="dialogButton";
							if($AllowCreateFolder!="true")
								$ButtonStatusClass="CuteEditorButtonDisabled";                           
						?>
<img src='../Images/newfolder.gif' id='btn_CreateDir' onclick='CreateDir_click();' title='<?php echo GetString("Createdirectory") ; ?>' class='<?php echo $ButtonStatusClass; ?>' onmouseover='CuteEditor_ColorPicker_ButtonOver(this);' />
<img src="../Images/zoom_in.gif" id="btn_zoom_in" onclick="Zoom_In();" title="<?php echo GetString("ZoomIn") ; ?>" class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" /> 
<img src="../Images/zoom_out.gif" id="btn_zoom_out" onclick="Zoom_Out();" title="<?php echo GetString("ZoomOut") ; ?>" class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" /> 
<img src="../Images/Actualsize.gif" id="btn_Actualsize" onclick="Actualsize();" title="<?php echo GetString("ActualSize") ; ?>" class="dialogButton" onmouseover="CuteEditor_ColorPicker_ButtonOver(this);" /> 
		            </td>
		            <td align="right">
		            </td>	
	            </tr>
            </table>
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
				<tr>
					<td valign="top" style="width:540px">
<iframe src="browse_Document.php?<?php echo $setting ; ?>&Theme=<?php echo $Theme; ?>&DP=<?php echo $Current_FilesGalleryPath; ?>" id="browse_Frame" frameborder="0" scrolling="auto" style="border: buttonshadow 1px solid; width:540px;height:280px"></iframe>		
					</td>
					<td>&nbsp;
					</td>
					<td valign="top" style="width:220px">
						<div style="border: buttonshadow 1px solid; vertical-align: top; overflow: auto; width:100%; HEIGHT: 280px; BACKGROUND-COLOR: white;">
							<div id="divpreview" style="BACKGROUND-COLOR: white;Padding:3;">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3" style="height:2">
					</td>
				</tr>
			</table>
			<div style="text-align:center">
			<table border="0" cellspacing="2" cellpadding="5" width="98%">
				<tr>
					<td valign="top">
							 <table border="0" cellpadding="5" cellspacing="0" width="100%">
								    <tr>
									    <td valign="top">
			    			              <fieldset>
							                <legend><?php echo GetString("Insert") ; ?></legend>
							                        <table border="0" cellpadding="5" cellspacing="0" width="100%">
								                        <tr>
									                    <td valign="middle"><?php echo GetString("Url") ; ?>:</td>
									                    <td>
									                        <input type="text" id="TargetUrl" style="WIDTH:360px" name="TargetUrl" />
								                        </td>
								                    </tr>
							                    </table>
						                    </fieldset>
                                  <?php
                                    $Style_Display_None="";
						                        if ($AllowUpload!="true")
                                    {
                                      $Style_Display_None="Style='Display:none'";
                                    } 
						                      ?>
						                        <fieldset id="fieldsetUpload" <?php echo $Style_Display_None ; ?> >
							                    <legend><?php echo GetString("Upload") ; ?> (Max size <?php echo $MaxDocumentSize; ?>K)</legend>
<iframe src="upload.php?<?php echo $setting ; ?>&Theme=<?php echo $Theme; ?>&FP=<?php echo $Current_FilesGalleryPath; ?>&Type=document" id="uploader1" frameborder="0" scrolling="auto" style="width:100%;"></iframe>
									        </fieldset> 
						                    </td>
									    <td>&nbsp;&nbsp;&nbsp; 
									    </td>
									    <td width="200" align="center">		
											<div style="padding-top:10px; text-align:center">
<input class="formbutton" type="button" value="<?php echo GetString("OK") ; ?>" onclick="do_insert()" id="Button1" name="Button1" /> &nbsp;&nbsp;&nbsp;                    							
<input class="formbutton" type="button" value="<?php echo GetString("Cancel") ; ?>" onclick="do_Close()" id="Button2" name="Button2" />
						                    </p>
									    </td>
								    </tr>
								</table>
					</td>
				</tr>
			</table>
			</div>
			<script type="text/javascript">	
	            var OK = "<?php echo GetString("OK"); ?>";
	            var Cancel = "<?php echo GetString("Cancel"); ?>";
	            var InputRequired = "<?php echo GetString("InputRequired"); ?>";
	            var ValidID = "<?php echo GetString("ValidID"); ?>";
	            var ValidColor = "<?php echo GetString("ValidColor"); ?>";
	            var SelectImagetoInsert = "<?php echo GetString("SelectImagetoInsert"); ?>";
	            
	            function UploadSaved(sFileName,path){
		            ResetFields();
		  try{
		    browse_Frame.location.reload();
		    }
		    catch(x)
		    {}
		            TargetUrl.value = sFileName;
		            var ext=sFileName.substring(sFileName.lastIndexOf('.')).toLowerCase();
	                switch(ext)
	                {
		                case ".jpeg":case ".jpg":case ".gif":case ".png":case ".bmp":
		                    setTimeout(function(){do_preview();}, 100); 
			                break;
		                case ".swf":
		                    setTimeout(function(){do_preview();}, 100); 
			                break;
		                case ".avi":case ".mpg":case ".mp3":case ".mpeg":case ".wav":
		                    setTimeout(function(){do_preview();}, 100); 
			                break;
			            default:
		                    setTimeout(function(){do_preview(sFileName);}, 100); 
			                break;
			            
	                }
		            row_click(sFileName,"");
	            }
            	
	            function Refresh(path)
	            {
		            browse_Frame.location="browse_Document.php?<?php echo $setting ; ?>&Theme=<?php echo $Theme; ?>&DP=<?php echo $FilesGalleryPath; ?>&loc="+path+"";
				}
				function CreateDir_click()
				{
					<?php
						$Style_Display_None;
						if ($AllowCreateFolder!="true")
						{
							echo "alert(\"".GetString("NoPermission")."\");";
							echo "return;";
						}
					?>		    
	                if(Browser_IsIE7())
	                {
		                IEprompt(promptCallback,'<?php echo GetString("SpecifyNewFolderName"); ?>', "");		
		                function promptCallback(dir)
		                {
			                var tempPath = browse_Frame.location;	
			                tempPath = tempPath + "&action=createfolder&foldername="+dir;
			                browse_Frame.location = tempPath;		
		                }
	                }
	                else
	                {
		                var dir=prompt("<?php echo GetString("SpecifyNewFolderName"); ?>","")
		                if(dir)
		                {
			                var tempPath = browse_Frame.location;	
			                tempPath = tempPath + "&action=createfolder&foldername="+dir;
			                browse_Frame.location = tempPath;			
		                }
	                }
	            }
	            function row_click(path,html)
	            {	
		            ResetFields();
		            TargetUrl.value=path;
		            do_preview(html);
	            }	    
        		
	            function SetUpload_FolderPath(path)
	            {	if(path.substring(path.length-1, path.length)=='/')
		            {
			            path=path.substring(0, path.length-1);
		            }
		            uploader1.src="upload.php?<?php echo $setting ; ?>&Theme=<?php echo $Theme; ?>&FP="+path+"&Type=document";
	            }	
	        </script>
		<script type="text/javascript" src="../Scripts/Dialog/DialogFoot.js"></script>
		<script type="text/javascript" src="../Scripts/Dialog/Dialog_SelectFile.js"></script>
	</body>
</html>
