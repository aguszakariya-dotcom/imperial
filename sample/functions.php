<?php 
// require './koneksi.php';
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $gambarLama2 = $data["gambarLama2"];
    if ($_FILES['gambar2']['error'] === 4) {
        $gambar2 = $gambarLama2;
    } else {
        $gambar2 = upload2();
    }
    $habis = htmlspecialchars($data["habis"]);
    $acc_1 = htmlspecialchars($data["acc_1"]);
    $acc_2 = htmlspecialchars($data["acc_2"]);
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    // UPLOAD ================================]] 

    $query =  "INSERT INTO sample 
                VALUES 
                ('', '$tanggal', '$nama_customer', '$style', '$code', '$warna', '$size', '$harga', '$gambar', '$gambar2', '$habis', '$acc_1', '$acc_2', '$keterangan')
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
    $gambarLama2 = $data["gambarLama2"];
    $habis = htmlspecialchars($data["habis"]);
    $acc_1 = htmlspecialchars(ucwords($data["acc_1"]));
    $acc_2 = htmlspecialchars(ucwords($data["acc_2"]));
    $keterangan = htmlspecialchars($data["keterangan"]);
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }
    if($_FILES['gambar2']['error'] === 4){
        $gambar2 = $gambarLama2;
    }else{
        $gambar2 = upload2();
    }
    $query = "UPDATE sample SET
                tanggal = '$tanggal',
                nama_customer = '$nama_customer',
                style = '$style',
                code = '$code',
                warna = '$warna',
                size = '$size',
                harga = '$harga',
                gambar = '$gambar',
                gambar2 = '$gambar2',
                habis = '$habis',
                acc_1 = '$acc_1',
                acc_2 = '$acc_2',
                keterangan = '$keterangan'
                WHERE id = $id  ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

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
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    $jahit = $data["jahit"];
    $motong = $data["motong"];
    $naskat = $data["naskat"];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // UPLOAD ================================]] 

    $query = "INSERT INTO produksi VALUES 
                ('', '$bulan', '$nama_customer', '$code', '$style', '$bahan', '$warna', '$size', '$qty', '$gambar', '$keterangan', '$jahit', '$motong', '$naskat')
                ";
    // mysqli_query($koneksi, $query);
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
    
    move_uploaded_file($tmpName, 'img/' . $namaFile);
    return $namaFile;
}

function upload2()
{
    $namaFile = $_FILES['gambar2']['name'];
    $ukuranFile = $_FILES['gambar2']['size'];
    $error = $_FILES['gambar2']['error'];
    $tmpName = $_FILES['gambar2']['tmp_name'];

    
    // CEKGAMBAR yg boleh diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ($ukuranFile > 6000000) {
        echo "<script>
                alert('Maaf, ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }

    move_uploaded_file($tmpName, 'img/' . $namaFile);
    return $namaFile;
}

function saveDiary($data) {
    global $koneksi;
    // cek penambahan data
    $customer = htmlspecialchars(ucwords($data["customer"]));
    $style = htmlspecialchars(ucwords($data["style"]));
    $warna = htmlspecialchars(ucwords($data["warna"]));
    $jumlah = $data["jumlah"];
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    $tanggal = $data["tanggal"];
    $gambarLama = $data["gambarLama"];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // UPLOAD ================================]] 

    $query = "INSERT INTO harianku
                VALUES
                ('', '$customer', '$style', '$warna', '$jumlah', '$keterangan', '$tanggal', '$gambar')
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


// UPDATE ====================== Harianku//
function updateDiary($data) {
    global $koneksi;
    // cek penambahan data
    $id = $data["id"];
    $customer = htmlspecialchars(ucwords($data["customer"]));
    $style = htmlspecialchars(ucwords($data["style"]));
    $warna = htmlspecialchars(ucwords($data["warna"]));
    $jumlah = $data["jumlah"];
    $keterangan = htmlspecialchars(ucwords($data["keterangan"]));
    $tanggal = $data["tanggal"];
    $gambarLama = $data["gambarLama"];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // UPLOAD ================================]] 

    $query = "UPDATE harianku SET
                customer = '$customer',
                style = '$style',
                warna = '$warna',
                jumlah = '$jumlah',
                keterangan = '$keterangan',
                tanggal = '$tanggal',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


?>