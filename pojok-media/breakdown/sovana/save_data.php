<?php
// save_data.php

include_once 'koneksi.php';

$tanggal = $_POST['tanggal'];
$descripsi = $_POST['descripsi'];
$keluar = $_POST['keluar'];
$masuk = $_POST['masuk'];
$saldo = $_POST['saldo'];


// Perform necessary database operations, e.g., insert the data into the table
$sql = "INSERT INTO dcashflow (tanggal, descripsi, keluar, masuk, saldo) VALUES(
    '$tanggal', '$descripsi', '$keluar', '$masuk '$saldo)";

if (mysqli_query($koneksi, $sql)) {
    echo "Success!, Data berhasil diInput";
}else {
    echo "Error" . mysqli_error($koneksi);
}
// You can return a response if needed, e.g., echo "success";
mysqli_close($koneksi);
?>
