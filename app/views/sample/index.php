<style>
    .content {
        /* font-size: smaller; */
        font-family: 'Times New Roman', Times, serif;
        background-image: url('https://wallpapers.com/images/hd/black-coffee-in-teacup-dhl1b1hq6yy0tfk7.webp');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        /* background-color: #111; */
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .animate__animated {
        --animate-duration: 2s;
    }

    .table {
        font-size: smaller;
        font-family: 'Times New Roman', Times, serif;
    }

    .table td {
        font-size: 12px;
    }

    .icon {
        display: none;
    }
</style>


<div class="row mb-5 justify-content-center animate__animated animate__fadeInLeft">
    <div class="col-lg-10 ">
        <div class="card card-secondary">
            <div class="card-header list-group-item d-flex w-100 justify-content-between align-items-center">
                <div class="col-4 ">
                    <i data-feather="credit-card"></i>
                    
                    
                </div>
                <div class="col-4"></div>
                <div class="col-4 float-right">
                    
                </div>
            </div>
            <div class="card-body shadow">
                <table id="data-table" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-sm-2">Date</th>
                            <th class="col-sm-1">No Akun</th>
                            <th class="col-sm-3">Nama Akun</th>
                            <th class="col-sm-3">Transaksi</th>
                            <th class="col-sm-1">Debit</th>
                            <th class="col-sm-1">Kredit</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $totalDebit = 0;
                        $totalKredit = 0;
                        
                        foreach ($data['mutasi'] as $mutasi) {
                            // Menghitung total debit dan kredit pada setiap baris
                            $totalDebitBaris = floatval($mutasi['debit1']) + floatval($mutasi['debit2']) + floatval($mutasi['debit3']);
                            $totalKreditBaris = floatval($mutasi['kredit1']) + floatval($mutasi['kredit2']) + floatval($mutasi['kredit3']);
                        
                            // Menambahkan total debit dan kredit pada setiap baris ke total keseluruhan
                            $totalDebit += $totalDebitBaris;
                            $totalKredit += $totalKreditBaris;
                        ?>

                            <tr class="delete-icon">                               
                                <td><?= tgl_kita($mutasi['tanggal']); ?></td>
                                <td><?= $mutasi['noAkun1']; ?></td>
                                <td><?= $mutasi['namAkun1']; ?></td>
                                <td><?= $mutasi['keterangan']; ?></td>
                                <td><?= number_format(floatval($mutasi['debit1']), 0, ',', '.'); ?></td>
                                <td><?= number_format(floatval($mutasi['kredit1']), 0, ',', '.'); ?></td>
                                <td>
                                <a href="<?= BASEURL; ?>/mutasi/hapus/<?= $mutasi['id']; ?>" class="text-danger delete-icon"><i data-feather="trash-2" class="icon"></i></a>
                                </td>

                            <tr></tr>
                            <td></td>
                            <td><?= $mutasi['noAkun2']; ?></td>
                            <td><?= $mutasi['namAkun2']; ?></td>
                            <td><?= $mutasi['keterangan']; ?></td>
                            <td><?= number_format(floatval($mutasi['debit2']), 0, ',', '.'); ?></td>
                            <td><?= number_format(floatval($mutasi['kredit2']), 0, ',', '.'); ?></td>
                            <tr id="baris3">
                            </tr>

                            <td></td>
                            <td><?= $mutasi['noAkun3']; ?></td>
                            <td><?= $mutasi['nama3']; ?></td>
                            <td></td>
                            <td>
                                <?php
                                if ($mutasi['debit3'] == '') {
                                    echo '';
                                } else {
                                    echo number_format($mutasi["debit3"], 0, ',', '.');
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($mutasi['kredit3'] == '') {
                                    echo '';
                                } else {
                                    echo number_format($mutasi["kredit3"], 0, ',', '.');
                                }
                                ?>
                            </td>

                            </tr>
                        <?php }; ?>

                    </tbody>
                </table>
                <div class="row mt-3 px-4">
                    <div class="colsm-4 animate__animated animate__bounceOut animate__infinite animate__slower">
                        <i data-feather="credit-card"></i>Total Debit Rp. <strong><?= number_format($totalDebit, 0, ',', '.'); ?></strong>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="colsm-4 float-right mr-3 animate__animated animate__zoomInRight animate__infinite animate__slower">
                    <i data-feather="credit-card"></i>Total Debit Rp. <strong><?= number_format($totalKredit, 0, ',', '.'); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>