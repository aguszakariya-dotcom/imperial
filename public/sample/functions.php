<?php
require_once '../koneksi.php';
// $koneksi = mysqli_connect("localhost", "root", "", "mvc_lokal");

function query($query) {
    global $koneksi; // Tambahkan baris ini untuk mengakses variabel $koneksi yang ada di luar fungsi
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// ...

// ...


function saveSample($data) {
    global $koneksi;
    // cek penambahan data
    $tanggal = $data["tanggal"];
    // $tahun = $data["tahun"];
    $nama_customer = htmlspecialchars(ucwords($data["nama_customer"]));
    $style = htmlspecialchars(ucwords($data["style"]));
    $code = htmlspecialchars(strtoupper($data["code"]));
    $warna = htmlspecialchars(ucwords($data["warna"]));
    $size = htmlspecialchars(strtoupper($data["size"]));
    $harga = htmlspecialchars($data["harga"]);
        // $gambar = upload();
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $habis = htmlspecialchars($data["habis"]);
    $acc_1 = htmlspecialchars($data["acc_1"]);
    $acc_2 = htmlspecialchars($data["acc_2"]);
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    // UPLOAD ================================]] 
    $query =  "INSERT INTO sample 
                VALUES 
                ('', '$tanggal', '$nama_customer', '$style', '$code', '$warna', '$size', '$harga', '$gambar', '$habis', '$acc_1', '$acc_2', '$keterangan')
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


function updateSample($data){
    global $koneksi;
    $id = $data["id"];
    $tanggal = $data["tanggal"];
    $nama_customer = htmlspecialchars(ucwords($data["nama_customer"]));
    $style = htmlspecialchars(ucwords($data["style"]));
    $code = htmlspecialchars(strtoupper($data["code"]));
    $warna = htmlspecialchars(ucwords($data["warna"]));
    $size = htmlspecialchars(strtoupper($data["size"]));
    $harga = $data["harga"];
    $gambarLama = $data["gambarLama"];
    $habis = htmlspecialchars($data["habis"]);
    $acc_1 = htmlspecialchars(ucwords($data["acc_1"]));
    $acc_2 = htmlspecialchars(ucwords($data["acc_2"]));
    $keterangan = htmlspecialchars($data["keterangan"]);
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    };
    $query = "UPDATE sample SET
                tanggal = '$tanggal',
                nama_customer = '$nama_customer',
                style = '$style',
                code = '$code',
                warna = '$warna',
                size = '$size',
                harga = '$harga',
                gambar = '$gambar',
                habis = '$habis',
                acc_1 = '$acc_1',
                acc_2 = '$acc_2',
                keterangan = '$keterangan'
                WHERE id = $id  ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    // $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    
    if ($ukuranFile > 6000000) {
        echo "<script>
                alert('Maaf, ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }
    
    move_uploaded_file($tmpName, '../img/' . $namaFile);
    return $namaFile;
}

function registrasi($data) {
    global $koneksi;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    // cek username sudah ada atau belum 
    $result = mysqli_query($koneksi, "SELECT nama FROM users WHERE nama = '$nama'");
        if( mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Maaf Username sudah Terdaftar!');
                </script>";
        return false;
        }
    // cek password]] 
    
    if( $password !== $password2 ) {
        echo "
        <script>
        alert('Maaf Password tidak sama!');
        </script>";
        return false;
    }
    // encripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "INSERT INTO users VALUES('', '$nama', '$email', '$password')");
    
    return mysqli_affected_rows($koneksi);
}




