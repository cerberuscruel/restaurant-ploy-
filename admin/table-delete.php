<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$tableid = "";

if(!empty($_GET["id"]))
{
$tableid = $_GET["id"];        
$query = "DELETE FROM `tb_table` WHERE  table_id = ".$tableid." ";
 
 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: table.php");
  exit();
  }
}else{
  header("Location: table.php");
  exit();
}


?>

