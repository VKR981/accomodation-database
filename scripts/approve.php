<?php
session_start();
$emailid=$_POST['id'];


require 'dbh.php';

$sid=$_SESSION['sid'];
//echo $clgid;




$sql="SELECT cid, status FROM users WHERE email = '$emailid'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$clgid=$row['cid'];


if($row['status']!=1){

$sql="UPDATE cnames SET seats = seats-1 WHERE id = '$clgid'";
$result2 = mysqli_query($conn, $sql);

$sql="UPDATE users SET status = 1 WHERE email = '$emailid'";
mysqli_query($conn, $sql);

}



if ($result) {
  //echo "Record updated successfully";

	header("Location: ../managerpanel.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>