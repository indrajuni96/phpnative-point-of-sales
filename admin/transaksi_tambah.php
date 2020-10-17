<?php
    if(!$_SESSION['username']) header('Location: ../');    
    $resultBarang = $conn->query('SELECT * FROM barang');
    
    if(isset($_POST['submit'])){
      // $invoice = date("Ydmhis");
        $result = $conn->query('INSERT INTO transaksi (barang_id,jumlah,harga,total_harga) VALUES("'.$_POST['barang_id'].'","'.$_POST['jumlah'].'","'.$_POST['harga'].'","'.$_POST['total_harga'].'")');
    
        if($result){
          $conn->query("UPDATE barang SET jumlah = jumlah - '".$_POST['jumlah']."' WHERE id = '".$_POST['barang_id']."'");
            echo '<script>alert("Item berhasil di tambah")</script>';
        }else{
            echo '<script>alert("Item gagal di tambah")</script>';
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
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Transaksi</li>
              <!-- <li class="breadcrumb-item active">Cart</li> -->
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
          <h3 class="card-title">Transaksi</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Kue</label>
                <select class="form-control" id="idBarang" name="barang_id" required>                
                <option value="" selected>Pilih</option>
                <?php
                    if($resultBarang->num_rows > 0){  
                      while($row = $resultBarang->fetch_assoc()){
                        echo "<option value='".$row['id']."'>".$row['nama']."</option>";                      
                      }
                    }
                ?>
                </select>
            </div>
            <div class="form-group" id="divBarang">
                <label for="harga">Harga</label>
                <input type="number" class="form-control"  id="harga" name="harga" placeholder="Harga" required readonly>            
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required >            
            </div>
            <div class="form-group" id="divTotalHarga">
                <label for="total">Total Harga</label>
                <input type="number" class="form-control" id="total" name="total_harga" placeholder="Total Harga" required readonly>            
            </div>
            <div id="divErrorJumlahBarang"></div>
            <a href="index.php?act=transaksi" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
