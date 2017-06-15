<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

if (isset($_GET['status'])) {
    if ($_GET['status'] == 0) {
        $id = $_GET['id'];
        $query = "UPDATE `tb_table` SET `table_status`= 1 WHERE `table_id`='".$id."'";
        $update_status=mysqli_query($con,$query);
        if ($update_status){
            header("Refresh:0; url=status_table.php");
            exit();
        }
    }else if($_GET['status'] == 1){
        $id = $_GET['id'];
        $query = "UPDATE `tb_table` SET `table_status`= 2 WHERE `table_id`='".$id."'";
        $update_status=mysqli_query($con,$query);
        if ($update_status){
            header("Refresh:0; url=status_table.php");
            exit();
        }
    }else if($_GET['status'] == 2){
        $id = $_GET['id'];
        $query = "UPDATE `tb_table` SET `table_status`= 0 WHERE `table_id`='".$id."'";
        $update_status=mysqli_query($con,$query);
        if ($update_status){
            header("Refresh:0; url=status_table.php");
            exit();
        }
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

    <title>Table | Admin</title>

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



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>เปลี่ยนแปลงสถานะโต๊ะ</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>




                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>หมายเลขโต้ะ</th>
                        <th>สถานะโต้ะ</th>
                        <th>รายละเอียดโต้ะ</th>
                        <th>ตั้งค่า</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
$tableid = null;
$tablestatus = null;
$tabledes = null;

$query = "SELECT * FROM `tb_table` ORDER BY SUBSTR(`table_id` FROM 1 FOR 1), CAST(SUBSTR(`table_id` FROM 2) AS UNSIGNED)";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $tableid =  $row['table_id'] ;
        $tablestatus = $row['table_status'];
        $tabledes = $row['table_des'];
        ?>

                        <tr>
                          <td>
                            <?php echo $tableid ; ?>
                          </td>
                          <td>
                            <?php if($tablestatus == 0){
            echo "ไม่ว่าง";
        }else if($tablestatus == 1){
            echo "ว่าง";
        }else if($tablestatus == 2){
            echo "กำลังใช้งานอยู่";
        } ; ?>
                          </td>
                          <td>
                            <?php echo $tabledes ; ?>
                          </td>
                          <td class="text-center">
                            <a href="status_table.php?id=<?php echo $tableid ; ?>&status=<?php echo $tablestatus ; ?>">
                              <button type="button" class="btn btn-info glyphicon glyphicon-refresh"></button>
                            </a>
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
                </div>
              </div>
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