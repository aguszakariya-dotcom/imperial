<?php require_once 'koneksi.php' ?>
<?php require './layout/header.php' ?>
<div class="row mt-5 justify-content-center">
    <div class="col-lg-3">
        <div class="card shadow">
            <div class="card-header">Input Data</div>
            <div class="card-body">
                <form action="" class="form-horizontal text-bold" method="post" enctype="multipart/form-data">
                    <!-- <div class="card-body"> -->
                    <div class="form-group form-group-sm row shadow-sm">
                        <label class="col-sm-5" for="bulan">Finish</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-border border-width-2" name="bulan" id="bulan">
                        </div>
                    </div>
                    <div class="form-group row shadow-sm">
                        <label class="col-sm-5 pb-0" for="nama_customer">Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm form-control-border border-width-2" id="nama_customer" name="nama_customer">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="style">Style</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="style" name="style">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="code">Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="code" name="code">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="size">Size</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="size" name="size">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="bahan">Fabric</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="bahan" name="bahan">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="warna">Color</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="warna" name="warna">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="qty">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="qty" name="qty">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="harga">Cost Sample</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="jahit">Cost Tailor</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="jahit" name="jahit">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="motong">Cost Cutting</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="motong" name="motong">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="naskat">Cost Naskat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="naskat" name="naskat">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="Naskat">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-border border-width-2 select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="status" name="status">
                                <option selected="selected">Proses</option>
                                <option>Finish</option>
                                <!-- <option>California</option> -->
                                <option>Menunggu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3 shadow-sm">
                        <label class="col-sm-5" for="Naskat">Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px; width: 100%;" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-1 justify-content-center">
                        <div class=" justify-content-center">
                            <img src="<?= BASEURL; ?>/img/nophoto.jpg" class="mb-1" id="gambar" width="100px" height="140px"><br>
                            <input type="file" id="gambarLama" name="gambarLama">
                        </div>
                    </div>
                    <!-- </div> -->
                    <div class="">
                        <div class="text-center" id="tombol">
                            <button type="submit" class="btn btn-sm btn-info float-end mx-1" id="update" name="update">Update</button> &nbsp; &nbsp;
                            <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save | Tambahkan</button> &nbsp;
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8 shadow bg-cyan">
        <div class="card">
            <div class="card-header">Data Produksi</div>
            <div class="card-body">
            <table class="table table-sm table-hover table-responsiv" id="table-data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="col-sm-2">Date</th>
                            <th>Customer</th>
                            <th>Code</th>
                            <th>Style</th>
                            <th>Warna</th>
                            <th>QTY</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM produksi ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <th class="col text-white"><?= $no++ ?></th>
                                <td><?= tgl_kita($row['bulan']) ?></td>
                                <td><?= $row['nama_customer'] ?></td>
                                <td><?= $row['code'] ?></td>
                                <td><?= $row['style'] ?></td>
                                <td><?= $row['warna'] ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td><img src="./img/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="zoom" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="28px" height="36px"></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'Menunggu') {
                                        echo '<i data-feather="clock"></i>';
                                    } else if ($row['status'] == 'Proses') {
                                        echo '<i class="fa-solid fa-cog fa-spin text-info" style="--fa-animation-duration: 15s; height: 40; width: 40; "></i> Proses';
                                    } else if ($row['status'] == 'Finish') {
                                        echo '<img src="images/done.png" width="40">';
                                    } else if ($row['status'] == '') {
                                        echo '<span data-feather="badge badge-danger">Finish</span>';
                                    }
                                    ?>
                                </td>
                                <td class="px-2">
                                    <div class="d-flex">
                                        <a href="produksi.php?p=ubah&id=<?= $row['id']; ?>" class="text-info" id="editSample"><i class="fa-solid fa-file-pen" class="edit"></i></a> &nbsp;
                                        <a href="produksi.php?p=hapus&id=<?= $row['id']; ?>" class="text-danger float-end"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php require './layout/footer.php' ?>