<div class="row mt-5 mb-5 justify-content-center animate__animated fadeIndownBig">
    <div class="col-lg-5">
        <div class="card card-secondary">
            <div class="card-header">
                <div class="card-title">list gaji karyawan</div>
            </div>
            <div class="card-body">
                <table id="table-gaji">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Nama</th>
                            <th>Salary Pokok</th>
                            <th>Hadir</th>
                            <th>Lembur</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['listGaji'] as $allGaji) :  
                        $no = 1;    
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $allGaji['tanggal']; ?></td>
                            <td><?= $allGaji['nama']; ?></td>
                            <td><?= $allGaji['salary']; ?></td>
                            <td><?= $allGaji['hadir']; ?></td>
                            <td><?= $allGaji['lembur']; ?></td>
                            <td><?= $allGaji['total']; ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                            <div class="float-left text-bold">16.000.000</div>
                            <div class="float-right text-bold">100.000.000</div>

            </div>
        </div>
    </div>
</div>