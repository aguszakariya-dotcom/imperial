
<?php
$title = 'Sample | SOVANA WORKSHOP'; // Atur judul sesuai dengan halaman
require_once 'templates/header.php'; 
$bg_img = 'bg.jpg';
?>
<?php 
require_once 'sample/functions.php';
// require_once 'sample/edit.php';

?>

<!-- function -->
<?php 

if (isset($_GET['s'])) {
    if ($_GET['s'] == "ubah") {
        $id = $_GET['id'];
        $sa = mysqli_query($koneksi, "SELECT * FROM sample WHERE id = '$_GET[id]'");
        $row = mysqli_fetch_assoc($sa);
        if ($row) {
            $vnama_customer = $row['nama_customer'];
            $vtanggal = $row['tanggal'];
            // $vtahun = $row['tahun'];
            $vstyle = $row['style'];
            $vcode = $row['code'];
            $vwarna = $row['warna'];
            $vsize = $row['size'];
            $vharga = $row['harga'];
            $vhabis = $row['habis'];
            $vacc_1 = $row['acc_1'];
            $vacc_2 = $row['acc_2'];
            $vketerangan = $row['keterangan'];
            $vgambar = $row['gambar'];
            $vgambar2 = $row['gambar2'];
        }
    } elseif (isset($_GET['s']) == "hapusSample") {
        $hapus = mysqli_query($koneksi, "DELETE FROM sample WHERE id = '$_GET[id]'");
        if ($hapus) {
            $_SESSION['sukses'] = "Data berhasil dihapus";
            echo '<script>
                    Swal.fire({
                        position: "top-start",
                        icon: "success",
                        title: "'. $_SESSION['sukses'] .'",
                        showConfirmButton: false,
                        timer: 1500,
                        
                    });
                </script>';
        } else {
            $_SESSION['gagal'] = "Data gagal dihapus";
            echo '<script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "'. $_SESSION['gagal'] .'",
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>';
        }
    }
}


if (isset($_POST['update'])) {
    if (updateSample($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Diupdate!';
        
    } else {
        $_SESSION['gagal'] = 'Data Gagal Diubah!';
        
    }
}

if (isset($_POST['save'])) {
    if (saveSample($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "'. $_SESSION['sukses'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "sample.php";
                });
            </script>';
    } else {
        $_SESSION['gagal'] = 'Data Gagal Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "'. $_SESSION['gagal'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).;
            </script>';
    }
}

if (isset($_POST['savePro'])) {
    if (saveProduksi($_POST) > 0) {
        $_SESSION['sukses'] = 'Data Berhasil Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "'. $_SESSION['sukses'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "produksi.php";
                });
            </script>';
    } else {
        $_SESSION['gagal'] = 'Data Gagal Disimpan!';
        echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "'. $_SESSION['gagal'] .'",
                    showConfirmButton: false,
                    timer: 1500
                }).;
            </script>';
    }
}
?>

<?php if (isset($_SESSION['sukses'])) { ?>
    <script>
        Swal.fire({
            position: "top-start",
            icon: "success",
            title: "<?php echo $_SESSION['sukses']; ?>",
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = "sample.php";
        });
    </script>
    <?php unset($_SESSION['sukses']); ?>
<?php } ?>

<?php if (isset($_SESSION['gagal'])) { ?>
    <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?php echo $_SESSION['gagal']; ?>",
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = "sample.php";
        });
    </script>
    <?php unset($_SESSION['gagal']); ?>
<?php } ?>
<!-- content halaman -->

