<?php

$local = "localhost";
$user = "root";
$pass = "bestjungbei017253282::";
$db = "restaurant";

$con =  mysqli_connect($local,$user,$pass,$db);
mysqli_set_charset( $con, 'utf8');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else
?>

