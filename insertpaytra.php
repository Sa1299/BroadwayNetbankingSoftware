<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_POST['id'];
$user_from = $_POST['user1'];
$user_to = $_POST['user2'];
$payment = $_POST['payment'];
$o = $_POST['payment-Options'];
$r = $_POST['remarks'];
$purpose = $_POST['purpose'];

$date = date('Y-m-d');
$time = date('H:i:sa');

$sqla = "SELECT balance FROM `tbl_addbank` where bankaccnum='$user_from'";
$resulta = $conn->query($sqla);
while($rowa = $resulta->fetch_assoc()){
	$b1 = $rowa['balance'];
}
//echo $payment."<br>";
//echo $b1;

$sqlab = "SELECT balance FROM `tbl_addbank` where bankaccnum='$user_to'";
$resultab = $conn->query($sqlab);
while($rowab = $resultab->fetch_assoc()){
	$b12 = $rowab['balance'];
}

if(($b1 != '0') and ($b1 >= $payment)){
	//echo "transfer";
	
	$balance = $b1 - $payment;
	$sqlb = "UPDATE `tbl_addbank` SET `balance`='$balance' WHERE `bankaccnum`='$user_from'";
	$resultb = $conn->query($sqlb); //Debit
	
	$balance2 = $b12 + $payment;
	$sqlc = "UPDATE `tbl_addbank` SET `balance`='$balance2' WHERE `bankaccnum`='$user_to'";
	$resultc = $conn->query($sqlc); //Credit
}else{
	echo "Insufficient Balance in your Account";
	exit();
}

$sql = "INSERT INTO `tbl_transaction`( `uid`, `user_from`, `user_to`, `payment`, `status`, `date`, `time`, `paymentoptions`, `remarks`, `purpose`) VALUES ('$id','$user_from','$user_to','$payment','Debit','$date','$time','$o','$r','$purpose')";
$result = $conn->query($sql);

$sql2 = "INSERT INTO `tbl_transaction`( `uid`, `user_from`, `user_to`, `payment`, `status`, `date`, `time`, `paymentoptions`, `remarks`, `purpose`) VALUES ('$id','$user_to','$user_from','$payment','Credit','$date','$time','$o','$r','$purpose')";
$result2 = $conn->query($sql2);

if($resultc){
	header("location:Userprofile.php?id=$id");
}else{
	echo "Error";
}
?>