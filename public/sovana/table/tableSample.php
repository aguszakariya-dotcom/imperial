<?php require 'koneksi.php'; ?>
<?php
function tgl_kita($tanggal)
{
    $bulan = array(
        1 =>   'Jan',
        2 =>   'Feb',
        3 =>   'Mar',
        4 =>   'Apr',
        5 =>   'Mei',
        6 =>   'Jun',
        7 =>   'Jul',
        8 =>   'Agu',
        9 =>   'Sep',
        10 =>  'Okt',
        11 =>  'Nov',
        12 =>  'Des'
    );
    $hari = array(
        1 =>   'Sen',
        2 =>   'Sel',
        3 =>   'Rab',
        4 =>   'Kam',
        5 =>   "Jum",
        6 =>   'Sab',
        7 =>   'Min'
    );
    $tgl = substr($tanggal, 8, 2);
    $bln = substr($tanggal, 5, 2);
    $thn = substr($tanggal, 0, 4);
    $bln = $bulan[(int) $bln];
    $hari = $hari[(int) date('N', strtotime($tanggal))];
    return $hari . ', ' . $tgl . ' ' . $bln . ' ' . $thn;
}
?>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th><i class="fa-solid fa-pen-to-square tambh"></i></a></th>
            <th class="col-sm-2">Date</th>
            <th>Customer</th>
            <th>Code</th>
            <th>Style</th>
            <th>Warna</th>
            <th>Image</th>
            <th>Status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody id="tableNya">
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM sample ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <th class="col"><?= $no++ ?></th>
                <td><?= tgl_kita($row['tanggal']) ?></td>
                <td><?= $row['nama_customer'] ?></td>
                <td><?= $row['code'] ?></td>
                <td class="col-sm-2"><?= $row['style'] ?></td>
                <td><?= $row['warna'] ?></td>
                <td><img src="https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="zoom" onerror="if (this.src != 'images/nophoto.jpg') this.src = 'images/nophoto.jpg';" width="28px" height="36px"></td>
                <td><?php
                    if ($row['harga'] == '0') {
                        echo '<span class="text-danger"><i class="fa-solid fa-circle-exclamation"></i></span>';
                    } else {
                        echo '<span class="text-primary"><i class="fa-solid fa-mug-hot"></i></span>';
                    }
                    ?>
                </td>
                <td class="px-2">
                    <div class="d-flex">
                        <!-- Ganti bagian ini di dalam loop data -->
                        <div class="d-flex">
                            <a href="#" class="text-info editSample" data-id="<?= $row['id']; ?>"><i class="fa-solid fa-file-pen icon"></i></a> &nbsp;
                            <a href="#" class="text-danger float-end delete-icon"><i class="fa-solid fa-trash-can icon"></i></a>
                        </div>

                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<style>
    .animate__animated.animate__bounce {
        --animate-duration: 2s;
    }

    .editSample .icon {
        display: none;
    }

    .delete-icon .icon {
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        new DataTable('#example');
        $('#example').on('mouseenter', 'tr', function() {
            $(this).find('.icon').show();
        }).on('mouseleave', 'tr', function() {
            $(this).find('.icon').hide();
        });
    });
    $('.tambh').click(function() {
        $('#kolom-input').removeClass('collapse');
        $('#kolom-input').addClass('backInDown');
    })
</script>