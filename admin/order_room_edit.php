<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$bill_id = "";

if(!empty($_GET["id"]))
{
    $bill_id = $_GET["id"];
}

// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }

if(!empty($_POST["room_id"]))
{
    $id = $_POST['room_id'];
    $billid = $_POST['bill_id'];
    $date =$_POST['room_date'];
    
    $query = "";
    
    $query_order_room = "UPDATE `tb_orderroom` SET `room_id`= '".trim($id)."',`room_date`= '".$date."' WHERE `bill_id`= '".trim($billid)."' ";
    
    $query_bill = "UPDATE `tb_bill` SET `room_id`= '".trim($id)."' WHERE `bill_id` = '".trim($billid)."' ";
    
    $query_order = "UPDATE `tb_order` SET`room_id`= '".trim($id)."' WHERE bill_id = '".trim($billid)."' ";
    
    $query_check_order =  "SELECT bill_id FROM `tb_order` WHERE bill_id = '".trim($billid)."' ";
    
    $update_order_room = mysqli_query($con,$query_order_room);
    $update_bill = mysqli_query($con,$query_bill);
    
    $select_check_order = mysqli_query($con,$query_check_order);
    
    if(mysqli_num_rows($select_check_order) != 0){
        $update_order = mysqli_query($con,$query_order);
        // echo $query_order . "<br>" ;
    }

    // echo $query_order_room . "<br>" ;
    // echo $query_bill . "<br>" ;

    // exit;

    
    if ($update_order_room && $update_bill && $select_check_order && $update_order){
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จแล้ว');";
        echo "window.location = 'order_room.php'; ";
        echo "</script>";
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

    <title>แก้ไขข้อมูลห้องอาหาร</title>

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
    <style>
      .grey_color {
        color: #ccc;
      }
    </style>
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
Room <small>แก้ไขข้อมูลห้องอาหาร</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Room
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
                    <form method="post" id="frmedit" action="order_room_edit.php">
                      <div align="center">
                        <?php

$query = "SELECT tb_orderroom.room_id,tb_orderroom.bill_id,tb_orderroom.room_date,tb_customer.customer_name FROM `tb_orderroom` LEFT JOIN tb_customer ON tb_orderroom.customer_id = tb_customer.customer_id WHERE `bill_id` = '".$bill_id."' ";

$query_room = "SELECT * FROM `tb_room`" ;

$result_table = mysqli_query($con, $query_room);

$room_id = null;
$room_status = null;
$room_des = null;

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $roomid = $row['room_id'];
        $bill_id = $row['bill_id'];
        $room_date = date("Y-m-d", strtotime($row['room_date']));
        $customer_id = $row['customer_name'];
    }
    //  mysqli_close($con);
}
// exit;
?>

                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="room_id">หมายเลขโต้ะ :</label>
                              </td>
                              <td>
                                <select class="selectpicker" placeholder="กรุณากรอกหมายเลขโต๊ะ" name="room_id" id="room_id">
                                  <?php
while($row_raw = mysqli_fetch_assoc($result_table)) {
    $room_id = $row_raw['room_id'];
    $room_des = $row_raw['room_des'];
    $room_status = $row_raw['room_status']
    ?>
                                    <option <?php if($room_status==0 || $room_status==2 ){  echo "disabled class='grey_color' " ; } if($roomid==$room_id){ echo "selected=selected"; } ?> value="
                                      <?php echo $room_id ; ?>" >
                                        <?php echo "รหัส : " . $room_id . " " .$room_des ; ?>
                                    </option>
                                    <?php
}
?>
                                </select>
                                <input type="hidden" name="bill_id" id="bill_id" readonly="" value="<?php echo $bill_id ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="room_date">วันที่ทำการจอง :</label>
                              </td>
                              <td>
                                <input type="date" value="<?php echo $room_date ; ?>" name="room_date" />
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="customer_id">สมาชิกที่จอง :</label>
                              </td>
                              <td>
                                <input type="text" disabled value="<?php echo $customer_id ; ?>">
                              </td>
                            </tr>

                          </table>
                          <br/>
                          <tfoot>
                            <tr>
                              <td>
                                <button type="submit" id="btn_edit" class="btn btn-success">บันทึก</button>
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