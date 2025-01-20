<?php
include 'connection.php';
$uid = $_GET['uid'];
$my = $_GET['my'];
$other = $_GET['other'];
$amount = $_GET['amount'];
$status = $_GET['status'];
$date = $_GET['date'];
$time = $_GET['time'];

if($status == 'Debit'){
	$sql = "SELECT balance FROM `tbl_addbank` WHERE bankaccnum='$my'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$myb = $row['balance'];
	}
	$mytotal = $myb+$amount;
	//echo $mytotal;
	$sqlmy = "UPDATE `tbl_addbank` SET `balance`='$mytotal' WHERE `bankaccnum`='$my'";
	$resultmy = $conn->query($sqlmy);

	$sql2 = "SELECT balance FROM `tbl_addbank` WHERE bankaccnum='$other'";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_assoc()){
		$myb2 = $row2['balance'];
	}
	$mytotal2 = $myb2-$amount;
	//echo $mytotal2;
	$sqlmy2 = "UPDATE `tbl_addbank` SET `balance`='$mytotal2' WHERE `bankaccnum`='$other'";
	$resultmy2 = $conn->query($sqlmy2);
}

if($status == 'Credit'){
	$sql = "SELECT balance FROM `tbl_addbank` WHERE bankaccnum='$my'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$myb = $row['balance'];
	}
	$mytotal = $myb-$amount;
	//echo $mytotal;
	$sqlmy = "UPDATE `tbl_addbank` SET `balance`='$mytotal' WHERE `bankaccnum`='$my'";
	$resultmy = $conn->query($sqlmy);

	$sql2 = "SELECT balance FROM `tbl_addbank` WHERE bankaccnum='$other'";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_assoc()){
		$myb2 = $row2['balance'];
	}
	$mytotal2 = $myb2+$amount;
	//echo $mytotal2;
	$sqlmy2 = "UPDATE `tbl_addbank` SET `balance`='$mytotal2' WHERE `bankaccnum`='$other'";
	$resultmy2 = $conn->query($sqlmy2);
}

$sql3 = "DELETE FROM `tbl_transaction` WHERE payment='$amount' and date='$date' and time='$time'";
//echo $sql3;
//exit();
$result3 = $conn->query($sql3);

if($result3){
	header("location:Userprofile.php?id=$uid");
}else{
	print "Error";
}
?>