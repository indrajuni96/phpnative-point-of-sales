<?php
require_once("../../db/koneksi.php");
$result = $conn->query("SELECT * FROM jenis_barang");
var_dump($result)
?>

<table id="tables" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Jenis Kue</th>
      <th width="18%">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      $n = 1;
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $n . "</td>";
        echo "<td>" . $row['jenis'] . "</td>";
        echo "<td>                   
                     <button type='button' class='btn btn-sm btn-warning' data-dataid='$row[id]' data-toggle='modal' data-target='#ubahJenis'>Ubah</button>
                     
                                  <a href='index.php?act=barang_hapus&id=$row[id]' class='btn btn-sm btn-danger'>Hapus</a>
                              </td>";
        echo "</tr>";
        $n++;
      }
    }
    ?>
  </tbody>
</table>