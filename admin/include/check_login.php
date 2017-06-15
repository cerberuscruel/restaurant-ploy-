<?php
error_reporting(E_ALL);
ob_start();
session_start();
if(isset($_REQUEST['Username'])){
    //connection
    include("../../connectDB/connectdata.php");
    //รับค่า user & password
    $Username = $_REQUEST['Username'];
    $Password = $_REQUEST['Password'];
    
    //    $Password = md5($_REQUEST['Password']);
    
    //query
    $sql="SELECT * FROM `tb_employee` WHERE `employee_user` = '".$Username."' AND `employee_pass` = '".$Password."' ";
    
    $result = mysqli_query($con,$sql);
    
    //    echo "$sql";
    
    //     printf("Result set has %d rows.\n",$result);
    
    if(mysqli_num_rows($result)==1){
        
        $row = mysqli_fetch_array($result);
        
        $_SESSION["adminID"] = $row["employee_id"];
        $_SESSION["adminName"] = $row["employee_name"];
        $_SESSION["adminPhone"] = $row["employee_phone"];
        $_SESSION["adminAddress"] = $row["employee_address"];
        $_SESSION["adminDep"] = $row["employee_dep"];
        
        if(isset($_SESSION['adminID']) && !empty($_SESSION['adminID'])) { //เช็คว่า เจอค่าไหม
            echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('เข้าสู่ระบบสำเร็จ');
            window.location.replace(\"../index.php\");
            </SCRIPT>";
            exit();
        }
    }else{
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('Usernames และ Passwords ไม่ถูกต้อง');
            window.location.replace(\"../login.php\");
            </SCRIPT>";
            exit();
    }
}
?>