<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
//query for insert data into tables

// print "<pre>";
// print_r($_POST);
// print "</pre>";
// exit;

if($_POST["room_id"])
{
    $room_id = $_POST['room_id'];
    $room_date =$_POST['room_date'];
    $room_user =$_POST['room_user'];
    
    $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,'".trim($room_id)."',null,null)";
    
    
    $insert_bill = mysqli_query($con,$query_bill);
    $bill_id = mysqli_insert_id($con);
    
    $query_booking_room = "INSERT INTO `tb_orderroom`(`room_id`, `bill_id`, `room_date`, `customer_id`) VALUES ('".trim($room_id)."','".$bill_id."','".$room_date."','".$room_user."')";

    $insert_booking_room = mysqli_query($con,$query_booking_room);
    
    if ($insert_bill && $insert_booking_room){
        echo 1;
    }
}
mysqli_close($con);

?>