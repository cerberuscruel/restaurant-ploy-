<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
   //query for insert data into tables

 if($_POST["Fullname"])
   {
   $NAME = $_POST['Fullname'];
   $Address =$_POST['Address'];
   $Phone =$_POST['Phone'];
   $Username =$_POST['Username'];
   $Passwords =$_POST['Passwords'];

$query = "INSERT INTO `tb_employee` 
         (`employee_id`, `employee_user`, `employee_pass`, `employee_name`, `employee_phone`, `employee_address`)
         VALUES
         ('','$Username','$Passwords','$NAME','$Phone','$Address')";
       
         $retval=mysqli_query($con,$query);
  if ($retval){ 
  echo 1;
  
  }
}
   mysqli_close($con);

?>