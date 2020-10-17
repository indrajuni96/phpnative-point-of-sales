<?php 
include_once('../db/koneksi.php');
$_SESSION['delete'] = true;

$result = $conn->query("SELECT * FROM transaksi");
$invoice = date("Ydmhis");
$datas = array();
while($row = $result->fetch_assoc()){
	$datas[] = "('FK-".$invoice."',".date("Ymd").",".$row["barang_id"].",".$row["jumlah"].",".$row["harga"].",".$row["total_harga"].")";
}
$queryInsert = "INSERT INTO history (invoice, tanggal, barang_id, jumlah, harga, total_harga) VALUES ".implode(',',$datas);
$cekQuery = $conn->query($queryInsert);

if($cekQuery){
    echo '<script>
    alert("Checkout Berhasil");
        window.location.href="struk.php?invoice=FK-'.$invoice.'";
    </script>';
}else{

	echo "<script>alert('Checkout gagal! Transaksi kosong');window.location.href='index.php?act=transaksi'</script>";

}
?>