<?php
error_reporting(E_ALL);
require '../connectDB/connectdata.php';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

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
                  <h3>raw <small>cerberuscruel</small></h3>
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
                    <h2>raw <small>Users</small></h2>
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
                          <th>รหัสวัตถุดิบ</th>
                          <th>ชื่อวัตถุดิบ</th>
                          <th>วันที่นำเข้า</th>
                          <th>จำนวนที่มี</th>
                          <th>ราคา/ต่อหน่วย</th>
                          <th>หน่วย</th>
                          <th width="20%">ตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$rawid = null;
$rawname = null;
$rawdate = null;;
$rawamount = null;
$rawprice = null;
$rawunit = null;

$query = "SELECT * FROM `tb_raw` ";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $rawid =  $row['raw_id'] ;
        $rawname = $row['raw_name'];
        $rawdate = $row['raw_date'];
        $rawamount = $row['raw_amount'];
        $rawprice = $row['raw_price'];
        $rawunit = $row['raw_unit'];
        
        
        // $rawdate = date('Y-m-d : h:i:s', $date);
        ?>
                          <tr>
                            <td>
                              <?php echo $rawid ; ?>
                            </td>
                            <td>
                              <?php echo $rawname ; ?>
                            </td>
                            <td>
                              <?php echo $rawdate ; ?>
                            </td>
                            <td>
                              <?php echo $rawamount ; ?>
                            </td>
                            <td>
                              <?php echo $rawprice ; ?>
                            </td>
                            <td>
                              <?php echo $rawunit ; ?>
                            </td>
                            <td>
                              <a href="raw-edit.php?id=<?php echo $rawid ; ?>">
                                <button type="button" id="btn_add" class="btn btn-primary ">แก้ไข</button>
                              </a>
                              <a href="raw-delete.php?id=<?php echo $rawid ; ?>">
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
                  <label for="raw_name">ชื่อวัตถุดิบ :</label>
                  <input type="text" id="raw_name" required placeholder="กรุณากรอกชื่อวัตถุดิบ" class="form-control"></input>
                </div>

                <div class="form-group">
                  <label for="raw_price">ราคา/หน่วย :</label>
                  <input type="number" id="raw_price" required placeholder="กรุณากรอกราคาต่อหน่วย" class="form-control"></input>
                </div>

                <div class="form-group">
                  <label for="raw_amount">จำนวน :</label>
                  <div class="form-inline">
                    <input type="number" id="raw_amount" required placeholder="กรุณากรอกจำนวน" class="form-control" />
                    <select class="form-control" id="raw_unit">
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


    <!-- Insert Raw -->

    <script>
      $(function() {
        $("#frm").submit(function(event) {
          event.preventDefault();
          // alert("alert"); return 1;
          var raw_name = $("#raw_name").val();
          var raw_price = $("#raw_price").val();
          var raw_amount = $("#raw_amount").val();
          var raw_unit = $("#raw_unit").val();

          $.post("raw-add.php", {
            raw_name: raw_name,
            raw_price: raw_price,
            raw_amount: raw_amount,
            raw_unit: raw_unit,
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