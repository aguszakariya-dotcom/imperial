<?php require_once 'koneksi.php' ;
// include 'functions/menu.php';
// include 'functions/edit.php';
?>

<?php require 'layout/header.php' ?>

<div class="row mt-3 justify-content-center">
    <div class="col-lg-3 collapse animate__animated" id="kolom-input">
        <div class="card shadow">
            <div class="card-header">Input Data</div>
            <div class="card-body">
                <form action="" class="form-horizontal text-bold" method="post" enctype="multipart/form-data" id="formId">
                    <!-- <div class="card-body"> -->
                    <div class="form-group form-group-sm row shadow-sm mb-2">
                        <input type="hidden" name="gambarSebelumnya" id="gambarSebelumnya">
                        <label class="col-sm-5" for="bulan">Finish</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-border border-width-2" name="tanggal" id="tanggal">
                        </div>
                    </div>
                    <div class="form-group row shadow-sm mb-2">
                        <label class="col-sm-5 pb-0" for="nama_customer">Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm form-control-border border-width-2" id="nama_customer" name="nama_customer">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="style">Style</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="style" name="style">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="code">Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="code" name="code">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="size">Size</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="size" name="size">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="harga">Cost</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control form-control-border border-width-2" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="habis">Penghabisan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="habis" name="habis">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="acc_1">Acc 1</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="acc_1" name="acc_1">
                        </div>
                    </div>
                    <div class="form-group row mb-1 shadow-sm mb-2">
                        <label class="col-sm-5" for="acc_2">Acc 2</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-border border-width-2" id="acc_2" name="acc_2">
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3 shadow-sm mb-2">
                        <label class="col-sm-5" for="Naskat">Description</label>
                        <div class="col-sm-7">
                            <textarea class="form-control text-capitalize" rows="3" style="font-size: 11px; width: 100%;" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2 mt-1 justify-content-center">
                        <div class=" justify-content-center">
                            <div class="form-group row mb-2 mt-1 justify-content-center">
                            <div class="text-center">
                                <img src="images/nophoto.jpg" class="mb-1" id="gambarLama" width="100px" height="140px"><br>
                                <input type="file" id="gambar" name="gambar">
                            </div>
                        </div>

                        </div>
                    </div>
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
    <div class="col-7 mt-4 " id="dataSample">
        <div class="mx-2 " id="meja">

        </div>
    </div>

</div>
<?php require 'layout/footer.php' ?>
<script src="functions/sample.js"></script>

