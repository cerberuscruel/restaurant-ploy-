<?php 
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ; 
include "include/modal.php";
include "include/function.php";
?>


<!DOCTYPE html>
<html lang="en">

<body>

    <?php include "navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <?php include "check_session.php";?>

        <div class="text-center">
            <div>
                <img src="image/map.jpg" alt="center" height="50%" width="50%">

            </div>
        </div>
        <hr/>
        <div class="text-center">
            <div>
                <a href="bookingroom.php"><button class="btn btn-info">จองห้องอาหาร</button><a> ||
                <a href="bookingtable.php"><button class="btn btn-info">จองโต๊ะอาหาร</button><a>
            </div>
        </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Echobear 2017</p>
                </div>
            </div>
        </footer>


</body>

</html>