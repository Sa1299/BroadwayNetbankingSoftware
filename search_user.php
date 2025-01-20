<?php
//include 'check_login.php';
?>
<?php
$p = $_POST['search'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Client - Broadway Immigration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
td,th{
	text-align:left;
}
a{
	text-decoration:none;
	color:black;
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
  <li><a href="viewu.php">View User</a></li>
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
  <br>
  <h2 style="text-align:center;">Search User - <?php echo $p; ?></h2>

		   <div class="container-fluid">
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
		            <table class="table table-striped rmn">

            <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Phone No</th>
				        <th>Sim No.</th>
                <th>Country</th>
                <th>Services</th>
                <th>D.O.B</th>
            </tr>
        </thead>
		
<?php
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_client` where name LIKE '%$p%'";
$result2 = $conn->query($sql2);
$x = 1;
while($row2 = $result2->fetch_assoc()){
?>
		
        <tbody>
            <tr>
                <td><?php echo $x++; ?></td>
                <td><a href="Userprofile.php?id=<?php echo $row2['uid']; ?>"><?php echo $row2['name']; ?>
                  (<?php echo $row2['sr_id']; ?>-<?php echo $row2['app_id']; ?>)
                </a></td>
                <td><?php echo $row2['phone']; ?></td>
				<td><?Php echo $row2['sim']; ?></td>
				 <td><?php echo $row2['country']; ?></td>
				  <td><?php echo $row2['services']; ?></td>
				  <td><?php echo $row2['dob']; ?></td>

</tr>
                
        </tbody>
<?php } ?>	
    </table>
  </div>
	</div>
</body>
</html>