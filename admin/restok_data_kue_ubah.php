<?php
require_once('../db/koneksi.php');
if(!$_SESSION['username']) header('Location: ../');

if($_GET['id']){
    $id = $_GET['id'];
    $result = $conn->query('SELECT * FROM barang WHERE id="'.$id.'"');

    if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
            $jumlah = $row['jumlah'];
    }
}else{
    header('Location: index.php?act=barang');
}

if(isset($_POST['submit'])){
    $result = $conn->query('UPDATE barang SET jumlah= jumlah + "'.$_POST['jumlah'].'" WHERE id="'.$id.'"');

    if($result){
        echo '<script>
                    alert("Re Stock Data Kue berhasil");
                    window.location.href="index.php?act=restok_data_kue";
               </script>';
    }else{
        echo '<script>
                alert("Re Stock Data Kue gagal");
                window.location.href="index.php?act=restok_data_kue";
              </script>';
    }
}
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Re Stock Data Kue</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Re Stock Data Kue</li>
              <li class="breadcrumb-item active">Ubah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Re Stock Data Kue Ubah</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="post">
            <div class="form-group">
                <label for="namaKue">Nama Kue</label>
                <input type="text" class="form-control" id="namaKue" name="nama" placeholder="Nama Kue" value="<?= $nama?>" required readonly>            
            </div>
            <div class="form-group">
                <label for="jumlah">Stok</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Stok" required>            
            </div>

            <a href="index.php?act=restok_data_kue" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">ReStock</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
