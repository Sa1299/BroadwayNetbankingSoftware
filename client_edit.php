<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_GET['id'];
$name = $_POST['name'];
$sr_id = $_POST['sr_id'];
$app_id = $_POST['app_id'];
$phone = $_POST['phone'];
$sim = $_POST['sim'];
$country = $_POST['country'];
$services = $_POST['services'];
$dob = $_POST['dob'];
$description = $_POST['description'];
$lid = $_POST['branch'];
$date = date('Y-m-d');
$time = date('H:i:sa');

$sql = "UPDATE `tbl_client` SET `sr_id`='$sr_id',`app_id`='$app_id',`name`='$name',`phone`='$phone',`sim`='$sim',`country`='$country',`services`='$services',`dob`='$dob',`description`='$description',`l_id`='$lid' WHERE `uid`='$id'";
$result = $conn->query($sql);

if($result){
	header("location:viewu.php?msg=edit succesfully");
}else{
	echo "Error";
}
?>
