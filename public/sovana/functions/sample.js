$(document).ready(function () {
    new DataTable('#example');   
    $("#meja").load("./table/tableSample.php");
    var form = document.getElementById('formId');
    $(document).on('click', '.editSample', function (e) {
        $('#kolom-input').removeClass('collapse')
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: 'api/sample.php?id=' + id,
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json', // Tambahkan ini jika diperlukan oleh server
            success: function (response) {
                console.log(response);
                // Mengisi nilai formulir dengan data yang diterima
                $('#tanggal').val(response.tanggal);
                $('#nama_customer').val(response.nama_customer);
                $('#style').val(response.style);
                $('#code').val(response.code);
                $('#size').val(response.size);
                // $('#bahan').val(response.bahan);
                $('#warna').val(response.warna);
                // $('#qty').val(response.qty);
                $('#harga').val(response.harga);
                $('#habis').val(response.habis);
                // $('#motong').val(response.motong);
                // $('#naskat').val(response.naskat);
                // $('#status').val(response.status);
                $('#keterangan').val(response.keterangan);
                $('#gambarSebelumnya').val(response.gambar);

                // Menampilkan gambar di elemen img
                $('#gambarLama').attr('src', 'https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/' + response.gambar);

                // $('#gambar').attr('src', 'https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/' + response.gambar);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
    // Fungsi untuk menangani perubahan pada input gambar baru
    $(document).on('change', '#gambar', function (e) {
        // Menampilkan gambar baru di elemen img
        var input = e.target;
        var reader = new FileReader();
        reader.onload = function () {
            $('#gambarLama').attr('src', reader.result);
        };
        reader.readAsDataURL(input.files[0]);
    });

    // Fungsi untuk menangani klik tombol Save | Tambahkan
    $('#save').on('click', function(e) {
        e.preventDefault();

        // Membuat objek FormData untuk mengumpulkan data formulir
        var formData = new FormData($('form')[0]);

        // Menambahkan gambarSebelumnya ke FormData (jika ada)
        formData.append('gambarSebelumnya', $('#gambarSebelumnya').val());

        $.ajax({
            url: 'functions/saveSample.php', // Sesuaikan dengan lokasi file save.php
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                form.reset();
                $('#kolom-input').addClass('animate__bounce')
                $('#kolom-input').addClass('collapse')
                // $('#dataProduksi').addClass('bounceInUp')
                $("#meja").load("./table/tableSample.php");
                // Menanggapi keberhasilan, bisa ditambahkan logika atau pengalihan halaman
                console.log('Data berhasil disimpan:', response);

                // Setelah sukses, Anda bisa memperbarui tabel atau melakukan aksi lainnya
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });



});