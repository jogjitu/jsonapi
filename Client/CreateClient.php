<?php 
require_once('../Backend/Client.php');

$client = new Client();
$client->ProjectName = "TEST 3 2 ";
$client->Email = "TEST@TEST2.com";
$client->SaveClient();
echo $client->ID;
?>