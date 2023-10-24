<?php 

?>
<form id="myform">
    
    <div class="mb-3 row">
        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= date('d-M-Y') ?>">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Customer -->
    <div class="mb-3 row">
        <label for="customer" class="col-sm-4 col-form-label">Customer</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-capitalize" name="customer" id="customer">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Style -->
    <div class="mb-3 row">
        <label for="style" class="col-sm-4 col-form-label">Style</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-capitalize" name="style" id="style">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Warna -->
    <div class="mb-3 row">
        <label for="warna" class="col-sm-4 col-form-label">Warna</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-capitalize" name="warna" id="warna">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input size -->
    <div class="mb-3 row">
        <label for="warna" class="col-sm-4 col-form-label">Size</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="size" id="size">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Jumlah -->
    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="jumlah" id="jumlah">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Harga -->
    <div class="mb-3 row">
        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="harga" id="harga">
        </div>
    </div>
    <!-- Tambahkan form-group untuk input Total -->
    <div class="mb-3 row">
        <label for="total" class="col-sm-4 col-form-label">Total</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="total" id="total">
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-sm btn-info float-end mx-1" name="simpan">Submit</button>
    <br>
    <hr>
</form>

<script>
    $(document).ready(function() {
        // Menghitung total saat nilai jumlah diubah
    $('#jumlah').change(function() {
        var harga = parseFloat($('#harga').val());
        var jumlah = parseFloat($('#jumlah').val());
        var total = harga * jumlah;
        $('#total').val(total);
    });

    // Menghitung total saat nilai harga diubah
    $('#harga').change(function() {
        var harga = parseFloat($('#harga').val());
        var jumlah = parseFloat($('#jumlah').val());
        var total = jumlah * harga;
        $('#total').val(total);
    });

    // Calculate total
    function calculateTotal() {
        var jumlah = parseInt($('#jumlah').val() || 0); // Handle empty input
        var harga = parseFloat($('#harga').val().replace(/[^0-9.-]+/g, ''));
        var total = jumlah * harga;
        $('#total').val(total);
    }

    // Handle input change event for jumlah and harga
    $('#jumlah, #harga').on('input', function() {
        calculateTotal();
    });
        $('#myform').submit(function(e) {
            e.preventDefault();
                $.ajax({
                    url: 'form/saveData.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                window.location.href = 'index.php';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
        });
    });
</script>