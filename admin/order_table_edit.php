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

if(!empty($_POST["table_id"]))
{
    $id = $_POST['table_id'];
    $billid = $_POST['bill_id'];
    $date =$_POST['table_date'];
    
    $query = "";
    
    $query_order_table = "UPDATE `tb_ordertable` SET `table_id`= '".trim($id)."',`table_date`= '".$date."' WHERE `bill_id`= '".trim($billid)."' ";
    
    $query_bill = "UPDATE `tb_bill` SET `table_id`= '".trim($id)."' WHERE `bill_id` = '".trim($billid)."' ";
    
    $query_order = "UPDATE `tb_order` SET`table_id`= '".trim($id)."' WHERE bill_id = '".trim($billid)."' ";
    
    $query_check_order =  "SELECT bill_id FROM `tb_order` WHERE bill_id = '".trim($billid)."' ";
    
    $update_order_table = mysqli_query($con,$query_order_table);
    $update_bill = mysqli_query($con,$query_bill);
    
    $select_check_order = mysqli_query($con,$query_check_order);
    
    if(mysqli_num_rows($select_check_order) != 0){
        $update_order = mysqli_query($con,$query_order);
        // echo $query_order ;
    }
    
    
    if ($update_order_table && $update_bill && $select_check_order && $update_order){
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขข้อมูลสำเร็จแล้ว');";
        echo "window.location = 'order_table.php'; ";
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

    <title>แก้ไขข้อมูลโต้ะอาหาร</title>

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
Table_Order <small>รายการจองของโต๊ะ</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Table
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
                    <form method="post" id="frmedit" action="order_table_edit.php">
                      <div align="center">
                        <?php

$query = "SELECT tb_ordertable.table_id,tb_ordertable.bill_id,tb_ordertable.table_date,tb_customer.customer_name FROM `tb_ordertable` LEFT JOIN tb_customer ON tb_ordertable.customer_id = tb_customer.customer_id WHERE `bill_id` = '".$bill_id."' ";

$query_table = "SELECT * FROM `tb_table`" ;

$result_table = mysqli_query($con, $query_table);

$table_id = null;
$table_status = null;
$table_des = null;

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $tableid = $row['table_id'];
        $bill_id = $row['bill_id'];
        $table_date = date("Y-m-d", strtotime($row['table_date']));
        $customer_id = $row['customer_name'];
    }
    //  mysqli_close($con);
}
// exit;
?>

                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="table_id">หมายเลขโต้ะ :</label>
                              </td>
                              <td>
                                <select class="selectpicker" placeholder="กรุณากรอกหมายเลขโต๊ะ" name="table_id" id="table_id">
                                  <?php
while($row_raw = mysqli_fetch_assoc($result_table)) {
    $table_id = $row_raw['table_id'];
    $table_des = $row_raw['table_des'];
    $table_status = $row_raw['table_status']
    ?>
                                    <option <?php if($table_status==0 || $table_status==2 ){ echo "disabled class='grey_color' " ; } if($tableid==$table_id){ echo "selected=selected"; } ?> value="
                                      <?php echo $table_id ; ?>" >
                                        <?php echo "รหัส : " . $table_id . " " .$table_des ; ?>
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
                                <label for="table_date">วันที่ทำการจอง :</label>
                              </td>
                              <td>
                                <input type="date" value="<?php echo $table_date ; ?>" name="table_date" />
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