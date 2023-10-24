<?php
session_start();
$koneksi = mysqli_connect(
    'becik.my.id:3306',
    'workshop_zack77',
    'workshop467791zA',
    'workshop_'
);

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
    <title>BreakDown</title>
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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <script src="js/dataCost.js"></script> -->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: small;
            /* background-image: url('img/bg01.jpg'); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* background-color: #0c0b0e; */
            /* color: rgb(1, 23, 23); */
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .blinking-text {
            animation: blink 1s infinite;
        }
    </style>
</head>

<body>



    <!-- Kolom full -->
    <div class=" mt-3 mb-3 align-content-center px-lg-2">
        <div class="row justify-content-center">
            <!-- Kolom Kiri -->
            <div class="col-sm-4 col-md-6 col-xl-4 mb-3">
                <div class="card p-2">
                    <div class="card-header text-center fs-6 mt-3">Data Cost Product</div>
                    <div class="card-body">
                        <?php include_once 'table/tabel-harga.php' ?>
                    </div>
                </div>
            </div>
            <!-- Kolom tengah   //////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="col-sm-3 col-md-6 col-xl-3">
                <div class="card p-2">
                    <div class="card-header text-center fs-6 mt-3">
                        Input Salary
                    </div>
                    <div class="card-body">
                        <?php include_once 'form/input.php' ?>
                        <blockquote class="blockquote text-pesan fst-italic">
                            Untuk harga berbeda, Ubah harga dulu lalu jumlahnya diisi !!
                        </blockquote>
                    </div>
                </div>
            </div>
            <!-- batas samping kanan -->
            <div class="col-sm-5 col-md-10 col-xl-5 card">
                <div class="card-header text-center mt-3">
                    <?php $totale = mysqli_query(
                        $koneksi,
                        'SELECT SUM(total) AS total FROM breakdown'
                    );
                    $ttl = mysqli_fetch_array($totale); ?>
                    <button class=" btn btn-outline-dark fs-6  text-center">Grand Total : Rp.
                        <?= number_format($ttl['total'], 0, ',', '.'); ?></button>
                </div>
                <div class="card-body">
                    <?php include_once 'table/tableCetak.php' ?>
                    <hr>
                    <div class="text-center" id="tombol">

                        <a class="btn btn-sm btn-info float-end mx-1" href="print.php">Cetak</a>
                        <button type="button" class="btn btn-sm btn-outline-danger float-start" id="hapusData">Hapus Semua</button>
                    </div>
                </div>
            </div>
            <!-- batas-001 -->
        </div>
    </div>
    <!-- batas -->
    <?php mysqli_close($koneksi); ?>
    <!-- batas -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <script>
        feather.replace();
    </script>
</body>

</html>