<?php 


?>
<form id="myform">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="nama" id="nama">
                                    <option value="">Pilih Nama</option>
                                    <option value="Ali Mansur">Ali Mansur</option>
                                    <option value="Nur Efendi Z">Nur Efendi Z</option>
                                    <option value="Alwi">Alwi</option>
                                    <option value="Adi Tri U">Adi</option>
                                    <option value="Sulaiman">Sulaiman</option>
                                    <option value="Ny Ariantini">Komang</option>
                                    <option value="Juni Antari">Juni Ant</option>
                                    <option value="Laksmi Dewi">Laksmi</option>
                                    <!-- <option value="Ayu Sari Puspita D">Ayu</option> -->
                                    <option value="Diana">Diana</option>
                                    <option value="Tri">Tri</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tanggal" value="<?= date('d M Y') ?>">
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
                        <!-- Tambahkan form-group untuk input Size -->
                        <div class="mb-3 row">
                            <label for="size" class="col-sm-4 col-form-label">Size</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control text-uppercase" name="size" id="size">
                            </div>
                        </div>
                        <!-- Tambahkan form-group untuk input Jumlah -->
                        <div class="mb-3 row">
                            <label for="qty" class="col-sm-4 col-form-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="qty" id="jumlah">
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
                                <input type="number" class="form-control" name="total" id="total">
                            </div>
                        </div>
                        <hr>
                        <div class="text-center" id="tombol">
                            <button type="submit" class="btn btn-sm btn-info float-end mx-1"
                                name="simpan">Submit</button>
                            <a class="btn btn-sm btn-outline-info" href="print.php">Cetak</a>
                            <button type="button" class="btn btn-sm btn-outline-danger float-start"
                                id="hapusData">Hapus</button>
                        </div>
                        <hr>
                        <blockquote class="blockquote text-pesan fst italic">
                            Untuk harga berbeda, Ubah harga dulu lalu jumlahnya diisi !!
                        </blockquote>
                    </form>