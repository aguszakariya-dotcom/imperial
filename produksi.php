<?php
require_once 'koneksi.php';
$title = 'Produksi | SOVANA WORKSHOP'; // Atur judul sesuai dengan halaman
$bg_img = 'bg.jpg';

include 'produksi/functions.php';
include 'produksi/edit.php';
require_once 'templates/header.php';
?>
<!-- content -->


    <div class="row justify-content-center mt-2 mb-2">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-3 kolom-kiri">
            <div class="card shadow">
                <div class="card-header px-2 text-center">
                    <span>Input data Produksi</span>
                </div>
                <div class="card-body">
                <form action="" class="form-input text-sm" method="post" enctype="multipart/form-data">
                            <div class="mb-2 row">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                <input type="hidden" class="zoom" name="gambarLama" value="<?= @$pgambar; ?>">
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Finish <small
                                        class="text-danger float-end"><?= @$pbulan; ?></small></label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="bulan" style="font-size: small;"
                                        value="<?= @$pbulan; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Customer</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" id="customerNya" name="nama_customer"
                                        style="font-size: small;" value="<?= @$pnama_customer; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Code</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-uppercase" name="code"
                                        style="font-size: small;" value="<?= @$pcode; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Style</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" name="style"
                                        style="font-size: small;" value="<?= @$pstyle; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Fabric</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" name="bahan"
                                        style="font-size: small;" value="<?= @$pbahan; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Color</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" name="warna"
                                        style="font-size: small;" value="<?= @$pwarna; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Size</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-uppercase" name="size"
                                        style="font-size: small;" value="<?= @$psize; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Jumlah</label>
                                <div class="col-sm-7">                                
                                    <input type="number" class="form-control" name="qty" style="font-size: small;" value="<?= @$pqty; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Cost Sample</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="harga" style="font-size: small;"
                                        value="<?= @$pharga; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Cost Tailor</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control text-capitalize" name="jahit"
                                        style="font-size: small;" value="<?= @$pjahit; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Cost Cutting</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control text-capitalize" name="motong"
                                        style="font-size: small;" value="<?= @$pmotong; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Status <small
                                        class="text-danger float-end"><?= @$pstatus; ?></small></label>
                                <div class="col-sm-7">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                                        <option selected value="<?= @$pstatus; ?>">Open this select menu</option>
                                        <option value="Menunggu">Menunggu</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Finish">Finish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Cost Naskat</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control text-capitalize" name="naskat"
                                        style="font-size: small;" value="<?= @$pnaskat; ?>">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label" id="inputGroup-sizing-sm">Description</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px;"
                                        name="keterangan"><?= @$pketerangan; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="row start-50">
                                    <div class="col-6">
                                        <center>
                                            <img src="./img/<?= $pgambar; ?>" class="mb-1" id="ketok" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';"
                                                width="100px" height="140px">
                                            <br>
                                            <input class="form-control form-control-sm" id="img1" type="file" name="gambar"
                                                value="<?= $pgambar; ?>">
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center" id="tombol">&nbsp; &nbsp;
                                <button type="submit" class="btn btn-sm btn-info float-end mx-1" id="update"
                                    name="update">Update</button> &nbsp; &nbsp;
                                <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save | Tambahkan</button> &nbsp;
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-11 col-sm-12 px-3">
            <div class="card shadow">
                <div class="card-header px-1">
                    <span class="text-start"><i data-feather="arrow-left" class="text-info" onclick="myFunction()"></i>
                    </span>
                    <div class="text-center fs-6 fw-bold text-info"><i class="feather" data-feather="users"></i>&nbsp;Customer <?= $totalCustomer; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="feather text-primary" data-feather="archive"></i><span class="text-primary">&nbsp; Jumlah Order = <?= number_format($jumlahDataProduksi,0,',','.') ?></span>
                    </div>
                </div>
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
                                while($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <th class="col text-white"><?= $no++ ?></th>
                                    <td><?= tgl_kita($row['bulan']) ?></td>
                                    <td><?= $row['nama_customer'] ?></td>
                                    <td><?= $row['code'] ?></td>
                                    <td><?= $row['style'] ?></td>
                                    <td><?= $row['warna'] ?></td>
                                    <td><?= $row['qty'] ?></td>
                                    <td><img src="./img/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="zoom" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';"
                                    width="28px" height="36px"></td>
                                    <td>
                                        <?php 
                                        if($row['status'] == 'Menunggu') {
                                            echo '<i data-feather="clock"></i>';
                                        } else if($row['status'] == 'Proses') {
                                            echo '<i class="fa-solid fa-cog fa-spin text-info" style="--fa-animation-duration: 15s; height: 40; width: 40; "></i> Proses';
                                        } else if($row['status'] == 'Finish') {
                                            echo '<img src="images/done.png" width="40">';
                                        }else if($row['status'] == '') {
                                            echo '<span data-feather="badge badge-danger">Finish</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="px-2">
                                        <div class="d-flex">                                        
                                                <a href="produksi.php?p=ubah&id=<?= $row['id']; ?>" class="text-info" id="editSample"><i class="fa-solid fa-file-pen"></i></a> &nbsp; 
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



<?php
require_once 'templates/footer.php';
?>
<script src="produksi/function.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            })
        });
    });
</script>