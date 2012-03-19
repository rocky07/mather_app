<?php
	
	
	class Utilities
	{
		private $filterPattern;
		
		function __construct()
		{
			$this->filterPattern	=	array();	
		}
		
		
		function getRandom()
		{
			$length	=	10;
			$random= "";
		
			srand((double)microtime()*1000000);
			
			$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
			$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
			$data .= "0FGH45OP89";
			
			for($i = 0; $i < $length; $i++)
			{
			$random .= substr($data, (rand()%(strlen($data))), 1);
			}
			
			return $random;
		}
		
		function getExtension($string)
		{
			$ext	=	"";
			try{
				$parts	=	explode(".",$string);
				$ext		=	strtolower($parts[count($parts)-1]);
			}catch(Exception $c){
				$ext	=	"";
			}
			return $ext;
		}
		
		
		 
		 /*
		  * Set Pattern for the FilterFunction
		 */
		
		function setPattern($array)
		{
			$this->filterPattern	=	$array;
		}
		
		/*
		 * Remove Special Chars
		*/
		
		function filterChars($string)
		{
			try{
				foreach($this->filterPattern as $key){
					$string	=	str_replace($key,"",$string);
				}
			}catch(Exception $c){
				
			}
			return $string;
		}
		
		/*
		 * Display DateFormat
		*/
		function dateDisplayFormat($date)
		{
			return date("F d, Y",strtotime($date));
		}
		
		function dateTimeDisplayFormat($date)
		{
			return date("M-d-Y H:i:s",strtotime($date));
		}
		
		function dateTimeDisplayFormat1($date)
		{
			return date("d-M-Y",strtotime($date));
		}
		
		/*
		 * Mysql ateFormat
		*/
		
		function dateInsertFormat($date)
		{
			return date("Y-m-d H:i:s",strtotime($date));
		}
		
		
		function encodeString($string)
		{
			return base64_encode($string);
		}
		
		function decodeString($string)
		{
			return base64_decode($string);
		}
		
		function priceFormat($price){
			$price	=	round(doubleval($price),2);
			$price	=	($price*1.000)/(doubleval(1.000));
			$parts	=	explode(".",$price);
			if(count($parts)==2){
				$string=$parts[0];
				if(strlen($parts[1])==1){
					$string.=".".$parts[1]."00";
				}else	if(strlen($parts[1])==2){
					$string.=".".$parts[1]."";
				}
			}else{
				$string	=	$parts[0].".00";
			}
			return $string;
		}
		
	}
	
?>