<?php

session_start();
$id=$_GET['edit'];
require 'dbh.php';

$sql="SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</head>
<body>
	<div class="d-flex align-items-center flex-column" width:500px>
	
<form class="" action="" method="post">

  <div class="form-group">
  	<h1 class="h3 mb-3 font-weight-normal">Edit Data</h1>
  	<label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control shadow-sm" name="fname" aria-describedby="emailHelp" value="<?php echo $row['fname'] ?>">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control shadow-sm" name="Email" aria-describedby="emailHelp" value="<?php echo $row['email'] ?>">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" class="form-control shadow-sm" name="pwd" aria-describedby="emailHelp" value="<?php echo $row['pwd'] ?>">
    <label for="exampleInputEmail1">CollegeID</label>
    <input type="text" class="form-control shadow-sm" name="cid" aria-describedby="emailHelp" value="<?php echo $row['cid'] ?>">
    <label for="exampleInputEmail1">Usertype</label>
    <input type="text" class="form-control shadow-sm" name="utype" aria-describedby="emailHelp" value="<?php echo $row['utype'] ?>">
    <label for="exampleInputEmail1">Status</label>
    <input type="text" class="form-control shadow-sm" name="status" aria-describedby="emailHelp" value="<?php echo $row['status'] ?>">
  </div>

  
  
  <button type="submit" class="btn btn-primary shadow" name='update'>Update</button>
  
 

</form>
	

</div>

<?php
      
        if(isset($_POST['update'])) { 

        $email=$_POST['Email'];
        $pwd=$_POST['pwd'];
        $cid=$_POST['cid'];
        $utype=$_POST['utype'];
        $status=$_POST['status'];
        $fname=$_POST['fname'];

            $sql="UPDATE users SET email='$email', pwd='$pwd',cid='$cid',utype='$utype',status='$status',fname='$fname' WHERE id='$id'";

            $result = mysqli_query($conn, $sql);

            header("location:../adminusertable.php");
        } 
        
    ?> 

</body>
</html>