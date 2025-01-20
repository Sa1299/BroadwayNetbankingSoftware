<?php
error_reporting(0);
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>View User - Broadway Immigration</title>
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
  <br>
  <h2 style="text-align:left;"><font style="margin-left:20px;">View User</font>
                <?php
                $abc = $_GET['detail'];
                if($abc != ''){
                    $content = 'hide';
                }
                if(($abc == '') or ($abc == 'hide')){
                    $content = 'show';
                }
                ?>
  <?php
    include 'connection.php';
    if($abc == 'show'){
    $sql23 = "SELECT balance FROM `tbl_addbank`";
    $result23 = $conn->query($sql23);
    while($row23 = $result23->fetch_assoc()){
        $bal = $row23['balance'];
        $tbal += $bal;
    }
  ?>
  <div style="font-size:24px;float:right;margin-right:50px;">
  <b>Total - </b><font color="red">₹<?php echo $tbal; ?></font>
  </div>
  <?php }else{ ?>
    <a href="taglist.php" class="btn btn-danger btn-sm" style="float:right;margin-right:50px;">Tag-list</a>
  <?php } ?>
  </h2>
  
		   <div class="container-fluid">
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
          <table class="table table-striped" border="1" >
       
            <tr>
                <th><a href="viewu.php?detail=<?php echo $content; ?>" style="color:black;text-decoration:none;">S</a>.no</th>
                <th>Name</th>
                <th>Phone</th>
				        <th>Sim No.</th>
                <th>Country</th>
                <th>Service</th>
                <th>Branch</th>
                <th>D.O.B</th>
                <?php
                if($abc == 'show'){
                ?>
				<th>Description</th>
				<?php } ?>
                <th>Action</th>
            </tr>
		
<?php
$sql2 = "SELECT * FROM `tbl_client` where closing=''";
$result2 = $conn->query($sql2);
$x = 1;
while($row2 = $result2->fetch_assoc()){
?>
        <tr>
                <td><?php echo $x++; ?></td>
                <td>
                  <a href="Userprofile.php?id=<?php echo $row2['uid']; ?>"><?php echo $row2['name']; ?></a>
                </td>
                <td><?php echo $row2['phone']; ?></td>
				<td><?php echo $row2['sim']; ?></td>
				 <td><?php echo $row2['country']; ?></td>
				  <td><?php echo $row2['services']; ?></td>
				  <td>
				      <?php 
				      $lid='';
				      $bn='';
				      $lid = $row2['l_id']; 
				      $sqlbn = "SELECT branch FROM `tbl_newbranch` where id='$lid'";
                      $resultbn = $conn->query($sqlbn);
                      while($rowbn = $resultbn->fetch_assoc()){
                        $bn = $rowbn['branch'];
                      }
                        echo $bn;
				      ?>
				  </td>
				  <td>
				      <?php 
				      $dob = $row2['dob'];
				      $date23=date_create("$dob");
                        echo date_format($date23,"d/m/Y");
				      ?>
				 </td>
				 <?php if($abc == 'show'){ ?>
				   <td><?php echo $row2['description']; ?></td>
                <?php } ?>
                <td>
                <a href="edit.php?id=<?php echo $row2['uid']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
								&nbsp;
                <!--
				<a href="delete.php?id=<?php echo $row2['uid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to Delete This Client?')"><i class="fa fa-trash"></i></a>
           &nbsp;-->
            <a href="close.php?id=<?php echo $row2['uid']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to Close This Client Case?')">Close</a>
          </td>
        </tr>
<?php } ?>	
    </table>
  </div>
	</div>
</body>
</html>