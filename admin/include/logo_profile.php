<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
  <div class="navbar nav_title" style="border: 0;">
    <a href="index.php" class="site_title"><i class="fa fa-laptop"></i> <span>Restaurant !</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <?php if($_SESSION['adminDep'] == 1){ ?>
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
        <?php }else if($_SESSION['adminDep'] == 2){?>
          <img src="images/cook.png" alt="..." class="img-circle profile_img">
          <?php }else if($_SESSION['adminDep'] == 3){ ?>
            <img src="images/cashier.png" alt="..." class="img-circle profile_img">
            <?php } ?>
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2><?php echo $_SESSION['adminName'] ; ?></h2>
    </div>
  </div>
  <!-- /menu profile quick info -->