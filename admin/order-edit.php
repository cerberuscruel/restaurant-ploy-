<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$bill_id = "";
$tableroom = "";
$id_room = "";
$id_table = "";

if(!empty($_GET["id"]))
{
    $bill_id = $_GET["id"];
    $tableroom = $_GET['tableroom'];

    if($tableroom == "room"){
      $id_room = $_GET['idroom'];
    }else if($tableroom == "table"){
      $id_table = $_GET['idtable'];
    }
}

// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }

if(!empty($_POST["room_id"]))
{
    $id = $_POST['room_id'];
    $des = $_POST['room_des'];
    $price =$_POST['room_price'];
    $status =$_POST['room_status'];
    
    $query = "";
    
    $query = "UPDATE `tb_room` SET `room_price`='".$price."',`room_des`='".$des."',`room_status`='".$status."' WHERE `room_id`='".$id."' ";
    
    $retval=mysqli_query($con,$query);
    if ($retval){
        header("Location: room.php");
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

    <title>แก้ไขข้อมูลออเดอร์</title>

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
            <div class="">

              <div class="clearfix"></div>
              <div id="page-wrapper">
                <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
Order <small>แก้ไขข้อมูลออเดอร์</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Order
                        </li>
                      </ol>
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i> <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->

                  <h4>กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง</h4>
                  <hr size "1" />
                  <div class="row">
                    <form method="post" id="frmedit" action="room-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT tb_order.order_id,tb_order.bill_id,tb_customer.customer_id,tb_customer.customer_name,tb_order.order_date,tb_order.order_status,tb_table.table_id,tb_room.room_id,COUNT(order_num)AS sumqty,SUM(tb_order.order_num * tb_menu.menu_price)AS total
FROM tb_order
INNER JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id
INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id
INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id
LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id
LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id
where tb_order.bill_id = ".$bill_id." 
GROUP BY tb_order.bill_id";

if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $bill_id =  $row['bill_id'] ;
        $customer_name = $row['customer_name'];
        $customer_id = $row['customer_id'];
        $rprice = $row['room_price'];
        $rstatus = $row['room_status'];
    }
    mysqli_close($con);
}
?>

                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="bill_id">หมายเลขบิล :</label>
                              </td>
                              <td>
                                <input type="text" name="bill_id" id="bill_id" readonly="" value="<?php echo $bill_id ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="cus_name">สมาชิก :</label>
                              </td>
                              <td>
                                <input type="hidden" required="required" name="cus_id" id="cus_id" value="<?php echo $customer_id ; ?>">
                                <input type="text" required="required" name="cus_name" id="cus_name" value="<?php echo $customer_name ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="room_price">ราคาห้องอาหาร :</label>
                              </td>
                              <td>
                                <input type="number" required="required" name="room_price" id="room_price" value="<?php echo $rprice ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="room_status">ห้องหรือโต๊ะ :</label>
                              </td>
                              <td>
                                <select type="text" width="10%" name="room_status" id="room_status">
                                  <?php  if($rstatus == 0){ ?>
                                    <option value="">เลือกรายการ</option>
                                    <option value="0" selected="selected">รอ</option>
                                    <option value="1">กำลังปรุง</option>
                                    <option value="2">เสิร์ฟอาหารแล้ว</option>
                                    <?php }else if($rstatus == 1){ ?>
                                      <option value="">เลือกรายการ</option>
                                      <option value="0">รอ</option>
                                      <option value="1" selected="selected">กำลังปรุง</option>
                                      <option value="2">เสิร์ฟอาหารแล้ว</option>
                                      <?php }else if($rstatus == 2){ ?>
                                        <option value="">เลือกรายการ</option>
                                        <option value="0">รอ</option>
                                        <option value="1">กำลังปรุง</option>
                                        <option value="2" selected="selected">เสิร์ฟอาหารแล้ว</option>
                                        <?php } ?>"> ?>

                                </select>
                              </td>
                            </tr>


                          </table>
                          <br/>
                          <tfoot>
                            <tr>
                              <td>
                                <button type="submit" id="btn_edit" class="btn btn-primary">บันทึก</button>
                            </tr>
                          </tfoot>
                      </div>
                    </form>
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