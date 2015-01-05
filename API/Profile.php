<?php 
require_once('../Backend/Profile.php');

$data = $_REQUEST['data'];

$jsonProfile = json_decode($data);
//$profile = Profile::withID($authKey);
$profile = new Profile();
$profile->Name = $jsonProfile->{'Name'};
$profile->PhoneNumber = $jsonProfile->{'PhoneNumber'};

$profile->SaveProfile();

echo json_encode($profile);
?>
