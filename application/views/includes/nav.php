<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

   <ul class="navbar-nav ml-auto">
    <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="dropdown">
              <i class="far fa-user mr-2"></i>
              <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
              <li class="user-header mb-3 mt-3 ml-5">
                <p>
                  You Login as <b><?php echo $this->session->userdata('username');?></b>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer mb-2">
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout') ?>" class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Log out</a>
                </div>
              </li>
            </ul>
          </li>
  </ul>
 
</nav>
<!-- /.navbar -->