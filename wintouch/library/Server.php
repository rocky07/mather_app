<?php


	class Server
	{
		
		function getHost(){
			$host	=	strtolower($_SERVER['HTTP_HOST']);			
			if(substr($host,0,4)=="www."){
				$host	=	substr($host,4,strlen($host)-4);
			}			
			return $host;
		}
		
		function getUrl(){
			$url	=	$_SERVER['REQUEST_URI'];
			$parts	=	parse_url($url);
			return $parts;
		}
				
		function getClient(){
			$ip	=	$_SERVER['REMOTE_ADDR'];
			$address	=	gethostbyaddr($ip);
			return array("ip"=>$ip,"connection"=>$addres);
		}
		
		function getScript(){
			$script	=	$_SERVER['SCRIPT_NAME'];
			$parts	=	explode("/",$script);
			$last	=	$parts[count($parts)-1];
			return strtolower($last);
		}
		
		
		function getFullPath(){
			$root	=	$_SERVER['SCRIPT_NAME'];
			$parts	=	explode("/",$root);
			$last	=	$parts[count($parts)-1];
			if(strrpos(".",$last)>=0){
				unset($parts[count($parts)-1]);
			}
			$url	=	implode("/",$parts);
			return $url;

		}
		
		function getRootPath(){
			echo $root	=	$_SERVER['SCRIPT_NAME'];
			$parts	=	explode("/",$root);
			$last	=	"/".$parts[1];
			return strtolower($last);

		}
		
		
	}



?>