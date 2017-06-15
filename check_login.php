<?php 
error_reporting(E_ALL);
session_start();
        if(isset($_REQUEST['Username'])){
				//connection
                  include("connectDB/connectdata.php");
				//รับค่า user & password
                  $Username = $_REQUEST['Username'];
                  $Password = $_REQUEST['Password'];

              
              //    $Password = md5($_REQUEST['Password']);
               
				//query 
                  $sql="SELECT * FROM tb_customer Where customer_user='".$Username."' and customer_pass='".$Password."' ";
                  
                
                  $result = mysqli_query($con,$sql);
                
              //    echo "$sql";

            //     printf("Result set has %d rows.\n",$result);

                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["customer_id"];
                      $_SESSION["UserName"] = $row["customer_name"];
                      $_SESSION["UserEmail"] = $row["customer_email"];
                      $_SESSION["UserPhone"] = $row["customer_phone"];
                    
                      if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) { //เช็คว่า เจอค่าไหม
                         echo 1;
                      }
                  }else{
                      echo 0;
                  }
                 }
?>