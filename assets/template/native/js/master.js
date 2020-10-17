$(document).ready(function () {
    $('#idBarang').change(function () {
        var idBarang = $(this).val();
        var jumlah = $(this).val();
        var harga = $('#harga').val();

        if (idBarang !== null) {
            $.ajax({
                type: 'POST',
                url: '../assets/template/native/php/master.php',
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
                url: '../assets/template/native/php/master.php',
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