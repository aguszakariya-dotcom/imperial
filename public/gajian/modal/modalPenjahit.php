<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title btn btn-outline-danger text-center shadow">Isi Dulu Nama Pegawai, Hadir dan lembur !</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="  px-2 card text-center pt-4 shadow">
                        <form action="">
                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-4 col-form-label fw-bold">Nama Pegawai</label>
                                <div class="col-sm-8">
                                    <select id="namaSelect" class="form-select shadow" aria-label=".form-select-sm example" onchange ="updateNamaPegawai(this.value)">
                                        <option value="<?= $row['nama']; ?>"><?= $namaOptions; ?></option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hadir" class="col-sm-4 col-form-label fw-bold">Hadir</label>
                                <div class="col-sm-8">
                                    <select class="form-select shadow" id="hadir" onchange="updateTotal()">
                                        <option value="">Pilih</option>
                                        <option value="0">Tidak Hadir</option>
                                        <option value="10000">1 Hari</option>
                                        <option value="20000">2 Hari</option>
                                        <option value="30000">3 Hari</option>
                                        <option value="40000">4 Hari</option>
                                        <option value="50000">5 Hari</option>
                                        <option value="60000">6 Hari</option>
                                        <option value="70000">7 Hari</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hadir" class="col-sm-4 col-form-label fw-bold">Lembur</label>
                                <div class="col-sm-8">
                                    <select class="form-select shadow" id="lembur" onchange="updateTotal()">
                                        <option value="">Pilih</option>
                                        <option value="0">Tidak Lembur</option>
                                        <option value="10000">1 Hari</option>
                                        <option value="20000">2 Hari</option>
                                        <option value="30000">3 Hari</option>
                                        <option value="40000">4 Hari</option>
                                        <option value="50000">5 Hari</option>
                                        <option value="60000">6 Hari</option>
                                        <option value="70000">7 Hari</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                
            </div>
        </div>