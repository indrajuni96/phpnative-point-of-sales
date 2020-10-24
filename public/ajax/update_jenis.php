<?php
require_once("../../db/koneksi.php");

$json = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['jenis'])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];

    $update = $conn->query("UPDATE jenis_barang SET jenis = '$jenis' WHERE id = '$id'");

    if ($update) {
      $json['status'] = 200;
      $json['message'] = 'Data jenis berhasil di edit';
    } else {
      $json['status'] = 500;
    }
  } else {
    $json['status'] = 400;
  }
} else {
  $json['status'] = 405;
}

echo json_encode($json);
