<?php 
class User extends Database_MySql
{
	public $errorMessage;
	public $userId;
	private $utilObject;
	
	
	function __construct()
	{
		parent::__construct();
		$this->userId	=	null;
		$this->utilObject	=	new Utilities();
		
	}
	
	function addusers($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtUserName"]=>"Username/EMPTY|FILTER",
						$values["txtPassword"]=>"Activity/EMPTY",
						$values["txtFullName"]=>"Fullname/EMPTY",
						$values["txtemail"]=>"Email Id/EMPTY|EMAIL"));
		
		if($validator->validate()){
			if($this->checkUserName($values["txtUserName"])){
			
				$this->errorMessage	=	"Sorry this username already exists !";
			}else if($this->checkEmail($values["txtemail"])){
				$this->errorMessage	=	"Sorry Email already exists !";
			}else{
				$this->insert(array("username"=>$values["txtUserName"],"password"=>base64_encode($values["txtPassword"]),"fullname"=>$values["txtFullName"],"email_id"=>$values["txtemail"]),"tbl_users");
			$result	=	true;	
			}
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
		
   function getUserInfo($id)
	{
		$query="SELECT * FROM `tbl_users` WHERE `user_id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function updateuser($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtUserName"]=>"Username/EMPTY|FILTER",
					$values["txtFullName"]=>"Fullname/EMPTY",
					$values["txtemail"]=>"Email Id/EMPTY|EMAIL"));
		
		if($validator->validate()){
			if($this->checkUserName($values["txtUserName"])){
			
				$this->errorMessage	=	"Sorry this username already exists !";
			}else if($this->checkEmail($values["txtemail"])){
				$this->errorMessage	=	"Sorry Email already exists !";
			}else{				
				$this->update(array("username"=>$values["txtUserName"],
				"fullname"=>$values["txtFullName"],
				"email_id"=>$values["txtemail"]),
				"tbl_users","user_id='".$this->userId."'");
				$result	=	true;				
			}
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
	
	// Admin account update start
	function setUserId($id){
		echo $this->userId	=	$id;
	}
	
	function checkUserName($userName){
		$result	=	false;	
		$query="SELECT `user_id` FROM `tbl_users` WHERE `username`='".$this->addFilter($userName)."'";
		
		if($this->userId){			
			$query.=" AND `user_id`!='".$this->userId."'";
		}
		$records	=	$this->fetchAll($query);
		if(count($records)>0){
			$result	=	true;
		}
		return $result;
	}
		
	function checkEmail($emailId){
		$result	=	false;
		
		$query="SELECT `user_id` FROM `tbl_users` WHERE `email_id`='".$this->addFilter($emailId)."'";
		if($this->userId){
			$query.=" AND `user_id`!='".$this->userId."'";
		}
		$records	=	$this->fetchAll($query);
		if(count($records)>0){
			$result	=	true;
		}		
		return $result;
	}		
		
	function checkPasswordOk($password){
		$result	=	false;
		
		$password=	$this->addFilter($this->utilObject->encodeString($password));
		$query="SELECT `user_id` FROM `tbl_users` WHERE `password`='$password'";
		if($this->userId){
			$query.=" AND `user_id`='".$this->userId."'";
		}
		$records	=	$this->fetchAll($query);
		if(count($records)>0){
			$result	=	true;
		}		
		return $result;
	}
	
	function updatePassword($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtCurrentPassword"]=>"CurrentPassword /EMPTY|FILTER",$values["txtNewPassword"]=>"New Password/EMPTY|FILTER"));
		if($validator->validate()){
			if($this->checkPasswordOk($values["txtCurrentPassword"])){				
				$password	=	$this->addFilter($values["txtNewPassword"]);
				$this->update(array("password"=>$this->utilObject->encodeString($values["txtNewPassword"])),"tbl_users","user_id=".$this->userId." ");				
				$result	=	true;
			}else{
				$this->errorMessage	=	"Current password is wrong !";
			}
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}	
	
    function updateAccount($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtUserName"]=>"Username/EMPTY|FILTER",
		$values["txtFullName"]=>"Fullname/EMPTY",
		$values["txtemail"]=>"Email Id/EMPTY|EMAIL"));
		if($validator->validate()){
			$this->update(array("username"=>$values["txtUserName"],"fullname"=>$values["txtFullName"],"email_id"=>$values["txtemail"]),"tbl_users","user_id=".$this->userId."");
				$result	=	true;				
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
    function usersList(){
    	$query	=	"SELECT * FROM `tbl_users` order by `user_id` desc";
		$records	=	$this->fetchAll($query);
		return $records;
	}	

}?>