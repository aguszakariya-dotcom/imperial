<?php
require_once 'koneksi.php';

if (!$koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

$query = mysqli_query(
    $koneksi,
    'SELECT * FROM produksi ORDER BY ID DESC LIMIT 20'
);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Gajian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link rel="stylesheet" href="css/swal.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/swal.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: small;
            background-image: url('images/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #0c0b0e;
            color: rgb(1, 23, 23);
        }
    </style> -->
</head>

<body>
    <?php if (isset($_SESSION['sukses'])) { ?>
        <script>
            Swal.fire({
                title: "Good job!",
                text: "<?php echo $_SESSION['sukses']; ?>",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['sukses']);
    } ?>
    <?php if (isset($_SESSION['gagal'])) { ?>
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "<?php echo $_SESSION['gagal']; ?>",
                icon: "error",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['gagal']);
    } ?>
    <?php if (
        isset($_GET['p']) &&
        $_GET['p'] == 'hapus' &&
        isset($_GET['id'])
    ) {
        $hapus = mysqli_query(
            $koneksi,
            "DELETE FROM gajian WHERE id = '" . $_GET['id'] . "'"
        );
        if ($hapus) {
            $_SESSION['sukses'] = 'Data berhasil dihapus';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        } else {
            $_SESSION['gagal'] = 'Data gagal dihapus';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        }
    } ?>

    <section id="hero">
    <div class="hero w-100 h-100 p-2 mx-auto d-flex text-center justify-content-center align-item-center text-white mt-3">
        <div class="row ">
            <!-- batas-00 -->
            <div class="col-sm-4 card shadow">
                <div class="card-header text-center fs-6 text-light">Data Cost Product</div>
                <div class="card-body">
                    <table id="dataTable" class="table table-hover  ">
                        <thead>
                            <tr class="fs-6">
                                <th>No.</th>
                                <th>Customer</th>
                                <th>Style</th>
                                <th>Color</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query)) : ?>
                                <tr class="table-row  text-light" data-customer="<?php echo $row['nama_customer']; ?>" data-style="<?php echo $row['style']; ?>" data-warna="<?= $row['warna'] ?>" data-harga="<?php echo $row['jahit']; ?>" data-code="<?php echo $row['code']; ?>">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_customer']; ?></td>
                                    <td><?php echo $row['style']; ?></td>
                                    <td><?= $row['warna'] ?></td>
                                    <td><?= $row['code']; ?></td>
                                    <!-- <td><?= number_format($row['jahit'], 0, ',', '.') ?></td> -->
                                </tr>
                            <?php endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- batas samping kiri -->
            <div class="col-sm-3 shadow ">
                <div class="card ">
                    <div class="card-header text-center fs-5">
                        Input Salary Tailor
                    </div>
                    <div class="card-body text-light">
                        <form id="myform">
                            <div class="mb-3 row">
                                <?php
                                // Mengambil data nama dari tabel
                                $queryNama = mysqli_query($koneksi, 'SELECT DISTINCT nama FROM karyawan ORDER BY nama ASC');
                                $namaOptions = '';
                                while ($row = mysqli_fetch_assoc($queryNama)) {
                                    $namaOptions .= '<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';
                                }
                                ?>
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select class="form-select text-capitalize" name="nama" id="nama">
                                        <option>Pilih Nama Pegawai</option>
                                        <?= $namaOptions; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tanggal" value="<?= date('d-M-Y') ?>">
                                </div>
                            </div>
                            <!-- Tambahkan form-group untuk input Customer -->
                            <div class="mb-3 row">
                                <label for="cst" class="col-sm-4 col-form-label">Customer</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-capitalize" name="cst" id="customer">
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
                            <!-- Tambahkan form-group untuk input Size -->
                            <div class="mb-3 row">
                                <label for="size" class="col-sm-4 col-form-label">Size</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control text-uppercase" name="size" id="size">
                                </div>
                            </div>
                            <!-- Tambahkan form-group untuk input Jumlah -->
                            <div class="mb-3 row">
                                <label for="qty" class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="qty" id="jumlah">
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
                            <div class="text-center" id="tombol">
                                <button type="submit" class="btn btn-sm btn-info float-end mx-1" name="simpan">Submit</button>
                                <a class="btn btn-sm btn-outline-info" href="print.php">Cetak</a>
                                <button type="button" class="btn btn-sm btn-outline-danger float-start" id="hapusData">Hapus</button>
                            </div>
                            <hr>
                            <blockquote class="blockquote text-pesan fst italic">
                                Jangan Lupakan nama!!, karena yang kita ingat ya namanya.....
                            </blockquote>
                        </form>
                        <script>
                            $(document).ready(function() {
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
                                                url: 'delete.php',
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


                    </div>
                </div>
            </div>
            <!-- batas samping kanan -->
            <div class="col-sm-5 card shadow">
                <div class="card-header text-center">
                    <?php
                    $totale = mysqli_query(
                        $koneksi,
                        'SELECT SUM(total) AS total FROM gajian'
                    );
                    $ttl = mysqli_fetch_array($totale);
                    ?>
                    <button class=" btn btn-outline-light fs-6  text-center">Grand Total : Rp.
                        <?= number_format(
                            $ttl['total'],
                            0,
                            ',',
                            '.'
                        ) ?></button>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <tr class="fs-6">
                                <th>No.</th>
                                <th>Nama</th>
                                <!-- <th>Customer</th> -->
                                <th>Style</th>
                                <th>Warna</th>
                                <th>QTY</th>
                                <th>Total</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $gajinya = mysqli_query(
                                $koneksi,
                                'SELECT * FROM gajian ORDER BY ID ASC'
                            );
                            while ($row = mysqli_fetch_assoc($gajinya)) : ?>
                                <tr class="table-sement text-light">
                                    <td><?php echo $no++; ?></td>
                                    <td class="fw-bold"><?= $row['nama'] ?></td>
                                    <!-- <td><?php echo $row['cst']; ?></td> -->
                                    <td><?php echo $row['style']; ?></td>
                                    <td><?= $row['color'] ?></td>
                                    <td class="fw-bold"><?php echo $row['qty']; ?></td>
                                    <td><?= number_format(
                                            $row['total'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?></td>
                                    <td>
                                        <a href="index.php?p=hapus&id=<?= $row['id'] ?>" class="btn btn-sm text-danger"><i data-feather="user-x"></i></a> <!-- Tombol Delete -->
                                    </td>
                                </tr>
                            <?php endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- batas-001 -->
        </div>
    </div>
    </section>
    <!-- batas -->
    <?php mysqli_close($koneksi); ?>
    <!-- batas -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            // Handle click event on table row
            $('.table-row').click(function() {

                // Get data from the clicked row
                var customer = $(this).data('customer');
                var style = $(this).data('style');
                var warna = $(this).data('warna');
                var harga = $(this).data('harga');

                // Set the values to the input fields
                $('#customer').val(customer);
                $('#style').val(style);
                $('#warna').val(warna);
                $('#harga').val(harga);

                // Calculate the total
                calculateTotal();

                // Set focus and change background color of input with ID "nama"
                $('#nama').css('background-color', 'cyan');
                $('#size').focus();
                $('#jumlah').css('background-color', 'cyan');
                $('#harga').css('background-color', 'yellow');
                $('.blockquote').css('color', 'red');
                $('.blockquote').addClass('blinking-text');
            });

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
                var total = harga * jumlah;
                $('#total').val(total);
            });

            // Calculate total
            function calculateTotal() {
                var jumlah = parseInt($('#jumlah').val() || 0); // Handle empty input
                var harga = parseFloat($('#harga').val().replace(/[^0-9.-]+/g, ''));
                var total = jumlah * harga;
                $('#total').val(total);
            }

            // Handle input change event for jumlah
            $('#jumlah, #harga').on('input', function() {
                calculateTotal();
            });
        });
    </script>
    <script>
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            // Mendengarkan perubahan pada elemen select dengan id "nama"
            $('#nama').change(function() {
                // Mendapatkan nilai yang dipilih dari dropdown
                var selectedNama = $(this).val();

                // Cek apakah nilai yang dipilih adalah "nama tertentu"
                if (selectedNama === "Abdullah hafidz") {
                    // Mengarahkan pengguna ke halaman lain.php
                    window.location.href = 'input_nskt.php';
                }
                if (selectedNama === "Aulia margareta") {
                    window.location.href = 'input.php';
                }
            });
            $('#myform').submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara default

                // Get the selected value from the dropdown
                let selectedValue = $('#nama').val();

                // Check if the selected value is "Pilih Nama Pegawai"
                if (selectedValue === "Pilih Nama Pegawai") {
                    // Show the swal-alert with the warning message
                    swal.fire({
                        title: "Peringatan!",
                        text: "Silakan pilih nama pegawai dahulu!!.",
                        icon: "warning",
                        button: "OK",
                    });
                } else {
                    $.ajax({
                        url: 'save_data.php',
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
                }
            });
        });
    </script>
</body>

</html>