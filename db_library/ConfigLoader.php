<?php

	/*
	 	* Config Loader : GET Configs from INI  	
	*/
	
	class ConfigLoader
	{
		private $configData;
		private $configPath;
		
		function __construct($path)
		{			
			$this->configPath	=	$path;
			$this->configData	=	array();

		}
		
		/* 
		 *  Get The config data
		*/
		
		function getConfig($string)
		{			
			try{
					$content	=	parse_ini_file($this->configPath,true);								
					$this->configData	=	$content[$string];					
			}catch(Exception $c){
							
			}
			return $this->configData;
		}
		
	}



?>