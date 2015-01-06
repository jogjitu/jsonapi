<?php
require_once('config.php');
require_once('MysqliDb.php');
error_reporting(E_ALL);

 
	class Profile{
	
		public $ID;
		public $Name;
		public $PhoneNumber;
		public $CreatedDate;
		public $ModifiedDate;
		
		function __construct() 
		{
				
		}
		
		
		public static function withID($ID) {
			$instance = new self();
			$instance->LoadByID($ID);
			return $instance;
		}


	/*Get Client By ID*/
		function LoadByID($ID)
		{
			$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
			$db->where ('ID', $ID);
			$res = $db->get ("Profile", 1);
			if ($db->count > 0){
				foreach ($res as $rec) { 
					
					$this->ID = $rec['ID'];
					$this->Name = $rec['Name'];
					$this->PhoneNumber = $rec['PhoneNumber'];
					$this->CreatedDate = $rec['CreatedDate'];
					$this->ModifiedDate = $rec['ModifiedDate'];
				}
			}
		}		
		
		function SaveProfile()
		{
			$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
			if($this->ID == "" || $this->ID == 0) //Create
			{
				
				$data = Array(
					'Name' => $this->Name,
					'CreatedDate' => date("Y-m-d H:i:s"),
					'ModifiedDate' => date("Y-m-d H:i:s"),
					'PhoneNumber' => $this->PhoneNumber
				);
				$this->ID = $db->insert ('Profile', $data);
				$this->CreatedDate = $data['CreatedDate'];
				$this->ModifiedDate = $data['ModifiedDate'];
			}
			else
			{//Update
				$data = Array (
					'Name' => $this->Name,
					'ModifiedDate' => date("Y-m-d H:i:s"),
					'PhoneNumber' => $this->PhoneNumber
				);
				$db->where ('ID', $this->ID);
				if ($db->update ('Profile', $data))
				{}	//echo $db->count . ' records were updated';
				else
				{}	//echo 'update failed: ' . $db->getLastError();
			}
	   }
		
	}
?>