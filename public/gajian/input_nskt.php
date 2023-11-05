<?php
// session_start();
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = mysqli_query($koneksi, "SELECT * FROM produksi ORDER BY ID DESC LIMIT 20");


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
    <!-- mystyle -->
    <!-- choose one -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link rel="stylesheet" href="css/swal.css">
    <!-- mystyle -->
    <!-- choose one -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/swal.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: small;
            background-image: url('images/bg04.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #0c0b0e;
            color: rgb(1, 23, 23);

        }

        .table-sement .table-row {
            font-size: smaller;
        }
    </style>
</head>

<body>
</script>
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
    <?php
    if (isset($_GET['p']) && $_GET['p'] == "hapus" && isset($_GET['id'])) {
        $hapus = mysqli_query($koneksi, "DELETE FROM gajian WHERE id = '" . $_GET['id'] . "'");
        if ($hapus) {
            $_SESSION['sukses'] = "Data berhasil dihapus";
            echo '<script>window.location.href="index.php";</script>';
            exit;
        } else {
            $_SESSION['gagal'] = "Data gagal dihapus";
            echo '<script>window.location.href="index.php";</script>';
            exit;
        }
    }
    ?>
    <nav class="navbar navbar-expand-lg fs-5" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fs-5" href="../index.php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=" btn-sm btn btn-outline-warning" aria-current="page" href="index.php">Tk Jahit</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm btn btn-outline-warning mx-3" aria-current="page" href="input.php">Tk Potong</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="btn-sm btn btn-outline-info" href="input_nskt.php">Naskat & Lain lain</a> -->
                    </li>
            </div>
        </div>
    </nav>
    <!-- <script src="js/input.js"></script> -->
    <div class=" mt-5 mb-3 align-content-center">
        <div class="row ">
            <!-- batas-00 -->
            <div class="col-sm-4 ">
                <div class="card ">
                    <div class="card-header text-center fs-5"> Data Cost Product</div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-hover ">
                            <thead>
                                <tr class="fs-6 ">
                                    <th>No.</th>
                                    <th>Customer</th>
                                    <th>Style</th>
                                    <th>Color</th>
                                    <th>QTY</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($query)) :
                                ?>
                                    <tr class="table-ptg text-light" data-customer="<?php echo $row['nama_customer']; ?>" data-style="<?php echo $row['style']; ?>" data-warna="<?= $row['warna']; ?>" data-qty="<?= $row['qty']; ?>" data-harga="<?php echo $row['naskat']; ?>">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nama_customer']; ?></td>
                                        <td><?php echo $row['style']; ?></td>
                                        <td><?= $row['warna']; ?></td>
                                        <td><?= $row['qty']; ?></td>
                                        <td><?= number_format($row['naskat'], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- batas samping kiri -->
            <div class="col-sm-3 shadow">
                <div class="card px-2">
                    <div class="card-header text-center fs-5">
                        Input Salary Handyman
                    </div>
                    <div class="card-body text-light">
                        <form id="myform">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tanggal" value="<?= date('d-M-Y'); ?>">
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
                            <!-- Tambahkan form-group untuk input Jumlah -->
                            <div class="mb-3 row">
                                <label for="qty" class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="qty" id="qty" value="<?= $row['qty']; ?>">
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
                                    <input type="number" class="form-control" name="total" id="total" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center" id="tombol">
                                <button type="submit" class="btn btn-sm btn-info float-end mx-1" name="simpan">Submit</button>
                                <a class="btn btn-sm btn-outline-info" href="print_nskt.php">Cetak</a>
                                <button type="button" class="btn btn-sm btn-outline-danger float-start" id="hapusData">Hapus</button>
                            </div>
                            <hr>
                            <blockquote class="blockquote text-pesan fst-italic">
                                koreksi harga dan jumlahnya !!
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
                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                            window.location.href = 'input_nskt.php';
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
                        <script>
                            $(document).ready(function() {
                                $('#myform').submit(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: 'save_potong.php',
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
                                                    window.location.href = 'input_nskt.php';
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
                    </div>
                </div>
            </div>
            <!-- batas samping kanan -->
            <div class="col-sm-5 card p-2 shadow">
                <div class="card-header text-center">
                    <?php
                    $totale = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM gajian");
                    $ttl = mysqli_fetch_array($totale);
                    ?>
                    <button class=" btn btn-outline-info text-info fs-6 shadow text-center">Grand Total : Rp.
                        <?= number_format($ttl['total'], 0, ',', '.');  ?></button>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <tr class="fs-6">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Customer</th>
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
                            $gajinya = mysqli_query($koneksi, 'SELECT * FROM gajian ORDER BY ID ASC');
                            while ($row = mysqli_fetch_assoc($gajinya)) :
                            ?>
                                <tr class="table-sement text-light">
                                    <td><?php echo $no++; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?php echo $row['cst']; ?></td>
                                    <td><?php echo $row['style']; ?></td>
                                    <td><?= $row['color']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?= number_format($row['total'], 0, ',', '.'); ?></td>
                                    <td>
                                        <a href="index.php?p=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i data-feather="user-x"></i></a> <!-- Tombol Delete -->
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- batas-001 -->
        </div>
    </div>
    <!-- batas -->
    <?php
    mysqli_close($koneksi);
    ?>
    <!-- batas -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Handle click event on table row
            $('.table-ptg').click(function() {
                // Get data from the clicked row
                var customer = $(this).data('customer');
                var style = $(this).data('style');
                var warna = $(this).data('warna');
                var qty = $(this).data('qty');
                var harga = $(this).data('harga');

                // Set the values to the input fields
                $('#customer').val(customer);
                $('#style').val(style);
                $('#warna').val(warna);
                $('#qty').val(qty);
                $('#harga').val(harga);

                // Set focus and change background color of input with ID "nama"
                calculateTotal();
                $('#qty').focus().css('background-color', 'cyan');
                $('#harga').focus().css('background-color', 'yellow');
                $('.blockquote').css('color', 'red');
                $('.blockquote').addClass('blinking-text');

                // Calculate the total
            });
            // Set value for input "nama" on page reload
            $('#nama').val('Abd Hafidz');

            $('#qty').change(function() {
                var harga = parseFloat($('#harga').val());
                var jumlah = parseFloat($('#qty').val());
                var total = harga * jumlah;
                $('#total').val(total);
            });

            // Menghitung total saat nilai harga diubah
            $('#harga').change(function() {
                var harga = parseFloat($('#harga').val());
                var jumlah = parseFloat($('#qty').val());
                var total = harga * jumlah;
                $('#total').val(total);
            });

            // Calculate total
            function calculateTotal() {
                var jumlah = parseInt($('#qty').val() || 0); // Handle empty input
                var harga = parseFloat($('#harga').val().replace(/[^0-9.-]+/g, ''));
                var total = jumlah * harga;
                $('#total').val(total);
            }

            // Handle input change event for jumlah
            $('#qty, #harga').on('input', function() {
                calculateTotal();
            });
            // format ribuan 
        });
    </script>
    <script>
        feather.replace();
    </script>

</body>

</html>