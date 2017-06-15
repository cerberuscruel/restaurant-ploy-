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

              <div class="clearfix"></div>



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                          <th>รหัสออเดอร์</th>
                          <th>รหัสบิล</th>
                          <th>ชื่อสมาชิก</th>
                          <th>วันที่</th>
                          <th>สถานะ</th>
                          <th>ห้อง&amp;โต๊ะ</th>
                          <th>จำนวนรายการ</th>
                          <th>ราคารวม</th>
                          <th>ตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$order_id = null;
$bill_id = null;
$user_name = null;
$date = null;
$order_status = null;
$table_id = null;
$room_id = null;
$order_qty = null;
$order_sum = null;


$query = "SELECT tb_order.order_id,tb_order.bill_id,tb_customer.customer_name,tb_order.order_date,tb_order.order_status,tb_table.table_id,tb_room.room_id,COUNT(order_num)AS sumqty,SUM(tb_order.order_num * tb_menu.menu_price)AS total
FROM tb_order
INNER JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id
INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id
INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id
LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id
LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id
GROUP BY tb_order.bill_id";

if ($result = mysqli_query($con, $query)) {
    
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        $order_id = $row['order_id'];
        $bill_id = $row['bill_id'];
        $user_name = $row['customer_name'];
        $date = $row['order_date'];
        $order_status = $row['order_status'];
        $table_id = $row['table_id'];
        $room_id = $row['room_id'];
        $order_qty = $row['sumqty'];
        $order_sum = $row['total'];
        ?>

                          <tr>
                            <td>
                              <?php echo $order_id ; ?>
                            </td>
                            <td>
                              <?php echo $bill_id ; ?>
                            </td>
                            <td>
                              <?php echo $user_name ; ?>
                            </td>
                            <td>
                              <?php echo $date ; ?>
                            </td>
                            <td>
                              <?php if($order_status == 1){ echo "รอ" ;}
        else if($order_status == 2){ echo "กำลังปรุง"; }
        else if($order_status == 3){ echo "เสิร์ฟอาหารแล้ว" ;}
        else if($order_status == 4){ echo "เสร็จสิ้น" ;}
        ?>
                            </td>
                            <td>
                              <?php if(!empty($room_id)){
            echo "ห้อง " . $room_id ;
        }else{
            echo "โต๊ะ " . $table_id ;
        } ?>
                            </td>
                            <td>
                              <?php echo $order_qty ; ?>
                            </td>
                            <td>
                              <?php echo $order_sum ; ?>
                            </td>
                            <td>
                              <?php if(!empty($room_id)){ ?>
                                <!--<a href="order-edit.php?id=<?php echo $bill_id ; ?>&tableroom=room&idroom=<?php echo $room_id ; ?>">
                                  <button type="button" id="btn_add" class="btn btn-primary ">แก้ไข</button>
                                </a>-->
                                <a href="order-delete.php?id=<?php echo $bill_id ; ?>&tableroom=room&idroom=<?php echo $room_id ; ?>">
                                  <button type="button" id="btn_delete" class="btn btn-danger ">ลบ</button>
                                </a>
                                <?php }else{ ?>
                                  <!--<a href="order-edit.php?id=<?php echo $bill_id ; ?>&tableroom=table&idtable=<?php echo $table_id ; ?>">
                                    <button type="button" id="btn_add" class="btn btn-primary ">แก้ไข</button>
                                  </a>-->
                                  <a href="order-delete.php?id=<?php echo $bill_id ; ?>&tableroom=table&idtable=<?php echo $table_id ; ?>">
                                    <button type="button" id="btn_delete" class="btn btn-danger ">ลบ</button>
                                  </a>
                                  <?php } ?>
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
$query_menu = "SELECT * FROM tb_menu" ;
$result_menu = mysqli_query($con, $query_menu);

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
                  <h3 class="modal-title" id="myModalLabel">กรอกข้อมูลออเดอร์</h3>
                </div>

                <div class="modal-body">

                  <div class="form-group">
                    <label for="bill_id">รหัสบิล :</label>
                    <input type="text" id="bill_id" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="member_id">รหัสสมาชิก :</label>
                    <input type="text" id="member_id" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control"></input>
                  </div>
                  <div class="form-group">
                    <label for="check_list">เลือกเมนูอาหาร :</label>
                    <br>
                    <?php
$flag=false;
while ($r=mysqli_fetch_array($result_menu))
{
    $menu_id = $r["menu_id"];
    $menu_name = $r["menu_name"];
    $hob_id=explode(',',$menu_name);
    $size = sizeof($hob_id);
    for($i=0;$i<$size;$i++)
    {
        if($hob_id[$i]==$menu_id)
        {
            $flag=true;
        }
    }
    if($flag==true)
    {
        ?>

                      <input type='checkbox' name='check_list[]' value="<?php echo $r['menu_id']; ?>" checked>
                      <?php echo $r['menu_name']; ?>




                        <br>
                        <?php
        $flag=false;
    }
    else
    {
        ?>

                          <input type='checkbox' name='check_list[]' value=" <?php echo $r['menu_id']; ?>">
                          <?php echo $r['menu_name']; ?>

                            <br>
                            <?php
    }
}
mysqli_close($con);
?>
                  </div>



                  <div class="form-group">
                    <label for="booking">ห้องหรือโต๊ะ :</label>
                    <input type="radio" name="booking" id="booking" value="1" checked> ห้อง
                    <input type="radio" name="booking" id="booking" value="2"> โต๊ะ
                    <input type="text" id="numberbooking" required placeholder="กรุณากรอกรหัสโต๊ะหรือห้อง" class="form-control"></input>
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

            var menu_id = [];
            $("input[name='check_list[]']:checked").each(function() {
              menu_id.push($(this).val());
            });



            // return 1;
            // alert("alert"); return 1;
            var bill_id = $("#bill_id").val();
            var member_id = $("#member_id").val();
            var radio = $('input[name=booking]:checked').val();
            var number = $("#numberbooking").val();
            // var price_room = $("#price_room").val();
            // var room_status = $('#room_status').val();

            console.log(bill_id + menu_id + member_id + "," + radio + "," + number);
            // return 1;

            $.post("order-add.php", {
              menu_id: menu_id,
              bill_id: bill_id,
              member_id: member_id,
              radio: radio,
              number: number
                // price_room: price_room,
                // room_status: room_status,
            }).done(function(data) {
              console.log(data);
              if (data == 1) {
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