
$(document).ready(function () {
    new DataTable('#example');   
    $("#meja").load("./table/tableProduksi.php");
    // $('#dataProduksi').addClass('bounceInUp')
    var form = document.getElementById('formId');
    $(document).on('click', '.editP', function (e) {
        // alert ('haha!')
        $('#kolom-input').removeClass('collapse')
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: 'api/produksi.php?id=' + id,
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json', // Tambahkan ini jika diperlukan oleh server
            success: function (response) {
                console.log(response);
                // Mengisi nilai formulir dengan data yang diterima
                $('#bulan').val(response.bulan);
                $('#nama_customer').val(response.nama_customer);
                $('#style').val(response.style);
                $('#code').val(response.code);
                $('#size').val(response.size);
                $('#bahan').val(response.bahan);
                $('#warna').val(response.warna);
                $('#qty').val(response.qty);
                $('#harga').val(response.harga);
                $('#jahit').val(response.jahit);
                $('#motong').val(response.motong);
                $('#naskat').val(response.naskat);
                $('#status').val(response.status);
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
   
    
});
