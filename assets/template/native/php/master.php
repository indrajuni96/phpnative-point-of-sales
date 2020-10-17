<?php     
    require_once("../../../../db/koneksi.php");

    if(isset($_POST['idBarang']) && !isset($_POST['harga']) && !isset($_POST['jumlah'])){
        $idBarang = $_POST['idBarang'];   
    
        $sql = $conn->query("SELECT harga FROM barang WHERE id = $idBarang");
    
            while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
                echo '
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="'.$data['harga'].'" placeholder="'.$data['harga'].'" readonly />
                  
                    ';
            }
    }
    
    if(isset($_POST['jumlah']) && isset($_POST['harga']) && isset($_POST['idBarang']) ){
        $idBarang = $_POST['idBarang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $data = $conn->query("SELECT jumlah,harga FROM barang WHERE id = $idBarang")->fetch_array(MYSQLI_ASSOC);        
        $decrementJumlah = $data['jumlah'] - $jumlah;       

        if($decrementJumlah < 0){
            echo '
                <label for="total">Total Harga</label>
                    <input type="number" class="form-control" id="total" name="total_harga" value="0" placeholder="Total Harga" required readonly>   
                <script>
                    alert("Maaf jumlah barang yang di pesan tidak cukup.");
                </script>';
        }else{
            (int)$total = (int)$data['harga'] * (int)$jumlah ;
            echo '
            <label for="total">Total Harga</label>
                <input type="number" class="form-control" id="total" name="total_harga" value="'.$total.'" placeholder="Total Harga" required readonly>            
                    ';
        }

    }
?>