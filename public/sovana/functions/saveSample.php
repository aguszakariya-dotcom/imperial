<?php
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari formulir
    $tanggal = $_POST['tanggal'];
    $nama_customer = $_POST['nama_customer'];
    $style = $_POST['style'];
    $code = $_POST['code'];
    $warna = $_POST['warna'];
    $size = $_POST['size'];
    $harga = $_POST['harga'];
    $habis = $_POST['habis'];
    $acc_1 = $_POST['acc_1'];
    $acc_2 = $_POST['acc_2'];
    $keterangan = $_POST['keterangan'];

    // Menyiapkan gambar
    $gambar = ''; // Gambar default jika tidak ada gambar baru
    if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
        // Mengunggah gambar baru
        $gambar = 'localhost/img-produksi/' . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    } elseif (isset($_POST['gambarSebelumnya'])) {
        // Menggunakan gambar yang sudah ada jika tidak ada gambar baru
        $gambar = $_POST['gambarSebelumnya'];
    }

    // Menyimpan data ke database
    $query = "INSERT INTO sample (tanggal, nama_customer, style, code,  warna, size, harga, gambar, habis, acc_1, acc_2, keterangan)
              VALUES ('$tanggal', '$nama_customer', '$style', '$code', '$warna', '$size', '$harga',  '$gambar', '$habis', '$acc_1', '$acc_2', '$keterangan')";
    
    if (mysqli_query($koneksi, $query)) {
        // Berhasil menyimpan data
        $response = array('status' => 'success', 'message' => 'Data berhasil disimpan.');
    } else {
        // Gagal menyimpan data
        $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($koneksi));
    }
    
    // Fetch the updated data
    $query = mysqli_query($koneksi, "SELECT * FROM produksi ORDER BY id DESC");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

    // Combine data and response into a single array
    $result = array('data' => $data, 'response' => $response);

    // Encode the combined array as JSON and echo
    echo json_encode($result);
} else {
    // Permintaan bukan dari metode POST
    echo json_encode(array('status' => 'error', 'message' => 'Permintaan tidak valid.'));
}
