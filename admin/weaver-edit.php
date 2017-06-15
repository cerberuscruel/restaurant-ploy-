<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$weaver_id = "";

if(!empty($_GET["id"]))
{
    $weaver_id = $_GET["id"];
}
// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }
$query = "";
if(!empty($_POST["weaver_id"]))
{
    $weaverid =  $_POST['weaver_id'] ;
    $rawname = $_POST['raw_name'];
    $menuname = $_POST['menu_name'];
    $weavernum =  $_POST['weaver_num'] ;
    $weaverunit = $_POST['weaver_unit'];
    
    $query = "UPDATE `tb_weaver` SET `raw_id`='".$rawname."',`menu_id`='".$menuname."',`weaver_num`='".$weavernum."',`weaver_unit`='".$weaverunit."' WHERE  `weaver_id`= '".$weaverid."' ";
    $retval=mysqli_query($con,$query);
    if ($retval){
        echo "<script type='text/javascript'>";
        echo "alert('แก้ไขสำเร็จแล้ว');";
        echo "window.location = 'weaver.php'; ";
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

    <title>แก้ไขข้อมูลเมนูอาหาร</title>

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
                  <h3>Menu <small>cerberuscruel</small></h3>
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
ส่วนประกอบ <small>แก้ไขข้อมูลส่วนประกอบ</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> ส่วนประกอบ
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
                    <form method="post" id="frmedit" action="weaver-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT tb_weaver.*, tb_menu.*, tb_raw.*
FROM tb_weaver
LEFT JOIN tb_menu
ON tb_menu.menu_id = tb_weaver.menu_id
LEFT JOIN tb_raw
ON tb_raw.raw_id = tb_weaver.raw_id WHERE tb_weaver.weaver_id = '".$weaver_id."' ";

if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $weaverid =  $row['weaver_id'] ;
        $menuname = $row['menu_name'];
        $rawname = $row['raw_name'];
        $weaveramount =  $row['weaver_num'] ;
        $weaverunit = $row['weaver_unit'];
    }
}
$query_raw = "SELECT * FROM tb_raw" ;
$query_menu = "SELECT * FROM tb_menu" ;

$result_raw = mysqli_query($con, $query_raw);
$result_menu = mysqli_query($con, $query_menu);

$raw_id = null;
$raw_name = null;
$menu_id = null;
$menu_name = null;

?>
                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="weaver_id">รหัสส่วนประกอบ :</label>
                              </td>
                              <td>
                                <input type="text" name="weaver_id" class="form-control" disabled value="<?php echo $weaverid ; ?>" />
                                <input type="hidden" name="weaver_id" class="form-control" value="<?php echo $weaverid ; ?>" />
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="raw_name">วัตถุดิบ :</label>
                              </td>
                              <td>
                                <select class="selectpicker form-control" name="raw_name" id="raw_name">
                                  <?php while($row_raw = mysqli_fetch_assoc($result_raw)) {
    $raw_id = $row_raw['raw_id'];
    $raw_name = $row_raw['raw_name'];
    ?>
                                    <option value="<?php echo $raw_id ; ?>" <?php if($raw_name==$rawname) echo 'selected="selected"'; ?> >
                                      <?php echo $raw_name ; ?>
                                    </option>
                                    <?php
}
?>
                                </select>

                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="menu_name">ชื่ออาหาร :</label>
                              </td>
                              <td>
                                <select class="selectpicker form-control" name="menu_name" id="menu_name">
                                  <?php
while($row = mysqli_fetch_assoc($result_menu)) {
    $menu_id = $row['menu_id'];
    $menu_name = $row['menu_name'];
    ?>
                                    <option value="<?php echo $menu_id ; ?>" <?php if($menu_name==$menuname) echo 'selected="selected"'; ?> >
                                      <?php echo $menu_name ; ?>
                                    </option>
                                    <?php } mysqli_close($con); ?>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <tr>
                                <td>
                                  <label for="weaver_num">จำนวนที่ใช้ :</label>
                                </td>
                                <td>
                                  <input type="number" name="weaver_num" required placeholder="กรุณากรอกจำนวน" value="<?php echo $weaveramount ; ?>" class="form-control" />
                                </td>
                                <td>
                                  <select class="form-control" name="weaver_unit" name="weaver_unit">
                                    <option value="กิโลกรัม" <?php if($weaverunit=="กิโลกรัม" ) echo 'selected="selected"'; ?> >กิโลกรัม</option>
                                    <option value="ซีซี" <?php if($weaverunit=="ซีซี" ) echo 'selected="selected"'; ?> >ซีซี</option>
                                    <option value="ฟอง" <?php if($weaverunit=="ฟอง" ) echo 'selected="selected"'; ?> >ฟอง</option>
                                    <option value="ช้อนโต๊ะ" <?php if($weaverunit=="ช้อนโต๊ะ" ) echo 'selected="selected"'; ?> >ช้อนโต๊ะ</option>
                                    <option value="กรัม" <?php if($weaverunit=="กรัม" ) echo 'selected="selected"'; ?> >กรัม</option>
                                    <option value="ช้อนชา" <?php if($weaverunit=="ช้อนชา" ) echo 'selected="selected"'; ?> >ช้อนชา</option>
                                  </select>
                                </td>
                              </tr>
                          </table>
                          <br>
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