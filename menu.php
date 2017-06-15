<?php
error_reporting(E_ALL);
ob_start();
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
$sql="select * from tb_menu";
$result=mysqli_query($con,$sql);

if(isset($_GET['booking'])){
    if($_GET['booking'] == "table"){
        // echo '<script type="text/javascript">alert("table!");</script>';
        $_SESSION['booking'] = 'table' ;
        // echo "SESSION IS " .$_SESSION['booking'] ;
    }else{
        $_SESSION['booking'] = 'room' ;
        // echo '<script type="text/javascript">alert("room!");</script>';
        // echo "SESSION IS " .$_SESSION['booking'] ;
    }
}


if(isset($_GET['id']) && !empty($_GET['booking_des'])){
    $_SESSION['table&room'] = $_GET['id'];
    $_SESSION['des'] = $_GET['booking_des'];
    $_SESSION['booking_date'] = $_GET['booking_date'];
}




?>
  <html>

  <body>
    <?php include "navigation.php";?>

      <?php include "check_session.php";?>
        <br>
        <div class="container" style="width:700px">
          <h3 align="center">เลือกเมนูอาหาร</h3>
          <br>
          <?php
$x = 0;

// $textqwe = $_SESSION['table&room'];
// echo "<script type='text/javascript'>alert('$textqwe');</script>";

while($row=mysqli_fetch_array($result))

$rows[] = $row;

$menuid = null ;

foreach($rows as $row){
    $menuid = $row['menu_id'];
    $menuname = $row['menu_name'];
    $menuprice =  $row['menu_price'];
    $menupicture = $row['menu_picture'];
    // UPDATE `tb_menu` SET `menu_picture` = '001.jpg' WHERE `tb_menu`.`menu_id` = '001';
    if($x % 4 == 0) { echo '<div class="row">' ; }
    ?>
            <div class="col-sm-3 col-lg-3 col-md-3">
              <form method="post" action="cart.php?action=add&id=<?php echo $menuid ; ?>&booking=<?php echo $_SESSION['booking'] ;?>">
                <div style="border:1px solid #333;background-color:white;border-radius:5px;padding:5px;margin:1px">
                  <img src="image/food/<?php echo $menupicture; ?>" class="img-responsive" />
                  <br>
                  <h5 class="text-info">อาหาร : <?php echo $menuname;?></h5>
                  <h5 class="text-danger">ราคา: <?php echo number_format($menuprice,2);?> บาท</h5>
                  <input type="text" name="quantity" class="form-control " value="1" />
                  <input type="hidden" name="hidden_name" value="<?php echo $menuname;?>" />
                  <input type="hidden" name="hidden_price" value="<?php echo $menuprice ;?>" />
                  <center>

                    <?php
    
    $cheack_menu = "SELECT tb_weaver.*, tb_raw.* FROM tb_weaver LEFT JOIN tb_raw ON tb_raw.raw_id = tb_weaver.raw_id WHERE tb_weaver.menu_id = '".$menuid."' ";
    $rs=mysqli_query($con,$cheack_menu);
    
    $status_raw_amount = "" ;
    
    while($cheackrow=mysqli_fetch_array($rs)){
        
        $weaverid =  $cheackrow['weaver_id'];
        $weavernum = $cheackrow['weaver_num'];
        $rawamount = $cheackrow['raw_amount'];
        // print_r($cheackrow['weaver_num']);
        // exit;
        
        // echo $rawamount . " " ;
        if ($weavernum > $rawamount || $rawamount == 0){
            $status_raw_amount = "sold" ;
            break;
    }
}
// echo $status_raw_amount ;


if($status_raw_amount == "sold"){  ?>
                      <input type="submit" disabled name="add_product" style="margin-top:5px;" class="btn btn-success" value="วัตถุดิบหมด" />
                  </center>
                  <?php }else{ ?>
                    <input type="submit" name="add_product" style="margin-top:5px;" class="btn btn-success" value="สั่งอาหาร" />
                    </center>
                    <?php }  ?>
                </div>
              </form>
            </div>
            <?php
$x++;
if($x % 4 == 0){ echo '</div>'; }

}
?>
              <br>
              <div style="clear:both;"></div>
              <br>

  </body>

  </html>