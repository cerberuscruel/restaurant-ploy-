<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$epyid = "";

if(!empty($_GET["id"]))
{
    $epyid = $_GET["id"];
}
// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }

if(!empty($_POST["employee_id"]))
{
    $ID = $_POST['employee_id'];
    $NAME = $_POST['employee_name'];
    $Address =$_POST['employee_address'];
    $Phone =$_POST['employee_phone'];
    $Username =$_POST['employee_user'];
    
    $query = "";
    
    $query = "UPDATE `tb_employee` SET `employee_user`= '".$Username."',`employee_name`='".$NAME."',`employee_phone`=".$Phone.",`employee_address`='".$Address."' WHERE `employee_id`=".$ID." ";
    
    echo "$query";
    $retval=mysqli_query($con,$query);
    if ($retval){
        header("Location: employee.php");
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

    <title>แก้ไขข้อมูลพนักงาน</title>

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
                  <h3>Employee <small>cerberuscruel</small></h3>
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
Employee <small>แก้ไขข้อมูลพนักงาน</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Employee
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
                    <form method="post" id="frmedit" action="employee-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT * FROM `tb_employee` where employee_id = ".$epyid." ";

if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $employee_id = $row['employee_id'] ;
        $employee_user = $row['employee_user'] ;
        $employee_name = $row['employee_name'] ;
        $employee_phone = $row['employee_phone'] ;
        $employee_address = $row['employee_address'] ;
    }
    mysqli_close($con);
}
?>
                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="employee_id">รหัสพนักงาน :</label>
                              </td>
                              <td>
                                <input type="text" name="employee_id" id="employee_id" readonly="" value="<?php echo $employee_id; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="employee_user">ชื่อเข้าใช้งาน :</label>
                              </td>
                              <td>
                                <input type="text" required="required" name="employee_user" id="employee_user" value="<?php echo $employee_user ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="employee_name">ชื่อพนักงาน :</label>
                              </td>
                              <td>
                                <input type="text" id="employee_name" required="required" name="employee_name" value="<?php echo $employee_name ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="employee_phone">เบอร์โทรศัพท์ :</label>
                              </td>
                              <td>
                                <input type="text" id="employee_phone" maxlength="10" pattern="[0-9]{10}" title="โปรดกรอกเบอร์โทรศัพท์ให้ถูกต้อง" required="required" name="employee_phone" value="<?php echo $employee_phone ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="employee_address">ที่อยู่ :</label>
                              </td>
                              <td>
                                <input type="textarea" id="employee_address" required="required" name="employee_address" value="<?php echo $employee_address ; ?>">
                              </td>
                            </tr>
                          </table>
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