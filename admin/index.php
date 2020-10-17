<?php
require_once("../db/koneksi.php");

	if (isset($_SESSION['username'])) {
		if (isset($_GET['act'])) {
					$page = $_GET['act'];
				}else{
					$page = "dashboard";
				} 
					
				if (file_exists($page.'.php')) {
					$title = ucwords(str_replace('-', ' ', $page));
					include('header.php');
					include($page.'.php');
					include('footer.php');
				}else{
					$title = "404 ERROR";
					include('header.php');
					include('404.php');
					include('footer.php');
		}
	}else{
		echo '<script>window.location="../index.php";</script>';
	}  
?>