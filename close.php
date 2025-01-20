<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_GET['id'];
$d = date('Y-m-d');
$sql = "UPDATE `tbl_client` SET `closing`='$d'  WHERE `uid`='$id'";
$result = $conn->query($sql);

if($result){
	header("location:Kitret.php?msg=close");
}else{
	echo "Error";
}
?>