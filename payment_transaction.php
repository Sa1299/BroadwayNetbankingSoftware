<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Transaction - Broadway Immigration</title>
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
td{
	text-align:center;
}
td{
	padding:10px;
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
		  <h2 style="text-align:center;">Transaction</h2>

 
             <div class="container">
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
      <form action="insertpaytra.php" method="post" >
	  <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" required>
          <table  width="100%">
            <tr>
			<td>
			        <!--<b> From:</b>-->

      <select name="user1" class="form-control" required>

<option value="">Select My Account </option>
<?php
$id= $_GET['id'];
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_addbank` WHERE `uid`='$id'";
//echo $sql2;
$result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc()){
	
	$an = $row2['accholdername'];
	$bn = $row2['bankaccnum'];
	$ba = $row2['bankname'];
?>	
<option value="<?php echo $bn; ?>"><?php echo $an." - ".$bn." (".$ba.")"; ?></option>
<?php } ?>

             </select>
             </td>
</tr>
<tr>
<td>

<!--<b> To: </b>-->
            <select name="user2" class="form-control" required>

<option value="">Select Transfer Account</option>
<?php
$id= $_GET['id'];
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_addbank` WHERE `uid`!='$id'";
//echo $sql2;
$result2 = $conn->query($sql2);
while($row2 = $result2->fetch_assoc()){
	
	$an = $row2['accholdername'];
	$bn = $row2['bankaccnum'];
	$ba = $row2['bankname'];
?>	
<option value="<?php echo $bn; ?>"><?php echo $an." - ".$bn." (".$ba.")"; ?></option>
<?php } ?>
             </select>
             </td>
          
   </tr>

<tr>
<td>
<!--<b> Payment Options: </b>-->

<select name="payment-Options" class="form-control" required>
<option value="Net-banking">Net-Banking</option>
<option value="Cash">Cash</option>
<option value="Upi">Upi</option>
<option value="Other">Other</option>

</select>
</td>

</tr>

   
   <tr>
<td>   			
<!--<b> Amount: </b>-->

            <input type="text" name="payment" placeholder="Enter Amount" class="form-control"  required>
            </td>
             </tr>
             <tr>

<tr>
<td>
<!--<b> Payment Options: </b>-->

<select name="purpose" class="form-control" required>
<option value="Net-banking">Select Your Purpose</option>
<option value="Other" selected>Other</option>
<option value="Fees">Fees</option>
</select>
</td>

</tr>

			 <td>
<textarea  name="remarks" placeholder="Remarks" class="form-control" rows="4" cols="50"></textarea>
</td>
</tr>
<td>

             <button type="submit" name="btn" class="btn btn-success">Transfer</button>
			 <a href="Userprofile.php?id=<?php echo $_GET['id']; ?>"><button type="button" name="btn" class="btn btn-danger">Back</button></a>
             </td>
</tr>
</table>
</form>
</div>
</div>
 </body>
 </html>
 