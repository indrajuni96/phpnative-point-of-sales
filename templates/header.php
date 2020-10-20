<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMIE KUE</title>
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/bg1.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?= BASEURL; ?>/assets/template/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light"><b>Dashboard</b></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../assets/template/dist/img/girl.png" class="img-circle elevation-2 bg-info" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <?php

              if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
              }
              ?>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="index.php?act=barang" class="nav-link">
                <i class="nav-icon fas fa-file-signature"></i>
                <p>
                  Data Kue
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="index.php?act=restok_data_kue" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  ReStock Data Kue
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="index.php?act=transaksi" class="nav-link">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="index.php?act=history" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  History
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="index.php?act=users" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>