<?php
include 'connection.php';
$tag = $_POST['tag'];

$sql = "INSERT INTO `tbl_tag`(`tag_name`) VALUES ('$tag')";
$result = $conn->query($sql);
if($result){
    header("location:create_tag.php?msg=add");
}else{
    echo "Error";
}
?>