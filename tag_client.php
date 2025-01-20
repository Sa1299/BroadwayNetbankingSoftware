<?php
include 'connection.php';
$tag = $_POST['tag'];
$account = $_POST['account'];

$sql = "UPDATE `tbl_addbank` SET `tag`='$tag' WHERE `bankaccnum`='$account'";
$result = $conn->query($sql);
if($result){
    header("location:taglist.php");
}else{
    echo "Error";
}
?>