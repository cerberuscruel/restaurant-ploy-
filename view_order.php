<?php
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
$sql="SELECT tb_order.bill_id,tb_customer.customer_name,tb_order.order_date,tb_order.order_status,tb_table.table_id,tb_room.room_id,COUNT(order_num)AS sumqty,SUM(tb_order.order_num * tb_menu.menu_price)AS total
FROM tb_order
LEFT JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id
LEFT JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id
LEFT JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id
LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id
LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id
WHERE tb_order.customer_id = '".$_SESSION['UserID']."'
GROUP BY tb_order.bill_id";

$result=mysqli_query($con,$sql);

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
          <h3 align="center">รายการที่สั่ง</h3>
          <br>

          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>รหัสบิล</th>
                <th>ชื่อสมาชิก</th>
                <th>วันที่</th>
                <th>สถานะ</th>
                <th>ห้อง&amp;โต๊ะ</th>
                <th>จำนวนรายการ</th>
                <th>ราคารวม</th>
              </tr>
            </thead>
            <tbody>
              <?php

// $textqwe = $_SESSION['table&room'];
// echo "<script type='text/javascript'>alert('$textqwe');</script>";

if ($result = mysqli_query($con, $sql)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $bill_id = $row['bill_id'];
        $user_name = $row['customer_name'];
        $date = $row['order_date'];
        $order_status = $row['order_status'];
        $table_id = $row['table_id'];
        $room_id = $row['room_id'];
        $order_qty = $row['sumqty'];
        $order_sum = $row['total'];
        ?>

                <tr>
                  <td>
                    <?php echo $bill_id ; ?>
                  </td>
                  <td>
                    <?php echo $user_name ; ?>
                  </td>
                  <td>
                    <?php echo $date ; ?>
                  </td>
                  <td>
                    <?php if($order_status == 1){ echo "รอ" ;}
        else if($order_status == 2){ echo "กำลังปรุง"; }
        else if($order_status == 3){ echo "เสิร์ฟอาหารแล้ว" ;}
        else if($order_status == 4){ echo "เสร็จสิ้น" ;}
        ?>
                  </td>
                  <td>
                    <?php if(!empty($room_id)){
            echo "ห้อง " . $room_id ;
        }else{
            echo "โต๊ะ " . $table_id ;
        } ?>
                  </td>
                  <td>
                    <?php echo $order_qty ; ?>
                  </td>
                  <td>
                    <?php echo $order_sum ; ?>
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

  </body>

  </html>