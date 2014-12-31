<?php
require_once('config.php');
require_once('MysqliDb.php');
error_reporting(E_ALL);


 class Json
{
	/*Properties*/
	public $ID;
	public $ClientID;
	public $JsonKey;
	public $JsonString;
	public $ModifiedDate;
	public $CreatedDate;
	
	function __construct() 
	{
	}
	
	
   //usage  ---  Json::withKey(..)
   public static function withKey( $key, $clientId ) {
    	$instance = new self();
    	$instance->LoadByKey( $key, $clientId );
    	return $instance;
    }
	
	/*Get Json by ClientID and Key*/
	function LoadByKey($key, $clientId)
	{
		$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
		$db->where ('JsonKey', $key);
		$db->where ('ClientID', $clientId);	
		$res = $db->get ("Json", 1);
		
		if ($db->count > 0){
			foreach ($res as $rec) { 
				
				$this->ID = $rec['ID'];
				$this->ClientID = $rec['ClientId'];
				$this->JsonKey = $rec['JsonKey'];
				$this->JsonString = $rec['JsonString'];
				$this->ModifiedDate = $rec['ModifiedDate'];
				$this->CreatedDate = $rec['CreatedDate'];
				
			}
		}
	}
   
   
   /*Create and Update Json*/
   function SaveJson()
   {
		$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
		if($this->ID == "")/*Create*/
		{
			$data = Array(
				'ClientId' => $this->ClientID,
				'JsonKey' => $this->JsonKey,
				'JsonString' => $this->JsonString,
				'ModifiedDate' => date("Y-m-d H:i:s"),
				'CreatedDate' => date("Y-m-d H:i:s")
			);
			$this->ID = $db->insert ('json', $data);
		}
		else
		{//Update
			$data = Array (
				'JsonKey' => $this->JsonKey,
				'JsonString' => $this->JsonString,
				'ModifiedDate' => date("Y-m-d H:i:s")
			);
			$db->where ('ID', $this->ID);
			if ($db->update ('Json', $data))
			{}	//echo $db->count . ' records were updated';
			else
			{}//echo 'update failed: ' . $db->getLastError();
		}
   }
   
}
?>