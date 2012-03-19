<?php

	class Database_MySql
	{
		private $dbUser;
		private $dbPass;
		private $dbName;
		private $dbHost;
		private $dbConnection;
		private $errorString;
		private $filter;		
		private $util;
		public static $instance;
		
		function __construct(){
		
			$this->dbConnection	=	null;
			$this->filter		=	true;			
		}
		
		function noFilter()
		{
			$this->filter	=	false;
		}
		/*
		 * Setting Error Message on Db Operation
		 * Input String Message
		 * Called upon db operation
		*/
		
		function setError($string)
		{
			$this->errorString	=	$string;
			echo "MYSQL ERROR - ".$this->errorString;
		}
		
		/*
		 * get Error Message after a db operation
		 * Retrieves the current error Status
		*/
		
		function getError()
		{
			return $this->errorString;
		}
		
		/*
		 * Connect to Mysql Database using set up data
		 * Set up data being hold on Constructor
		 * Modify the constrct params for connection change
		*/
		
		function connect()
		{
			
			if(is_null($this->dbConnection)){
				$config	=	new ConfigLoader(ROOTPATH."/configs/db.ini");
				$db		=	$config->getConfig("server");			
				 $this->dbUser		=	$db["dbUser"];
				 $this->dbPass		=	$db["dbPass"];
				 $this->dbName		=	$db["dbName"];
				 $this->dbHost		=	$db["dbHost"];
				try{
					$this->dbConnection	=	mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
					if($this->dbConnection){
						if(mysql_select_db($this->dbName,$this->dbConnection)){
						}else{
							$this->setError(mysql_error());
						}
					}else{
						$this->setError(mysql_error());
					}
				}catch(Exception $c){
					$this->setError($c);
				}
			}
		}
		
		function getInstance(){
			
		}
		
		/*
		 * Close the Mysql Connection		 
		*/
		
		function close()
		{
			if($this->dbConnection){
				mysql_close($this->dbConnection);
				$this->dbConnection	=	null;
			}else{
				$this->dbConnection	=	null;
			}
		}	
		
		/*
		 * get ALl results for an SQL Select Statement
		 * Retrieves the result set values in 2 dimensional array
		 * Parms : query String
		 * Returns Array
		*/
		
		function fetchAll($query)
		{
			$fileds		=	array();
			$resultSet	=	array();
			try{
				$result			=	mysql_query($query);
				if($result){
					  $fieldsLength	=	mysql_num_fields($result);
					for($i=0;$i<$fieldsLength;$i++ ){
						$fileds[$i]	=	mysql_field_name($result,$i);
					}
					if(mysql_num_rows($result)>0){
						$start	=	0;
						while($row=mysql_fetch_row($result)){						
							for($i=0;$i<$fieldsLength;$i++ ){											
								if($this->filter){
									$resultSet[$start][$fileds[$i]]	=	$this->removeFilter($row[$i]);					
								}else{
									$resultSet[$start][$fileds[$i]]	=	$row[$i];					
								}
								
							}
							$start++;
						}
					}
				}
			}catch(Exception $c){
				$this->setError($c);
			}
			return $resultSet;
		}
		
		/*
		 * Mysql Insert operations
		 * Paramms $fild->value pair , table name
		*/
		
		function insert($options,$table)
		{
			$queryString	=	"";
			$p				=	count($options);
			$start			=	0;
			foreach($options as $key=>$val){
				$fieldString.=" `{$key}`";
				$valueString.=" '{$val}' ";
				if($start<$p-1){
					$fieldString.=",";
					$valueString.=",";
				}
				$start++;
			}			
			$queryString	=	"INSERT INTO `{$table}` ({$fieldString}) VALUES ({$valueString}) ";
			//echo $queryString;
			try{
				$result	=	mysql_query($queryString) or $this->setError("Insert".mysql_error());
			}catch(Exception $c){
				$this->setError($c);
			}
		}
		
		
		function insertMulti($fields,$values,$table)
		{
			$queryString	=	"";
			$p				=	count($fields);
			$start			=	0;
			foreach($fields as $key=>$val){
				$fieldString.=" `{$val}`";				
				if($start<$p-1){
					$fieldString.=",";					
				}
				$start++;
			}
			
			
			
			for($i=0;$i<count($values);$i++){
				$p	=	count($values[$i]);
				$start			=	0;
				$valueString.="(";
				foreach($values[$i] as $key=>$val){
					$valueString.="'{$val}'";				
					if($start<$p-1){
						$valueString.=",";					
					}
					$start++;
				}
				$valueString.=")";
				if($i<count($values)-1){
					$valueString.=",";
				}
			}
			
			$queryString	=	"INSERT INTO `{$table}` ({$fieldString}) VALUES {$valueString} ";
			//echo $queryString;
			try{
				$result	=	mysql_query($queryString) or $this->setError("Insert Multi".mysql_error());
			}catch(Exception $c){
				$this->setError($c);
			}
		}
		
		
		/*
		 * Mysql Update
		 * Params - field->value pair,table name,update condition
		*/
		
		function update($options,$table,$condition)
		{
			$queryString	=	"";
			$fieldString	=	"";			
			$p				=	count($options);
			$start			=	0;
			foreach($options as $key=>$val){
				$fieldString.=" `{$key}`='{$val}'";
				if($start<$p-1){
					$fieldString.=",";
				}
				$start++;
			}			
			$queryString	=	"UPDATE `{$table}` SET {$fieldString} ";
			if(!empty($condition)){
				$queryString.=" WHERE {$condition} ";
			}
			 $queryString;
			try{
				$result	=	mysql_query($queryString) or $this->setError(mysql_error());
			}catch(Exception $c){
				$this->setError($c);
			}
		}
		
		/*
		 * Mysql Delete Operation
		 * Params - table name , condition
		*/
		
		function delete($table,$condition)
		{
			$queryString	=	"DELETE FROM `{$table}` ";
			if(!empty($condition)){
				$queryString.=" WHERE {$condition} ";
			}
			try{
				$result	=	mysql_query($queryString) or $this->setError(mysql_error());
			}catch(Exception $c){
				$this->setError($c);
			}
		}
		
		function execute($query){
			$result	=	mysql_query($query) or $this->setError(mysql_error());
		}
		/*
		 * Returns last insert ID		 
		*/
		
		function lastInsertId()
		{
			return mysql_insert_id();
		}
		
		function affectedRows(){
			return mysql_affected_rows($this->dbConnection);
		}
		
		/*
		 * Filter with Slash on special chars
		*/
		
		function addFilter($string){
			if(get_magic_quotes_gpc()==true){
				return htmlentities($string);
			}else{
				 $string	=	addslashes($string);
				 return htmlentities($string);
			}
		}
		
		/*
		 * Remove added special chars on STring 
		*/
		
		function removeFilter($string){
			if(get_magic_quotes_gpc()==true){
				return $string;
			}else{
				return stripslashes($string);
			}
		}	
		
		
		function fetchAllJoin($query)
		{
			$fileds		=	array();
			$resultSet	=	array();
			try{
				$result			=	mysql_query($query);
				if($result){
					  $fieldsLength	=	mysql_num_fields($result);
					for($i=0;$i<$fieldsLength;$i++ ){
						$fileds[$i]	=	mysql_field_name($result,$i);
					}
					if(mysql_num_rows($result)>0){
						$start	=	0;
						while($row=mysql_fetch_row($result)){						
							for($i=0;$i<$fieldsLength;$i++ ){											
								if($this->filter){
									$resultSet[$start][$i]	=	$this->removeFilter($row[$i]);					
								}else{
									$resultSet[$start][$i]	=	$row[$i];					
								}
								
							}
							$start++;
						}
					}
				}
			}catch(Exception $c){
				$this->setError($c);
			}
			return $resultSet;
		}
		
		
}?>