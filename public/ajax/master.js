$(document).ready(function () {
  // JENIS_BARANG
  $('#tbl_jenis_kue').load('../public/components/table_jenis_kue.php');

  // insert
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
          $('#close_insert').trigger('click');

          $('#msg').html(data.html);
        } else {
          $('#insert_jenis').trigger('reset');
          $('#close_insert').trigger('click');

          $('#msg').html(data.html);
        }
      }
    })
  })

  // get update
  $(document).on('click', 'button.edit-jenis', function () {
    let id_jenis = $(this).data('id-jenis')

    $.getJSON('../public/ajax/get_update_jenis.php', { id_jenis: id_jenis }, function (response) {
      if (response.status == 200) {
        $('#edit_jenis').val(response.jenis);
        $('#edit_id').val(id_jenis);
      } else {
        console.log('gagal get update jenis')
      }
    })
  })

  // update
  $('#update_jenis').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
      type: 'POST',
      url: '../public/ajax/update_jenis.php',
      data: $(this).serialize(),
      success: function (response) {
        let result = JSON.parse(response)

        if (result.status == 200) {
          $('#tbl_jenis_kue').load('../public/components/table_jenis_kue.php');
          $('#update_jenis').trigger('reset');
          $('#close_update').trigger('click');
        } else {
          console.log('gagal get update jenis')
        }
      }
    })
  })

  let id_jenis
  $(document).on('click', 'button.delete-jenis', function () {
    id_jenis = $(this).data('id-jenis')
  })

  $('#delete_jenis').on('click', function (e) {
    e.preventDefault()
    $.ajax({
      type: 'POST',
      url: '../public/ajax/delete_jenis.php',
      data: { id_jenis },
      success: function (response) {
        let result = JSON.parse(response)

        if (result.status == 200) {
          $('#tbl_jenis_kue').load('../public/components/table_jenis_kue.php');
          $('#delete_jenis').trigger('reset');
          $('#close_delete').trigger('click');
        } else {
          console.log('gagal get delete jenis')
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