 <?php 
class Utils extends Database_MySql
{
	public $errorMessage;
	public $userId;
	private $utilObject;
	
	
	function __construct()
	{
		parent::__construct();
		$this->connect();
	}

	//for mather app
	function listAllProjects(){
		$query="SELECT id,name,location as loc,project_image FROM tbl_project";
		//$param	=	array("i",$admin_id);
		$records	=	$this->fetchAll($query);
		return $records;
	}
	//list gallery images..	
	function listGalleryImages($projectId){
		$query="SELECT concat('gallery/',image_name) as name,caption FROM tbl_project_images where project_id=?";
		$param	=	array("i",$projectId);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}
	//list project details
	function listProjectDetails($projectId){
		$query="SELECT * FROM tbl_project where id=?";
		$param	=	array("i",$projectId);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}
		//list gallery images..	
	function listFloorTypeImages($projectId){
		$query="SELECT floor_type_name as type,concat('floor_type/',image_name) as name,square_feet FROM tbl_floor_type where project_id=?";
		$param	=	array("i",$projectId);
		$records	=	$this->fetchAll($query,$param);
		return $records;
	}	
	
	
}?>