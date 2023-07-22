<?php
$koneksi = mysqli_connect('becik.my.id:3306', 'workshop_zack77', 'workshop467791zA', 'workshop_');

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari request AJAX
$tanggal = $_POST['tanggal'];
$item = ucwords($_POST['style']);
$descripsi = ucwords($_POST['customer']) . ', ' . ucwords($_POST['warna']). ', ' . $_POST['size'];
$harga = $_POST['harga'];
$qty = $_POST['jumlah'];
$total = $_POST['total'];

// Perintah SQL untuk menyimpan data ke database
$sql = "INSERT INTO breakdown (tanggal, item, descripsi,harga, qty, total) VALUES (
    -- '$nama', 
    '$tanggal',
    '$item',
    '$descripsi',
    '$harga',
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