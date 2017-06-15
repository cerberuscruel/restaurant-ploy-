<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

if(isset($_GET['button']) == "btn_add"){
    $id = $_GET['id'];
    $query = "UPDATE `tb_order` SET `order_status`= 3 WHERE `bill_id`= '".$id."' ";
    $update_status=mysqli_query($con,$query);
    if ($update_status){
        header("Refresh:0; url=order-buy2.php");
        exit();
    }
}else if(isset($_GET['button']) == "btn_delete"){
    $id = $_GET['id'];
    $query = "DELETE FROM `tb_order` WHERE `bill_id` = '".$id."'";
    $delete_status = mysqli_query($con,$query);
    if ($delete_status){
        header("Refresh:0; url=order-buy2.php");
        exit();
    }
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- menu profile quick info -->
            <?php include "include/logo_profile.php" ;?>
              <!-- menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <?php include "include/sidebarmenu.php" ;?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <?php include "include/menu_footer.php" ?>
                  <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/navigationtop.php" ; ?>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>รายการที่กำลังปรุง <small>Users</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
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
                        <th width="20%">ตั้งค่า</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$bill_id = null;
$user_name = null;
$date = null;
$order_status = null;
$order_qty = null;
$order_sum = null;


$query = "SELECT tb_order.bill_id,tb_customer.customer_name,tb_order.order_date,tb_order.order_status,tb_table.table_id,tb_room.room_id,COUNT(order_num)AS sumqty,SUM(tb_order.order_num * tb_menu.menu_price)AS total
FROM tb_order
INNER JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id
INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id
INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id
LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id
LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id
WHERE tb_order.order_status = 2
GROUP BY tb_order.bill_id";

if ($result = mysqli_query($con, $query)) {
    
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
                            <?php if($order_status == 2){ echo "กำลังปรุง"; } ; ?>
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
                          <td>
                            <a href="order-buy2.php?button=btn_add&id=<?php echo $bill_id ?>">
                              <button type="submit" id="btn_add" name="btn_add" class="btn btn-primary ">เสิร์ฟอาหาร</button>
                            </a>
                            <a href="order-buy2.php?button=btn_delete&id=<?php echo $bill_id ?>">
                              <button type="submit" id="btn_delete" name="btn_delete" class="btn btn-danger ">ลบ</button>
                            </a>
                          </td>
                        </tr>
                        <?php
    }
    
    mysqli_free_result($result);
}

mysqli_close($con);
?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
      <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>



    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


  </body>

  </html>