<?php
class Database_MySql
{

	private $dbUser;
	private $dbPass;
	private $dbName;
	private $dbHost;
    public $errorMessage; 
    #establish db connection
    public function __construct()
    {
       
    }
	
	/*
	 * Setting Error Message on Db Operation
	 * Input String Message
	 * Called upon db operation
	*/
	
	public function setError($string)
	{
		echo $this->errorString	=	$string;
		//"MYSQL ERROR - ".$this->errorString;
	}
	/*
	 * get Error Message after a db operation
	 * Retrieves the current error Status
	*/
	
	public	function getError()
	{
		return $this->errorString;
	}
   
    #store mysqli object
    public function connect()
    {
	
		
		if(is_null($this->connection)){
			$config	=	new ConfigLoader(ROOTPATH."/configs/db.ini");
			$db		=	$config->getConfig("server");			
			 $this->dbUser		=	$db["dbUser"];
			 $this->dbPass		=	$db["dbPass"];
			 $this->dbName		=	$db["dbName"];
			 $this->dbHost		=	$db["dbHost"];
		
			try{
			
				$this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
				if(mysqli_connect_errno())
				{
					throw new Exception("Database connect Error :". mysqli_connect_error($mysqli));
					
				}   
				return $this->connection;
			}
			catch(Exception $e)
			{
				$this->setError($e->getMessage());
			}
		}
		
	
    }
	
		/*
		 * Close the Mysql Connection		 
		*/
		
		function close()
		{
			if($this->connection){
				$this->connection->close();
			}
		}	

    #run a prepared query
    public function runPreparedQuery($query, $params_r)
    {
		
		
        if(!$stmt = $this->connection->prepare($query)){
			throw new Exception("Sorry error try later "
                      . mysqli_error($this->connection));
		
		}
		if(!empty($params_r))
			$this->bindParameters($stmt, $params_r);
        if ($stmt->execute()) {
			
            return $stmt;
        } else {
            throw new Exception("Sorry error try later : "
                      . mysqli_error($this->connection));
            return 0;
        }
       
    }

 # To run a select statement with bound parameters and bound results.
 # Returns an associative array two dimensional array which u can easily 
 # manipulate with array functions.
 #param1:	string Query to prepare statemnet
 #Param2:	array  parameters to bind
 
    public function fetchAll($query, $bind_params_r="")
    {
		try{
			$select = $this->runPreparedQuery($query, $bind_params_r);
				$fields_r = $this->fetchFields($select);
			   
				foreach ($fields_r as $field) {
					$bind_result_r[] = &${$field};
				}
			   
				$this->bindResult($select, $bind_result_r);
			   
				$result_r = array();
				$i = 0;
				while ($select->fetch()) {
					foreach ($fields_r as $field) {
						 $result_r[$i][$field] = stripcslashes($$field);
					}
					$i++;
				}
				$select->close();
				return $result_r;   
			
		}
		catch(Exception $e)
		{
			$this->setError($e->getMessage());
		 	
		}
		
		
    }
   
    #takes in array of bind parameters and binds them to result of
    #executed prepared stmt
   
    private function bindParameters(&$obj, &$bind_params_r)
    {
        if(call_user_func_array(array($obj, "bind_param"), $bind_params_r)){
			return true;
		}
    }
   
    private function bindResult(&$obj, &$bind_result_r)
    {
        call_user_func_array(array($obj, "bind_result"), $bind_result_r);
    }
   
    #returns a list of the selected field names
   
    private function fetchFields($selectStmt)
    {
        $metadata = $selectStmt->result_metadata();
        $fields_r = array();
        while ($field = $metadata->fetch_field()) {
            $fields_r[] = $field->name;
        }

        return $fields_r;
    }
	
		/*
		 * Mysql Insert operations
		 * Paramms $fild->value pair , table name,field types
		*/
		
