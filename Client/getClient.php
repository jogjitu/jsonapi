<?php 
require_once('../Backend/Client.php');

$client = Client::withID(1);
/*$client->ProjectName = "ABCDEF";
$client->SaveClient();*/
echo 'ProjectName is ------'.$client->ProjectName;
?>
