<?php
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';


if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Perintah SQL untuk menghapus semua baris dalam tabel
$sql = "DELETE FROM gajian";

// Menjalankan perintah SQL
if ($koneksi->query($sql) === TRUE) {
    echo "Semua baris telah dihapus.";
} else {
    echo "Error: " . $koneksi->error;
}

// Menutup koneksi
$koneksi->close();
?>