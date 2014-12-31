<?php 
require_once('../Backend/Json.php');
require_once('../Backend/Client.php');
$authKey = $_REQUEST['auth'];

$client = Client::withAuthKey($authKey);


$key = $_REQUEST['key'];
$value = $_REQUEST['value'];
$json = Json::withKey($key,$client->ID);
$json->JsonString = $value;
$json->SaveJson();
echo 1;
?>
