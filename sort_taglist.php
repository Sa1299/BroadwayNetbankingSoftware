<?php
error_reporting(0);

//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Tag List - Broadway Immigration</title>
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
        Sorting Tag List</font>
    <a href="taglist.php" class="btn btn-danger btn-sm" style="float:right;margin-right:120px;">Back</a>
    </h2>
    <div class="container">

        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
        <form action="" method="post" style="text-align:center;padding:10px;">
            <center>
            <table width="20%"><tr>
                <td>
         <select name="sort" class="form-control" style="padding:8px;" required>
<?php
if(isset($_POST['btn'])){
  $sort = $_POST['sort'];
  //echo $sort;
}
if($sort != ''){
?>
<option value="<?php echo $sort; ?>"><?php echo $sort; ?></option>
<?php } ?>
<option value="Ascending">Ascending  </option>
<option value="Descending">Descending  </option>

             </select>
             </td>
             
             <td>&nbsp;</td>
             <td><button type="submit" name="btn" class="btn btn-primary">Submit</button></td>
            
            </tr></table>
            </center>
        </form>
       
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
      <th>Tag</th>

      
        </tr>
    
<?php
//$id= '';
include 'connection.php';
if(isset($_POST['btn'])){
  $sort = $_POST['sort'];
  //echo $sort;
}
  if($sort == 'Ascending'){
    $sql2 = "SELECT * FROM `tbl_addbank` ORDER BY CAST(`balance` AS DECIMAL) ASC";
  }else{
    $sql2 = "SELECT * FROM `tbl_addbank` ORDER BY CAST(`balance` AS DECIMAL) DESC";
  }
//echo $sql2;
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
  $tg = $row2['tag'];
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
      <?php
      //echo $tg; 
      if($tg != ''){
      include 'connection.php';
      $sql23 = "SELECT * FROM `tbl_tag` where id='$tg'";
      $result23 = $conn->query($sql23);
      while($row23 = $result23->fetch_assoc()){
        $tn = $row23['tag_name'];
      }
      ?>
      <i class="fa fa-tag" aria-hidden="true" style="color:red;"></i>
      <?php
      echo $tn;
      }
      ?></td>
      
      

        </tr>
<?php }}else{ ?>

    <tr>
      <td colspan="8" style="color:red;">
        Please Add Accounts !!!
      </td>
    </tr>

<?php } ?>    
  
  
      </table>
 
            </div>
            </div>
            </div>
          </body>
</html>
























