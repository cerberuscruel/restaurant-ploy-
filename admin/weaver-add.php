<?php

error_reporting(E_ALL);
require '../connectDB/connectdata.php';


 if(!empty($_POST["raw_id"]))
   {
   $raw_id = $_POST['raw_id'];
   $menu_id =$_POST['menu_id'];
   $weaver_num =$_POST['weaver_num'];
   $weaver_unit = $_POST['weaver_unit'];

$query = "INSERT INTO `tb_weaver`(`weaver_id`, `raw_id`, `menu_id`, `weaver_num`, `weaver_unit`) VALUES ('','".$raw_id."','".$menu_id."','".$weaver_num."','".$weaver_unit."')";
       
  $retval=mysqli_query($con,$query);
  if ($retval){ 
  echo 1;
  
  }
}
   mysqli_close($con);

?>