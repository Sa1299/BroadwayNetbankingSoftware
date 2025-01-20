<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
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

$sql = "INSERT INTO `tbl_client`(`name`,`sr_id`,`app_id`,`phone`,`sim`, `country`, `services`, `dob`, `description`, `date`, `time`, `l_id`) VALUES ('$name','$sr_id','$app_id','$phone','$sim','$country','$services','$dob','$description','$date','$time','$lid')";
$result = $conn->query($sql);

if($result){
	header("location:viewu.php?msg=insert");
}else{
	echo "Error";
}
?>