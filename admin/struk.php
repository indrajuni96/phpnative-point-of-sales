<?php
include '../db/koneksi.php';

$id_transaksi = $_GET['id_transaksi'];
$invoice = $_GET['invoice'];

$result = $conn->query("SELECT * FROM transaksi_bayar WHERE id_transaksi = $id_transaksi");
$grandTotal = $result->fetch_assoc();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="invoice.css">
<title>Invoice <?= $invoice ?></title>
<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print no-print d-print-none">
        <div class="text-right">
            <button id="printInvoice" onclick="javascript:window.print()" class="btn btn-info no-print"><i class="fa fa-print"></i> Print</button>
            <a href="index.php?act=history" class="btn btn-danger">Back</a>
            <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto" id="invoice">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <br>
                        <br>
                        <h3>Invoice: <?= $invoice ?></h3>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                                Amie Kue
                            </a>
                        </h2>
                        <div>Villa Bekasi indah 2, Ruko edelwies</div>
                        <div>081234567899</div>
                        <div>amiekue@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">Nama Kue</th>
                            <th class="text-right">Harga Jual</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $transaksi = mysqli_query($conn, "SELECT T.id,T.invoice,T.tanggal,TD.jumlah,TD.harga,B.nama  FROM transaksi AS T INNER JOIN transaksi_detail AS TD ON T.id = TD.id_transaksi INNER JOIN  transaksi_bayar AS TB ON T.id = TB.id_transaksi INNER JOIN  barang AS B ON TD.id_barang =  B.id WHERE T.id = $id_transaksi");

                        while ($row = mysqli_fetch_array($transaksi)) :
                            $i++;
                        ?>
                            <tr>
                                <td class="no"><?php echo $i; ?></td>
                                <td class="text-left">
                                    <h3><?= $row['nama'];  ?></h3>
                                </td>
                                <td class="unit">Rp. <?php echo number_format($row['harga']); ?></td>
                                <td class="qty"><?php echo $row['jumlah']; ?></td>
                                <td class="total">Rp. <?php echo number_format($row['jumlah'] * $row['harga']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>

                            <td>Rp. <?= number_format($grandTotal['total_bayar']) ?></td>
                        </tr>
                    </tfoot>
                </table>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
        </div>
    </div>