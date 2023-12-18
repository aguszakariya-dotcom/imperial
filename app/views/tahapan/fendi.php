<div class="row mt-5 justify-content-center">
    <div class="animate__animated col-xl-3 px-2 mx-3 collapse" id="kiri">
        <div class="card shadow">
            <div class="card-header">Input Data</div>
            <div class="card-body ">
                <form action="<?= BASEURL; ?>/tahapan/tambahFendi" class="form-input text-sm text-start pr-2" method="post" enctype="multipart/form-data" id="inForm">
                    <div class="mb-2 row">
                        <!-- <label class="col-sm-5 col-form-label">Saldo Sebelumnya</label> -->
                        <div class="col-sm-7">
                            <input type="text" class="form-control " name="sebelumnya" id="sebelumnya" value="<?= $data['fendiSaldo']['saldo']; ?>" hidden="true">
                            <!-- <input type="text" class="form-control fw-bold" value="Rp. <?= number_format($saldoTerakhir, 0, ',', '.'); ?>"> -->
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label" for="tanggal">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= date('d-M-Y'); ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label" for="keterangan" id="keterangan">Deskripsi</label>
                        <div class="col-sm-7">
                            <textarea class="form-control text-capitalize" placeholder="Leave a comment here" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label" for="keluar">Penarikan</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="tarik" id="tarik">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 row ">
                        <label class="col-sm-5 col-form-label" for="masuk">Setoran</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="setor" id="setor">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label" for="saldo">Saldo Akhir</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="saldo" id="saldo" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center" id="tombol">
                        <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save</button>
                        &nbsp;
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-black">
                <div class="card-title text-bold" id="keKiri"><i class="fa-solid fa-comments-dollar"></i> Saldo  Rp. <?= number_format($data['fendiSaldo']['saldo'], 0, ',', '.'); ?></div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr style="font-size: 16px; font-weight: 500;">
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Penarikan</th>
                            <th>Setoran</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($data['fendi'] as $fnd) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $fnd['tanggal']; ?></td>
                            <td><?= $fnd['info']; ?></td>
                            <td class="text-danger">Rp. <?= number_format($fnd['tarik'], 0, ',', '.'); ?></td>
                            <td class="text-primary">Rp. <?= number_format($fnd['setor'], 0, ',', '.'); ?></td>
                            <td class="text-bold">Rp. <?= number_format($fnd['saldo'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
                $(document).ready(function() {
                    $('#keKiri').click(function() {
                        $("#kiri").removeClass('collapse')
                        $("#kiri").addClass('animate__backInRight')
                    })
                    var sebelumnya = document.getElementById('sebelumnya');
                    if (sebelumnya.value === '') {
                        sebelumnya.value = 0;
                    }

                    // Mengganti nilai kosong dengan 0 pada input dengan id 'saldo'
                    var saldo = document.getElementById('saldo');
                    if (saldo.value === '') {
                        saldo.value = 0;
                    }

                    function calculateSaldo() {
                        var keluar = parseFloat(document.getElementById("tarik").value);
                        var masuk = parseFloat(document.getElementById("setor").value);
                        var sebelumnyaValue = parseFloat(document.getElementById("sebelumnya").value);
                        var saldoValue = 0;

                        if (isNaN(sebelumnyaValue)) {
                            if (!isNaN(keluar)) {
                                saldoValue = -keluar;
                            } else if (!isNaN(masuk)) {
                                saldoValue = masuk;
                            }
                        } else {
                            if (!isNaN(keluar)) {
                                saldoValue = sebelumnyaValue - keluar;
                            } else if (!isNaN(masuk)) {
                                saldoValue = sebelumnyaValue + masuk;
                            } else {
                                saldoValue = sebelumnyaValue;
                            }
                        }

                        saldo.value = saldoValue;
                    }

                    // Event listener for input changes
                    document.getElementById("tarik").addEventListener("input", calculateSaldo);
                    document.getElementById("setor").addEventListener("input", calculateSaldo);

                    // Event listener saat form di-submit
                    document.querySelector("form").addEventListener("submit", function(e) {
                        e.preventDefault(); // Mencegah refresh halaman
                        // Update saldo
                        calculateSaldo();
                        // Submit form using AJAX
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
                    });
                });
            </script>