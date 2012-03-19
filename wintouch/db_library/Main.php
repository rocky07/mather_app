<?php 
class Main extends Database_MySql
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
	
	

		function fetchPrjforlist($start,$limit)
		{
			$qry	=	"SELECT count(id) FROM `tbl_project`";
			$records	=	$this->fetchAll($qry);
			$this->totRecdd	=	$records[0]["count(id)"];
			$qry	=	"SELECT * FROM `tbl_project`";
			$qry.=" LIMIT ?,?";
			$bound_param	=	array("ii",$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;
			
		}
		
		
		function fetchsinglePrjforlist($id)
		{			
			$qry	=	"SELECT * FROM `tbl_project` where id=? ";		
			$bound_param	=	array("i",$id);		
			$records	=	$this->fetchAll($qry,$bound_param);
			return $records;			
			
		}
		
//		function fetchfloortypes($id)
//		{			
//			$qry	=	"SELECT * FROM `tbl_floor_type` where project_id=? ";		
//			$bound_param	=	array("i",$id);		
//			$records	=	$this->fetchAll($qry,$bound_param);
//			return $records;			
//			
//		}
		
		function fetchfloortypes($id,$start,$limit)
		{	
		    $qury	=	"SELECT count(id) FROM `tbl_floor_type` where project_id=?";
			$boundparam	=	array("i",$id);		
			$rerds	=	$this->fetchAll($qury,$boundparam);			
		    $this->totRec	=	$rerds[0]["count(id)"];
				
			$qry	=	"SELECT * FROM `tbl_floor_type` where project_id=?";
			$qry.=" LIMIT ?,?";			
			$bound_param	=	array("iii",$id,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
				
			return $records;			
			
		} 
		
	//	function fetchgalleryforwinprj($id)
//		{			
//			$qry	=	"SELECT * FROM `tbl_project_images` where project_id=? ";		
//			$bound_param	=	array("i",$id);		
//			$records	=	$this->fetchAll($qry,$bound_param);
//			return $records;			
//			
//		}
		
		function fetchgalleryforwinprj($id,$start,$limit)
		{	
		    $qury	=	"SELECT count(id) FROM `tbl_project_images` where project_id=?";
			$boundparam	=	array("i",$id);		
			$rerds	=	$this->fetchAll($qury,$boundparam);			
		    $this->totRec	=	$rerds[0]["count(id)"];
				
			$qry	=	"SELECT * FROM `tbl_project_images` where project_id=?";
			$qry.=" order by id desc LIMIT ?,?";			
			$bound_param	=	array("iii",$id,$start,$limit);		
			$records	=	$this->fetchAll($qry,$bound_param);
				
			return $records;			
			
		} 
		
		function fetchimageforWinhme()
		{			
			$qry	=	"SELECT * FROM `tbl_project_images` order by id desc";					
			$records	=	$this->fetchAll($qry);
			return $records;			
		}
}?>