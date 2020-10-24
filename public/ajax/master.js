$(document).ready(function () {
  // JENIS_BARANG
  $('#tbl_jenis_kue').load('../public/components/table_jenis_kue.php');

  $('#insert_jenis').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../public/ajax/insert_jenis.php',
      data: $(this).serialize(),
      success: function (response) {
        const data = JSON.parse(response);

        if (data.status == 200) {
          $('#tbl_jenis_kue').load('../public/components/table_jenis_kue.php');
          $('#insert_jenis').trigger('reset');
          $('#close_click').trigger('click');

          $('#msg').html(data.html);
        } else {
          $('#insert_jenis').trigger('reset');
          $('#close_click').trigger('click');

          $('#msg').html(data.html);
        }
      }
    })
  })


  //END JENIS_BARANG

  $('#idBarang').change(function () {
    var idBarang = $(this).val();
    var jumlah = $(this).val();
    var harga = $('#harga').val();

    if (idBarang !== null) {
      $.ajax({
        type: 'POST',
        url: '../public/ajax/master.php',
        data: {
          'idBarang': idBarang
        },
        success: function (response) {
          $('#divBarang').html(response);
        }
      });
    } else {
    }
  });

  $('#jumlah').keyup(function () {
    var jumlah = $(this).val();
    var harga = $('#harga').val();
    var idBarang = $('#idBarang').val();

    if (idBarang !== null && jumlah !== null && harga !== null) {
      $.ajax({
        type: 'POST',
        url: '../public/ajax/master.php',
        data: {
          'idBarang': idBarang,
          'harga': harga,
          'jumlah': jumlah
        },
        success: function (response) {
          $('#divTotalHarga').html(response);
        }
      });
    } else {
      alert('Nama kue belum di pilih, Harap Pilih Nama Kue dulu...');
      $('#idBarang').focus();
      $('#jumlah').val('');
    }
  });
})