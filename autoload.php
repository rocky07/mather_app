<?php
	
	
	date_default_timezone_set("Asia/Calcutta");
	 $base	=	dirname(__FILE__);
	define("ROOTPATH",$base);
		
	function __autoload($className){
		
		if(!class_exists($className)){
			$parts	=	explode("_",$className);			
			if(count($parts)==1){
				$folder	=	ROOTPATH."/db_library/".$className.".php";
			}else{
				$folder	=	ROOTPATH."/db_library/";
				for($i=0;$i<count($parts)-1;$i++){
					$folder.=	strtolower($parts[$i]);					
					$folder.="/";					
				}
				  $folder.=$parts[count($parts)-1].".php";

			}
			include_once($folder);
		}
	}
	
	


?>