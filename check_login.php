<?php
session_start();
$mark1 = $_SESSION['u_id'];
//echo $mark1;
if($mark1 == '780'){
    
}else{
    header("location:../../home/index.php?msg=Wrong-User");
}
?>