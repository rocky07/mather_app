<?php 
class Project extends Database_MySql
{
	public $errorMessage;
	public $userId;
	public $pid;
	private $utilObject;
	
	
	function __construct()
	{
		parent::__construct();
		$this->userId	=	null;
		$this->pid	=	null;
		$this->utilObject	=	new Utilities();
		
	}
	
	/*
	 * to set user_id for each page
	 * author: Jiby
	 */
	function setPId($id)
	{
		 $this->pid	=	$id;
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
	
	function addProject($values,$path,$logopath)
		{
			$result	=	false;
			$validator	=	new Validator(array(
												$values["txtName"]=>"Title/EMPTY",
												$values["txtText"]=>"Title/EMPTY",
												$values["txtType"]=>"Title/EMPTY",
												//$values["txtLand"]=>"Title/EMPTY",
												$values["txtfloors"]=>"Title/EMPTY",												
												$values["txtUni"]=>"Title/EMPTY",
												$values["district"]=>"Title/EMPTY",
												$values["cat"]=>"Title/EMPTY",
												$values["txtshort"]=>"Title/EMPTY",
												$values["latitude"]=>"Title/EMPTY|NUMBER",
												$values["longitude"]=>"Title/EMPTY|NUMBER",
												$values["txtTStatus"]=>"Title/EMPTY"
												//$values["txtSummary"]=>"Title/EMPTY",
											//	$values["txtSpec"]=>"Title/EMPTY",
											//	$values["txtAmeni"]=>"Title/EMPTY",
												));					
			 if($validator->validate())
			 {
				 if($this->projectExists($values["txtName"]))
				 {
						$this->errorMessage	=	"Project already exists";
				 }
				 else
				 {
						$array	=	array(
								"name"=>$this->addFilter($values["txtName"]),
								"location"=>$this->addFilter($values["txtText"]),
								"project_type"=>$this->addFilter($values["txtType"]),								
								"land_area"=>$this->addFilter($values["txtLand"]),
								"no_of_floors"=>$this->addFilter($values["txtfloors"]),
								"project_status"=>$this->addFilter($values["txtTStatus"]),
								"current_status"=>$this->addFilter($values["txtCStatus"]),
								"unit_type"=>$this->addFilter($values["txtUni"]),
								"summary"=>$this->addFilter($values["txtSummary"]),
								"specification"=>$this->addFilter($values["txtSpec"]),
								"district_id"=>$this->addFilter($values["district"]),
								"category"=>$this->addFilter($values["cat"]),
								"short_summary"=>$this->addFilter($values["txtshort"]),
								"latitude"=>$this->addFilter($values["latitude"]),
								"longitude"=>$this->addFilter($values["longitude"]),
								"project_image"=>$path,
								"project_logo"=>$logopath,
								"amenities"=>$this->addFilter($values["txtAmeni"]));	
								$this->insert($array,"tbl_project");
								$result=true;								
				}
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
	
		function projectExists($values)
		{
			$newsTitle	=	$values;
			$result	=	false;
			$query="SELECT `id` FROM `tbl_project` WHERE `name`='".$this->addFilter($values)."'";
			if(!empty($this->pid)){
				$query.=" AND `id`!='".$this->pid."'";
			}
			 $query;
			$records	=	$this->fetchAll($query);
			if(count($records)>0){
				$result	=	true;
			}
			return $result;
		}
		
		function getProjects()
		{
		 $query="SELECT * FROM `tbl_project`";
		$records	=	$this->fetchAll($query);
		return $records;
		}
	
	    function getProjectsforbooking($type)
		{
		$query="SELECT * FROM `tbl_project` where type='$type'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
	
		function addProjectStage($values)
		{
				$result	=	false;
				$stNo	=	$values["txtUni"];
				$flg	=	1;
				for($i=0;$i<$stNo;$i++){
					$kk	=	trim($values["txtstage".$i]);
					$nn	=	trim($values["txtpercentage".$i]);
					if(empty($kk) or empty($nn)){
						$flg	=	2;
					}
					if(!is_numeric($nn)){
						$flg	=	2;
					}
				
				}
				if($flg==1){
					for($i=0;$i<$stNo;$i++){				
							$array	=	array(
									"project_id"=>$this->addFilter($values["txtTtype"]),
									"percentage"=>$this->addFilter($values["txtpercentage".$i]),
									"stage_name"=>$this->addFilter($values["txtstage".$i]));	
									$this->insert($array,"tbl_project_stages");
									
							
					}
					$result	=	true;
				}
				return $result;
		}
	
	
		function addProjectFloor($values)
		{	
				$result	=	false;
				$stNo	=	$values["txtUni"];
				$flg	=	1;
				for($i=0;$i<$stNo;$i++){
					$kk	=	trim($values["txtFloorName".$i]);
					$nn	=	trim($values["txtSquare".$i]);
					//$nn	=	trim($values["txtStair".$i]);
					
					if(empty($kk) or empty($nn)){
						$flg	=	2;
					}
					if(!is_numeric($nn)){
						$flg	=	2;
					}
				
				}
				if($flg==1){
					for($i=0;$i<$stNo;$i++){				
							$array	=	array(
									"project_id"=>$this->addFilter($values["txtTtype"]),
									"square_feet"=>$this->addFilter($values["txtSquare".$i]),
									"stair_area"=>$this->addFilter($values["txtStair".$i]),
									"floor_type_name"=>$this->addFilter($values["txtFloorName".$i]));	
									$this->insert($array,"tbl_floor_type");
					}
					$result	=	true;
				}
				return $result;
		}
		
		function geFloorType()
		{
		 $query="SELECT id,floor_type_name FROM `tbl_floor_type` where `project_id`='".$this->pid."'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		function getType()
		{
		 $query="SELECT type FROM `tbl_project` where `id`='".$this->pid."'";
		$records	=	$this->fetchAll($query);
		return $records[0]["type"];
		}
		
		
		function addProjectUnit($values)
		{
				$result	=	false;
				$stNo	=	$values["txtUni"];
				$flg	=	1;
				for($i=0;$i<$stNo;$i++){
					$kk	=	trim($values["txtFloor".$i]);
					$nn	=	trim($values["txtName".$i]);
					if(empty($kk) or empty($nn)){
						$flg	=	2;
					}
					
				
				}
				if($flg==1){
					for($i=0;$i<$stNo;$i++){				
							$array	=	array(
									"project_id"=>$this->addFilter($values["txtTtype"]),
									"floor_type_id"=>$this->addFilter($values["txtFloor".$i]),
									"status"=>1,
									"unit_name"=>$this->addFilter($values["txtName".$i]));	
									$this->insert($array,"tbl_unit");
					}
					$result	=	true;
				}
				return $result;
		}
		
		
		function getLedger()
		{
		 $query="SELECT * FROM `tbl_ledger`";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function getPrjavail($id)
		{
		  $query="SELECT id,name,(select count(id) from `tbl_unit` where project_id='$id') as sumunit,
			  (select sum(square_feet) from `tbl_floor_type` where project_id='$id') as sumsqft,
			  (select count(id) from `tbl_unit` where project_id='$id' and status=3) as sumsold, 
			  (select sum(f.square_feet) from `tbl_floor_type` f join tbl_unit u on f.id=u.floor_type_id where f.project_id='$id' and u.status=3) as sumsoldarea 
			  FROM `tbl_project` where `id`='$id' ";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function addProjectLedger($values)
		{
			$result	=	false;
			$validator	=	new Validator(array(
												$values["txtTtype"]=>"Title/EMPTY",
												$values["txtLedger"]=>"Title/EMPTY",
												$values["txtLedgerName"]=>"Title/EMPTY|FILTER"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"project_id"=>$this->addFilter($values["txtTtype"]),
								"ledger_id"=>$this->addFilter($values["txtLedger"]),
								"ledgertype_name"=>$this->addFilter($values["txtLedgerName"]));	
								$this->insert($array,"tbl_ledger_type");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		
		function getAllProjects($start,$limit,$key)
		{
			if(!empty($key)){
				$qr	=	" AND (`name` LIKE '$key%' OR `location` LIKE '%$key%')";				
			} 
			$query="SELECT * FROM `tbl_project` WHERE `id`!=''";
			$query.=$qr." LIMIT $start,$limit";
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(`id`) FROM `tbl_project` WHERE `id`!=''";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(`id`)"];
			return $records;
		}
		
		function getProjectDetails($id)
		{
		$query="SELECT * FROM `tbl_project` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function getPrevimage($id)
		{
		$query="SELECT project_image FROM `tbl_project` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records[0]["project_image"];
		}
	    
		function getPrevimage1($id)
		{
		$query="SELECT project_logo FROM `tbl_project` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records[0]["project_logo"];
		}
	     
	function updateProject($values,$imagepath,$ipath)
		{
			$result	=	false;
			$validator	=	new Validator(array(
												$values["txtName"]=>"Title/EMPTY",
												$values["txtText"]=>"Title/EMPTY",
												$values["txtType"]=>"Title/EMPTY",
											//	$values["txtLand"]=>"Title/EMPTY",
												$values["txtfloors"]=>"Title/EMPTY",												
												$values["txtUni"]=>"Title/EMPTY",
												$values["district"]=>"Title/EMPTY",
												$values["cat"]=>"Title/EMPTY",
												$values["txtshort"]=>"Title/EMPTY",
												$values["latitude"]=>"Title/EMPTY|NUMBER",
												$values["longitude"]=>"Title/EMPTY|NUMBER",
												$values["txtTStatus"]=>"Title/EMPTY"
												//$values["txtSummary"]=>"Title/EMPTY",												
												//$values["txtSpec"]=>"Title/EMPTY",
											//	$values["txtAmeni"]=>"Title/EMPTY"
											));
					
			 if($validator->validate())
			 {
				 if($this->projectExists($values["txtName"]))
				 {
						$this->errorMessage	=	"Project already exists";
				 }
				 else
				 {
						$array	=	array(
								"name"=>$this->addFilter($values["txtName"]),
								"location"=>$this->addFilter($values["txtText"]),
								"project_type"=>$this->addFilter($values["txtType"]),								
								"land_area"=>$this->addFilter($values["txtLand"]),
								"no_of_floors"=>$this->addFilter($values["txtfloors"]),
								"project_status"=>$this->addFilter($values["txtTStatus"]),
								"current_status"=>$this->addFilter($values["txtCStatus"]),
								"unit_type"=>$this->addFilter($values["txtUni"]),
								"summary"=>$this->addFilter($values["txtSummary"]),
								"specification"=>$this->addFilter($values["txtSpec"]),
								"district_id"=>$this->addFilter($values["district"]),
								"short_summary"=>$this->addFilter($values["txtshort"]),
								"latitude"=>$this->addFilter($values["latitude"]),
								"longitude"=>$this->addFilter($values["longitude"]),
								"category"=>$this->addFilter($values["cat"]),
								"project_image"=>$imagepath,
								"project_logo"=>$ipath,
								"amenities"=>$this->addFilter($values["txtAmeni"]));

						$this->UPDATE($array,"tbl_project","id='".$this->pid."'");
								
						$result	=	true;
				}
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
	
		function getAllStages($start,$limit,$key)
		{
			if(!empty($key)){
				$qr	=	" AND s.`project_id` ='$key'";
				
			} 
			$query="SELECT s.*,p.`name` FROM `tbl_project_stages` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!='' ";
			$query.=$qr." order by s.`project_id` LIMIT $start,$limit ";
			$records	=	$this->fetchAllJoin($query);
			$query="SELECT COUNT(s.`id`) FROM `tbl_project_stages` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!=''";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(s.`id`)"];
			return $records;
		}
		
		function getStageDetails($id)
		{
		$query="SELECT * FROM `tbl_project_stages` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function updateStage($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array($values["percentage"]=>"Title/EMPTY",
												$values["txtName"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				 			$array	=	array("percentage"=>$this->addFilter($values["percentage"]),
								"stage_name"=>$this->addFilter($values["txtName"]));	
								$this->UPDATE($array,"tbl_project_stages","id='$id'");
						$result	=	true;
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		
		function getUnits($fid)
		{
		$query="SELECT u.*,f.square_feet,f.floor_type_name,f.stair_area,p.type,p.id FROM `tbl_unit` u join `tbl_floor_type` f on u.floor_type_id=f.id join `tbl_project` p  on u.project_id=p.id where u.`id`='$fid'";
		$records	=	$this->fetchAll($query);
		return $records;
		}		
		function getProjectUnits()
		{
		$query="SELECT id,unit_name FROM `tbl_unit` where `project_id`='".$this->pid."' and `status`='1' or `status`='2'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		
		
		// to fetch units of a project
		
		function getAllUnits($start,$limit,$key)
		{
			if(!empty($key)){
				$qr	=	" AND s.project_id ='$key'";
				
			} 
			$query="SELECT s.*,p.name,f.Image_name FROM `tbl_unit` s INNER JOIN `tbl_project` p ON s.project_id = p.id INNER JOIN `tbl_floor_type` f ON s.floor_type_id=f.id WHERE s.id != ''";
			$query.=$qr." order by s.project_id LIMIT $start,$limit";
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(s.id) FROM `tbl_unit` s INNER JOIN `tbl_project` p ON s.project_id = p.id INNER JOIN `tbl_floor_type` f ON s.floor_type_id=f.id WHERE s.id != ''";
			$query.=$qr." order by s.project_id";
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(s.id)"];
			return $records;
		}
		
		
		function getFloortypename($floortypeid)
		{
		$query="SELECT `floor_type_name` FROM `tbl_floor_type` WHERE `id`='$floortypeid'";
		$name	=	$this->fetchAll($query);
		return $name;		
		}
		
		function getUnitDetails($id)
		{
		$query="SELECT * FROM `tbl_unit` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function updateUnit($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array(
												$values["txtName"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				 			$array	=	array(
								"unit_name"=>$this->addFilter($values["txtName"]));	
								$this->UPDATE($array,"tbl_unit","id='$id'");
						$result	=	true;
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		// to fetch ledgers of a project
		
		function getAllLedger($start,$limit,$key)
		{
			if(!empty($key)){
				$qr	=	" AND s.`project_id` ='$key'";
				
			} 
			$query="SELECT s.*,p.`name`,l.`ledger_name` FROM `tbl_ledger_type` s join `tbl_project` p on s.`project_id`=p.`id` join `tbl_ledger` l on l.`id`=s.`ledger_id` WHERE s.`id`!='' ";
			$query.=$qr." order by s.`project_id` LIMIT $start,$limit ";
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(s.`id`) FROM `tbl_ledger_type` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!=''";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(s.`id`)"];
			return $records;
		}
		
		function getLedgerDetails($id)
		{
		$query="SELECT * FROM `tbl_ledger_type` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function updateLedger($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array(
												$values["txtName"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				 			$array	=	array(
								"ledgertype_name"=>$this->addFilter($values["txtName"]));	
								$this->UPDATE($array,"tbl_ledger_type","id='$id'");
						$result	=	true;
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		function deleteledger($lId)
		{				
			
			$query="delete FROM `tbl_ledger_type` where `id`='$lId'";
			$this->execute($query);					
			return true;					
		}
				
		function getAllfloortype($start,$limit,$key)
		{
			if(!empty($key)){
				$qr	=	" AND (s.floor_type_name LIKE '$key%' OR p.name LIKE '$key%')";				
			} 
			
			$query="SELECT s.*,p.name FROM `tbl_floor_type` s join `tbl_project` p on s.project_id=p.id WHERE s.id!=''";
			$query.=$qr." order by s.project_id LIMIT $start,$limit ";
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(s.id) FROM `tbl_floor_type` s join `tbl_project` p on s.project_id=p.id WHERE s.id!=''";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=$total[0]["COUNT(s.id)"];
			return $records;
		}
		
		function getfloortypeDetails($id)
		{
		$query="SELECT * FROM `tbl_floor_type` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function getLocationMap($id)
		{
		$query="SELECT * FROM `tbl_project` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		
		function addfloortype($values,$imagepath)
		{
			$result	=	false;
			$validator	=	new Validator(array($values["txtName"]=>"Title/EMPTY",
		                         $values["txtSqfeet"]=>"Title/EMPTY/NUMBER",			 					 
								 $values["project"]=>"Title/EMPTY"
			                     ));
					
			 if($validator->validate())
			 {
					$array	=	array(
						"floor_type_name"=>$this->addFilter($values["txtName"]),						
						"square_feet"=>$this->addFilter($values["txtSqfeet"]),
						"project_id"=>$this->addFilter($values["project"]),
						"Image_name"=>$imagepath
						);	
						$this->insert($array,"tbl_floor_type");
							
					$result	=	true;
			}else{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
				
		function updatefloortype($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array($values["txtName"]=>"Title/EMPTY",
			                                 $values["txtSqfeet"]=>"Title/EMPTY/NUMBER",
											 $values["project"]=>"Title/EMPTY"
											 ));
					
			 if($validator->validate())
			 {
				 			$array	=	array(
								"floor_type_name"=>$this->addFilter($values["txtName"]),								
								"square_feet"=>$this->addFilter($values["txtSqfeet"]),
								"project_id"=>$this->addFilter($values["project"]));	
								$this->UPDATE($array,"tbl_floor_type","id='$id'");
						$result	=	true;
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		function getMyLedger()
		{
		$query="SELECT s.*,l.`ledger_name` FROM `tbl_ledger_type` s join `tbl_ledger` l on l.`id`=s.`ledger_id` WHERE s.`project_id`='".$this->pid."' order by s.ledger_id ";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		function getMyStages()
		{
		$query="SELECT * FROM `tbl_project_stages` where `project_id`='".$this->pid."'";
		$records	=	$this->fetchAll($query);
		return $records;
		}
		
		
		//rekha
		//to get percentage for a project
		
		function getpercentage($pid)
		{
		$query="SELECT SUM(`percentage`) FROM `tbl_project_stages` where `project_id`='$pid'";
		$tot	=	$this->fetchAll($query);		
		return $tot;
		}
		
		
		function updateimage($imagepath,$id)
		{
		    $query="SELECT Image_name FROM `tbl_floor_type` where `id`='$id'";
		    $imagename	=	$this->fetchAll($query);		   
			$array=array("Image_name"=>$imagepath
				);
			$this->update($array,"tbl_floor_type","id='$id'");		
			return $imagename[0]["Image_name"];		
		}
		
		function updateLocationMap($imagepath,$id)
		{
		    $query="SELECT `location_map` FROM `tbl_project` where `id`='$id'";
		    $imagename	=	$this->fetchAll($query);	
			$array=array("location_map"=>$imagepath);
			$this->update($array,"tbl_project","id='$id'");	
			return $imagename[0]["location_map"];		
		}
		
	/*
	 * to get all units by type
	 * author: Deepthi
	 */
	function getUnitsByType($start,$limit,$searchtext,$type){
		if(!empty($searchtext)){
			$qr	=	" AND (u.unit_name LIKE '$searchtext%' or p.name LIKE '$searchtext%' or f.floor_type_name LIKE '$searchtext%')";			   	    
		}				
		$query="SELECT u.id,u.project_id,u.floor_type_id,f.floor_type_name,u.unit_name,u.status,f.square_feet,(select status_narration FROM `tbl_narration` WHERE u.id=tbl_narration.unit_id) as rrr FROM `tbl_unit` u INNER JOIN `tbl_project` p on u.project_id=p.id INNER JOIN `tbl_floor_type` f ON u.floor_type_id=f.id WHERE p.type='$type'";
		 $query.=$qr." order by u.id desc LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);		
		$query="SELECT COUNT(u.id) FROM `tbl_unit` u INNER JOIN `tbl_project` p on u.project_id=p.id INNER JOIN `tbl_floor_type` f ON u.floor_type_id=f.id WHERE p.type='$type'";
		$query.=$qr." order by u.id desc";
		$recosrds	=	$this->fetchAll($query);
		$this->totalRec	= 	$recosrds[0]["COUNT(u.id)"];
		return $records;		
	}	
	
	/*
	 * to update status
	 * author: Deepthi
	 */
	function updateStatus($status,$unitId)
	{	
	echo $status;
	//DELETE FROM `crm`.`tbl_narration` WHERE `tbl_narration`.`id` = 10 LIMIT 1;
				if($status==1){
					$this->delete("tbl_narration","unit_id='$unitId'");
						}
		$array=array("status"=>$this->addFilter($status));
		$this->update($array,"tbl_unit","id='$unitId'");

                    

		return true;	
	}
	
	function getAllCres()
	{
		$query="SELECT * FROM `tbl_users` where `role_id`='7'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function assignCre($cre_id,$pid)
	{
		$array=array("cre_id"=>$this->addFilter($cre_id));
		$this->update($array,"tbl_project","id='$pid'");
		return true;	
	}
	
	function getProjectsForCRExecutive($start,$limit,$key,$userid)
	{
	    if(!empty($key)){
				$qr	=	" AND `name` LIKE '$key%'";
				
			} 
		$query="SELECT id,name,type,current_stage_id FROM `tbl_project` WHERE `cre_id`='$userid'";
		$query.=$qr." LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		$query="SELECT COUNT(`id`) FROM `tbl_project` WHERE `cre_id`='$userid'";
	    $query.=$qr;
		$recosrds	=	$this->fetchAll($query);
		$this->totalRec	= 	$recosrds[0]["COUNT(`id`)"];
		return $records;
	}	
	
	function getAllStagesForPrj($pid)
	{
		$query="SELECT id,stage_name FROM `tbl_project_stages` where `project_id`='$pid'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function insertCurrentStageid($values,$stageid,$pid,$preid)
	{
		$array	=	array("current_stage_id"=>$this->addFilter($stageid));	
		$this->update($array,"tbl_project","id='$pid'");		
		$array	=	array("completion_date"=>$this->addFilter($values["date"]));	
		$this->update($array,"tbl_project_stages","id='$preid'");		
		return true;
	}
	
	function fetchstages($pid)
	{
		$query="SELECT p.*,s.completion_date,s.stage_name,s.id as stageid FROM `tbl_project` p inner join `tbl_project_stages` s on p.id=s.project_id where p.id='$pid'";
		$records	=	$this->fetchAll($query);
		 $query="SELECT COUNT(p.id) FROM `tbl_project` p inner join `tbl_project_stages` s on p.id=s.project_id where p.id='$pid'";	   
		$recosrds	=	$this->fetchAll($query);
		$this->totalRec	= 	$recosrds[0]["COUNT(p.`id`)"];
		return $records;
	}
	
	
	function updateprojectimage($image,$preid)
	{	
		$array=array("image_name"=>$this->addFilter($image),
		         	  "stage_id"=>$this->addFilter($preid)			
		);
		$this->insert($array,"tbl_project_images");
		return true;	
	}
	
	//rekha
	
	function getBookingIdByUnitId($uid)
	{
		$query="SELECT id FROM `tbl_booking_form` where `unit_id`='$uid'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function getProjectRep()
	{
		 $query="SELECT p.name,count(u.id) as cnt,(select sum(square_feet) from tbl_floor_type where p.id=tbl_floor_type.project_id) as totsqft,(select count(id) from `tbl_unit` where (status=3 or status=4) and p.id=tbl_unit.project_id) as sumsold,(select count(id) from `tbl_unit` where status=1 and p.id=tbl_unit.project_id) as sumAvail,(select count(id) from `tbl_unit` where status=2 and p.id=tbl_unit.project_id) as sumBlok,(select count(id) from `tbl_unit` where status=4 and p.id=tbl_unit.project_id) as sumBook FROM `tbl_project` p join tbl_unit u on u.project_id=p.id   group by p.id" ;
		$records	=	$this->fetchAll($query);
		return $records;
		
		
		
	}
	
	//praveen
	
	function updateStatus1($unitId,$narration)
	{	
		$array=array("status"=>2);
		$this->update($array,"tbl_unit","id='$unitId'");
		
		$array1=array("status_narration"=>$this->addFilter($narration),
		"unit_id"=>$this->addFilter($unitId));
		$this->insert($array1,"tbl_narration");
		
		
		return true;	
	}
	
	function projectReport()
	{
$query="SELECT p.name,count(u.id) as cnt,
	(select sum(tr.square_feet) from tbl_floor_type tr join `tbl_unit` qw on tr.id=qw.floor_type_id where p.id=tr.project_id) as totsqft,
	(select count(id) from `tbl_unit` where (status=3 or status=4) and p.id=tbl_unit.project_id) as sumsold,
	(select count(id) from `tbl_unit` where status=1 and p.id=tbl_unit.project_id) as sumAvail,
	(select count(id) from `tbl_unit` where status=2 and p.id=tbl_unit.project_id) as sumBlok,
	(select count(id) from `tbl_unit` where status=4 and p.id=tbl_unit.project_id) as sumBook, (select sum(tr.square_feet) from tbl_floor_type tr join `tbl_unit` qw on tr.id=qw.floor_type_id where (status=3 or status=4) and p.id=tr.project_id) as sqft,
	(select sum(tr.square_feet) from tbl_floor_type tr join `tbl_unit` qw on tr.id=qw.floor_type_id where status=1 and p.id=tr.project_id) as asqft,
	(select sum(tr.square_feet) from tbl_floor_type tr join `tbl_unit` qw on tr.id=qw.floor_type_id where status=2 and p.id=tr.project_id) as blsqft,
	(select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee where ee.id=yy.floor_type_id and p.id=yy.project_id) as totcost,
	(select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee where (yy.status=3 or yy.status=4) and ee.id=yy.floor_type_id and p.id=yy.project_id) as soldtotcost,
	(select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee where yy.status=1  and ee.id=yy.floor_type_id and p.id=yy.project_id) as avtotcost,
	(select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee where yy.status=2  and ee.id=yy.floor_type_id and p.id=yy.project_id) as bltotcost 
	 FROM `tbl_project` p join tbl_unit u on u.project_id=p.id group by p.id" ;
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	//rekha
		
		function getUnitsForEditSqft($pid)
		{
		 $query="SELECT u.*,f.square_feet,f.stair_area FROM `tbl_unit` u join `tbl_floor_type` f on f.id=u.floor_type_id where u.`project_id`='$pid'";
		$records	=	$this->fetchAll($query);		
		  $query="SELECT COUNT(u.`id`) FROM `tbl_unit` u join `tbl_floor_type` f on f.id=u.floor_type_id where u.`project_id`='$pid'";	   
		$recosrds	=	$this->fetchAll($query);
		$this->totalRec	= 	$recosrds[0]["COUNT(u.`id`)"];
		return $records;
		}
	
	function updateRatePerSqft($unitId,$value,$value1)
	{	
		$result	=	false;
		if(!empty($unitId) && !empty($value)&& !empty($value1)){
			$array=array("rate_per_sqft"=>$value,
			"rate_per_terrace"=>$value1);
			$this->update($array,"tbl_unit","id='$unitId'");
			$result	=	true;
		}
		return $result;
	}	
	
	//rekha
	
	function getProjectsForCRE($userid)
	{
	    $query="SELECT id,name FROM `tbl_project` WHERE `cre_id`='$userid'";		
		$records	=	$this->fetchAll($query);	    
		return $records;
	}	
	
	function getAllLedgerForCRE($start,$limit,$key,$userId)
		{
			if(!empty($key)){
				$qr	=	" AND s.`project_id` ='$key'";
				
			} 
			$query="SELECT s.*,p.`name`,l.`ledger_name` FROM `tbl_ledger_type` s join `tbl_project` p on s.`project_id`=p.`id` join `tbl_ledger` l on l.`id`=s.`ledger_id` WHERE s.`id`!='' and p.cre_id='$userId' ";
			$query.=$qr." order by s.`project_id` LIMIT $start,$limit ";
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(s.`id`) FROM `tbl_ledger_type` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!='' and p.cre_id='$userId'";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(s.`id`)"];
			return $records;
		}
		
		function getAllStagesForCRE($start,$limit,$key,$userId)
		{
			if(!empty($key)){
				$qr	=	" AND s.`project_id` ='$key'";
				
			} 
			$query="SELECT s.*,p.`name` FROM `tbl_project_stages` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!='' and p.cre_id='$userId'  ";
			$query.=$qr." order by s.`project_id` LIMIT $start,$limit ";
			$records	=	$this->fetchAllJoin($query);
			$query="SELECT COUNT(s.`id`) FROM `tbl_project_stages` s join `tbl_project` p on s.`project_id`=p.`id` WHERE s.`id`!='' and p.cre_id='$userId' ";
			$query.=$qr;
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(s.`id`)"];
			return $records;
		}
	//rekha
		
		function getUnitsByTypeForCRE($start,$limit,$searchtext,$type){
		if(!empty($searchtext)){
			$qr	=	" AND (u.unit_name LIKE '$searchtext%' or p.name LIKE '$searchtext%' or f.floor_type_name LIKE '$searchtext%')";			   	    
		}				
		$query="SELECT u.id, u.project_id, u.floor_type_id, f.floor_type_name, u.unit_name, u.status, f.square_feet,(SELECT status_narration FROM `tbl_narration` WHERE u.id = tbl_narration.unit_id) AS rrr
FROM `tbl_unit` u INNER JOIN `tbl_project` p ON u.project_id ='$type' INNER JOIN `tbl_floor_type` f ON u.floor_type_id = f.id";
	    $query.=$qr." GROUP BY u.id desc LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);		
		$query="SELECT COUNT(u.id) FROM `tbl_unit` u INNER JOIN `tbl_project` p ON u.project_id ='$type' INNER JOIN `tbl_floor_type` f ON u.floor_type_id = f.id ";
		$query.=$qr." GROUP BY u.id desc";
		$recosrds	=	$this->fetchAll($query);
		$this->totalRec	= 	$recosrds[0]["COUNT(u.id)"];
		return $records;		
	}	
	
	function getCurrentstage($pid)
	{
	   	$query="SELECT s.stage_name,p.current_stage_id FROM `tbl_project` p inner join `tbl_project_stages` s on p.current_stage_id=s.id WHERE `project_id`='$pid'";
		$records	=	$this->fetchAll($query);
		return $records;
	}	
	
	
	function getStagePhotos($stid)
	{
	    $query="SELECT id,image_name,caption FROM `tbl_project_images` WHERE `stage_id`='$stid'";		
		$records	=	$this->fetchAll($query);	    
		return $records;
	}	
	
	function delStagePhoto($lId)
		{				
			
			$query="delete FROM `tbl_project_images` where `id`='$lId'";
			$this->execute($query);					
			return true;					
		}
	//rekha
	
	function getProjectRepForCre($userId)
	{
	   	     	
		 $query="SELECT p.name,count(u.id) as cnt,		 
		 
		 (select count(id) from `tbl_unit` where (status=3 or status=4) and p.id=tbl_unit.project_id) as sumsold,		 
		 (select count(id) from `tbl_unit` where status=1 and p.id=tbl_unit.project_id) as sumAvail,
		 (select count(id) from `tbl_unit` where status=2 and p.id=tbl_unit.project_id) as sumBlok,
		 (select count(id) from `tbl_unit` where status=4 and p.id=tbl_unit.project_id) as sumBook FROM `tbl_project` p join tbl_unit u on u.project_id=p.id where p.cre_id=$userId group by p.id";
		$records	=	$this->fetchAll($query);
		return $records;
		
	}
	
	function getProjectDetRepForCre($userId)
	{
		 $query="SELECT p.name,count(u.id) as totalapts,
		 
			 (select count(id) from `tbl_unit` where (status=3 or status=4) and p.id=tbl_unit.project_id) as sumsold,
		 (select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee on ee.id=yy.floor_type_id  where (yy.status=3 or yy.status=4)  and p.id=yy.project_id) as soldtotcost,
		 (select sum(bk.car_parking_cost) from `tbl_unit` yy join `tbl_booking_form` bk on yy.id=bk.unit_id  where p.id=yy.project_id) as sumcar,
		 
		 (select sum(ee.square_feet*yy.rate_per_sqft)+sum(ee.stair_area*yy.rate_per_terrace) from `tbl_unit` yy join `tbl_floor_type` ee where yy.status=1 and ee.id=yy.floor_type_id and p.id=yy.project_id) as totflatstobesold,
		 
		 (SELECT sum(amount) FROM `tbl_ledger_booking` l join `tbl_booking_form` bk on l.booking_id=bk.id join `tbl_unit` yy on bk.unit_id=yy.id
WHERE l.ledger_id !=1 and p.id=yy.project_id ) AS totstatu,
         
		 (select sum(amount) from `tbl_payment` py join `tbl_booking_form` bk on py.booking_id=bk.id join `tbl_unit` yy on bk.unit_id=yy.id where py.credit_or_debit=1 and p.id=yy.project_id) as totamtreceived,
		 		 
		 (select count(id) from `tbl_unit` where status=1 and p.id=tbl_unit.project_id) as sumAvail,
		 (select count(id) from `tbl_unit` where status=2 and p.id=tbl_unit.project_id) as sumBlok,
		 (select count(id) from `tbl_unit` where status=4 and p.id=tbl_unit.project_id) as sumBook FROM `tbl_project` p join tbl_unit u on u.project_id=p.id where p.cre_id=$userId group by p.id" ;
		$records	=	$this->fetchAll($query);
		return $records;		
	}
	
	function addImage($name,$caption,$pid)
	{
		$array	=	array("project_id"=>$pid,
					"image_name"=>$name,	
					"caption"=>$caption);					
		$this->insert($array,"tbl_project_images");
	}	
	
	function getAllPhotos($projectid,$start,$limit){
		$query="SELECT COUNT(id) FROM `tbl_project_images` where project_id=$projectid order by id desc";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(id)"];
		unset($records);
		$query="SELECT i.*,p.name FROM `tbl_project_images` i INNER JOIN `tbl_project` p ON i.project_id=p.id  where i.project_id=$projectid order by i.id desc LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function delPhoto($lId)
	{
		$query="SELECT `image_name` FROM `tbl_project_images` WHERE `id`=$lId";
		$records	=	$this->fetchAll($query);
		$this->delete("tbl_project_images","id='$lId'");
		return $records[0]["image_name"];
	}
	
	function updateMCms($values,$id)
	{
		$result		=	false;
		$validator	=	new Validator(array($values["txtContent"]=>"PageTitle/EMPTY",
											$values["project"]=>"PageTitle/EMPTY"));
		if($validator->validate())
		{
			$array	=	array("chart_data"=>$this->addFilter($values["txtContent"]),
							  "project_id"=>$this->addFilter($values["project"]));		
			$this->update($array,"tbl_availability_chart","id='$id'");
			$result	=	true;				
		}
		else
		{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
	function addMCms($values)
	{		
		$result		=	false;
		$validator	=	new Validator(array($values["txtContent"]=>"PageTitle/EMPTY",
											$values["project"]=>"PageTitle/EMPTY"));
		 if($validator->validate())
		 {
				$array	=	array("chart_data"=>$this->addFilter($values["txtContent"]),
							  "project_id"=>$this->addFilter($values["project"]));	
				$this->insert($array,"tbl_availability_chart");
				$result	=	true;				
		}
		else
		{
			$this->errorMessage	=	$validator->getMessage();
		}
		return $result;
	}
	
	function getAvailabilityChart($id)
	{
		$query="SELECT * FROM `tbl_availability_chart` where `id`='$id'";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function getAllAvailabilityCharts($start,$limit)
	{			
		$query="SELECT c.*,p.name FROM `tbl_availability_chart` c INNER JOIN `tbl_project` p ON c.project_id=p.id LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		$query="SELECT COUNT(c.id) FROM `tbl_availability_chart` c INNER JOIN `tbl_project` p ON c.project_id=p.id";
		$total	=	$this->fetchAll($query);
		$this->totalRec	=	$total[0]["COUNT(c.id)"];
		return $records;
	}
	
	function delProjects($pid)
	{
		$this->delete("tbl_project","id='$pid'");
		$this->delete("tbl_project_images","project_id='$pid'");
		$this->delete("`tbl_availability_chart","project_id='$pid'");
		$this->delete("tbl_floor_type","project_id='$pid'");
	}
	
	function delFloortypes($fid)
	{
		$this->delete("tbl_floor_type","id='$fid'");
	}
	
	function fetchProjects($status,$start,$limit)
	{
	    if($status==2){
		$sta = "New Project";
		}else if($status==3) {
		$sta = "Ongoing";
		}else if($status==4) {
		$sta = "Completed";
		}else{
		$sta ="all";
		}
	   
		$query="SELECT p.*,d.district_name FROM `tbl_project` p join `tbl_district` d on p.district_id=d.id where project_status='$sta' order by p.prj_priority LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		
		$query="SELECT COUNT(p.id) FROM `tbl_project` p join `tbl_district` d on p.district_id=d.id where project_status='$sta'";
		$total	=	$this->fetchAll($query);
		$this->totalRec	=	$total[0]["COUNT(p.id)"];
		
		
		if($sta=="all"){
		$query="SELECT p.*,d.district_name FROM `tbl_project` p join `tbl_district` d on p.district_id=d.id order by p.prj_priority,id desc LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		
		$query="SELECT COUNT(p.id) FROM `tbl_project` p join `tbl_district` d on p.district_id=d.id";
		$total	=	$this->fetchAll($query);
		$this->totalRec	=	$total[0]["COUNT(p.id)"];
		}
		return $records;
	}
	
	function fetchDistricts()
	{
		$query="SELECT * FROM `tbl_district`";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function addDocument($values,$path)
		{
			$result	=	false;
			$validator	=	new Validator(array(			
									            $values["project"]=>"Title/EMPTY",
												$values["caption"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"caption"=>$this->addFilter($values["caption"]),
								"project_id"=>$this->addFilter($values["project"]),
								"document_name"=>$path);	
								$this->insert($array,"tbl_documents");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		function getAllDocuments($start,$limit){
		
		$query="SELECT COUNT(d.id) FROM `tbl_documents` d join tbl_project p on p.id=d.project_id";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(d.id)"];		
		$query="SELECT d.*,p.name FROM `tbl_documents` d join tbl_project p on p.id=d.project_id LIMIT $start,$limit";
		$rec	=	$this->fetchAll($query);
		return $rec;
     	}
		
		function delDocument($lId)
	{
		$query="SELECT `document_name` FROM `tbl_documents` WHERE `id`=$lId";
		$records	=	$this->fetchAll($query);
		$this->delete("tbl_documents","id='$lId'");
		return $records[0]["document_name"];
	}
	
		function addTowerName($values,$pid)
		{
			$result	=	false;
			$validator	=	new Validator(array(									
												$values["tower"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"tower_name"=>$this->addFilter($values["tower"]),
								"project_id"=>$pid);	
								$this->insert($array,"tbl_tower");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
	   function fetchTower($pid,$start,$limit)
		{	
			$query="SELECT * FROM `tbl_tower` where project_id=$pid LIMIT $start,$limit";			
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(`id`) FROM `tbl_tower` where project_id=$pid";		
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(`id`)"];
			return $records;
		}
		
		function deleteTower($id)
	{
		$this->delete("tbl_tower","id='$id'");		
	}
	
	function fetchTowerById($id)
	{
		$query="SELECT * FROM `tbl_tower` where id=$id";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	    function updateTowername($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array(									
												$values["tower"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"tower_name"=>$this->addFilter($values["tower"]));	
								$this->update($array,"tbl_tower","id='$id'");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		function getProjectName($id)
			{
				$query="SELECT name FROM `tbl_project` where id=$id";
				$records	=	$this->fetchAll($query);
				return $records;
			}
			
		function getFloorName($id)
			{
				$query="SELECT floor_name FROM `tbl_floor` where id=$id";
				$records	=	$this->fetchAll($query);
				return $records;
			}	
			
			function addFloorName($values,$pid,$towerid)
		{
			$result	=	false;
			$validator	=	new Validator(array(									
												$values["floor"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"floor_name"=>$this->addFilter($values["floor"]),
								"tower_id"=>$towerid,
								"project_id"=>$pid);	
								$this->insert($array,"tbl_floor");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
		 function fetchFloor($pid,$towerid,$start,$limit)
		{	
			$query="SELECT * FROM `tbl_floor` where project_id=$pid and tower_id=$towerid LIMIT $start,$limit";			
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(`id`) FROM `tbl_floor` where project_id=$pid and tower_id=$towerid";		
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(`id`)"];
			return $records;
		}
		
			function deleteFloor($id)
			{
				$this->delete("tbl_floor","id='$id'");		
			}
			
			function fetchFloorById($id)
			{
				$query="SELECT * FROM `tbl_floor` where id=$id";
				$records	=	$this->fetchAll($query);
				return $records;
			}
			
	    function updateFloorname($values,$id)
		{
			$result	=	false;
			$validator	=	new Validator(array(									
												$values["floor"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(
								"floor_name"=>$this->addFilter($values["floor"]));	
								$this->update($array,"tbl_floor","id='$id'");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
	       function getFloorType($id)
			{
				$query="SELECT * FROM `tbl_floor_type` where project_id=$id";
				$records	=	$this->fetchAll($query);
				return $records;
			}
			
			
	        function getDocuments($id)
			{
				$query="SELECT * FROM `tbl_documents` where project_id=$id";
				$records	=	$this->fetchAll($query);
				return $records;
			}
			
				
			
		function addUnitName($values,$name,$pid,$towerid,$fid)
			{
				$result	=	false;
				
				$validator	=	new Validator(array(													    
													$values["status"]=>"Title/EMPTY",
													//$values["sqfeet"]=>"Title/EMPTY",
													$name=>"Title/EMPTY"
													//values["rooms"]=>"Title/EMPTY"
													));
				$util	=	new Utilities();
	          	$date = date("Y-m-d");
											
						
				 if($validator->validate())
				 {
					
							$array	=	array(
									"document_id"=>$this->addFilter($values["docu"]),
									"status"=>$this->addFilter($values["status"]),
									"noofrooms"=>$this->addFilter($values["rooms"]),
									"square_feet"=>$this->addFilter($values["sqfeet"]),
									"updated_date"=>$date,
									"floor_type_id"=>$this->addFilter($values["floortype"]),
									"unit_name"=>$this->addFilter($name),
									"floor_id"=>$fid,
									"project_id"=>$pid);	
									$this->insert($array,"tbl_units");
							$result	=	true;
				
				}
				else
				{
					$this->errorMessage	=	$validator->getMessage();
				}
				return $result;
			}
			
			
			function updateUnitName($values,$fid,$uid)
			{
				$result	=	false;
				$validator	=	new Validator(array(													    
													$values["status"]=>"Title/EMPTY",
												//	$values["sqfeet"]=>"Title/EMPTY",
													$values["unit"]=>"Title/EMPTY"
													//$values["rooms"]=>"Title/EMPTY"
													));
				$util	=	new Utilities();
	          	$date = date("Y-m-d");
										
				 if($validator->validate())
				 {
					
							$array	=	array(
									"document_id"=>$this->addFilter($values["docu"]),
									"status"=>$this->addFilter($values["status"]),
									"noofrooms"=>$this->addFilter($values["rooms"]),
									"square_feet"=>$this->addFilter($values["sqfeet"]),
									"updated_date"=>$date,
									"floor_type_id"=>$this->addFilter($values["floortype"]),
									"unit_name"=>$this->addFilter($values["unit"]));	
									$this->update($array,"tbl_units","id='$uid'");
							$result	=	true;
				
				}
				else
				{
					$this->errorMessage	=	$validator->getMessage();
				}
				return $result;
			}
			
	   function fetchUnit($pid,$towerid,$fid,$start,$limit)
		{	
			$query="SELECT * FROM `tbl_units` where project_id=$pid and floor_id=$fid LIMIT $start,$limit";			
			$records	=	$this->fetchAll($query);
			$query="SELECT COUNT(`id`) FROM `tbl_units` where project_id=$pid and floor_id=$fid";		
			$total	=	$this->fetchAll($query);
			$this->totalRec=	$total[0]["COUNT(`id`)"];
			return $records;
		}
		
		 function getUnitsById($uid)
		{			
			$query="SELECT * FROM `tbl_units` where id=$uid";		
			$records	=	$this->fetchAll($query);			
			return $records;
		}
		
		
		 function fetchfloortype($fid)
		{			
			$query="SELECT floor_type_name FROM `tbl_floor_type` where id=$fid";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["floor_type_name"];
		}
		
		 function fetchDocumentById($id)
		{			
			$query="SELECT * FROM `tbl_documents` where id=$id";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
		 function deleteUnit($id)
			{
				$this->delete("tbl_units","id='$id'");		
			}
			
	   function fetchProjectsById($id)
		{			
			$query="SELECT p.*,d.district_name FROM `tbl_project` p join tbl_district d on p.district_id=d.id where p.id=$id";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
			
	   function fetchFloorTypesById($id)
		{			
			$query="SELECT * FROM `tbl_floor_type` where project_id=$id";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
				
	   function fetchImagesById($id)
		{			
			$query="SELECT * FROM `tbl_project_images` where project_id=$id";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
		function fetchEbrochure($id)
		{			
			$query="SELECT * FROM `tbl_ebrochure` where project_id=$id";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
		
	   function addEbrochure($values,$path)
		{
			$result	=	false;
			$validator	=	new Validator(array(			
									            $values["project"]=>"Title/EMPTY"));
					
			 if($validator->validate())
			 {
				
						$array	=	array(								
								"project_id"=>$this->addFilter($values["project"]),
								"ebrochure"=>$path);	
								$this->insert($array,"tbl_ebrochure");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}	
		
		function getAllEbrochure($start,$limit){
		
		$query="SELECT COUNT(d.id) FROM `tbl_ebrochure` d join tbl_project p on p.id=d.project_id";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(d.id)"];		
		$query="SELECT d.*,p.name FROM `tbl_ebrochure` d join tbl_project p on p.id=d.project_id LIMIT $start,$limit";
		$rec	=	$this->fetchAll($query);
		return $rec;
     	}
		
	function delEbrochure($lId)
	{
		$query="SELECT `ebrochure` FROM `tbl_ebrochure` WHERE `id`=$lId";
		$records	=	$this->fetchAll($query);
		$this->delete("tbl_ebrochure","id='$lId'");
		return $records[0]["ebrochure"];
	}
	
	  function fetchProjectId()
		{			
			$query="SELECT * FROM `tbl_project` order by id desc LIMIT 0,1";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}
		
	function addFlashImage($name,$pid)
	{
		$array	=	array("project_id"=>$pid,
					"flash_image"=>$name	
					);					
		$this->insert($array,"tbl_flash_images");
	}	
	
	function getAllFlashPhotos($start,$limit){
		$query="SELECT COUNT(i.id) FROM `tbl_flash_images` i INNER JOIN `tbl_project` p ON i.project_id=p.id order by i.id desc";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(i.id)"];
		unset($records);
		$query="SELECT i.*,p.name FROM `tbl_flash_images` i INNER JOIN `tbl_project` p ON i.project_id=p.id order by i.id desc LIMIT $start,$limit";
		$records	=	$this->fetchAll($query);
		return $records;
	}
	
	function delFlashPhoto($lId)
	{
		$query="SELECT `flash_image` FROM `tbl_flash_images` WHERE `id`=$lId";
		$records	=	$this->fetchAll($query);
		$this->delete("tbl_flash_images","id='$lId'");
		return $records[0]["flash_image"];
	}
	
	//jiby 
	function addFlash($name,$pid)
	{
		$this->delete("tbl_project_flash","pid='$pid'");
		$array	=	array("pid"=>$pid,
					"flash"=>$name	
					);					
		$this->insert($array,"tbl_project_flash");
	}	
	//jiby 
	function addFlashHome($name)
	{
		//$this->delete("tbl_flash_home","id='$pid'");
		$array	=	array("flash"=>$name);					
		$this->insert($array,"tbl_flash_home");
	}	
	
	
	//jiby
	
	function fetchProjectFlash($pid)
		{			
			$query="SELECT * FROM `tbl_project_flash` where pid=$pid";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["flash"];
		}
		
	//jiby
	
	function getHomeFlash()
		{			
			$query="SELECT * FROM `tbl_flash_home`";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["flash"];
		}
		
	  function getTowers($pid)
		{	
		   	$query="SELECT * FROM `tbl_tower` where project_id=$pid";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}	
		
	  function getTowerscount($pid)
		{	
		   	$query="SELECT count(id) FROM `tbl_tower` where project_id=$pid";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["count(id)"];
		}	
		
		
		function getFloors($tid)		
		{	
		    /*$query="SELECT count(id) FROM `tbl_floor` where tower_id=$tid";		
			$tot	=	$this->fetchAll($query);	
			$this->floorcnt	=	$tot[0]["COUNT(id)"];*/	
			$query="SELECT * FROM `tbl_floor` where tower_id=$tid order by id desc";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}	
		
		function getFloorsCount($tid)		
		{	
		    $query="SELECT count(id) FROM `tbl_floor` where tower_id=$tid";		
			$tot	=	$this->fetchAll($query);	
			return $tot;
		}	
		
		function getUnitsCount($fid)		
		{	
		    $query="SELECT count(id) FROM `tbl_units` where floor_id=$fid";		
			$tot	=	$this->fetchAll($query);	
			return $tot;
		}	
			
		
		function getUnitsForChart($fid)
		{			
			$query="SELECT * FROM `tbl_units` where floor_id=$fid";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}	
		
		function addzipFile($values,$path)
		{
			$result	=	false;
			$validator	=	new Validator(array(			
									            $values["project"]=>"Title/EMPTY"
												));
					
			 if($validator->validate())
			 {
				
						$array	=	array(								
								"project_id"=>$this->addFilter($values["project"]),
								"zip_file"=>$path);	
								$this->insert($array,"tbl_zipfile");
						$result	=	true;
			
			}
			else
			{
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;
		}
		
	   function getAllzipFiles($start,$limit){		
		$query="SELECT COUNT(d.id) FROM `tbl_zipfile` d join tbl_project p on p.id=d.project_id";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(d.id)"];		
		$query="SELECT d.*,p.name FROM `tbl_zipfile` d join tbl_project p on p.id=d.project_id LIMIT $start,$limit";
		$rec	=	$this->fetchAll($query);
		return $rec;
     	}
		
	function delzipFile($lId)
	{
		$query="SELECT `zip_file` FROM `tbl_zipfile` WHERE `id`=$lId";
		$records	=	$this->fetchAll($query);
		$this->delete("tbl_zipfile","id='$lId'");
		return $records[0]["zip_file"];
	}
	
	    function fetchNews($start,$limit)
		{		
		$query="SELECT COUNT(news_id) FROM `tbl_news`";
		$records	=	$this->fetchAll($query);
		$this->totalRecords	=	$records[0]["COUNT(news_id)"];		
		$query="SELECT * FROM `tbl_news` order by created_date desc,news_priority LIMIT $start,$limit";
		$rec	=	$this->fetchAll($query);
		return $rec;
     	}
		
		function getFloorTypeForChart($fid)
		{			
			$query="SELECT * FROM `tbl_floor_type` where id=$fid";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}	
	    function getDocumentForChart($did)
		{			
			$query="SELECT * FROM `tbl_documents` where id=$did";		
			$total	=	$this->fetchAll($query);			
			return $total;
		}	
		function getPricingLocation($did)
		{			
			$query="SELECT zip_file FROM `tbl_zipfile` where project_id=$did";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["zip_file"];
		}	
		
		function getUnitCountForcss($fid)
		{			
			$query="SELECT count(id) FROM `tbl_units` where floor_id=$fid";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["count(id)"];			
		}	
		
		function getAvaliabilityDate($pid)
		{			
		    $query="SELECT max(updated_date) FROM `tbl_units` where project_id=$pid";		
			$total	=	$this->fetchAll($query);			
			return $total[0]["max(updated_date)"];			
		}	
		
		function updatePriorityForPrj($priorty,$pid)
				{	
					$result	=	false;
					if(!empty($priorty) && !empty($pid)){
						echo $pid;
						$array=array("prj_priority"=>$priorty);
						$this->update($array,"tbl_project","id='$pid'");
						$result	=	true;
					}
					return $result;	
				}
		
	
}?>