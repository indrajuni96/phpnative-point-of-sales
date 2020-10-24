<?php
require_once("../../db/koneksi.php");

$json = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['id_jenis'])) {
    $id = $_POST['id_jenis'];

    $delete = $conn->query("DELETE FROM jenis_barang WHERE id = $id");

    if ($delete) {
      $json['status'] = 200;
    } else {
    }
  }
}

echo json_encode($json);
