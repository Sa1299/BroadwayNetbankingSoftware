<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Tag List - Broadway Immigration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #226d99;
}
td{
	text-align:left;
}
body{
  background: #ecf0f5;
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php" style="background-color: #357ca5;width:200px;font-size: 20px;height: 54px;margin-top:-2px;"><b>Broadway</b></a></li>
  <li><a href="index.php" >Add Client</a></li>
  <li><a href="viewu.php" class="active" >View User</a></li>
  <!--<li><a href="Userprofile.php">User Profile</a></li>-->
    <!--<li><a href="add_bank.php">Add Bank</a></li>-->
    <li><a href="Trans.php">Today Transaction</a></li>
	<li><a href="kitret.php">Close Acc</a></li>
  <li style="float: right;margin-right: 30px;">
      <form method="post" action="search_user.php">
        <input type="search" name="search" placeholder=" Search Client Here..." style="margin-top: 12px;">
      </form>
  </li>
  <li>
    <a href="logout.php">Logout <i class="fa fa-sign-out"></i></a>
  </li>
</ul>
<div class="main">
<br>

    <h2 style="text-align:left;"><font style="margin-left:120px;color:black;">
        Add New Tag Lists</font>
    <a href="taglist.php" class="btn btn-danger btn-sm" style="float:right;margin-right:120px;">Back</a>
    </h2>
    <div class="container">
        <?php
        $msg = $_GET['msg'];
        if($msg == 'add'){
        ?>
        <center><font color="green">Successfully Add New Tag!!</font></center>
        <?php }
        if($msg == 'remove'){
        ?>
        <center><font color="green">Successfully Remove Tag!!</font></center>
        <?php } ?>
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
        <form action="add_tag_client.php" method="post" style="text-align:center;padding:10px;">
            <center>
            <table width="100%"><tr>
                <td>
			        <input type="text" name="tag" class="form-control" placeholder="Enter New Tag Name" required>
                </td>
             <td>&nbsp;</td>
             <td><button type="submit" name="btn" class="btn btn-primary btn-sm"><i class="material-icons">playlist_add</i></button></td>
             
            </tr></table>
            </center>
        </form>

           <table class="table table-striped rmn" border="1">
           
                

        <tr>
            <th>S.no</th>
            <th>Taglist Name</th>
            <th>Action</th>
        </tr>
    
<?php
//$id= '';
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_tag`";
$result2 = $conn->query($sql2);
$count = mysqli_num_rows($result2);
//echo $count;
if($count > 0){
$x=1;
while($row2 = $result2->fetch_assoc()){
	$tid = $row2['id'];
	$tn = $row2['tag_name'];
?>			
        <tr>
            <td><?php echo $x++; ?></td>
            <td><?php echo $tn; ?></td>
			
				<td>
					<a href="delete_taglist.php?id=<?php echo $tid; ?>" style="color:red;"><i class="fa fa-minus-circle" style="font-size:18px;"></i></a>
				
                </td>

        </tr>
<?php }}else{ ?>

		<tr>
			<td colspan="8" style="color:red;">
				Please Add Tags !!!
			</td>
		</tr>

<?php } ?>		
  
	
			</table>
 
            </div>
            </div>
            </div>
          </body>
</html>


















