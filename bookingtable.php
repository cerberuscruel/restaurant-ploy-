<?php
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
if(isset($_SESSION['booking']) && !empty($_SESSION['booking'])) {
 header('Location: menu.php');
 exit;
}
?>


  <!DOCTYPE html>
  <html lang="en">

  <body>

    <?php include "navigation.php";?>

      <!-- Page Content -->
      <div class="container">

        <?php include "check_session.php";?>

          <table class="table table-condensed">
            <thead>
              <tr>
                <th>หมายเลขโต๊ะ</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th>จอง</th>
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
                <!--href="customer-edit.php?id=-->
                <tr>
                  <td>
                    <?php echo $tableid ; ?>
                  </td>
                  <td>
                    <?php echo $tabledes ; ?>
                  </td>
                  <td>
                    <?php if($tablestatus == 0){ ?>
                      <button class="btn btn-danger">ไม่ว่าง</button>
                      <td>
                        <a href="menu.php?id=<?php echo $tableid ; ?>">
                          <button disabled="disabled" id="btn_add" class="btn btn-info ">จอง</button>
                        </a>
                      </td>
                      <?php }else if($tablestatus == 1){ ?>
                        <button class="btn btn-success">ว่าง</button>
                        <td>
                          <a class='btn-booking' data-OrderID="<?php echo $tableid ;?>" data-Des="<?php echo $tabledes ;  ?>" data-toggle='modal' data-target="#create-item">
                            <button type="submit" class="btn btn-info">จอง</button>
                          </a>
                        </td>
                        <?php }else{ ?>
                          <button class="btn btn-warning">กำลังใช้งานอยู่</button>
                          <td>
                            <a href="menu.php?id=<?php echo $tableid ; ?>">
                              <button disabled="disabled" id="btn_add" class="btn btn-info ">จอง</button>
                            </a>
                          </td>
                          <?php } ?>
                  </td>
                  <!--bookingyesno-->
                  </form>
                </tr>
                <?php
    }
    
    mysqli_free_result($result);
}

mysqli_close($con);
?>
                  <!-- Create Item Modal -->
                  <div class="col-lg-12 margin-tb">
                    <form id="frm-date">
                      <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title" id="myModalLabel">กรุณากรอกและระบุเวลาที่แน่นอนสำหรับการจอง!!</h3>
                            </div>

                            <div class="modal-body">

                              <input type="hidden" id="table_id" value="">
                              <input type="hidden" id="table_des" value="">

                              <div class="form-group">
                                <label for="date_booking">กรุณาเลือกวันที่ :</label>
                                <input type="date" id="date_booking" required placeholder="กรุณากรอกชื่อของท่าน" class="form-control" />
                              </div>

                              <input type="close" class="btn btn-danger" data-dismiss="modal" value="Close">
                              <input type="submit" class="btn btn-primary" id="btn_submit" value="Add">

                            </div>
                            <div class="modal-footer">
                              <h5 class="modal-title" id="myModalLabel">**หลังจากทำการจองโต๊ะล่วงหน้าแล้วหากท่านไม่ประสงค์จะเปลี่ยนแปลงข้อมูลการจองกรุณาโทร.
มายืนยันที่ร้านอีกครั้งก่อนเวลาจริงอย่างน้อยหนึ่งชั่วโมง</h5>
                              <br>

                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Creat item -->

            </tbody>

          </table>




      </div>
      <!-- /.container -->

      <hr>

      <!-- Footer -->
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Echobear 2017</p>
          </div>
        </div>
      </footer>


      <script>
        $(function() {
          $('.btn-booking').click(function(e) {
            e.preventDefault();
            var Id = $(this).attr('data-OrderID');
            var Des = $(this).attr('data-Des');
            $("#table_id").val(Id);
            $("#table_des").val(Des);
            console.log(Id);

            $("#frm-date").submit(function(event) {
              event.preventDefault();

              var Id = $('#table_id').val();
              var booking_des = $('#table_des').val();
              var booking_date = $('#date_booking').val();


              // alert(Id + " " + booking_des + " " + booking_date);

              // return 1;

              if (confirm('คุณต้องการจะจองอาหารเลยหรือไม่ ? ') == true) {
                window.location.href = "menu.php?id=" + Id + "&booking_des=" + booking_des + "&booking_date=" + booking_date + "&booking=table";
                $('#frm-date')[0].reset();
                event.preventDefault();
              } else {
                if (confirm('คุณต้องการจะจองแค่โต๊ะใช่หรือไม่ ? ') == true) {
                  window.location.href = "booking_add.php?id=" + Id + "&booking_des=" + booking_des + "&booking_date=" + booking_date + "&booking=table";
                  event.preventDefault();
                } else {
                  $('#frm-date')[0].reset();
                  $('#create-item').modal('hide')
                }
              }
            });
          });
        });
      </script>



  </body>

  </html>