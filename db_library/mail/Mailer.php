<?php



	class Mail_Mailer
	{
		private $fromAddress;
		private $fromName;
		private $toAddress;
		private $toName;
		private $mailUrl;
		private $mailDomain;
		private $mailAddress;
		private $message;
		private $subject;
		private $mode;
		
		
		function __construct()
		{
			$this->fromAddress	=	"";
			$this->fromName		=	"";
			$this->toAddress	=	"";
			$this->toName		=	"";			
			$this->message		=	"";
			$this->subject		=	"";
			$this->mode			=	"";
		}
		
		
		
		/*
		 * Set From Details
		*/
		
		function setFrom($address,$name)
		{
			$this->fromAddress	=	$address;
			$this->fromName		=	$name;
		}
		
		/*
		 * Set To Details
		*/
		
		function setTo($address)
		{
			$this->toAddress	=	$address;			
		}
		
		/*
		 * Set Message Content
		*/
		
		function setMessage($message)
		{
			$this->message	=	$message;
		}
		
		
		/*
		 * Set Subject
		*/
		
		function setSubject($subject)
		{
			$this->subject	=	$subject;
		}
		
		/*
		 * Get The Mail Header
		*/
		function getHeader()
		{			
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
			$headers.= 'To: '.$this->toAddress.'' . "\r\n";
			$headers.= 'From: '.$this->fromName.' <'.$this->fromAddress.'>' . "\r\n";		
			return $headers;
			
		}
		
		function send()
		{
			if(mail($this->toAddress,$this->subject,$this->message,$this->getHeader())){
				return true;
			}else{
				return false;
			}
			
		}
	}




?>