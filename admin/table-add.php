<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
   //query for insert data into tables

 if($_POST["no_table"])
   {
   $no = $_POST['no_table'];
   $status =$_POST['status_table'];
   $des =$_POST['des_table'];

$query = "INSERT INTO `tb_table`(`table_id`, `table_status`, `table_des`) VALUES ('$no','$status','$des')";
       
         $retval=mysqli_query($con,$query);
  if ($retval){ 
  echo 1;
  
  }
}
   mysqli_close($con);

?>