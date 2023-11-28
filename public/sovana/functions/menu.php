<?php 
function query($query) {
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function saveProduksi($data) {
    global $koneksi;
    // cek penambahan data
    $bulan = $data["bulan"];
    $nama_customer = htmlspecialchars(ucwords($data["nama_customer"]));
    $code = htmlspecialchars(strtoupper($data["code"]));
    $style = htmlspecialchars(ucwords($data["style"]));
    $bahan = htmlspecialchars(ucwords($data["bahan"]));
    $warna = htmlspecialchars(ucwords($data["warna"]));
    $size = htmlspecialchars(strtoupper($data["size"]));
    $qty = $data["qty"];
    $gambarLama = $data["gambarLama"];
    $harga = $data["harga"];
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    $jahit = $data["jahit"];
    $motong = $data["motong"];
    $naskat = $data["naskat"];
    $status = $data["status"];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // UPLOAD ================================]] 

    $query = "INSERT INTO produksi VALUES 
                ('', '$bulan', '$nama_customer', '$code', '$style', '$bahan', '$warna', '$size', '$qty', '$gambar', '$harga', '$keterangan', '$jahit', '$motong', '$naskat', '$status')
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


// UPDATE ====================== PRODUKSI//
function updateProduksi($data)
{
    global $koneksi;
    $id = $data["id"];
    $bulan = $data["bulan"];
    $nama_customer = htmlspecialchars($data["nama_customer"]);
    $code = htmlspecialchars($data["code"]);
    $style = htmlspecialchars($data["style"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $warna = htmlspecialchars($data["warna"]);
    $size = htmlspecialchars($data["size"]);
    $qty = htmlspecialchars($data["qty"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $harga = htmlspecialchars($data["harga"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $jahit = htmlspecialchars($data["jahit"]);
    $motong = htmlspecialchars($data["motong"]);
    $naskat = htmlspecialchars($data["naskat"]);
    $status = htmlspecialchars($data["status"]);
    // jika ada photo baru yg diupload
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE produksi SET
                    bulan = '$bulan',                    
                    nama_customer = '$nama_customer',
                    code = '$code',
                    style = '$style',
                    bahan = '$bahan',
                    warna = '$warna',
                    size = '$size',
                    qty ='$qty',
                    gambar = '$gambar',
                    harga = '$harga',
                    keterangan = '$keterangan',
                    jahit = '$jahit',
                    motong = '$motong',
                    naskat = '$naskat',
                    status = '$status'
                    WHERE id = $id
                    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>
            ";
        return false;
    }
    // CEKGAMBAR yg boleh diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>
            ";
        return false;
    }
    
    if ($ukuranFile > 6000000) {
        echo "<script>
                alert('Maaf, ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }
    
    // move_uploaded_file($tmpName, 'ftp://data.becik.my.id:21/img/' . $namaFile);
    move_uploaded_file($tmpName, './img/' . $namaFile);
    
    return $namaFile;
}
?>