
<?php 
require '../koneksi.php';
?>

<?php $no = 1; ?>
<?php foreach ($data['produksi'] as $produksi) : ?>
    <tr>
        <th class=""><?= $no++ ?></th>
        <td class="text-capitalize"><?= tgl_kita($produksi['bulan']); ?></td>
        <td class="text-capitalize"><?= $produksi['nama_customer']; ?></td>
        <td><?= $produksi['code']; ?></td>
        <!-- <td ><?= $produksi['code']; ?></td> -->
        <td class=" col-sm-2 text-capitalize"><?= $produksi['style']; ?></td>
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