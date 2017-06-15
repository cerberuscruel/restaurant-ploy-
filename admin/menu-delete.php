<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$menuid = "";

if(!empty($_GET["id"]))
{
$menuid = $_GET["id"];        
$query = "DELETE FROM `tb_menu` WHERE  menu_id = '".$menuid."' ";

 $retval=mysqli_query($con,$query);
  if ($retval){ 
  header("Location: menu.php");
  exit();
  }
}else{
  header("Location: menu.php");
  exit();
}


?>

