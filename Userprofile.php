<?php
error_reporting(0);

//include 'check_login.php';
?>
<?php
date_default_timezone_set('Asia/Kolkata');
include 'connection.php';
$id = $_GET['id'];

$sql = "SELECT * FROM `tbl_client` WHERE `uid`='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){

$name = $row['name'];
$sr_id = $row['sr_id'];
$app_id = $row['app_id'];
$phone = $row['phone'];
$sim = $row['sim'];
$country = $row['country'];
$services = $row['services'];
$dob = $row['dob'];
$description = $row['description'];
$lid = $row['l_id'];
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Client Profile - Broadway Immigration</title>
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
.rmn td,th{
	text-align:left;
}
body{
	text-transform: capitalize;
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

<a href="add_bank.php?id=<?php echo $id; ?>" style="margin-left:100px;"><button type="submit" name="btn" class="btn btn-primary btn-sm">Add Bank</button></a> 

<a href="viewu.php" class="previous round" style="float:right;margin-right:100px;"><button type="button" name="btn" class="btn btn-danger btn-sm">Back</button></a>

<br><br>
        <div class="container">

        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">

        <h2 style="text-align:center;">Client Profile</h2>
        <br>
          <table class="table rmn" border="0" >
              <tr>
            <td style="width:20%;">
                <?php
                $abc = $_GET['detail'];
                if($abc != ''){
                    $content = 'hide';
                }
                if(($abc == '') or ($abc == 'hide')){
                    $content = 'show';
                }
                ?>
                <b><a href="Userprofile.php?id=<?php echo $_GET['id']; ?>&detail=<?php echo $content; ?>" style="color:black;text-decoration:none;">N</a>ame:</b>
            </td>
            <td style="width:30%;">
                <span id="user-name"><?php echo $name; ?>
                <?php if($abc == 'show'){ ?>
                <a href="upload_pdf.php?id=<?php echo $_GET['id']; ?>"><i class="fa fa-eye"></i></a>
                <?php } ?>
                </span>
            </td>
            <td style="width:20%;">
                <b>Country:</b>
             </td>
             <td style="width:30%;">
                <span id="phone-number"><?php echo $country; ?>
                <font color="green"> - 
                <?php
                $sqlbn = "SELECT branch FROM `tbl_newbranch` where id='$lid'";
                $resultbn = $conn->query($sqlbn);
                while($rowbn = $resultbn->fetch_assoc()){
                    $bn = $rowbn['branch'];
                }
                echo $bn;
                ?></font>
                </span>
            </div>
            </td>
            </tr>
            
             
            
			<tr>
			<td>
				<b>Phone Number:</b>
			</td>
			<td>
                <span id="Uk"><?php echo $phone; ?> - (<?php echo $sim; ?>)</span>
			</td>

			<td>
				<b>Service:</b>
			</td>
			<td>
                <span id="Study Visa"><?php echo $services; ?></span>
			</td>
			
				</tr>


				<tr>
			<td>
				<b>D.O.B:</b>
			</td>
			<td>
                <span id="dob">
                    <?php 
                    //echo $dob; 
                    $date23=date_create("$dob");
                    echo date_format($date23,"d/m/Y");
                    ?>
                </span>
			</td>
			<td>
			    <?php if($abc == 'show'){ ?>
				<b>Description:</b>
				<?php } ?>
            </td>
            <td>
                <?php if($abc == 'show'){ ?>
                <span id="des"><?php echo $description; ?></span>	
                <?php } ?>
			</td>
				</tr>
				
				
            </table>  
			<br>
			<h3>Bank Details</h3>
			
			<div class="Sahil1">
          <table class="table table-striped rmn" border="1">
           
                

        <tr>
            <th>S.no</th>
            <th>Account Holder</th>
            <th>Father</th>
			<th>Relation</th>
            <th>Customer Id</th>
			<th>Account No.</th>
			<th>Bank</th>
            <th>Balance</th>
			 <th></th>
			 

			
        </tr>
    
<?php
//$id= '';
$sql2 = "SELECT * FROM `tbl_addbank` WHERE `uid`='$id'";
$result2 = $conn->query($sql2);
$count = mysqli_num_rows($result2);
//echo $count;
if($count > 0){
$x=1;
while($row2 = $result2->fetch_assoc()){
	
	$an = $row2['accholdername'];
	$fn = $row2['fathername'];
	$r  = $row2['relation'];
	$ci = $row2['customerid'];
	$bn = $row2['bankaccnum'];
	$ba = $row2['bankname'];
	$bl = $row2['balance'];
	$pass = $row2['password'];
?>			
        <tr>
            <td><?php echo $x++; ?></td>
            <td><?php echo $an; ?></td>
            <td><?php echo $fn; ?></td>
			<td><?php echo $r;  ?></td>
            <td title="<?php echo $pass; ?>"><?php echo $ci; ?></td>
		    <td><?php echo $bn; ?></td>
		    <td><?php echo $ba; ?></td>
		    <td>₹<?php echo $bl; ?></td>
			
				<td>
					<a href="edit_bank.php?id=<?php echo $row2['id']; ?>&uid=<?php echo $_GET['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
					<!--
					<a href="delete_bank.php?id=<?php echo $row2['id']; ?>&uid=<?php echo $id;?>"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to Delete This Bank Account?')"><i class="fa fa-trash"></i></button></a> 
                    -->
</td>
       
			
        </tr>
<?php }}else{ ?>

		<tr>
			<td colspan="8" style="color:red;">
				Please Add Bank!!!
			</td>
		</tr>

<?php } ?>		
  
	
			</table>
            <br>
            <center>
			<a href="payment_transaction.php?id=<?php echo $id; ?>"><button type="button" name="btn" class="btn btn-success btn-sm">Transaction <i class="fa fa-money"></i></button></a> 
			</center>

		<br>
		 
		  <div class="Raman3">
		  <br>
		  <h3>Mini Statement</h3>
		  
         <table class="table table-striped rmn" border="1">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Amount</th>
					<th>Payment Options</th>
                    <th>My Account</th>
					                    <th>Other Account</th>
<th>Remarks</th>
                    <th colspan="2">Date/Time</th>
                </tr>
            </thead>
            <tbody>

<?php
$id= $_GET['id'];
$count2 = '';
include 'connection.php';
$sql2 = "SELECT * FROM `tbl_addbank` WHERE `uid`='$id'";
//echo $sql2;
$result2 = $conn->query($sql2);

while($row2 = $result2->fetch_assoc()){
	$bn = $row2['bankaccnum'];
?>
<?php
//$id= '';
$sql22 = "SELECT * FROM `tbl_transaction` WHERE (uid='$id' and user_from='$bn') or user_from='$bn' order by tid DESC";
$result22 = $conn->query($sql22);

$count23 = mysqli_num_rows($result22);
$count2 += $count23;
//echo $count2;
if($count2 > 0){

$x=1;
while($row22 = $result22->fetch_assoc()){
	
	$user_from = $row22['user_from'];
	$user_to = $row22['user_to'];
	$payment = $row22['payment'];
	$status = $row22['status'];
	$o = $row22['paymentoptions'];
	$remarks = $row22['remarks'];
	$date = $row22['date'];
	$time = $row22['time'];

	$date2=date_create("$date");
	
$sqln = "SELECT `accholdername` FROM `tbl_addbank` WHERE `bankaccnum`='$user_to'";
$resultn = $conn->query($sqln);
while($rown = $resultn->fetch_assoc()){
	$tn = $rown['accholdername'];
}
?>	
                <tr>
                    <td><?php echo $x++; ?></td>
                    <td>₹<?php echo $payment; ?> - <?php echo $status; ?></td>
					<td><?php echo $o; ?></td>
                    <td><?php echo $user_from; ?> </td>
					<td><?php echo $tn." - ".$user_to; ?></td>
					<td><?php echo $remarks; ?> </td>
				    <td><?php echo date_format($date2,"d/m/Y"); ?> - <?php echo $time; ?></td>
				    <td><a href="delete_tranaction.php?uid=<?php echo $id;?>&my=<?php echo $user_from; ?>&other=<?php echo $user_to; ?>&amount=<?php echo $payment; ?>&status=<?php echo $status; ?>&date=<?php echo $date; ?>&time=<?php echo $time; ?>"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to Reverse This Transaction and Refund?')" title="Reverse"><i class="fa fa-refresh"></i></button></a> 
					</td>
                </tr>
<?php }}} ?>
              
<?php if(($count2 == '0') or ($count2 == '')){ ?>

		<tr>
			<td colspan="8" style="color:red;">
				No Transaction
			</td>
		</tr>

<?php } ?>	

            </tbody>
        </table>
    </div>
</div>
</div>
	<br><br><br>	  
		 
</body>
</html>
    