		function insert($options,$table,$ty)
		{
	
	    	$result			=	false;
			$bound_param	=	array();
			$bound_param[0]	=	$ty;
			$queryString	=	"";
			$p				=	count($options);
			$start			=	0;
			foreach($options as $key=>$val){
				$fieldString.=" {$key}";
				$valueString.=" ? ";
				if($start<$p-1){
					$fieldString.=",";
					$valueString.=",";
				}
				$bound_param[$start+1]	=	$val;
				$start++;
			}	
		  $queryString	=	"INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString}) ";	   
		   
			try{
				if(!$stmt	=	$this->connection->prepare($queryString)){
					throw new Exception("Sorry error try later : "
                      . mysqli_error($this->connection));
				}
				if(!$this->bindParameters($stmt, $bound_param)){
					throw new Exception("Sorry error try later ");
				
				}
				$stmt->execute();
				if($stmt->affected_rows){
					$result	=	true;					
				}
			}
			catch(Exception $e)
			{
			 $this->setError($e->getMessage());
			}
			return $result;
   			

		}
		
		/*
		 * Mysql Update operations
		 * Paramms $fild->value pair 
				   table name,
				   Field types of all parameters including the condition
				   condition,
				   Condition Parameters
		*/
		
		function update($options,$table,$condition,$param,$ty)
		{
			$result			=	false;
			$bound_param	=	array();
			$bound_param[0]	=	$ty;
			$queryString	=	"";
			$fieldString	=	"";
			$p				=	count($options);
			$start			=	0;
			foreach($options as $key=>$val){
				$fieldString.=" `{$key}`= ? ";
				if($start<$p-1){
					$fieldString.=",";
				}
				$bound_param[$start+1]	=	$val;
				$start++;
			}	
			for($i=0;$i<count($param);$i++){
				++$start;
				$bound_param[$start]	=	$param[$i];
			}
			$queryString	=	"UPDATE `{$table}` SET {$fieldString} ";
			if(!empty($condition)){
				$queryString.=" WHERE {$condition} ";
			}
		    $queryString;			
			try{
				if(!$stmt	=	$this->connection->prepare($queryString)){
					throw new Exception("Sorry error try later "
                      . mysqli_error($this->connection));
				}
				if(!$this->bindParameters($stmt, $bound_param)){
					throw new Exception("Sorry error try later ");
				
				}
				$stmt->execute();
				if($stmt->affected_rows){
					$result	=	true;
				}
			}
			catch(Exception $e)
			{
				$this->setError($e->getMessage());
			}
			return $result;
		}
		
		
			/*
		 * Mysql Delete Operation
		 * Params - table name 
		 			condition(string) eg:id=?or value>?
					condition parameter(array) eg:array("ss","jijo","john")
		*/
		
		function delete($table,$condition,$bound_param)
		{
				
			$queryString	=	"DELETE FROM `{$table}` ";
			if(!empty($condition)){
				$queryString.=" WHERE {$condition} ";
			}
			try{
				if(!$stmt	=	$this->connection->prepare($queryString)){
					throw new Exception("Sorry error try later  "
                      . mysqli_error($this->connection));
				}
				if(!$this->bindParameters($stmt, $bound_param)){
					throw new Exception("Sorry error try later ");
				
				}
				$stmt->execute();
				if($stmt->affected_rows){
					$result	=	true;
				}
			}
			catch(Exception $e)
			{
				$this->setError($e->getMessage());
			}


		}


		function lastInsertId()
		{
			return $this->connection->insert_id;
		
		}
		
		function execute($queryString,$bound_param="")
		{
			try{
				if(!$stmt	=	$this->connection->prepare($queryString)){
					throw new Exception("Sorry error try later  "
                      . mysqli_error($this->connection));
				}
				if(!$this->bindParameters($stmt, $bound_param)){
					throw new Exception("Sorry error try later ");
				}
				$stmt->execute();
				if($stmt->affected_rows){
					$result	=	true;
				}
			}
			catch(Exception $e)
			{
				$this->setError($e->getMessage());
			}
		}

		
		
}?>