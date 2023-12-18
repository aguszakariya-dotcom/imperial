<?php
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Memeriksa jika parameter nama dan tanggal telah dikirimkan melalui permintaan AJAX
if (isset($_POST['nama']) && isset($_POST['tanggal'])) {
    // Mendapatkan nilai nama dan tanggal yang dipilih
    $selectedNama = $_POST['nama'];
    $selectedTanggal = $_POST['tanggal'];

    // Melakukan query untuk mendapatkan data invoice berdasarkan nama dan tanggal yang dipilih
    $query = "SELECT * FROM gajian WHERE nama='$selectedNama' AND tanggal='$selectedTanggal'";
    $invoiceData = mysqli_query($koneksi, $query);
   
    // Memproses hasil query dan menghasilkan data invoice
    if (mysqli_num_rows($invoiceData) > 0) {
        $counter = 1;
        while ($row = mysqli_fetch_assoc($invoiceData)) {
            echo "<tr>";
            echo "<td>" . $counter . "</td>";
            echo "<td>" . $row['item'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td class='right'>" . $row['unit_cost'] . "</td>";
            echo "<td class='center'>" . $row['qty'] . "</td>";
            echo "<td class='right'>" . $row['total'] . "</td>";
            echo "</tr>";
            $counter++;
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data yang cocok dengan kriteria yang dipilih.</td></tr>";
    }
}
$totale = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM gajian WHERE nama='$selectedNamai'");
$ttl = mysqli_fetch_array($totale);

?>
