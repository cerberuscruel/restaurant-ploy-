<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

// print_r($_GET);
// echo "<br>";

$bill_id = "";
$room_id = "";
$table_id = "";

if(!empty($_GET["id"]))
{
    if(!empty($_GET["tableroom"] == "room" )){
        if(!empty($_GET["idroom"])){
            $bill_id = $_GET["id"];
            
            $query_delete_order = "DELETE FROM `tb_order` WHERE `bill_id` = ".$bill_id." ";
            $query_delete_bill = "DELETE FROM `tb_bill` WHERE `bill_id` = ".$bill_id." ";
            $query_delete_orderroom = "DELETE FROM `tb_orderroom` WHERE `bill_id` = ".$bill_id." ";
            
            $rs1 = mysqli_query($con,$query_delete_order);
            $rs2 = mysqli_query($con,$query_delete_bill);
            $rs3 = mysqli_query($con,$query_delete_orderroom);
            
            if ($rs1 && $rs2 && $rs3){
                echo "<script type='text/javascript'> //not showing me this
                alert('ลบข้อมูลสำเร็จแล้ว :) ');
                window.location.replace(\"order.php\");
                </script>";
                exit();
            }
        }
    }else if(!empty($_GET["tableroom"] == "table" )){
        if(!empty($_GET["idtable"])){
            $bill_id = $_GET["id"];
            
            $query_delete_order = "DELETE FROM `tb_order` WHERE `bill_id` = ".$bill_id." ";
            $query_delete_bill = "DELETE FROM `tb_bill` WHERE `bill_id` = ".$bill_id." ";
            $query_delete_ordertable = "DELETE FROM `tb_ordertable` WHERE `bill_id` = ".$bill_id." ";
            
            $rs1 = mysqli_query($con,$query_delete_order);
            $rs2 = mysqli_query($con,$query_delete_bill);
            $rs3 = mysqli_query($con,$query_delete_ordertable);
            
            if ($rs1 && $rs2 && $rs3){
                echo "<script type='text/javascript'> //not showing me this
                alert('ลบข้อมูลสำเร็จแล้ว :) ');
                window.location.replace(\"order.php\");
                </script>";
                exit();
            }
        }
    }
}else{
    echo "<script type='text/javascript'> //not showing me this
    alert('ลบข้อมูลไม่สำเร็จ :) ');
    window.location.replace(\"order.php\");
    </script>";
    exit();
}






?>