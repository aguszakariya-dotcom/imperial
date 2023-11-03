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
<div class="row justify-content-center pt-3 ml-5">
    <div class="col-lg-3  animate__animated " id="card-kiri">
        <div class="card ">
            <div class="card-header text-center">
                <span>Input data Produksi</span>
            </div>
            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group form-group-sm row shadow-sm">
                        <label class="col-sm-5" for="finish">finish</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-border border-width-2" id="finish">
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
                        <label class="col-sm-5" for="potong">Cost Cutting</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="potong" name="potong">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="Naskat">Cost Naskat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="potong" name="potong">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm">
                        <label class="col-sm-5" for="Naskat">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control form-control-border border-width-2 select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected">Proses</option>
                                <option >Finish</option>
                                <option >California</option>
                                <option >Menunggu</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group row mb-3 shadow-sm">
                        <label class="col-sm-5" for="Naskat">Description</label>
                        <div class="col-sm-7">
                        <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px; width: 100%;"
                                        name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-1 justify-content-center">
                        <div class=" justify-content-center">
                        <img src="./img/" class="mb-1" id="ketok" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="100px" height="140px"> <br>
                        <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file text-xs">
                        <input type="file" class="custom-file-input" id="ambilGambar">
                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                      </div>
                      <div class="input-group-append">
                        <!-- <span class="input-group-text">Upload</span> -->
                      </div>
                    </div>
                  </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="text-center" id="tombol">&nbsp; &nbsp;
                                <button type="submit" class="btn btn-sm btn-info float-end mx-1" id="update"
                                    name="update">Update</button> &nbsp; &nbsp;
                                <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save | Tambahkan</button> &nbsp;
                            </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-9 animate__animated animate__backInRight">
        <div class="card ">
            <div class="card-header"><i data-feather="plus-circle" class="tambah"></i></div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="col-sm-2">Date</th>
                            <th class="col-sm-2">Customer</th>
                            <th>Code</th>
                            <th class="col-sm-2">Style</th>
                            <th>Warna</th>
                            <th>QTY</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['produksi'] as $produksi) : ?>
                            <tr>
                                <th class=""><?= $no++ ?></th>
                                <td class="text-capitalize"><?= tgl_kita($produksi['bulan']); ?></td>
                                <td class="text-capitalize"><?= $produksi['nama_customer']; ?></td>
                                <td><?= $produksi['code']; ?></td>
                                <!-- <td ><?= $produksi['code']; ?></td> -->
                                <td class="text-capitalize"><?= $produksi['style']; ?></td>
                                <td class="text-capitalize"><?= $produksi['warna']; ?></td>
                                <td><?= $produksi['qty']; ?></td>
                                <td class="">
                                    <img src="<?= BASEURL; ?>/img/<?= $produksi['gambar']; ?>" alt="" height="30" width="22" class=" zoom">
                                </td>
                                <td class="text-capitalize"><?= $produksi['status']; ?></td>
                                <td>
                                    <!-- Tambahkan link untuk ikon "trash-2" -->
                                    <a href="<?= BASEURL; ?>/produksi/edit/<?= $produksi['id']; ?>" class="text-info edit-icon"><i data-feather="edit" class="icon"></i></a>
                                    <a href="<?= BASEURL; ?>/produksi/hapus/<?= $produksi['id']; ?>" class="text-warning delete-icon"><i data-feather="trash-2" class="icon"></i></a>
                                </td>
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