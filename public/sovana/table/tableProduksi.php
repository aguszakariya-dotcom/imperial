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
            <th>QTY</th>
            <th>Image</th>
            <th>Status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody id="tableNya">
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM produksi ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <th class="col"><?= $no++ ?></th>
                <td><?= tgl_kita($row['bulan']) ?></td>
                <td><?= $row['nama_customer'] ?></td>
                <td><?= $row['code'] ?></td>
                <td class="col-sm-2"><?= $row['style'] ?></td>
                <td><?= $row['warna'] ?></td>
                <td><?= $row['qty'] ?></td>
                <td><img src="https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="zoom" onerror="if (this.src != 'images/nophoto.jpg') this.src = 'images/nophoto.jpg';" width="28px" height="36px"></td>
                <td>
                    <?php
                    if ($row['status'] == 'Menunggu') {
                        echo '<i data-feather="clock"></i>';
                    } else if ($row['status'] == 'Proses') {
                        echo '<img src="images/done.png" width="40">';
                    } else if ($row['status'] == 'Finish') {
                        echo '<img src="images/done.png" width="40">';
                    } else if ($row['status'] == '') {
                        echo '<span data-feather="badge badge-danger">Finish</span>';
                    }
                    ?>
                </td>
                <td class="px-2">
                    <div class="d-flex">
                        <!-- Ganti bagian ini di dalam loop data -->
                        <div class="d-flex">
                            <a href="#" class="text-info editP" data-id="<?= $row['id']; ?>"><i class="fa-solid fa-file-pen "></i></a> &nbsp;
                            <a href="#" class="text-danger deleteProduksi" data-id="<?= $row['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                        </div>

                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<style>
    .deleteProduksi .icon {
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
    $(document).on('click', '.editP', function(e) {
        // alert ('haha!')
        $('#kolom-input').removeClass('collapse')
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            url: 'api/produksi.php?id=' + id,
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json', // Tambahkan ini jika diperlukan oleh server
            success: function(response) {
                console.log(response);
                // Mengisi nilai formulir dengan data yang diterima
                $('#bulan').val(response.bulan);
                $('#nama_customer').val(response.nama_customer);
                $('#style').val(response.style);
                $('#code').val(response.code);
                $('#size').val(response.size);
                $('#bahan').val(response.bahan);
                $('#warna').val(response.warna);
                $('#qty').val(response.qty);
                $('#harga').val(response.harga);
                $('#jahit').val(response.jahit);
                $('#motong').val(response.motong);
                $('#naskat').val(response.naskat);
                $('#status').val(response.status);
                $('#keterangan').val(response.keterangan);
                $('#gambarSebelumnya').val(response.gambar);

                // Menampilkan gambar di elemen img
                $('#gambarLama').attr('src', 'https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/' + response.gambar);

                // $('#gambar').attr('src', 'https://raw.githubusercontent.com/aguszakariya-dotcom/img-produksi/main/' + response.gambar);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    // Fungsi untuk menangani perubahan pada input gambar baru
    $(document).on('change', '#gambar', function(e) {
        // Menampilkan gambar baru di elemen img
        var input = e.target;
        var reader = new FileReader();
        reader.onload = function() {
            $('#gambarLama').attr('src', reader.result);
        };
        reader.readAsDataURL(input.files[0]);
    });
    $(document).ready(function() {
    $(document).on('click', '.deleteProduksi', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        // Confirm deletion with the user (optional)
        // var confirmDelete = confirm("Are you sure you want to delete this record?");
        // if (!confirmDelete) {
        //     return;
        // }

        $.ajax({
            url: 'api/produksi.php?id=' + id,
            type: 'DELETE', // Use DELETE method for deletion
            dataType: 'json',
            success: function(response) {
                // Handle success (e.g., show a message, reload the table)
                // alert('Record deleted successfully!');
                $("#meja").load("./table/tableProduksi.php");
            },
            error: function(error) {
                // Handle error (e.g., show an error message)
                console.log(error);
                alert('Error deleting record.');
            }
        });
    });
});

</script>