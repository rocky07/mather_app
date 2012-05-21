<?php
	
	
	class Utilities extends Database_MySql
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
	
	function getNotifications($feedData,$id){	
		$notificationId=$feedData["notification_id"];
		$a=$feedData["user_name"];
		$b=$feedData["friend_name"];
		$sourceUserId=$feedData["source_user_id"];
		$friendUserId=$feedData["friend_user_id"];
		$questionId=$feedData["questans_id"];
		$group=$feedData["grp_name"];
		$answerId=$feedData["answer_id"];
		$groupId=$feedData["group_id"];
		$businessId=$feedData["business_id"];
		$happeningId=$feedData["happening_id"];
		$happening=$feedData["title"];
		$question=$feedData["question"];
		$answer=$feedData["answers"];
		$answerId=$feedData["answer_id"];
		$title=$feedData["title"];
		$businessName=$feedData["busi_name"];
		$notificationId = $feedData["notification_id"];
		
		//$notifications=array("${b} likes ${a}s answer ${answer}","${a} is following ${b}  question ${question}","${b} answered ${answer}  ${a}'s question ${question}");
		$notifications=array("",
		"<a href='profileVisit.php?gid=${friendUserId}'>${b}'s</a> likes <a href='profileVisit.php?gid=${sourceUserId}'>${a}'s</a> answer <a href='question-answers/${questionId}/${answer}'>${answer}</a>",
		"${b} is following ${a}'s question ${question}",
		"<a href='profileVisit.php?gid=${friendUserId}'>${b}</a> answered ${answer} on <a href='profileVisit.php?gid=${sourceUserId}'>${a}'s</a> question <a href='question-answers/${questionId}/${question}'>${question}</a>",
		"<a href='profileVisit.php?gid=${friendUserId}'>${a}</a> asked <a href='question-answers/${questionId}/${question}'>${question}</a>",
		"${a} and ${b} are now friends",
		"${happening}",
		"<a href='profileVisit.php?gid=${sourceUserId}'>${a}</a>  created a new business <a href='businesspublicprofile.php?bid=${businessId}'>${businessName}</a> ",
		"${b} is following ${a}'s business ${business}",
		"${b} posted a question on ${business}",
		"${b} answered ${answer} on business ${business}",
		"${b} likes ${a}'s question on business ${business}",
		"${b} is following group ${group}",	
		"<a href='profileVisit.php?gid=${friendUserId}'>${b}</a>   asked <a href='question-answers/${questionId}/${question}'>${question}</a> on group <a href='grouppublicprofile.php?gid=${groupId}'>${group}</a>",
		"${b} likes ${a}'s answer ${answer} on  group ${group}",
		"<a href='profileVisit.php?gid=${sourceUserId}'>${a}</a> created a new group <a href='grouppublicprofile.php?gid=${groupId}'>${group}</a>");
		
		return $notifications[$notificationId];
	
	}
	
	function getNoftificationStyle($id){
		$notificationClass=array("","like_feed","follow_feed","answer_feed","question_feed","friend_feed","answer_feed","like_feed","question_feed","friend_feed","like_feed","question_feed");
		return $notificationClass[$id];

		}
//for mather app
	function listAllProjects(){
		$query="SELECT id,name,project_image as images FROM tbl_project";
		$param	=	array("i",$admin_id);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}		
}?>