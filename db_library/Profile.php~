<?php 
class Profile extends Database_MySql
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
	
			
	function addQues($qu,$userid)
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
					
							
					
					$arra=array(
							"questans_id"=>$lastid,
							"notification_id"=>4,
							"source_user_id"=>$userid,
							"date_notified"=>$tdate);
							
					$type	=	"iiis";				
					$this->insert($arra,"notification",$type);
				$result	=	true;	
					
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}	
		return $result;
		
		}
		
	
   function getQues($start,$limit,$userId)
	{
		$qry	=	"SELECT q.*,u.user_name,u.user_id,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt
		 FROM `questions` q join user u on q.user_id=u.user_id where q.user_id=? order by q.id desc,q.date_created desc";
		$qry.=" LIMIT ?,?";
		$bound_param	=	array("iii",$userId,$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	 function getQuesMore($start,$limit,$userId,$lastid)
	{	
	  		
		$qry	=	"SELECT q.*,u.user_name,u.user_id,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q  join user u on q.user_id=u.user_id where q.user_id=? and q.id<? ORDER BY q.id DESC";
		$qry.=" LIMIT ?,?";
		
		$bound_param	=	array("iiii",$userId,$lastid,$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	 function fetchQuestionByAnswerId($answerId)
	{
		$qry	=	"select question_id from reply where id=?";			
		$bound_param	=	array("i",$id);
		$records	=	$this->fetchAll($qry,$bound_param);
		echo "-------------------$answerId-----".$records[0][0];	
		return $records;
	}
		
	 function getQuesById($id,$answerId)
	{
		if($answerId!=0){
			$id=$this->fetchQuestionByAnswerId($answerId);
			if(count($id)>0){
				$id=$id[0]["question_id"];
				}
			}		
				$qry	=	"SELECT q.*,u.user_name,u.user_id,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=?) as anscnt,(select count(id) from follow_question where question_id=?) as follcnt FROM `questions` q join user u on q.user_id=u.user_id where q.id=?";		
			
		$bound_param	=	array("iii",$id,$id,$id);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	function addAns($values,$userid,$id,$sid,$identListGrp)
		{
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array($values["question_body_text_field"]=>"Answer/EMPTY"
											));
		if($validator->validate())
		{
			
					$tdate		=	date("Y-m-d");			
					$array=array(
							"answers"=>$values["question_body_text_field"],
							"user_id"=>$userid,
							"question_id"=>$id,
							"date_posted"=>$tdate);	
					$type	=	"siis";				
				    $this->insert($array,"reply",$type);
					
					
					$tdate		=	date("Y-m-d");		
					
				
												
					if($identListGrp>0){
						$arra=array(
							"source_user_id"=>$sid,
							"notification_id"=>3,
							"friend_user_id"=>$userid,
							//"questans_id"=>$this->lastInsertId(),
							"answer_id"=>$this->lastInsertId(),
							"group_id"=>$identListGrp,	
							"date_notified"=>$tdate);								
							$type	=	"iiiiis";
						}	
						else{
					$arra=array(
							"source_user_id"=>$sid,
							"notification_id"=>3,
							"friend_user_id"=>$userid,
							//"questans_id"=>$this->lastInsertId(),
							"answer_id"=>$this->lastInsertId(),	
							"date_notified"=>$tdate);	
					$type	=	"iiiis";		
							}
									
				    $this->insert($arra,"notification",$type);
					
					
					
					
					$result	=	$true;
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
		function getAnsByQId($id,$start,$limit)
		{	
			$qry	=	"SELECT r.*,u.user_name,u.user_id,u.is_facebook_login,u.photo,q.question,(select count(id) from like_reply where reply_id=r.id) as lcnt FROM `reply` r join user u on r.user_id=u.user_id join questions q on q.id=r.question_id  where r.question_id=? order by r.id desc,r.date_posted desc";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iii",$id,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		function getAnsMore($start,$limit,$userId,$lastid,$qid)
		{	
			$qry	=	"SELECT r.*,u.user_name,u.is_facebook_login,u.photo,q.question,(select count(id) from like_reply where reply_id=r.id) as lcnt FROM `reply` r join user u on r.user_id=u.user_id join questions q on q.id=r.question_id where r.question_id=? and r.id<? ORDER BY r.id DESC";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iiii",$qid,$lastid,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		
		function getAnsProfile($start,$limit,$userId){
		
		    $qry	=	"SELECT r.*,u.user_name,u.is_facebook_login,u.photo,q.question,(select count(id) from like_reply where reply_id=r.id) as lcnt FROM `reply` r join user u on r.user_id=u.user_id join questions q on q.id=r.question_id where r.user_id=? ORDER BY r.id desc,r.date_posted desc";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iii",$userId,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;		
		
		}
		
		function getAnsMoreProfile($start,$limit,$userId,$lastid){
		
		    $qry	=	"SELECT r.*,u.user_name,u.is_facebook_login,u.photo,q.question,(select count(id) from like_reply where reply_id=r.id) as lcnt FROM `reply` r join user u on r.user_id=u.user_id join questions q on q.id=r.question_id where r.user_id=? and r.id<? ORDER BY r.id desc";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iiii",$userId,$lastid,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;		
		
		}
		
	  function getGenQues($keyword,$start,$limit)
		{	 
		 
			if(strip_tags($keyword)==""){
			
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,	(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q join user u on q.user_id=u.user_id ";			
			
			if($this->userId!=""){			
			$qr1 = 	"where (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);
			
			}else{
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  					
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			
			$bound_param	=	array("ii",$start,$limit);
			
			}
			
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		
		
		
		
		
		
		function getGenQuesMore($start,$limit,$lastid,$keyword)
			{						
				
			if($keyword==""){
				$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q  join user u on q.user_id=u.user_id where q.id<? ";
			
			//$bound_param	=	array("i",$lastid);
			
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("iii",$lastid,$start,$limit);

			}else{			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id where q.id<'$lastid' and match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
					
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);		
			}
		
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
			
			
			
			
			
	   function deleteQues($id,$userid)
			{
				$tname	=	"questions";
				$condition	=	"id=? and user_id=?";
				$param		=	array("ii",$id,$userid);
				$this->delete($tname,$condition,$param);
			}	
		function deleteAns($id,$userid)
			{
				$tname	=	"reply";
				$condition	=	"id=? and user_id=?";
				$param		=	array("ii",$id,$userid);
				$this->delete($tname,$condition,$param);
			}	
			
		 function deleteByUserPosted($id)
			{
				$tname	=	"reply";
				$condition	=	"id=?";
				$param		=	array("i",$id);
				$this->delete($tname,$condition,$param);
			}	
				
			
			
	  function viewCounter($id)
		{
			$qry	=	"SELECT view_count FROM `questions` where id=?";				
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);	
			
			$count = $records[0]["view_count"]+1;
			
			
			$result		=	false;
			$val	=	array("view_count"=>$count);
			$tname	=	"questions";
			$cond	=	"id=? ";
			$param	=	array($id);
			$ty		=	"ii";
			$this->update($val,$tname,$cond,$param,$ty);
				
		
		}	
		
		
		 function getGenRelatedQues($id,$keyword,$start,$limit)
		{
			$qry	=	"SELECT q.*,u.user_name,u.user_id,u.is_facebook_login,u.photo FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE) and q.id!=? ";
			
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("iii",$id,$start,$limit);
	
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}	
		
		 function getGenRelatedQuesForHap($keyword,$start,$limit)
		{
			$qry	=	"SELECT q.*,u.user_name,u.user_id,u.is_facebook_login,u.photo FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";

			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);
	

			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}	
		
		 function getUserForQues($id)
		{
			$qry	=	"SELECT user_id from questions where id=?";		
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["user_id"];
		}
		
		 function getUserForQuesInFollow($id)
		{
			$qry	=	"SELECT * from questions where id=?";		
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}	
		
		 function getEntryForLike($aid,$userid)	 
		{		  
			$qry	=	"SELECT id from like_reply where reply_id=? and liked_by_user_id=?";		
			$bound_param	=	array("ii",$aid,$userid);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["id"];
		}	
		
		 function getUserForAns($aid)
		{
			$qry	=	"SELECT user_id from reply where id=?";		
			$bound_param	=	array("i",$aid);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["user_id"];
		}	
		function getQuestionIdForAns($aid)
		{
			$qry	=	"SELECT question_id from reply where id=?";		
			$bound_param	=	array("i",$aid);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["question_id"];
		}
		
		function EntryLike($userid,$aid,$AnsUsid)
		{	
		$questionId=$this->getQuestionIdForAns($AnsUsid);
		$result	=	false;
		$util	=	new Utilities();
		$tdate		=	date("Y-m-d");			
					$array=array(
							"reply_id"=>$aid,
							"liked_by_user_id"=>$userid,
							"date_liked"=>$tdate);
							
					$type	=	"iis";				
					$this->insert($array,"like_reply",$type);
					
					$arra=array(
							"notification_id"=>1,
							"source_user_id"=>$AnsUsid,
							"date_notified"=>$tdate,
							"answer_id"=>$aid,
							"questans_id"=>$questionId,							
							"friend_user_id"=>$userid);
							
					$type	=	"iisiii";				
					$this->insert($arra,"notification",$type);
				
					$result	=	$true;		
		return $result;
		
		}
		
		function EntryunLike($entryid)
			{
				$tname	=	"like_reply";
				$condition	=	"id=?";
				$param		=	array("i",$entryid);
				$this->delete($tname,$condition,$param);
			}	
			
			
		 function getEntryForFollow($id,$userid)	 
			{		  
				$qry	=	"SELECT id from follow_question where question_id=? and follower_id=?";		
				$bound_param	=	array("ii",$id,$userid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]["id"];
			}		
				
		 function EntryFollow($userid,$qid,$quesUseId)
			{	
			
			$result	=	false;
			$util	=	new Utilities();
			$tdate		=	date("Y-m-d");			
						$array=array(
								"question_id"=>$qid,
								"follower_id"=>$userid,
								"date_followed"=>$tdate);
								
						$type	=	"iis";				
						$this->insert($array,"follow_question",$type);
						
						$arra=array(
								"questans_id"=>$qid,
								"source_user_id"=>$quesUseId,
								"notification_id"=>2,
								"friend_user_id"=>$userid,
								"date_notified"=>$tdate);
								
						$type	=	"iiiis";				
						$this->insert($arra,"notification",$type);
					
						$result	=	$true;							
			    return $result;
			
			}	
			
			
			 function EntryUnFollow($userid,$qid,$quesUseId)
			{				
					$tname	=	"follow_question";
					$condition	=	"question_id=? and follower_id=?";
					$param		=	array("ii",$qid,$userid);
					$this->delete($tname,$condition,$param);
			
				    $tname	=	"notification";
					$condition	=	"questans_id=? and source_user_id=? and notification_id=3 and friend_user_id=?";
					$param		=	array("iii",$qid,$quesUseId,$userid);
					$this->delete($tname,$condition,$param);			
			}
				
			
		 function getMyFeed($userid,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id=? or n.friend_user_id =?) order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiii",$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	
			
			
	/*	 function getMyFeed($userid,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id=? or n.friend_user_id =?) and (n.date_notified=curdate() or To_DAYS(n.date_notified) >= To_DAYS(NOW())-5) order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiii",$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
		 function getMyFeedMore($start,$limit,$id,$userid)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id=? or n.friend_user_id =?) and (n.date_notified=curdate() or To_DAYS(n.date_notified) >= To_DAYS(NOW())-5) and n.id<? order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiii",$userid,$userid,$id,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
			
			*/
			
			 function getMyFeedMore($start,$limit,$id,$userid)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id=? or n.friend_user_id =?) and n.id<? order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiii",$userid,$userid,$id,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
		/*	 function getFeedForHome($userid,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id =? or n.source_user_id in (select friend_id from friends where user_id =?) or n.friend_user_id=? or n.friend_user_id in (select friend_id from friends where user_id =?)) and (n.date_notified=curdate() or To_DAYS(n.date_notified) >= To_DAYS(NOW())-5) order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiiii",$userid,$userid,$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	
			
		function getFeedForHomeMore($userid,$id,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where n.id<? and (n.source_user_id =? or n.source_user_id in (select friend_id from friends where user_id =?) or n.friend_user_id=? or n.friend_user_id in (select friend_id from friends where user_id =?)) and (n.date_notified=curdate() or To_DAYS(n.date_notified) >= To_DAYS(NOW())-5) order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiiiii",$id,$userid,$userid,$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	
			*/
			
		 function getFeedForHome($userid,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where (n.source_user_id =? or n.source_user_id in (select friend_id from friends where user_id =?) or n.friend_user_id=? or n.friend_user_id in (select friend_id from friends where user_id =?))  order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiiii",$userid,$userid,$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	
			
		function getFeedForHomeMore($userid,$id,$start,$limit)	 
			{		  
				$qry	=	"SELECT n.*,m.message FROM notification n join notification_master m on m.id=n.notification_id where n.id<? and (n.source_user_id =? or n.source_user_id in (select friend_id from friends where user_id =?) or n.friend_user_id=? or n.friend_user_id in (select friend_id from friends where user_id =?)) order by n.id desc,n.date_notified desc LIMIT ?,?";		
				$bound_param	=	array("iiiiiii",$id,$userid,$userid,$userid,$userid,$start,$limit);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	
			
			
		 function getCntAnsw($id)	 
			{		  
			$qry	=	"SELECT count(id) from like_reply where reply_id=?";		
			$bound_param	=	array("i",$id);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records[0]["count(id)"];
			}
			
			function getMyNotificat($id)	 
			{		  
				
				
				$qry	=	"SELECT n.*,u.user_name,u.user_id,u2.user_name as fname,u2.user_id as fid FROM notification n inner join user u inner join user u2 on n.source_user_id=u.user_id and n.friend_user_id=u2.user_id where n.notification_id=1 and n.id=? order by n.date_notified desc";					
				$bound_param	=	array("i",$id);
			    $records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
			
			function getMyNotificatLike($id)	 
			{		  
				$qry	=	"SELECT n.*,u.user_name,u.user_id,u2.user_name as fname,u2.user_id as fid,r.answers,r.question_id,q.question FROM notification n inner join user u inner join user u2 on n.source_user_id=u.user_id and
n.friend_user_id=u2.user_id join reply r on r.id=n.questans_id join questions q on q.id=r.question_id where n.notification_id=4 and n.id=? order by n.date_notified desc";					
				$bound_param	=	array("i",$id);
			    $records	=	$this->fetchAll($qry,$bound_param);	
				return $records;
			}
			
			function getMyNotificatAnsQues($id)	 
			{		  
			    $qry	=	"SELECT n.*,u.user_name,u.user_id,u2.user_name as fname,u2.user_id as fid,r.answers,r.question_id,q.question FROM notification n inner join user u inner join user u2 on n.source_user_id=u.user_id and
n.friend_user_id=u2.user_id join reply r on r.id=n.questans_id join questions q on r.question_id=q.id where n.notification_id=5 and n.id=? order by n.date_notified desc";					
				$bound_param	=	array("i",$id);
			    $records	=	$this->fetchAll($qry,$bound_param);	
				return $records;
			}
			
			
			function getMyNotificatQues($id)	 
			{		  
				$qry	=	"SELECT n.*,u.user_name,u.user_id,u.photo,u.is_facebook_login,q.question,q.id as qid FROM notification n inner join user u on u.user_id=n.source_user_id inner join questions q on q.id=n.questans_id where notification_id=2 and n.id=? order by n.date_notified desc";					
				$bound_param	=	array("i",$id);
			    $records	=	$this->fetchAll($qry,$bound_param);	
				return $records;
			}	
			
			function getMyNotificatFollowQues($id)	 
			{		  
				$qry	= "SELECT n.*,u.user_name,u.user_id,u2.user_name as fname,u2.user_id as fid,q.question,q.id as qid FROM notification n inner join user u inner join user u2 on n.source_user_id=u.user_id and
n.friend_user_id=u2.user_id join questions q on q.id=n.questans_id where n.notification_id=3 and n.id=? order by n.date_notified desc";					
				$bound_param	=	array("i",$id);
			    $records	=	$this->fetchAll($qry,$bound_param);			
				return $records;
			}	
			
			
			function getMyNotificatHappening($id,$userid)	 
			{		  
				$qry	=	"SELECT n.*,u.user_name,u.user_id,u.photo,u.is_facebook_login,h.title,h.id as hid FROM notification n inner join user u on u.user_id=n.source_user_id inner join happenings h on h.id=n.questans_id where notification_id=6 and n.id=? and n.friend_user_id=? order by n.date_notified desc";					
				$bound_param	=	array("ii",$id,$userid);
			    $records	=	$this->fetchAll($qry,$bound_param);	
				return $records;
			}	
			
			
			function getPopularQues($keyword,$start,$limit)	 
			{	
		
		    if(strip_tags($keyword)==""){
			$qry	= "SELECT q.*,u.user_name,u.is_facebook_login,u.photo,count(f.id) as cnt FROM questions q left join follow_question f on f.question_id=q.id join user u on u.user_id=q.user_id";	
			
			
			if($this->userId!=""){			
			$qr1 = 	" where (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
		    $qry=$qry.$qr1." group by q.id order by q.view_count desc, cnt desc LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);
		
			}else{
			
			$qry	=	"SELECT q.*,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
			
			
			if($this->userId!=""){			
			$qr1 = 	" and q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);
				
			}
			
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
			
			}
			
			function getPopularQuesMore($start,$limit,$keyword)	 
			{	
		  
			  if(strip_tags($keyword)==""){				  
			    $qry	= "SELECT q.*,count(f.id) as cnt FROM questions q left join follow_question f on f.question_id=q.id";		
				$bound_param	=	array("i",$start);
				
				if($this->userId!=""){			
				$qr1 = 	" where (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
				}
				
				$qry=$qry.$qr1." group by q.id order by q.view_count desc, cnt desc LIMIT ?,10";
				$bound_param	=	array("i",$start);
				
				
				
				}else{
			
				$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE) ";
				
				
				if($this->userId!=""){			
				$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
				}
				
				$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,10";
				$bound_param	=	array("i",$start);
	
			
			}
				
			    $records	=	$this->fetchAll($qry,$bound_param);				
				return $records;
			}	
			
			function getPopularQuesReplyCnt($qid)	 
			{		  
				$qry	= "SELECT count(id) FROM reply where question_id=?";		
				$bound_param	=	array("i",$qid);
			    $records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]["count(id)"];
			}	
			
			 function getUserDetailsForPop($qid)
			{
				$qry	=	"SELECT u.user_name,u.is_facebook_login,u.photo,u.user_id,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt  FROM `questions` q join user u on q.user_id=u.user_id where q.id=? ";
				
				$bound_param	=	array("i",$qid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
			 function checkFriend($gid,$userid)
			{
				$qry	=	"SELECT id,is_friend_approved from friends where (user_id=? and friend_id=?) or (user_id=? and friend_id=?) ";
				
				$bound_param	=	array("iiii",$gid,$userid,$userid,$gid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
				
				
		//pradosh
		
			 
		  function CountgetGenQues($keyword)
			{
			if(strip_tags($keyword)==""){
			
			
			$qry	=	"SELECT count(q.id) FROM `questions` q join user u on q.user_id=u.user_id ";			
			
			if($this->userId!=""){			
			$qr1 = 	"where (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc";
			}else{
			
			$qry	=	"SELECT count(q.id) FROM questions q join user u on q.user_id= u.user_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  					
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc";
	
			}
			
			$records	=	$this->fetchAll($qry);
			$this->totalRecords	=	$records[0]["count(q.id)"];		
			return $records;
		}
		
		function chkBusiness($qid){				
		        $qry	=	"SELECT q.*,b.business_id,b.busi_name,b.imagepath from questions q join business_questions bq on bq.ques_id=q.id join business b on b.business_id=bq.business_id where q.id=?";				
				$bound_param	=	array("i",$qid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;		
		}	
		
		
		function chkGroupsForQues($qid){				
		        $qry	=	"SELECT q.*,g.id,g.grp_name,g.icon_image from questions q join group_question gq on gq.ques_id=q.id join groups g on g.id=gq.grp_id where q.id=?";				
				$bound_param	=	array("i",$qid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;		

		}	
		


		//sreejith
		
		 function getProfileQues($start,$limit,$profileId)
	{
		$qry	=	"SELECT q. * , u.user_name, u.user_id, u.is_facebook_login, u.photo, (SELECT COUNT( id )FROM reply WHERE question_id = q.id ) AS anscnt, ( SELECT COUNT( id ) FROM follow_question WHERE question_id = q.id ) AS follcnt FROM  `questions` q LEFT JOIN group_question g ON q.id = g.ques_id JOIN user u ON q.user_id = u.user_id WHERE q.user_id =? AND g.grp_id IS NULL ORDER BY q.id DESC , q.date_created DESC";
		$qry.=" LIMIT ?,?";
		$bound_param	=	array("iii",$profileId,$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
	
	 function getQuesMoreinprofileQ($start,$limit,$profileId,$lastid)
	{	

	  		

	  	
		$qry	=	"SELECT q. * , u.user_name, u.user_id, u.is_facebook_login, u.photo, (SELECT COUNT( id )FROM reply WHERE question_id = q.id ) AS anscnt, ( SELECT COUNT( id ) FROM follow_question WHERE question_id = q.id ) AS follcnt FROM  `questions` q LEFT JOIN group_question g ON q.id = g.ques_id JOIN user u ON q.user_id = u.user_id WHERE  q.id<? and q.user_id =? and g.grp_id IS NULL ORDER BY q.id DESC , q.date_created DESC";
	   $qry.=" LIMIT ?,?";
		
		$bound_param	=	array("iiii",$lastid,$profileId,$start,$limit);

		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	

	
	function getAnsinProfileA($start,$limit,$profileId){
		
		    $qry	=	"SELECT r. * , u.user_name, u.is_facebook_login, u.photo, q.question, (SELECT COUNT( id ) FROM like_reply WHERE reply_id = r.id ) AS lcnt FROM  `reply` r JOIN user u ON r.user_id = u.user_id JOIN questions q ON q.id = r.question_id LEFT JOIN group_question g ON g.ques_id = q.id WHERE r.user_id =? AND g.grp_id IS NULL ORDER BY r.id DESC , r.date_posted DESC";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iii",$profileId,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;		
		
		}
		
		
		function getAnsMoreinProfileA($start,$limit,$profileId,$lastid){
		
		    $qry	=	"SELECT r. * , u.user_name, u.is_facebook_login, u.photo, q.question, (SELECT COUNT( id ) FROM like_reply WHERE reply_id = r.id ) AS lcnt FROM  `reply` r JOIN user u ON r.user_id = u.user_id JOIN questions q ON q.id = r.question_id LEFT JOIN group_question g ON g.ques_id = q.id WHERE  r.id<? and r.user_id =? AND g.grp_id IS NULL ORDER BY r.id DESC , r.date_posted DESC";	
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("iiii",$lastid,$profileId,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;		
		
		}
		

	    function getPrfId($pname){				
		        $qry	=	"SELECT * from user where profile_name=?";				
				$bound_param	=	array("s",$pname);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]["user_id"];		
		}
/* created by rakesh for news feed 10/03/2012 */
function getFeeds($userId,$start,$limit)	{

	    $qry	=	"SELECT notification.*,notification_master.message,questions.question,reply.answers,happenings.title,business.busi_name,user.user_name,friend_user.user_name as friend_name,groups.grp_name  FROM notification inner join notification_master on notification.notification_id=notification_master.id left join questions on notification.questans_id=questions.id left join reply on reply.id=notification.answer_id left join happenings on happenings.id=notification.happening_id left join business on business.business_id=notification.business_id left join user on user.user_id=notification.source_user_id left join user friend_user on friend_user.user_id=notification.friend_user_id left join groups on groups.id=notification.group_id  WHERE notification.source_user_id=? or notification.friend_user_id in (select friend_id from friends where user_id=?) or happening_id is not null limit ?,? ";
			$bound_param	=	array("iiii",$userId,$userId,$start,$limit);
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;		
	 	
	}		

	
		
}?>
