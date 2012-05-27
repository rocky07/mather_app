<?php
require("db_library/phpmailer/class.phpmailer.php"); 
	
			$name=isset($_REQUEST['name'])?$_REQUEST['name']:"";
			$phone=isset($_REQUEST['phone'])?$_REQUEST['phone']:"";
			$email=isset($_REQUEST['email'])?$_REQUEST['email']:"";
			$comment=isset($_REQUEST['comment'])?$_REQUEST['comment']:"";

			$content	=	"Name:$name <br> Email: $email<br>Phone: $subject<br>Message: $comments";			
			$mail = new PHPMailer();  
			$mail->IsSMTP();  // telling the class to use SMTP
			$mail->Mailer = "smtp";
			$mail->Host = "ssl://smtp.gmail.com";
			$mail->Port = 465;
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "info@aluva.org"; // SMTP username
			$mail->Password = "@aluva123";
			$mail->From     = "info@aluva.org";
			$mail->FromName = "Qkochi";		   
			$mail->IsHTML(true);
			$mail->AddAddress("rakeshr.21@gmail.com");  
			$mail->AddReplyTo($email,$name);  
			$mail->Subject  = "Contact Us";
			$mail->Body     = $content;
			$mail->WordWrap = 350;  
			if(!$mail->Send()){
				$msg	=	"{send:true,msg:'Mail send Successfully'}";
				}else {
					$msg	=	"{send:false,msg:'Send failed, try again'}";
					}			 				
				$msg	=	"{send: false,msg:'Send failed, try again'}";
			 echo $msg;
?>

