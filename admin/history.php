<?php
    if(!$_SESSION['username']) header('Location: ../');

    $result = $conn->query("SELECT  id, invoice,tanggal, SUM(jumlah) AS jumlah , SUM(total_harga) AS total_harga FROM history GROUP BY invoice ");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">History</li>
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
          <h3 class="card-title">Table History</h3>

          <div class="card-tools">
            <a href="laporan_history.php" class="btn btn-outline-secondary mr-2"><i class="fas fa-print"></i> Print</a> 
          </div>
        </div>

        <div class="card-body">
        <table id="tables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                    if($result->num_rows > 0){
                      $n = 1;
                      while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$n."</td>";
                        echo "<td><a href='struk.php?invoice=".$row['invoice']."'>".$row['invoice']."</a></td>"; 
                        echo "<td>".$row['tanggal']."</td>"; 
                        echo "<td>".$row['jumlah']."</td>"; 
                        echo "<td>Rp. ".number_format($row['total_harga'])."</td>"; 
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