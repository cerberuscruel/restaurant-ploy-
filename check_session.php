<?php
if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) { ?>
  <div class="container">
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>ชื่อ : </strong>
      <?php echo $_SESSION['UserName'];  ?>
    </div>
    <?php if(isset($_SESSION['table&room']) && !empty($_SESSION['des']) && !empty($_SESSION['booking'] == "room")){ ?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">รายละเอียดการจอง</h3>
        </div>
        <div class="text-center">
          <div class="panel-body">

            <?php $date = $_SESSION['booking_date'] ;
        
        echo "<h3 class='text-info'>"."รหัสห้อง : ".$_SESSION['table&room']."</h3>" ;
        echo "<h3 class='text-warning'>"."รายละเอียดห้อง :  ".$_SESSION['des']."</h3>" ;
        echo "<h3 class='text-danger'>"."เวลาในการจอง : ".$date."</h3>" ;
        
        if(isset($_POST['clearbooking'])) {
            unset($_SESSION['booking']);
            unset($_SESSION['table&room']);
            unset($_SESSION['des']);
            unset($_SESSION["shopping_cart"]);
            header('Location: booking.php');
        }
        ?>



              <div class="text-center">
                <form action="menu.php" method="post">
                  <button type="submit" class="btn btn-danger" name="clearbooking">เลือกการจองใหม่</button>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>
  <?php }else if(isset($_SESSION['table&room']) && !empty($_SESSION['des']) && !empty($_SESSION['booking'] == "table")){ ?>
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">รายละเอียดการจอง</h3>
      </div>
      <div class="text-center">
        <div class="panel-body">

          <?php $date = $_SESSION['booking_date'] ;
        
        echo "<h3 class='text-info'>"."รหัสโต๊ะ : ".$_SESSION['table&room']."</h3>" ;
        echo "<h3 class='text-warning'>"."รายละเอียดโต๊ะ :  ".$_SESSION['des']."</h3>" ;
        echo "<h3 class='text-danger'>"."เวลาในการจอง : ".$date."</h3>" ;
        
        if(isset($_POST['clearbooking'])) {
            unset($_SESSION['booking']);
            unset($_SESSION['table&room']);
            unset($_SESSION['des']);
            unset($_SESSION["shopping_cart"]);
            header('Location: booking.php');
        }
        ?>



            <div class="text-center">
              <form action="menu.php" method="post">
                <button type="submit" class="btn btn-danger" name="clearbooking">เลือกการจองใหม่</button>
              </form>
            </div>
        </div>
      </div>
    </div>
    </div>
    <?php
    }
}else{ ?>
      <div class="text-left">
        <script language="javascript">
          alert("กรุณาล็อคอินเข้าสู่ระบบก่อน :) ");
          window.location = "index.php";
          exit(0);
        </script>
        <!--<h5>Name : คุณยังไม่ลงชื่อเข้าใช้งาน<h5>-->
      </div>
      <?php  } ?>