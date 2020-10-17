<?php 
session_start();
require_once("db/koneksi.php");
 
if (isset($_SESSION['id_user']) && isset($_SESSION['level'])) {
	if ($_SESSION['level'] == 'admin'){
		echo '<script>window.location="admin";</script>';
	}elseif($_SESSION['level'] == 'walikelas'){
		echo '<script>window.location="walikelas";</script>';
	}elseif ($_SESSION['level'] == 'guru') {
		echo '<script>window.location="guru";</script>';
	}elseif ($_SESSION['level'] == 'siswa') {
		echo '<script>window.location="siswa";</script>';
	}
}else{
	echo "Maaf Tidak Bisa Masuk, anda harus login terlebih dahulu...";
} 
 ?>
