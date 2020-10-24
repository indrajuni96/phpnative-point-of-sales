<?php
require_once("../../db/koneksi.php");
$result = $conn->query("SELECT * FROM jenis_barang");
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
                     <button type='button' class='btn btn-sm btn-warning edit-jenis' data-id-jenis='$row[id]' data-toggle='modal' data-target='#editJenis'>Ubah</button>
                     
                     <button type='button' class='btn btn-sm btn-danger delete-jenis' data-id-jenis='$row[id]' data-toggle='modal' data-target='#deleteJenis'>Hapus</button>
              </td>";
        echo "</tr>";
        $n++;
      }
    }
    ?>
  </tbody>
</table>