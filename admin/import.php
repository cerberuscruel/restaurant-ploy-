<?php
error_reporting(E_ALL);
include '../connectDB/connectdata.php';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

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
                    <h2>Import <small>นำเข้าวัตถุดิบ</small></h2>
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
                            เพิ่มข้อมูลนำเข้า
                          </button>
                        </div>
                      </div>
                    </div>




                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>รหัสนำเข้า</th>
                          <th>วัตถุดิบ</th>
                          <th>วันที่นำเข้า</th>
                          <th>จำนวนนำเข้า</th>
                          <th>จำนวนที่มี</th>
                          <th>หน่วย</th>
                          <th>ราคา</th>
                          <th>แหล่งจัดซื้อ</th>
                          <th>การตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$import_id =  null ;
$raw_name = null ;
$bill_import_date = null ;
$import_amount	= null ;
$raw_amount	= null ;
$import_unit	= null ;
$import_price	= null ;
$bill_import_source	= null ;


$query = "SELECT tb_bill_import.bill_import_id,tb_import.import_id,tb_raw.raw_name,tb_bill_import.bill_import_date,tb_import.import_amount,tb_raw.raw_amount,tb_bill_import.import_unit,tb_bill_import.import_price,tb_bill_import.bill_import_source FROM tb_import INNER JOIN tb_bill_import ON tb_import.bill_import_id = tb_bill_import.bill_import_id INNER JOIN tb_raw ON tb_import.raw_id = tb_raw.raw_id";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $import_id =  $row['import_id'] ;
        $bill_import_id = $row['bill_import_id'];
        $raw_name = $row['raw_name'];
        $bill_import_date = $row['bill_import_date'];
        $import_amount	= $row['import_amount'];
        $raw_amount	= $row['raw_amount'];
        $import_unit	= $row['import_unit'];
        $import_price	= $row['import_price'];
        $bill_import_source	= $row['bill_import_source'];
        ?>

                          <tr>
                            <td>
                              <?php echo $import_id ; ?>
                            </td>

                            <td>
                              <?php echo $raw_name ; ?>
                            </td>
                            <td>
                              <?php echo $bill_import_date ; ?>
                            </td>
                            <td>
                              <?php echo $import_amount ; ?>
                            </td>
                            <td>
                              <?php echo $raw_amount ; ?>
                            </td>
                            <td>
                              <?php echo $import_unit ; ?>
                            </td>
                            <td>
                              <?php echo $import_price ; ?>
                            </td>
                            <td>
                              <?php echo $bill_import_source ; ?>
                            </td>
                            <td align="center">
                              <a href="import-delete.php?id=<?php echo $bill_import_id ; ?>">
                                <button type="button" id="btn_delete" class="btn btn-danger ">ลบ</button>
                              </a>
                            </td>
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

$result_raw = mysqli_query($con, $query_raw);

$raw_id = null;
$raw_name = null;

?>

      <!-- Create Item Modal -->
      <div class="col-lg-12 margin-tb">
        <form method="post" id="frm">
          <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" id="myModalLabel">กรุณากรอกข้อมูลสำหรับการนำเข้าวัตถุดิบให้ครบถ้วน !!</h3>
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
mysqli_close($con);
?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="import_date">วันที่นำเข้า :</label>
                    <br>
                    <input type="date" id="import_date" required class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="import_price">ราคา :</label>
                    <input type="number" id="import_price" min="0" required placeholder="กรุณากรอกราคาวัตถุดิบนำเข้า" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="import_amount">จำนวนที่ใช้ :</label>
                    <div class="form-inline">
                      <input type="number" id="import_amount" required placeholder="กรุณากรอกจำนวน" class="form-control" />
                      <select class="form-control" id="import_unit">
                        <option value="กิโลกรัม">กิโลกรัม</option>
                        <option value="ซีซี">ซีซี</option>
                        <option value="ฟอง">ฟอง</option>
                        <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                        <option value="กรัม">กรัม</option>
                        <option value="ช้อนชา">ช้อนชา</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="import_source">แหล่งที่มา :</label>
                    <textarea rows="" cols="" id="import_source" required placeholder="กรุณากรอกแหล่งที่มา" class="form-control"></textarea>
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


      <!-- Insert Employee -->

      <script>
        $(function() {
          $("#frm").submit(function(event) {
            event.preventDefault();
            // alert("alert"); return 1;
            var raw_id = $("#raw_id").val();
            var import_date = $("#import_date").val();
            var import_price = $("#import_price").val();
            var import_amount = $("#import_amount").val();
            var import_unit = $("#import_unit").val();
            var import_source = $("#import_source").val();

            console.log(raw_id + " " + import_date + " " + import_price + " " + import_amount + " " + import_unit + " " + import_source);

            // return 1;

            $.post("import-add.php", {
              raw_id: raw_id,
              import_date: import_date,
              import_price: import_price,
              import_amount: import_amount,
              import_unit: import_unit,
              import_source: import_source
            }).done(function(data) {
              console.log(data);
              if (data == 1) {
                // return 1;
                $('#frm')[0].reset();
                $('#create-item').modal('hide')
                location.reload();
              } else {
                alert(data);
              }
            });
          });
        });
      </script>
      <!-- //// -->
  </body>

  </html>