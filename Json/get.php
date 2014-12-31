<?php 
require_once('../Backend/Json.php');

$authKey = $_REQUEST['auth'];
$key = $_REQUEST['key'];
$json = Json::withKey($key,0,$authKey);

echo $json->JsonString;
?>
