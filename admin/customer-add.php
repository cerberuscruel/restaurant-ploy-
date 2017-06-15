<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
   //query for insert data into tables

 if($_POST["cid"])
   {
   $id = $_POST['cid'];
   $NAME = $_POST['Fullname'];
   $Address =$_POST['Address'];
   $email = $_POST['Email'];
   $Phone =$_POST['Phone'];
   $Username =$_POST['Username'];
   $Passwords =$_POST['Passwords'];

$query = "INSERT INTO `tb_customer`(`customer_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `customer_user`, `customer_pass`) VALUES ('$id','$NAME','$Address','$email','$Phone','$Username','$Passwords')";
       
  $retval=mysqli_query($con,$query);
  if ($retval){ 
  echo 1;
  
  }
}
   mysqli_close($con);

?>