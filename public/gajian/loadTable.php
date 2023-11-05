<?php 
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// Memeriksa jika parameter nama telah dikirimkan melalui permintaan AJAX
if (isset($_POST['nama'])) {
    // Mendapatkan nilai nama yang dipilih
    $selectedNama = $_POST['nama'];

    // Melakukan query untuk mendapatkan data invoice berdasarkan nama yang dipilih
    $query = "SELECT * FROM gajian WHERE nama='" . $selectedNama . "'";
    $invoiceData = mysqli_query($koneksi, $query);

    // Memproses hasil query dan menghasilkan data invoice
    $no = 1;
    while ($row = mysqli_fetch_assoc($invoiceData)) {
        echo '<tr>';
        echo '<td>' . $no++ . '</td>';
        echo '<td>' . $row['style'] . '</td>';
        echo '<td>' . $row['cst'] . ', ' . $row['color'] . ', ' . $row['size'] . '</td>';
        echo '<td>Rp. ' . number_format($row['hrg'], 0, ',', '.') . '</td>';
        echo '<td>' . $row['qty'] . '</td>';
        echo '<td>Rp. ' . number_format($row['total'], 0, ',', '.') . '</td>';
        echo '</tr>';
    }
}
?>