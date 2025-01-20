<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_GET['id'];

$sql = "DELETE FROM `tbl_client` WHERE `uid`='$id'";
$result = $conn->query($sql);

if($result){
	header("location:viewu.php?msg=delete");
}else{
	echo "Error";
}
?>