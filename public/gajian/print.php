<?php
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$invoiceData = mysqli_query($koneksi, 'SELECT * FROM gajian ORDER BY ID ASC');

$tanggalHariIni = date('dmY');
// Initialize the variables
$tHadir = 0;
$tLembur = 0;
$gndTotal = 0;
// Mengambil data nama dari tabel
$queryNama = mysqli_query($koneksi, 'SELECT DISTINCT nama FROM gajian ORDER BY nama ASC');
$namaOptions = '';
while ($row = mysqli_fetch_assoc($queryNama)) {
    $namaOptions .= '<option value="' . $row['nama'] . '">' . $row['nama'] . '</option>';
}
$totale = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM gajian");
$ttl = mysqli_fetch_array($totale);

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
            background-image: url('img/logo.jpeg');
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
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title btn btn-outline-danger text-center shadow">Isi Dulu Nama Pegawai, Hadir dan lembur !</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="  px-2 card text-center pt-4 shadow">
                        <form action="">
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-4 col-form-label fw-bold">Nama Pegawai</label>
                                <div class="col-sm-8">
                                    <select id="namaSelect" class="form-select shadow" aria-label=".form-select-sm example" onchange="updateNamaPegawai(this.value)">
                                        <option value="<?= $row['nama']; ?>"><?= $namaOptions; ?></option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hadir" class="col-sm-4 col-form-label fw-bold">Hadir</label>
                                <div class="col-sm-8">
                                    <select class="form-select shadow" id="hadir" onchange="updateTotal()">
                                        <option value="0">Pilih</option>
                                        <option value="0">Tidak Hadir</option>
                                        <option value="10000">1 Hari</option>
                                        <option value="20000">2 Hari</option>
                                        <option value="30000">3 Hari</option>
                                        <option value="40000">4 Hari</option>
                                        <option value="50000">5 Hari</option>
                                        <option value="60000">6 Hari</option>
                                        <option value="70000">7 Hari</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hadir" class="col-sm-4 col-form-label fw-bold">Lembur</label>
                                <div class="col-sm-8">
                                    <select class="form-select shadow" id="lembur" onchange="updateTotal()">
                                        <option value="0">Pilih</option>
                                        <option value="0">Tidak Lembur</option>
                                        <option value="10000">1 Hari</option>
                                        <option value="20000">2 Hari</option>
                                        <option value="30000">3 Hari</option>
                                        <option value="40000">4 Hari</option>
                                        <option value="50000">5 Hari</option>
                                        <option value="60000">6 Hari</option>
                                        <option value="70000">7 Hari</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <div class="row justify-content-center">
        <div class="col-xl-7 col-sm-12 col-md-12 mt-3 px-3">
            <div class="card card-bg pb-3">
                <div class="card-header text-start">
                    Invoice
                    <strong><?= $tanggalHariIni ?></strong>
                    <a class="btn btn-sm btn-outline-primary d-print-none mx-3 shadow" href="index.php">input Data</a>
                    <a class=" btn btn-sm btn-outline-success d-print-none mx-3 mx-3 shadow" type="button" value="Cetak" onclick="window.print()">Print</a>
                    <span class="float-end">Status: <strong> Paid</strong></span>
                </div>
                <div class="card-body p-3">
                    <table class="table-clear mb-3 p-5">
                        <tr>
                            <td class="p-2 dari">
                                <h6 class="mb-3">From:</h6>
                                <div>
                                    <a href="index.php"><img class="center" src="img/bg1.png" alt="" width="200"></a>
                                </div>
                                <div>Jl. Gunung Tangkuban Perahu.</div>
                                <div>Perum. BUANA PERMAI Blok 1/20.</div>
                                <div>Email: zack77@sovanabali.com</div>
                                <div>Phone: +62 817 977 7607</div>
                            </td>
                            <td class="position-absolute start-50"></td>
                            <td class="position-absolute end-0 px-5 fs-6">
                                <h6 class="mb-3 mt-5">To:</h6>
                                <div class="fw-bold" id="namaPegawai"></div>
                                <div>Jabatan: penjahit</div>
                                <div>Phone: +62 123 456 789</div>
                            </td>
                        </tr>
                    </table>
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
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($invoiceData)) :
                                ?>
                                    <tr>
                                        <td class=""><?php echo $no++; ?></td>
                                        <td><?php echo $row['style']; ?></td>
                                        <td> <?php echo $row['cst']; ?>, <?php echo $row['color']; ?>, <?php echo $row['size']; ?> </td>
                                        <td>Rp. <?= number_format($row['hrg'], 0, ',', '.'); ?></td>
                                        <td><?php echo $row['qty']; ?></td>
                                        <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endwhile; ?>
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
                        <table class="table-sm table-clear">
                            <tbody>
                                <tr>
                                    <td class="left"><strong>Subtotal </strong></td>
                                    <td>:</td>
                                    <td class="" id="subTotal">Rp. <?= number_format($ttl['total'], 0, ',', '.');  ?></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Tunjangan Hadir </strong></td>
                                    <td>:</td>
                                    <td class="" id="tHadir">Rp. <?= number_format($tHadir, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Tunjangan Lembur </strong></td>
                                    <td>:</td>
                                    <td class="" id="tLembur">Rp. <?= number_format($tLembur, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Grand Total :</strong></td>
                                    <td>:</td>
                                    <td class="" id="gndTotal"><strong>Rp. <?= number_format($gndTotal, 0, ',', '.'); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Masukkan link JavaScript Bootstrap dan jQuery di sini -->


    <script>
        $(document).ready(function() {
            // Aktifkan modal saat halaman dimuat
            $('.modal').modal('show');
        });
    </script>

    <script>
        function updateNamaPegawai(value) {
            const namaPegawai = document.getElementById('namaPegawai');
            namaPegawai.textContent = value ? ' ' + value : '';
        }
        const hadirSelect = document.getElementById('hadir');
        const lemburSelect = document.getElementById('lembur');
        const tHadirElem = document.getElementById('tHadir');
        const tLemburElem = document.getElementById('tLembur');
        const gndTotalElem = document.getElementById('gndTotal');
        const subTotalElem = document.getElementById('subTotal');

        hadirSelect.addEventListener('change', updateTunjangan);
        lemburSelect.addEventListener('change', updateTunjangan);

        function updateTunjangan() {
            const hadirValue = parseInt(hadirSelect.value);
            const lemburValue = parseInt(lemburSelect.value);

            tHadir = hadirValue ? hadirValue : 0;
            tLembur = lemburValue ? lemburValue : 0;

            tHadirElem.textContent = tHadir ? 'Rp. ' + formatCurrency(tHadir) : '';
            tLemburElem.textContent = tLembur ? 'Rp. ' + formatCurrency(tLembur) : '';

            const subTotal = parseInt('<?= $ttl['total'] ?>');
            const gndTotal = subTotal + tHadir + tLembur;

            gndTotalElem.innerHTML = '<strong>Rp. ' + formatCurrency(gndTotal) + '</strong>';
        }

        function formatCurrency(number) {
            return number.toLocaleString('id-ID');
        }
    </script>
</body>

</html>