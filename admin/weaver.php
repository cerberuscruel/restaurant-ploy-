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
                  <h3>Weaver <small>cerberuscruel</small></h3>
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



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weaver <small>Users</small></h2>
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
                          <th>รหัสส่วนประกอบ</th>
                          <th>อาหาร</th>
                          <th>วัตถุดิบ</th>
                          <th>จำนวนที่ใช้</th>
                          <th>หน่วย</th>
                          <!--<th>ราคา</th>-->
                          <th>ตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>



                        <?php
$weaverid = null;
$menuname = null;
$rawname = null;
$weaveramount = null;
$weaverunit = null;

$query = "SELECT tb_weaver.*, tb_menu.*, tb_raw.*
FROM tb_weaver
LEFT JOIN tb_menu
ON tb_menu.menu_id = tb_weaver.menu_id
LEFT JOIN tb_raw
ON tb_raw.raw_id = tb_weaver.raw_id ";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $weaverid =  $row['weaver_id'] ;
        $menuname = $row['menu_name'];
        $rawname = $row['raw_name'];
        $weaveramount =  $row['weaver_num'] ;
        $weaverunit = $row['weaver_unit'];
        ?>

                          <tr>
                            <td>
                              <?php echo $weaverid ; ?>
                            </td>
                            <td>
                              <?php echo $menuname ; ?>
                            </td>
                            <td>
                              <?php echo $rawname ; ?>
                            </td>
                            <td>
                              <?php echo $weaveramount ; ?>
                            </td>
                            <td>
                              <?php echo $weaverunit ; ?>
                            </td>
                            <td>
                              <a href="weaver-edit.php?id=<?php echo $weaverid ; ?>">
                                <button type="button" id="btn_add" class="btn btn-primary ">แก้ไข</button>
                              </a>
                              <a href="weaver-delete.php?id=<?php echo $weaverid ; ?>">
                                <button type="button" id="btn_delete" class="btn btn-danger ">ลบ</button>
                              </a>
                            </td>
                            </form>
                          </tr>
                          <?php
    }
    
    mysqli_free_result($result);
}
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

    <?php
$query_raw = "SELECT * FROM tb_raw" ;
$query_menu = "SELECT * FROM tb_menu" ;

$result_raw = mysqli_query($con, $query_raw);
$result_menu = mysqli_query($con, $query_menu);

$raw_id = null;
$raw_name = null;
$menu_id = null;
$menu_name = null;

?>


      <!-- Create Item Modal -->
      <div class="col-lg-12 margin-tb">
        <form method="post" id="frm">
          <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="myModalLabel">กรุณากรอกและระบุเวลาที่แน่นอน และรายละเอียดอื่นๆ สำหรับการจอง!!</h3>
                </div>

                <div class="modal-body">

                  <div class="form-group">
                    <label for="raw_id">วัตถุดิบ :</label>
                    <select class="selectpicker form-control" id="raw_id">
                      <?php
while($row_raw = mysqli_fetch_assoc($result_raw)) {
    $raw_id = $row_raw['raw_id'];
    $raw_name = $row_raw['raw_name'];
    ?>
                        <option value="<?php echo $raw_id ; ?>">
                          <?php echo $raw_name ; ?>
                        </option>
                        <?php
}
?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="menu_id">อาหาร :</label>
                    <select class="selectpicker form-control" id="menu_id">
                      <?php
while($row = mysqli_fetch_assoc($result_menu)) {
    $menu_id = $row['menu_id'];
    $menu_name = $row['menu_name'];
    ?>
                        <option value="<?php echo $menu_id ; ?>">
                          <?php echo $menu_name ; ?>
                        </option>
                        <?php
}

mysqli_close($con);

?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="weaver_num">จำนวนที่ใช้ :</label>
                    <div class="form-inline">
                      <input type="number" id="weaver_num" required placeholder="กรุณากรอกจำนวน" class="form-control" />
                      <select class="form-control" id="weaver_unit">
                        <option value="กิโลกรัม">กิโลกรัม</option>
                        <option value="ซีซี">ซีซี</option>
                        <option value="ฟอง">ฟอง</option>
                        <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                        <option value="กรัม">กรัม</option>
                        <option value="ช้อนชา">ช้อนชา</option>
                      </select>
                    </div>
                  </div>

                  <input type="close" class="btn btn-danger" data-dismiss="modal" value="Close">
                  <input type="submit" class="btn btn-primary" id="btn_submit" value="Add">
                </div>


                <div class="modal-footer">
                  <h5 class="modal-title" id="myModalLabel">**หลังจากทำการจองโต๊ะล่วงหน้าแล้วเราจะติดต่อกลับไปยังอีเมล์ของท่าน? หากท่านไม่ประสงค์จะเปลี่ยนแปลงข้อมูลการจองกรุณาโทร.มายืนยันที่ร้านอีกครั้งก่อนเวลาจริงอย่างน้อยครึ่งชั่วโมง
</h5>
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


      <!-- Insert Employee -->
      <script>
        $(function() {
          $("#frm").submit(function(event) {
            event.preventDefault();
            // alert("alert"); return 1;
            var raw_id = $('#raw_id').val();
            var menu_id = $("#menu_id").val();
            var weaver_num = $("#weaver_num").val();
            var weaver_unit = $('#weaver_unit').val();

            $.post("weaver-add.php", {
              raw_id: raw_id,
              menu_id: menu_id,
              weaver_num: weaver_num,
              weaver_unit: weaver_unit,
            }).done(function(data) {
              console.log(data);
              if (data == 1) {
                $('#frm')[0].reset();
                $('#create-item').modal('hide')
                location.reload();
              } else {
                $('#frm')[0].reset();
                alert(data);
              }
            });
          });
        });
      </script>
      <!-- //// -->



  </body>

  </html>