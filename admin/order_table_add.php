<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
//query for insert data into tables

// print "<pre>";
// print_r($_POST);
// print "</pre>";
// exit;

if($_POST["table_id"])
{
    $table_id = $_POST['table_id'];
    $table_date =$_POST['table_date'];
    $table_user =$_POST['table_user'];
    
    $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,null,'".trim($table_id)."',null)";
    
    
    $insert_bill = mysqli_query($con,$query_bill);
    $bill_id = mysqli_insert_id($con);
    
    $query_booking_table = "INSERT INTO `tb_ordertable`(`table_id`, `bill_id`, `table_date`, `customer_id`) VALUES ('".trim($table_id)."','".$bill_id."','".$table_date."','".$table_user."')";

    $insert_booking_table = mysqli_query($con,$query_booking_table);
    
    if ($insert_bill && $insert_booking_table){
        echo 1;
    }
}
mysqli_close($con);

?>