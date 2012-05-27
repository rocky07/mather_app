<?php 
class Business extends Database_MySql
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
	 * author: Rekha
	 */
	function setUserId($id)
	{
		 $this->userId	=	$id;
	}
	

	
   function getTags($tag)
	{
		$qry	=	"SELECT * from tag_master where tags like '%$tag%' order by id desc";			
		$records	=	$this->fetchAll($qry);		
		return $records;
	}
	
   function addBusiness($values,$imagepath,$userId,$taglist){	
	
		$result	=	false;
	
		 $date		=	date("Y-m-d");
		 	
		 $validator	=	new Validator(array($values["txtcategory"]=>"Title/EMPTY",		                                   
											$values["txtname"]=>"Title/EMPTY",
											$values["tag"]=>"Title/EMPTY",											
		                                    $values["txtloc"]=>"Title/EMPTY"
		                 ));
		 
			if($validator->validate())
			{
	
					$array=array(
								"busi_name"=>$values["txtname"],
								"categ_id"=>$values["txtcategory"],							
								"created_date"=>$date,
								"created_by"=>$userId,
								"location"=>$values["txtloc"],	
								"profile_name"=>$values["businame"],
								"website"=>$values["webadd"],	
								"description"=>$values["txtbio"],
								"imagepath"=>$imagepath	
								);
		
					$type	=	"sisisssss";				
					$this->insert($array,"business",$type);
	
					
                  $bid = $this->lastInsertId();   
                  
                  //creates business notifications ..modified by Rakesh
                  $arrayNotification=array(
                  		"notification_id"=>7,
                  		"source_user_id"=>$userId,
								"business_id"=>$bid,
								"date_notified"=>date("Y-m-d")					
								);
		
					$te	=	"iiis";				
					$this->insert($arrayNotification,"notification",$te);
					//business notifications ends
				   
				  for($r=0;$r<count($taglist);$r++) 
					{
					
					//checking tag in master
					
					$qtry	=	"SELECT * FROM `tag_master` where tags=?";					
					$bound_param	=	array("s",$taglist[$r]);		
					$recrds	=	$this->fetchAll($qtry,$bound_param);
					
					if(count($recrds)<=0){					
					
					//tag master insertion
					
					$array=array(
								"tags"=>$taglist[$r]								
								);
		
					$tpe	=	"s";				
					$this->insert($array,"tag_master",$tpe);		
					
					// business tags insertion
					
					 $tid = $this->lastInsertId();   
				   
					
					$aray=array(
								"business_id"=>$bid,
								"tag_id"=>$tid,								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"business_tag",$te);	
					
							
					}else{
					
				    	
					$aray=array(
								"business_id"=>$bid,
								"tag_id"=>$recrds[0]["id"],								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"business_tag",$te);						
					
					}				
					
				   }
						
				   $result	=	true;			     
			}
			else
			{	
				$this->setError($validator->getMessage())	;
			}
			return $result;	
		}	
		
	   function fetchBusinessByCatId($catid,$start,$limit)
		{	
		
			$qry	=	"SELECT * FROM `business` where categ_id=? ";
			$qry.=" LIMIT ?,?";		
			$bound_param	=	array("iii",$catid,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		function fetchBusinessMore($catid,$lastid,$limit)
		{			
			$qry	=	"SELECT * FROM `business` where categ_id=? and business_id >? ";
			$qry.=" LIMIT 0,?";		
			$bound_param	=	array("iii",$catid,$lastid,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;			
		}
		
		
		 function fetchBusiDetailsById($id)
		{			
			$qry	=	"SELECT * FROM `business` where business_id=? ";		
			$bound_param	=	array("i",$id);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;			
		}
		
		 function getEntryForFollowBusi($id,$userid)	 
			{	  				
				$qry	=	"SELECT id from business_followers where business_id=? and follower_id=?";		
				$bound_param	=	array("ii",$id,$userid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]["id"];
			}	
			
		 function insertFollowBus($busid,$userId)
		{
		$date=date("y-m-d");
		   $array=array("business_id"=>$busid,
						"date_followed"=>$date,
						"follower_id"=>$userId
						);
			$type	=	"isi";			
			$this->insert($array,"business_followers",$type);
		}
		
			function deleteFollowBus($busid,$userId)
		{
			$tname	=	"business_followers";
			$condition	=	"business_id=? and follower_id=?";
			$param		=	array("ii",$busid,$userId);			
			$this->delete($tname,$condition,$param);
			
		}
		
			function getBusinessFollowers($bid,$limitfr)
			{			
			$query="SELECT u.user_name,u.user_id,u.photo,u.is_facebook_login FROM `business_followers` f JOIN `user` u ON f.follower_id=u.user_id join business b on b.business_id=f.business_id WHERE f.business_id=? and u.`status`='1' order by rand() LIMIT 0,?";
							
				
				$param	=	array("ii",$bid,$limitfr);
		     	$records	=	$this->fetchAll($query,$param);			
				$this->pageRecords	=	count($records);
				return $records;
			}	
			
	 function addBusiQues($qu,$userid,$busid)
		{	
		
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array($qu=>"Question/EMPTY"
											));
		if($validator->validate())
		{
			
					$tdate		=	date("Y-m-d");			
					$array=array(
							"question"=>$qu,
							"user_id"=>$userid,
							"date_created"=>$tdate);
							
					$type	=	"sis";				
					$this->insert($array,"questions",$type);
					
					$lastid = $this->lastInsertId();	
					
					$arr=array(
							"ques_id"=>$lastid,								
							"business_id"=>$busid);
							
					$tpe	=	"ii";				
					$this->insert($arr,"business_questions",$tpe);
					
							
					/*
					$arra=array(
							"questans_id"=>$lastid,
							"notification_id"=>2,
							"source_user_id"=>$userid,
							"date_notified"=>$tdate);
							
					$type	=	"iiis";				
					$this->insert($arra,"notification",$type);*/
				$result	=	true;	
					
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}	
		return $result;
		
		}
		
		
		
		
		 function getBusinessGenQues($bid,$keyword,$start,$limit)
		{	 
		 
			if(strip_tags($keyword)==""){
			
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,	(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q join user u on q.user_id=u.user_id join business_questions b on b.ques_id = q.id join business bu on bu.business_id = b.business_id where b.business_id=? ";			
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("iii",$bid,$start,$limit);
			
			}else{
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,bu.business_id,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id join business_questions b on b.ques_id = q.id join business bu on bu.business_id = b.business_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE) and b.business_id=?";
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  					
			}
			
		    $qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			
			$bound_param	=	array("iii",$bid,$start,$limit);
			
			}
			
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		
		
		
		function getBusinessQuesMore($start,$limit,$lastid,$keyword,$bid)
			{						
				
			if($keyword==""){
				$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q  join user u on q.user_id=u.user_id join business_questions b on b.ques_id = q.id join business bu on bu.business_id = b.business_id where q.id<? and b.business_id=?";
			
			//$bound_param	=	array("i",$lastid);
			
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("iiii",$lastid,$bid,$start,$limit);

			}else{			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id  join business_questions b on b.ques_id = q.id join business bu on bu.business_id = b.business_id where q.id<'$lastid' and  b.business_id=? and match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
					
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("iii",$bid,$start,$limit);		
			}
		
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
		
		   function fetchDetailsBu($bid)
			{			
			    $query="SELECT * ,(SELECT COUNT( id ) FROM business_followers WHERE business_id =? ) AS follCnt, (SELECT COUNT( id ) FROM business_questions WHERE business_id =?) AS quesCnt FROM  `business` WHERE business_id =?";			
				$param	=	array("iii",$bid,$bid,$bid);
		     	$records	=	$this->fetchAll($query,$param);							
				return $records;
			}	
			
			 function fetchTagsBu($bid)
			{			
			    $query="SELECT t.*,m.tags FROM `business_tag` t join tag_master m on t.tag_id=m.id  WHERE t.business_id =?";			
				$param	=	array("i",$bid);
		     	$records	=	$this->fetchAll($query,$param);							
				return $records;
			}	

	//pradosh

		function searchDetailsBu($keyword,$start,$limit)
			{	
				$qry		=	"";
				$qry.=" AND `busi_name` LIKE ?";			
				$query	=	"SELECT count(`business_id`) FROM  `business` WHERE `business_id`!=''";
				$query.=$qry;
				$bound_param[0].=	"s";
				array_push($bound_param,"%".$keyword."%");		
				$records	=	$this->fetchAll($query,$bound_param);
				$this->totalRecords	=	$records[0]["count(`business_id`)"];
				//print_r($records);
				//exit;
				unset($records);
			
					
			    $query="SELECT * FROM  `business` WHERE busi_name LIKE ?";
				$query.=" LIMIT ?,?";			
				$param	=	array("sii","%".$keyword."%",$start,$limit);
		     	$records	=	$this->fetchAll($query,$param);							
				return $records;
			}
		function fetchTagById($buzid)
			{
				$qry	=	"SELECT tag_master.tags
						 FROM tag_master
						 INNER JOIN business_tag ON tag_master.id = business_tag.tag_id
						 WHERE business_tag.business_id =?";	
				$bound_param	=	array("s",$buzid);		
				$recrds	=	$this->fetchAll($qry,$bound_param);
				return $recrds;			 
			}
			
			
		function UpdateBasicInfo($values,$fname,$tagarray,$bid)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["businesscategary"]=>"Title/EMPTY",
											$values["txtname"]=>"Title/EMPTY",
											$values["txtloc"]=>"Title/EMPTY",
											$values["tag"]=>"Title/EMPTY"	                                   
										 ));
		if($validator->validate())
		{		
			$array=array(					
						"categ_id"=>$values["businesscategary"],
						"busi_name"=>$values["txtname"],
						"website"=>$values["txtEmail"],
						"description"=>$values["txtbio"],
						"location"=>$values["txtloc"],
						"imagepath"=>$fname	
						);
			$type	=	"isssssi";
			$cond	=	"business_id=? ";
			$param	=	array($bid);			
			$this->update($array,"business",$cond,$param,$type);
			//$gid = $this->lastInsertId();
			$tname	=	"business_tag";
			$condition	=	"business_id=?";
			$param		=	array("i",$bid);			
			$this->delete($tname,$condition,$param);	
			$i=0;
			while($i<count($tagarray))
			{
				//checkinng tag already exists
				$qtry	=	"SELECT * FROM `tag_master` where tags=?";					
				$bound_param	=	array("s",$tagarray[$i]);		
				$recrds	=	$this->fetchAll($qtry,$bound_param);
				if(count($recrds)<=0){	
					
					//tag master insertion
					
					$array=array(
								"tags"=>$tagarray[$i]								
								);
		
					$tpe	=	"s";				
					$this->insert($array,"tag_master",$tpe);
					
					// group tags insertion
					
					$tid = $this->lastInsertId();
					$aray=array(
								"business_id"=>$bid,
								"tag_id"=>$tid,								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"business_tag",$te);
				   }
				  else
				  {
				  	$aray=array(
								"business_id"=>$bid,
								"tag_id"=>$recrds[0]["id"],								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"business_tag",$te);						
					
					} 
				$i++;
			}
			$result	=	true;			     
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
	function getBusinessCount($userId){			
		$query="SELECT (count( `business_id` ) + (SELECT count( `id` ) FROM business_followers WHERE `follower_id` =? ))
				FROM business
				WHERE `created_by` =?";
		$param	=	array("ii",$userId,$userId);
		$records	=	$this->fetchAll($query,$param);	
		return $records[0]["(count( `business_id` ) + (SELECT count( `id` ) FROM business_followers WHERE `follower_id` =? ))"];		
	}
	
	
	function getMyBusiness($uid,$limitfr)
		{
			$qry	=	"SELECT * FROM `business` where created_by=? LIMIT 0,?";		
			$param	=	array("ii",$uid,$limitfr);		
			$records	=	$this->fetchAll($qry,$param);
			return $records;
		}
		
	function getPrevimage($bid)	
		{
			$qry	=	"SELECT imagepath FROM `business` where business_id=?";		
			$param	=	array("i",$bid);		
			$records	=	$this->fetchAll($qry,$param);
			return $records[0]['imagepath'];
		}
		
		function fetchUserBusinessByCatId($uid,$catid,$start,$limit)
		{			 
			$qry	=	"SELECT b.* FROM business b
						 LEFT JOIN business_followers f ON f.business_id = b.business_id
						 WHERE (created_by =? OR follower_id =?) AND b.categ_id =? GROUP BY b.business_id";
			$qry.=" LIMIT ?,?";		
			$bound_param	=	array("iiiii",$uid,$uid,$catid,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function fetchUserBusinessMore($uid,$catid,$lastid,$limit)
		{			
			$qry	=	"SELECT b.* FROM business b
						 LEFT JOIN business_followers f ON f.business_id = b.business_id
						 WHERE (created_by =? OR follower_id =?) AND b.categ_id =? AND b.business_id >? GROUP BY b.business_id";
			$qry.=" LIMIT 0,?";		
			$bound_param	=	array("iiiii",$uid,$uid,$catid,$lastid,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;			
		}
				
		//sreejith
			
			function fetchBusInfo($busid)
		{	
				
			$qry	=	"SELECT * FROM `business` where business_id=? ";		
			$bound_param	=	array("i",$busid);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
			
			
			
	function updateMoreInfo($values,$busid)
		{

		$result	=	false;
		$validator	=	new Validator(array($values["email"]=>"Title/EMAIL",
											$values["phone"]=>"Title/NUMBER",
											$values["postcode"]=>"Title/NUMBER"	                                   
										 ));
		if($validator->validate())
		{
			$array=array(					
						"mission"=>$values["mission"],
						"awards"=>$values["awards"],
						"products"=>$values["products"],
						"email"=>$values["email"],
						"phone"=>$values["phone"],
						"address"=>$values["address"],
						"city"=>$values["city"],
						"postal_code"=>$values["postcode"]					
					);						
			        $type	=	"ssssissii";	
			        $tname	=	"business";
				    $cond	=	"business_id=? ";
					$param	=	array($busid);
					
			$this->update($array,$tname,$cond,$param,$type);
			$result	=	true;
			}
		else
			{
				$this->setError($validator->getMessage())	;
			}
				return $result;
				
		}
		
		
		function getInfos($busid,$userId)
		{	
				
			$qry	=	"SELECT * FROM `business` where business_id=? and created_by=?";		
			$bound_param	=	array("ii",$busid,$userId);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
}?>