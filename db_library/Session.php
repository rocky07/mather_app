<?php
	/*
	 * Session Handler //
	*/
	class Session{
	
		function __construct(){
			

		}
		/*
		 * Set Session Save Path 
		*/
		public function setSessionPath(){
			$sessionPath	=	ROOTPATH."/core/";
			session_save_path($sessionPath);
		}
		
		/*
		 * Get Session Save Path
		*/
		public function getSessionPath(){			
			return session_save_path();
		}
		
		/*
		 * Set Session value
		*/
		public function setSession($session,$value){
		
			if(isset($_SESSION[$session]) || ($_SESSION[$session])){
				$_SESSION[$session]	=	base64_encode($value);
			}else{
				$_SESSION[$session]	=	base64_encode($value);
			}
		}
		
		/* 
		 * Get Session Value
		*/
		public function getSession($session){
		
			if(isset($_SESSION[$session])){
				 return base64_decode($_SESSION[$session]);
			}else{
				return null;
			}
		}
		
		/* 
		 * Clear a particular session 
		*/
		public function clearSession($session){
			unset($_SESSION[$session]);
			session_unregister($_SESSION[$session]);
		}
		
		/*
		 * Clear / destroy all session 
		*/		
		public function clearAll(){
			session_destroy();
		}
		
		/*
		 * Create Session
		*/
		
		function createSession($session){
			if(!session_is_registered($session)){
				session_register($session);
			}
		}
		
	}




?>