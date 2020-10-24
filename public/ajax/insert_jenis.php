<?php
require_once("../../db/koneksi.php");

$json = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['jenis'])) {
    $jenis = $_POST['jenis'];
    $html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Terjadi kesalahan tambah jenis barang.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

    $insert = $conn->query("INSERT INTO jenis_barang (jenis) VALUES('$jenis')");

    if ($insert) {
      $json['status'] = 200;
      $json['msg'] = "Insert success";
      $json['html'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah jenis barang.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    } else {
      $json['status'] = 500;
      $json['msg'] = "Insert failed";
      $json['html'] = $html;
    }
  } else {
    $json['status'] = 400;
    $json['msg'] = "Data wajib di isi";
    $json['html'] = $html;
  }
} else {
  $json['status'] = 405;
  $json['msg'] = "Reguest method invalid";
  $json['html'] = $html;
}

echo json_encode($json);
