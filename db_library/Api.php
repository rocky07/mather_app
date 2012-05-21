<?php 
//bussiness api
class Api extends Database_MySql
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

		
   function getApi($businessId,$start,$limit)
	{
		$qry	=	"select questions.id as question_id,user_q.photo as question_pic,questions.question,reply.id as reply_id,reply.answers,user.user_name,user.photo as reply_pic from business inner join business_questions on business.business_id=business_questions.business_id inner join questions on business_questions.ques_id = questions.id inner join reply on questions.id = reply.question_id inner join user on user.user_id=reply.user_id inner join user user_q on user_q.user_id=questions.user_id where business.business_id=? order by reply.id desc";
		$qry.=" LIMIT ?,?";
		$bound_param	=	array("iii",$businessId,$start,$limit);
		$records	=	$this->fetchAll($qry,$bound_param);		
		return $records;
	}
			
}?>
