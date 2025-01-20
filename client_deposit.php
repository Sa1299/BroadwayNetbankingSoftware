<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$a = $_POST['name'];
$b = $_POST['source'];
$c = $_POST['payment'];
$d = $_POST['status'];

$date = date('Y-m-d');
$time = date('H:i:sa');

$sql = "INSERT INTO `tbl_funding`(`name`, `payment`, `status`, `source`, `date`, `time`) VALUES ('$a','$c','$d','$b','$date','$time')";
$result = $conn->query($sql);

if($result){
	header("location:deposit.php?msg=insert");
}else{
	echo "Error";
}
?>