<?php require_once 'koneksi.php' ;
// include 'functions/menu.php';
// include 'functions/edit.php';
?>

<?php require 'layout/header.php' ?>

<div class="row mt-5 justify-content-center">
    <div class="col-lg-3 collapse animate__animated" id="kolom-input">
        <div class="card shadow">
            <div class="card-header">Input Data</div>
            <div class="card-body">
                <form action="" class="form-horizontal text-bold" method="post" enctype="multipart/form-data" id="formId">
                    <!-- <div class="card-body"> -->
                    <div class="form-group form-group-sm row shadow-sm mb-2">
                        <input type="hidden" name="gambarSebelumnya" id="gambarSebelumnya">
                        <label class="col-sm-5" for="bulan">Finish</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-border border-width-2" name="bulan" id="bulan">
                        </div>
                    </div>
                    <div class="form-group row shadow-sm mb-2">
                        <label class="col-sm-5 pb-0" for="nama_customer">Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm form-control-border border-width-2" id="nama_customer" name="nama_customer">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="style">Style</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="style" name="style">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="code">Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="code" name="code">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="size">Size</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="size" name="size">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="bahan">Fabric</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="bahan" name="bahan">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="warna">Color</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="warna" name="warna">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="qty">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="qty" name="qty">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="harga">Cost Sample</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="jahit">Cost Tailor</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="jahit" name="jahit">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="motong">Cost Cutting</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="motong" name="motong">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="naskat">Cost Naskat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="naskat" name="naskat">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="Naskat">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-border border-width-2 select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="status" name="status">
                                <option selected="selected">Proses</option>
                                <option>Finish</option>
                                <!-- <option>California</option> -->
                                <option>Menunggu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3 shadow-sm mb-2">
                        <label class="col-sm-5" for="Naskat">Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px; width: 100%;" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-1 justify-content-center">
                        <div class=" justify-content-center">
                            <div class="form-group row mb-2 mt-1 justify-content-center">
                            <div class="text-center">
                                <img src="images/nophoto.jpg" class="mb-1" id="gambarLama" width="100px" height="140px"><br>
                                <input type="file" id="gambar" name="gambar">
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="">
                        <div class="text-center" id="tombol">
                            <button type="submit" class="btn btn-sm btn-info float-end mx-1" id="update" name="update">Update</button> &nbsp; &nbsp;
                            <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save | Tambahkan</button> &nbsp;
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8 mt-4 " id="dataProduksi">
        <div class="mx-2 " id="meja">

            </div>
    </div>

</div>
<?php require 'layout/footer.php' ?>
<script src="functions/produksi.js"></script>
<script>
    $(document).ready(function() {
        var form = document.getElementById('formId');
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
            url: 'functions/saveProduksi.php', // Sesuaikan dengan lokasi file save.php
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
                $("#meja").load("./table/tableProduksi.php");
                // Menanggapi keberhasilan, bisa ditambahkan logika atau pengalihan halaman
                console.log('Data berhasil disimpan:', response);

                // Setelah sukses, Anda bisa memperbarui tabel atau melakukan aksi lainnya
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
    })
</script>
