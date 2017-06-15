<?php
error_reporting(E_ALL);
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['adminID']) && !empty($_SESSION['adminID'])) {
    if($_SESSION['adminDep'] == 1){
        ?>
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a><i class="fa fa-edit"></i> การตั้งค่า <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="employee.php">Employee</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="table.php">Table</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="room.php">Room</a></li>
            <li><a href="import.php">Import(นำเข้าวัตถุดิบ)</a></li>
            <li><a href="weaver.php">Weaver(ส่วนประกอบ)</a></li>
            <li><a href="raw.php">Raw(วัตถุดิบ)</a></li>
            <li><a href="order.php">Order(รายการสั่งอาหาร)</a></li>
            <li><a href="order_table.php">OrderTable(รายการจองของโต๊ะ)</a></li>
            <li><a href="order_room.php">OrderRoom(รายการจองของห้อง)</a></li>
            <!--<li><a href=""></a></li>-->
          </ul>
        </li>
        <li><a><i class="fa fa-bar-chart-o"></i> เปลี่ยนแปลงสถานะห้อง&โต๊ะ <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="status_room.php">เปลี่ยนแปลงสถานะห้อง</a></li>
            <li><a href="status_table.php">เปลี่ยนแปลงสถานะโต๊ะ</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-desktop"></i> การจัดการการขาย <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="order-buy1.php">รายการสั่งอาหาร</a></li>
            <li><a href="order-buy2.php">รายการที่เสิร์ฟ</a></li>
            <li><a href="order-buy3.php">ออกใบเสร็จ</a></li>
          </ul>
        </li>
        <li><a href="report.php"><i class="fa fa-table"></i> รายงาน </a>
        </li>

      </ul>
    </div>
  </div>

  <?php }else if($_SESSION['adminDep'] == 2){ ?>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-desktop"></i> การจัดการการขาย <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="order-buy2.php">รายการที่ดำเนินการ</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <?php } if($_SESSION['adminDep'] == 3){ ?>
      <!-- แคชเชียร์ -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a><i class="fa fa-edit"></i> การตั้งค่า <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="order.php">Order(รายการสั่งอาหาร)</a></li>
                <li><a href="order_table.php">OrderTable(รายการจองของโต๊ะ)</a></li>
                <li><a href="order_room.php">OrderRoom(รายการจองของห้อง)</a></li>
                <!--<li><a href=""></a></li>-->
              </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> เปลี่ยนแปลงสถานะห้อง&โต๊ะ <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="status_room.php">เปลี่ยนแปลงสถานะห้อง</a></li>
                <li><a href="status_table.php">เปลี่ยนแปลงสถานะโต๊ะ</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> การจัดการการขาย <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="order-buy1.php">รายการสั่งอาหาร</a></li>
                <li><a href="order-buy3.php">รออนุมัติอาหาร</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
      <?php } }else{ header("location: login.php"); } ?>