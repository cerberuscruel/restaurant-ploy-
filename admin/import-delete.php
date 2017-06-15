<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$bill_import_id = "";

if(!empty($_GET["id"]))
{
    $bill_import_id = $_GET["id"];
    $query_bill_import = "DELETE FROM `tb_bill_import` WHERE `bill_import_id` = '".$bill_import_id."'";
    $query_import = "DELETE FROM `tb_import` WHERE `bill_import_id` = '".$bill_import_id."'";
    
    $del_bill_import = mysqli_query($con,$query_bill_import);
    $del_import = mysqli_query($con,$query_import);
    if ($del_bill_import && del_import){
        header("Location: import.php");
        exit();
    }
}else{
    header("Location: import.php");
    exit();
}


?>