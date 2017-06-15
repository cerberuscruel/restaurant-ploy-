<?php
error_reporting(E_ALL);
session_start();
require 'connectDB/connectdata.php';
include "header.php" ;
include "include/modal.php";
include "include/function.php";
?>

  <!DOCTYPE html>
  <html lang="en">

  <body>

    <?php include "navigation.php";?>

      <!-- Page Content -->
      <div class="container">
        <?php
if(isset($_SESSION['UserID']) && !empty($_SESSION['UserID'])) { ?>
          <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>ชื่อ : </strong>
            <?php echo $_SESSION['UserName'];  ?>
          </div>

          <?php }else{  ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>แจ้งเตือน : </strong> คุณยังไม่ลงชื่อเข้าใช้งาน
            </div>
            <?php  } ?>

              <div class="row">



                <div class="col-md-12">

                  <div class="row carousel-holder">

                    <div class="col-md-12">
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img class="slide-image" src="image/slide1.jpg" alt="">
                          </div>
                          <div class="item">
                            <img class="slide-image" src="image/slide2.jpg" alt="">
                          </div>
                          <div class="item">
                            <img class="slide-image" src="image/slide3.jpg" alt="">
                          </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                      </div>
                    </div>

                  </div>

                  <div class="text-center">
                    <h1>Restaurant
<h1>
</div><hr> <br/>

<?php
$query = "SELECT * FROM `tb_menu` ";

if ($result = mysqli_query($con, $query)) {
    $x = 0;
    /* fetch associative array */
    while ($row = mysqli_fetch_assoc($result)) {
        
        if($x % 4 == 0) { echo '<div class="row">' ; }
        
        ?>
        
        <div class="col-sm-3 col-lg-3 col-md-3">
        <div class="thumbnail">
        <img src="image/food/<?php echo $row['menu_picture']; ?>" alt=""> <!--320X150 -->
        <div class="caption">
        <h3 class="pull-right">
        <?php echo $row['menu_price'] . "฿" ; ?>
        </h3>
        <h3>
        <a href="#">
        <?php echo $row['menu_name'] ; ?>
        </a>
        </h3>
        </br>
        <p>
        <?php echo $row['menu_des'] ; ?>
        </p>
        </div>
        <div class="ratings">
        <p class="pull-right">15 reviews</p>
        <p>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        <span class="glyphicon glyphicon-star"></span>
        </p>
        </div>
        </div>
        </div>
        
        <?php
        $x++;
        if($x % 4 == 0){ echo '</div>'; }
    }
}


?>


</div>

</div>

</div>

</div>
<!-- /.container -->

<input type="hidden" id="insertsuccess" class="btn btn-success">
<input type="hidden" id="loginsuccess" class="btn btn-success">
<input type="hidden" id="insertdup" class="btn btn-success">


<div class="container">

<hr>

<!-- Footer -->
<footer>
<div class="row">
<div class="col-lg-12">
<p>Copyright &copy; Echobear 2017</p>
</div>
</div>
</footer>


</body>

</html>

<?php
function showProduct() {
    echo "Hello world!";
}
?>