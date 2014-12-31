<?php 
require_once('../Backend/Json.php');

$json = new Json();
$json->ClientID = 1;
$json->JsonKey = "TEST" ;

$json->JsonString = "fdfdfdfddf" ;
$json->SaveJson();
echo $json->ID;
?>