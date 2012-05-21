<?php 
class Happenings extends Database_MySql
{
	public $errorMessage;
	public $userId;
	private $utilObject;
	
	
	function __construct()
	{
		parent::__construct();
		$this->connect();
		$this->userId	=	null;
		$this->utilObject	=	new Utilities();
		
	}
	/*
	 * to set user_id for each page
	 * author: Jiby
	 */
	function setUserId($id)
	{
		 $this->userId	=	$id;
	}
	
			
	function addHappenings($values)
		{	
		
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array($values["source"]=>"Source/EMPTY",
		                                   $values["sourcelink"]=>"Sourcelink/EMPTY",
										   $values["title"]=>"Title/EMPTY",
										   $values["brief"]=>"Brief/EMPTY",
											));
	    
		$qry	=	"SELECT * FROM `user` where defa_user=1";		
		$records	=	$this->fetchAll($qry);		
		
		
		$qury	=	"SELECT * FROM `friends` where user_id=?";		
		$bound_param	=	array("i",$records[0]["user_id"]);
		$reords	=	$this->fetchAll($qury,$bound_param);								
											
											
		if($validator->validate())
		{
			
					$tdate		=	date("Y-m-d");			
					$array=array(
							"source_name"=>$values["source"],
							"source_link"=>$values["sourcelink"],
							"title"=>$values["title"],
							"brief"=>$values["brief"],
							"created_date"=>$tdate);
							
					$type	=	"sssss";				
					$this->insert($array,"happenings",$type);	
					
					$lid = $this->lastInsertId();
					
		//	 for($t=0;$t<count($reords);$t++){					
					
					$array=array(
							"notification_id"=>6,
							"happening_id"=>$lid,
							"date_notified"=>$tdate);
					$type	=	"iis";				
					$this->insert($array,"notification",$type);
					
		  //      }				
							
    				$result	=	$true;
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
	
   function fetchHappenings($start,$limit)
	{   
	    $qry	=	"SELECT count(id) FROM `happenings`";
		$records	=	$this->fetchAll($qry);
		$this->totalRec = $records[0]["count(id)"];
		
		$qry	=	"SELECT * FROM `happenings` LIMIT ?,?";	
		$bound_param	=	array("ii",$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	  function deleteHappenings($id)
		{
			$tname	=	"happenings";
			$condition	=	"id=?";
			$param		=	array("i",$id);			
			$this->delete($tname,$condition,$param);
			
		}
		
		 function getHappening($id)
		{   
			$qry	=	"SELECT * FROM `happenings` where id=?";	
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		function updateHappenings($values,$id)
		{	
			
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array($values["source"]=>"Source/EMPTY",
		                                   $values["sourcelink"]=>"Sourcelink/EMPTY",
										   $values["title"]=>"Title/EMPTY",
										   $values["brief"]=>"Brief/EMPTY",
											));
		if($validator->validate())
		{
			
					$tdate		=	date("Y-m-d");			
					$array=array(
							"source_name"=>$values["source"],
							"source_link"=>$values["sourcelink"],
							"title"=>$values["title"],
							"brief"=>$values["brief"],
							"created_date"=>$tdate);
							
					$tname	=	"happenings";
					$cond	=	"id=? ";
					$param	=	array($id);
					$ty		=	"sssssi";
					$this->update($array,$tname,$cond,$param,$ty);
										
					$result	=	$true;
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
	 function getHappeningsForPublic($start,$limit)
	{   
		$qry	=	"SELECT h.* FROM `happenings` h order by h.id desc,h.created_date desc LIMIT ?,?";	
		$bound_param	=	array("ii",$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	 function getHappeningsMoreForPublic($start,$limit,$lastid)
	{   
		$qry	=	"SELECT * FROM `happenings` where id<? ORDER BY id desc LIMIT ?,?";	
		$bound_param	=	array("iii",$lastid,$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	
	 function getHappeningsForPublicById($id)
	{   
		$qry	=	"SELECT * FROM `happenings` where id=?";	
		$bound_param	=	array("i",$id);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}  
	
	 function viewCounterForHappening($id)
		{
			$qry	=	"SELECT no_of_clicks FROM `happenings` where id=?";				
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);	
			
			$count = $records[0]["no_of_clicks"]+1;
			
			
			$result		=	false;
			$val	=	array("no_of_clicks"=>$count);
			$tname	=	"happenings";
			$cond	=	"id=? ";
			$param	=	array($id);
			$ty		=	"ii";
			$this->update($val,$tname,$cond,$param,$ty);
				
		
		}	
		
		
		 function getEntryForLikeHappening($id,$userid)	 
		{		  
			$qry	=	"SELECT id from like_happenings where happening_id=? and user_id=?";		
			$bound_param	=	array("ii",$id,$userid);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["id"];
		}	
		
		 function getCntHappening($id)	 
		{		  
			$qry	=	"SELECT count(id) from like_happenings where happening_id=?";		
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["count(id)"];
		}	
		
		function EntryLikeHappening($userid,$id)
		{	
		
		$result	=	false;
		$util	=	new Utilities();
		$tdate		=	date("Y-m-d");			
					$array=array(
							"happening_id"=>$id,
							"user_id"=>$userid,
							"date_liked"=>$tdate);
							
					$type	=	"iis";				
					$this->insert($array,"like_happenings",$type);
					$result	=	$true;		
		return $result;
		
		}
		
		function EntryunLikeHappening($entryid)
			{
				$tname	=	"like_happenings";
				$condition	=	"id=?";
				$param		=	array("i",$entryid);
				$this->delete($tname,$condition,$param);
			}	
			
			
			
			
	
		
}?>