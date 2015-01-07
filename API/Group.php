<?php 
require_once('../Backend/Group.php');

$data = $_REQUEST['data'];

$jsonGroup = json_decode($data);
//$profile = Profile::withID($authKey);
$group = new Group();
$group->Name = $jsonGroup->{'name'};
$group->Currency = $jsonGroup->{'currency'};
$group->CreatedBy = $jsonGroup->{'createdBy'};
$group->Members = $jsonGroup->{'members'};
$group->ID = strlen($group->Name);
//$group->SaveGroup();

echo json_encode($group);
?>
