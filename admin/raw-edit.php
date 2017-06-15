<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$rawid = "";

if(!empty($_GET["id"]))
{
    $rawid = $_GET["id"];
}
// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }

if(!empty($_POST["raw_name"]))
{
    $id = $_POST['raw_id'];
    $name = $_POST['raw_name'];
    $amount = $_POST['raw_amount'];
    $price = $_POST['raw_price'];
    $unit = $_POST['raw_unit'];
    
    
    $query = "";
    
    $query = "UPDATE `tb_raw` SET `raw_name`= '".$name."',`raw_date`= NOW(),`raw_amount`= '".$amount."' ,`raw_price`='".$price."',`raw_unit`= '".$unit."' WHERE `raw_id`= '".$id."' ";
    
    
    $retval=mysqli_query($con,$query);
    if ($retval){
        header("Location: raw.php");
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

    <title>แก้ไขข้อมูลวัตถุดิบ</title>

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
              <div class="page-title">
                <div class="title_left">
                  <h3>Raw <small>cerberuscruel</small></h3>
                </div>

                <div class="title_right">
                  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
<button class="btn btn-default" type="button">Go!</button>
</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <div id="page-wrapper">
                <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
Raw <small>แก้ไขข้อมูลวัตถุดิบ</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Raw
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
                    <form method="post" id="frmedit" action="raw-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT * FROM `tb_raw` where `raw_id` = ".$rawid." ";


if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $raw_id =  $row['raw_id'] ;
        $rawname = $row['raw_name'];
        $rawamount = $row['raw_amount'];
        $rawprice = $row['raw_price'];
        $rawunit = $row['raw_unit'];
    }
    mysqli_close($con);
}

?>
                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="raw_id">รหัสวัตถุดิบ :</label>
                              </td>
                              <td>
                                <input type="text" name="raw_id" id="raw_id" readonly="" readonly="" value="<?php echo $raw_id ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="raw_name">ชื่อวัตถุดิบ :</label>
                              </td>
                              <td>
                                <input type="text" required="required" name="raw_name" id="raw_name" value="<?php echo $rawname ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="raw_amount">จำนวนที่มี :</label>
                              </td>
                              <td>
                                <input type="number" required="required" step="any" name="raw_amount" id="raw_amount" value="<?php echo $rawamount ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="raw_price">ราคา/หน่วย :</label>
                              </td>
                              <td>
                                <input type="number" required="required" name="raw_price" id="raw_price" value="<?php echo $rawprice ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="raw_unit">หน่วย :</label>
                              </td>
                              <td>
                                <select class="form-control" name="raw_unit" id="raw_unit">
                                  <option value="กิโลกรัม" <?php if($rawunit=="กิโลกรัม" ) echo 'selected="selected"'; ?> >กิโลกรัม</option>
                                  <option value="ซีซี" <?php if($rawunit=="ซีซี" ) echo 'selected="selected"'; ?> >ซีซี</option>
                                  <option value="ฟอง" <?php if($rawunit=="ฟอง" ) echo 'selected="selected"'; ?> >ฟอง</option>
                                  <option value="ช้อนโต๊ะ" <?php if($rawunit=="ช้อนโต๊ะ" ) echo 'selected="selected"'; ?> >ช้อนโต๊ะ</option>
                                  <option value="กรัม" <?php if($rawunit=="กรัม" ) echo 'selected="selected"'; ?> >กรัม</option>
                                  <option value="ช้อนชา" <?php if($rawunit=="ช้อนชา" ) echo 'selected="selected"'; ?> >ช้อนชา</option>
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