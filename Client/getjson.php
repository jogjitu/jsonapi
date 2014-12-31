<?php 
require_once('../Backend/Json.php');

$json = Json::withKey("TEST",1);

echo 'Json string is ------'.$json->JsonString;
?>
