<?php
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari formulir
    $bulan = $_POST['bulan'];
    $nama_customer = $_POST['nama_customer'];
    $style = $_POST['style'];
    $code = $_POST['code'];
    $size = $_POST['size'];
    $bahan = $_POST['bahan'];
    $warna = $_POST['warna'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $jahit = $_POST['jahit'];
    $motong = $_POST['motong'];
    $naskat = $_POST['naskat'];
    $status = $_POST['status'];
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
    $query = "INSERT INTO produksi (bulan, nama_customer, style, code, size, bahan, warna, qty, harga, jahit, motong, naskat, status, keterangan, gambar)
              VALUES ('$bulan', '$nama_customer', '$style', '$code', '$size', '$bahan', '$warna', '$qty', '$harga', '$jahit', '$motong', '$naskat', '$status', '$keterangan', '$gambar')";
    
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
