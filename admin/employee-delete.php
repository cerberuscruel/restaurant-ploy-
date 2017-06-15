<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$epyid = "";

if(!empty($_GET["id"]))
{
$epyid = $_GET["id"];        
$query = "DELETE FROM `tb_employee` WHERE  employee_id = ".$epyid." ";
 
 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: employee.php");
  exit();
  }
}else{
  header("Location: employee.php");
  exit();
}


?>

