<?php
session_start();
$nama = $_SESSION["nama"];

if( !isset($_SESSION["login"]) ) {
    header("Location: ../member/login.php");
    exit;
}

require_once 'functions.php';

require_once '../layout/header.php';

if (isset($_POST['save'])) {
    if (saveSample($_POST) > 0) {
        echo "<script>
        new Noty({
            type: 'success',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data Berhasil di Tambahkan',
            timeout: 3000 
        }).show();
                </script>";
    } else {
        echo "<script>
        new Noty({
            type: 'error',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data GAGAL di Tambahkan',
            timeout: 3000 
        }).show();
                </script>";
    }
}
if (isset($_POST['tambahkan'])) {
    if (saveSample($_POST) > 0) {
        echo "<script>
        new Noty({
            type: 'success',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data Berhasil di Tambahkan',
            timeout: 3000 
        }).show();
                </script>";
    } else {
        echo "<script>
        new Noty({
            type: 'error',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data GAGAL di Tambahkan',
            timeout: 3000 
        }).show();
                </script>";
    }
}

if (isset($_POST['update'])) {
    if (updateSample($_POST) > 0) {
        echo "<script>
        new Noty({
            type: 'success',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data Berhasil di Update',
            timeout: 3000 
        }).show();
        </script>";
    } else {
        echo "<script>
        new Noty({
            type: 'error',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data GAGAL di Edit',
            timeout: 3000 
        }).show();
        </script>";
    }
}


if (isset($_GET['s']) == "hapus") {
    $hapus = mysqli_query($koneksi, "DELETE FROM sample WHERE id = '$_GET[id]'");
    if ($hapus) {
        echo "<script>
        new Noty({
            type: 'success',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data Berhasil di Hapus',
            timeout: 3000,
            callbacks: {
                beforeClose: function() {
                    window.location.href = 'index.php';
                }
            }
        }).show();
</script>";
    } else {
        echo "<script>
        new Noty({
            type: 'error',
            theme: 'nest',
            layout: 'topRight',
            text: 'Data GAGAL di Hapus',
            timeout: 3000 
        }).show();
                </script>";
    }
}
?>

