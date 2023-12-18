<?php
$koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$invoiceData = mysqli_query($koneksi, 'SELECT * FROM gajian ORDER BY ID DESC');


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice Mingguan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <!-- end font -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: small;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: 960px;
            margin: 20px auto;
            border: 1px solid #000;
            padding: 20px;
        }

        .header h2 {
            margin-top: 0;
            text-align: center;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .content th,
        .content td {
            border: 1px solid #000;
            padding: 8px;
        }

        .nama {
            margin-top: 20px;
            text-align: right;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        .card-bg {
            /* background-image: url('img/logo.jpeg'); */
            background-color: white;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .card-body {
            background-color: rgba(247, 247, 247, 0.928);
        }

        .box-ttd {
            /* background-image: url('../img/ttd.png'); */
            height: 200px;
        }

        .dari {
            font-size: smaller;
        }

        @media print {
            .ndelik {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- modal -->

    <!-- end modal -->

    <div class="container mt-5 px5 justify-content-center">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-sm-12 col-md-12 mt-3 px-3">
            <div class="card shadow">
                <div class="card-header pb-3">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="nama" id="nama">
                                <?php
                                // Ambil data nama dari database
                                $query = "SELECT DISTINCT nama FROM gajian";
                                $result = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $nama = $row['nama'];
                                    echo "<option value='$nama'>$nama</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="tanggal" id="tanggal">
                                <?php
                                // Ambil data tanggal dari database
                                $query = "SELECT DISTINCT tanggal FROM gajian";
                                $result = mysqli_query($koneksi, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tanggal = $row['tanggal'];
                                    echo "<option value='$tanggal'>$tanggal</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="namaNya" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-capitalize" name="namaNya" id="namaNya">
                        </div>
                    </div>
                        <div class="mb-3 row">
                        <label for="tanggalNya" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-capitalize" name="tanggalNya" id="tanggalNya" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive-sm mb-2">
                        <table class="table table-striped" id="table-print">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceData">
                                <!-- Data akan diisi menggunakan JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6 px-5 float-start text-center">
                        <div class="card-body" style="width: 200px; background-color: transparent">
                            <span>TTD</span>
                            <img class="text-center" src="img/ttd.png" alt="tanda tangan" width="200px" height="150px">
                            <span class="text-center">( Agus zakariya )</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-5 float-end  text-end mb-3 mx-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Mengubah nilai input #namaNya saat pilihan #nama berubah
    $('#nama').change(function() {
        var selectedNama = $(this).val();
        $('#namaNya').val(selectedNama);
        var selectedTanggal = $('#tanggal').val();
        loadData(selectedNama, selectedTanggal);
    });

    // Mengubah nilai input #tanggalNya saat pilihan #tanggal berubah
    $('#tanggal').change(function() {
        var selectedTanggal = $(this).val();
        $('#tanggalNya').val(selectedTanggal);
        var selectedNama = $('#nama').val();
        loadData(selectedNama, selectedTanggal);
    });

    // Fungsi untuk memuat data berdasarkan nama dan tanggal yang dipilih
    function loadData(selectedNama, selectedTanggal) {
        $.ajax({
            type: 'POST',
            url: 'load_data.php',
            data: {
                nama: selectedNama,
                tanggal: selectedTanggal
            },
            success: function(response) {
                $('#invoiceData').html(response);
            }
        });
    }
});

</script>



    <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        <!-- Masukkan link JavaScript Bootstrap dan jQuery di sini -->



    </body>

    </html>