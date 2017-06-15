<?php
session_start();
include "../connectDB/connectdata.php";
require_once('../mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ

$bill_id = $_GET['id'];
$query = "SELECT tb_customer.customer_name,tb_customer.customer_address,tb_bill.bill_date,tb_employee.employee_name,tb_menu.menu_name,tb_menu.menu_price,tb_order.table_id,tb_order.room_id,order_num AS sumqty, tb_order.order_num * tb_menu.menu_price AS total FROM tb_order INNER JOIN tb_bill ON tb_order.bill_id = tb_bill.bill_id INNER JOIN tb_customer ON tb_order.customer_id = tb_customer.customer_id INNER JOIN tb_employee ON tb_bill.employee_id = tb_employee.employee_id INNER JOIN tb_menu ON tb_order.menu_id = tb_menu.menu_id LEFT JOIN tb_table ON tb_order.table_id = tb_table.table_id LEFT JOIN tb_room ON tb_order.room_id = tb_room.room_id WHERE tb_bill.bill_id = '".$bill_id."' GROUP BY tb_menu.menu_name";
$update_bill = "UPDATE `tb_bill` SET `bill_date`= NOW() ,`employee_id`= '".$_SESSION["adminID"]."' WHERE `bill_id`= '".$bill_id."' ";
$count_order_num = "SELECT COUNT(order_num),SUM(tb_order.order_num * tb_menu.menu_price) FROM `tb_order`INNER JOIN tb_menu ON tb_menu.menu_id = tb_order.menu_id WHERE bill_id = '".$bill_id."' ";
$count = mysqli_query($con,$count_order_num);
$update = mysqli_query($con,$update_bill);
$rs = mysqli_query($con,$query);
$cus_name = null;
$cus_address = null;
$bill_date = null;
$room_id = null;
$table_id = null;
$employee_name = null;
$qty = null;

while($row = mysqli_fetch_array($rs)){
    $cus_name = $row['customer_name'];
    $cus_address = $row['customer_address'];
    $bill_date = $row['bill_date'];
    $room_id = $row['room_id'];
    $table_id = $row['table_id'];
    $employee_name = $row['employee_name'];
}
?>
  <!--<style type="text/css">
tr {
    border-bottom: 1px solid #000;
    border-top: 1px solid #000;
    height: 55px;
}

td {
    background-color: transparent;
    border: 1px;
}
</style>-->
  <div align="center"><img src="images/restaurant-logo.gif" align="middle" alt="" height="200" width="300"></div>
  <br/>
  <h3 align="center"><u><b>ใบเสร็จรับเงิน</b></u></h3>
  <hr>
  <table align="center">
    <tr>
      <td>
        <?php echo "<b>เลขที่ใบเสร็จ : </b>".$bill_id ; ?>
      </td>
      <td>
        <?php if(!empty($room_id)){
    echo "<b>หมายเลขห้อง : </b>" . $room_id;
}else{
    echo "<b>หมายเลขโต๊ะ : </b>" . $table_id;
}
?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo "<b>ชื่อลูกค้า : </b>".$cus_name ; ?>
      </td>
      <td>
        <?php echo "<b>พนักงานออกบิล : </b>".$employee_name ; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo "<b>ที่อยู่ : </b>".$cus_address ; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo "<b>วันที่ออกบิล : </b>".$bill_date ; ?>
      </td>
    </tr>
  </table>
  <br/>
  <hr>
  <div align="center">
    <table align="center" style="width: 40%;border-collapse: collapse; text-align: center;" cellpadding="5">
      <thead>
        <tr style="border-bottom: 1px solid #000; border-top: 1px solid #000; height: 50px;">
          <th colspan="4" align="center">รายการ</th>
          <th>จำนวน</th>
          <th>ราคา</th>
          <th>เป็นเงิน
          </th>
        </tr>

      </thead>
      <?php foreach ($rs as $key => $value) { ?>
        <tr>
          <tbody>
            <td colspan="4">
              <?php echo $value['menu_name'] ; ?>
            </td>
            <td>
              <?php echo $value['sumqty']; ?>
            </td>
            <td>
              <?php echo $value['menu_price']; ?>
            </td>
            <td>
              <?php echo  $value['total']; ?>
            </td>
          </tbody>
        </tr>
        <?php } ?>
          
    </table>
    <table align="center" style="width: 40%;border-collapse: collapse; text-align: center;" cellpadding="5">
      <tr style="border-bottom: 1px solid #000; border-top: 1px solid #000; height: 55px;">
        <tbody>
          <td colspan="4">
            <?php
while ($row = mysqli_fetch_row($count))
{
    echo "<b>รวม ".$row[0]." รายการ</b>" ;
    ?>
          </td>
          <td style="text-align: right;" colspan="3">
            <?php
    echo "<b>รวม " . $row[1] . " บาท</b>";
}
?>
          </td>
        </tbody>
      </tr>
    </table>

    <hr>
  </div>



  <?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
ob_end_clean();
$pdf = new mPDF('thnew', 'A4', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();    // $pdf->Output("images/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
?>