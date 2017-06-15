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

    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                    <form action="" method="post" accept-charset="utf-8">
                      <div id="daterange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <input type="text" name="daterange" placeholder="click" />
                      </div>
                  </div>
                  <button type="submit" name="save" class="btn btn-info pull-right" value="submit"> ดูรายงาน </button>
                  <script type="text/javascript">
                    var d = new Date();
                    $('input[name="daterange"]').daterangepicker({
                        locale: {
                          minDate: '01/01/2012',
                          maxDate: d,
                          format: 'YYYY-MM-DD',
                          applyLabel: "Apply",
                          cancelLabel: "Cancel",
                          fromLabel: "From",
                          toLabel: "To",
                          customRangeLabel: "Custom",
                          daysOfWeek: [
                            "อา.",
                            "จ.",
                            "อ.",
                            "พ.",
                            "พฤ.",
                            "ศ.",
                            "ส."
                          ],
                          monthNames: [
                            "มกราคม",
                            "กุมภาพันธ์",
                            "มีนาคม",
                            "เมษายน",
                            "พฤษภาคม",
                            "มิถุนายน",
                            "กรกฎาคม",
                            "สิงหาคม",
                            "กันยายน",
                            "ตุลาคม",
                            "พฤศจิกายน",
                            "ธันวาคม"
                          ],
                          firstDay: 1
                        },
                        startDate: d,
                        endDate: d
                      },

                      function(start, end, label) {
                        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                      }
                    );
                  </script>

                  </form>

                  <?php

if(!empty($_POST['save'])){
    // print_r($_POST);
    echo "<br/>";
    
    $result = $_POST['daterange'];  // value ที่ส่งมา
    $result_explode = explode(' - ', $result);   // ขั้นด้วย '-
    //  echo "ds: ". $result_explode[0]."<br />";  // 0 คือค่าก่อน '-'
    // echo "de: ". $result_explode[1]."<br />"; // 1 ค่าหลัง '-'
    
    ?>

                    <table id="table_report" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>รหัสบิล</th>
                          <th>ชื่อสมาชิก</th>
                          <th>วันที่ออกบิล</th>
                          <th>สถานะ</th>
                          <th>เบอร์โทรสมาชิก</th>
                          <th>โต๊ะ&ห้อง</th>
                          <th>พนักงานออกบิล</th>
                          <th>ราคารวม</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
    
    $bill_id = null;
    $user_name = null;
    $date = null;
    $order_status = null;
    $user_phone = null;
    $table_id = null;
    $room_id = null;
    $epy = null;
    $order_sum = null;
    $sum = null;
    
    $query = "SELECT tb_bill.bill_id,tb_customer.customer_name,tb_bill.bill_date,tb_order.order_status,tb_customer.customer_phone,tb_employee.employee_name,tb_table.table_id,tb_room.room_id,SUM(tb_order.order_num * tb_menu.menu_price)AS total FROM tb_order INNER JOIN
    tb_bill ON tb_order.bill_id = tb_bill.bill_id INNER JOIN tb_employee ON tb_bill.employee_id = tb_employee.employee_id INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id
    LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id WHERE tb_order.order_status = 4 AND tb_bill.bill_date >='".$result_explode[0]."' AND tb_bill.bill_date
    <='".$result_explode[1]."' GROUP BY tb_order.bill_id ";
    
    if ($result = mysqli_query($con, $query)) {
        
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $bill_id = $row['bill_id'];
            $user_name = $row['customer_name'];
            $date = $row['bill_date'];
            $order_status = $row['order_status'];
            $user_phone = $row['customer_phone'];
            $table_id = $row['table_id'];
            $room_id = $row['room_id'];
            $epy = $row['employee_name'];
            $order_sum = $row['total'];
            $sum = $sum  + $order_sum ;
            ?>

                          <tr>
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
                              <?php echo $user_phone ; ?>
                            </td>
                            <td>
                              <?php if(!empty($room_id)){
                echo "ห้อง " . $room_id ;
            }else{
                echo "โต๊ะ " . $table_id ;
            } ?>
                            </td>
                            <td>
                              <?php echo $epy ;?>
                            </td>
                            <td>
                              <?php echo number_format($order_sum) . ' บาท' ; ?>
                            </td>
                            <?php
        }
        
        mysqli_free_result($result);
    }
    ?>
                              <tr>
                                <td>
                                  <?php echo "ราคารวม" ?>
                                </td>
                                <td colspan="7" style="text-align:right">
                                  <?php echo number_format($sum) . " บาท" ; ?>
                                </td>
                              </tr>
                      </tbody>
                    </table>
                    <?php  }else{ ?>

                      <table id="table_report" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>รหัสบิล</th>
                            <th>ชื่อสมาชิก</th>
                            <th>วันที่ออกบิล</th>
                            <th>สถานะ</th>
                            <th>เบอร์โทรสมาชิก</th>
                            <th>โต๊ะ&ห้อง</th>
                            <th>พนักงานออกบิล</th>
                            <th>ราคารวม</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
    $bill_id = null;
    $user_name = null;
    $date = null;
    $order_status = null;
    $user_phone = null;
    $table_id = null;
    $room_id = null;
    $epy = null;
    $order_sum = null;
    $sum = null;
    
    
    $query = "SELECT tb_bill.bill_id,tb_customer.customer_name,tb_bill.bill_date,tb_order.order_status,tb_customer.customer_phone,tb_employee.employee_name,tb_table.table_id,tb_room.room_id,SUM(tb_order.order_num * tb_menu.menu_price)AS total FROM tb_order INNER JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id INNER JOIN tb_employee ON tb_bill.employee_id = tb_employee.employee_id INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id WHERE tb_order.order_status = 4 GROUP BY tb_order.bill_id";
    
    if ($result = mysqli_query($con, $query)) {
        
        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {
            $bill_id = $row['bill_id'];
            $user_name = $row['customer_name'];
            $date = $row['bill_date'];
            $order_status = $row['order_status'];
            $user_phone = $row['customer_phone'];
            $table_id = $row['table_id'];
            $room_id = $row['room_id'];
            $epy = $row['employee_name'];
            $order_sum = $row['total'];
            $sum = $sum  + $order_sum ;
            ?>

                            <tr>
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
                                <?php echo $user_phone ; ?>
                              </td>
                              <td>
                                <?php if(!empty($room_id)){
                echo "ห้อง " . $room_id ;
            }else{
                echo "โต๊ะ " . $table_id ;
            } ?>
                              </td>
                              <td>
                                <?php echo $epy ;?>
                              </td>
                              <td>
                                <?php echo number_format($order_sum) . ' บาท' ; ?>
                              </td>
                              <?php
        }
        
        mysqli_free_result($result);
    }
    ?>
                                <tr>
                                  <td>
                                    <?php echo "ราคารวม" ?>
                                  </td>
                                  <td colspan="7" style="text-align:right">
                                    <?php echo number_format($sum) . " บาท" ; ?>
                                  </td>
                                </tr>
                                <?php     } ?>

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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>


  </body>

  </html>