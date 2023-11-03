
<thead>
    <tr>
        <th class="">No.</th>
        <th class="col-2">Date</th>
        <th class="col-2">Customer</th>
        <th class="col-3">Style</th>
        <th>Code</th>
        <th>Warna</th>
        <!-- <th>Image</th> -->
        <!-- <th></th> -->
    </tr>
</thead>
<tbody id="table-body">
    <?php
    require_once 'functions.php';
    $sample = query("SELECT * FROM sample ORDER BY id DESC LIMIT 32");
    $no = 1;
    foreach( $sample as $smp) :
    ?>
        <tr class="tabl-sample" data-id="<?= $smp['id']; ?>"
                                data-nama_customer="<?= $smp['nama_customer']; ?>"
                                data-tanggal="<?= $smp['tanggal']; ?>"
                                data-code="<?= $smp['code']; ?>"
                                data-style="<?= $smp['style']; ?>"
                                data-warna="<?= $smp['warna']; ?>"
                                data-size="<?= $smp['size']; ?>"
                                data-harga="<?= $smp['harga']; ?>"
                                data-habis="<?= $smp['habis']; ?>"
                                data-acc_1="<?= $smp['acc_1']; ?>"
                                data-acc-2="<?= $smp['acc-2']; ?>"
                                data-keterangan="<?= $smp['keterangan']; ?>"
                                data-gambar="<?= $smp['gambar']; ?>">
            <td><?= $no++ ?></td>
            <td><?= date('d M Y', strtotime($smp['tanggal'])) ?></td>
            <td><?= $smp['nama_customer'] ?></td>
            <td><?= $smp['style'] ?></td>
            <td><?= $smp['code'] ?></td>
            <td><?= $smp['warna'] ?></td>
            <!-- <td >
            <img class="zoom rounded-circle shadow" src="../img/<?= $smp['gambar'] ?>" alt="<?= $smp['gambar'] ?>" width="24px" height="30px" onerror="this.src='../img/nophoto.jpg';">
            </td>
            <td>
            <a href="index.php?s=hapus&id=<?= $smp['id']; ?>" class=" text-danger detail-icon" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i data-feather="trash-2" class="icon"></i></a>
            </td> -->
        </tr>
    <?php endforeach; ?>
</tbody>

<script>
    $(document).ready(function() {
                feather.replace();
                new DataTable('#table-sample', {
            paging: false,
            scrollCollapse: true,
            scrollY: '500px'
        });        
    })
</script>