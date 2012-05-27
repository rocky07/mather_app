<?php 
class Group extends Database_MySql
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
	
	//pradosh
     function fetchGroupById($id,$start,$limit)
		{	
		
			$qry	=	"SELECT * FROM `groups` where category_id=? ";
			$qry.=" LIMIT ?,?";		
			$bound_param	=	array("iii",$id,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		function fetchGroupMore($id,$lastid,$limit)
		{	
		
			$qry	=	"SELECT * FROM `groups` where category_id=? and id >? ";
			$qry.=" LIMIT 0,?";		
			$bound_param	=	array("iii",$id,$lastid,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		function fetchGroupInfoById($groupid)
		{
			$qry	=	"SELECT * FROM `groups` where id=? ";
			$bound_param	=	array("s",$groupid);		
			$recrds	=	$this->fetchAll($qry,$bound_param);
			return $recrds;
		}
		function fetchTagById($groupid)
		{
			$qry	=	"SELECT tag_master.tags
						 FROM tag_master
						 INNER JOIN group_tag ON tag_master.id = group_tag.tag_id
						 WHERE group_tag.group_id =?";	
			$bound_param	=	array("s",$groupid);		
			$recrds	=	$this->fetchAll($qry,$bound_param);
			return $recrds;			 
		}
		function UpdateGroup($values,$fname,$tagarray,$gid)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["txtname"]=>"Title/EMPTY",
											$values["gcategory"]=>"Title/EMPTY",
											$values["tag"]=>"Title/EMPTY"	                                   
										 ));
		if($validator->validate())
		{		
			$array=array(					
						"grp_name"=>$values["txtname"],
						"category_id"=>$values["gcategory"],
						"icon_image"=>$fname	
						);
			$type	=	"sisi";
			$cond	=	"id=? ";
			$param	=	array($gid);			
			$this->update($array,"groups",$cond,$param,$type);
			//$gid = $this->lastInsertId();
			$tname	=	"group_tag";
			$condition	=	"group_id=?";
			$param		=	array("i",$gid);			
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
								"group_id"=>$gid,
								"tag_id"=>$tid,								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"group_tag",$te);
				   }
				  else
				  {
				  	$aray=array(
								"group_id"=>$gid,
								"tag_id"=>$recrds[0]["id"],								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"group_tag",$te);						
					
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
		
	function searchGroup($keyword,$start,$limit)
		{	
				$qry		=	"";
				$qry.=" AND `grp_name` LIKE ?";			
				$query	=	"SELECT count(`id`) FROM  `groups` WHERE `id`!=''";
				$query.=$qry;
				$bound_param[0].=	"s";
				array_push($bound_param,"%".$keyword."%");		
				$records	=	$this->fetchAll($query,$bound_param);
				$this->totalRecords	=	$records[0]["count(`id`)"];			
				unset($records);
			
			$qry	=	"SELECT * FROM `groups` where grp_name LIKE ? ";
			$qry.=" LIMIT ?,?";		
			$bound_param	=	array("sii","%".$keyword."%",$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		//sreejith
	
	function addGroup($values,$fname,$userId,$tagarray)
		{
		
		$date=date("y-m-d");
		$result	=	false;
		$validator	=	new Validator(array($values["groupname"]=>"Title/EMPTY",
											$values["category"]=>"Title/EMPTY",
											$values["tag"]=>"Title/EMPTY"	                                   
										 ));
		if($validator->validate())
		{		
			$array=array(					
						"grp_name"=>$values["groupname"],
						"category_id"=>$values["category"],
						"icon_image"=>$fname,
						"date_created"=>$date,
						"user_id"=>$userId
												
						);
			$type	=	"sissi";			
			$this->insert($array,"groups",$type);
			$gid = $this->lastInsertId();
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
								"group_id"=>$gid,
								"tag_id"=>$tid,								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"group_tag",$te);
				   }
				  else
				  {
				  	$aray=array(
								"group_id"=>$gid,
								"tag_id"=>$recrds[0]["id"],								
								);
		
					$te	=	"ii";				
					$this->insert($aray,"group_tag",$te);						
					
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
		
		
		function fetchAllCategories()
		{			
			$qry	=	"SELECT * FROM `category`";					
			$records	=	$this->fetchAll($qry);
			return $records;			
		}
		
		
		
		 function addTags($values)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["txtcatname"]=>"Title/EMPTY"		                                   
										 ));
		if($validator->validate())
		{		
			$array=array(					
						"tags"=>$values["txtcatname"]						
						);
			$type	=	"s";			
			if($this->insert($array,"tag_master",$type)){
				$result	=	true;
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
	
		
		function fetchTags($start,$limit)
		{
			$qry	=	"SELECT count(id) FROM `tag_master`";
			$records	=	$this->fetchAll($qry);
			$this->totRec	=	$records[0]["count(id)"];
			$qry	=	"SELECT * FROM `tag_master`";
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		 function fetchGNameById($id)
		{			
			$qry	=	"SELECT * FROM `groups` where id=? ";		
			$bound_param	=	array("i",$id);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function insertFollow($groupid,$userId)
		{
		$date=date("y-m-d");
		$array=array("group_id"=>$groupid,
						"followed_date"=>$date,
						"user_id"=>$userId
						);
			$type	=	"isi";			
			$this->insert($array,"group_followers",$type);
		}
		
		 function getEntryForFollowGroup($id,$userid)	 
			{	  				
				$qry	=	"SELECT grp_foll_id from group_followers where group_id=? and user_id=?";		
				$bound_param	=	array("ii",$id,$userid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]["grp_foll_id"];
			}	
			
			function deleteFollow($groupid,$userId)
		{
			$tname	=	"group_followers";
			$condition	=	"group_id=? and user_id=?";
			$param		=	array("ii",$groupid,$userId);			
			$this->delete($tname,$condition,$param);
			
		}
	
	
	function getGroupFollowers($qid,$limitfr)
			{
				$query="SELECT u.user_name,u.user_id,u.photo,u.is_facebook_login FROM `group_followers` f JOIN `user` u ON f.user_id=u.user_id join groups q on q.id=f.group_id WHERE f.group_id=? AND u.`status`='1' order by rand() LIMIT 0,?";
							
				
				$param	=	array("ii",$qid,$limitfr);
		     	$records	=	$this->fetchAll($query,$param);			
				$this->pageRecords	=	count($records);
				return $records;
			}	
			
			
	function addQuesGroup($qu,$userid,$groupid)
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
					
							
					$arr =array(
							"ques_id"=>$lastid,
							"grp_id"=>$groupid);
							
					$tpe	=	"ii";				
					$this->insert($arr,"group_question",$tpe);
					
					/*modified by rakesh for group notifications*/
					
					$arra=array(
						"questans_id"=>$lastid,
						"notification_id"=>13,
						"source_user_id"=>$userid,
						"group_id"=>$groupid,
						"date_notified"=>$tdate);
					$type	=	"iiiis";				
					$this->insert($arra,"notification",$type);
										
					//$arra=array(
						//	"questans_id"=>$lastid,
						//	"notification_id"=>2,
						//	"source_user_id"=>$userid,
						//	"date_notified"=>$tdate);
							
				//	$type	=	"iiis";				
				//	$this->insert($arra,"notification",$type);
				$result	=	true;	
					
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}	
		return $result;
		
		}
		
		function getGenGroupQues($groupid,$keyword,$start,$limit)
		{	 
		 
		if(strip_tags($keyword)==""){
			
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,	(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q join user u on q.user_id=u.user_id join group_question gq on gq.ques_id = q.id join groups g on g.id = gq.grp_id where gq.grp_id=?";		
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			$bound_param	=	array("iii",$groupid,$start,$limit);
			
			}else{
			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id join group_question gq on gq.ques_id = q.id join groups g on g.id = gq.grp_id where match(q.question) AGAINST('$keyword' IN BOOLEAN MODE) and gq.grp_id=?";
			
			if($this->userId!=""){			
			$qr1 = 	"and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  					
			}
			
			$qry=$qry.$qr1." order by q.id desc,q.date_created desc LIMIT ?,?";
			
			$bound_param	=	array("iii",$groupid,$start,$limit);
			
			}
			
			$records	=	$this->fetchAll($qry,$bound_param);		
			return $records;
		}
		
		
	function getGroupQuesMore($start,$limit,$lastid,$keyword,$gid)
			{						
				
			if($keyword==""){
				$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,	(select count(id) from follow_question where question_id=q.id) as follcnt FROM `questions` q join user u on q.user_id=u.user_id join group_question gq on gq.ques_id = q.id join groups g on g.id = gq.grp_id where q.id<? and gq.grp_id=?";
			
			//$bound_param	=	array("i",$lastid);
			
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}
			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("iiii",$lastid,$gid,$start,$limit);

			}else{			
			$qry	=	"SELECT q.*,u.user_id,u.user_name,u.is_facebook_login,u.photo,(select count(id) from reply where question_id=q.id) as anscnt,(select count(id) from follow_question where question_id=q.id) as follcnt FROM questions q join user u on q.user_id= u.user_id join group_question gq on gq.ques_id = q.id join groups g on g.id = gq.grp_id  where q.id<'$lastid' and gq.grp_id=? match(q.question) AGAINST('$keyword' IN BOOLEAN MODE)";
					
			if($this->userId!=""){			
			$qr1 = 	" and (q.user_id NOT IN (select blocked_id from block_list where user_id=".$this->userId.")) and  (q.user_id NOT IN (select user_id from block_list where blocked_id=".$this->userId."))";  				
			}			
			$qry=$qry.$qr1." ORDER BY q.id DESC LIMIT ?,?";
			$bound_param	=	array("iii",$gid,$start,$limit);		
			}
		
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}
			
			
		function fetchGroupsById($arr)
		{	
			
			$qry	=	"SELECT * FROM `groups` where category_id=? ";
			$bound_param	=	array("i",$arr[0]);
			for($i=0;$i < count($arr);$i++){				
			$qry.= " or category_id=?";
			$bound_param[0].=	"i";
		    array_push($bound_param,$arr[$i+1]);		
			}
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function userJoinGroups($grp,$userId)
		{
	    $result=  false;
	    $date=date("y-m-d");
		
		for($i=0;$i <count($grp);$i++){
	
		        $query="SELECT *  from groups WHERE id =? and user_id=?";			
				$param	=	array("ii",$grp[$i],$userId);
		     	$records	=	$this->fetchAll($query,$param);			
				
		
		if(count($records)<=0){
			
		   $array=array("group_id"=>$grp[$i],
						"followed_date"=>$date,
						"user_id"=>$userId
						);

			$type	=	"isi";			
			if($this->insert($array,"group_followers",$type)){
			$result=  true;}
			}
					
			}
			return $result;
		}
		
		function getCountGroup($userId)
		{			
		$query="SELECT (count(g.user_id)+(SELECT count(f.user_id)FROM group_followers f  WHERE f.user_id=?)) as cntgroup FROM groups g WHERE g.user_id=?";
		$param	=	array("ii",$userId,$userId);
		$records	=	$this->fetchAll($query,$param);	
		return $records[0]["cntgroup"];		
	    }
		
		 function getMyGroups($userid)	 
			{		  
				$qry	=	"SELECT * FROM `groups`WHERE user_id =?";		
				$bound_param	=	array("i",$userid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records;
			}	

		 function getPrevimage($groupid)	 
			{		  
				$qry	=	"SELECT icon_image FROM `groups`WHERE id =?";		
				$bound_param	=	array("i",$groupid);
				$records	=	$this->fetchAll($qry,$bound_param);		
				return $records[0]['icon_image'];
			}	

		function fetchMyCategories($userId)
		{			
			$qry	=	"SELECT c.*FROM category c JOIN groups g ON g.category_id = c.id LEFT JOIN group_followers f ON f.group_id = g.id WHERE g.user_id =? OR f.user_id =? GROUP BY c.id ";	
			$bound_param	=	array("ii",$userId,$userId);				
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;			
		}
		
		function fetchMyGroupById($userId,$id,$start,$limit)
		{	
		
			$qry	=	"SELECT g.* FROM groups g LEFT JOIN group_followers f ON f.group_id = g.id WHERE ( g.user_id =? OR f.user_id =?) AND g.category_id =? ";
			$qry.=" LIMIT ?,?";		
			$bound_param	=	array("iiiii",$userId,$userId,$id,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		
		function fetchMyGroupMore($userId,$id,$lastid,$limit)
		{	
		
			$qry	=	"SELECT g.* FROM groups g LEFT JOIN group_followers f ON f.group_id = g.id WHERE ( g.user_id =? OR f.user_id =?) AND g.category_id=?  and g.id >? ";
			
			$qry.=" LIMIT 0,?";		
			$bound_param	=	array("iiiii",$userId,$userId,$id,$lastid,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
			
			//rekha
		
		   function fetchDetailsGrp($gid)
			{			
			    $query="SELECT * ,(SELECT COUNT( grp_foll_id ) FROM group_followers WHERE group_id =? ) AS follCnt, (SELECT COUNT( grp_ques_id ) FROM group_question WHERE grp_id =?) AS quesCnt FROM  `groups` WHERE id =?";			
				$param	=	array("iii",$gid,$gid,$gid);
		     	$records	=	$this->fetchAll($query,$param);							
				return $records;
			}	
			
			 function fetchTagsGrp($gid)
			{			
			    $query="SELECT t.*,m.tags FROM `group_tag` t join tag_master m on t.tag_id=m.id  WHERE t.group_id =?";			
				$param	=	array("i",$gid);
		     	$records	=	$this->fetchAll($query,$param);							
				return $records;
			}	
		
}?>