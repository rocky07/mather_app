<?php include_once("cuteeditor_files/include_CuteEditor.php") ; ?>
<html>	
    
	 <body>
        <br>
		   <?php		    
		      
                $editor=new CuteEditor();
                $editor->ID="description";				 
                $editor->Text=$det[0]["product_description"];
             //   $editor->EditorBodyStyle="font:normal 12px arial;";
              //  $editor->EditorWysiwygModeCss="php.css";
				$editor->Height=300;
				$editor->Width=450;

		        $editor->AutoConfigure="Minimal";				
                $editor->Draw();
                $editor=null;                
                //use $_POST["Editor1"]to retrieve the data
            ?>
	
	</body>
</html>

