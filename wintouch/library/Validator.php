<?php
	
	
	/*
	  * Class Validator()
	  * general Purpose validation Script for PHP Validation on Elements
	  * Use the validator constructor for setting values which needs the validation
	  * Invoke validate method for vaidation test
	*/
	
	class Validator
	{
		private $validateFields;
		public  $errorMessage;
		
		/*
		 * Constructor
		 * Param $args - Validation elements and rules
		*/
		
		function __construct($args)
		{
			$this->validateFields	=	$args;
		}
		
		/*
		 * Validationn for Email 
		 * Param $string - String
		*/
		
		function validateEmail($string)
		{
			$pattern	=	"/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
			if(preg_match($pattern,$string)){
				return true;
			}else{
				return false;
			}
		}
		
		/*
		 * Validation for URL
		 * Param $string - String 
		*/
		
		function validateUrl($string)
		{
			$pattern	=	"/(http|https):\/\/([a-zA-Z0-9_.-]*).([a-zA-z0-9]{2,})/";
			if(preg_match($pattern,$string)){
				return true;
			}else{
				return false;
			}
		}
		
		/*
		 * Validate For Null
		 * Param String 
		*/
		
		function validateNull($string)
		{
			if(is_null($string)){
				return true;
			}else{
				return false;
			}
		}
		/*
		  * Validate for numeric 
		*/
		function validateNumeric($string)
		{
			if(is_numeric($string)){
				return true;
			}else{
				return false;
			}
		}
		
		/*
		 * Validte for Empty
		 * Param $string - String
		*/
		
		function validateEmpty($string)
		{
			$string	=	trim($string);
			if($string =="" || is_null($string)){
				return true;
			}else{
				return false;
			}
		}
		/*
		  * Validate for special chars 
		*/
		function validateSpecial($string)
		{
			$specials=	array("!","@","#","$","^","&","*","(",")","_","-","=","+","'","\"",",",";");
			$string	=	trim($string);
			$count	=	0;
			for($i=0;$i<strlen($string);$i++){
				if(in_array($string[$i],$specials)){
					$count++;
				}
			}
			
			if($count>0){
				return true;
			}else{
				return false;
			}
		}
		
		/*
		 * Set Error Message
		 * Param $string - String Mesage
		*/
		
		function setError($string)
		{
			$this->errorMessage	=	$string;
		}
		
		/*
		 * Get Error Message
		*/
		
		function getMessage()
		{
			return $this->errorMessage;
		}
		
		/*
		 * Validate Fields
		 * Validation based on field values and Rules applied 
		*/
		function validate()
		{
			if(count($this->validateFields)==0 || !is_array($this->validateFields)){
				return false;
			}else{
				$error	=	0;
				$fieldPos=1;
				//First Validate For Empty on all fields //
				foreach($this->validateFields as $key=>$val){
					
					$checkedError	=	0;
					$parts	=	explode("/",$val);
					$label	=	$parts[0];
					$valids	=	explode("|",$parts[1]);	
					if(in_array("EMPTY",$valids) && $checkedError==0){
						if($this->validateEmpty($key)){
							$error++;
							$this->setError("Enter Mandatory Fields ");
							$checkedError	=	1;
							break;
						}
					}
					$fieldPos++;
					
				}
				if($error==0){
					$fieldPos=1;
					foreach($this->validateFields as $key=>$val){
					
						$checkedError	=	0;
						$parts	=	explode("/",$val);
						$label	=	$parts[0];
						$valids	=	explode("|",$parts[1]);						
						if(in_array("EMAIL",$valids)){
							if(!$this->validateEmail($key) && $checkedError==0 && $error==0){
								$error++;
								$this->setError("Invalid email id in field -".$label."-");
								$checkedError=1;
								break;
							}
						}						
						if(in_array("NUMBER",$valids)){
							if(!$this->validateNumeric($key) && $checkedError==0 && $error==0){
								$error++;
								$this->setError("Enter Numeric in field -".$label."-");
								$checkedError=1;
								break;
							}
						}
						if(in_array("FILTER",$valids)){
							if($this->validateSpecial($key) && $checkedError==0 && $error==0){
								$error++;
								$this->setError("Special chars not allowed in field -".$label."-");
								$checkedError=1;
								break;
							}
						}
						
						if(in_array("URL",$valids)){
							if(!$this->validateUrl($key) && $checkedError==0 && $error==0){
								$error++;
								$this->setError("Invalid website address in field -".$label."-");
								$checkedError=1;
								break;
							}
						}
						$fieldPos++;
					}
				}
				
			}				
			
			if($error==0){
			return true;
			}else{
				return false;
			}
		}
		
		
	}


/*
		//Sample Vlaidtion Script //
		$array	=	array(
							"firstName"=>"LABEL1/EMPTY",
							"lastName"=>"LABEL2/EMPTY",
							"emailId@demo.com"=>"LABEL3/EMAIL|EMPTY",
							"http://testdpmain.com"=>"LABEL4/URL",
							"https://myaddress.com"=>"LABEL5/URL|EMPTY",
						);
		$obj	=	new Validator($array);
		if($obj	->	validate()){
			echo "Validation Success";
		}else{
			echo $obj->getMessage();
		}
	
*/

	

?>
