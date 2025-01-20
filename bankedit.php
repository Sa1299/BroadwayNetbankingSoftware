<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_POST['id'];
$uid = $_POST['uid'];
$accname = $_POST['accname'];
$fathername = $_POST['fathername'];
$customerid = $_POST['customerid'];
$bankaccnum = $_POST['bankaccnum'];
$bankname = $_POST['bankname'];
$r = $_POST['relation'];
$balance = $_POST['balance'];
$p = $_POST['password'];
$date = date('Y-m-d');
$time = date('H:i:sa');

$sql = "UPDATE `tbl_addbank` SET `accholdername`='$accname',`fathername`='$fathername',`relation`='$r',`customerid`='$customerid',`password`='$p',`bankaccnum`='$bankaccnum',`bankname`='$bankname',`balance`='$balance' WHERE id='$id' and uid='$uid'";
//echo $sql;
$result = $conn->query($sql);

if($result){
	header("location:Userprofile.php?id=$uid");
}else{
	echo "Error";
}
?>