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
    <div class="col-9 shadow bg-cyan">
        <div class="card">
            <div class="card-header">Data Produksi</div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>
<?php require './layout/footer.php' ?>