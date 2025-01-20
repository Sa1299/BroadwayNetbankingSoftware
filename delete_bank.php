<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_GET['id'];
$uid = $_GET['uid'];

$sql = "DELETE FROM `tbl_addbank` WHERE `id`='$id'";
$result = $conn->query($sql);

if($result){
	header("location:Userprofile.php?id=$uid");
}else{
	echo "Error";
}
?>