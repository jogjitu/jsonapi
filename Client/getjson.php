<?php 
require_once('../Backend/Json.php');

$json = Json::withKey("TEST",1,"");
/*$json->JsonString = "XLXLXLXLXLXLXLXLXLXL";
$json->SaveJson();*/
echo 'Json string is ------'.$json->JsonString;
?>
