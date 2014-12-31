<?php
require_once('config.php');
require_once('MysqliDb.php');
error_reporting(E_ALL);


 class Client
{
	/*Properties */
	public $ID;
	public $ProjectName;
	public $RegistrationDate;
	public $Email;
	public $AuthKey;
	
	function __construct() 
	{
	}
   
   
   
   //usage  ---  Json::withID(..)
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
		$res = $db->get ("Client", 1);
		if ($db->count > 0){
			foreach ($res as $rec) { 
				
				$this->ID = $rec['ID'];
				$this->ProjectName = $rec['ProjectName'];
				$this->RegistrationDate = $rec['RegisteredDate'];
				$this->Email = $rec['Email'];
				$this->AuthKey = $rec['AuthKey'];
			}
		}
	}
   /*Create and Update*/
   function SaveClient()
   {
		$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
		if($this->ID == "") //Create
		{
			$date = date_create();
			$this->AuthKey = md5($this->ProjectName + $date->format('U'));
			$data = Array(
				'ProjectName' => $this->ProjectName,
				'RegisteredDate' => date("Y-m-d H:i:s"),
				'Email' => $this->Email,
				'AuthKey' => $this->AuthKey
			);
			$this->ID = $db->insert ('Client', $data);
		}
		else
		{//Update
			$data = Array (
				'ProjectName' => $this->ProjectName,
				'Email' => $this->Email
			);
			$db->where ('ID', $this->ID);
			if ($db->update ('Client', $data))
			{}	//echo $db->count . ' records were updated';
			else
			{}	//echo 'update failed: ' . $db->getLastError();
		}
   }
   
   
}
?>