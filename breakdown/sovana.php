



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