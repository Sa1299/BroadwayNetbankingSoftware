<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_POST['uid'];
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

$sql = "INSERT INTO `tbl_addbank` (`accholdername`, `fathername`, `customerid`, `bankaccnum`, `bankname`, `balance`, `date`, `time`, `uid`, `relation`, `password`)  VALUES ('$accname','$fathername','$customerid','$bankaccnum','$bankname','$balance','$date','$time','$id','$r','$p')";
//echo $sql;
$result = $conn->query($sql);

if($result){
	header("location:Userprofile.php?id=$id");
}else{
	echo "Error";
}
?>