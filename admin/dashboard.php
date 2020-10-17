<?php
if (!$_SESSION['username']) header('Location: ../');

$jumlahUser = $conn->query('SELECT * FROM users')->num_rows;
$jumlahBarang = $conn->query('SELECT * FROM barang')->num_rows;
$jumlahTransaksi = $conn->query('SELECT * FROM transaksi')->num_rows;
$jumlahStock = $conn->query('SELECT SUM(jumlah) as stock FROM barang')->fetch_assoc();

if ($jumlahUser === 0) {
  $jumlahUser = 0;
} elseif ($jumlahBarang === 0) {
  $jumlahBarang = 0;
} elseif ($jumlahTransaksi === 0) {
  $jumlahTransaksi = 0;
}

if ($jumlahStock == 0 || !$jumlahStock) $jumlahStock = 0;
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jumlahUser; ?></h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="far fa-user"></i>
            </div>
            <a href="index.php?act=users" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $jumlahBarang; ?></h3>

              <p>Product Kue</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            <a href="index.php?act=barang" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jumlahTransaksi; ?></h3>

              <p>History Transaksi</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="index.php?act=history" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jumlahStock['stock']; ?></h3>

              <p>Stok Kue</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="index.php?act=restok_data_kue" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- ./col -->
    </div>

    <div class="row d-flex justify-content-center my-3">
      <div class="col-3">
        <img src="../assets/images/bg1.png" class="img-fluid" alt="Ami Kue">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1 class="text-center font-weight-bold">Amie Kue</h1>
      </div>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->