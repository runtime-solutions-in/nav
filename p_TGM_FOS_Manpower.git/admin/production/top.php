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
           <!-- <img src="images/img.png" alt="">--><?php echo ucfirst($_SESSION['fld_name']); ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
           
            <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>
        <li <?php /*?>style="margin:14px 0 0 10px;"<?php */?>><a href="admin.php"><i class="fa fa-home" style="font-size:24px;"></i></a></li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->