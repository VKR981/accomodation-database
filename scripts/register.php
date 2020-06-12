<!DOCTYPE html>
<html>
<head>
	<?php

if(isset($_POST['register'])){


require 'dbh.php';

$usrname=$_POST['Email1'];
$usrpwd=$_POST['Password1'];
$usrfname=$_POST['fname'];

$sql= "INSERT INTO users (email,pwd,fname) VALUES (?,?,?)";
$stmt=mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,'sss',$usrname,$usrpwd,$usrfname);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);


}
else{echo "error";}


?>
	<title></title>
</head>
<body>
<h>Registeration Succesful</h>
<meta http-equiv="refresh" content="2;url=/student_database/index.html"/>
</body>
</html>

