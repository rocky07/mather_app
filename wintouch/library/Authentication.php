<?php 
class Authentication extends Database_MySql
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
	
	/*
	 * to login as an admin_user
	 * author: Jiby
	 */
	function checkAdminLogin($values)
	{
		$result		=	false;
		$validator	=	new Validator(array($values["txtUser"]=>"/EMPTY",$values["txtPassword"]=>"/EMPTY"));
		if($validator->validate())
		{
			$username		=	$this->addFilter($values["txtUser"]);
			$password		=	$this->addFilter($values["txtPassword"]);
			$querry			=	"SELECT * FROM `tbl_admin`  WHERE `username`='".$username."' AND `password`='".$this->utilObject->encodeString($password)."' and `type`='1'";
			$records		=	$this->fetchAll($querry);
			if(count($records)>0)
			{
				$result		=	true;
				$this->userId	=	$records[0]["admin_id"];
				$this->fullname	=	$records[0]["fullname"];
				$this->email	=	$records[0]["email_id"];
				$this->username	=	$records[0]["username"];
			}
			else
			{
				$result	=	false;
					$this->errorMessage	=	"Invalid username or password ";	
			}
		}
		else
		{
			$this->errorMessage	=	"Enter mandatory fields !";
		}
		return $result;
	}
	
	/*
	 * to set user_id for each page
	 * author: Jiby
	 */
	function setAdminId($id)
	{
		 $this->userId	=	$id;
	}
	
	/*
	 * to get admin user's details
	 * author: Jiby
	 */
	function getLoggedInfo()
	{
		 $query="SELECT * FROM `tbl_users` WHERE `id`='".$this->userId."'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	/*
	 * to change password of an existing admin_user's account
	 * author: Deepthi
	 */
	function changePassword($values)
	{
		$result	=	false;
					
		//validating fields
		$validator	=	new Validator(array(
				$values["textoldpass"]=>"Title/EMPTY", 
				$values["textnewpass"]=>"Title/EMPTY", 
				$values["textconfirmpass"]=>"Title/EMPTY"));
		if($validator->validate())
		{	
			$password		=	$this->addFilter($values["textoldpass"]);
			$records		=	$this->fetchAll("SELECT * FROM `tbl_admin` WHERE `id`='".$this->userId."' AND `password`='".$this->utilObject->encodeString($password)."'");
			//print_r($records);
			if(count($records)>0){				
				if($_POST['textnewpass']	==	$_POST['textconfirmpass'])
				{
					//encoding password
					$pass	=	base64_encode($_POST['textnewpass']);
					
					//updating password into tbl_user table
					$array	=	array("password"=>$this->addFilter($pass));
					$this->update($array,"tbl_admin","id='".$this->userId."'");
					
					$result	=	true;
				}
				else{
					$this->errorMessage	=	"Password does not match";	
				}	
			}
			else{
					$this->errorMessage	=	"Old Password does not match";	
				}
		}
		else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;				
	}		
	
	/*
	 * to check whether the user already exists
	 * author: Deepthi
	 */
	function userExist($username,$email)
	{
		$result	=	false;
		$this->connect();
		$query="SELECT `id` FROM `tbl_admin` WHERE `username`='".$this->addFilter($username)."' OR `email`='".$this->addFilter($email)."'";
		$records	=	$this->fetchAll($query);
		if(count($records)>0){
			$result	=	true;
		}			
		return $result;
	}
	
	function checkUserLogin($values)
	{
		$result		=	false;
		$validator	=	new Validator(array($values["txtUser"]=>"/EMPTY",$values["txtPassword"]=>"/EMPTY"));
		if($validator->validate())
		{
			$username		=	$this->addFilter($values["txtUser"]);
			$password		=	$this->addFilter($values["txtPassword"]);
			$querry			=	"SELECT * FROM `tbl_users` WHERE `username`='".$username."' AND `password`='".$this->utilObject->encodeString($password)."'";
			$records		=	$this->fetchAll($querry);
			if(count($records)>0)
			{
				$result		=	true;
				$this->userId	=	$records[0]["user_id"];
				$this->fullname	=	$records[0]["fullname"];
			}
			else
			{
				$result	=	false;
				$this->errorMessage	=	"Invalid username or password ";	
			}
		}
		else
		{
			$this->errorMessage	=	"Enter mandatory fields !";
		}
		return $result;
	}
	
	function getAdminInfo($id)
	{
		$query="SELECT * FROM `tbl_admin` WHERE `admin_id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function updateAdminAccount($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtUserName"]=>"Username/EMPTY|FILTER",
		$values["txtFullName"]=>"Fullname/EMPTY",
		$values["txtemail"]=>"Email Id/EMPTY|EMAIL"));
		if($validator->validate()){
			$this->update(array("username"=>$values["txtUserName"],"fullname"=>$values["txtFullName"],"email_id"=>$values["txtemail"]),"tbl_admin","admin_id=".$this->userId."");
				$result	=	true;				
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
	function checkPasswordOk($password){
		$result	=	false;
		
		$password=	$this->addFilter($this->utilObject->encodeString($password));
		$query="SELECT `admin_id` FROM `tbl_admin` WHERE `password`='$password'";
		if($this->userId){
			$query.=" AND `admin_id`='".$this->userId."'";
		}
		$records	=	$this->fetchAll($query);
		if(count($records)>0){
			$result	=	true;
		}
		
		return $result;
	}
		
	function updateAdminPassword($values){
		$result	=	false;
		$validator=	new Validator(array($values["txtCurrentPassword"]=>"CurrentPassword /EMPTY|FILTER",$values["txtNewPassword"]=>"New Password/EMPTY|FILTER"));
		if($validator->validate()){
			if($this->checkPasswordOk($values["txtCurrentPassword"])){
				
				$password	=	$this->addFilter($values["txtNewPassword"]);
				$this->update(array("password"=>$this->utilObject->encodeString($values["txtNewPassword"])),"tbl_admin","admin_id=".$this->userId."");
				
				$result	=	true;
			}else{
				$this->errorMessage	=	"Current password is wrong !";
			}
		}else{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
	function createNews($values){
	
		$result=false;
		$util	=	new Utilities();
		$date = date("Y-m-d-h-i-s");
		
		$validator=	new Validator(array($values["txtNews"]=>"category/EMPTY",
								$values["txtData"]=>"category/EMPTY"));
		if($validator->validate()){
			$array=array("news_headline"=>$this->addFilter($values["txtNews"]),
			"created_date"=>$date,
			"news_details"=>$this->addFilter($values["txtData"]));
			$this->insert($array,"tbl_news");
			$result=true;
		}
		else {
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;		
	}	
	
	function listNews(){
		$records	=	$this->fetchAll("SELECT * FROM `tbl_news`");
	
		$total	=	$this->fetchAll("SELECT count(`news_id`) FROM `tbl_news`");
		$this->totalRecords	=	$total[0]["count(`news_id`)"];
		return $records;
	}

	function deleteNws($lId)
	{
		$this->delete("tbl_news","news_id='$lId'");
	}
	
	function updatePriorityForPressRelease($priorty,$nid)
	{	
		$result	=	false;
		if(!empty($priorty) && !empty($nid)){
			$array=array("news_priority"=>$priorty);
			$this->update($array,"tbl_news","news_id='$nid'");
			$result	=	true;
		}
		return $result;	
	}
	
	function fetchNewsById($id)
	{
		$query="SELECT * FROM `tbl_news` WHERE news_id='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	
	function updateNews($values,$id){
	
		$result=false;
		$validator=	new Validator(array($values["txtNews"]=>"category/EMPTY",
								$values["txtData"]=>"category/EMPTY"));
		if($validator->validate()){
			$array=array("news_headline"=>$this->addFilter($values["txtNews"]),
			"news_details"=>$this->addFilter($values["txtData"]));
			$this->update($array,"tbl_news","news_id='$id'");
			$result=true;
		}
		else {
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;		
	}	
	
	function updateimage($imagepath,$eid){
	
		$result=false;
		$array=array("news_id"=>$eid,
			"image_name"=>$imagepath);
			$this->insert($array,"tbl_images");
			$result=true;		
		return $result;		
	}	
	
	 function listimage($options,$eid){
		
		    $result	=	array();
			$start		=	$options["start"];
			$limit		=	$options["limit"];
		    $query="SELECT count(id) FROM `tbl_images` WHERE `news_id`='$eid'" ;
			$total	=	$this->fetchAll($query);
			$this->totalRecords	=	$total[0]["count(id)"];					
			$query="SELECT * FROM `tbl_images` WHERE  `news_id`='$eid' LIMIT $start,$limit";
			$records	=	$this->fetchAll($query);
			return $records;		
		}
		
		function deleteimages($id)
			{	
				$result	=	false;
				$query="SELECT `image_name` FROM `tbl_images` WHERE `id`=$id";
				$records	=	$this->fetchAll($query);
				if(!empty($records)){
					$result	=$records[0]["image_name"];			
					$this->delete("tbl_images","id='$id'");
					}
				return $result;
			}
	
}?>