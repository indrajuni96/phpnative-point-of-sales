<?php
include '../db/koneksi.php';
$inv=$_GET['invoice'];

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="invoice.css">
<title>Invoice <?=$inv?></title>
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
     					<h3>Invoice: <?=$inv?></h3>
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
                    	$i=0;
                    	$sql=mysqli_query($conn,"SELECT * from history where invoice = '".$inv."'");
                    	while ($row=mysqli_fetch_array($sql)) { $i++;
                    		$barang=mysqli_fetch_array(mysqli_query($conn,"SELECT * from barang where id='".$row['barang_id']."'"));
                    	?>
                        <tr>
                            <td class="no"><?php echo $i; ?></td>
                            <td class="text-left"><h3><?php echo $barang['nama']; ?></h3><!-- Optimize the site for search engines (SEO) --></td>
                            <td class="unit">Rp. <?php echo number_format($barang['harga']); ?></td>
                            <td class="qty"><?php echo $row['jumlah']; ?></td>
                            <td class="total">Rp. <?php echo number_format($row['total_harga']);?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr> -->
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>Rp. <?php $ngen=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(total_harga) as tot from history where invoice='".$inv."'"));
                            echo number_format($ngen['tot']);
                             ?></td>
                        </tr>
                    </tfoot>
                </table>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>