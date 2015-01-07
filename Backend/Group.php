<?php
require_once('config.php');
require_once('MysqliDb.php');
error_reporting(E_ALL);

 
	class Group{
	
		public $ID;
		public $Name;
		public $Currency;
		public $CreatedBy;
		public $CreatedDate;
		public $ModifiedDate;
		public $Members;
		
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
			$res = $db->get ("Group", 1);
			if ($db->count > 0){
				foreach ($res as $rec) { 
					
					$this->ID = $rec['ID'];
					$this->Name = $rec['Name'];
					$this->Currency = $rec['Currency'];
					$this->CreatedBy = $rec['CreatedBy'];
					$this->CreatedDate = $rec['CreatedDate'];
					$this->ModifiedDate = $rec['ModifiedDate'];
					
					/*Load Members*/
				}
			}
		}		
		
		function SaveGroup()
		{
			$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
			if($this->ID == "" || $this->ID == 0) //Create
			{
				
				$data = Array(
					'Name' => $this->Name,
					'Currency' => $this->Currency,
					'CreatedBy' => $this->CreatedBy,
					'CreatedDate' => date("Y-m-d H:i:s"),
					'ModifiedDate' => date("Y-m-d H:i:s")
				);
				$this->ID = $db->insert ('Group', $data);
				$this->CreatedDate = $data['CreatedDate'];
				$this->ModifiedDate = $data['ModifiedDate'];
			}
			else
			{//Update
				$data = Array (
					'Name' => $this->Name,
					'Currency' => $this->Currency,
					'CreatedBy' => $this->CreatedBy,
					'ModifiedDate' => date("Y-m-d H:i:s")
				);
				$db->where ('ID', $this->ID);
				if ($db->update ('Group', $data))
				{}	//echo $db->count . ' records were updated';
				else
				{}	//echo 'update failed: ' . $db->getLastError();
			}
	   }
		
	}
?>