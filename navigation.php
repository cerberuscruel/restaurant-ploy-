<?php
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) { //เช็คว่า เจอค่าไหม
    
    ?>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Restaurant</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="index.php" class="glyphicon glyphicon-home"> หน้าแรก</a>
          </li>
          <?php
    if(isset($_SESSION['booking']) && !empty($_SESSION['booking'])) { ?>
            <li>
              <a href="menu.php" class="glyphicon glyphicon-check"> เลือกเมนู</a>
            </li>
            <?php }else{ ?>
              <li>
                <a href="booking.php" class="glyphicon glyphicon-check"> จองโต๊ะ/ห้องอาหาร</a>
              </li>

              <?php } ?>


                <li class="dropdown">
                  <a class="dropdown-toggle glyphicon glyphicon-list" data-toggle="dropdown" href="#"> รายการที่สั่ง
    <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cart.php">ตะกร้าสินค้า</a></li>
                    <li><a href="view_order.php">รายการที่สั่ง</a></li>
                    <li><a href="view_tableorroom.php">รายการจองห้องและโต๊ะ</a></li>
                  </ul>
                </li>
                <li>
                  <a href="admin/" class="glyphicon glyphicon-tower"> ผู้ดูแลระบบ</a>
                </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Profile</button>
            <ul class="dropdown-menu">
              <li><a href="logout.php" class="glyphicon glyphicon-lock"> Logout</a></li>
            </ul>
          </div>

      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <?php  }else{ ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Restaurant</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php" class="glyphicon glyphicon-home"> หน้าแรก</a>
            </li>
            <li>
              <a href="booking.php" class="glyphicon glyphicon-check"> จองโต๊ะ/ห้องอาหาร</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-lock"></span> Login</button>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Login Menu</li>
                <li><a class="glyphicon glyphicon-lock" id="myBtn"> Login</a></li>
                <li class="dropdown-header">Registor Menu</li>
                <li><a class="glyphicon glyphicon-cog" id="myRegis"> Registor</a></li>
              </ul>
            </div>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <?php  }

?>


      <script>
        $(document).ready(function() {
          $("#myBtn").click(function() {
            $("#myModal").modal();
          });
        });
      </script>

      <script>
        $(document).ready(function() {
          $("#myRegis").click(function() {
            $("#regis").modal();
          });
        });
      </script>


      <!--Login-->
      <script>
        $(function() {
          $("#frm").submit(function(event) {
            event.preventDefault();
            // alert("alert"); return 1;
            var msg = $('#loginsuccess').trigger("click");
            var usrname = $('#usrname').val();
            var psw = $("#psw").val();

            $.post("check_login.php", {
              Username: usrname,
              Password: psw,
            }).done(function(data) {
              console.log(data);
              if (data == 1) {
                $('#frm')[0].reset();
                $('#myModal').modal('hide');
                location.reload();
                msg.show();
              } else {
                alert("Username Or Password ผิด !");
                $('#frm')[0].reset();
              }
            });
          });
        });
      </script>
      <!--Login-->

      <!--Regis-->
      <script>
        $(function() {
          $("#frmregis").submit(function(event) {
            event.preventDefault();
            // alert("alert"); return 1;
            var msg = $('#insertsuccess').trigger("click");
            var msg1 = $('#insertdup').trigger("click");
            var iduser = $('#iduser').val();
            var usrfullname = $("#usrfullname").val();
            var useraddress = $("#useraddress").val();
            var useremail = $('#useremail').val();
            var userphone = $("#userphone").val();
            var username = $("#username").val();
            var password = $("#password").val();

            // alert(usrname." ".password);


            $.post("regis.php", {
              iduser: iduser,
              usrfullname: usrfullname,
              useraddress: useraddress,
              useremail: useremail,
              userphone: userphone,
              username: username,
              password: password,
            }).done(function(data) {
              console.log(data);
              if (data == 1) {
                // msg1.show();
                alert("เลขบัตรซ้ำ");
                $('#frmregis')[0].reset();
              } else if (data == 2) {
                $('#frmregis')[0].reset();
                $('#regis').modal('hide');
                location.reload();
                msg.show();
              } else if (data == 3) {
                alert("สมัครสมาชิกไม่สำเร็จ :( ");
                $('#frmregis')[0].reset();
                $('#regis').modal('hide');
                location.reload();
              }
            });
          });
        });
      </script>
      <!--Regis-->