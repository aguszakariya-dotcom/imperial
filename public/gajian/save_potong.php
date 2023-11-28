<?php
// $koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');
require_once 'koneksi.php';

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari request AJAX
$nama = ucwords($_POST['nama']);
$tanggal = $_POST['tanggal'];
$cst = ucwords($_POST['cst']);
$style = ucwords($_POST['style']);
$color = ucwords($_POST['warna']);
$hrg = $_POST['harga'];
$qty = $_POST['qty'];
$total = $_POST['total'];

// Perintah SQL untuk menyimpan data ke database
$sql = "INSERT INTO gajian (nama, tanggal, cst, style, color, hrg, qty, total) VALUES (
    '$nama', 
    '$tanggal',
    '$cst',
    '$style',
    '$color',
    '$hrg',
    '$qty',
    '$total'
)";

// Menjalankan perintah SQL
if (mysqli_query($koneksi, $sql)) {
    echo "Data berhasil disimpan. ok?";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
