<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$ctmid = "";

if(!empty($_GET["id"]))
{
$ctmid = $_GET["id"];        
$query = "DELETE FROM `tb_customer` WHERE  `customer_id` = ".$ctmid." ";

 
 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: customer.php");
  exit();
  }
}else{
  header("Location: customer.php");
  exit();
}


?>

