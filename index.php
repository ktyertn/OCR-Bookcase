<?php
session_start();
ob_start();
define('__ROOT__', dirname(__FILE__));
define('LINK', 'http://localhost:80/iso');

require __ROOT__ . "/layouts/header.php";

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kütüphane</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Anasayfa</span>
        </a>
        <hr class="sidebar-divider my-0">
        
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Üyelik İşlemleri</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="register.php">Sign Up</a>
            <a class="collapse-item" href="login.php">Login</a>
          </div>
        </div>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
        <a class="nav-link" href="admin_login.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin</span>
        </a>
        <hr class="sidebar-divider my-0">




    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="header">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>
        <!-- End of Topbar -->

        <?php
        require_once __ROOT__ . "/layouts/footer.php";
        ?>

        <!-- End of Footer -->

      </div>


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>





</body>

</html>