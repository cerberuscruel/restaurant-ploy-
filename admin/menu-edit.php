<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';

$menu_id = "";

if(!empty($_GET["id"]))
{
    $menu_id = $_GET["id"];
}
// }else{
//     header("Location: employee.php");
//     echo "<script>alert(กรอกข้อมูลไม่ครบ);window.location=contact.php;</script>";
// }
$query = "";
if(!empty($_POST["menu_id"]))
{
    $menuid =  $_POST['menu_id'] ;
    $menuname = $_POST['menu_name'];
    $menuprice = $_POST['menu_price'];
    $menucategory =  $_POST['menu_cate'] ;
    $menudes = $_POST['menu_des'];
    
    if(!empty($_POST['menu_picture'])){
        $menupicture = $_POST['menu_picture'];
        
        $query = "UPDATE `tb_menu` SET `menu_name`= '".$menuname."',`menu_price`='".$menuprice."',`menu_category`='".$menucategory."',`menu_picture`='".$menupicture."',`menu_des`='".$menudes."' WHERE `menu_id`= '".$menuid."' ";
        $retval=mysqli_query($con,$query);
        if ($retval){
            echo "<script type='text/javascript'>";
            echo "alert('แก้ไขข้อมูลสำเร็จแล้วรูป');";
            echo "window.location = 'menu.php'; ";
            echo "</script>";
            exit();
        }
    }else{
        $query = "UPDATE `tb_menu` SET `menu_name`= '".$menuname."',`menu_price`='".$menuprice."',`menu_category`='".$menucategory."',`menu_des`='".$menudes."' WHERE `menu_id`= '".$menuid."' ";
        $retval=mysqli_query($con,$query);
        if ($retval){
            echo "<script type='text/javascript'>";
            echo "alert('แก้ไขข้อมูลสำเร็จแล้วไม่รูป');";
            echo "window.location = 'menu.php'; ";
            echo "</script>";
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
Menu <small>แก้ไขข้อมูลเมนูอาหาร</small>
</h1>
                      <ol class="breadcrumb">
                        <li class="active">
                          <i class="fa fa-dashboard"></i> Menu
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
                    <form method="post" id="frmedit" action="menu-edit.php">
                      <div align="center">
                        <?php
$query = "SELECT * FROM `tb_menu` where menu_id = ".$menu_id." ";

if ($result = mysqli_query($con, $query)) {
    
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $menu_id =  $row['menu_id'] ;
        $menu_name = $row['menu_name'];
        $menu_price = $row['menu_price'];
        $menu_category =  $row['menu_category'] ;
        $menu_picture = $row['menu_picture'];
        $menu_des = $row['menu_des'];
    }
    mysqli_close($con);
}
?>
                          <table align="center" cellpadding="10">
                            <tr>
                              <td>
                                <label for="menu_id">รหัสอาหาร :</label>
                              </td>
                              <input type="hidden" name="menu_id" id="menu_id" value="<?php echo $menu_id ; ?>">
                              <td>
                                <input type="text" name="menu_id" id="menu_id" disabled value="<?php echo $menu_id ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label for="menu_name">ชื่ออาหาร :</label>
                              </td>
                              <td>
                                <input type="text" name="menu_name" id="menu_name" value="<?php echo $menu_name ; ?>">
                              </td>
                            </tr>
                            <tr>
                              <tr>
                                <td>
                                  <label for="menu_price">ราคาอาหาร :</label>
                                </td>
                                <td>
                                  <input type="input" name="menu_price" id="menu_price" value="<?php echo $menu_price ; ?>">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="menu_cate">ประเภทอาหาร :</label>
                                </td>
                                <td>
                                  <select type="text" width="10%" name="menu_cate" id="menu_cate">
                                    <?php if($menu_category == "A" || $menu_category == " "){ ?>
                                      <option value="A" selected>ต้ม,แกง</option>
                                      <option value="B">ผัด</option>
                                      <option value="C">ลาบ,ยำ</option>
                                      <?php }else if($menu_category == "B"){ ?>
                                        <option value="A">ต้ม,แกง</option>
                                        <option value="B" selected>ผัด</option>
                                        <option value="C">ลาบ,ยำ</option>
                                        <?php }else if($menu_category == "C"){ ?>
                                          <option value="A">ต้ม,แกง</option>
                                          <option value="B">ผัด</option>
                                          <option value="C" selected>ลาบ,ยำ</option>
                                          <?php } ?>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="pic_menu">รูปภาพ :</label>
                                </td>
                                <td>
                                  <span>Choose image</span>
                                  <input type="file" name="menu_picture" id="menu_picture" accept="image/*" />
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <label for="menu_des">รายละเอียดอื่นๆ :</label>
                                </td>
                                <td>
                                  <input type="textarea" required="required" name="menu_des" id="menu_des" value="<?php echo $menu_des ; ?>">
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