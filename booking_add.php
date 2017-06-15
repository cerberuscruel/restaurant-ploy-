<?php
session_start();
include "connectDB/connectdata.php";

if(isset($_GET)){
    if($_GET['booking'] == "table"){  // ถ้าการจอง เลือกเป็นโต๊ะ
        
        $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,null,'".$_GET['id']."',null)";
        
        $insert_bill = mysqli_query($con,$query_bill);
        $bill_id = mysqli_insert_id($con);
        
        $query_booking_table = "INSERT INTO `tb_ordertable`(`table_id`, `bill_id`, `table_date`, `customer_id`) VALUES ('".$_GET['id']."','".$bill_id."','".$_GET['booking_date']."','".$_SESSION["UserID"]."')";
        
        $insert_booking_table = mysqli_query($con,$query_booking_table);
        
        if ($insert_booking_table){
            echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('ทำการจองโต๊ะเสร็จสิ้น');
            window.location.replace(\"view_tableorroom.php\");
            </SCRIPT>";
        }else{
            echo "<script type='text/javascript'>alert('ไม่สำเร็จ ! ');</script>";
        }
    }else{  // ถ้าการจอง เลือกเป็นห้อง
        
        $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,'".$_GET['id']."',null,null)";
        
        $insert_bill = mysqli_query($con,$query_bill);
        $bill_id = mysqli_insert_id($con);
        
        $query_booking_room = "INSERT INTO `tb_orderroom`(`room_id`, `bill_id`, `room_date`, `customer_id`) VALUES ('".$_GET['id']."','".$bill_id."','".$_GET['booking_date']."','".$_SESSION["UserID"]."')";
        
        $insert_booking_room = mysqli_query($con,$query_booking_room);
        
        if ($insert_booking_room){
            unset($_SESSION['booking']);
            unset($_GET['']);
            unset($_SESSION['des']);
            unset($_SESSION["shopping_cart"]);
            echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('ทำการจองห้องเสร็จสิ้น');
            window.location.replace(\"view_tableorroom.php\");
            </SCRIPT>";
        }else{
            echo "<script type='text/javascript'>alert('ไม่สำเร็จ ! ');</script>";
        }
    }
}




exit;

?>