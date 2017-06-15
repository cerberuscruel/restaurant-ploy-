<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
   //query for insert data into tables


 if(!empty($_POST["raw_name"]))
   {
   $raw_name = $_POST['raw_name'];
   $raw_price = $_POST['raw_price'];
   $raw_amount = $_POST['raw_amount'];
   $raw_unit = $_POST['raw_unit'];

  $query = "INSERT INTO `tb_raw`(`raw_id`, `raw_name`, `raw_date`,`raw_amount`,`raw_price`,`raw_unit`) VALUES ('','$raw_name',NOW(),'$raw_amount','$raw_price','$raw_unit')";

  $retval=mysqli_query($con,$query);
    if ($retval){ 
    echo 1;
    }
  }
   mysqli_close($con);

?>