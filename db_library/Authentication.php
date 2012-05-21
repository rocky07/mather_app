<?php 
class Authentication extends Database_MySql
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
	 * to login as an admin_user
	 * author: Jiby
	 */
	function checkAdminLogin($values)
	{
		$result		=	false;
		$validator	=	new Validator(array($values["txtUser"]=>"/EMPTY",$values["txtPassword"]=>"/EMPTY"));
		if($validator->validate())
		{
			$records		=	"";
			 $username		=	$values["txtUser"];
			 $password		=	md5($values["txtPassword"]);
			 $querry			=	"SELECT id FROM `bb_admin`  WHERE `username`=?";//check user name exist
			$param			=	array("s",$username);
			$records		=	$this->fetchAll($querry,$param);
									
			if(!empty($records))
			{
				$det_rec	=	array();
			    $querry			=	"SELECT * FROM `bb_admin`  WHERE `id`=? and password=?";//check username and password
				$param			=	array("is",$records[0]["id"],$password);
				$det_rec		=	$this->fetchAll($querry,$param);
				
							
				if(!empty($det_rec))
				{
					$result		=	true;
					$this->adminId	=	$det_rec[0]["id"];
					$this->adminName	=	$det_rec[0]["fullname"];
					$this->adminRole    =   $det_rec[0]["role"];
					
				}
				
					
				$ip	=	$_SERVER["REMOTE_ADDR"];
				$date	=	date("Y-m-d H:i:s");
				
				$val	=	array("lastlogin_date"=>$date,"lastlogin_ip"=>$ip);
															
				$tname	=	"bb_admin";
				$cond	=	"id=?";	
				$param =  array($this->adminId);			
				$ty		=	"ssi";
				
				$this->update($val,$tname,$cond,$param,$ty);
			
					
				
			}
			if(!$result)
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
	
	/*
	 * to set user_id for each page
	 * author: Jiby
	 */
	function setUserId($id)
	{
		 $this->userId	=	$id;
	}
	
	/*
	 * to get admin user's details
	 * author: Jiby
	 */
	function getAdminInfo($admin_id)
	{
		$query="SELECT * FROM `bb_admin` WHERE `id`=?";
		$param	=	array("i",$admin_id);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}

		
	function updatePassword($values,$adminId)
	{
		$result	=	false;
		$validator	=	new Validator(array(
												$values["txtCurrentPassword"]=>"/EMPTY",												
												$values["txtNewPassword"]=>"/EMPTY"));
		if($validator->validate())
		{
			$oldpassword	=	md5($values["txtCurrentPassword"]);		
			$newpassword	=	md5($values["txtNewPassword"]);					
			
				$val	=	array("password"=>$newpassword);
				$tname	=	"bb_admin";
				$cond	=	"id=? and password=?";
				$param	=	array($adminId,$oldpassword);
				$ty		=	"sis";
				if(!$this->update($val,$tname,$cond,$param,$ty)){
					$this->setError("Old Password doesn't match");
				}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
	
	}
	
	
	function updateAdminAccount($values,$adminId)
	{
		$result	=	false;
		$validator	=	new Validator(array(
												$values["txtUsername"]=>"/EMPTY",											
												$values["txtFullname"]=>"/EMPTY"));
		if($validator->validate())
		{
			
				$val	=	array("fullname"=>$values["txtFullname"],"username"=>$values["txtUsername"]);
				$tname	=	"bb_admin";
				$cond	=	"id=?";
				$param	=	array($adminId);
				$ty		=	"ssi";
				$this->update($val,$tname,$cond,$param,$ty);
					
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
	
	}
	
	
		function addImage($values,$imagepath)
		{
		$result	=	false;
		$validator	=	new Validator(array(
												$values["txtname"]=>"Name/EMPTY"));
		if($validator->validate())
		{			
	
			$array=array(
					"name"=>$values["txtname"],					
					"imagepath"=>$imagepath);
			$type	=	"ss";
			if($this->insert($array,"q_images",$type)){
				$result	=	true;
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
	
	
	function fetchPhotos($start,$limit)
	{
		$query	=	"SELECT count(id) FROM `q_images`";	
		$totcnt	=	$this->fetchAll($query);
		$this->totalCount	=	$totcnt[0]["count(id)"];//total count
				
		$qry	=	"SELECT * FROM `q_images` LIMIT ?,?";
		$param	=	array("ii",$start,$limit);
		$records	=	$this->fetchAll($qry,$param);
		return $records;
		
	}

	function deletePhoto($id)
		{
			$tname	=	"q_images";
			$condition	=	"id=?";
			$param		=	array("i",$id);		
			
			$qry	=	"SELECT imagepath FROM `q_images` where id=?";
		    $parame	=	array("i",$id);
		    $records	=	$this->fetchAll($qry,$parame);
		    
			
				
			$this->delete($tname,$condition,$param);
			return $records[0]["imagepath"];
			
		}
		
		
   function fetchPhotosForPublic()
	{
		$qry	=	"SELECT * FROM `q_images`";	
		$records	=	$this->fetchAll($qry);
		return $records;
		
	}
		
		
}?>