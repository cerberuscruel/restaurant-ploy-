<?php
session_start();
error_reporting(E_ALL);
include '../connectDB/connectdata.php';
//query for insert data into tables

// print_r($_POST);
// exit;

if(isset($_POST["raw_id"]))
{
    $raw_id = $_POST['raw_id'];
    $import_date =$_POST['import_date'];
    $import_price =$_POST['import_price'];
    $import_amount =$_POST['import_amount'];
    $import_unit =$_POST['import_unit'];
    $import_source =$_POST['import_source'];
    
    $query_bill_import = "INSERT INTO `tb_bill_import`(`bill_import_id`, `employee_id`, `bill_import_source`, `bill_import_date`, `import_price`, `import_unit`)
    VALUES (null,'".$_SESSION['adminID']."','".$import_source."','".$import_date."','".$import_price."','".$import_unit."')"; // tb_bill_import
    
    $insert_bill_import = mysqli_query($con,$query_bill_import);
    $bill_import_id = mysqli_insert_id($con);
    
    $query_import = "INSERT INTO `tb_import`(`import_id`, `bill_import_id`, `raw_id`, `import_amount`) VALUES (null,'".$bill_import_id."','".$raw_id."','".$import_amount."')"; // tb_import
    
    
    $insert_import = mysqli_query($con,$query_import);
    
    $query_update_raw = "UPDATE `tb_raw` SET `raw_amount`= `raw_amount` + '".$import_amount."'  WHERE `raw_id`= '".$raw_id."' ";
    
    $insert_update_raw = mysqli_query($con,$query_update_raw);
    if ($insert_import && $insert_bill_import && $insert_update_raw){
        // echo $query_import . "<br>" . $query_bill_import . "<br>" . $query_update_raw;
        echo 1;
        // exit;
        
    }
}
mysqli_close($con);

?>