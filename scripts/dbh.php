<?php

$server="localhost";
$DBU="root";
$pwd="";
$DBname="users";

$conn=mysqli_connect($server,$DBU,$pwd,$DBname);

if(!$conn){
	echo "database connection failed";
}