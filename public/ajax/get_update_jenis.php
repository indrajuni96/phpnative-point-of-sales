<?php
require_once("../../db/koneksi.php");

$json = array();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id_jenis']) && $_GET['id_jenis'] > 0) {
    $id = $_GET['id_jenis'];
    $result = $conn->query("SELECT * FROM jenis_barang WHERE id = $id");

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      $json['status'] = 200;
      $json['jenis'] = $row['jenis'];
    } else {
      $json['status'] = 500;
    }
  } else {
    $json['status'] = 400;
  }
} else {
  $json['status'] = 404;
}

echo json_encode($json);
