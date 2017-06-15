<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$bill_id = "";

if(!empty($_GET["id"]))
{
    $bill_id = $_GET["id"];
    
    $query_delete_order = "DELETE FROM `tb_order` WHERE `bill_id` = ".trim($bill_id)." ";
    $query_delete_bill = "DELETE FROM `tb_bill` WHERE `bill_id` = ".trim($bill_id)." ";
    $query_delete_orderroom = "DELETE FROM `tb_orderroom` WHERE `bill_id` = ".trim($bill_id)." ";
    
    $rs2 = mysqli_query($con,$query_delete_bill);
    $rs3 = mysqli_query($con,$query_delete_orderroom);
    
    
    $query_check_order =  "SELECT bill_id FROM `tb_order` WHERE bill_id = '".trim($bill_id)."' ";
    
    $select_check_order = mysqli_query($con,$query_check_order);
    
    if(mysqli_num_rows($select_check_order) != 0){
        $rs1 = mysqli_query($con,$query_delete_order);
        // echo $query_delete_order ;
        // exit;
    }
    
    if ($rs2 && $rs3 || $rs1 && $rs2 && $rs3){
        echo "<script type='text/javascript'> //not showing me this
        alert('ลบข้อมูลสำเร็จแล้ว :) ');
        window.location.replace(\"order_room.php\");
        </script>";
        exit();
    }
}else{
    echo "<script type='text/javascript'> //not showing me this
    alert('ลบข้อมูลไม่สำเร็จแล้ว :) ');
    window.location.replace(\"order_room.php\");
    </script>";
    exit();
}


?>