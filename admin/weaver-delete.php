<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$weaverid = "";

if(!empty($_GET["id"]))
{
$weaverid = $_GET["id"];        
$query = "DELETE FROM `tb_weaver` WHERE  weaver_id = ".$weaverid." ";
 
 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: weaver.php");
  exit();
  }
}else{
  header("Location: weaver.php");
  exit();
}


?>

