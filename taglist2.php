<?php
include 'connection.php';
$account = $_GET['id'];

$sql = "UPDATE `tbl_addbank` SET `tag`='' WHERE `bankaccnum`='$account'";
$result = $conn->query($sql);
if($result){
    header("location:taglist.php");
}else{
    echo "Error";
}
?>