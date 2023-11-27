<?php 
$host = "becik.my.id:3306";
$db = "akuntansi";
$user = "akuntansi_ok";
$pass = "123/akuntansi";
// ==========================================/
// $host = "localhost";
// $user = "root";
// $pass = "";
// $db = "mvc_lokal";
// ==========================================/
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi){
    die("Koneksi Gagal".mysqli_connect_error());
}else{
    // echo "Koneksi Berhasil";
}