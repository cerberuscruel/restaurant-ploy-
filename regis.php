<?php

error_reporting(E_ALL);
require 'connectDB/connectdata.php';

//   query for insert data into tables
  
 if(!empty($_POST["iduser"]))
   {
   $no = $_POST['iduser'];
   $name =$_POST['usrfullname'];
   $address =$_POST['useraddress'];
   $email = $_POST['useremail'];
   $phone =$_POST['userphone'];
   $usr =$_POST['username'];
   $psw = $_POST['password'];

    //  echo "$usr"."\n"."$psw";
    // exit();

//    echo "$no"."$name"."$address"."$email"."$phone"."$usr"."$psw";

 	$check = "SELECT * FROM tb_customer WHERE customer_id = '$no'";
	$rs=mysqli_query($con,$check);
	
    $num = mysqli_num_rows($rs); 
        if($num > 0)   		
        {
             echo 1;
             exit;
 
		} else{
			
	//Insert to db	
		$sql = "INSERT INTO `tb_customer`(`customer_id`, `customer_name`, `customer_address`, `customer_email`, `customer_phone`, `customer_user`, `customer_pass`) 
                VALUES ('".$no."','".$name."','".$address."','".$email."','".$phone."','".$usr."','".$psw."')"; 

     
		$result=mysqli_query($con,$sql);
        
			}
		 
		} 
	mysqli_close($con);			
		 
	if($result){
			echo 2; // สำเร็จ
	  }
	  else{
		    echo 3; // insert ผิดพลาด
	  }		 


?>