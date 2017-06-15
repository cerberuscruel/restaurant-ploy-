<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
//query for insert data into tables

if(isset($_POST)){
    print_r($_POST);
    exit;
}

if(isset($_POST["menu_id"]))
{
    $bill_id =$_POST['bill_id'];
    $member_id =$_POST['member_id'];
    $radio_booking = $_POST['radio'];
    $number_booking = $_POST['number'];
    
    if($radio_booking == 1){ // เพิมข้อมูลลง เลือกเป็นห้อง
        foreach ($_POST["menu_id"] as $key => $value) {
            
            $value = trim($value);
            
            $query = "INSERT INTO `tb_order`(`order_id`, `bill_id`, `menu_id`, `order_num`, `order_status`, `order_date`, `customer_id`, `table_id`, `room_id`)
            VALUES (null,'".$bill_id."','".$value."',1,1,NOW(),'".$member_id."',null,'".$number_booking."')";
            
            print_r($query);
            exit;
            
            $retval=mysqli_query($con,$query);
            if ($retval){
                echo 1;
                
            }
        }
        
    }else if($radio_booking == 2){  // เพิ่มข้อมูล เลือกเป็นโต๊ะ
        
        foreach ($_POST['menu_id'] as $key => $value) {
            
            $value = trim($value);
            
            $query = "INSERT INTO `tb_order`(`order_id`, `bill_id`, `menu_id`, `order_num`, `order_status`, `order_date`, `customer_id`, `table_id`, `room_id`)
            VALUES (null,'".$bill_id."','".$value."',1,1,NOW(),'".$member_id."','".$number_booking."',null)";
            
            print_r($query);
            exit;
            
            $retval=mysqli_query($con,$query);
            if ($retval){
                echo 1;
                
            }
        }
    }
    
}

mysqli_close($con);

?>