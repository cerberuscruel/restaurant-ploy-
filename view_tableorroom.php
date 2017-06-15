<?php
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
$sql_order_room="SELECT * FROM `tb_orderroom` WHERE `customer_id` = '".$_SESSION['UserID']."'";
$sql_order_table="SELECT * FROM `tb_ordertable` WHERE `customer_id`= '".$_SESSION['UserID']."'";

if(isset($_GET['id']) && !empty($_GET['booking_des'])){
    $_SESSION['table&room'] = $_GET['id'];
    $_SESSION['des'] = $_GET['booking_des'];
    $_SESSION['booking_date'] = $_GET['booking_date'];
}

?>
  <html>

  <body>
    <?php include "navigation.php";?>

      <?php include "check_session.php";?>
        <br>
        <div class="container" style="width:1200px">
          <h3 align="center">รายการห้องที่ทำการจอง</h3>
          <br>

          <table id="table_room" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>รหัสห้อง</th>
                <th>รหัสบิล</th>
                <th>วันที่ทำการจอง</th>
              </tr>
            </thead>
            <tbody>
              <?php

// $textqwe = $_SESSION['table&room'];
// echo "<script type='text/javascript'>alert('$textqwe');</script>";

if ($result = mysqli_query($con, $sql_order_room)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $room_id = $row['room_id'];
        $bill_id = $row['bill_id'];
        $date = $row['room_date'];
        $cus_id = $row['customer_id'];
        ?>

                <tr>
                  <td>
                    <?php echo $room_id ; ?>
                  </td>
                  <td>
                    <?php echo $bill_id ; ?>
                  </td>
                  <td>
                    <?php echo $date ; ?>
                  </td>

                  </form>
                </tr>
                <?php
    }
    
    mysqli_free_result($result);
}

?>

            </tbody>

          </table>

          <br>
          <div class="container" style="width:1200px">
            <h3 align="center">รายการโต๊ะที่ทำการจอง</h3>
            <br>



            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>รหัสโต๊ะ</th>
                  <th>รหัสบิล</th>
                  <th>วันที่ทำการจอง</th>
                </tr>
              </thead>
              <tbody>
                <?php

// $textqwe = $_SESSION['table&room'];
// echo "<script type='text/javascript'>alert('$textqwe');</script>";

if ($result = mysqli_query($con, $sql_order_table)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $table_id = $row['table_id'];
        $bill_id = $row['bill_id'];
        $date = $row['table_date'];
        $cus_id = $row['customer_id'];
        ?>

                  <tr>
                    <td>
                      <?php echo $table_id ; ?>
                    </td>
                    <td>
                      <?php echo $bill_id ; ?>
                    </td>
                    <td>
                      <?php echo $date ; ?>
                    </td>

                    </form>
                  </tr>
                  <?php
    }
    
    mysqli_free_result($result);
}

mysqli_close($con);
?>

              </tbody>

            </table>

            <br>
            <div style="clear:both;"></div>
            <br>


            <script>
              $(document).ready(function() {
                $('#table_room').DataTable();
              });
            </script>

  </body>

  </html>