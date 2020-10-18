<?php
include_once('../db/koneksi.php');

if (isset($_SESSION['cart'])) {
    $invoice = 'FK-' .  date("Ydmhis");
    $tanggal = date("Ymd");
    $grandTotal = 0;

    $queryInsertTransaksi = "INSERT INTO transaksi (invoice,tanggal) VALUES('$invoice',$tanggal)";

    if ($conn->query($queryInsertTransaksi) === TRUE) {
        $last_id_transaksi = $conn->insert_id;

        foreach ($_SESSION['cart'] as $key => $value) {
            $datas[] = "($last_id_transaksi," . $value["barang_id"] . "," . $value["jumlah"] . "," . $value["harga"] . ")";
            $grandTotal += $value['jumlah'] * $value['harga'];
        }

        $queryInsertTransaksiDetail = "INSERT INTO transaksi_detail (id_transaksi,id_barang, jumlah, harga) VALUES " . implode(',', $datas);
        $conn->query($queryInsertTransaksiDetail);

        $queryInsertTransaksiBayar = "INSERT INTO transaksi_bayar (id_transaksi,total_bayar) VALUES($last_id_transaksi,$grandTotal)";

        $conn->query($queryInsertTransaksiBayar);
        unset($_SESSION['cart']);

        echo '<script>
            alert("Checkout Berhasil");
                window.location.href="struk.php?invoice=FK-' . $invoice . '";
            </script>';
    } else {
        echo "<script>alert('Terjadi kesahalan! Transaksi gagal');window.location.href='index.php?act=transaksi'</script>";
    }
} else {
    echo "<script>alert('Checkout gagal! Transaksi kosong');window.location.href='index.php?act=transaksi'</script>";
}
