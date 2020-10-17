<?php
    require_once('../db/koneksi.php');

    if(isset($_GET['id'])){
        // $id = $_GET['id'];        
        // $resultStok = $conn->query('SELECT SUM(jumlah) AS jumlah FROM transaksi WHERE barang_id="'.$id.'"')->fetch_assoc();
        // $conn->query('UPDATE barang SET jumlah = jumlah + "'.$resultStok['jumlah'].'" WHERE id="'.$id.'"');

        // $result =  $conn->query('DELETE FROM transaksi WHERE barang_id="'.$id.'"');
        
        foreach($_SESSION['cart'] as $key => $value){
            if($value["barang_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);

                echo '<script>
                alert("Item berhasil di hapus");
                window.location.href="index.php?act=transaksi";
              </script>';
            }else{
                echo '<script>
                    alert("Item gagal di hapus");
                    window.location.href="index.php?act=transaksi";
                  </script>';
            }
        }

        // if($result){
        //      echo '<script>
        //             alert("Item berhasil di hapus");
        //             window.location.href="index.php?act=transaksi";
        //           </script>';
        // }else{
        //     echo '<script>
        //             alert("Item gagal di hapus");
        //             window.location.href="index.php?act=transaksi";
        //           </script>';
        // }
    }else{
        header('Location: index.php?act=transaksi');
    }
