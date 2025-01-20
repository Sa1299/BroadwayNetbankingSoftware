<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Close Accounts - Broadway Immigration</title>
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
  <li><a href="kitret.php" class="active">Close Acc</a></li>
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
<div class="container-fluid">
  <h2 style="text-align:center;">Close Account</h2>
  
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
		             <table class="table table-striped" border="1" >

            <thead>
            <tr>
                <th>Serial No</th>
                <th>Name</th>
                <th>Phone No</th>
				<th>Sim Num</th>
				<th>App Id</th>
				<th>G Id</th>
                <th>Country</th>
                <th>Services</th>
                <th>D.O.B</th>
				<th>Description Box</th>
            </tr>
        </thead>
		
<?php
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_client` where closing!=''";
$result2 = $conn->query($sql2);
$x = 1;
while($row2 = $result2->fetch_assoc()){
?>
		
        <tbody>
            <tr>
                <td align="center"><?php echo $x++; ?></td>
                <td align="center"><a href="Userprofile.php?id=<?php echo $row2['uid']; ?>"><?php echo $row2['name']; ?></a></td>
                <td align="center"><?php echo $row2['phone']; ?></td>
				<td align="center"><?Php echo $row2['sim']; ?></td>
                <td align="center"><?php echo $row2['sr_id']; ?></td>
                <td align="center"><?php echo $row2['app_id']; ?></td>
				 <td align="center"><?php echo $row2['country']; ?></td>                             
				  <td align="center"><?php echo $row2['services']; ?></td>
				  <td align="center"><?php echo $row2['dob']; ?></td>
				   <td align="center"><?php echo $row2['description']; ?></td>

          </tr>
        </tbody>
<?php } ?>	
    </table>
  </div>
	</div>
			</body>
</html>