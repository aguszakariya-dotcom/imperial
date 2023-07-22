<?php

require_once './koneksi.php';
$query = mysqli_query(
    $koneksi,
    'SELECT * FROM produksi ORDER BY ID DESC LIMIT 20'
);
?>

<table id="dataTable" class="table table-sm table-hover">
    <thead>
        <tr class="fs-6">
            <th>No.</th>
            <th>Customer</th>
            <th>Style</th>
            <th>Code</th>
            <th>Color</th>
            <th>Qty</th>
            <!-- <th>Harga</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr class="tableCost" data-customer="<?php echo $row['nama_customer']; ?>" data-style="<?php echo $row['style']; ?>" data-code="<?php echo $row['code']; ?>" data-warna="<?php echo $row['warna']; ?>" data-size="<?= $row['size']; ?>" data-jumlah="<?= $row['qty']; ?>" data-harga="<?php echo $row['harga']; ?>">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['style']; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?= $row['warna'] ?></td>
                <td><?= $row['qty'] ?></td>
                <!-- <td><?= number_format($row['harga'], 0, ',', '.') ?></td> -->
            </tr>
        <?php endwhile;
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('.blockquote').addClass('collapse');
        // Handle click event on table row
        $('.tableCost').click(function() {
            // Get data from the clicked row
            let customer = $(this).data('customer');
            let style = $(this).data('style');
            let code = $(this).data('style');
            let warna = $(this).data('warna');
            let size = $(this).data('size');
            let jumlah = $(this).data('jumlah');
            let harga = $(this).data('harga');

            // Set the values to the input fields
            $('#customer').val(customer, style, warna, );
            $('#style').val(style);
            $('#warna').val(warna);
            $('#size').val(size);
            $('#jumlah').val(jumlah);
            $('#harga').val(harga);

            // Calculate the total
            calculateTotal();

            // Set focus and change background color of input with ID "nama"
            $('#nama').focus().css('background-color', 'yellow');
            $('.blockquote').css('color', 'red');
            $('.blockquote').removeClass('collapse');
            $('.blockquote').addClass('blinking-text');
        });

        // Calculate total
        function calculateTotal() {
            var harga = parseFloat($('#harga').val().replace(/[^0-9.-]+/g, ""));
            var jumlah = parseInt($('#jumlah').val() || 0); // Handle empty input
            var total = harga * jumlah;
            $('#total').val(total);
        }

        // Handle input change event for jumlah
        $('#jumlah').on('input', function() {
            calculateTotal();
        });

        
        // Handle click event on delete button
        $('#hapusData').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX ke delete.php
                    $.ajax({
                        url: 'form/delete.php',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            // Tampilkan Swal alert berhasil dihapus jika diperlukan
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Data telah dihapus',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                if (result.dismiss === Swal
                                    .DismissReason.timer) {
                                    window.location.href =
                                        'index.php';
                                    // Refresh halaman atau lakukan operasi lain jika diperlukan
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan pesan error jika diperlukan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        });

    });
</script>