<div class="row justify-content-center mt-2 mb-2">
<div class="col-lg-7 col-md-11 col-sm-12 mb-3 px-2">
        <div class="card shadow">
            <div class="card-header  p-1">
                <!-- <div class=""></div> -->
                <button class="btn btn-sm float-start btn-outline-primary" onclick="myFunction()"><i data-feather="eye-off"></i></button>
                <div id="importSample">
                    <button type="submit" class="btn btn-sm btn-outline-success float-end" id="proSample" name="proSample" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">to Produksi</button>
                </div>
                <div class="text-center fs-6 fw-bold text-info"><i class="feather" data-feather="users"></i>&nbsp;Jumlah Customer <?= $totalCustomer; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                <i class="feather text-primary" data-feather="file-text"></i><span class="text-primary">&nbsp;Jumlah Data Sample <?= $totalSample; ?></span></div>

            </div>
            <div class="card-body ">
                <table class="table table-sm table-hover" id="table-data">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="col-2">Date</th>
                            <th class="col-2">Customer</th>
                            <th class="col-2">Style</th>
                            <th>Code</th>
                            <th>Warna</th>
                            <th>Image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM sample ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= tgl_kita($row['tanggal']) ?></td>
                                <td><?= $row['nama_customer'] ?></td>
                                <td><?= $row['style'] ?></td>
                                <td><?= $row['code'] ?></td>
                                <td><?= $row['warna'] ?></td>
                                <td><img src="img/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="zoom" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="28px" height="36px"></td>
                                <td class="px-2">
                                    <div class="d-flex">
                                        <?php
                                        if ($row['harga'] == '0') {
                                            echo '<span class="text-warning"><i data-feather="shopping-cart"></i></span>';
                                        } else {
                                            echo '<span class="text-success"><i data-feather="dollar-sign"></i></span>';
                                        }
                                        ?>
                                        &nbsp;<a href="sample.php?s=ubah&id=<?= $row['id']; ?>" class=" text-primary" id="editSample" onclick="editFunction()"><i data-feather="edit"></i></a> &nbsp; &nbsp;
                                        <a href="sample.php?s=hapusSample&id=<?= $row['id']; ?>" class="text-danger"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-3 kolom-kiri">
        <div class="card shadow">
            <div class="card-header text-center text-input">Form Sample</div>
            <div class="card-body">
                <form action="" class="form-input text-sm" method="post" enctype="multipart/form-data">
                    <div class="mb-2 row">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" class="zoom" name="gambarLama" value="<?= @$vgambar; ?>">
                        <input type="hidden" class="zoom" name="gambarLama2" value="<?= @$vgambar2; ?>">
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Finish <small class="text-danger float-end"><?= @$vtanggal; ?></small></label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" name="tanggal" style="font-size: small;" value="<?= @$vtanggal; ?>" id="tanggalNya">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-capitalize" id="customerNya" name="nama_customer" style="font-size: small;" value="<?= @$vnama_customer; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-uppercase" name="code" style="font-size: small;" value="<?= @$vcode; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Style</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-capitalize" name="style" style="font-size: small;" value="<?= @$vstyle; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Color</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-capitalize" name="warna" style="font-size: small;" value="<?= @$vwarna; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Size</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-uppercase" name="size" style="font-size: small;" value="<?= @$vsize; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Price</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="harga" style="font-size: small;" value="<?= $vharga; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Penghabisan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="habis" style="font-size: small;" value="<?= @$vhabis; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Accessories </label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-capitalize" name="acc_1" style="font-size: small;" value="<?= @$vacc_1; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label">Accessories 2</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control text-capitalize" name="acc_2" style="font-size: small;" value="<?= @$vacc_2; ?>">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-5 col-form-label" id="inputGroup-sizing-sm">Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px;" name="keterangan"><?= @$vketerangan; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="row start-50">
                            <div class="col-6">
                                <center>
                                    <img class="img-thumbnail  mb-2" id="tampil1" src="img/<?= $vgambar; ?>" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="100px">
                                    <br>
                                    <input class="form-control form-control-sm" id="img1" type="file" name="gambar" value="<?= $vgambar; ?>">
                                </center>
                            </div>
                            <div class="col-6">
                                <center>
                                    <img class="img-thumbnail  mb-2" id="tampil2" src="img/<?= $vgambar2; ?>" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="100px">
                                    <br>
                                    <input class="form-control form-control-sm" id="img2" type="file" name="gambar2" value="<?= $vgambar2; ?>">
                                </center>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center" id="tombol">&nbsp; &nbsp;
                        <button class="btn btn-sm btn-info float-end mx-1" id="update" name="update">Update</button> &nbsp; &nbsp;
                        <button class="btn btn-sm btn-info float-start" id="save" name="save">Save</button> &nbsp;
                    </div>
                </form>
            </div>
        </div>
    </div>


    
</div>

<?php require_once 'templates/footer.php'; ?>

<script src="sample/function.js"></script>