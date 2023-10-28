<?php 
// $host = "becik.my.id:3306";
// $user = "newsovana";
// $pass = "rzk7!M192";
// $db = "becikmyi_sovana";
// ==========================================/
$host = "localhost";
$user = "root";
$pass = "";
$db = "mvc_lokal";
// ==========================================/

$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("Koneksi Gagal".mysqli_connect_error());
}else{
    // echo "Koneksi Berhasil";
}