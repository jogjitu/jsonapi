<?php
require_once('config.php');
require_once('MysqliDb.php');
error_reporting(E_ALL);


 class Client
{
	public $ID;
	public $ProjectName;
	public $RegistrationDate;
	public $Email;
	public $AuthKey;
	
	function __construct() {
		
   }
   /*
   function __construct($clientID) {
    
	$ID= $clientID;
   }
   */
   function SaveClient()
   {
		$db = new Mysqlidb (DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
		$date = date_create();
		$this->AuthKey = md5($this->ProjectName + $date->format('U'));
		$data = Array(
        'ProjectName' => $this->ProjectName,
        'RegisteredDate' => date("Y-m-d H:i:s"),
        'Email' => $this->Email,
        'AuthKey' => $this->AuthKey
		
    );
    $ID = $db->insert ('Client', $data);
    
   }
   
   
}
?>