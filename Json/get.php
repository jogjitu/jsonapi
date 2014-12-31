<?php 
require_once('../Backend/Json.php');
require_once('../Backend/Client.php');
$authKey = $_REQUEST['auth'];

$client = Client::withAuthKey($authKey);

$key = $_REQUEST['key'];
$json = Json::withKey($key,$client->ID);

echo $json->JsonString;
?>
