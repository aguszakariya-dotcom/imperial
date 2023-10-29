<style>
    .content-wrapper {
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
<div class="row justify-content-center pt-3 ml-5">
    <div class="col-lg-3 collapse animate__animated " id="card-kiri">
        <div class="card bg-bg-gradient-secondary">
            <div class="card shadow">
                <div class="card-header px-2 text-center bg-gradient-gray-dark">
                    <span>Input data Produksi</span>
                </div>
                <div class="card-body">
                    <form action="" class="form-input text-sm" method="post" enctype="multipart/form-data">
                        <div class="mb-2 row">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <input type="hidden" class="zoom" name="gambarLama" value="<?= @$pgambar; ?>">
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Finish <small class="text-danger float-end"><?= @$pbulan; ?></small></label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control form-control-sm" name="bulan" style="font-size: small;" value="<?= @$pbulan; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Customer</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control-sm text-capitalize" id="customerNya" name="nama_customer" style="font-size: small;" value="<?= @$pnama_customer; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Code</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control-sm text-uppercase" name="code" style="font-size: small;" value="<?= @$pcode; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Style</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control-sm text-capitalize" name="style" style="font-size: small;" value="<?= @$pstyle; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Fabric</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control-sm text-capitalize" name="bahan" style="font-size: small;" value="<?= @$pbahan; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Color</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control-sm text-capitalize" name="warna" style="font-size: small;" value="<?= @$pwarna; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-2 col-form-label">Size</label>
                            <!-- <div class="col-sm-10"> -->
                                <!-- <input type="text" class="form-control-sm text-uppercase" name="size" style="font-size: small;" value="<?= @$psize; ?>"> -->
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="XS">
                                        </div>
                                        <div class="col-sm-2">
                                        <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="S">
                                        
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="M">
                                            
                                            </div>
                                            <div class="col-sm-2">
                                                
                                                <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="L">
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="XL">
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" style="font-size: smaller;" type="text" placeholder="XXL">
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control-sm" name="qty" style="font-size: small;" value="<?= @$pqty; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Cost Sample</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control-sm" name="harga" style="font-size: small;" value="<?= @$pharga; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Cost Tailor</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control-sm text-capitalize" name="jahit" style="font-size: small;" value="<?= @$pjahit; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Cost Cutting</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control-sm text-capitalize" name="motong" style="font-size: small;" value="<?= @$pmotong; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label">Status <small class="text-danger float-end"><?= @$pstatus; ?></small></label>
                            <div class="col-sm-7 float-left">
                                <select class="form-select form-control-sm form-select" aria-label=".form-select-sm example" name="status">
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
                                <input type="number" class="form-control-sm text-capitalize" name="naskat" style="font-size: small;" value="<?= @$pnaskat; ?>">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-5 col-form-label" id="inputGroup-sizing-sm">Description</label>
                            <div class="col-sm-7">
                                <textarea class="form-control-sm text-capitalize" rows="3" style="font-size: 11px;" name="keterangan"><?= @$pketerangan; ?></textarea>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <center>
                                        <img src="./img/<?= $pgambar; ?>" class="mb-1" id="ketok" onerror="if (this.src != 'img/nophoto.jpg') this.src = 'img/nophoto.jpg';" width="100px" height="140px">
                                        <br>
                                        <input class="form-control form-control-sm" id="img1" type="file" name="gambar" value="<?= $pgambar; ?>">
                                    </center>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center" id="tombol">&nbsp; &nbsp;
                            <button type="submit" class="btn btn-sm btn-info float-end mx-1" id="update" name="update">Update</button> &nbsp; &nbsp;
                            <button type="submit" class="btn btn-sm btn-info float-start" id="save" name="save">Save | Tambahkan</button> &nbsp;
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-9 animate__animated animate__backInRight">
        <div class="card ">
            <div class="card-header bg-gradient-dark"><i data-feather="plus-circle" class="text-light tambah"></i></div>
            <div class="card-body bg-bg-gradient-secondary">
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
                                <th class="text-white"><?= $no++ ?></th>
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