<!-- Konten tabel akan ditampilkan di sini -->
<div class="container">
    <div class="row justify-content-center mt-3 mb-5 ">
        <div class="col-4 animate__animated collapse" id="kiri">
            <div class="card">
                <div class="card-header"> Input & Update Data Sample</div>
                <div class="card-body">
                    <form action="" class="form-input text-sm" method="post" enctype="multipart/form-data">
                        <small>
                            <div class="mb-2 row">
                                <input type="hidden" name="id" id="tbId">
                                <input type="hidden" class="form-control" name="gambarLama" id="tbGambarLama">
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Date Finish </label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control form-control-sm" name="tanggal" id="tbTanggal">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Customer</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-capitalize" name="nama_customer" id="tbNamaCustomer">
                                </div>
                            </div>
                            <div class=" mb-1 row">
                                <label class="col-sm-5 col-form-label">Code Sample</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="code" id="tbCode">
                                </div>
                            </div>
                            <div class=" mb-1 row">
                                <label class="col-sm-5 col-form-label">Style</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-capitalize" name="style" id="tbStyle">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Color</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-capitalize" name="warna" id="tbWarna">
                                </div>
                            </div>
                            <div class=" mb-1 row">
                                <label class="col-sm-5 col-form-label">Size</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-uppercase" name="size" id="tbSize">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Price</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control form-control-sm" name="harga" id="tbHarga">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Penghabisan</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm" name="habis" id="tbHabis">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Accessories </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-capitalize" name="acc_1" id="tbAcc1">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Accessories 2</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-sm text-capitalize" name="acc_2" id="tbAcc2">
                                </div>
                            </div>
                            <div class="mb-1 row"> <label class="col-sm-5 col-form-label">Description</label>
                                <div class="col-sm-7">
                                    <textarea class="form-control form-control-sm text-capitalize" rows="3" name="keterangan" id="tbKeterangan"></textarea>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="row justify-content-center">
                                    <div class="col-sm-10 text-center justify-content-center">
                                        <img id="view2" src="#" alt="Preview Gambar" class="animate__animated mb-2 img-thumbnail shadow" style="max-width: 100%; max-height: 150px;"><br>
                                    <input class="btn btn-sm btn-outline-secondary" id="gambar2" type="file" name="gambar">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex" id="tbUpdate">
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4 text-center">
                                    <button class="btn btn-sm btn-outline-primary" name="update" id="update"> <i data-feather="check-square"></i>Update</button>
                                </div>
                                <div class="col-sm-4 float-end text-end">
                                    <button class="btn btn-sm btn-outline-danger" id="tbClose"><i data-feather="power"></i></button>
                                </div>
                            </div>
                        </small>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 animate__animated" id="card-tengah">
            <small>
                <div class="card">
                    <div class="card-header row">
                        <div class="col-sm-3 text-start"><button type="button" class="btn btn-outline-light text-dark" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"><i data-feather="activity"></i></button></div>
                        <div class="col-sm-6 text-center">
                            <span class="text-capitalize btn btn-sm btn-outline-primary animate__animated animate__headShake animate__slower animate__infinite"><h4><?= $nama; ?></h4></span>
                        </div>
                        <div class="col-sm-3 text-end">
                        <a href="../member/logout.php" class="text-end">Log out <i data-feather="log-out"></i></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <table id="table-sample" class="table table-striped table-hover" style="width:100%">

                        </table>
                    </div>
                </div>
            </small>
        </div>
        <!-- kanan -->
        <div class="col-4 animate__animated" id="kanan">
            <div class="card">
                <div class="card-header text-center h5" id="nm_cst"> Gambar </div>
                <div class="card-body justify-content-center item-content-center">
                    <div style="position: relative;">
                        <img src="../images/nophoto.jpg" alt="Image" id="gambar-kanan" height="520px" width="100%">
                        <div style="position: absolute; top: 20px; left: 40px; background-color: rgba(0, 0, 0, 0.7); color: white; padding: 5px;" id="style-kanan">
                        <script>
                            // Ambil elemen gambar dengan id "gambar-kanan"
                            var gambarKanan = $("gambar-kanan");

                            // Periksa apakah atribut "src" dari gambar kosong
                            if (gambarKanan === "" || gambarKanan.src === undefined) {
                                // Jika kosong, isi dengan "../img/nophoto.jpg"
                                gambarKanan.src = "../images/nophoto.jpg";
                            }
                        </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mb-5">
        <div class="card">
            <div class="card-header">Add Data</div>
            <div class="card-body">
                <form action="" class="form-input text-sm" method="post" enctype="multipart/form-data">
                    <small>
                        <input type="hidden" class="form-control" name="gambarLama" id="gambarLama">
                        <div class="mb-1 row">
                            <label class="col-sm-5 col-form-label">Finish <small class="text-danger float-end"></small></label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="tanggal" style="font-size: small;" id="tanggalNya">
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <label class="col-sm-5 col-form-label">Customer</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control text-capitalize" id="customerNya" name="nama_customer" style="font-size: small;">
                            </div>
                        </div>
                        <div class=" mb-1 row">
                            <label class="col-sm-5 col-form-label">Code</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control text-uppercase" name="code" style="font-size: small;"">
                            </div>
                        </div>
                        <div class=" mb-1 row">
                                <label class="col-sm-5 col-form-label">Style</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" name="style" style="font-size: small;">
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-sm-5 col-form-label">Color</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control text-capitalize" name="warna" style="font-size: small;"">
                            </div>
                        </div>
                        <div class=" mb-1 row">
                                    <label class="col-sm-5 col-form-label">Size</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control text-uppercase" name="size" style="font-size: small;">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-5 col-form-label">Price</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" name="harga" style="font-size: small;">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-5 col-form-label">Penghabisan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="habis" style="font-size: small;">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-5 col-form-label">Accessories </label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control text-capitalize" name="acc_1" style="font-size: small;">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-5 col-form-label">Accessories 2</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control text-capitalize" name="acc_2" style="font-size: small;">
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-5 col-form-label" id="inputGroup-sizing-sm">Description</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px;" name="keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="row d-flex">
                                        <div class="col-6">
                                            <img id="tampil1" src="#" alt="Preview Gambar" class="animate__animated animate__bounceOut mb-2" style="max-width: 100%; max-height: 150px;">
                                            <input class="form-control form-control-sm" id="img1" type="file" name="gambar">
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="text-center" id="tombol">
                                    <button class="btn btn-sm btn-info float-start" id="save" name="save">Save</button> &nbsp;
                                </div>
                    </small>
                </form>
            </div>

        </div>
    </div>
