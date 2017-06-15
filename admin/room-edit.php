<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$rid = "";

if(!empty($_GET["id"]))
{
    $rid = $_GET["id"];
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
                  <h3>Room <small>cerberuscruel</small></h3>
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
                    <form method="post" id="frmedit" action="room-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT * FROM `tb_room` where `room_id` = ".$rid." ";

if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $rid =  $row['room_id'] ;
        $rdes = $row['room_des'];
        $rprice = $row['room_price'];
        $rstatus = $row['room_status'];
    }
    mysqli_close($con);
}
?>
                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="room_id">หมายเลขห้อง :</label>
                              </td>
                              <td>
                                <input type="text" name="room_id" id="room_id" readonly="" value="<?php echo $rid ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="room_des">รายละเอียดห้อง :</label>
                              </td>
                              <td>
                                <input type="textarea" required="required" name="room_des" id="room_des" value="<?php echo $rdes ; ?>">
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
                                <label for="room_status">สถานะของห้อง :</label>
                              </td>
                              <td>
                                <select type="text" width="10%" name="room_status" id="room_status">
                                  <?php  if($rstatus == 0){ ?>
                                    <option value="">เลือกรายการ</option>
                                    <option value="0" selected="selected">ไม่ว่าง</option>
                                    <option value="1">ว่าง</option>
                                    <option value="2">กำลังใช้งานอยู่</option>
                                    <?php }else if($rstatus == 1){ ?>
                                      <option value="">เลือกรายการ</option>
                                      <option value="0">ไม่ว่าง</option>
                                      <option value="1" selected="selected">ว่าง</option>
                                      <option value="2">กำลังใช้งานอยู่</option>
                                      <?php }else if($rstatus == 2){ ?>
                                        <option value="">เลือกรายการ</option>
                                        <option value="0">ไม่ว่าง</option>
                                        <option value="1">ว่าง</option>
                                        <option value="2" selected="selected">กำลังใช้งานอยู่</option>
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