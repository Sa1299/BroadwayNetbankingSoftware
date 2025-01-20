<?php
error_reporting(0);

//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Bank - Broadway Immigration</title>
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
</head>
<body>

<br>
<div class="container">
    <h2 style="text-align:center;">Bank Account Details</h2>
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
    <form action="bankadd.php" method="post"style="text-align:center;">
	<input type="hidden" id="uid" name="uid" value="<?php echo $_GET['id']; ?>" required>
		<br>
            <!--<label for="accountHolder">Account Holder Name:</label>-->
            <input type="text" id="accountHolder" placeholder="Account Holder Name" name="accname" class="form-control" required>
        
		<br>
			<!--<label for="accountHolder">Father Name:</label>-->
            <input type="text" id="Father Name" placeholder="Father Name" name="fathername" class="form-control" required>
				<br>

		<!--<label for="bankService">Relation:</label>-->
            <select id="realtion"  name="relation" class="form-control" required>
                <option value="Self">Self</option>
                <option value="Father">Father</option>
				                <option value="Mother">Mother</option>
								                <option value="Husband">Husband</option>
												                <option value="Wife">Wife</option>

 <option value="other">Other</option>


              
            </select>
			 <br>
		<!--<label for="Customer Id">Customer Id:</label>-->
            <input type="text" id="Customer Id" placeholder="Customer id" name="customerid" class="form-control" required>
			<br>
            <input type="hidden" id="password" placeholder="Password" name="password" class="form-control">
            <!--<br>-->
            <!--<label for="accountNumber">Bank Account Number:</label>-->
            <input type="text" id="accountNumber" placeholder="Bank Account Number" maxlength="16" minlength="10" name="bankaccnum" class="form-control" required>
        
				<br>

            <!--<label for="bankService">Bank Service:</label>-->
            <select id="bankname" name="bankname" class="form-control" required>
                <option value="HDFC">HDFC Bank</option>
                <option value="ICIC">ICIC Bank</option>
                <option value="Other">Other</option>
              
            </select>
        
				<br>

            <!--<label for="balance">Balance:</label>-->
            <input type="number" id="balance" placeholder="Balance" class="form-control" name="balance" required>
        

       
				<br>
				

			           <button type="submit" name="btn" class="btn btn-primary">Submit</button>

			             <a href="Userprofile.php?id=<?php echo $_GET['id']; ?>" class="previous round"><button type="button" name="btn" class="btn btn-danger">Back</button></a>

        </div>
    </form>
  </div>
	</div>
</div>
<br><br>
</body>
</html>
