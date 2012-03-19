<?php
	
	
	class Utilities
	{
		private $filterPattern;
		
		function __construct()
		{
			$this->filterPattern	=	array();	
		}
		
		
		function getRandom($length=10)
		{
			
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
			return date("M-d-Y",strtotime($date));
		}
		
		
		function dateDisplayFormatForQues($date)
		{
			return date("M d",strtotime($date));
		}
		
		
		function dateTimeDisplayFormat($date)
		{
			return date("F d Y, H:i",strtotime($date));
		}

           function dateDisplayFormatforbusiness($date)
		{
			return date("F d, Y",strtotime($date));
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
			$price	=	round(doubleval($price),3);
			$price	=	($price*1.000)/(doubleval(1.000));
			$parts	=	explode(".",$price);
			if(count($parts)==2){
				$string=$parts[0];
				if(strlen($parts[1])==1){
					$string.=".".$parts[1]."00";
				}else	if(strlen($parts[1])==2){
					$string.=".".$parts[1]."0";
				}else	if(strlen($parts[1])==3){
					$string.=".".$parts[1]."";
				}
			}else{
				$string	=	$parts[0].".000";
			}
			return $string;
		}
	function dateDisplay($date){
	
		  $tdate	=	date('Y-m-d H:i:s');
		  $pdate	=	date("Y-m-d H:i:s",strtotime($date));
		 
		 $diff	=	strtotime($tdate)-strtotime($pdate);
		  $mts	=  round($diff/60);
		 if($mts<1){
		 	$ret	="Seconds Ago";
		 }else{
			 if($mts<1440){
				$ret	=	 $this->ConvertMinutes2Hours($mts)." ago";
			 }else{
				$ret	=	$this->dateDisplayFormat($pdate);
			 }
		}
		 return $ret;
	}		
		
	function ConvertMinutes2Hours($Minutes)
	{
		if ($Minutes < 0)
		{
			$Min = Abs($Minutes);
		}
		else
		{
			$Min = $Minutes;
		}
		$iHours = Floor($Min / 60);
		$Minutes = ($Min - ($iHours * 60)) / 100;
		 $tHours = $iHours + $Minutes;
		if ($Minutes < 0)
		{
			$tHours = $tHours * (-1);
		}
		$aHours = explode(".", $tHours);
		$iHours = $aHours[0];
		if (empty($aHours[1]))
		{
			$aHours[1] = "00";
		}
		$Minutes = $aHours[1];
		if (strlen($Minutes) < 2)
		{
			$Minutes = $Minutes ."0";
		}
		if($iHours==0){
			$tHours = $Minutes." Minutes";
		}else{
			 $tHours = $iHours ." Hour ". $Minutes." Minutes";
		}
		return $tHours;
	}
	
		
}?>