<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
//query for insert data into tables

if($_POST["no_room"])
{
    $nroom = $_POST['no_room'];
    $droom =$_POST['des_room'];
    $proom =$_POST['price_room'];
    $sroom =$_POST['room_status'];
    
    $query = "INSERT INTO `tb_room`(`room_id`, `room_price`, `room_des`, `room_status`) VALUES ('$nroom','$proom','$droom','$sroom')";
    
    $retval=mysqli_query($con,$query);
    if ($retval){
        echo 1;
        
    }
}
mysqli_close($con);

?>