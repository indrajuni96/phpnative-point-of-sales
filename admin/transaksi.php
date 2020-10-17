<?php
if (!$_SESSION['username']) header('Location: ../');
if (isset($_SESSION['delete'])) {
  $conn->query('DELETE FROM transaksi');
  unset($_SESSION['delete']);
}
// $result = $conn->query("SELECT  a.id, a.barang_id, SUM(a.jumlah) AS jumlah , a.harga, SUM(a.total_harga) AS total_harga, b.nama  FROM transaksi a INNER JOIN barang b ON a.barang_id = b.id GROUP BY a.barang_id");

$result = $conn->query("SELECT * FROM barang");
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
            <li class="breadcrumb-item active">Transaksi</li>
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
        <h3 class="card-title">Table Data Transaksi Kue</h3>

        <div class="card-tools">
          <a href="checkout.php" class="btn btn-outline-secondary mr-2"><i class="fas fa-print"></i>Simpan & Cetak</a>
        </div>

        <div class="card-tools">
          <a href="index.php?act=transaksi_tambah" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tambah</a>
        </div>

        <div class="card-body">
          <table id="tablesx" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kue</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // $grandTotal = 0;
              // if($result->num_rows > 0){
              //   $n = 1;
              //   while($row = $result->fetch_assoc()){
              //     echo "<tr>";
              //     echo "<td>".$n."</td>";
              //     echo "<td>".$row['nama']."</td>"; 
              //     echo "<td>Rp. ".number_format($row['harga'])."</td>"; 
              //     echo "<td>".$row['jumlah']."</td>"; 
              //     echo "<td>Rp. ".number_format($row['total_harga'])."</td>"; 
              //     echo "<td> 
              //           <a href='index.php?act=transaksi_hapus&id=$row[barang_id]' class='btn btn-sm btn-danger'>Hapus</a>
              //         </td>"; 
              //     echo "</tr>"  ;
              //     $n++;
              //     $grandTotal += $row['total_harga'];
              //   }
              // }

              $grandTotal = 0;
              $n = 1;
              if (isset($_SESSION['cart'])) {
                $barang_id = array_column($_SESSION['cart'], 'barang_id');

                while ($row = $result->fetch_assoc()) {
                  foreach ($_SESSION['cart'] as $key => $value) {
                    if ($row['id'] == $value['barang_id']) {
                      echo "<tr>";
                      echo "<td>" . $n . "</td>";
                      echo "<td>" . $row['nama'] . "</td>";
                      echo "<td>Rp. " . number_format($row['harga']) . "</td>";
                      // echo "<td>" . $row['jumlah'] . "</td>";
                      echo "<td>" . $value['jumlah'] . "</td>";
                      echo "<td>Rp. " . number_format($value['jumlah'] * $row['harga']) . "</td>";
                      echo "<td> 
                              <a href='index.php?act=transaksi_hapus&id=$row[id]' class='btn btn-sm btn-danger'>Hapus</a>
                            </td>";
                      echo "</tr>";
                      $n++;
                      $grandTotal += $value['jumlah'] * $row['harga'];
                    } //end if
                  } //end foreach
                } //end while
              } //end if
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4" class="text-right"><b>Grand Total</b></td>
                <td colspan="2">Rp. <?= number_format($grandTotal); ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->