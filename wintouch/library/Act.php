<?php


	class Act extends Database_MySql
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
		
		
		function getActivity($id){
			$this->connect();
			$records	=	$this->fetchAll("SELECT `act_name` FROM `activity`  WHERE `act_id`='$id'");
			$this->close();
			return $records[0]["act_name"];
		}
		
		function getCaption($id){
			$this->connect();
			$records	=	$this->fetchAll("SELECT `act_caption` FROM `activity`  WHERE `act_id`='$id'");
			$this->close();
			return $records[0]["act_caption"];
		}
		
		/*function getActivity1($id){
			$this->connect();
			$records	=	$this->fetchAll("SELECT `act_name` FROM `activity`  WHERE `act_id`='$id'");
			$this->close();
			return $records[0]["act_name"];
		}*/
		
		function getCategory($id){
			$this->connect();
			 $query	=	"SELECT * FROM `category`  WHERE `act_id`='$id'";
			$records	=	$this->fetchAll($query);
			$this->close();
			return $records;
		}
		
		
		function insertActivity($values,$id)
		{
		
			print_r($values);
			$result=false;
			$validator=	new Validator(array($id=>"Activity/EMPTY",
											$values["txtCat"]=>"Activity/EMPTY",
											$values["txtFirstName"]=>"Activity/EMPTY",
											$values["txtLastName"]=>"Activity/EMPTY",
											$values["txtdob"]=>"Activity/EMPTY",
											$values["txtAddress"]=>"Activity/EMPTY",
											$values["txtState"]=>"Activity/EMPTY",
											$values["Country"]=>"Activity/EMPTY",
											$values["txtpincode"]=>"Activity/EMPTY",
											$values["txttel"]=>"Telephone/EMPTY||NUMBER",
											$values["txtemail"]=>"Email/EMPTY||EMAIL",
											$values["txtComments"]=>"Activity/EMPTY",
											$values["txtCity"]=>"category/EMPTY"));
			$this->connect();
			if($validator->validate()){
				$array=array("act_id"=>$id,
								"cat_id"=>$values["txtCat"],
								"firstname"=>$values["txtFirstName"],
								"lastname"=>$values["txtLastName"],
								"dob"=>$values["txtdob"],
								"age"=>$values["acttxt"],
								"address"=>$values["txtAddress"],
								"city"=>$values["txtCity"],
								"state"=>$values["txtState"],
								"country"=>$values["Country"],
								"pincode"=>$values["txtpincode"],
								"telephone"=>$values["txttel"],
								"email"=>$values["txtemail"],
								"date_added"=>date("Y-m-d"),
								"comments"=>$values["txtComments"]);
				$this->insert($array,"form");
				$this->close();
				$result=true;
			}
			else {
				 $this->errorMessage	=	$validator->getMessage();
			}
			return $result;		
		}	
		
		function getActivityAll(){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `activity`");
			$this->close();
			return $records;
		}
		
		
		function searchDetails($acti,$selcat,$start,$limit){
			$que	="";
			if(trim($selcat)!=""){
				$que	=	" and `cat_id`='$selcat'";
			}
			$this->connect();
			$query	=	"SELECT `form_id`,`firstname`,`telephone`,`lastname`,`email` FROM `form`  WHERE `act_id`='$acti'";
			$query	=	$query.$que." LIMIT $start,$limit";
			$records	=	$this->fetchAll($query);
			
			$query	=	"SELECT count(form_id) FROM `form`  WHERE `act_id`='$acti'";
			 $query	=	$query.$que;
			$total	=	$this->fetchAll($query);
			 $this->totalRecords	=	$total[0]["count(form_id)"];
			
			$this->close();
			return $records;
		}
	
		function getDetails($id){
			$this->connect();
			 $query	=	"SELECT * FROM `form`  WHERE `form_id`='$id'";
			$records	=	$this->fetchAll($query);
			$this->close();
			return $records;
		}
		
		function insertconnect($values)
		{
		
			//print_r($values);
			$result=false;
			$validator=	new Validator(array($values["txtFirstName"]=>"Activity/EMPTY",
											$values["txtLastName"]=>"Activity/EMPTY",
											$values["txtAddress"]=>"Activity/EMPTY",
											$values["Country"]=>"Activity/EMPTY",
											$values["txttel"]=>"Telephone/EMPTY||NUMBER",
											$values["txtemail"]=>"Email/EMPTY||EMAIL",
											$values["txtComments"]=>"Activity/EMPTY",
											$values["txtCat"]=>"Activity/EMPTY"
											));
			$this->connect();
			if($validator->validate()){
				$array=array(
								"first_name"=>$values["txtFirstName"],
								"last_name"=>$values["txtLastName"],
								"friendscategory_id"=>$values["txtCat"],

								"address"=>$values["txtAddress"],
								
								"country"=>$values["Country"],
								
								"telephone"=>$values["txttel"],
								"email"=>$values["txtemail"],
								
								"comments"=>$values["txtComments"]);
				$this->insert($array,"connectwith");
				$this->close();
				$result=true;
			}
			else {
				 $this->errorMessage	=	$validator->getMessage();
			}
			return $result;		
		}	
		
		
		function getfriendsategory(){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `friendscategory`");
			$this->close();
			return $records;
		}
		
		function listFriends($start,$limit,$cat){
			$this->connect();
			if(!empty($cat)){
				$qq	=	"where `friendscategory_id`='$cat'";
			}
			 $qr	=	"SELECT * FROM `connectwith` ";
			
			$qr.=$qq."LIMIT $start,$limit";
			$records	=	$this->fetchAll($qr);
			$qm	="SELECT count(connect_id) FROM `connectwith` `friendscategory_id`=$cat'";
			$qm.=$qq;
			$total	=	$this->fetchAll($qm);
			$this->totalRecords	=	$total[0]["count(connect_id)"];
			$this->close();
			return $records;
		}
		
		
		function getFriendDetails($id){
			$this->connect();
			 $query	=	"SELECT * FROM `connectwith`  WHERE `connect_id`='$id'";
			$records	=	$this->fetchAll($query);
			$this->close();
			return $records;
		}
		
		function createphotoalbum($values)
		{
		 "hai";
			$result=false;
			$validator=	new Validator(array($values["txtcatname"]=>"category/EMPTY"));
			$this->connect();
			if($validator->validate()){
				$array=array("category"=>$values["txtcatname"]);
				$this->insert($array,"album_category");
				$this->close();
				$result=true;
			}
			else {
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;		
		}	
		
		
		function createvideoalbum($values)
		{
			$result=false;
			$validator=	new Validator(array($values["txtcatname"]=>"category/EMPTY"));
			$this->connect();
			if($validator->validate()){
				$array=array("cat_id"=>$values["txtcatname"]);
				$this->insert($array,"videos_category");
				$this->close();
				$result=true;
			}
			else {
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;		
		}	
		
		
		function listphotoalbums($start,$limit){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `album_category` order by `priority` LIMIT $start,$limit");		
			$total	=	$this->fetchAll("SELECT count(id) FROM `album_category`");
			$this->totalRecords	=	$total[0]["count(id)"];
			$this->close();
			return $records;
		}
		
		function deletephotoalbum($lId)
	{
	
		$this->connect();
		$this->delete("album_category","id='$lId'");
		//$this->delete("form","cat_id='$lId'");
		$this->close();
	}
		
		
		function listimages($options,$id){
			$records	=	array();
			$start		=	$options["start"];
			$limit			=	$options["limit"];
			$this->connect();
			$query="SELECT count(imageid) FROM `album` where `cat_id`='$id'";
			$records	=	$this->fetchAll($query);
			$this->totalRecords	=	$records[0]["count(imageid)"];
			unset($records);
			$query="SELECT * FROM `album`  where `cat_id`='$id' LIMIT $start,$limit";
			$records	=	$this->fetchAll($query);
			$this->close();
			return $records;
		}


function listvideoalbums($start,$limit){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `videos` order by `priority` LIMIT $start,$limit ");
			$total	=	$this->fetchAll("SELECT count(video_id) FROM `videos`");
			//	print_r($total);
			$this->totalRecords	=	$total[0]["count(video_id)"];
			$this->close();
			return $records;
		}		
		
		
	function deletevideoalbum($lId)
	{
	
		$this->connect();
		$this->delete("videos_category","id='$lId'");
		//$this->delete("form","cat_id='$lId'");
		$this->close();
	}
	
	
		function getCoverPhoto($id){
			$this->connect();
			 $query	=	"SELECT `filename` FROM `album`  WHERE `cat_id`='$id' limit 0,1";
			$records	=	$this->fetchAll($query);
			$this->close();
			return $records;
		}
	
		function createNews($values)
		{
		
			$result=false;
			$validator=	new Validator(array($values["txtNews"]=>"category/EMPTY",
									$values["txtData"]=>"category/EMPTY"));
			$this->connect();
			if($validator->validate()){
				$array=array("title"=> $this->utilObject->addFilter($values["txtNews"]));
				$this->insert($array,"news");
				$this->close();
				$result=true;
			}
			else {
				$this->errorMessage	=	$validator->getMessage();
			}
			return $result;		
		}	
		
		function listNews($start,$limit){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `news` LIMIT $start,$limit");
		
		
			$total	=	$this->fetchAll("SELECT count(id) FROM `news`");
			$this->totalRecords	=	$total[0]["count(id)"];
			$this->close();
			return $records;
		}
		
		function listFriendsCat($start,$limit){
			$this->connect();
			$records	=	$this->fetchAll("SELECT * FROM `friendscategory` LIMIT $start,$limit");
		
		
			$total	=	$this->fetchAll("SELECT count(friendscategory_id) FROM `friendscategory`");
			$this->totalRecords	=	$total[0]["count(friendscategory_id)"];
			$this->close();
			return $records;
		}
		
	function deleteFrCat($lId)
	{
	
		$this->connect();
		$this->delete("friendscategory","friendscategory_id='$lId'");
		//$this->delete("form","cat_id='$lId'");
		$this->close();
	}
	
	function deleteFriends($lId)
	{
	
		$this->connect();
		$this->delete("connectwith","connect_id='$lId'");
		//$this->delete("form","cat_id='$lId'");
		$this->close();
	}
	
	function listphotoalbums1(){
		$this->connect();
		$records	=	$this->fetchAll("SELECT * FROM `album_category`");		
		$total	=	$this->fetchAll("SELECT count(id) FROM `album_category`");
		$this->totalRecords	=	$total[0]["count(id)"];
		$this->close();
		return $records;
	}
		
	/*
	 * to update priority based on aid
	 * author: Deepthi
	 */
	function updatePriorityForAlbums($priorty,$aid)
	{	
		$result	=	false;
		if(!empty($priorty) && !empty($aid)){
			$this->connect();
			$array=array("priority"=>$priorty);
			$this->update($array,"album_category","id='$aid'");
			$this->close();
			$result	=	true;
		}
		return $result;	
	}
}?>