<?php require_once 'layout/header.php'; ?>

<style>
    .content {
        /* font-size: smaller; */
        font-family: 'Times New Roman', Times, serif;
        background-image: url('https://wallpapers.com/images/featured-full/sexy-body-txdajxjfip2a9txg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        /* background-color: #111; */
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
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
<?php
$koneksi = mysqli_connect('becik.my.id:3306', 'akuntansi_ok', '123/akuntansi', 'akuntansi');
?>
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

<script>
    $(document).ready(function() {
        $('.tambah').on('click', function() {
            $('#card-kiri').removeClass('collapse');
            $('#card-kiri').addClass('animate__backInDown');
            $('body').addClass('sidebar-mini layout-fixed sidebar-closed sidebar-collapse');
        });

        $('#dataTable').on('mouseenter', 'tr', function() {
            $(this).find('.icon').show();
        }).on('mouseleave', 'tr', function() {
            $(this).find('.icon').hide();
        });
        $('#delete-akun').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= BASEURL; ?>/akuntansi/hapus',
                success: function(response) {
                    // alert ('ok');
                }
            })
        })


    })
</script>
<?php require_once 'layout/footer.php'; ?>