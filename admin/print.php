<?php include('session.php'); ?>
<?php include('header.php'); 

$id = $_GET['id'];
?>
<body>

<?php include('navbar.php'); 
?>
<script>
		window.print();
	</script>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">

	<table class="table">
		<?php 
		$pd=mysqli_query($conn,"select * from sales_detail left join product on product.productid=sales_detail.productid where salesid='".$id."'");
// while($pdrow=mysqli_fetch_array($pd)){
		foreach ($pd as $pdrow) {
		?>
		<tr>
			<td>Product Name</td>
			<td><?php echo ucwords($pdrow['product_name']); ?></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><?php echo ucwords($pdrow['product_price']) ?></td>
		</tr>
		<tr>
			<td>Purchase Qty</td>
			<td><?php echo ucwords($pdrow ['sales_qty']) ?></td>
		</tr>
		<tr>
			<td>SubTotal</td>
			<td><?php
				$subtotals = [];
				$subtotals[] = $pdrow['product_price']*$pdrow['sales_qty'];
				$subtotal[] = $pdrow['product_price']*$pdrow['sales_qty'];
				echo $subtotals[0];
				//var_dump($subtotal) ?></td>
				<br>

		</tr>
		
		<?php
			}
		?>
		<tr>
			<td>TOTAL</td>
				<td><?= $totals = array_sum($subtotal);  ?></td>
		</tr>
		<!--<tr>
			<td>Harga service</td>
			<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
		</tr>-->
		<!-- <tr>
			<td>Harga service</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>No.Tlpn</td>
			<td><?php echo $d['No_tlpn'] ?></td>
		</tr>
		<tr>
			<td>jenis kerusakaan</td>
			<td><?php echo $d['jenis_kerusakan'] ?>
		</tr> -->
	</table>

</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
</body>
<div class="foot">
<footer>
<p> POS </p>
</footer>
<style> .foot{text-align: center; border: 2px solid black;}</style>
</div>
</html>