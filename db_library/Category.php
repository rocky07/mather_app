<?php 
class Category extends Database_MySql
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
	
		
     function addCategory($values)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["txtcatname"]=>"Title/EMPTY"		                                   
										 ));
		if($validator->validate())
		{		
			$array=array(					
						"cat_name"=>$values["txtcatname"]						
						);
			$type	=	"s";			
			if($this->insert($array,"category",$type)){
				$result	=	true;
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
	
		
		function fetchCategory($start,$limit)
		{
			$qry	=	"SELECT count(id) FROM `category`";
			$records	=	$this->fetchAll($qry);
			$this->totRec	=	$records[0]["count(id)"];
			$qry	=	"SELECT * FROM `category`";
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function deleteCategory($id)
		{
			$tname	=	"category";
			$condition	=	"id=?";
			$param		=	array("i",$id);			
			$this->delete($tname,$condition,$param);
			
		}


       function fetchCategoryById($id)
		{			
			$qry	=	"SELECT * FROM `category` where id=? ";		
			$bound_param	=	array("i",$id);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function updateCategory($values,$id)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["txtcatname"]=>"Title/EMPTY"		                                  
											 ));
		if($validator->validate())
		{		
			$array=array(					
						"cat_name"=>$values["txtcatname"]						
					);						
			        $type	=	"si";	
			        $tname	=	"category";
				    $cond	=	"id=? ";
					$param	=	array($id);
					
			if($this->update($array,$tname,$cond,$param,$type)){
				$result	=	true;
			}
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
		
		    $qry	=	"SELECT * FROM `tag_master` where tags=?";		
			$bound_param	=	array("s",$values["txtcatname"]);		
			$records	=	$this->fetchAll($qry,$bound_param);
			
			if(count($records)<=0){		
			$array=array(					
						"tags"=>$values["txtcatname"]						
						);
			$type	=	"s";			
			if($this->insert($array,"tag_master",$type)){
				$result	=	true;
			}
			}else{
			$this->setError("Tag Already Added");
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
		
		function deleteTags($id)
		{
			$tname	=	"tag_master";
			$condition	=	"id=?";
			$param		=	array("i",$id);			
			$this->delete($tname,$condition,$param);
			
		}


       function fetchTagById($id)
		{			
			$qry	=	"SELECT * FROM `tag_master` where id=? ";		
			$bound_param	=	array("i",$id);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		function updateTags($values,$id)
		{
		$result	=	false;
		$validator	=	new Validator(array($values["txtcatname"]=>"Title/EMPTY"		                                  
											 ));
		if($validator->validate())
		{		
			$array=array(					
						"tags"=>$values["txtcatname"]						
					);						
			        $type	=	"si";	
			        $tname	=	"tag_master";
				    $cond	=	"id=? ";
					$param	=	array($id);
					
			if($this->update($array,$tname,$cond,$param,$type)){
				$result	=	true;
			}
		}
		else
		{
			$this->setError($validator->getMessage())	;
		}
		return $result;
		
		}
		
	//pradosh
	
	 function fetchUserCategoryById($uid)
		{			
			$qry	=	"SELECT c.* FROM category c join business b on b.categ_id=c.id 
						 left join business_followers f on f.business_id=b.business_id where created_by=? or follower_id=? group by c.id";		
			$bound_param	=	array("ii",$uid,$uid);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
	
}?>