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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
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
    background-image: url('images/bg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: #0c0b0e;
    color: rgb(1, 23, 23);
}
    </style>
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
    <?php unset($_SESSION['sukses']);} ?>
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
    <?php unset($_SESSION['gagal']);} ?>
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
    <nav class="navbar navbar-sm navbar-expand-lg  fs-5" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fs-5" href="../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class=" btn-sm btn btn-outline-info" aria-current="page" href="#">Tk Jahit</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm btn btn-outline-warning mx-3" aria-current="page" href="input.php">Tk Potong</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm btn btn-outline-warning" href="input_nskt.php">Naskat & Lain lain</a>
                    </li>
            </div>
        </div>
    </nav>
    <!-- <script src="js/input.js"></script> -->
    <div class=" mt-5 mb-3 align-content-center px-lg-2">
        <div class="row ">
            <!-- batas-00 -->
            <div class="col-sm-4 card shadow">
                <div class="card-header text-center fs-6 text-light">Data Cost Product</div>
                <div class="card-body">
                    <?php include_once 'table/tablePenjahit.php'; ?>
                </div>
            </div>
            <!-- batas samping kiri -->
            <div class="col-sm-3 shadow ">
                <div class="card ">
                <div class="card-header text-center fs-5">
                    Input Salary Tailor
                </div>
                <div class="card-body text-light">
                    <?php include_once 'form/formPenjahit.php'?>
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
                    <script>
                        $(document).ready(function() {
                            $('#myform').submit(function(e) {
                                e.preventDefault();
                                var pilihNama = document.getElementById('nama').value;
                                if (pilihNama == '') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Nama belum di pilih!',
                                        text: 'Pilih nama dulu dong.....!!!',
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
                                };
                            });
                        });
                    </script>
                </div>
                </div>
            </div>
           
                    <?php include_once 'table/tableHariIni.php' ?>
                </div>
            </div>
            <!-- batas-001 -->
        </div>
    </div>
    <!-- batas -->
    <?php mysqli_close($koneksi); ?>
    <!-- batas -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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
            $('#nama').focus().css('background-color', 'yellow');
            $('.blockquote').css('color', 'red');
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
    });
    </script>
<script>
      feather.replace();
    </script>
</body>

</html>