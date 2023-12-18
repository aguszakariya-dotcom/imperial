<?php 
$hariIni = date('d M Y');
?>
 <!-- batas samping kanan -->
 <div class="col-sm-5 card shadow">
                <div class="card-header text-center">
                    <?php
                    $totale = mysqli_query(
                        $koneksi,
                        "SELECT SUM(total) AS total FROM gajian WHERE tanggal='" . $hariIni . "' ");
                    $ttl = mysqli_fetch_array($totale);
                    ?>
                    <button class=" btn btn-outline-light fs-6  text-center">Grand Total : Rp.
                        <?= number_format( $ttl['total'],0,',','.') ?>
                    </button>
                </div>
                <div class="card-body">
<table class="table" id="tableHariIni">
    <thead>
        <tr class="fs-6">
            <th>No.</th>
            <th>Nama</th>
            <th>Customer</th>
            <th>Style</th>
            <th>Warna</th>
            <th>QTY</th>
            <th>Total</th>
            <th>Aksi</th> <!-- Kolom Aksi -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $gajinya = mysqli_query($koneksi, "SELECT * FROM gajian WHERE tanggal='" . $hariIni . "' ORDER BY ID DESC");
        while ($row = mysqli_fetch_assoc($gajinya)) :
        ?>
        <tr class="table-sement text-light">
        <td><?php echo $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?php echo $row['cst']; ?></td>
        <td><?php echo $row['style']; ?></td>
            <td><?= $row['color']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?= number_format($row['total'], 0, ',', '.'); ?></td>
            <td>
                <a href="index.php?p=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i data-feather="user-x"></i></a>  <!-- Tombol Delete -->
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

