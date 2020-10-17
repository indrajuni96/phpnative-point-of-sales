<?php
require_once('../db/koneksi.php');
if(!$_SESSION['username']) header('Location: ../');

if($_GET['id']){
    $id = $_GET['id'];
    $result = $conn->query('SELECT * FROM barang WHERE id="'.$id.'"');

    if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $nama = $row['nama'];
            $jenis = $row['jenis'];
            $harga = $row['harga'];
            $jumlah = $row['jumlah'];
    }
}else{
    header('Location: index.php?act=barang');
}

if(isset($_POST['submit'])){
    $hash_password = sha1($_POST["password"]);
    $result = $conn->query('UPDATE barang SET nama="'.$_POST['nama'].'", jenis="'.$_POST['jenis'].'", harga="'.$_POST['harga'].'" WHERE id="'.$id.'"');

    if($result){
        echo '<script>
                    alert("Barang ubah berhasil");
                    window.location.href="index.php?act=barang";
               </script>';
    }else{
        echo '<script>
                alert("Barang ubah gagal");
                window.location.href="index.php?act=barang";
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
            <h1>Data Kue</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Data Kue</li>
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
          <h3 class="card-title">Data Kue Ubah</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="post">
            <div class="form-group">
                <label for="namaKue">Nama Kue</label>
                <input type="text" class="form-control" id="namaKue" name="nama" placeholder="Nama Kue" value="<?= $nama?>" required>            
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Kue</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Kue" value="<?= $jenis?>" required>            
            </div>
            <div class="form-group">
                <label for="harga">Harga Jual</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Jual" value="<?= $harga?>" required>            
            </div>
            <!-- <div class="form-group">
                <label for="jumlah">Stok</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Stok" value="<?= $jumlah?>" required>            
            </div> -->

            <a href="index.php?act=barang" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">Ubah</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
