<?php
session_start();
include "connectDB/connectdata.php";
$query_insert = "";
$message = 'สั่งอาหารเรียบร้อย.';
$originalDate = $_SESSION['booking_date'];
$Date = date("d-m-Y", strtotime($originalDate));
// echo $Date;
// echo "<script type='text/javascript'>alert('จ้าาาาสา');</script>";

if(isset($_POST["submit-form"]))
{
    if(isset($_SESSION["shopping_cart"]) && !empty($_SESSION["shopping_cart"])) {
        // exit;
        $total=0;
        
        if(isset($_SESSION['booking'])){
            if($_SESSION['booking'] == "table"){  // ถ้าการจอง เลือกเป็นโต๊ะ
                
                
                $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,null,'".$_SESSION['table&room']."',null)";
                
                $insert_bill = mysqli_query($con,$query_bill);
                $bill_id = mysqli_insert_id($con);
                
                $query_booking_table = "INSERT INTO `tb_ordertable`(`table_id`, `bill_id`, `table_date`, `customer_id`) VALUES ('".$_SESSION['table&room']."','".$bill_id."','".$_SESSION['booking_date']."','".$_SESSION["UserID"]."')";
                
                $insert_booking_table = mysqli_query($con,$query_booking_table);
                
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    
                    $query = "INSERT INTO `tb_order`(`order_id`, `bill_id`, `menu_id`, `order_num`, `order_status`, `order_date`, `customer_id`, `table_id`, `room_id`)
                    VALUES (null,'".$bill_id."','".$value['item_id']."','".$value['item_quantity']."',1,'".$_SESSION['booking_date']."','".$_SESSION["UserID"]."','".$_SESSION['table&room']."',null)";
                    
                    $retval=mysqli_query($con,$query);
                }
                
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    
                    $query_update_raw = "UPDATE tb_raw JOIN tb_weaver ON tb_weaver.raw_id = tb_raw.raw_id JOIN tb_order ON tb_order.menu_id = tb_weaver.menu_id SET tb_raw.raw_amount = tb_raw.raw_amount - tb_weaver.weaver_num * (SELECT order_num FROM `tb_order` WHERE tb_order.bill_id = '".$bill_id."' AND menu_id = '".$value['item_id']."' ) WHERE tb_weaver.menu_id = '".$value['item_id']."'";
                    
                    $update_raw = mysqli_query($con,$query_update_raw);
                }
                
                if ($retval){
                    unset($_SESSION['booking']);
                    unset($_SESSION['table&room']);
                    unset($_SESSION['des']);
                    unset($_SESSION["shopping_cart"]);
                    echo "<SCRIPT type='text/javascript'> //not showing me this
                    alert('$message');
                    window.location.replace(\"view_order.php\");
                    </SCRIPT>";
                }else{
                    echo "<script type='text/javascript'>alert('ไม่สำเร็จโต๊ะ ! ');</script>";
                }
                
                
                
            }else{  // ถ้าการจอง เลือกเป็นห้อง
                
                $query_bill = "INSERT INTO `tb_bill`(`bill_id`, `bill_date`, `room_id`, `table_id`, `employee_id`) VALUES (null,null,'".$_SESSION['table&room']."',null,null)";
                
                $insert_bill = mysqli_query($con,$query_bill);
                $bill_id = mysqli_insert_id($con);
                
                $query_booking_room = "INSERT INTO `tb_orderroom`(`room_id`, `bill_id`, `room_date`, `customer_id`) VALUES ('".$_SESSION['table&room']."','".$bill_id."','".$_SESSION['booking_date']."','".$_SESSION["UserID"]."')";
                
                $insert_booking_room = mysqli_query($con,$query_booking_room);
                
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    $query = "INSERT INTO `tb_order`(`order_id`, `bill_id`, `menu_id`, `order_num`, `order_status`, `order_date`, `customer_id`, `table_id`, `room_id`)
                    VALUES (null,'".$bill_id."','".$value['item_id']."','".$value['item_quantity']."',1,'".$_SESSION['booking_date']."','".$_SESSION["UserID"]."',null,'".$_SESSION['table&room']."')";
                    
                    $retval=mysqli_query($con,$query);
                }
                
                foreach ($_SESSION['shopping_cart'] as $key => $value) {
                    
                    $query_update_raw = "UPDATE tb_raw JOIN tb_weaver ON tb_weaver.raw_id = tb_raw.raw_id JOIN tb_order ON tb_order.menu_id = tb_weaver.menu_id SET tb_raw.raw_amount = tb_raw.raw_amount - tb_weaver.weaver_num * (SELECT order_num FROM `tb_order` WHERE tb_order.bill_id = '".$bill_id."' AND menu_id = '".$value['item_id']."' ) WHERE tb_weaver.menu_id = '".$value['item_id']."'";
                    
                    $update_raw = mysqli_query($con,$query_update_raw);
                }
                
                
                if ($retval){
                    unset($_SESSION['booking']);
                    unset($_SESSION['table&room']);
                    unset($_SESSION['des']);
                    unset($_SESSION["shopping_cart"]);
                    echo "<SCRIPT type='text/javascript'> //not showing me this
                    alert('$message');
                    window.location.replace(\"view_order.php\");
                    </SCRIPT>";
                }else{
                    echo "<script type='text/javascript'>alert('ไม่สำเร็จห้อง ! ');</script>";
                }
            }
        }
        
        exit;
        
        
    }else{
        echo "<script type='text/javascript'>alert('โปรดจองโต๊ะและเลือกอาหารก่อนค่ะ ! ');</script>";
    }
}else{
    echo "<center><h1>404 Not Found.</h1></center>";
}


?>