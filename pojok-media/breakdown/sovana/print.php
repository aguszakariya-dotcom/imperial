<?php
$koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$invoiceData = mysqli_query($koneksi, 'SELECT * FROM breakdown ORDER BY ID DESC ');

$tanggalHariIni = date('dmY');
// Initialize the variables

// Mengambil data nama dari tabel

$totale = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM breakdown");
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
    <link rel="stylesheet" type="text/css" href="css/cssNya.css">
    <style>

    </style>
</head>

<body>
    <!-- modal -->
    
    <!-- end modal -->

<div class="row justify-content-center">
<div class="col-xl-7 col-sm-12 col-md-12 mt-3 px-3">
        <div class="card pb-3">            
            <div class="card-header">
                Invoice
                <strong><?= $tanggalHariIni ?></strong>
                <a class="btn btn-sm btn-outline-primary d-print-none mx-3 shadow" href="index.php">input Data</a>
                <a class=" btn btn-sm btn-outline-success d-print-none mx-3 mx-3 shadow" type="button" value="Cetak" onclick="window.print()">Print</a>
                <span class="float-end">Status: <strong> Submission</strong></span>
            </div>
            <div class="card-body p-3 pb-0">
                <table class="table-clear p-5">
                    <tr>
                        <td class="p-2 dari">
                            <!-- <h6 class="mb-3">From:</h6> -->
                            <div>
                                <a href="index.php"><img class="center" src="img/bg1.png" alt="" width="200"></a>
                            </div>
                            <div>Jl. Gunung Tangkuban Perahu.</div>
                            <div>Perum. BUANA PERMAI Blok 1/20.</div>
                            <div>Phone: +62 817 977 7607</div>
                        </td>
                        <td class="position-absolute start-50"></td>
                        <td class="position-absolute end-0 px-5 fs-6">
                            <h6 class="mb-3 mt-5">To: Dewi s</h6>
                            <div>PT. SOVANA BALI GARMEN</div>
                            <div>Phone: +62 859 4089 7837</div>
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="table-sm mb-2">
                    <table class="table table-sm" id="table-print">
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
                                    <td><?php echo $row['item']; ?></td>
                                    <td> <?php echo $row['descripsi']; ?></td>
                                    <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <div class="row">
                </div>
                <div class="col-xl-6 col-sm-6 px-5 float-start text-center">
                    
                    <!-- <p class="text-center fs-6"> TTD</p> -->
                    <!-- <div class="card-header">TTD</div> -->
                    <div class="card-body" style="width: 200px; background-color: transparent">
                    <span>TTD</span>
                    <img class="text-center" src="img/ttd.png" alt="tanda tangan" width="200px" height="150px">
                    <span class="text-center">( Agus zakariya )</span>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-5 float-end  text-end mb-3">
                    <table class="table-sm table-clear">
                        <tbody>
                            <tr>
                                <td class=" left"><strong>Grand Total </strong></td>
                                <td>:</td>
                                <td class=" fw-bold" id="subTotal">Rp. <?= number_format($ttl['total'], 0, ',', '.');  ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Masukkan link JavaScript Bootstrap dan jQuery di sini -->


    <!-- <script>
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
    </script> -->
</body>

</html>