 <?php 
class User extends Database_MySql
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
	function registerUser($values)
		{
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array(
												$values["name"]=>"Title/EMPTY",
												$values["email"]=>"Title/EMPTY|EMAIL",
												$values["profilename"]=>"Title/EMPTY",											
												$values["password"]=>"Title/EMPTY",
												$values["conpassword"]=>"Title/EMPTY"));
		if($validator->validate())
		{
			if($values["password"]==$values["conpassword"]){
				if((!$this->userExist($values["email"]))&&(!$this->ProfileNameExist($values["profilename"]))){
					$ser		=	new Server();
					$ip			=	$ser->getClient();
					$ip			=	$ip["ip"];
					$actcode	=	$util->getRandom();
					$tdate		=	date("Y-m-d h:i:s");
					$password	=	md5($values["password"]);				
					$array=array(
							"user_name"=>$values["name"],
							"password"=>$password,
							"email"=>$values["email"],						
							"last_login_ip"=>$ip,	
							"register_date"=>$tdate,
							"status"=>0,
							"points"=>0,
							"activation_code"=>$actcode,
							"profile_name"=>$values["profilename"]);
							
					$type	=	"sssssiiss";				
					$this->insert($array,"user",$type);
					$result	=	$actcode;
				}else{
					$this->setError("User Already Exist")	;
				}
			}else{
				$this->setError("Password Does'nt Match")	;
			
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
		
		
		
	  function registerFacebookUser($values)
	  {	 
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array(
												$values["name"]=>"Title/EMPTY",
												$values["email"]=>"Title/EMPTY|EMAIL",											
												$values["password"]=>"Title/EMPTY",
												$values["conpassword"]=>"Title/EMPTY"));
		if($validator->validate())
		{
			if($values["password"]==$values["conpassword"]){
				if(!$this->userExist($values["email"])){
					$ser		=	new Server();
					$ip			=	$ser->getClient();
					$ip			=	$ip["ip"];				
					$tdate		=	date("Y-m-d h:i:s");
					$password	=	md5($values["password"]);				
					$array=array(
							"user_name"=>$values["name"],
							"face_access"=>$values["access_token"],
							"password"=>$password,
							"email"=>$values["email"],						
							"last_login_ip"=>$ip,	
							"register_date"=>$tdate,
							"photo"=>$values["photo"],
							"status"=>1,
							"facebook_id"=>$values["faceid"],
							"is_facebook_login"=>1);
							
					$type	=	"sssssssisi";	
								
					$this->insert($array,"user",$type);
					$result	=	true;
				}else{
					$this->setError("User Already Exist")	;
				}
			}else{
				$this->setError("Password Does'nt Match")	;
			
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
		
	function userExist($email)
	{
		$qry	=	"SELECT * FROM `user`  where email=?";
		$param	=	array("s",$email);
		$records	=	$this->fetchAll($qry,$param);
		if(count($records)>0){
			$result	=	true;
		}			
		return $result;
	}
	
	
	function getEmail($email){		
		$result	=	false;	
		$query="SELECT `user_name`,`password`,`email`,`activation_code` FROM `user` WHERE  email=?";
		$param	=	array("s",$email);
		$records	=	$this->fetchAll($query,$param);	
		if(!empty($records)){
			$result	=	$records;
		}		
		return $result;		
	}	
	
	function UpdateStatus($email)
		{		
		
			$query="SELECT * FROM `user` WHERE  email=?";
			$param	=	array("s",$email);
			$records	=	$this->fetchAll($query,$param);	
			
			$qery="SELECT * FROM `user` WHERE  defa_user=1";		
			$reds	=	$this->fetchAll($qery);	
		
		
		     
	       	$array=array(
							"user_id"=>$records[0]["user_id"],
							"friend_id"=>$reds[0]["user_id"],					
							"is_friend_approved"=>1);
							
					
			$aray=array(
							"user_id"=>$reds[0]["user_id"],
							"friend_id"=>$records[0]["user_id"],					
							"is_friend_approved"=>1);
							
					$type	=	"iii";			
					
								
					$this->insert($array,"friends",$type);
					$this->insert($aray,"friends",$type);
		
			$result		=	false;
			$st =1;
			$val	=	array("status"=>$st);
			$tname	=	"user";
			$cond	=	"email=? ";
			$param	=	array($email);
			$ty		=	"ss";
			$this->update($val,$tname,$cond,$param,$ty);
		}	
		
		
		
	function userAuthenticate($values)
	{
		$result		=	false;
		$validator	=	new Validator(array($values["email"]=>"/EMPTY",$values["password"]=>"/EMPTY"));
		if($validator->validate())
		{
			$records		=	"";
			$username		=	$values["email"];
			$password		=	md5($values["password"]);
				
				$det_rec	=	array();
			    $querry			=	"SELECT * FROM `user`  WHERE `email`=? and password=?";//check username and password
				$param			=	array("ss",$username,$password);
				$det_rec		=	$this->fetchAll($querry,$param);
				if(!empty($det_rec))
				{
				
				$querry			=	"SELECT user_id FROM `user`  WHERE `email`=? and status=1";//check user name exist and active account
			    $param			=	array("s",$username);
			    $records		=	$this->fetchAll($querry,$param);
				if(!empty($records)){				
					 $result		=	true;
					 $this->ssid	=	$det_rec[0]["user_id"];
					 $this->uname	=	$det_rec[0]["user_name"];
					 
				}else{
					$this->errorMessage	=	"Account Not Active Check Your Email";						 
				 }
				}else				
				{
					$this->errorMessage	=	"Invalid username or password ";	
				}
			
		}
		else
		{
			$this->errorMessage	=	"Enter mandatory fields !";
		}
		return $result;
	}
	
	function getProfile()
	{
		
		$qry	=	"SELECT * FROM `user` where user_id=?";
		$param	=	array("d",$this->userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	function getProfilePublic($userId)
	{
		
		$qry	=	"SELECT * FROM `user` where user_id=?";
		$param	=	array("i",$userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	
		function updateUser($values)
	{
	
		$ser		=	new Server();
		$ip			=	$ser->getClient();
		$ip			=	$ip["ip"];
		$date		=	date("Y-m-d h:i:s");
		
		if($values["pass"]!="") {
		
		$password		=	md5($values["pass"]);
		$confpassword		=	md5($values["confpass"]);
		
        if($password==$confpassword){
		$val	=	array("dob"=>$values["dob"],
		                  "last_login"=>$date,
						  "last_login_ip"=>$ip,
						  "password"=>$password,
						  "user_name"=>$values["name"]);
		$tname	=	"user";
		$cond	=	"user_id=? ";
		$param	=	array($this->userId);
		$ty		=	"sssssi";		
		$this->update($val,$tname,$cond,$param,$ty);
		}else{
			$this->setError("Password Does'nt Match")	;
		}
		}else {
		 $val	=	array("dob"=>$values["dob"],
		                  "last_login"=>$date,
						  "last_login_ip"=>$ip,						
						  "user_name"=>$values["name"]);
		$tname	=	"user";
		$cond	=	"user_id=? ";
		$param	=	array($this->userId);
		$ty		=	"ssssi";		
		$this->update($val,$tname,$cond,$param,$ty);
		
		}
		
	}
	
	function updateImage($fname,$lid)
		{
			$result		=	false;
			$val	=	array("photo"=>$fname);
			$tname	=	"user";
			$cond	=	"user_id=? ";
			$param	=	array($lid);
			$ty		=	"si";
			$this->update($val,$tname,$cond,$param,$ty);
				
		
		}
		
	function getPrevimage($userid)	{		
		
		$qry	=	"SELECT photo FROM user where user_id=?";
		$param	=	array("d",$userid);
		$records	=	$this->fetchAll($qry,$param);
		return $records[0]["photo"];
		
	}	
		
	function getSettingsForReply($userId)	{		
		
		$qry	=	"SELECT * FROM user_settings where user_id=? and settings_id=1";
		$param	=	array("d",$userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	function getSettingsForQues($userId)
	{
		
		$qry	=	"SELECT * FROM `user_settings` where user_id=? and settings_id=2";
		$param	=	array("d",$userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	function getSettingsForAccReq($userId)
	{
		
		$qry	=	"SELECT * FROM `user_settings` where user_id=? and settings_id=3";
		$param	=	array("d",$userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	function getSettingsForSenReq($userId)
	{
		
		$qry	=	"SELECT * FROM `user_settings` where user_id=? and settings_id=4";
		$param	=	array("d",$userId);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}
	
	function userSettings($values,$userId)
	{	
	 $result		=	false;	
      if($values["reply"]==0){
	        $tname	=	"user_settings";
			$condition	=	"user_id=? and settings_id=1";
			$param		=	array("i",$userId);		
			$this->delete($tname,$condition,$param);
			 $result=true;
	  }else{
	  
	        $qry	=	"SELECT id FROM `user_settings` where user_id=? and settings_id=1";
			$param	=	array("i",$userId);
			$records	=	$this->fetchAll($qry,$param);
			  if(count($records)==0){
					$array=array(
								"user_id"=>$userId,					
								"settings_id"=>1);
					$type	=	"ii";
					$this->insert($array,"user_settings",$type);
					 $result=true;
			
	          }
	  
	  }
	  if($values["follow"]==0){
	        $tname	=	"user_settings";
			$condition	=	"user_id=? and settings_id=2";
			$param		=	array("i",$userId);		
			$this->delete($tname,$condition,$param);
			 $result=true;
	  } else{
	  
	        $qry	=	"SELECT id FROM `user_settings` where user_id=? and settings_id=2";
			$param	=	array("i",$userId);
			$records	=	$this->fetchAll($qry,$param);
			  if(count($records)==0){
					$array=array(
								"user_id"=>$userId,					
								"settings_id"=>2);
					$type	=	"ii";
					$this->insert($array,"user_settings",$type);
					 $result=true;
			
	          }
	  
	  }
	  if($values["acceptreq"]==0){
	        $tname	=	"user_settings";
			$condition	=	"user_id=? and settings_id=3";
			$param		=	array("i",$userId);		
			$this->delete($tname,$condition,$param);
			 $result=true;
	  }else{
	  
	        $qry	=	"SELECT id FROM `user_settings` where user_id=? and settings_id=3";
			$param	=	array("i",$userId);
			$records	=	$this->fetchAll($qry,$param);
			  if(count($records)==0){
					$array=array(
								"user_id"=>$userId,					
								"settings_id"=>3);
					$type	=	"ii";
					$this->insert($array,"user_settings",$type);
					 $result=true;
			
	          }
	  
	  }
	  if($values["sendsreq"]==0){
	        $tname	=	"user_settings";
			$condition	=	"user_id=? and settings_id=4";
			$param		=	array("i",$userId);		
			$this->delete($tname,$condition,$param);
			 $result=true;
	  }else{
	  
	        $qry	=	"SELECT id FROM `user_settings` where user_id=? and settings_id=4";
			$param	=	array("i",$userId);
			$records	=	$this->fetchAll($qry,$param);
			  if(count($records)==0){
					$array=array(
								"user_id"=>$userId,					
								"settings_id"=>4);
					$type	=	"ii";
					$this->insert($array,"user_settings",$type);
			         $result=true;
	          }
	  
	  }
	 return $result;
		
	}
	
	
	 function getAllUsers($keyword,$start,$limit)
		{	
		
		$qry		=	"";
		$qry.=" AND `user_name` LIKE ?";			
		$query	=	"SELECT count(`user_id`) FROM  `user` WHERE `user_id`!=''";
		$query.=$qry;
		$bound_param[0].=	"s";
		array_push($bound_param,$keyword."%");		
		$records	=	$this->fetchAll($query,$bound_param);
		$this->totalRecords	=	$records[0]["count(`user_id`)"];
		unset($records);
		
		$query=	"SELECT `user_id`,`user_name`,`photo`,`is_facebook_login` FROM  `user` WHERE `user_id`!=''";
		$query.=$qry;
		$query.=" LIMIT ?,?";	
		$bound_param[0].=	"ii";
		array_push($bound_param,$start,$limit);			
		$records	=	$this->fetchAll($query,$bound_param);
		$this->pageRecords	=	count($records);		
		return $records;					
		}
		
	 function uservalid()
	{
		$result	=	false;
		$query="SELECT `user_id` FROM `user` WHERE `user_id`=?";
		$param	=	array("i",$this->userId);	
		$records	=	$this->fetchAll($query,$param);
		if(count($records)>0){
			$result	=	true;
		}
		return $result;
	}
	
	function getProfileOfUser($gid)
	{
		$result	=	false;
		$query="SELECT * FROM `user` WHERE `user_id`=?";
		$param	=	array("i",$gid);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}
	
	function getFriendCount($userId){			
		$query="SELECT count(f.`id`)FROM `friends` f JOIN `user` u ON f.friend_id=u.user_id WHERE f.`user_id`=?  AND f.`is_friend_approved`='1'";
		$param	=	array("i",$userId);
		$records	=	$this->fetchAll($query,$param);	
		return $records[0]["count(f.`id`)"];		
	}
	
	function getFriendStatus($user)
		{
			$result	=	false;
			$query="SELECT `id` FROM `friends` WHERE `user_id`=? AND `friend_id`=?";
			$param	=	array("ii",$user,$this->userId);
		    $records	=	$this->fetchAll($query,$param);	

			
			$query="SELECT `id` FROM `friends` WHERE `friend_id`=? AND `user_id`=?";
			$param	=	array("ii",$user,$this->userId);
		    $records2	=	$this->fetchAll($query,$param);			
			if(count($records)>0 or count($records2)>0){
			
				$result	=	true;
			}			
			return $result;
		}
		
	function getUser(){			
		$query="SELECT * FROM `user` WHERE  user_id=?";
		$param	=	array("i",$this->userId);
		$records	=	$this->fetchAll($query,$param);			
		return $records;		
	}
	
	
	function addRequest($gid,$msg){	
	
		 $result	=	false;		
		 $validator	=	new Validator(array($gid=>"/EMPTY"));
			if($validator->validate())
			{
					$array=array(
								"user_id"=>$this->userId,
								"friend_id"=>$gid,							
								"is_friend_approved"=>0,
								"message"=>$msg);
						$type	=	"iiis";				
						$this->insert($array,"friends",$type);
						$result	=	$true;
			}
			else
			{
				$this->setError($validator->getMessage())	;
			}
			return $result;	
		}	
		
		function removeRequest($gid){	
			
	                $tname	=	"friends";
					$condition	=	"user_id=? and friend_id=?";
					$param		=	array("ii",$this->userId,$gid);
					$this->delete($tname,$condition,$param);
			}	
		
		function notification($notid,$reqid,$userid){	
	
		 $result	=	false;		
		 $tdate		=	date("Y-m-d h:i:s");
				$array=array(
								"notification_id"=>$notid,
								"source_user_id"=>$userid,							
								"friend_user_id"=>$reqid,
								"date_notified"=>$tdate);
						$type	=	"iiis";				
						$this->insert($array,"notification",$type);
						$result	=	$true;
			
			return $result;	
		}	
		
		function getMailInfn($gid){			
			$query="SELECT id FROM `user_settings` WHERE  user_id=? and settings_id=4";
			$param	=	array("i",$gid);
			$records	=	$this->fetchAll($query,$param);			
			return $records[0]["id"];		
		}
		
		function getMailInfnForApproval($rid){			
			$query="SELECT id FROM `user_settings` WHERE  user_id=? and settings_id=3";
			$param	=	array("i",$rid);
			$records	=	$this->fetchAll($query,$param);			
			return $records[0]["id"];		
		}
		
		function getMailInfnForFollow($rid){			
			$query="SELECT id FROM `user_settings` WHERE  user_id=? and settings_id=2";
			$param	=	array("i",$rid);
			$records	=	$this->fetchAll($query,$param);			
			return $records[0]["id"];		
		}
		
		
		function getFriendRequest(){			
			$query="SELECT count(`id`) FROM `friends` WHERE `friend_id`=? AND `is_friend_approved`='0'";
			$param	=	array("i",$this->userId);
			$records	=	$this->fetchAll($query,$param);		
			return $records[0]["count(`id`)"];
		   }
	 
	
		function getRequests(){			
			$query="SELECT u.*,l.`message`,l.`id` FROM `friends` l join `user` u ON l.`user_id`=u.`user_id`  WHERE l.`friend_id`=? AND l.`is_friend_approved`='0'";		
			$param	=	array("i",$this->userId);
			$records	=	$this->fetchAll($query,$param);		
			return $records;
		}
	
		function ApproveRequest($reqId){
			$result	=false;		
			$query="SELECT `id` FROM `friends` WHERE `user_id`=? AND `friend_id`=? and is_friend_approved=0";
			$param	=	array("ii",$reqId,$this->userId);
			$records	=	$this->fetchAll($query,$param);		
			if(count($records)==1){
			
				$val	=	array("is_friend_approved"=>1);	
				$tname	=	"friends";
				$cond	=	"friend_id=? and user_id=?";
				$param	=	array($this->userId,$reqId);
				$ty		=	"sii";
				$this->update($val,$tname,$cond,$param,$ty);					
			
				$array	=	array(
									"friend_id"=>$reqId,
									"user_id"=>$this->userId,								
									"is_friend_approved"=>1);
				$type	=	"iii";							
				$this->insert($array,"friends",$type);
				$result	=true;
			}else{
			}
			return $result;
		}
		
		function rejectRequest($reqId){
			    $tname	=	"friends";
				$condition	=	"friend_id=? and user_id=?";
				$param		=	array("ii",$this->userId,$reqId);		
				$this->delete($tname,$condition,$param);					
			}
			
			
		function getMyFriends($keyword,$limitfr)
			{
				$qry		=	"";
				if(!empty($keyword))
				{
					$qry.=" AND (u.`user_name` LIKE ?) ";
				}
				$query="SELECT * FROM `friends` f JOIN `user` u ON f.friend_id=u.user_id WHERE f.`user_id`=?  AND f.`is_friend_approved`='1'";
				$query.=$qry."order by rand() LIMIT 0,?";
				
				if(!empty($keyword)){
				$param	=	array("isi",$this->userId,$keyword,$limitfr);
				}else{
				$param	=	array("ii",$this->userId,$limitfr);
				}			
		     	$records	=	$this->fetchAll($query,$param);			
				$this->pageRecords	=	count($records);
				return $records;
			}
			
			
			function getMyPublicFriends($keyword,$limitfr)
			{
		
				$query="SELECT * FROM `friends` f JOIN `user` u ON f.friend_id=u.user_id WHERE f.`user_id`=?  AND f.`is_friend_approved`='1'";
				$query.="order by rand() LIMIT 0,?";
				
			
				$param	=	array("ii",$keyword,$limitfr);
				
		     	$records	=	$this->fetchAll($query,$param);			
				$this->pageRecords	=	count($records);
				return $records;
			}
			
			
			function getMyFriendsManage($keyword,$start,$limitfr)
			{
			    $query="SELECT count(f.id) FROM `friends` f JOIN `user` u ON f.friend_id=u.user_id WHERE f.`user_id`=?  AND f.`is_friend_approved`='1'";
			    $param	=	array("i",$this->userId);			
			    $recor	=	$this->fetchAll($query,$param);	
				$this->totCount	=	$recor[0]["count(f.id)"];	
			
				$qry		=	"";
				if(!empty($keyword))
				{
					$qry.=" AND (u.`user_name` LIKE ?) ";
				}
				$query="SELECT * FROM `friends` f JOIN `user` u ON f.friend_id=u.user_id WHERE f.`user_id`=?  AND f.`is_friend_approved`='1'";
				$query.=$qry."LIMIT ?,?";
				
				if(!empty($keyword)){
				$param	=	array("isii",$this->userId,$keyword,$start,$limitfr);
				}else{
				$param	=	array("iii",$this->userId,$start,$limitfr);
				}			
		     	$records	=	$this->fetchAll($query,$param);	
				
				return $records;
			}		
			
			
		function getEmailArray($userid){			
			$query="SELECT email FROM `user` where status=1 and user_id!=?";
			$param	=	array("i",$userid);			
			$records	=	$this->fetchAll($query,$param);		
			return $records;
		}
		
		
		function getUserIdByemail($email){			
			$query="SELECT user_id FROM `user` where status=1 and email=?";
			$param	=	array("s",$email);			
			$records	=	$this->fetchAll($query,$param);		
			return $records;
		}
		
		
		function SendRequest($usArr,$userid){	
	
		 $result	=	false;	
		      	 	
		 for($f=0;$f<count($usArr);$f++) {	
		  
		    $frid = $usArr[$f]["user_id"];
			 
			$query="SELECT id FROM `friends` where user_id=? and friend_id=?";
			$param	=	array("ii",$userid,$frid);			
			$records	=	$this->fetchAll($query,$param);	
			
			if(count($records)==0){
		
					$array=array(
								"user_id"=>$userid,
								"friend_id"=>$frid,							
								"is_friend_approved"=>0);				
								
						$type	=	"iii";				
						$this->insert($array,"friends",$type);
					$result	=	$true;
			}		
		  }
			return $result;	
		}	
		
		
		function getMyFollowers($qid,$limitfr)
			{
				$query="SELECT u.user_name,u.user_id,u.photo,u.is_facebook_login FROM `follow_question` f JOIN `user` u ON f.follower_id=u.user_id join questions q on q.id=f.question_id WHERE f.question_id=? and u.`user_id`!=q.user_id  AND u.`status`='1' order by rand() LIMIT 0,?";
							
				
				$param	=	array("ii",$qid,$limitfr);
		     	$records	=	$this->fetchAll($query,$param);			
				$this->pageRecords	=	count($records);
				return $records;
			}	
			
		function remUser($reqId){	
			$tname	=	"friends";
			$condition	=	"user_id=? and friend_id=?";
			$param		=	array("ii",$this->userId,$reqId);		
			$this->delete($tname,$condition,$param);	
			
			$tnam	=	"friends";
			$conditio	=	"user_id=? and friend_id=?";
			$para		=	array("ii",$reqId,$this->userId);		
			$this->delete($tnam,$conditio,$para);
						
			$tnam1	=	"notification";
			$conditio1	=	"source_user_id=? and friend_user_id=? and notification_id=1";
			$para1	=	array("ii",$reqId,$this->userId);		
			$this->delete($tnam1,$conditio1,$para1);
			
			$tnam2	=	"notification";
			$conditio2	=	"source_user_id=? and friend_user_id=? and notification_id=1";
			$para2	=	array("ii",$this->userId,$reqId);		
			$this->delete($tnam2,$conditio2,$para2);	
			
			
		}
		
	function getUserAccess($userId){	    
		$query="SELECT `face_access` FROM `user` WHERE  user_id=?";
		$param	=	array("i",$userId);
		$records	=	$this->fetchAll($query,$param);	
		return $records[0]["face_access"];		
	}
	
	function blockUser($userId,$blkuid){	
	
		 $result	=	false;			      	 	
		 $tdate		=	date("Y-m-d");
		 
		$query="SELECT id FROM `block_list` WHERE  (user_id=? and blocked_id=?) or (user_id=? and blocked_id=?)";
		$param	=	array("iiii",$userId,$blkuid,$blkuid,$userId);
		$records	=	$this->fetchAll($query,$param);	
			
		 if(count($records)==0){
			$array=array(
						"user_id"=>$userId,
						"blocked_id"=>$blkuid,							
						"date_blocked"=>$tdate);	
	
			$type	=	"iis";		
					
			if($this->insert($array,"block_list",$type)){
			
			$tname	=	"friends";
			$condition	=	"(user_id=? and friend_id=?) or (user_id=? and friend_id=?)";
			$param		=	array("iiii",$userId,$blkuid,$blkuid,$userId);		
			$this->delete($tname,$condition,$param);	
			
			
			$tname	=	"notification";
			$condition	=	"(source_user_id=? and friend_user_id=?) or (source_user_id=? and friend_user_id=?)";
			$param		=	array("iiii",$userId,$blkuid,$blkuid,$userId);		
			$this->delete($tname,$condition,$param);				
			$result	=	true;
		
			}
			}
			
			return $result;	
		}
		
	
	function chkBlockedStatus($userId,$blkuid){	
	
	    $query="SELECT * FROM `block_list` WHERE  user_id=? and blocked_id=?";
		$param	=	array("ii",$userId,$blkuid);
		$records	=	$this->fetchAll($query,$param);	
		return $records;		
		
	}	
	
	function unblockUser($userId,$blkuid){	
			$tname	=	"block_list";
			$condition	=	"user_id=? and blocked_id=?";
			$param		=	array("ii",$userId,$blkuid);		
			$this->delete($tname,$condition,$param);				
	}	
	
	function chkUserBlocked($userId,$blkuid){	
	
	    $query="SELECT id FROM `block_list` WHERE  (user_id=? and blocked_id=?) or (user_id=? and blocked_id=?)";
		$param	=	array("iiii",$userId,$blkuid,$blkuid,$userId);
		$records	=	$this->fetchAll($query,$param);	
		return $records[0]["id"];		
		
	}	
	
	function addBug($userid,$page,$bug){	
	
		  $result	=	false;	
	
		  $tdate		=	date("Y-m-d");
		  		
					$array=array(
								"user_id"=>$userid,
								"page"=>$page,	
								"timestamp"=>$tdate,							
								"bug"=>$bug);	
								
						$type	=	"isss";				
						$this->insert($array,"bug_report",$type);
					$result	=	$true;
		  
			return $result;	
		}
		
	 function fetchBugReport($start,$limit)
	{   
	    $qry	=	"SELECT count(b.id) FROM `bug_report` b join user u on u.user_id=b.user_id";
		$records	=	$this->fetchAll($qry);
		$this->totalRec = $records[0]["count(b.id)"];
		
		$qry	=	"SELECT b.*,user_name FROM `bug_report` b join user u on u.user_id=b.user_id LIMIT ?,?";	
		$bound_param	=	array("ii",$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
		
	 function deleteBugReport($id)
	{	
		$tname	=	"bug_report";
		$condition	=	"id=?";
		$param		=	array("i",$id);		
		$this->delete($tname,$condition,$param);	
			
	}	
	
	function insertUserSettings($lastid){	
	
		  $result	=	false;	
		  		
					$array1=array(
								"user_id"=>$lastid,
								"settings_id"=>1	
								);	
					$array2=array(
								"user_id"=>$lastid,
								"settings_id"=>2	
								);
					$array3=array(
								"user_id"=>$lastid,
								"settings_id"=>3	
								);	
					$array4=array(
								"user_id"=>$lastid,
								"settings_id"=>4	
								);		
												
								
						$type	=	"ii";				
						$this->insert($array1,"user_settings",$type);
						$this->insert($array2,"user_settings",$type);
						$this->insert($array3,"user_settings",$type);
						$this->insert($array4,"user_settings",$type);
						
					$result	=	$true;
		  
			return $result;	
		}
		
		
	 function testerExist($email)
	{
		$qry	=	"SELECT * FROM `tester`  where email=?";
		$param	=	array("s",$email);
		$records	=	$this->fetchAll($qry,$param);
		if(count($records)>0){
			$result	=	true;
		}			
		return $result;
	}			
		
	 function addTesters($values)
		{
		$result	=	false;
		$util	=	new Utilities();
		$validator	=	new Validator(array(
												$values["email"]=>"Title/EMPTY|EMAIL"											
												));
		if($validator->validate())
		{
		
			if(!$this->testerExist($values["email"])){
				
					$actcode	=	$util->getRandom();
					
					$array=array(
							"email"=>$values["email"],
							"uniquecode"=>$actcode
						);
							
					$type	=	"ss";				
					$this->insert($array,"tester",$type);
					$result	=	$actcode;
				}else{
					$this->setError("User Already Exist")	;
				}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
		 function fetchTesters($start,$limit)
	{   
	    $qry	=	"SELECT count(id) FROM `tester` b ";
		$records	=	$this->fetchAll($qry);
		$this->totalRec = $records[0]["count(id)"];
		
		$qry	=	"SELECT * FROM `tester` LIMIT ?,?";	
		$bound_param	=	array("ii",$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
	
		
	 function deleteTesters($id)
	{	
		$tname	=	"tester";
		$condition	=	"id=?";
		$param		=	array("i",$id);		
		$this->delete($tname,$condition,$param);	
			
	}	
	
	
	 function fetchStatus($code,$emaid)
	{  	
	    $qry	=	"SELECT id FROM `tester` where email=? and uniquecode=?";	
		$bound_param	=	array("ss",$emaid,$code);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records[0]["id"];
	}	
	
	 function fetchDefaultUser()
	{  	
	    $qry	=	"SELECT * FROM `user` where defa_user=1";		
		$records	=	$this->fetchAll($qry);		
		return $records;
	}	
//pradosh

	function ProfileNameExist($profilename)
	{
		$qry	=	"SELECT * FROM `user`  where profile_name=?";
		$param	=	array("s",$profilename);
		$records	=	$this->fetchAll($qry,$param);
		if(count($records)>0){
			$result	=	true;
		}			
		return $result;
	}	
	
	//for mather app
	function listAllProjects(){
		$query="SELECT id,name,location as loc,concat('uploads/images/',project_image) as images FROM tbl_project";
		//$param	=	array("i",$admin_id);
		$records	=	$this->fetchAll($query);
		return $records;
	}
	//list gallery images..	
	function listGalleryImages($projectId){
		$query="SELECT * FROM tbl_project_images where project_id=?";
		$param	=	array("i",$projectId);
		$records	=	$this->fetchAll($query);
		return $records;
	}	
	
}?>