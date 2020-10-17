<?php
    require_once('../db/koneksi.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result =  $conn->query('DELETE FROM barang WHERE id="'.$id.'"');
        
        if($result){
            echo '<script>
                    alert("Barang hapus berhasil");
                    window.location.href="index.php?act=barang";
                  </script>';
        }else{
            echo '<script>
                    alert("Barang hapus gagal");
                    window.location.href="index.php?act=barang";
                  </script>';
        }
    }else{
        header('Location: index.php?act=barang');
    }
?>