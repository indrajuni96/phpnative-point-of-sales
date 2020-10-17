<?php
    if(!$_SESSION['username']) header('Location: ../');
    
    if(isset($_POST['submit'])){
        $result = $conn->query('INSERT INTO barang ( nama,jenis,harga,jumlah) VALUES("'.$_POST['nama'].'","'.$_POST['jenis'].'","'.$_POST['harga'].'","'.$_POST['jumlah'].'")');
    
        if($result){
            echo '<script>alert("Barang tambah berhasil")</script>';
        }else{
            echo '<script>alert("Barang tambah gagal")</script>';
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
            <h1>Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Barang</li>
              <li class="breadcrumb-item active">Tambah</li>
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
          <h3 class="card-title">Barang Tambah</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="post">
        <div class="form-group">
                <label for="namaKue">Nama Kue</label>
                <input type="text" class="form-control" id="namaKue" name="nama" placeholder="Nama Kue" required>            
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Kue</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Kue" required>            
            </div>
            <div class="form-group">
                <label for="harga">Harga Jual</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Jual" required>            
            </div>
            

            <a href="index.php?act=barang" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->