</div>



<style>
    #table-sample {
        font-size: small;
        font-family: 'Poppins', sans-serif;
        color: #474141;
    }
    #table-body {
        font-size: smaller;
        color: #9E9FA5;
    }

    table,
    .img-table {
        height: 30px;
        width: fit-content;
    }

    .icon {
        height: 20px;
        display: none;
    }

    .zoom {
        transition: transform 0.5s;
        /* Transition for smooth zoom effect */
        z-index: -99992;
    }

    .zoom:hover {
        transform: scale(4.4);
        /* Zoom in by 20% on hover */
        z-index: -999999;
        /* Raise the z-index when zoomed */
    }
</style>
<?php require_once '../layout/footer.php'; ?>
<script>
    $('#table-sample').click(function() {
        $('#kanan').addClass('animate__fadeOutDown');
        kiriTampil();
        // $('#card-tengah').addClass('collapse');
    })
    $('#tbClose').click(function() {
        $('#kiri').removeClass('collapse');
    })

    function kiriTampil() {
        $('#kanan').addClass('collapse');
        $('#kiri').removeClass('collapse');
        $('#kiri').addClass('animate__bounceInUp');

    }

    function kananTampil() {
        $('#kiri').addClass('collapse');
        $('#kiri').removeClass('animate__bounceInUp');
        $('#kanan').removeClass('collapse');
        $('#kanan').addClass('animate__fadeInUp');
    }

    $(document).ready(function() {
        $('#kiri').addClass('collapse');
        $('#kanan').addClass('collapse');
        $('#table-sample').load('table-sample.php');
        // new DataTable('#table-sample');
        feather.replace();
        $('#table-sample').on('mouseenter', 'tr', function() {
            $(this).find('.icon').show();
            $('#kanan').removeClass('collapse');
            var id = $(this).data('id');
            var nama_customer = $(this).data('nama_customer');
            var tanggal = $(this).data('tanggal');
            var style = $(this).data('style');
            var code = $(this).data('code');
            var warna = $(this).data('warna');
            var size = $(this).data('size');
            var harga = $(this).data('harga');
            var habis = $(this).data('habis');
            var acc_1 = $(this).data('acc_1');
            var acc_2 = $(this).data('acc_2');
            var keterangan = $(this).data('keterangan');
            var gambar = $(this).data('gambar');

            $('#tbId').val(id);
            $('#nm_cst').text(nama_customer);
            $('#tbNamaCustomer').val(nama_customer);
            $('#tbTanggal').val(tanggal);
            $('#tbStyle').val(style);
            $('#tbCode').val(code);
            $('#tbWarna').val(warna);
            $('#tbSize').val(size);
            $('#tbHarga').val(harga);
            $('#tbHabis').val(habis);
            $('#tbAcc1').val(acc_1);
            $('#tbAcc2').val(acc_2);
            $('#tbKeterangan').text(keterangan);
            $('#gambar2').attr(gambar);
            $('#tbGambarLama').val(gambar);
            $('#view2').attr('src', '../img/' + gambar);
            $('#view2').addClass('animate__fadeInDown');
            $('#style-kanan').text(style);
            $('#gambar-kanan').attr('src', '../img/' + gambar);
        }).on('mouseleave', 'tr', function() {
            $(this).find('.icon').hide();
            $('#kanan').addClass('collapse');
        });

        img1.onchange = function() {
            // $('#tampil1').removeClass('animate__bounceOut')
            $('#tampil1').addClass('animate__bounceInDown')
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById("tampil1").src = reader.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
        gambar2.onchange = function() {
            $('#view2').removeClass('animate__bounceOut')
            $('#view2').addClass('animate__bounceInDown')
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById("view2").src = reader.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $('#view1').attr('src', e.target.result);
        //         }

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

    })
</script>