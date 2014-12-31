<?php 
require_once('../Backend/Json.php');

$authKey = $_REQUEST['auth'];
$key = $_REQUEST['key'];
$value = $_REQUEST['value'];
$json = Json::withKey($key,0,$authKey);
$json->JsonString = $value;
$json->SaveJson();
echo 1;
?>
