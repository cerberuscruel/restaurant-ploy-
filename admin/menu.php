<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
include "include/function.php";


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

  <script>
    $('body').on('hidden.bs.modal', '.modal', function() {
      $(this).removeData('bs.modal');
    });
  </script>

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
                    <h2>Menu <small>Users</small></h2>
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
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      cerberuscruel.
                    </p>

                    <div class="row">
                      <div class="col-lg-12 margin-tb">

                        <div class="pull-right">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                            Create Item
                          </button>
                        </div>
                      </div>
                    </div>


                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>รหัสอาหาร</th>
                          <th>ชื่ออาหาร</th>
                          <th>ราคาอาหาร</th>
                          <th>ประเภทอาหาร</th>
                          <th>รูปภาพ</th>
                          <th>รายละเอียดโต้ะ</th>
                          <th>ตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>



                        <?php
$menuid = null;
$menuname = null;
$menuprice = null;
$menucate = null;
$menupic = null;
$menudes = null;

$query = "SELECT * FROM `tb_menu` ";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $menuid =  $row['menu_id'] ;
        $menuname = $row['menu_name'];
        $menuprice = $row['menu_price'];
        $menucate =  $row['menu_category'] ;
        $menupic = $row['menu_picture'];
        $menudes = $row['menu_des'];
        ?>

                          <tr>
                            <td>
                              <?php echo $menuid ; ?>
                            </td>
                            <td>
                              <?php echo $menuname ; ?>
                            </td>
                            <td>
                              <?php echo $menuprice ; ?>
                            </td>
                            <td>
                              <?php if($menucate == 'A'){
            echo "ต้ม,แกง";
        }else if($menucate == 'B'){
            echo "ผัด";
        }else if($menucate == 'C'){
            echo "ลาบ,ยำ";
        } ; ?>
                            </td>
                            <td>
                              <?php echo $menupic ; ?>
                            </td>
                            <td>
                              <?php echo $menudes ; ?>
                            </td>
                            <td>
                              <a href="menu-edit.php?id=<?php echo $menuid ; ?>">
                                <button type="button" id="btn_add" class="btn btn-primary ">แก้ไข</button>
                              </a>
                              <a href="menu-delete.php?id=<?php echo $menuid ; ?>">
                                <button type="button" id="btn_delete" class="btn btn-danger ">ลบ</button>
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

    <!-- Create Item Modal -->
    <div class="col-lg-12 margin-tb">
      <form method="post" id="frm" action="menu-add.php" enctype="multipart/form-data">
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">กรุณากรอกและระบุเวลาที่แน่นอน และรายละเอียดอื่นๆ สำหรับการจอง!!</h3>
              </div>

              <div class="modal-body">

                <div class="form-group">
                  <label for="no_menu">รหัสอาหาร :</label>
                  <input type="text" name="no_menu" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="name_menu">ชื่ออาหาร :</label>
                  <input type="text" name="name_menu" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="price_menu">ราคาอาหาร :</label>
                  <input type="number" name="price_menu" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="cate_menu">ประเภทอาหาร :</label>
                  <br/>
                  <select type="text" width="10%" name="cate_menu" name="cate_menu">
                    <option value="A">ต้ม,แกง</option>
                    <option value="B">ผัด</option>
                    <option value="C">ลาบ,ยำ</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="pic_menu">รูปภาพ :</label>
                  <span>Choose image</span>
                  <input type="file" name="image" accept="image/*" />
                </div>

                <div class="form-group">
                  <label for="des_menu">รายละเอียดอื่นๆ :</label>
                  <input type="text" name="des_menu" required placeholder="กรุณากรอกนามสกุลของท่าน" class="form-control" />
                </div>


                <input type="close" class="btn btn-danger" data-dismiss="modal" value="Close">
                <input type="submit" class="btn btn-primary" id="btn_submit" value="Add">
              </div>


              <div class="modal-footer">
                <h5 class="modal-title" id="myModalLabel">**หลังจากทำการจองโต๊ะล่วงหน้าแล้วเราจะติดต่อกลับไปยังอีเมล์ของท่าน?
หากท่านไม่ประสงค์จะเปลี่ยนแปลงข้อมูลการจองกรุณาโทร.มายืนยันที่ร้านอีกครั้งก่อนเวลาจริงอย่างน้อยครึ่งชั่วโมง</h5>
                <br>

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Creat item -->

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