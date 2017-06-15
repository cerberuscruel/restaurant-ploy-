<?php

error_reporting(E_ALL);
require '../connectDB/connectdata.php';

//    //query for insert data into tables
$j = file_get_contents('php://input');
// exit;
if($_POST["no_menu"])
{
    $no = $_POST['no_menu'];
    $name =$_POST['name_menu'];
    $price =$_POST['price_menu'];
    $cate = $_POST['cate_menu'];
    $des =$_POST['des_menu'];
    
    if(!empty($_POST['pic_menu'])){
        $pic = $_POST['pic_menu'];
        
        $query = "INSERT INTO `tb_menu`(`menu_id`, `menu_name`, `menu_price`, `menu_category`, `menu_picture`, `menu_des`) VALUES ('".$no."','".$name."','".$price."','".$cate."','".$pic."','".$des."')";
        
        $retval=mysqli_query($con,$query);
        if ($retval){
            echo "<script type='text/javascript'>";
            echo "alert('เพิ่มข้อมูลสำเร็จแล้ว');";
            echo "window.location = 'menu.php'; ";
            echo "</script>";
            exit;
        }
    }else{
        $query = "INSERT INTO `tb_menu`(`menu_id`, `menu_name`, `menu_price`, `menu_category`, `menu_des`) VALUES ('".$no."','".$name."','".$price."','".$cate."','".$des."')";
        
        $retval=mysqli_query($con,$query);
        if ($retval){
            echo "<script type='text/javascript'>";
            echo "alert('เพิ่มข้อมูลสำเร็จแล้ว');";
            echo "window.location = 'menu.php'; ";
            echo "</script>";
            exit;
        }
    }
}

mysqli_close($con);

?>