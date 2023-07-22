<?php  ?>
<?php if (isset($_SESSION['sukses'])) { ?>
    <script>
    Swal.fire({
        title: "Good job!",
        text: "<?php echo $_SESSION['sukses']; ?>",
        icon: "success",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
    <?php unset($_SESSION['sukses']);} ?>
    <?php if (isset($_SESSION['gagal'])) { ?>
    <script>
    Swal.fire({
        title: "Gagal!",
        text: "<?php echo $_SESSION['gagal']; ?>",
        icon: "error",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
    <?php unset($_SESSION['gagal']);} ?>
<table class="table table-sm table-striped ">
    <thead>
        <tr class="fs-6">
            <th>No.</th>
            <th>Tanggal</th>
            <th>Item</th>
            <th>Description</th>
            <th>Harga</th>
            <th>QTY</th>
            <th>Total</th>
            <th>Aksi</th> <!-- Kolom Aksi -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $gajinya = mysqli_query(
            $koneksi,
            'SELECT * FROM breakdown ORDER BY ID ASC'
        );
        while ($row = mysqli_fetch_assoc($gajinya)) : ?>
            <tr class="table-sement ">
                <td><?php echo $no++; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?php echo $row['item']; ?></td>
                <td><?php echo $row['descripsi']; ?></td>
                <td><?= $row['harga'] ?></td>
                <td class="fw-bold"><?php echo $row['qty']; ?></td>
                <td><?= number_format($row['total'], 0, ',', '.'); ?></td>
                <td>
                    <a href="index.php?p=hapus&id=<?= $row['id']; ?>" class="btn btn-sm text-danger"><i data-feather="user-x"></i></a> <!-- Tombol Delete -->
                </td>
            </tr>
        <?php endwhile;
        ?>
    </tbody>
</table>
<?php if (
        isset($_GET['p']) &&
        $_GET['p'] == 'hapus' &&
        isset($_GET['id'])
    ) {
        $hapus = mysqli_query(
            $koneksi,
            "DELETE FROM breakdown WHERE id = '" . $_GET['id'] . "'"
        );
        if ($hapus) {
            $_SESSION['sukses'] = 'Data berhasil dihapus';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        } else {
            $_SESSION['gagal'] = 'Data gagal dihapus';
            echo '<script>window.location.href="index.php";</script>';
            exit();
        }
    } ?>