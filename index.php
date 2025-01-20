<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - Broadway Immigration</title>
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
.r td{
    padding:10px;
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php" style="background-color: #357ca5;width:200px;font-size: 20px;height: 54px;margin-top:-2px;"><b>Broadway</b></a></li>
  <li><a href="index.php" class="active" >Add Client</a></li>
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
<div class="main">
<br>
    <h2 style="text-align:left;"><font style="margin-left:120px;">Add New Client</font>
    <a href="deposit.php" class="btn btn-success btn-sm" style="float:right;margin-right:120px;">Add Deposit</a>
    </h2>
    <div class="container">
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
        <form action="client_add.php" method="post" style="text-align:center;padding:10px;">
            <table class="r" width="100%">
            <tr>
            <td><input type="text" id="name" name="name" placeholder="Enter Client Name" class="form-control" required>
            </td>
            
             <td><input type="text" name="phone" placeholder="Phone Number" maxlength="10" minlength="10" class="form-control" required> 
			 </td>
			 
             <td><input type="text" name="sim" placeholder="Sim Number" maxlength="20" class="form-control" required> 
             </td>
			 </tr>
			 <tr>
             <td><input type="text"  name="sr_id" placeholder="Sr_id" class="form-control" required> 
			 </td>
			 
             <td><input type="text"  name="app_id" placeholder="App id" class="form-control" required> 
			 </td>
			 
			   <td><select name="country" placeholder="country" class="form-control" required>

<option value="">Select Country</option>
<option value="Uk">UK</option>
<option value="USA">USA</option>
<option value="Finland">Finland</option>
<option value="Other">Other</option>
             </select>
            </td>
			 </tr>
			 <tr>
			 <td><select name="services" class="form-control" required>

<option value="">Select Services</option>
<option value="Study Visa">Study Visa</option>
<option value="Visitor">Visitor</option>
<option value="Dependent Visa">Dependent Visa</option>
<option value="Work Visa">Work Visa</option>
<option value="Sponsor">Sponsor</option>
<option value="Other">Other</option>
             </select>
			 </td>
			 <td>
			     <select name="branch" class="form-control" required>
			         <option value="">Select Branch</option>
			         <?php
			         include'connection.php';
			         $sqlb = "SELECT id,branch FROM `tbl_newbranch` where active='y'";
			         $resultb = $conn->query($sqlb);
			         while($rowb = $resultb->fetch_assoc()){
			         ?>
			         <option value="<?php echo $rowb['id']; ?>"><?php echo $rowb['branch']; ?></option>
			         <?php } ?>
			     </select>
			 </td>
            <td>
             <input type="date" name="dob" title="Enter D.O.B" class="form-control" required>
             
			<td>
			</tr>
<tr><td colspan="3">
<textarea  name="description" class="form-control" placeholder="Client Description" rows="4" cols="50" required></textarea>
</td></tr>
</table>
                <br>
                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
            <button type="reset" name="btn" class="btn btn-danger">Reset</button>
        </form>
             </div>   
            </div>
            
            </div>
          </body>
</html>


















