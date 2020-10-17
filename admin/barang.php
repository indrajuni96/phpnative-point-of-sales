<?php
    if(!$_SESSION['username']) header('Location: ../');
    $result = $conn->query("SELECT * FROM barang");
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
              <li class="breadcrumb-item active">Data Kue</li>
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
          <h3 class="card-title">Table Data Kue</h3>

          <div class="card-tools">
          <a href="laporan_data_kue.php" class="btn btn-outline-secondary mr-2"><i class="fas fa-print"></i> Print</a>  
            <a href="index.php?act=barang_tambah" class="btn btn-primary mr-2">Tambah</a>           
          </div>
        </div>
        <div class="card-body">
        <table id="tables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kue</th>
                  <th>Jenis Kue</th>
                  <th>Harga Jual</th>
                  <th width="18%">Option</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                    if($result->num_rows > 0){
                      $n = 1;
                      while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$n."</td>";
                        echo "<td>".$row['nama']."</td>"; 
                        echo "<td>".$row['jenis']."</td>"; 
                        echo "<td>Rp. ".number_format($row['harga'])."</td>"; 
                        echo "<td>                                 
                                  <a href='index.php?act=barang_ubah&id=$row[id]' class='btn btn-sm btn-warning'>Ubah</a> 
                                  <a href='index.php?act=barang_hapus&id=$row[id]' class='btn btn-sm btn-danger'>Hapus</a>
                              </td>"; 
                        echo "</tr>"  ;
                        $n++;
                      }
                    }
                  ?>
                </tbody>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->