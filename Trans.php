<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Today Transactions - Broadway Immigration</title>
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
body{
  background: #ecf0f5;
}
</style>
</head>
<body>
<ul>
  <li><a href="index.php" style="background-color: #357ca5;width:200px;font-size: 20px;height: 54px;margin-top:-2px;"><b>Broadway</b></a></li>
  <li><a href="index.php">Add Client</a></li>
  <li><a href="viewu.php">View User</a></li>
  <!--<li><a href="Userprofile.php">User Profile</a></li>-->
    <!--<li><a href="add_bank.php">Add Bank</a></li>-->
    <li><a href="Trans.php" class="active" >Today Transaction</a></li>
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

   <div class="container-fluid">
		  <br>
		  <h2 style="text-align:center;">Today Transaction</h2>
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
		             <table class="table table-striped" border="1" >

            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Amount</th>
                    <th>Account 1</th>
					                    <th>Account 2</th>

                    <th>Date/Time</th>
                </tr>
            </thead>
            <tbody>

<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$d = date('Y-m-d');
$sql22 = "SELECT * FROM `tbl_transaction` where date='$d'  order by tid DESC";
$result22 = $conn->query($sql22);
$x=1;
while($row22 = $result22->fetch_assoc()){
	
	$user_from = $row22['user_from'];
	$user_to = $row22['user_to'];
	$payment = $row22['payment'];
	$status = $row22['status'];
	$date = $row22['date'];
	$time = $row22['time'];
  $date2=date_create("$date");

$sqln2 = "SELECT `accholdername` FROM `tbl_addbank` WHERE `bankaccnum`='$user_from'";
$resultn2 = $conn->query($sqln2);
while($rown2 = $resultn2->fetch_assoc()){
	$tn2 = $rown2['accholdername'];
}
	
$sqln = "SELECT `accholdername` FROM `tbl_addbank` WHERE `bankaccnum`='$user_to'";
$resultn = $conn->query($sqln);
while($rown = $resultn->fetch_assoc()){
	$tn = $rown['accholdername'];
}
?>	
                <tr>
                    <td><?php echo $x++; ?></td>
                    <td>₹<?php echo $payment; ?> - <?php echo $status; ?></td>
                    <td><?php echo $tn2." - ".$user_from; ?> </td>
					<td><?php echo $tn." - ".$user_to; ?></td>
				    <td><?php echo date_format($date2,"d/m/Y"); ?> - <?php echo $time; ?></td>
                </tr>
<?php } ?>
                
            </tbody>
        </table>
</div>
</body>
</html>