<?php
    require_once('../db/koneksi.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result =  $conn->query('DELETE FROM users WHERE id="'.$id.'"');
        
        if($result){
            echo '<script>
                    alert("User hapus berhasil");
                    window.location.href="index.php?act=users";
                  </script>';
        }else{
            echo '<script>
                    alert("User hapus gagal");
                    window.location.href="index.php?act=users";
                  </script>';
        }
    }else{
        header('Location: index.php?act=users');
    }
?>