<?php

$usrname=$_POST['Email1'];
$usrpwd=$_POST['Password1'];

require 'dbh.php';

$sql="SELECT id, email, pwd, utype FROM users WHERE email='$usrname'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if ($row==NULL){
	echo "<html></head>
<body>
<h>email not registered</h>
<meta http-equiv=\"refresh\" content=\"2;url=/index.html\"/>
</body>
</html>";
}
elseif ($row['pwd']!=$usrpwd) {
	echo "<html></head>
<body>
<h>wrong password</h>
<meta http-equiv=\"refresh\" content=\"2;url=/index.html\"/>
</body>
</html>";
}
elseif($row['pwd']==$usrpwd){

	if($row['utype']==1){

		session_start();
	$_SESSION['emailid']=$row['email'];
	$_SESSION['sid']=$row['id'];
	$_SESSION['utype']=$row['utype'];

	header("Location: ../panel.php");
	}
	elseif($row['utype']==2){

		session_start();
	$_SESSION['emailid']=$row['email'];
	$_SESSION['sid']=$row['id'];
	$_SESSION['utype']=$row['utype'];

	header("Location: ../managerpanel.php");
	}

	elseif($row['utype']==3){

		session_start();
	$_SESSION['emailid']=$row['email'];
	$_SESSION['sid']=$row['id'];
	$_SESSION['utype']=$row['utype'];

	header("Location: ../adminusertable.php");
	}

	
}
else{
	echo "<html></head>
<body>
<h>wrong password</h>
<meta http-equiv=\"refresh\" content=\"2;url=/student_database/index.html\"/>
</body>
</html>";
}
$email = $row['pwd'];





// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["pwd"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

mysqli_close($conn);