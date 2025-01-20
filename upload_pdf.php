<?php
//include 'check_login.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>PDF Upload - Broadway Immigration</title>
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
                <?php
                $abc = $_GET['detail'];
                if($abc != ''){
                    $content = 'hide';
                }
                if(($abc == '') or ($abc == 'hide')){
                    $content = 'show';
                }
                ?>
    <h2 style="text-align:left;"><font style="margin-left:120px;color:black;">
        <a href="upload_pdf.php?id=<?php echo $_GET['id']; ?>&detail=<?php echo $content; ?>" style="color:black;text-decoration:none;">U</a>pload Compressed PDF</font>
    <a href="Userprofile.php?id=<?php echo $_GET['id']; ?>" class="btn btn-danger btn-sm" style="float:right;margin-right:120px;">Back</a>
    </h2>
    <div class="container">
        <?php
        $msg = $_GET['msg'];
        if($msg == 'insert'){
        ?>
        <center><font color="green">Successfully Add New PDF!!</font></center>
        <?php } ?>
        <div style="width:100%;height:2px;background-color: #367fa9;"></div>
        <div style="background-color: #fff;padding: 10px;">
        <form action="upload.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data" style="text-align:center;padding:10px;">

            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
            <br>

                <button type="submit" value="Upload Image" name="submit" class="btn btn-primary">Upload PDF</button>
        </form>

<?php if($abc == 'show'){ ?>        
<table class="table table-striped rmn" border="1">
    <tr>
        <th>S.no</th>
        <th>PDF</th>
        <th>Date</th>
    </tr>
<?php 
include 'connection.php';
$uid = $_GET['id'];
$sql = "SELECT * FROM `tbl_upload` where uid='$uid'";
$result = $conn->query($sql);
$x=1;
while($row = $result->fetch_assoc()){
?>
    <tr>
        <td><?php echo $x++; ?></td>
        <td>
            <iframe name="file" id="file" src="uploads/<?php echo $row['file']; ?>" style="height:600px;width:100%;"></iframe>
        </td>
        <td><?php 
        $d = $row['date']; 
        $date23=date_create("$d");
        echo date_format($date23,"d/m/Y");
        ?></td>
    </tr>
<?php } ?>
</table>
<?php } ?>   
            </div>
            </div>
            </div>
            <br><br><br>
          </body>
</html>


















