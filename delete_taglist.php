<?php
include 'connection.php';
$id = $_GET['id'];

$sql = "DELETE FROM `tbl_tag` WHERE id='$id'";
$result = $conn->query($sql);
if($result){
    header("location:create_tag.php?msg=remove");
}else{
    echo "Error";
}
?>