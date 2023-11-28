<?php
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$invoiceData = mysqli_query($koneksi, 'SELECT * FROM gajian ORDER BY ID ASC');

$tanggalHariIni = date('dm-Y');
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
$ttl = array(
    'total' => $total
);

echo json_encode($ttl);
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
    <link rel="stylesheet" type="text/css" href="css/stylePrint.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: small;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <!-- modal -->
    <div class="modal" tabindex="-1">
        <?php include 'modal/modalPenjahit.php' ?>
    </div>
    <!-- end modal -->

    <div class="row justify-content-center">
        <div class="col-xl-7 col-sm-12 col-md-12 mt-3 px-3">
            <div class="card card-bg pb-3">
                <div class="card-header text-start">
                    Invoice <span class="fw-bold" id="tanggalNya"><?= $tanggalHariIni ?></span>
                    <a class="btn btn-sm btn-outline-primary d-print-none mx-3 shadow" href="index.php">input Data</a>
                    <a class=" btn btn-sm btn-outline-success d-print-none mx-3 mx-3 shadow" type="button" value="Cetak" onclick="window.print()">Print</a>
                    <span class="float-end">Status: <strong> Paid</strong></span>
                </div>
                <div class="card-body p-3">
                    <?php include 'table/tableAtas.php' ?>
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
                                <?php 
                                // Calculate the total
                                $total = 0;
                                while ($row = mysqli_fetch_assoc($invoiceData)) {
                                    $total += $row['amount'];
                                    echo '<tr>';
                                    echo '<td>' . $row['ID'] . '</td>';
                                    echo '<td>' . $row['item'] . '</td>';
                                    echo '<td>' . $row['description'] . '</td>';
                                    echo '<td class="right">' . number_format($row['unit_cost'], 0, ',', '.') . '</td>';
                                    echo '<td class="center">' . $row['qty'] . '</td>';
                                    echo '<td class="right">' . number_format($row['amount'], 0, ',', '.') . '</td>';
                                    echo '</tr>';
                                }

                                // Assign the total to $ttl['total']
                                $ttl['total'] = $total;
                                ?>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script>
        $(document).ready(function() {
            $('#namaSelect').change(function() {
                var selectedNama = $(this).val();
                $('#namaNya').val(selectedNama);
                $.ajax({
                    type: 'POST',
                    url: 'loadTable.php',
                    data: {
                        nama: selectedNama
                    },
                    success: function(response) {
                        $('#invoiceData').html(response);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.modal').modal('show');            
            // Aktifkan modal saat halaman dimuat           
        });
    </script>

<script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
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

            gndTotal = ttl['total'] + tHadir + tLembur;
            gndTotalElem.textContent = 'Rp. ' + formatCurrency(gndTotal);

            subTotalElem.textContent = 'Rp. ' + formatCurrency(ttl['total']);
        }

        function formatCurrency(amount) {
            return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>

</body>

</html>
