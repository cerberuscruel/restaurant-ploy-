<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <?php if($_SESSION['adminDep'] == 1){ ?>
                <img src="images/img.jpg" alt="...">
                <?php }else if($_SESSION['adminDep'] == 2){?>
                  <img src="images/cook.png" alt="...">
                  <?php }else if($_SESSION['adminDep'] == 3){ ?>
                    <img src="images/cashier.png" alt="...">
                    <?php }
if($_SESSION['adminDep'] == 1 ){
    echo "ผู้ดูแลระบบ" ;
}else if($_SESSION['adminDep'] == 2 ){
    echo "พ่อครัว" ;
}else if($_SESSION['adminDep'] == 3 ){
    echo "แคชเชียร์" ;
} ?>
                      <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
          </li>

          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-green">6</span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
<span>John Smith</span>
                  <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
<span>John Smith</span>
                  <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
<span>John Smith</span>
                  <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
                </a>
              </li>
              <li>
                <a>
                  <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                  <span>
<span>John Smith</span>
                  <span class="time">3 mins ago</span>
                  </span>
                  <span class="message">
Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
                </a>
              </li>
              <li>
                <div class="text-center">
                  <a>
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->