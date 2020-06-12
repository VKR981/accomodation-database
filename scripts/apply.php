<?php
session_start();
$clgid=$_POST['id'];

echo $clgid;
require 'dbh.php';

$sid=$_SESSION['sid'];

if($clgid==NULL||$clgid==0)
{
	echo "Please select a colloge";
	header("Location: ../panel.php");
}
else{
	$sql="UPDATE users SET cid = '$clgid',status=0 WHERE id = '$sid'";
}


if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully";

	header("Location: ../panel.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

