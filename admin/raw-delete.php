<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$rid = "";

if(!empty($_GET["id"]))
{
$rid = $_GET["id"];        
$query = "DELETE FROM `tb_raw` WHERE  raw_id = ".$rid." ";
 
 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: raw.php");
  exit();
  }
}else{
  header("Location: raw.php");
  exit();
}


?>

